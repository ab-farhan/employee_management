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
    <h1 class="h3 mb-0 text-gray-800">Countries</h1>
    
</div>
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 mt-2 font-weight-bold text-primary d-inline-block">All countries</h5> <a class="float-right btn btn-primary" href="{{route('country.create')}}"> <i class="fas fa-plus-circle "></i> Add Country</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="" width="100%">
                <thead>
                    <tr>
                        <th>Id </th>
                        <th>Country Name</th>
                        <th>Country Code</th>
                    
                        <th>Manage</th>
                    </tr>
                </thead>
                
                <tbody>
                   
                    @foreach ($country as $data)
                    <tr>
                        <td>{{$data->id}}</td>
                        <td>{{$data->name}} </td>
                        <td>{{$data->country_code}}</td>
                        <td> <a href="{{ route('country.edit', $data->id) }}" class="btn"><i class="fas fa-edit"></i></a> </td>               
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection