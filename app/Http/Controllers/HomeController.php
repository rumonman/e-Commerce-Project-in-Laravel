<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function frontindex()
    {
        return view('welcome');
    }

    public function contactmessageview()
    {
      $contactmessages= Contact::all();

      return view('contact.view', compact('contactmessages'));
    }


    public function changemenustatus($id)
    {
        
    
         // if(Category::find($id)->menu_status == 0){

         //   Category::find($id)->update([
         //      'menu_status'=>true
         //   ]); 
         // }
         // else
         // {
         //  Category::find($id)->update([
         //      'menu_status'=>false
         //   ]);
         // }

          $category_info=Category::find($id);
           if($category_info->menu_status == 0){
            $category_info->menu_status = true;
           } else
           {
            $category_info->menu_status = false;
           }
           $category_info->save();
         return back();
         
    }
}
