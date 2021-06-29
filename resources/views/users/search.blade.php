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
    @foreach ($users as $user)
    <tr>
      <td><img src="images/{{$user->images}}"></td>
      <td>{{ $user->username }}</td>

      @if(in_array($user->id,$follower_user))
      <div class="unfollow">
        <td><button><a class="unfollow" href="/user/{{$user->id}}/unfollow">フォローを外す</a></button>
      </div>

      @else
      <div class="follow">
        <td><button><a class="follow" href="/user/{{$user->id}}/follow">フォローする</a></button>
      </div>

      @endif
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

      @if(in_array($user->id,$follower_user))
      <div class="unfollow">
        <td><button><a class="unfollow_btn" href="/user/{{$user->id}}/unfollow">フォローをはずす</a></button>
      </div>
      @else
      <div class="follow">
        <td><button><a class="follow_btn" href="/user/{{$user->id}}/follow">フォローする</a></button>
      </div>
      @endif

    </tr>
    @endforeach
  </table>

  @endif

</div>

@endsection
