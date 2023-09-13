@extends('layouts.login')

@section('content')

<!-- 条件分岐
ログインユーザーかそうでないかで自分プロフィール・相手プロフィールの選別 -->
@if(isset($user_login))
<!-- isset()は()内の値が存在したら正を表す -->

<!-- ログインユーザーのプロフィール -->
{{ Form::open(['url' => '/profile', 'files' => true]) }}
<!-- file形式の際は「'files' => true」が必要 -->
<!-- https://laraweb.net/practice/7965/ -->
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
    {{ Form::file('upImages',['class' => 'form-control']) }}
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

<!-- 他のユーザーのプロフィール -->
@else
<div>
  <img src="{{ asset('storage/'.$user->images) }}" width="30px" height="30px" alt="">
</div>
<tr>
  <td>name</td>
  <td>{{$user->username}}</td>
</tr>
<tr>
  <td>bio</td>
  <td>{{$user->bio}}</td>
</tr>
@if(Auth::user()->isFollowing($user->id))
<td>
  <form action="{{ route('unfollow', ['id' => $user->id]) }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <a class="btn btn-unfollow" href="/profile/{{ $user->id }}/unfollow">フォロー解除</a>
  </form>
</td>
@else
<td>
  <form action="{{ route('follow', ['id' => $user->id]) }}" method="POST">
    <a class="btn btn-follow" href="/profile/{{ $user->id }}/follow">フォローする</a>
  </form>
</td>
@endif

@foreach($posts as $post)
<div>
  <img src="{{ asset('storage/'.$user->images) }}" width="30px" height="30px" alt="">
</div>
<tr>
  <td>{{$user->username}}</td>
</tr>
<tr>
  <td>{{$post->post}}</td>
  <td>{{$post->updated_at}}</td>
</tr>

@endforeach

@endif

@endsection
