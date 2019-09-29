@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card mb-3">
                    <div class="card-header bg-success" colspan="9"> <strong>Our Products</strong></div>
                    
                    <div class="card-body">
                         @if (session('deletestatus'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('deletestatus') }}
                        </div>
                    @endif
                            
                       <table class="table">
                                  <thead class="bg-primary">
                                    <tr>
                                      <th scope="col">Sl No</th>
                                      <th scope="col">Cat Name</th>
                                      <th scope="col">Product Name</th>
                                      <th scope="col">Product Description</th>
                                      <th scope="col">Product Price</th>
                                      <th scope="col">Product Quantity</th>
                                      <th scope="col">Alert Quantity</th>
                                      <th scope="col">Product Image</th>
                                      <th scope="col">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                      @forelse($all_products as $product)

                                        <tr>
                                      <td>{{$product->id}}</td>
                                     <!-- <td>{{App\Category::find($product->category_id)->category_name}}</td> -->
                                      <td>{{$product->relationtocategory->category_name}}</td>
                                      <td>{{str_limit($product->product_name, 5)}}</td>
                                      <td>{{str_limit($product->porduct_description, 20)}}</td>
                                      <td>{{$product->product_price}}</td>
                                      <td>{{$product->product_quantity}}</td>
                                      <td>{{$product->alert_quantity}}</td>
                                      <td>
                                        <img src="{{asset('uplode/product_photos')}}/{{$product->product_image}}" alt="Not Found" width="50">
                                      </td>
                                      <td>

                                        <div class="btn-group" role="group">
                                          <a type="button" href="{{url('/our/product/edit')}}/{{$product->id}}" class="btn btn-sm btn-primary">Edit</a>
                                          <a type="button" href="{{url('/our/product/delete')}}/{{$product->id}}" class="btn btn-sm btn-danger">Delete</a>
                                          
                                        </div>
                                      
                                      </td>
                                      
                                    </tr>
                                    @empty
                                    <tr class="text-center bg-success ">
                                        <th colspan="9" ><strong>No Data Available</strong></th>
                                    </tr>

                                      @endforelse
                                  </tbody>
                                </table>

                                {{$all_products->links()}}

                        </div>
                </div>

                <div class="card">
                  <div class="card-header bg-danger"> <strong>Deleted Products</strong></div>
                    
                    <div class="card-body">
                         @if (session('restorestatus'))
                        <div class="alert alert-success" role="alert">
                            {{ session('restorestatus') }}
                        </div>
                    @endif

                     @if (session('forcestatus'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('forcestatus') }}
                        </div>
                    @endif
                       <table class="table">
                                  <thead class="bg-primary">
                                    <tr>
                                      <th scope="col">Sl No</th>
                                      <th scope="col">Product Name</th>
                                      <th scope="col">Product Description</th>
                                      <th scope="col">Product Price</th>
                                      <th scope="col">Product Quantity</th>
                                      <th scope="col">Alert Quantity</th>
                                      <th scope="col">Action</th>
                                      
                                    </tr>
                                  </thead>
                                  <tbody>
                                      @forelse($deleteproducts as $deleteproduct)

                                        <tr>
                                      <th>{{$deleteproduct->id}}</th>
                                      <th>{{$deleteproduct->product_name}}</th>
                                      <th>{{str_limit($deleteproduct->porduct_description, 20)}}</th>
                                      <th>{{$deleteproduct->product_price}}</th>
                                      <th>{{$deleteproduct->product_quantity}}</th>
                                      <th>{{$deleteproduct->alert_quantity}}</th>
                                      <th>
                                        <div class="btn-group" role="group">
                                          <a type="button" href="{{url('/our/product/restore')}}/{{$deleteproduct->id}}" class="btn btn-sm btn-success">Restor</a>
                                          <a type="button" href="{{url('/our/product/forcedelete')}}/{{$deleteproduct->id}}" class="btn btn-sm btn-danger">Delete</a>
                                        </div>
                                      </th>
                                    </tr>
                                    @empty
                                    <tr class="text-center bg-success ">
                                        <th colspan="7" ><strong>No Data Available</strong></th>
                                    </tr>

                                      @endforelse
                                  </tbody>
                                </table>

                                {{$all_products->links()}}

                        </div>
                </div>
            </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header bg-success"> <strong>Add Product</strong> </div>

                <div class="card-body">
                     @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    @if ($errors->all())
                        <div class="alert alert-danger" role="alert">
                    @foreach ($errors->all() as $error )
                    <li>{{ $error }}</li>
                    @endforeach
                  </div>

                    @endif
  
                    <form action="{{url('/our/product/insert')}}" method="post" enctype="multipart/form-data">
                        @csrf
                      <div class="form-group">
                        <label >Category Name</label>
                       <select name="category_id" class="form-control">
                        <option value="">-Select One-</option>
                         @foreach($categorys as $category)
                         
                         <option value="{{$category->id}}">{{$category->category_name}}</option>
                        
                         @endforeach
                       </select>
                        
                      </div>

                      <div class="form-group">
                        <label >Product Name</label>
                        <input type="text" class="form-control" placeholder="Enter Your Product Name" name="product_name" value="{{old('product_name')}}">
                        
                      </div>

                      <div class="form-group">
                        <label >Product Description</label>
                        <textarea type="text" class="form-control" placeholder="Enter Your Product Description" name="porduct_description" rows="3" value="{{old('porduct_description')}}"></textarea>
                      </div>

                      <div class="form-group">
                        <label >Product Price</label>
                        <input type="text" class="form-control" placeholder="Enter Your Product Price" name="product_price" value="{{old('product_price')}}">
                        
                      </div>

                      <div class="form-group">
                        <label >Product Quantity</label>
                        <input type="text" class="form-control" placeholder="Enter Your Product Quentity" name="product_quantity" value="{{old('product_quantity')}}">
                        
                      </div>

                      <div class="form-group">
                        <label >Alert Quantity</label>
                        <input type="text" class="form-control" placeholder="Enter Your Alert Quentity" name="alert_quantity" value="{{old('alert_quantity')}}">
                        
                      </div>

                       <div class="form-group">
                        <label >Product Image</label>
                        <input type="file" class="form-control"  name="product_image" >
                        
                      </div>
                      
                      <button type="submit" class="btn btn-primary">Add Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
