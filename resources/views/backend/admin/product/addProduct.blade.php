@extends('backend.admin.master')

@section('mainbody')

<div class="container">
    <div class="main-body">

        <div class="row">
            <div class="col-md-8 offset-md-2 py-4">
                <h2>Add product </h2> <a href="{{route('admin.product.manage')}}" class="btn btn-info">View All product</a>

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

            <form method="POST"  action="{{route('admin.product.add')}}" enctype="multipart/form-data">
                @csrf

                
                <div class="form-group mb-3">
                    <label for="pname">Product Name</label>
                    <input type="text" class="form-control" name="pname" placeholder="Enter product name" >
                    @error('pname')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="pcode">Product Code</label>
                    <input type="text" class="form-control" name="pcode" placeholder="Enter product code" value="{{old('pcode')}}" >
                    @error('pcode')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
         
                <div class="form-group mb-3">
                    <label for="pimage">Product Image</label>
                    <input type="file" class="form-control" name="pimage">
                    @error('pimage')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="salep">Product Cost Price</label>
                    <input type="number" class="form-control" name="costp" placeholder="Enter product cost price">
                    @error('costp')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="salep">Product Sale Price</label>
                    <input type="number" class="form-control" name="salep" placeholder="Enter product sale parice">
                    @error('salep')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="pqnt">Product Quatity</label>
                    <input type="number" class="form-control" name="pqnt" placeholder="Enter product quantity">
                    @error('pqnt')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="pdesc">Product Description</label>
                   <textarea name="pdesc" id="" cols="30" rows="5" class="form-control" placeholder="Enter product description"></textarea>
                   @error('pdesc')
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