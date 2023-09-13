@extends('layouts.logout')

@section('content')

<div id="clear">
  <p>{{session('key')}}さん
  <br>ようこそ！AtlasSNSへ！</p>
  <p>ユーザー登録が完了しました。
  <br>早速ログインをしてみましょう。</p>

  {{ Form::open(['url' => '/login']) }}
  {{ Form::submit('ログイン画面へ') }}
  {{ Form::close() }}

</div>

@endsection

<!-- <p class="red_btn"><a href="/login">ログイン画面へ</a></p> -->
