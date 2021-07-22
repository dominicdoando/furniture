
@extends('admin.layout.app')

@section('app')
<div class="container p-5">
  <div class="card mb-2">
    <div class="card-header">
      All Slider
    </div>
  </div>
  @if(session('success'))
  <div class="alert alert-success">
    {{ (session('success')) }}
  </div>
  @endif
  <div class="text-right mb-3">
    <a href="{{ route('slider.add') }}" class="btn btn-info">Add Slider</a>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th>Stt</th>
        <th>Sub Title</th>
        <th>Title</th>
        <th>Image</th>
        <th>Create at</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($sliders as $slider)
      <tr>
        <td scope="row">{{ $slider->id }}</td>
        <td>{{ $slider->sub_title }}</td>
        <td>{{ $slider->title }}</td>
        <td><img width="80px" src="{{ asset($slider->image) }}" alt=""></td>
        <td>{{ $slider->created_at }}</td>
        <td>
          <a href="{{ url('slider/edit/'.$slider->id) }}" class="btn btn-success">Edit</a>
          <a href="{{ url('slider/delete/'.$slider->id) }}" onclick="return confirm('Are you sure delete this?')" class="btn btn-danger">Delete</a>
        </td>
      </tr>
      @endforeach
      
    </tbody>
  </table>
</div>

@endsection