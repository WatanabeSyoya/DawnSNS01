@extends('layouts.login')

@section('content')
<div class='container'>

  @if(isset($search_result))
  {!! Form::open(['url' => '/search']) !!}
  <div class="">
    {!! Form::input('text', 'search_result', null, ['required', 'class' => 'form-control', 'placeholder' => 'ユーザー名']) !!}
  </div>
  <button class="btn btn-info" type="submit">
    <i class="fas fa-search"></i>
  </button>
  <h5 class="">検索ワード：{{ $search_result }}</h5>
  {!! Form::close() !!}

  <table class='table table-hover'>
    @foreach ($searched_user as $user)
    <tr>
      <td><img src="images/{{$user->images}}"></td>
      <td>{{ $user->username }}</td>
      <td><a class="btn btn-primary" href="/user/{{$user->id}}/follow">フォローする</a></td>
      <td><a class="btn btn-primary" href="/user/{{$user->id}}/unfollow">フォローを外す</a></td>
    </tr>
    @endforeach
  </table>

  @else
  {!! Form::open(['url' => '/search']) !!}
  <div class="">
    {!! Form::input('text', 'search_result', null, ['required', 'class' => 'form-control', 'placeholder' => 'ユーザー名']) !!}
  </div>
  <button class="btn btn-info" type="submit">
    <i class="fas fa-search"></i>
  </button>
  {!! Form::close() !!}

  <table class='table table-hover'>
    @foreach ($users as $user)
    <tr>
      <td><img src="images/{{$user->images}}"></td>
      <td>{{ $user->username }}</td>
      <td><a class="btn btn-primary" href="/user/{{$user->id}}/follow">フォローする</a></td>
      <td><a class="btn btn-primary" href="/user/{{$user->id}}/unfollow">フォローを外す</a></td>
    </tr>
    @endforeach
  </table>

  @endif

</div>

@endsection
