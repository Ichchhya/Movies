@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Users</h1>
        </div>

        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Users</li>
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
          <div class="card">
           
            <div class="card-header">
            <a class="d-flex align-item-center mt-2 pb-3" href="{{ route('admin.users.index') }}" title="Refresh">
              <i class="fas fa-redo fa-1x"> Refresh </i>
            </a>
              <!-- <h3 class="card-title">Total Users</h3> -->
            </div>
            <div class="px-5">
              <form action="{{ route('admin.users.index') }}" class='d-flex align-items-center' style="margin-left: 20px;" method="GET">
                <div class="form-group mb-3 px-2 mb-md-0 d-flex align-items-center">
                  <label for="date" class="mb-0 px-0 pr-2">Start Date</label>
                  <input type="date" value="{{$start_date}}" name="start_date" class="form-control" id="date" placeholder="Date">
                </div>
                <div class="form-group mb-3 px-2 mb-md-0 d-flex align-items-center">
                  <label for="date" class="mb-0 px-0 pr-2">End Date</label>
                  <input type="date" value="{{$end_date}}" name="end_date" class="form-control" id="date" placeholder="Date">
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-filter fa-sm mr-2"></i> Filter</button>
            </div>
            </form>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Favorite Movies</th>
                  </tr>
                </thead>
                <tbody>

                  @foreach($users as $user)
                  <tr>

                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                      @foreach($user->favorites as $favorite)
                      <ul>
                      <li>
                      {{$favorite->movie->title}}
                      </li>
                      </ul>
                      @endforeach
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