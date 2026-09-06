#!/bin/sh
set -e

echo "[ORDO Docker] Starting container initialization..."

cd /var/www/html

# 1. Environment file setup
if [ ! -f .env ]; then
    echo "[ORDO Docker] .env not found. Copying from .env.example..."
    cp .env.example .env
fi

# 2. Application key check
if ! grep -q "^APP_KEY=base64:" .env && [ -z "$APP_KEY" ]; then
    echo "[ORDO Docker] Generating application encryption key..."
    php artisan key:generate --force
fi

# 3. SQLite Database Preparation
DB_CONN=$(grep -E "^DB_CONNECTION=" .env | cut -d '=' -f 2 || echo "sqlite")
if [ "$DB_CONN" = "sqlite" ] || [ -z "$DB_CONN" ]; then
    echo "[ORDO Docker] Configuring SQLite database..."
    mkdir -p database
    if [ ! -f database/database.sqlite ]; then
        touch database/database.sqlite
    fi
    chown -R www-data:www-data database
    chmod -R 775 database
    chmod 664 database/database.sqlite
fi

# 4. Storage permissions
echo "[ORDO Docker] Setting storage permissions..."
mkdir -p storage/framework/cache storage/framework/sessions storage/framework/views storage/logs bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

# 5. Database migrations and seeding
echo "[ORDO Docker] Running database migrations and seeders..."
php artisan migrate --force --seed || true

# 6. Optimize caches
echo "[ORDO Docker] Optimizing Laravel application caches..."
php artisan optimize:clear
php artisan view:cache
php artisan route:cache

echo "[ORDO Docker] Container initialization complete! Starting services..."

exec "$@"
