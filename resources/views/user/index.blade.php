@extends('welcome')
@section('content')
<div class="container">
<div class="row">

@foreach($movies as $movie)
<div class="col-4">
<div class="card h-100" style="width: 18rem;">
  <img class="card-img-top" height="288"; width="245" src="{{asset($movie->poster_image)}}" alt="Card image cap">
  <div class="card-body">
    <h2 class="card-title">{{$movie->title}}</h2> <br> <br>
    <b>Total likes : {{$movie->favCount->count()}}</b>
    <p class="card-text" >{{$movie->description}}</p>
    @if(Auth::check() && !$movie->isFavorited)
    <a href="{{route('favorite',['movie_id' => $movie->id])}}" class="btn btn-primary">Add to Favorites</a>
    @endif
  </div>
</div>
</div>
@endforeach
</div>
</div>


@endsection