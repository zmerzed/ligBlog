<li class="archive-item">
    <article class="card">
        <a href="#" class="card-link">
            <img src="{{ url('storage/articles/9_1533475237.jpg')}}"" alt="" class="card-image">
            <div class="card-bottom">
                <h1 class="card-title">{{ $article->content }}</h1>
                <time class="card-date" datetime="{{ $article->proper_time }}">
                    {{ $article->proper_time }}
                </time>
            </div>
        </a>
    </article>
</li>