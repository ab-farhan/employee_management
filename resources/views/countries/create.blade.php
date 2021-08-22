@extends('layouts.admin')
@section('topheader')
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Topbar Search -->
    <form method="GET" action="{{ route('country.index') }}" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" >
        
        <div class="input-group">
            <input type="search" class="form-control bg-light  small" name="search" placeholder="Search for countries">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->first_name }}</span>
                <img class="img-profile rounded-circle"
                    src="img/undraw_profile.svg">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>

</nav>
@endsection
@section('content')
    <!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><a href="{{ route('users.index') }}">Countries</a> / Add</h1>
    
</div>
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 mt-2 font-weight-bold text-primary d-inline-block">Add Country</h5> <a class="float-right btn btn-primary" href="{{route('country.index')}}"> <i class="fas fa-plus-eye "></i> All Countries</a>
    </div>
    <div class="card-body">
            <div class="row justify-content-center my-4">
                <div class="col-lg-7">
                    
                    <form action="{{ route('country.store')}}" method="post" >
                        @csrf
                        <div class="form-group ">
                            <label for="name" class=" text-dark">Country Name</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group ">
                            <label for="country_code" class="text-dark">Country Code</label>
                                <input id="country_code" type="text" class="form-control @error('country_code') is-invalid @enderror" name="country_code" value="{{ old('country_code') }}" required autocomplete="country_code" >

                                @error('country_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                       

                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    
</div>
@endsection