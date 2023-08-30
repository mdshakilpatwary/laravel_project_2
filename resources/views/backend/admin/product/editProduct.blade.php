@extends('backend.admin.master')

@section('mainbody')

<div class="container">
    <div class="main-body">

        <div class="row">
            <div class="col-md-8 offset-md-2 py-4">
                <h2>Update product </h2>
            <form method="POST"  action="{{route('admin.product.update', $product->id)}}" enctype="multipart/form-data">
                @csrf 
                <div class="form-group mb-3">
                    <label for="pname">Product Name</label>
                    <input type="text" class="form-control" name="pname" placeholder="Enter product name" value="{{$product->pname}}" >
                </div>
                <div class="form-group mb-3">
                    <label for="pcode">Product Code</label>
                    <input type="text" class="form-control" name="pcode" placeholder="Enter product code" value="{{$product->pcode}}" >
                </div>
         
                <div class="form-group mb-3">
                    <label for="pimage">Product Image</label>
                    <input type="file" class="form-control filePimage" name="pimage" >
                </div>
                <div class="form-group mb-3">
                    <img src="{{asset('uploads/backend/product/' .$product->image)}}" class="changePImage" width="100" height="100" alt="">
                </div>
                <div class="form-group mb-3">
                    <label for="salep">Product Cost Price</label>
                    <input type="number" class="form-control" name="costp" placeholder="Enter product cost price" value="{{$product->costp}}" >
                </div>
                <div class="form-group mb-3">
                    <label for="salep">Product Sale Price</label>
                    <input type="number" class="form-control" name="salep" placeholder="Enter product sale parice" value="{{$product->salep}}" >
                </div>
                <div class="form-group mb-3">
                    <label for="pqnt">Product Quatity</label>
                    <input type="number" class="form-control" name="pqnt" placeholder="Enter product quantity" value="{{$product->qnt}}" >
                </div>
                <div class="form-group mb-3">
                    <label for="pdesc">Product Description</label>
                   <textarea name="pdesc" id="" cols="30" rows="5" class="form-control" placeholder="Enter product description">{{$product->desc}}</textarea>
                </div>
                <div class="form-group mb-3 text-center">
                    <button class="btn btn-success btn-sm">Update</button>
                </div>
            </form>
            </div>
        </div>

    </div>
</div>

<script>


$('.filePimage').change('.changePImage',function(){
    let reader =new FileReader();
    let file =document.querySelector('.filePimage').files[0];
    reader.onload =function(e){
        $(".changePImage").attr('src',e.target.result);
    }
    reader.readAsDataURL(file);
});




</script>

@endsection