@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Movies</h1>
          </div>
          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Movies</li>
            </ol>
          </div>
          <div class="col-sm-3">
          <a href="{{route('admin.movies.create')}}" class="btn  btn-success">New Movie</a>
          </div>
          <div>
        </div>
        
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Total Movies</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Poster</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Release Date</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($movies as $movie)
                  <tr>
                  <td>{{$movie->poster}}</td>
                    <td>{{$movie->title}}</td>
                    <td>{{$movie->description}}</td>
                    <td>{{$movie->release_date}}</td>
                    <td>
                      <a href="{{route('admin.movies.edit',$movie->id)}}">
                      Edit 
                      </a>         
                     
                      </td>
                  </tr>
                  @endforeach               
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

           
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
