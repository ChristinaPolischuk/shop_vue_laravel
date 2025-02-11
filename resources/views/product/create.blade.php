@extends('layouts.main')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Main page</li>
            </ol>
          </div>
        </div>
      </div>
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
          @csrf

          <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="Title" value="{{ old('title') }}" required>
          </div>

          <div class="form-group">
            <input type="text" name="description" class="form-control" placeholder="Description" value="{{ old('description') }}" required>
          </div>

          <div class="form-group">
            <textarea name="content" class="form-control" placeholder="Content" required>{{ old('content') }}</textarea>
          </div>

          <div class="form-group">
            <input type="text" name="price" class="form-control" placeholder="Price" value="{{ old('price') }}" required>
          </div>

          <div class="form-group">
            <input type="text" name="count" class="form-control" placeholder="Quantity" value="{{ old('count') }}" required>
          </div>

          <div class="form-group">
            <div class="input-group">
              <div class="custom-file">
                <input name="preview_image" type="file" class="custom-file-input">
                <label class="custom-file-label">Choose image</label>
              </div>
              <div class="input-group-append">
                <span class="input-group-text">Upload</span>
              </div>
            </div>
          </div>

          <div class="form-group">
            <select name="category_id" class="form-control select2" style="width: 100%;" required>
              <option disabled {{ old('category_id') ? '' : 'selected' }}>Choose category</option>
              @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                  {{ $category->title }}
                </option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <select name="tags[]" class="tags" multiple="multiple" data-placeholder="Choose tag" style="width: 100%;">
              @foreach($tags as $tag)
                <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', [])) ? 'selected' : '' }}>
                  {{ $tag->title }}
                </option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <select name="colors[]" class="colors" multiple="multiple" data-placeholder="Choose a color" style="width: 100%;">
              @foreach($colors as $color)
                <option value="{{ $color->id }}" {{ in_array($color->id, old('colors', [])) ? 'selected' : '' }}>
                  {{ $color->title }}
                </option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Add">
          </div>
        </form>
      </div>
    </div>
  </section>
@endsection