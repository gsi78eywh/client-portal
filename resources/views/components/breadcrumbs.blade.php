@props(['items' => []])

<nav class="ordo-breadcrumbs" aria-label="Breadcrumb">

    <a href="/town-hall" class="breadcrumb-home">
        Town Hall
    </a>

    @foreach ($items as $item)

        <span class="breadcrumb-separator">
            /
        </span>

        @if (!empty($item['url']))

            <a
                href="{{ $item['url'] }}"
                class="breadcrumb-link"
            >
                {{ $item['label'] }}
            </a>

        @else

            <span class="breadcrumb-current">
                {{ $item['label'] }}
            </span>

        @endif

    @endforeach

</nav>


<style>
    .ordo-breadcrumbs {
        display: flex;
        align-items: center;
        flex-wrap: wrap;

        gap: 8px;

        margin-bottom: 18px;

        font-size: 13px;
    }

    .breadcrumb-home,
    .breadcrumb-link {
        color: #6b7280;

        transition: color 0.2s ease;
    }

    .breadcrumb-home:hover,
    .breadcrumb-link:hover {
        color: #1d4ed8;
    }

    .breadcrumb-separator {
        color: #d1d5db;
    }

    .breadcrumb-current {
        color: #111827;
        font-weight: 500;
    }

    @media (max-width: 600px) {

        .ordo-breadcrumbs {
            font-size: 12px;
        }

    }
</style>