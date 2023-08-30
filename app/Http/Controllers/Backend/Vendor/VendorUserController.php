<?php

namespace App\Http\Controllers\Backend\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use Image ;
use File ;
use Illuminate\Support\Str;

class VendorUserController extends Controller
{
    function index(){
        $vendoruser = User::find(Auth::user()->id);
        return view('backend.vendor.index');
    }
}
