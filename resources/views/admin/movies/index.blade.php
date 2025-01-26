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
              <!-- <div class="form-group mb-3 mb-md-0 d-flex align-items-center">
                <label for="date" class="mb-0 px-0 pr-2">Start Date</label>
                <input type="date" value="" name="start_date" class="form-control" id="date" placeholder="Date">
              </div>
              <div class="form-group mb-3 mb-md-0 d-flex align-items-center">
                <label for="date" class="mb-0 px-0 pr-2">End Date</label>
                <input type="date" value="" name="end_date" class="form-control" id="date" placeholder="Date">
              </div> -->
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
                    <th>Publish</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($movies as $key=>$movie)
                  <tr>
                    <td>
                      <img class="position-absolute rounded" style="height: 35px; width: 35px;" src="{{asset($movie->poster_image)}}" style="object-fit: cover;">
                    </td>
                    <td>{{$movie->title}}</td>
                    <td>{{$movie->description}}</td>
                    <td>{{$movie->release_date}}</td>
                    <td>
                      {{$movie->is_published ? 'Published' : 'Unpublished'}}
                    </td>
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