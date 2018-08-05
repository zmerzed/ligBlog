@extends('layouts.main')

@section('articles')
    <!--start l-contents-->
    <div class="l-container u-clear">
        <!--start l-main-->
        <main class="l-main js-main">
            <div class="l-main-block"></div>
                <div class="page-number">
                    Page <span >{{ $articles->currentPage() }}/{{ $articles->lastPage() }}</span>
                </div>
                <div class="archive">
                    <ul class="archive-list">
                         @include('components.articles', ['articles' => $articles])
                    </ul>
                </div>

                @if ($articles->lastPage() > 1)
                    <div class="paginate">
                        <a href="{{ $articles->url(1) }}" class="paginate-prev {{ ($articles->currentPage() == 1) ? ' is-disable' : '' }}">
                            <span class="paginate-prev-arrow"></span>
                        </a>
                        @for ($i = 1; $i <= $articles->lastPage(); $i++)
                            <a href="{{ $articles->url($i) }}" class="paginate-number {{ ($articles->currentPage() == $i) ? ' is-current' : '' }}">{{ $i }}</a>
                        @endfor

                        <a href="{{ $articles->url($articles->currentPage()+1) }}" class="paginate-next {{ ($articles->currentPage() == $articles->lastPage()) ? ' is-disable' : '' }}">
                            <span class="paginate-next-arrow"></span>
                        </a>
                    </div>
                @endif
            </div>
        </main>
        <!--end l-main-->

    </div>
    <!--end l-contents-->
@endsection