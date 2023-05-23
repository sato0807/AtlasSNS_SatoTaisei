@extends('layouts.login')

@section('content')
  <div class="container">
    <h2>機能を実装していきましょう。</h2>

    <!--登録フォーム実装-->
    <!--参考URL　https://qiita.com/manbolila/items/b364088e821f4c946229　
    https://poppotennis.com/posts/laravel-post
    https://yuyafukuda.com/laravel-posting-function/-->

    {!! Form::open(['url' => '/top']) !!}
    <div class="form-group">
      {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容']) !!}
    </div>
    <button type="submit" class="btn btn-success pull-right"><img src="/images/post.png"></button>
    {!! Form::close() !!}
  </div>
@endsection
