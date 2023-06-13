@extends('layouts.login')

@section('content')

<form action="/search" method="get">
  <input type="search" name="keyword" value="{{ $search }}" placeholder="ユーザー名">
  <button type="submit" class="btn btn-success"><img src="/images/search.png" alt="検索"></button>
</form>

@if (isset($search))
<p>検索ワード：{{ $search }}</p>
@endif

@foreach($username as $user)
<tr>
  <td><img src="/images/icon2.png" alt="ユーザーアイコン"></td>
  <td>{{$user->username}}</td>
</tr>
@endforeach

@endsection
