@extends('layouts.login')

@section('content')

<form action="/search" method="get">
  <input type="search" name="keyword" value="{{ $search }}" placeholder="ユーザー名">
  <button type="submit" class="btn btn-success"><img src="/images/search.png" alt="検索"></button>
</form>

@if (isset($search))
<p>検索ワード：{{ $search }}</p>
@endif

@foreach($users as $user)
<tr>
  <!-- アイコンの表示 -->
  <td><img src="/images/icon2.png" alt="ユーザーアイコン"></td>
  <!-- ユーザー名の表示 -->
  <td>{{$user->username}}</td>
  <!-- フォローボタンの切り替え -->
  @if(Auth::user()->isFollowing($user->id))
  <td>
    <form action="{{ route('unfollow', ['id' => $user->id]) }}" method="POST">
      {{ csrf_field() }}
      {{ method_field('DELETE') }}
      <a class="btn btn-unfollow" href="/search/{{ $user->id }}/unfollow">フォロー解除</a>
    </form>
  </td>
  @else
  <td>
    <form action="{{ route('follow', ['id' => $user->id]) }}" method="POST">
      <a class="btn btn-follow" href="/search/{{ $user->id }}/follow">フォローする</a>
    </form>
  </td>
  @endif
</tr>
@endforeach

@endsection
