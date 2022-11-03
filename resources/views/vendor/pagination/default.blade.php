@if ($paginator->hasPages())
    <div class='row mt-4'>
        <div class='col'>
            <nav class="d-flex justify-content-end p-3 pt-0">
                <ul class="pagination mb-0">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                            <a class="page-link" href="#" aria-label="Previous">
                                <i class="fa fa-angle-left"></i>

                                <span class="sr-only">Anterior</span>
                            </a>
                        </li>
                    @else
                        <li class="page-item" aria-label="@lang('pagination.previous')">
                            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
                                <i class="fa fa-angle-left"></i>

                                <span class="sr-only">Anterior</span>
                            </a>
                        </li>
                    @endif
        
                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            {{-- Disabled con 3 puntos --}}
                            <li class="page-item disabled" aria-disabled="true">
                                <a class="page-link" href="#">{{ $element }}</a>
                            </li>
                        @endif
        
                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="page-item active">
                                        <a class="page-link text-white" aria-current="page" href="#">{{ $page }} <span class="sr-only">(current)</span></a>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a
                                            class="page-link"
                                            href="{{ $url }}"
                                        >{{ $page }}</a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
        
                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li class="page-item" aria-label="@lang('pagination.next')">
                            <a
                                class="page-link"
                                href="{{ $paginator->nextPageUrl() }}"
                                rel="next"
                                aria-label="Next"
                            >
                                <i class="fa fa-angle-right"></i>

                                <span class="sr-only">Siguiente</span>
                            </a>
                        </li>
                    @else
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                            <a
                                class="page-link"
                                href="#"
                                rel="next"
                                aria-label="Next"
                            >
                                <i class="fa fa-angle-right"></i>

                                <span class="sr-only">Siguiente</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
@endif
