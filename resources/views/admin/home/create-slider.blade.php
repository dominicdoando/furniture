
@extends('admin.layout.app')

@section('app')
<div class="container p-5">
  <div class="card">
    <div class="card-header mb-2">
      Add Slider
    </div>
  </div>
  <form action="{{ route('slider.storage') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-3">
      <label for="exampleInputEmail1">Sub title</label>
      <input type="text" name="sub_title" class="form-control mb-2" placeholder="Sub Title">
      @error('sub_title')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    <div class="form-group mb-3">
      <label>Title</label>
      <input type="text" name="title" class="form-control mb-2" placeholder="Title">
      @error('title')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
    </div>
    <div class="form-group mb-3">
      <label>Image</label>
      <input type="file" name="image" class="form-control mb-2" placeholder="Image">
      @error('image')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
    </div>
    <button type="submit" class="btn btn-primary">Add Slider</button>
  </form>
</div>

@endsection