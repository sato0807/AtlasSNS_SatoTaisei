@extends('layouts.logout')

@section('content')
<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/login']) !!}

<p class="welcome">AtlasSNSへようこそ</p>

{{ Form::label('mail address') }}
{{ Form::text('mail',null,['class' => 'input']) }}

{{ Form::label('password') }}
{{ Form::password('password',['class' => 'input']) }}

{{ Form::submit('ログイン',['class' => 'login_btn']) }}

{!! Form::close() !!}

<p class="text_btn"><a href="/register">新規ユーザーの方はこちら</a></p>

@endsection
