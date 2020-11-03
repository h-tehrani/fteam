@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="btn btn-outline-success disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <a class="btn-link" aria-hidden="true">&lsaquo;</a>
                </li>
            @else
                    <a class="btn btn-outline-success" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                   <a class="btn btn-outline-success">{{ $element }}</a>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                           <a class="btn btn-outline-success active">{{ $page }}</a>
                        @else
                           <a class="btn btn-outline-success" href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                    <a class="btn btn-outline-success" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
            @else
                <li class="btn btn-outline-success" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <a class="btn-link" aria-hidden="true">&rsaquo;</a>
                </li>
            @endif
        </ul>
    </nav>
@endif
