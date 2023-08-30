@extends('backend.admin.master')

@section('mainbody')

<div class="container">
   <div class="row">
    <div class="col-md-10 offset-md-1 pt-5">
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
    <table class="table" border="1">
        <thead>
            <th>#Sl</th>
            <th>SubCatagory Name</th>
            <th> Cat_Id </th>
            <th> Cat_slug </th>
            <th> SubCat Image</th>
            <th> Status</th>
            <th> Action</th>
        </thead>
        <tbody>
            @if(count($subcat_data) > 0)

            @foreach($subcat_data as $data)
            <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->subcat_name}}</td>
                <td>{{$data->cat->cat_name}}</td>
                <td>{{$data->subcat_slug}}</td>
                <td>
                    <img src="{{empty($data->cat_image)? asset('uploads/backend/subcategory/'.$data->subcat_image) : asset('uploads/backend/subcategory/'.$data->subcat_image) }}" width="50px" height="50px" alt="">
                </td>
                <td>{{$data->cat_status}}</td>
                <td>

                <a href="{{route('admin.subcategory.edit', $data->id )}}" class="btn btn-sm btn-success"> <i class="fa fa-edit"></i></a>
                <a href="{{route('admin.subcategory.delete', $data->id )}}" class="btn btn-sm btn-danger"> <i class="fa fa-trash"></i></a>

                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="7" class="text-center bg-warning">No data here</td>
            </tr>
            @endif
        </tbody>
        <tfoot>
        <th>#Sl</th>
            <th>SubCatagory Name</th>
            <th> Cat_Id </th>
            <th> Cat_slug </th>
            <th> SubCat Image</th>
            <th> Status</th>
            <th> Action</th>
        </tfoot>

    </table>
    </div>
   </div>
</div>



@endsection