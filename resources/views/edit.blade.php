@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-6 offset-3">
          <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/about')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{url('/our/product/view')}}">Our Product</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$single_product_info->product_name}}</li>
          </ol>
        </nav>
            <div class="card">
                <div class="card-header bg-success"> <strong>Edit Product</strong> </div>

                <div class="card-body">
                     @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                
  
                    <form action="{{url('/our/product/edit')}}" method="post" enctype="multipart/form-data">
                        @csrf
                      <div class="form-group">
                        <label >Product Name</label>
                        <input type="hidden" name="id" value="{{$single_product_info->id}}" >
                        <input type="text" class="form-control" placeholder="Enter Your Product Name" name="product_name" value="{{$single_product_info->product_name}}">
                        
                      </div>

                      <div class="form-group">
                        <label >Product Description</label>
                        <textarea type="text" class="form-control" placeholder="Enter Your Product Description" name="porduct_description" rows="3">{{$single_product_info->porduct_description}}</textarea>
                      </div>

                      <div class="form-group">
                        <label >Product Price</label>
                        <input type="text" class="form-control" placeholder="Enter Your Product Price" name="product_price" value="{{$single_product_info->product_price}}">
                        
                      </div>

                      <div class="form-group">
                        <label >Product Quantity</label>
                        <input type="text" class="form-control" placeholder="Enter Your Product Quentity" name="product_quantity" value="{{$single_product_info->product_quantity}}">
                        
                      </div>

                      <div class="form-group">
                        <label >Alert Quantity</label>
                        <input type="text" class="form-control" placeholder="Enter Your Alert Quentity" name="alert_quantity" value="{{$single_product_info->alert_quantity}}">
                        
                      </div>

                       <div class="form-group">
                        <label >Product Image</label>
                        <input type="file" class="form-control" name="product_image">
                        <img src="{{asset('uplode/product_photos')}}/{{$single_product_info->product_image}}" alt="not fount" width="100">
                        
                      </div>
                      
                      <button type="submit" class="btn btn-primary">Edit Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
