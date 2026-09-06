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


