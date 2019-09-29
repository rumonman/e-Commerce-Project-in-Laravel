<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Contact;
use Mail;
use App\Mail\ContactMessage;
use App\Card;
use Carbon\Carbon;


class FrontendController extends Controller
{
    public function index(){
    $products= Product::all();
    $Latestproducts = Product::all();
    $categories=Category::all();

    	return view('welcome',compact('products','Latestproducts','categories'));
    }

    // public function about(){
    // 	return view('');
    // }

     public function contuct(){
    	return view('contact');
     }

     public function contuctinsert(Request $request)
     {
        Contact::insert($request->except('_token'));
       // print_r($request->all());
       // Send Mail to tha company
        $name= $request->name;
        $message= $request->message;
         Mail::to('rumon105@gmail.com')->send(new ContactMessage($name, $message));
         
         return back()->with('status','Message Send Successfully !');
     }

    public function productdetails($id){
       $single_product_info = Product::find($id);

        
       $Latest_products = Product::where('id','!=', $id)->where('id',$single_product_info->category_id)->get();
       
      return view('product.details',compact('single_product_info','Latest_products'));
    }

    public function categorywiseproduct($category_id)
    {
      $products= Product::where('category_id',$category_id)->get();
        return view('menu.view',compact('products'));
    }

    public function addtocard($id)
    {
        $ip_address = $_SERVER['REMOTE_ADDR'];
        if(Card::where('customer_ip', $ip_address)->where('product_id', $id)->exists()){
            
            Card::where('customer_ip', $ip_address)->where('product_id', $id)->increment('product_quantity', 1);
        }
        else{
            Card::insert([
             'customer_ip'=>$ip_address,
             'product_id'=>$id,
             'created_at'=>Carbon::now(),
            ]);
        }
       
        return back(); 
    }

    public function cardpage()
    {
       $card_items= Card::where('customer_ip', $_SERVER['REMOTE_ADDR'])->get();
        return view('card.card', compact('card_items'));
    }


    public function deleteformcard($card_id)
    {
        
        Card::find($card_id)->delete();

        return back();
    }
}
