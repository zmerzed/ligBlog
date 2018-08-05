@extends('layouts.admin')

@section('view')
  <!--start l-main-->
    <main class="l-main js-main">
        <div class="l-main-block"></div>
        <div class="single">
            <img src="{{ $article->image_path }}" alt="{{ $article->image }}" class="single-image">
            <div class="l-container u-clear">
                <h1 class="single-title">{{ $article->title }}</h1>
                <a href="{{ URL::route('admin.articles.edit', ['id'=> $article->id]) }}" style="color: blue">EDIT</a>
                <time class="single-date" datetime="2016-9-16">{{ $article->proper_time }}</time>
                <p class="single-desc">{{ $article->content }}</p>
                <div class="single-button">
                    <a class="button" href="{{ URL::route('admin.articles') }}">
                        <p class="button-text">Top</p>
                    </a>
                </div>
            </div>
        </div>
    </main>
    <!--end l-main-->
@endsection

