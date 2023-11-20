@extends('layouts.login')

@section('content')
  <div class="follow_icons_area">
    <h2>Follow List</h2>
    <ul class="follow_icons">
      @foreach($follows as $follow)
      <li class="follow_icon">
        <img class="image" src="{{ asset('storage/'.$follow->images) }}" alt="">
      </li>
      @endforeach
    </ul>
  </div>

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
