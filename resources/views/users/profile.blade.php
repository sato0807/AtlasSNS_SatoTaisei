@extends('layouts.login')

@section('content')

{{ Form::open(['url' => '/profile']) }}
<div class="form-group">
  <!-- ユーザー名 -->
  <div>
    <p>user name</p>
    {{ Form::text('upUsername', $user_login->username, ['class' => 'form-control', 'placeholder' => '氏名']) }}
  </div>
  <!-- メールアドレス -->
  <div>
    <p>mail adress</p>
    {{ Form::email('upMail', $user_login->mail, ['class' => 'form-control', 'placeholder' => 'メールアドレス']) }}
  </div>
  <!-- パスワード -->
  <div>
    <p>password</p>
    {{ Form::password('upPassword', ['class' => 'form-control', 'placeholder' => 'パスワード']) }}
  </div>
  <!-- パスワード確認 -->
  <div>
    <p>password comfirm</p>
    {{ Form::password('upPassword_confirmation', ['class' => 'form-control', 'placeholder' => 'パスワード確認']) }}
  </div>
  <!-- 自己紹介文 -->
  <div>
    <p>bio</p>
    {{ Form::text('upBio', $user_login->bio, ['class' => 'form-control', 'placeholder' => '自己紹介文']) }}
  </div>
  <!-- アイコン画像 -->
  <div>
    <p>icon image</p>
    {{ Form::file('upImages',['class' => 'form-control'] ) }}
  </div>

</div>
{{ Form::submit('更新', ['type' => 'submit']) }}
{{ Form::close() }}

<!-- バリデーション処理のエラー文を表示 -->
@if($errors->any())
  <div class="alert alert-danger mt-3">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

@endsection
