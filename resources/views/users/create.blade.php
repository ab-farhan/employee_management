@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><a href="{{ route('users.index') }}">Users</a> / Create</h1>
    
</div>
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 mt-2 font-weight-bold text-primary d-inline-block">Create User</h6> <a class="float-right btn btn-primary" href="{{route('users.index')}}"> <i class="fas fa-plus-eye "></i> All User</a>
    </div>
    <div class="card-body">
            <div class="row justify-content-center my-4">
                <div class="col-lg-7">
                    
                    <form action="{{ route('users.store')}}" method="post" >
                        @csrf
                        <div class="form-group ">
                            <label for="user_name" class=" text-dark">Username</label>
                                <input id="user_name" type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" value="{{ old('user_name') }}" required autocomplete="user_name" autofocus>

                                @error('user_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group ">
                            <label for="first_name" class="text-dark">First Name</label>
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" >

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group ">
                            <label for="last_name" class="text-dark">Last Name</label>

                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" >

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group ">
                            <label for="email" class="text-dark">E-Mail Address</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group ">
                            <label for="password" class="text-dark">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                           
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    
</div>
@endsection