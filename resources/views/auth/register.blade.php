@extends('layouts.logout')

@section('content')

<div class="login_form_area">
  <!-- 適切なURLを入力してください -->
  {{ Form::open(['url' => '/register']) }}
  <!--↑openからcloseまでをweb.phpのpost送信用の「/register」へ送信するという命令-->

  <h2>新規ユーザー登録</h2>

  {{ Form::label('user name') }}
  {{ Form::text('username',null,['class' => 'input']) }}

  {{ Form::label('mail address') }}
  {{ Form::text('mail',null,['class' => 'input']) }}

  {{ Form::label('password') }}
  {{ Form::password('password',['class' => 'input']) }}

  {{ Form::label('password confirm') }}
  {{ Form::password('password_confirmation',['class' => 'input']) }}

  {{ Form::submit('REGISTER',['class' => 'btn btn-danger register_btn']) }}

  <p class="text_btn"><a href="/login">ログイン画面に戻る</a></p>

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
</div>

@endsection
