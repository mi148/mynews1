{{--ログインしていない場合のリダイレクトの処理--}}
<?php

Route::group(['prefix' => 'admin' , 'middleware' => 'auth'], function() {
    Route::get('news/create', 'Admin\NewsController@add');
});

?>

{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

{{-- admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'プロフィール新規作成')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール新規作成</h2>
                <form action="{{ action('Admin\ProfileController@create') }}" method="post" enctype="multipart/form-data">

                @if (count($errors) > 0)
                    <ul>
                        @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                @endif
                <div class="form-group row">
                    <label class="col-md-2" for="title">氏名</label>
                        <div class="col-nd-10">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                </div>
                <div class="form group row">
                    <label class="col-md-2" for="gender">性別</label>
                        <div class="col-md-10">
                            <input type="radio" name="gender" value="男性" {{ old('gender') == '男性' ? 'checked' : ''  }}>男性<br>
                            <input type="radio" name="gender" value="女性" {{ old('gender') == '女性' ? 'checked' : '' }}>女性
                        </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2" for="title">趣味</label>
                        <div class="col-nd-10">
                            <textarea class="form-control"  name="hobby" rows="5" cols="50">{{ old('hobby') }}</textarea>
                        </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2" for="title">自己紹介欄</label>
                        <div class="col-nd-10">
                            <textarea class="form-control"  name="introduction" rows="10" cols="50">{{ old('introduction') }}</textarea>
                        </div>
                </div>
                {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection
