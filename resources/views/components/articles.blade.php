@foreach ($articles as $article)
	<ul class="archive-list">
		@include('components.card', ['article' => $article])
	</ul>
@endforeach