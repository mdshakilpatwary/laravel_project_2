@extends('backend.admin.master')

@section('mainbody')

<div class="container">
    <div class="main-body">

        <div class="row">
            <div class="col-md-8 offset-md-2 py-4">
                <h2>Add product sub-Category </h2> <a href="{{route('admin.subcategory.manage')}}" class="btn btn-info">View All product</a>

@if(session('status'))

<div class="container py-5">
<div class="alert alert-warning alert-dismissible fade show alertsuccess" role="alert">
  <strong>Success</strong> {{ session('status')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

@elseif(session('error'))
<div class="container py-5">
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Success</strong> {{ session('error')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

@endif

            <form method="POST"  action="{{route('admin.subcategory.add')}}" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-3">
                    <label for="cname">Select Category</label>
                    <select name="cat_id" id="" class="form-control">
                        <option value="0">----Select------</option>
                        @foreach($cat_data as $data)
                        <option value="{{ $data->id}}">{{ $data->cat_name}}</option>
                        @endforeach

                    </select>
                    @error('cat_id')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="cname">SubCategory Name</label>
                    <input type="text" class="form-control" name="subcat_name" placeholder="Enter subcategory name" >
                    @error('subcat_name')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
           
         
                <div class="form-group mb-3">
                    <label for="subcatimage">Category Image</label>
                    <input type="file" class="form-control" name="subcat_image">
                    @error('subcat_image')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mb-3 text-center">
                    <button class="btn btn-success btn-lg">Add</button>
                </div>
            </form>
            </div>
        </div>

    </div>
</div>

@endsection