@extends('layouts.main')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Group</h1>
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
              <div class="card-header d-flex p-3" bis_skin_checked="1">
                <div class="mr-3">
                  <a class="btn btn-primary" href="{{ route('group.edit', $group->id) }}">Edit</a>
                </div>
                <form action="{{route('group.delete', $group->id)}}" method="post">
                  @csrf
                  @method('delete') 
                  <input class="btn btn-danger" type="submit" value="Delete">
                </form>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" bis_skin_checked="1">
                <table class="table table-hover text-nowrap">
                  <tbody>
                    <tr>
                      <td>ID</td>
                      <td>{{ $group->id }}</td>
                    </tr>
                    <tr>
                      <td>Group's name</td>
                      <td>{{ $group->title }}</td>
                    </tr>
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