@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>User Informetion</strong> </div>

                <div class="card-body">
                     @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                 <table class="table">
					  <thead class="bg-success">
					    <tr>
					      <th scope="col">No</th>
					      <th scope="col">Name</th>
					      <th scope="col">Email</th>
					      <th scope="col">Action</th>
					    </tr>
					  </thead>
					  <tbody>
					  	@forelse($all_users as $user)
 						<tr>
					      <th>{{$user->id}}</th>
					      <th>{{$user->name}}</th>
					      <th>{{$user->email}}</th>
					     
					      <th>
					      	<a href="{{url('about/delete')}}/{{$user->id}}" class="btn btn-sm btn-danger">Delete</a>
					      </th>
					    </tr>
                         @empty
                          <tr class="text-center bg-primary">
                          	<th colspan="6">No Data Available</th>
                          </tr>
					  	@endforelse
					    
					    
					  </tbody>
					</table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection