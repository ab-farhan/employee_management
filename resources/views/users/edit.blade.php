@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><a href="{{ route('users.index') }}">Users</a> / Update</h1>
    
</div>

 <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 mt-2 font-weight-bold text-primary d-inline-block">Update User</h6> <a class="float-right btn btn-primary" href="{{route('users.index')}}"> <i class="fas fa-plus-eye "></i> All User</a>
    </div>
    <div class="card-body">
        <a id="IdDelete" data-toggle="modal" data-target="#DeleteID" href="javascript:void()" class="btn btn-danger"><i class="fas fa-trash "></i> Delete User</a>
            <div class="row justify-content-center my-4">
                <div class="col-lg-7">
                    
                    <form action="{{ route('users.update',$user->id)}}" method="POST" >
                        @csrf
                        @method('PUT')
                        <div class="form-group ">
                            <label for="user_name" class=" text-dark">Username</label>
                                <input id="user_name" type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" value="{{ old('user_name',$user->user_name) }}" required autocomplete="user_name" autofocus>

                                @error('user_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group ">
                            <label for="first_name" class="text-dark">First Name</label>
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name',$user->first_name) }}" required autocomplete="first_name" >

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group ">
                            <label for="last_name" class="text-dark">Last Name</label>

                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name',$user->last_name) }}" required autocomplete="last_name" >

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group ">
                            <label for="email" class="text-dark">E-Mail Address</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email',$user->email) }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                        
                    </form>
                </div>
            </div>
        </div>
    
</div>
@if (Auth::user()->id === $user->id)
     {{-- change password  --}}
 <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 mt-2 font-weight-bold text-primary d-inline-block">Reset Password</h5> 
    </div>
    <div class="card-body">
        
            <div class="row justify-content-center my-4">
                <div class="col-lg-7">
                    
                    <form action="{{ route('users.change.password',$user->id)}}" method="POST" >
                        @csrf
                        
                        <div class="form-group ">
                            <label for="password" class=" text-dark">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  required  autofocus>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                       

                        <div class="form-group ">
                            <label for="password-confirm" class=" text-dark">{{ __('Confirm Password') }}</label>

                                <input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror"" name="password_confirmation" required autocomplete="new-password">
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        

                        <button type="submit" class="btn btn-primary">Update Passsword</button>
                        
                    </form>
                </div>
            </div>
        </div>
    
</div>
@else
    
@endif



<!-- Modal -->
<div class="modal fade" id="DeleteID" tabindex="-1" role="dialog" aria-labelledby="mySoftDeleteLabel">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('users.destroy',$user->id) }}">
            @csrf
            @method('DELETE')
            <div class="modal-content primary">
                <div class="modal-header">
                <h4 class="modal-title modal_popup" id="myModalLabel">Confirm Message</h4>
                </div>
                <div class="modal-body">
                Are you sure you want to delete?
                <input type="hidden" id="modal_id" name="modal_id" value="{{$user->id}}">
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-success btnm btn-fill btn-sm">Confirm</button>
                <button type="button" class="btn btn-danger btnm btn-fill btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection