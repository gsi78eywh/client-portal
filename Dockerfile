# ==============================================================================
# STAGE 1: Frontend Asset Compilation (Node.js + Vite)
# ==============================================================================
FROM node:22-alpine AS frontend

WORKDIR /app

# Copy dependency manifests
COPY package*.json ./
RUN npm ci

# Copy frontend source files
COPY resources/ resources/
COPY public/ public/
COPY vite.config.js ./

# Build production assets into public/build/
RUN npm run build

# ==============================================================================
# STAGE 2: PHP 8.4-FPM + Nginx + Application Runtime
# ==============================================================================
FROM php:8.4-fpm-alpine AS production

# Install system dependencies, Nginx, Supervisor, and build libraries
RUN apk add --no-cache \
    nginx \
    supervisor \
    curl \
    git \
    unzip \
    sqlite \
    sqlite-libs \
    sqlite-dev \
    libzip-dev \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    icu-dev \
    oniguruma-dev

# Configure and install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
        pdo_sqlite \
        pdo_mysql \
        bcmath \
        zip \
        gd \
        intl \
        opcache \
        pcntl

# Install Composer v2
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy composer definitions and install PHP dependencies
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --no-autoloader --prefer-dist

# Copy application source code
COPY . .

# Copy compiled frontend assets from Stage 1
COPY --from=frontend /app/public/build ./public/build

# Finish composer autoloading
RUN composer dump-autoload --optimize --no-dev

# Copy Nginx and Supervisor configuration
COPY docker/nginx.conf /etc/nginx/http.d/default.conf
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh

# Permissions and directories setup
RUN chmod +x /usr/local/bin/entrypoint.sh \
    && mkdir -p /var/log/supervisor /var/run/supervisor storage bootstrap/cache \
    && chown -R www-data:www-data /var/www/html /var/log/supervisor

EXPOSE 80

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
