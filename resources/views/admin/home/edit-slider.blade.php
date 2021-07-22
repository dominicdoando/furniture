
@extends('admin.layout.app')

@section('app')
<div class="container p-5">
  <div class="card mb-3">
    <div class="card-header">
      Edit Slider
    </div>
  </div>
  <form action="{{ url('slider/update/'.$sliders->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="old_image" value="{{ $sliders->image }}"/>
    <div class="form-group mb-3">
      <label class="mb-2" for="exampleInputEmail1">Sub title</label>
      <input type="text" name="sub" class="form-control" placeholder="Sub Title" value="{{ $sliders->sub_title}}" />
    </div>
    <div class="form-group mb-3">
      <label class="mb-2">Title</label>
      <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $sliders->title}}">
    </div>
    <div class="form-group mb-3">
      <label class="mb-2">Image</label>
      <input type="file" name="image" class="form-control" placeholder="Image">
    </div>
    <div class="form-group mb-3">
      <img src="{{ asset($sliders->image) }}" alt="" style="width:300px;">
    </div>
    <button type="submit" class="btn btn-primary">Update Slider</button>
  </form>
</div>

@endsection


@push('js')

@endpush
