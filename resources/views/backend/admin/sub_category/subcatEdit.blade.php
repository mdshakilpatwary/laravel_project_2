@extends('backend.admin.master')

@section('mainbody')

<div class="container">
    <div class="main-body">

        <div class="row">
            <div class="col-md-8 offset-md-2 py-4">
                <h2>Add product Category </h2> <a href="{{route('admin.subcategory.manage')}}" class="btn btn-info">View All product</a>

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

            <form method="POST"  action="{{route('admin.subcategory.update', $subcat_data->id)}}" enctype="multipart/form-data">
                @csrf

                
                <div class="form-group mb-3">
                    <label for="name">Category Name</label>
                    <input type="text" class="form-control" name="subcat_name" placeholder="Enter subcategory name" value="{{$subcat_data->subcat_name}}">
                    @error('subcat_name')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
         
                <div class="form-group mb-3">
                    <label for="image">Category Image</label>
                    <input type="file" class="form-control" name="subcat_image">
                    @error('subcat_image')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mb-3">
                  <img src="{{asset('uploads/backend/subcategory/' .$subcat_data->subcat_image)}}" width="300" alt="">
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