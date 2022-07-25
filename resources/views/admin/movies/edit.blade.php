@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Movie</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item "><a href="{{route('admin.movies.index')}}">Movies</a></li>
                        <li class="breadcrumb-item active">Update Movie</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Movie Details</h3>
                        </div>
                        <form method="POST" action="{{route('admin.movies.update',$movie->id)}}">
                            @csrf
                            <div class="card-body">
                            <input type="hidden" name="_method" value="PUT">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control"  name="title" value="{{$movie->title}}" id="title" placeholder="Enter title">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" class="form-control" name="description" value="{{$movie->description}}" id="description" placeholder="Enter Description">
                                </div>
                                <div class="form-group">
                                    <label for="release_date"> Release Date</label>
                                    <input type="date" name="release_date" class="form-control" id="release_date" 
                                        autocomplete="off" placeholder="Release Date" value="{{$movie->release_date}}">
                                    @if ($errors->has('release_date'))
                                    <p style="color: gold">
                                        {{ $errors->first('release_date') }}
                                    </p>
                                    @endif
                                </div>
                               
                            
                                <div class="form-group">
                                    <label for="exampleInputFile">Profile Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('admin.movies.index') }}"
                                class="btn btn-danger">Cancel</a>
                            </div>
                        </form>
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