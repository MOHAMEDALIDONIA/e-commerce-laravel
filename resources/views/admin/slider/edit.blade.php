@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12 ">
        @if (session('message'))
        <h6 class="alert alert-success">{{session('message')}}</h6>
        @endif
        <div class="card">
            <div class="card-header">
              <h3>Edit Sliders
             <a href="{{url('admin/sliders')}}" class="btn btn-danger btn-sm text-white float-end">Back</a> 
              </h3>

            </div>
            <div class="card-body">
                <form action="{{url('admin/sliders/'.$slider->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label >Slider Title</label>
                        <input type="text" name="title" value="{{$slider->title}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label >Description</label>
                        <textarea rows="3" name="description"  class="form-control"> {{$slider->description}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label >Image</label>
                        <input type="file" name="image" class="form-control"/>
                        <img src="{{asset("$slider->image")}}" alt="" style="width:50px;height:50px">
                    </div>
                    <div class="mb-3">
                        <label >Status</label><br>
                        <input type="checkbox" name="status" {{$slider->status == '1' ? 'checked':''}}>Checked = Hidden, UnChecked = Visible 
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>   
@endsection   