@extends('layouts.login')

@section('content')

  <!-- 条件分岐
  ログインユーザーかそうでないかで自分プロフィール・相手プロフィールの選別 -->
  @if(isset($user_login))
  <!-- isset()は()内の値が存在したら正を表す -->

    <!-- ログインユーザーのプロフィール -->
    <div class="profile_area">
      {{ Form::open(['url' => '/profile', 'files' => true]) }}
      <!-- file形式の際は「'files' => true」が必要 -->
      <!-- https://laraweb.net/practice/7965/ -->
        <div class="login_profile">
          <!-- ユーザーアイコン -->
          <div class="profile_image">
            <img class="image" src="{{ asset('storage/'.Auth::user()->images) }}" alt="image">
          </div>
          <div class="profile_form">
            <!-- ユーザー名 -->
            <div class="one_of_the_profile">
              <p class="profile_form_title">user name</p>
              {{ Form::text('upUsername', $user_login->username, ['class' => 'profile_form_content', 'placeholder' => '氏名']) }}
            </div>
            <!-- メールアドレス -->
            <div class="one_of_the_profile">
              <p class="profile_form_title">mail adress</p>
              {{ Form::email('upMail', $user_login->mail, ['class' => 'profile_form_content', 'placeholder' => 'メールアドレス']) }}
            </div>
            <!-- パスワード -->
            <div class="one_of_the_profile">
              <p class="profile_form_title">password</p>
              {{ Form::password('upPassword', ['class' => 'profile_form_content', 'placeholder' => 'パスワード']) }}
            </div>
            <!-- パスワード確認 -->
            <div class="one_of_the_profile">
              <p class="profile_form_title">password comfirm</p>
              {{ Form::password('upPassword_confirmation', ['class' => 'profile_form_content', 'placeholder' => 'パスワード確認']) }}
            </div>
            <!-- 自己紹介文 -->
            <div class="one_of_the_profile">
              <p class="profile_form_title">bio</p>
              {{ Form::text('upBio', $user_login->bio, ['class' => 'profile_form_content', 'placeholder' => '自己紹介文']) }}
            </div>
            <!-- アイコン画像 -->
            <div class="one_of_the_profile">
              <p class="profile_form_title">icon image</p>
              {{ Form::label('fileImage','ファイルを選択', ['class' => 'file_select_btn']) }}
              {{ Form::file('upImages',['class' => 'profile_form_image', 'id' => 'fileImage']) }}
            </div>
          </div>
        </div>
        {{ Form::submit('更新', ['type' => 'submit', 'class' => 'btn btn-danger btn_update']) }}
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

  <!-- 他のユーザーのプロフィール -->
  @else

    <div class="post_form">
      <div class="other_profile">
        <img class="image" src="{{ asset('storage/'.$user->images) }}" alt="">
        <div class="simple_profiles">
          <div class="simple_profile">
            <p class="profile_title">name</p>
            <p class="profile_content">{{$user->username}}</p>
          </div>
          <div class="simple_profile">
            <p class="profile_title">bio</p>
            <p class="profile_content">{{$user->bio}}</p>
          </div>
        </div>
        @if(Auth::user()->isFollowing($user->id))
          <div class="profile_btn_follow">
            <form action="{{ route('unfollow', ['id' => $user->id]) }}" method="POST" class="btn btn-danger btn_unfollow">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <a href="/profile/{{ $user->id }}/unfollow">フォロー解除</a>
            </form>
          </div>
        @else
          <div class="profile_btn_follow">
            <form action="{{ route('follow', ['id' => $user->id]) }}" method="POST" class="btn btn-primary btn_follow">
              <a href="/profile/{{ $user->id }}/follow">フォローする</a>
            </form>
          </div>
        @endif
      </div>
    </div>

    <div class="posts_list">
      @foreach($posts as $post)
      <div class="post">
        <div class="post_contents">
          <img src="{{ asset('storage/'.$user->images) }}" class="follow_img" alt="">
          <div class="post_sentence">
            <p class="post_username">
              {{$user->username}}
            </p>
            <p class="post_post">
              {{$post->post}}
            </p>
          </div>
          <p class="post_created_at">
            {{$post->updated_at}}
          </p>
        </div>
      </div>
      @endforeach
    </div>

  @endif

@endsection
