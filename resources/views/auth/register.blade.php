@extends('layouts.logout')

@section('content')
<div class="login-page">
  {!! Form::open() !!}


  <p>新規ユーザー登録</p>
  <div class="login-form">
    <div class="form-con">
      {{ Form::label('ユーザー名','UserName') }}
      {{ Form::text('username',null,['class' => 'input']) }}
    </div>
    <div class="form-con">
      {{ Form::label('メールアドレス','MailAdress') }}
      {{ Form::text('mail',null,['class' => 'input']) }}
    </div>
    <div class="form-con">
      {{ Form::label('パスワード','Password') }}
      {{ Form::text('password',null,['class' => 'input']) }}
    </div>
    <div class="form-con">
      {{ Form::label('パスワード確認','Password confirm') }}
      {{ Form::text('password-confirm',null,['class' => 'input']) }}
    </div>
    <div class="btn--orange1">
      {{ Form::submit('REGISTER') }}
    </div>
    <div class="new-user">
      <p><a href="/login">ログイン画面へ戻る</a></p>
    </div>
    {!! Form::close() !!}
  </div>
</div>
@endsection
