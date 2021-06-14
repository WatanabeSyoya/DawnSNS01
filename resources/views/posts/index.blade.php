@extends('layouts.login')

@section('content')
<div class='container'>
  {!! Form::open(['url' => 'post/create']) !!}
  <div class="">
    {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '何をつぶやこうか...?']) !!}
  </div>
  <input src="images/post.png" type="image" class="btn  pull-right">
  {!! Form::close() !!}
</div>
<table class='table table-hover'>
  <tr>
    <th>投稿No</th>
    <th>投稿内容</th>
    <th>投稿日時</th>
  </tr>
  @foreach ($list as $list)
  <tr>
    <td>{{ $list->id }}</td>
    <td>{{ $list->posts }}</td>
    <td>{{ $list->created_at }}</td>
    <td><a class="btn btn-primary" href="/post/{{$list->id}}/update-form">更新</a></td>
    <td><a class="btn btn-danger" href="/post/{{$list->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">削除</a></td>
  </tr>
  @endforeach
</table>
@endsection
