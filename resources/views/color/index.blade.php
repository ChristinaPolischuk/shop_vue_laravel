@extends('layouts.main')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Colors</h1>
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
                <a class="btn btn-primary" href="{{ route('color.create') }}">Add</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" bis_skin_checked="1">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name of Color</th>
                      <th>Color</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($colors as $color)
                      <tr>
                        <td>{{ $color->id }}</td>
                        <td>
                          <a href="{{ route('color.show', $color->id) }}">{{ $color->title }}</a>
                        </td>
                        <td>
                          <div style="width:16px;height:16px;background:{{'#'. $color->title}}"></div>
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
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection