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
@foreach ($list as $list)
<table class='table table-hover'>
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

    <!--  更新削除ボタン  -->
    @if($user->id === $list->user_id)
    <td><a class="js-modal-open" href="" value='{{$list->id}}'><img src=" images/edit.png"></a></td>
    <td><a class="danger" href="/post/{{$list->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img src="images/trash.png" class="trash"></a></td>
    @endif
  </tr>
  @endforeach
  <!-- モーダルウインドウ -->
  <div class="modal js-modal">
    <div class="modal__bg js-modal-close"></div>
    <div class="modal__content">
      {{ Form::open(['url' => '/post/update']) }}
      <input type='text' name='upPost' value='{{$list->posts}}'>
      <input type='hidden' name='id' value='{{$list->user_id}}'>

      <div class="edit">
        <p>編集画面が表示されると、選択された投稿内容が初期から入っているように<br>最大200文字までとする</p>
        <div class="modal-img">
          <input src="images/edit.png" type="image">
        </div>
      </div>
      {{ Form::close() }}
    </div>
  </div>

</table>
<script>
  $(function() {
    $('.js-modal-open').on('click', function() {
      $('.js-modal').fadeIn();
      return false;
    });
    $('.js-modal-close').on('click', function() {
      $('.js-modal').fadeOut();
      return false;
    });
  });
</script>

@endsection
