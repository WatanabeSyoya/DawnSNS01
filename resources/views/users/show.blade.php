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
        <div class="bio">{{$user->bio}}
          <td>
            <p>Bio</p>
          </td>
        </div>
      </div>
    </div>

    @if(in_array($user->id,$follower_user))
    <div class="unfollow">
      <td><button><a class="unfollow_btn" href="/user/{{$user->id}}/unfollow">フォローをはずす</a></button>
    </div>
    @else
    <div class="follow">
      <td><button><a class="follow_btn" href="/user/{{$user->id}}/follow">フォローする</a></button>
    </div>
    @endif


  </tr>

</div>

<div class="table">
  @foreach($list as $list)
  <tr>
    <div class="form-icon">
      <td class="images"><img src="{{ asset('images/'.$list->user->images) }}"></td>
    </div>

    <td class="username">{{ $list->user->username }}</td>
    <td class="created_at">{{ $list->created_at}}</td>
    <td class="posts">{{$list->posts}}</td>
  </tr>
  @endforeach
</div>

@endsection
