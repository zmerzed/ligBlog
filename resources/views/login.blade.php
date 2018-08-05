@extends('layouts.admin')

@section('login')
<!--start l-contents-->
<div class="l-container u-clear">
    <!--start l-main-->
    <main class="l-main js-main">
        <div class="l-main-block"></div>
        <form action="{{ URL::route('admin.postLogin') }}" method="POST" class="form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <label for="user-id" class="form-title">USER ID</label>
            <input type="text" id="user-id" class="input input-text" name="username">
            <label for="password" class="form-title">PASSWORD</label>
            <input type="password" id="password" class="input input-text" name="password">
            <label for="submit" class="form-button">
            <div class="button">
                <p class="button-text">Login</p>
            </div>
            </label>
                <input type="submit" id="submit" class="input input-submit">
        </form>
    </main>
    <!--end l-main-->
</div>
<!--end l-contents-->
@endsection