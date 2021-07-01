@extends('layouts.login')

@section('content')



<div class="profile-table">
  <tr>
    {{ Form::open(['url' => '/profile-update','files' => true]) }}
    <div class="user-icon">
      <img src="{{ asset('images/'.$user->images) }}">
    </div>

    <div class="user_form">

      <div class="input-form">
        <td>
          <p>UserName</p><input type="text" name="username" value='{{$user->username}}'>
        </td><br>
      </div>
      <div class="input-form">
        <td>
          <p>MailAdress</p><input type="text" name="mail" value='{{$user->mail}}'>
        </td><br>
      </div>
      <div class="input-form">
        <td>
          <p>password</p><input type="password" name="password" value='{{$user->password}},'>
        </td><br>
      </div>
      <div class="input-form">
        <td>
          <p>New Password</p><input type="text" name="newpassword" value=''>
        </td><br>
      </div>
      <div class="input-form">
        <td>
          <p>Bio</p><input type="text" name="bio" value='{{$user->bio}}'>
        </td><br>
      </div>
      <!--  画像部分  -->
      <div class="input-form">
        <td>
          <p>Icon Image</p><input type="file" id="file" name="images" class="form-control">
        </td>
      </div>

      <div class="submit">
        {{ Form::submit('更新') }}
      </div>

    </div>

    {{ Form::close() }}

  </tr>
</div>


@endsection
