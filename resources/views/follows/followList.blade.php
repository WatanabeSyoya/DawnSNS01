@extends('layouts.login')

@section('content')


<div class="follow_list">
  <h2>Follow</h2>

  <div class="forrow-icon">
    @foreach ($follow_list as $follow_list)
    <a href="user/{{$follow_list->follow}}/show"><img src="{{ asset('images/'.$follow_list->images) }}"></a>
    @endforeach
  </div>

</div>


@foreach ($list as $list)
<div class="table">

  <tr>

    <div class="form-icon">
      <td class="images"><a href="user/{{$list->user_id}}/show"><img src="{{ asset('images/'.$list->images) }}"></a></td>
    </div>

    <div class="form-table">
      <div class="block">
        <td class="username">{{ $list->username }}</td>
        <div class="form-posts">
          <td class="posts">{{ $list->posts }}</td>
        </div>
      </div>

      <div class="created_at">
        <td class="created-at">{{ $list->created_at }}</td>
      </div>
    </div>
  </tr>


</div>
@endforeach

@endsection
