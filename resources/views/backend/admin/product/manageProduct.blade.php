@extends('backend.admin.master')

@section('mainbody')

<div class="container py-5">

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

<table id="datatablesSimple" class="table">
                                    <thead>
                                        <tr>
                                            <th>#ID</th>
                                            <th>Product Name</th>
                                            <th>Product ID</th>
                                            <th>Cost price </th>
                                            <th>Sale price</th>
                                            <th>Quantity</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                 
                                    <tbody>
                                        @if(count($products) > 0)
                                        @foreach($products as $product)

                                        <tr>
                                            <td>{{$product->id }}</td>
                                            <td>{{$product->pname }}</td>
                                            <td>{{$product->pcode }}</td>
                                            <td>{{$product->costp }}</td>
                                            <td>{{$product->salep }}</td>
                                            <td>{{$product->qnt }}</td>
                                            <td>{{$product->desc }}</td>
                                            <td><img src="{{asset('uploads/backend/product/'.$product->image)}}" alt="" width="50" height="50"></td>
                                            <td>
                                              @if($product->status == 'active')
                                              <a href="{{route('admin.product.status', $product->id)}}" class="btn btn-sm btn-success">{{$product->status }}</a>
                                              @else
                                              <a href="{{route('admin.product.status', $product->id)}}" class="btn btn-sm btn-warning">{{$product->status }}</a>
                                              @endif


                                            </td>
                                            <td> <a href="{{route('admin.product.edit', $product->id)}}"  class="btn btn-sm btn-info" ><i class="fa fa-edit"></i></a> <button data-bs-toggle="modal" data-bs-target="#deletePmodel_{{$product->id}}"  class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button> </td>
                                        </tr>



                                        <!-- product Delete Modal -->
<div class="modal fade" id="deletePmodel_{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are You sure want to delete This prodact item ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="{{route('admin.product.delete', $product->id)}}" type="button" class="btn btn-primary">Delete</a>
      </div>
    </div>
  </div>
</div>
                                        @endforeach

                                        @else

                                        <tr>
                                            <td colspan="10" class="text-center bg-warning">No data here</td>
                                        </tr>

                                        @endif
                                        
                                        

                                    </tbody>

                                    <tfoot>
                                         <tr>
                                            <th>#ID</th>
                                            <th>Product Name</th>
                                            <th>Product ID</th>
                                            <th>Cost price </th>
                                            <th>Sale price</th>
                                            <th>Quantity</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    
                                </table>
</div>



@endsection