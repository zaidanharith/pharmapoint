@if ($paginator->hasPages())
    <div class="flex justify-center items-center gap-1 py-3">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <div class="hidden"></div>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="px-3 py-1.5 font-bold text-lg flex items-center hover:-translate-x-2 duration-200 transition-all">
                <span class="material-symbols-outlined">west</span>
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="px-3 py-1.5 font-bold text-lg border-1 border-orange bg-orange-50 rounded-md opacity-50 cursor-not-allowed">{{ $element }}</span>
            @elseif (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="px-3 py-1.5 font-bold text-lg border-1 border-orange bg-orange-50 rounded-md hover:shadow-sm hover:bg-orange-100">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="px-3 py-1.5 font-bold text-lg rounded-md hover:bg-peach">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="px-3 py-1.5 font-bold text-lg flex items-center hover:translate-x-2 duration-200 transition-all">
                <span class="material-symbols-outlined">east</span>
            </a>
        @else
            <div class="hidden"></div>
        @endif
    </div>
    <h3 class="text-center">
        {!! __('Menampilkan produk ') !!}
        @if ($paginator->firstItem())
            <span class="font-bold">{{ $paginator->firstItem() }}</span>
            {!! __('hingga') !!}
            <span class="font-bold">{{ $paginator->lastItem() }}</span>
        @else
            {{ $paginator->count() }}
        @endif
        {!! __('dari') !!}
        <span class="font-bold">{{ $paginator->total() }}</span>
        {!! __('produk') !!}
    </h3>
@endif



