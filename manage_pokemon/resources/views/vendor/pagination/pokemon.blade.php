@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}">
        <div class="pagination">
            @if ($paginator->onFirstPage())
                <span>&lt;</span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev">&lt;</a>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <span>{{ $element }}</span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="active">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next">&gt;</a>
            @else
                <span>&gt;</span>
            @endif
        </div>
    </nav>
@endif

