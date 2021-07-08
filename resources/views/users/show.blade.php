@extends('layouts.login')

@section('content')

<div class="follow_list">

  <tr>
    <div class="follow_info">
      <div class="form-icon">
        <td><img src="{{ asset('images/'.$user->images) }}"></td>
      </div>

      <div class="block">
        <div class="name">
          <td>
            <p>Name</p>{{$user->username}}
          </td>
        </div>
        <div class="bio">
          <td>
            <p>Bio</p>{{$user->bio}}
          </td>
        </div>
      </div>

      @if(in_array($user->id,$follower_user))
      <div class="unfollow">
        <td><a class="unfollow_btn" href="/user/{{$user->id}}/unfollow">フォローをはずす</a>
      </div>
      @else
      <div class="follow">
        <td><a class="follow_btn" href="/user/{{$user->id}}/follow">フォローする</a>
      </div>
      @endif
    </div>
  </tr>
</div>

<div class="table">
  @foreach($list as $list)
  <tr>
    <div class="form-icon">
      <td class="images"><img src="{{ asset('images/'.$list->user->images) }}"></td>
    </div>
    <div class="form-icon">
      <td class="username">{{ $list->user->username }}</td>
    </div>
    <div class="form-icon">
      <td class="posts">{{$list->posts}}</td>
    </div>
    <div class="form-icon2">
      <td class="created_at">{{ $list->created_at}}</td>
    </div>
  </tr>
  @endforeach
</div>

@endsection
