@extends('backend.admin.master')

@section('mainbody')

<div class="container">
    <div class="main-body mt-5">
<div class="row">
    <div class="col-md-6 offset-3">
        <h3>Change your password</h3>
    <form action="{{route('admin.updatePass.profile', $userpass->id)}}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="oldPass">Old Password</label>
            <input type="password" name="oldPass" id="" class="form-control">
            @error('oldPass')
            <p class="text-danger">{{ $message}}</p>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="newPass">New Password</label>
            <input type="password" name="newPass" id="" class="form-control">
            @error('newPass')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="conPass">Confirm Password</label>
            <input type="password" name="conPass" id="" class="form-control">
            @error('conPass')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group mb-3">
            <button class="btn btn-info btn-lg" name="">Change</button>
        </div>
        @error('conPass')
            <p class="text-danger">{{$message}}</p>
        @enderror
    </form>
    </div>
</div>

    </div>
</div>


@endsection