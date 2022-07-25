@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>New Movie</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item "><a href="{{route('admin.movies.index')}}">Movies</a></li>
                        <li class="breadcrumb-item active">New Movie</li>
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
                        <form method="POST" action="{{route('admin.movies.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title"> Title</label>
                                    <input type="text" class="form-control"  name="title" id="title" placeholder="Enter Movie title">
                                    @if ($errors->has('title'))
                                        <p style="color: red">
                                            {{ $errors->first('title') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" class="form-control" name="description" id="description" placeholder="Enter Description">
                                    @if ($errors->has('description'))
                                        <p style="color: red">
                                            {{ $errors->first('description') }}
                                        </p>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <label for="release_date"> Release Date</label>
                                    <input type="date" name="release_date" class="form-control" id="release_date"
                                        autocomplete="off" placeholder="Release Date" value="{{ old('release_date')}}">
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
                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="profile_image">
                                            <label class="custom-file-label" for="profile_image">Choose file</label>
                                            @if ($errors->has('profile_image'))
                                        <p style="color: red">
                                            {{ $errors->first('profile_image') }}
                                        </p>
                                        @endif
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