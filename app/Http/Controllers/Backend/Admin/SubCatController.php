<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use App\Models\Category;
use Image;
use File;

class SubCatController extends Controller
{
    function index(){
        $cat_data =Category::where('cat_status', 1)->get();
        return view('backend.admin.sub_category.subcatAdd', compact('cat_data'));
     }

     //  categoy insert controller 

     function store(Request $rqst){
        $rqst->validate([
            'subcat_name' => 'required',
            'cat_id' => 'required',
            'subcat_image' => 'required',
        ],
        [
            'subcat_name.require' => 'sub category field is required',
            'cat_id.require' => ' category select is required',
            'subcat_image.require' => 'sub category image is required',
        ]
    );

       if($rqst->file('subcat_image')){
        $image =$rqst->file('subcat_image');
        $customName =rand().'.'.$image->getClientOriginalExtension();
        Image::make($image)->save(public_path('uploads/backend/subcategory/'.$customName));
       }
        $data =SubCategory::insert([
            'subcat_name' => $rqst->subcat_name,
            'cat_id' => $rqst->cat_id,
            'subcat_slug' =>Str::slug($rqst->subcat_name),
            'subcat_image' => $customName
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
        $subcat_data= SubCategory::all();
        return view('backend.admin.sub_category.subcatManage', compact('subcat_data'));
     }

    //  categoy delete controller 

     function subcatDelete($id){
        $subcat_data= SubCategory::find($id);
        if(File::exists(public_path('uploads/backend/subcategory/' .$subcat_data->subcat_image))){
            File::delete(public_path('uploads/backend/subcategory/' .$subcat_data->subcat_image));
        }
        $msg = $subcat_data->delete();

        if($msg){
            return back()->with('status', 'Data successfully delete');
        }
        else{
            return back()->with('error', 'Data not delete');

        }


     }

     //  categoy delete controller 

     function subcatEdit($id){
        $subcat_data= SubCategory::find($id)->first();
        return view('backend.admin.sub_category.subcatEdit', compact('subcat_data'));
     }


    //  subcategory update controller 

     function subcatUpdate(Request $rqst, $id){
        $subcat_data= SubCategory::find($id)->first();
     if($rqst->file('subcat_image')){

        if(File::exists(public_path('uploads/backend/subcategory/' .$subcat_data->subcat_image))){
            File::delete(public_path('uploads/backend/subcategory/' .$subcat_data->subcat_image));
        }
        $image =$rqst->file('subcat_image');
        $customName =rand().'.'.$image->getClientOriginalExtension();
        Image::make($image)->save(public_path('uploads/backend/subcategory/'.$customName));
        $subcat_data->subcat_image = $customName;

        $update = $subcat_data->update();
     }

       $subcat_data->subcat_name = $rqst->subcat_name;

       $update= $subcat_data->update();



        if($update){
            return redirect('admin/sub_category/subcatManage')->with('status','Successfully data update');
        }
        else{
            return back()->with('error','Data update faild');

        }
     }














}

