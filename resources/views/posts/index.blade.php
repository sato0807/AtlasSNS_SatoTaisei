@extends('layouts.login')

@section('content')
  <div class="top">

    <!--登録フォーム実装-->
    <!--参考URL　https://qiita.com/manbolila/items/b364088e821f4c946229　
    https://poppotennis.com/posts/laravel-post
    https://yuyafukuda.com/laravel-posting-function/-->

    <div class="post_form">
      {!! Form::open(['url' => '/top']) !!}
        <div class="form_group">
          <img class="image" src="{{ asset('storage/'.Auth::user()->images) }}" alt="image">
          {!! Form::input('text', 'newPost', null, ['class' => 'form_control', 'placeholder' => '投稿内容']) !!}
          <button type="submit" class="btn_post"><img src="/images/post.png"></button>
        </div>
      {!! Form::close() !!}
      @if($errors->any())
        <div class="alert alert-danger mt-4">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
    </div>

    <div class="posts_list">
      @foreach($posts as $post)
        <div class="post">
          <div class="post_contents">
            <img class="image" src="{{ asset('storage/'.$post->user->images) }}" alt="ユーザーアイコン">
            <div class="post_sentence">
              <p class="post_username">{{ $post->user->username }}</p>
              <!-- usersはPost.phpのリレーションメソッド -->
              <p class="post_post">{{ $post->post }}</p>
            </div>
            <p class="post_created_at">{{ $post->created_at }}</p>
          </div>

          <!-- if文を使ってログイン中のユーザーのみ表示
          (ログイン中のユーザーのID == 投稿した人のID) -->
          <!-- post属性とpost_id属性を追加し、投稿内容と投稿idのデータを持たせる -->
          @if ($user_id == $post->user_id)
            <div class="btn_contents">
              <!--投稿の編集ボタン-->
              <a class="js-modal-open btn_edit" href="" post="{{ $post->post }}" post_id="{{ $post->id }}"><img src="/images/edit.png" alt="編集"></a>
              <!-- 投稿の削除ボタン -->
              <!-- hrefにリンクをどのデータか指定の上記述し、Controllerで削除機能を追加する -->
              <a class="btn_delete" href="/top/{{ $post->id }}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')">
              <!-- <img src="/images/trash.png" alt="削除"> -->
              </a>
            </div>
          @endif
        </div>
      @endforeach
    </div>

    <!-- モーダル -->
    <div class="modal js-modal">
      <!-- モーダルの背景（グレー） -->
      <div class="modal__bg js-modal-close"></div>
      <!-- モーダルの中身 -->
      <div class="modal__content">
        <form action="/top/update" method="post">
          <textarea name="upPost" class="modal_post"></textarea>
          <input type="hidden" name="up_id" class="modal_id" value="">
          <input class="modal_edit" type="submit">
          {{ csrf_field() }}
        </form>
        <!-- <a class="js-modal-close" href="">閉じる</a> -->
      </div>
    </div>

  </div>
@endsection
