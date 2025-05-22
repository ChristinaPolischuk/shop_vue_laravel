@extends('layouts.main')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Main page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        <div class="col-12" bis_skin_checked="1">
            <div class="card" bis_skin_checked="1">
              <div class="card-header" bis_skin_checked="1">
                <a class="btn btn-primary" href="{{ route('user.create') }}">Add</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" bis_skin_checked="1">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Surname</th>
                      <th>Patronymic</th>
                      <th>Email</th>
                      <th>Age</th>
                      <th>Gender</th>
                      <th>Address</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $user)
                      <tr>
                        <td>{{ $user->id }}</td>
                        <td>
                          <a href="{{ route('user.show', $user->id) }}">{{ $user->name }}</a>
                        </td>
                        <td>{{ $user->surname }}</td>
                        <td>{{ $user->patronymic }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->age }}</td>
                        <td>{{ $user->genderTitle }}</td>
                        <td>{{ $user->address }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection