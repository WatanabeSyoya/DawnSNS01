@extends('layouts.logout')

@section('content')
<div class="login-page1">
  <div id="clear">
    <p>{{ Session('name') }}さん、</p>
    <p>ようこそ！DAWNSNSへ</p>
    <p>ユーザー登録が完了しました</p>
    <p>さっそく、ログインをしてみましょう</p>
  </div>
  <div class="new-user">
    <p><a class="btn--orange " href="/login">ログイン画面へ</a></p>
  </div>
</div>
@endsection
