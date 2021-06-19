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
  @foreach ($users as $user)
  <tr>
    <td><img src="images/{{$user->images}}"></td>
    <td>{{ $user->username }}</td>
    <td><a class="btn btn-primary" href="">フォローする</a></td>
  </tr>
  @endforeach
</table>
@endsection
