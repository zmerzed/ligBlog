@extends('layouts.main')

@section('article-view')

<!--start l-main-->
<main class="l-main js-main">
    <div class="l-main-block"></div>
    <div class="single">
        <img src="{{ $article->image_path }}" alt="" class="single-image">
        <div class="l-container u-clear">
            <h1 class="single-title">{{ $article->title }}</h1>
            <time class="single-date" datetime="{{ $article->proper_time }}">{{ $article->proper_time }}</time>
            <p class="single-desc">{{ $article->content }}</p>
            <a href="{{ URL::route('articles') }}">
                <div class="single-button">
                    <div class="button">
    					<p class="button-text">Top</p>
    				</div>
                </div>
            </a>
        </div>
    </div>
</main>
<!--end l-main-->

@endsection