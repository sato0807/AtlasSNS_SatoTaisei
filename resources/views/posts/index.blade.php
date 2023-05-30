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
      <td>{{ $post->user->username }}</td>
      <td>{{ $post->post }}</td>
      <td>{{ $post->created_at }}</td>

      <!-- if文を使ってログイン中のユーザーのみ表示
      @if (ログイン中のユーザーのID == 投稿した人のID) -->
      @if ($user_id == $post->user_id)
      <!--投稿の編集ボタン-->
      <td><div class="content"><a class="js-modal-open" href="" post="{{ $post->post }}" post_id="{{ $post->id }}"><img src="/images/edit.png" alt="編集"></a></div></td>
      <!-- 投稿の削除ボタン -->
      <td><a class="btn btn-danger" href="" onclick="return confirm(この投稿を削除します。よろしいでしょうか？)"><img src="/images/trash.png" alt="削除"></a></td>
      @endif
      <!-- post属性とpost_id属性を追加し、投稿内容と投稿idのデータを持たせる -->
    </tr>
    @endforeach
    <!-- モーダル -->
    <div class="modal js-modal">
      <!-- モーダルの背景（グレー） -->
      <div class="modal__bg js-modal-close"></div>
      <!-- モーダルの中身 -->
      <div class="modal__content">
        <form action="/top/update" method="post">
          <textarea name="upPost" class="modal_post"></textarea>
          <input type="hidden" name="up_id" class="modal_id" value="">
          <input type="submit" value="更新">
          {{ csrf_field() }}
        </form>
        <a class="js-modal-close" href="">閉じる</a>
      </div>
    </div>

  </div>
@endsection
