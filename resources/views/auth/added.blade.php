@extends('layouts.logout')

@section('content')

<div class="login_form_area">

  <h2>{{session('key')}}さん
  <br>ようこそ！AtlasSNSへ！</h2>
  <p class="login_success">ユーザー登録が完了いたしました。
  <br>早速ログインをしてみましょう！</p>

  {{ Form::open(['url' => '/login']) }}
  {{ Form::submit('ログイン画面へ',['class' => 'btn btn-danger added_btn']) }}
  {{ Form::close() }}

</div>

@endsection

<!-- <p class="red_btn"><a href="/login">ログイン画面へ</a></p> -->
