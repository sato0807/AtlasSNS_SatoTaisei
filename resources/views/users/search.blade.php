@extends('layouts.login')

@section('content')

  <div class="search_form">
    <form action="/search" method="get" >
      <input type="search" class="search_form_frame" name="keyword" value="{{ $search }}" placeholder="ユーザー名">
      <button type="submit" class="btn_search"><img src="/images/search.png" alt="検索"></button>
    </form>
    @if (isset($search))
      <p class="search_word">検索ワード：{{ $search }}</p>
    @endif
  </div>

  <div class="other_users_list">
    @foreach($users as $user)
    <div class="other_user">
        <!-- アイコンの表示 -->
        <img class="image" src="{{ asset('storage/'.$user->images) }}" alt="ユーザーアイコン">
        <!-- ユーザー名の表示 -->
        <p class="search_username">{{$user->username}}</p>
        <!-- フォローボタンの切り替え -->
        <!-- if文の条件「フォローIDに自分のIDがある中でフォロワーに$userのIDがあったら」
        ログインしている人のユーザー情報->このユーザー情報を基にisFollowing()を読み込む -->
        <div class="follow_select">
          @if(Auth::user()->isFollowing($user->id))
          <form action="{{ route('unfollow', ['id' => $user->id]) }}" method="POST" class="btn btn-danger btn_unfollow">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <a href="/search/{{ $user->id }}/unfollow">フォロー解除</a>
          </form>
          @else
          <form action="{{ route('follow', ['id' => $user->id]) }}" method="POST" class="btn btn-primary btn_follow">
            <a href="/search/{{ $user->id }}/follow">フォローする</a>
          </form>
          @endif
        </div>
      </div>
      @endforeach
    </div>

    @endsection
