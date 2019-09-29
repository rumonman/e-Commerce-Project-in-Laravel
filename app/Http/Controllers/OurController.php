<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class OurController extends Controller
{
    public function about(){
    	$all_users=User::all();
    	return view('about', compact('all_users'));
    }

    public function deleteabout($id){

    	User::where('id', $id)->delete();
       
    	return back()->with('status','Your Data Delete Successfully !');

    }


}
