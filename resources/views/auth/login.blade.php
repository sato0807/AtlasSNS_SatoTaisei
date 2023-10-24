@extends('layouts.logout')

@section('content')

<div class="login_form_area">
  <h2>AtlasSNSへようこそ</h2>

  <!-- 適切なURLを入力してください -->
  {!! Form::open(['url' => '/login']) !!}

  <div class="login_form_input">
    {{ Form::label('mail address') }}
    {{ Form::text('mail',null,['class' => 'input']) }}

    {{ Form::label('password') }}
    {{ Form::password('password',['class' => 'input']) }}
  </div>

  {{ Form::submit('LOGIN',['class' => 'btn btn-danger login_btn']) }}

  {!! Form::close() !!}

  <p class="text_btn"><a href="/register">新規ユーザーの方はこちら</a></p>
</div>


@endsection
