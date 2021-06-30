@extends('layouts.login')

@section('content')


<div class="follow_list">
  <h2>Folower List</h2>

  <div class="forrow-icon">
    @foreach ($follow_list as $follow_list)
    <a href=""><img src="{{ asset('images/'.$follow_list->images) }}"></a>
    @endforeach
  </div>

</div>


<!--   フォローユーザーの投稿  -->

@foreach ($list as $list)
<div class="table">

  <tr>

    <div class="form-icon">
      <td class="images"><img src="{{ asset('images/'.$list->images) }}"></td>
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
