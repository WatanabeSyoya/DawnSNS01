@extends('layouts.logout')

@section('content')
<div class="login">
  {!! Form::open() !!}

  <p>DAWNSNSへようこそ</p>

  {{ Form::label('MailAdress') }}
  {{ Form::text('mail',null,['class' => 'input']) }}
  {{ Form::label('Psaaword') }}
  {{ Form::password('password',['class' => 'input']) }}

  {{ Form::submit('LOGIN') }}

  <p><a href="/register">新規ユーザーの方はこちら</a></p>

  {!! Form::close() !!}
</div>
@endsection
