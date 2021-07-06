@extends('layouts.login')

@section('content')


<div class="follow_list">
  <h2>Follow List</h2>

  <div class="forrow-icon">
    @foreach ($follow_list as $follow_list)
    <a href="user/{{$follow_list->follow}}/show">
      @if($follow_list->images == "dawn.png")
      <img class="image" src="{{ asset('images/'.$follow_list->images) }}">
      @else
      <img class="image" src="{{ asset('storage/image/'.$follow_list->images) }}">
      @endif
    </a>
    @endforeach
  </div>

</div>


@foreach ($list as $list)
<div class="table">

  <tr>

    <div class="form-icon">
      <td class="images"><a href="user/{{$list->user_id}}/show">
          @if($list->images == "dawn.png")
          <img class="image" src="{{ asset('images/'.$list->images) }}">
          @else
          <img class="image" src="{{ asset('storage/image/'.$list->images) }}">
          @endif
        </a></td>
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
