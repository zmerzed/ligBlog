@extends('layouts.admin')

@section('create')
    <!--start l-contents-->
    <div class="l-container u-clear">
        <!--start l-main-->
        <main class="l-main js-main">
            <div class="l-main-block"></div>
            <form action="{{ URL::route('admin.articles.postUpdate', ['id' => $article->id]) }}" method="POST" enctype="multipart/form-data" class="form">
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <label for="image" class="form-title">EYE CATCH IMAGE
                    <div class="form-file u-clear">
                        <span id="idUploadFile">{{ $article->image }}</span>
                        <span class="form-file-button">UPLOAD</span>
                    </div>
                </label>
                <input type="file" id="image" class="input input-image" name="image" accept="image/*">
                <label for="title" class="form-title">TITLE</label>
                <div class="form-body">
                    <input type="text" id="title" class="input input-text" name="title" value="{{ $article->title }}">
                </div>
                <label for="contents" class="form-title">CONTENTS</label>
                <div class="form-textarea">
                    <textarea name="content" id="inquiry" cols="30" rows="10" class="input input-contents">{{ $article->content }}</textarea>
                </div>
                @if (session('error'))
                    <div class="alert alert-danger" style="background-color: pink">
                        <small>Error</small>
                    </div>
                @endif
                <label for="submit" class="form-button">
                    <div class="button">
                        <p class="button-text">Update</p>
                    </div>
                </label>
                <input type="submit" id="submit" class="input input-submit">
                <a href="{{ URL::route('admin.articles.view', ['id' => $article->id]) }}" class="form-button">
                    <div class="button">
                        <p class="button-text">Back</p>
                    </div>
                </a>
            </form>
        </main>
        <!--end l-main-->
    </div>
    <!--end l-contents-->
@endsection

