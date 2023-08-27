@extends('layouts.login')

@section('content')

<h2>Follow List</h2>
@foreach($follows as $follow)
<ul>
  <li>
    <div class="follow_icon">
      <img src="{{ asset('storage/'.$follow->images) }}" width="30px" height="30px" alt="">
    </div>
  </li>
</ul>
@endforeach

@foreach($posts as $post)
    <tr>
      <td><a href="/profile/{{ $post->user_id }}"><img src="{{ asset('storage/'.$post->user->images) }}" width="30px" height="30px" alt=""></a></td>
      <td>{{ $post->user->username }}</td>
      <td>{{ $post->post }}</td>
      <td>{{ $post->created_at }}</td>
@endforeach

@endsection
