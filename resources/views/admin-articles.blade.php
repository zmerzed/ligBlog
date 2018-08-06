@extends('layouts.admin')

@section('articles')
    <!--start l-contents-->
    <div class="l-container u-clear">
        <!--start l-main-->
        <main class="l-main js-main">
            <div class="l-main-block"></div>
            <a href="{{ URL::route('admin.articles.create') }}" class="l-main-button">
                <div class="button">
                    <p class="button-text">New Article</p>
                </div>
            </a>
            <ul class="archive archive-admin">
                @foreach ($articles as $article)
                <li class="archive-item">
                    <a href="{{ URL::route('admin.articles.view', ['id' => $article->id]) }}" class="post-article">
                       {{--  <time class="post-article-date" datetime="2016-9-16">16 Sep, 2016</time> --}}
                        <time class="post-article-date" datetime="2016-9-16">{{ $article->proper_time }}</time>
                        <h1 class="post-article-title">{{ $article->title }}</h1>
                    </a>
                </li>
                @endforeach
            </ul>
        </main>
        <!--end l-main-->
    </div>
    <!--end l-contents-->
@endsection