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
          {{ Form::label('ユーザー名','UserName') }}
          {{ Form::text('username',$user->username) }}
        </td>
      </div>
      <div class="input-form">
        <td>
          {{ Form::label('メールアドレス','MailAdress') }}
          {{ Form::text('mail',$user->mail) }}
        </td>
      </div>
      <div class="input-form">
        <td>
          {{ Form::label('パスワード','Password') }}
          {{ Form::text('password',$user->password,['readonly']) }}
        </td><br>
      </div>
      <div class="input-form">
        <td>
          {{ Form::label('新しいパスワード','New Password') }}
          {{ Form::text('newpassword',null) }}
        </td><br>
      </div>
      <div class="input-form">
        <td>
          {{ Form::label('自己紹介','Bio') }}
          {{ Form::text('bio',$user->bio) }}
        </td><br>
      </div>
      <!--  画像部分  -->
      <div class="input-form">
        <td>
          {{ Form::label('アイコン画像','Icon Image') }}
          {{ Form::file('images', null) }}
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
