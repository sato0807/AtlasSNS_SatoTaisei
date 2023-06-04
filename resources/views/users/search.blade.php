@extends('layouts.login')

@section('content')

<p>ユーザー検索</p>

<form action="/search" method="get">
  <input type="search" name="keyword" value="{{ $search }}" placeholder="ユーザー名">
  <button type="submit" class="btn btn-success"><img src="/images/search.png" alt="検索"></button>
</form>

@foreach($username as $user)
<tr>
  <td>{{$user->username}}</td>
</tr>
@endforeach

@endsection
