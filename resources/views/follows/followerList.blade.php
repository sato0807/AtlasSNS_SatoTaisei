@extends('layouts.login')

@section('content')

<!-- <h2>Follower List</h2>
@foreach($followers as $follower)
<ul>
  <li>
    <div class="follower_icon">
      <img src="{{ asset('storage/'.$follower->images) }}" width="30px" height="30px" alt="">
    </div>
  </li>
</ul>
@endforeach -->

  <div class="follow_icons_area">
    <h2>Follower List</h2>
    <ul class="follow_icons">
      @foreach($followers as $follower)
      <li class="follow_icon">
        <img class="image" src="{{ asset('storage/'.$follower->images) }}" alt="">
      </li>
      @endforeach
    </ul>
  </div>

<!-- @foreach($posts as $post)
    <tr>
      <td><a href="/profile/{{ $post->user_id }}"><img src="{{ asset('storage/'.$post->user->images) }}" width="30px" height="30px" alt=""></a></td>
      <td>{{ $post->user->username }}</td>
      <td>{{ $post->post }}</td>
      <td>{{ $post->created_at }}</td>
@endforeach -->

  <div class="posts_list">
    @foreach($posts as $post)
    <div class="post">
      <div class="post_contents">
        <a href="/profile/{{ $post->user_id }}"><img src="{{ asset('storage/'.$post->user->images) }}" class="follow_img" alt=""></a>
        <div class="post_sentence">
          <p class="post_username">{{ $post->user->username }}</p>
          <p class="post_post">{{ $post->post }}</p>
        </div>
        <p class="post_created_at">{{ $post->created_at }}</p>
      </div>
    </div>
    @endforeach
  </div>

@endsection
