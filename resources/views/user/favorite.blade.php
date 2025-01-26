@extends('welcome')
@section('content')
<div class="container">
<h1>My Favorite Movies</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Release Date</th>
    </tr>
  </thead>
  <tbody>
    @foreach($favorites as $key=>$favorite)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$favorite->movie->title}}</td>
      <td>{{$favorite->movie->description}}</td>
      <td>{{$favorite->movie->release_date}}</td>
    </tr>
    @endforeach
  </tbody>
</table>

</div>

@endsection