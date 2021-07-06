@extends('layouts.login')

@section('content')
<div class='container'>
  <div class="top_image">
    @if($user->images == "dawn.png")
    <img class="image" src="{{ asset('images/'.$user->images) }}">
    @else
    <img class="image" src="{{ asset('storage/image/'.$user->images) }}">
    @endif
  </div>
  {!! Form::open(['url' => 'post/create', 'class' => 'post_top']) !!}
  <div class="post">
    {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '何をつぶやこうか...?']) !!}
  </div>
  <div class="post_icon">
    <input src="images/post.png" type="image" class="btn  pull-right">
  </div>
  {!! Form::close() !!}
</div>
<table class='table table-hover'>
  @foreach ($list as $list)
  <tr>
    <td>
      @if($list->user->images == "dawn.png")
      <img class="image" src="{{ asset('images/'.$list->user->images) }}">
      @else
      <img class="image" src="{{ asset('storage/image/'.$list->user->images) }}">
      @endif
    </td>
    <td>{{ $list->user->username }}</td>
    <td>{{ $list->posts }}</td>
    <td>{{ $list->created_at }}</td>
    @if($user->id == $list->user_id)
    <td><a class="btn btn-primary" href="/post/{{$list->id}}/update-form">更新</a></td>
    <td><a class="btn btn-danger" href="/post/{{$list->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">削除</a></td>
    @endif
  </tr>
  @endforeach
</table>
@endsection
