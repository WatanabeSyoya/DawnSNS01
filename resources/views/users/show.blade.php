@extends('layouts.login')

@section('content')

<div class="follow_list">

  <tr>
    <div class="follow_info">
      <div class="form-icon">
        <td><img src=""></td>
      </div>

      <div class="block">
        <div class="name">
          <td>
            <p>Name</p>{{}}
          </td>
        </div>
        <div class="bio">
          <td>
            <p>Bio</p>{{}}
          </td>
        </div>
      </div>
    </div>

    <div class="follow-button">

      <div class="unfollow">
        <td><button><a class="unfollow" href="">フォローを外す</a></button>/
      </div>

      <div class="follow">
        <td><button><a class="follow" href="">フォローする</a></button>
      </div>

    </div>


  </tr>

</div>

<div class="table">
  <!--@foreach($other_list as $other_list)
  <tr>
    <div class="form-icon">
      <td class="images"><img src="{{ asset('images/'.$bio->images) }}"></td>
    </div>

    <td class="username">{{ $bio->username }}</td>
    <td class="created_at">{{ $bio->created_at}}</td>
    <td class="posts">{{$other_list->posts}}</td>
  </tr>
  @endforeach -->

</div>

@endsection
