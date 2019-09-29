<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Image;
use App\Category;

class ProductController extends Controller
{
    public function product(){
    	$all_products= Product::all();
    	$all_products= Product::paginate(5);
    	$deleteproducts= Product::onlyTrashed()->get();
      $categorys= Category::all();
    	return view('service', compact('all_products','deleteproducts','categorys'));
    }

   

    Public function insert(Request $request){

    	$request -> validate([
        'category_id' =>'required',
        'product_name' => 'required',
        'porduct_description' => 'required',
        'product_price' => 'required|numeric',
        'product_quantity' => 'required|numeric',
        'alert_quantity' => 'required|numeric',
    	]);

    	$last_inserted_id=Product::insertGetId([

        'product_name' => $request->product_name,
        'category_id' => $request->category_id,
        'porduct_description' => $request->porduct_description,
        'product_price' => $request->product_price,
        'product_quantity' => $request->product_quantity,
        'alert_quantity' => $request->alert_quantity
       
    	]);
       
       
       if($request->hasfile('product_image')){
        // echo $last_inserted_id;

        $photo_to_upload=$request->product_image;

        $filename= $last_inserted_id.".".$photo_to_upload->getClientOriginalExtension();
         
        Image::make($photo_to_upload)->resize(400, 450)->save(base_path('public/uplode/product_photos/'.$filename));
       // $image = Image::make('public/foo.jpg')->resize(300, 200);

        Product::find($last_inserted_id)->update([
          'product_image'=> $filename
        ]);


        }

    	return back()->with('status','Product Created Successfully !');
    }

    public function deleteproduct($id){

     Product::where('id', $id)->delete();


    // Product::find($id)->delete();

     return back()->with('deletestatus','Product Delete Successfully !');

    }
    

    public function editproduct($id){

      $single_product_info=Product::findOrFail($id);

     return view('edit', compact('single_product_info'));
    }
   

   public function oureditproduct(Request $request){
   	 
     if($request->hasFile('product_image')){
      if(Product::find($request->id)->product_image === 'defaultproductphoto.jpg'){
       $photo_to_upload=$request->product_image;

        $filename=$request->id.".".$photo_to_upload->getClientOriginalExtension();
         
        Image::make($photo_to_upload)->resize(400, 450)->save(base_path('public/uplode/product_photos/'.$filename));
       // $image = Image::make('public/foo.jpg')->resize(300, 200);

        Product::find($request->id)->update([
          'product_image'=> $filename
        ]);
      }else
      {
        //first delet the old photo
        $deletephoto=Product::find($request->id)->product_image;
        unlink(base_path('public/uplode/product_photos/'.$deletephoto));
        // now uplode the new pot
        $photo_to_upload=$request->product_image;

        $filename=$request->id.".".$photo_to_upload->getClientOriginalExtension();
         
        Image::make($photo_to_upload)->resize(400, 450)->save(base_path('public/uplode/product_photos/'.$filename));
       // $image = Image::make('public/foo.jpg')->resize(300, 200);

        Product::find($request->id)->update([
          'product_image'=> $filename
        ]);
      }
     }
     
   	 Product::find($request->id)->update([
      
        'product_name' => $request->product_name,
        'porduct_description' => $request->porduct_description,
        'product_price' => $request->product_price,
        'product_quantity' => $request->product_quantity,
        'alert_quantity' => $request->alert_quantity

   	 ]);

   	 return back()->with('status','Product Edited Successfully !');
   }

   public function restoreproduct($id){

    Product::onlyTrashed()->where('id', $id)->restore();
    return back()->with('restorestatus','Product Restor Successfully !');
   }

   public function forcedeleteproduct($id){
      $deletephoto= Product::onlyTrashed()->find($id)->product_image;
        unlink(base_path('public/uplode/product_photos/'.$deletephoto));
        
    Product::onlyTrashed()->find($id)->forceDelete();
    return back()->with('forcestatus','Product Permanently Deleted Successfully !');
   }



}
