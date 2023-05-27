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

    @foreach($posts as $post)
    <tr>
      <td>{{ $post->user_id }}</td>
      <td>{{ $post->post }}</td>
      <td>{{ $post->created_at }}</td>

      <!--投稿の編集ボタン-->
      <td><div class="content"><a class="js-modal-open" href="" post="{{ $post->post }}" post_id="{{ $post->id }}"><img src="/images/edit.png" alt="編集"></a></div></td>
    </tr>
    @endforeach
    <!--モーダルの中身-->
    <div class="modal js-modal">
      <div class="modal__bg js-modal-close"></div>
      <div class="modal__content">
        <form action="" method=""></form>
      </div>
    </div>

  </div>
@endsection
