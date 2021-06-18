@extends('layouts.login')

@section('content')
<div class='container'>
  {!! Form::open(['url' => '/search']) !!}
  <div class="">
    {!! Form::input('text', 'search', null, ['required', 'class' => 'form-control', 'placeholder' => 'ユーザー名']) !!}
  </div>
  <input src="images/post.png" type="image" class="btn  pull-right">
  {!! Form::close() !!}
</div>
<table class='table table-hover'>
  @foreach ($list as $list)
  <tr>
    <td><img src="images/{{$list->user->images}}"></td>
    <td>{{ $list->posts }}</td>
    <td>{{ $list->created_at }}</td>
    <td><a class="btn btn-primary" href="/post/{{$list->id}}/update-form">更新</a></td>
    <td><a class="btn btn-danger" href="/post/{{$list->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">削除</a></td>
  </tr>
  @endforeach


  @endsection
