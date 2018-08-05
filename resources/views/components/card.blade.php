<li class="archive-item">
    <article class="card">
        <a href="#" class="card-link">
            <img src="{{ $article->image_path }}" alt="" class="card-image">
            <div class="card-bottom">
                <h1 class="card-title">{{ $article->content }}</h1>
                <time class="card-date" datetime="{{ $article->proper_time }}">
                    {{ $article->proper_time }}
                </time>
            </div>
        </a>
    </article>
</li>