<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AddProduct;

use Image;
use File;
use Illuminate\Support\Str;


class AddProductController extends Controller
{
    function index(){
        return view('backend.admin.product.addProduct');
    }


    // add product part 

    function store(Request $rqst){
        $rqst->validate([
            'pname' => 'required',
            'pcode' => 'required',
            'salep' => 'required',
            'costp' => 'required',
            'pqnt' => 'required',
            'pdesc' => 'required',
            'pimage' => 'required',
        ],
    [
        'pname.require' => 'Product name is required',
        'pcode.require' => 'Product code is required',
        'salep.require' => 'Product sale Price is required',
        'costp.require' => 'Product cost price is required',
        'pqnt.require' => 'Product quatity is required',
        'pdesc.require' => 'Product description is required',
        'pimage.require' => 'Product product image is required',
    ]);

        $product = new AddProduct;

        $product->pname = $rqst->pname;
        $product->pcode = $rqst->pcode;
        $product->salep = $rqst->salep;
        $product->costp = $rqst->costp;
        $product->qnt = $rqst->pqnt;
        $product->desc = $rqst->pdesc;
       
            
            if($rqst->file('pimage')){
                $image = $rqst->file('pimage');
                $customName = rand().'.'.$image->getClientOriginalExtension();
                $path = public_path('uploads/backend/product/'. $customName);
                Image::make($image)->resize(300,300)->save($path);
                $product->image = $customName ;    
            }

        $product->save();
        $notice = array(
            'type' => 'success',
            'message' => 'Product Successfully add store'
        );
        return back()->with($notice);

    }

    // product all view part 

    function manage(){
        $products =AddProduct::all();
        return view('backend.admin.product.manageProduct', compact('products'));
    }

    // product delete part 

    function productDelete($id){
        $productDelete =AddProduct::find($id);
        if(File::exists(public_path('uploads/backend/product/' .$productDelete->image))){
            File::delete(public_path('uploads/backend/product/' .$productDelete->image));
        }
        $productDelete->delete();
        return back()->with('status','successfully Delete your product');
    }

    // product edit part 
    function editProduct($id){
        $product = AddProduct::find($id);
        return view('backend.admin.product.editProduct', compact('product'));

        
    }

    // Product update part

    function updateProduct(Request $rqst , $id){
        $product = AddProduct::find($id);

        $product->pname = $rqst->pname;
        $product->pcode = $rqst->pcode;
        $product->salep = $rqst->salep;
        $product->costp = $rqst->costp;
        $product->qnt = $rqst->pqnt;
        $product->desc = $rqst->pdesc;
       
            
            if($rqst->file('pimage')){
                if(File::exists(public_path('uploads/backend/product/' .$product->image))){
                    File::delete(public_path('uploads/backend/product/' .$product->image));
                }
                $image = $rqst->file('pimage');
                $customName = rand().'.'.$image->getClientOriginalExtension();
                $path = public_path('uploads/backend/product/'. $customName);
                Image::make($image)->resize(300,300)->save($path);
                $product->image = $customName ;    
            }

        $product->update();

      
        return redirect('admin/product/manage')->with('status', 'successfully updated done you product');

    }

    function productstatus($id){
        if($pstatus = AddProduct::where('status', 'active')->where('id', $id)->first()){
            $pstatus = AddProduct::where('status', 'active')->where('id', $id)->first();
            $pstatus->status = 'inactive' ;
            $pstatus->update();
            return back()->with('status','inactive successfully done');
        }
        else{
            $pstatus = AddProduct::where('status', 'inactive')->where('id', $id)->first();
            $pstatus->status = 'active' ;
            $pstatus->update();
            return back()->with('status','active successfully done');
        }



    }
}
