@extends('layouts.logout')

@section('content')
<div class="login-page">
  {!! Form::open() !!}

  <p>DAWNSNSへようこそ</p>
  <div class="login-form">
    <div class="form-con">
      {{ Form::label('Mail Adress') }}
      {{ Form::text('mail',null,['class' => 'input']) }}
    </div>
    <div class="form-con">
      {{ Form::label('Password') }}
      {{ Form::password('password',['class' => 'input']) }}
    </div>
  </div>

  <div class="btn--orange1">
    {{ Form::submit('LOGIN') }}
  </div>

  <div class="new-user">
    <p><a href="/register">新規ユーザーの方はこちら</a></p>
  </div>


  {!! Form::close() !!}

</div>
@endsection
