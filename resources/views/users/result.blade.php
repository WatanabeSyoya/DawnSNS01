@extends('layouts.login')

@section('content')
<div class='container'>

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
