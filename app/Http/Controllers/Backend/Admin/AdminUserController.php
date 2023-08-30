<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use Image ;
use File ;
use Illuminate\Support\Str;

class AdminUserController extends Controller
{
    function index(){
        $user =Auth::user();
        return view('backend.admin.index',compact('user'));
    }


    function profile(){
        $user =Auth::user();
        return view('backend.admin.profile', compact('user'));
    }

    // User profile update controller -------

    function profileUpdate(Request $rqst, $id){
        $user = User::find($id);
        
        $user->name = $rqst->name;
        $user->username =Str::slug($rqst->name);
        $user->email = $rqst->email;
        $user->phone = $rqst->phone;
        $user->address = $rqst->address;
        if($rqst->file('image')){
            
            if(File::exists(public_path('uploads/backend/' .$user->image))){
                File::delete(public_path('uploads/backend/' .$user->image));
            }
            $image = $rqst->file('image');
            $customName = rand().'.'.$image->getClientOriginalExtension();
            $path = public_path('uploads/backend/'. $customName);
            Image::make($image)->resize(300,300)->save($path);
            $user->image = $customName ;
            
        }
        
        $notice = array(
            'type' => 'success',
            'message' => 'Profile Updated successfully'
        );
        $user->save();
        return back()->with($notice);

       

    }
    function changePass($id){
        $userpass = User::find($id);
        return view('backend.admin.changePass', compact('userpass'));
    }
    function UpdatePass(Request $rqst, $id){
        $userpass = User::find($id);
        $rqst->validate([
            'oldPass' => 'required',
            'newPass' => 'required',
            'conPass' => 'required|same:newPass',
        ],
        [
            'oldPass.require' => 'Your old password is required',
            'newPass.require' => 'Your new password is required',
            'conPass.require' => 'Your confirm password is required',
        ]);

        $oldPass = $rqst->oldPass;
        $userOldpass = $userpass->password;
        if(Hash::check($oldPass, $userOldpass)){
            $userpass->password = bcrypt($rqst->newPass);
            $userpass->update();
            $notice = array(
            	'type' => 'success',
            	'message' => 'Password successfully changed'
        	);
        }
        else{
            $notice = array(
            	'type' => 'error',
            	'message' => 'old password not match'
        	);

        }
        return back()->with($notice);
    }
    

//  login part controller 

    function adminLogin(){
        return view('backend.admin.adminLogin');
    }
    
    // logout part controller -------------

    function logout(Request $rqst){
        Auth::guard('web')->logout();

        $rqst->session()->invalidate();

        $rqst->session()->regenerateToken();

        return redirect('/admin/login');
    }
}
