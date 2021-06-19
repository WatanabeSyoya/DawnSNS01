@extends('layouts.login')

@section('content')
<div class='container'>
  {!! Form::open(['url' => '/result']) !!}
  <div class="">
    {!! Form::input('text', 'search', null, ['required', 'class' => 'form-control', 'placeholder' => 'ユーザー名']) !!}
  </div>
  <button class="btn btn-info" type="submit">
    <i class="fas fa-search"></i>
  </button>
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
