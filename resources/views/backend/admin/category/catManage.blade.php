@extends('backend.admin.master')

@section('mainbody')

<div class="container">
   <div class="row">
    <div class="col-md-8 offset-md-2 pt-5">
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
            <th>Catagory Name</th>
            <th> Category Image</th>
            <th> Status</th>
            <th> Action</th>
        </thead>
        <tbody>
            @if(count($cat_data) > 0)

            @foreach($cat_data as $data)
            <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->cat_name}}</td>
                <td>
                    <img src="{{empty($data->cat_image)? asset('uploads/backend/category/'.$data->cat_image) : asset('uploads/backend/category/'.$data->cat_image) }}" width="50px" height="50px" alt="">
                </td>
                <td>{{$data->cat_status}}</td>
                <td>

                <a href="{{route('admin.category.edit', $data->id )}}" class="btn btn-sm btn-success"> <i class="fa fa-edit"></i></a>
                <a href="{{route('admin.category.delete', $data->id )}}" class="btn btn-sm btn-danger"> <i class="fa fa-trash"></i></a>

                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="5" class="text-center bg-warning">No data here</td>
            </tr>
            @endif
        </tbody>
        <tfoot>
            <th>#Sl</th>
            <th>Catagory Name</th>
            <th> Category Image</th>
            <th> Status</th>
            <th> Action</th>
        </tfoot>

    </table>
    </div>
   </div>
</div>



@endsection