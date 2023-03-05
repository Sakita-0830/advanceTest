@if ($paginator->hasPages())
    <nav class="p-pagination">
        <ul>

        <!-- 前へ移動ボタン -->
        @if ($paginator->onFirstPage())
            <div class="disabled">
                <div class="p-pagination__previous"><</div>
            </div>
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}">
                    <div class="p-pagination__previous"><</div>
                </a>
            </li>
        @endif

        <!-- ページ番号　-->
        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="disabled">
                    {{ $element }}
                </li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <div class="active">
                            {{ $page }}
                        </div>
                    @else
                        <div class="active">
                            <a href="{{ $url }}">{{ $page }}</a>
                        </div>
                    @endif
                @endforeach
            @endif
        @endforeach

        <!-- 次へ移動ボタン -->
        @if ($paginator->hasMorePages())
            <div>
                <a href="{{ $paginator->nextPageUrl() }}">
                    <div class="p-pagination__next">></div>
                </a>
            </div>
        @else
            <div class="disabled">
                <div class="p-pagination__next">></div>
            </div>
        @endif
        </ul>
    </nav>
@endif 