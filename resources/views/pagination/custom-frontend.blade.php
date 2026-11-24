@if ($paginator->lastPage() > 1)
    <ul class="blog-pagination">
        {{-- Numbered Pagination --}}
        @for ($page = 1; $page <= $paginator->lastPage(); $page++)
            @if ($page == $paginator->currentPage())
                <li>
                    <a href="javascript:void(0)" class="heading-font numbers active">{{ $page }}</a>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->url($page) }}" class="heading-font numbers">{{ $page }}</a>
                </li>
            @endif
        @endfor

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}" class="heading-font next" rel="next">
                    Next <i class="fa-solid fa-arrow-right"></i>
                </a>
            </li>
        @endif
    </ul>
@endif
