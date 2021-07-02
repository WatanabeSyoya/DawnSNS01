@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<h2>新規ユーザー登録</h2>

{{ Form::label('ユーザー名','UserName') }}
{{ Form::text('username',null,['class' => 'input']) }}

{{ Form::label('メールアドレス','MailAdress') }}
{{ Form::text('mail',null,['class' => 'input']) }}

{{ Form::label('パスワード','Password') }}
{{ Form::text('password',null,['class' => 'input']) }}

{{ Form::label('パスワード確認','Password confirm') }}
{{ Form::text('password-confirm',null,['class' => 'input']) }}

{{ Form::submit('REGISTER') }}

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
