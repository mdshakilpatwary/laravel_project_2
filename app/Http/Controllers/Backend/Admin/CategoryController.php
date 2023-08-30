<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use Image;
use File;


class CategoryController extends Controller
{
    function index(){
        return view('backend.admin.category.catAdd');
     }

     //  categoy insert controller 

     function store(Request $rqst){
        $image =$rqst->file('cat_image');
        $customName =rand().'.'.$image->getClientOriginalExtension();
        Image::make($image)->save(public_path('uploads/backend/category/'.$customName));
        $data =Category::insert([
            'cat_name' => $rqst->cat_name,
            'cat_image' => $customName
        ]);


        if($data){
            return back()->with('status','Successfully data intert');
        }
        else{
            return back()->with('error','Data intert faild');

        }
     }

    //  categoy view controller 

     function manage(){
        $cat_data= Category::all();
        return view('backend.admin.category.catManage', compact('cat_data'));
     }

    //  categoy delete controller 

     function catDelete($id){
        $cat_data= Category::find($id);
        if(File::exists(public_path('uploads/backend/category/' .$cat_data->cat_image))){
            File::delete(public_path('uploads/backend/category/' .$cat_data->cat_image));
        }
        $msg = $cat_data->delete();

        if($msg){
            return back()->with('status', 'Data successfully delete');
        }
        else{
            return back()->with('error', 'Data not delete');

        }


     }

     //  categoy delete controller 

     function catEdit($id){
        $cat_data= Category::find($id)->first();
        return view('backend.admin.category.catEdit', compact('cat_data'));
     }


    //  category update controller 

     function catUpdate(Request $rqst, $id){
        $cat_data= Category::find($id);
     if($rqst->file('cat_image')){

        if(File::exists(public_path('uploads/backend/category/' .$cat_data->cat_image))){
            File::delete(public_path('uploads/backend/category/' .$cat_data->cat_image));
        }
        $image =$rqst->file('cat_image');
        $customName =rand().'.'.$image->getClientOriginalExtension();
        Image::make($image)->save(public_path('uploads/backend/category/'.$customName));
        $cat_data->cat_image = $customName;

        $update = $cat_data->update();
     }

       $cat_data->cat_name = $rqst->cat_name;

       $update= $cat_data->update();



        if($update){
            return redirect('admin/category/manage')->with('status','Successfully data update');
        }
        else{
            return back()->with('error','Data update faild');

        }
     }














}
