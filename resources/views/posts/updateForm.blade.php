@extends('layouts.login')

@section('content')
<div class='container'>
  {!! Form::open(['url' => 'post/update']) !!}
  <div class="">
    {!! Form::hidden('id', $post->id) !!}
    {!! Form::input('text', 'upPost', $post->posts, ['required', 'class' => 'form-control']) !!}
  </div>
  <input src="{{ asset('images/post.png') }}" type="image" class="btn  pull-right">
  {!! Form::close() !!}
</div>
@endsection
