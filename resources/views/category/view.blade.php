@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-success"> <strong>Our Products</strong></div>
                    
                    <div class="card-body">
                        <table class="table">
                                  <thead class="bg-primary">
                                    <tr>
                                      <th scope="col">Sl No</th>
                                      <th scope="col">Category Name</th>
                                      <th scope="col">Menu Status</th>
                                      <th scope="col">Created At</th>
                                      <th scope="col">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                      @forelse($categories as $category)

                                    <tr>
                                       <td>{{$category->id}}</td>
                                       <td>{{$category->category_name}}</td>
                                       <td>{{ ($category->menu_status == 1) ? "YES" : "NO"}}</td>
                                       <td>{{$category->created_at->format('d-m-Y h:i:s A') }}
                                          <br>
                                          {{$category->created_at->diffForHumans()}}
                                       </td>
                                     
                                       <td>
                                        <div class="btn-group" role="group">
                                          <a type="button" href="{{url('change/menu/status')}}/{{$category->id}}" class="btn btn-sm btn-primary">Change</a>
                                          </div>
                                      </td>
                                      
                                    </tr>
                                    @empty
                                    <tr class="text-center bg-success ">
                                        <td colspan="4" ><strong>No Data Available</strong></td>
                                    </tr>

                                      @endforelse
                                  </tbody>
                                </table>
                             
                              {{$categories->links()}}
                               

                        </div>
                              
                              
                </div>

                
                </div>

            <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-success"> <strong>Add Category Form</strong> </div>

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
  
                    <form action="{{url('/our/category/insert')}}" method="post" >
                        @csrf
                      <div class="form-group">
                        <label >Category Name</label>
                        <input type="text" class="form-control" placeholder="Enter Your Category Name" name="category_name" value="{{old('category_name')}}">
                      </div>

                      <div class="form-group">
                        <input type="checkbox" name="menu_status" value="1" id="menu"> <label for="menu">Use The Manu</label>
                      </div>

                      <button type="submit" class="btn btn-primary">Add Category </button>
                    </form>
                </div>
            </div>
       
    </div>
</div>
@endsection