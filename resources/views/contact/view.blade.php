@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-header bg-success" colspan="8"> <strong>Our Contact Message</strong></div>
                    <div class="card-body">
                       <table class="table">
                                  <thead class="bg-primary">
                                    <tr>
                                      <th scope="col">Sl No</th>
                                      <th scope="col">Name</th>
                                      <th scope="col">Email</th>
                                      <th scope="col">Message</th>
                                      <th scope="col">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                      @foreach( $contactmessages as  $contactmessage)
                                      <tr class={{($contactmessage->read_status == 1)?"bg-info":""}}>
                                      <td>{{ $contactmessage->id }}</td>
                                      <td>{{ $contactmessage->name }}</td>
                                      <td>{{ $contactmessage->email }}</td>
                                      <td>{{ $contactmessage->message }}</td>
                                      
                                      <td>

                                        <div class="btn-group" role="group">
                                          <a type="button" href="" class="btn btn-sm btn-primary">Edit</a>
                                          <a type="button" href="" class="btn btn-sm btn-danger">Delete</a>
                                          
                                        </div>
                                      
                                      </th>
                                      
                                    </tr>
                                      @endforeach

                                        
                                  </tbody>
                                </table>

                              

                        </div>
                </div>
            </div>
    </div>
</div>
@endsection
