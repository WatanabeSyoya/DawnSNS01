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
  <h5 class="">検索ワード：{{ $search_result }}</h5>
  {!! Form::close() !!}
</div>
<table class='table table-hover'>
  @foreach ($users as $users)
  <tr>
    <td><img src="images/{{$users->images}}"></td>
    <td>{{ $users->username }}</td>
    <td><a class="btn btn-primary" href="/search">フォローする</a></td>
  </tr>
  @endforeach
</table>
@endsection
