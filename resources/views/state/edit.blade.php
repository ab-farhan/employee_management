@extends('layouts.admin')
@section('topheader')
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Topbar Search -->
    <form method="GET" action="{{ route('state.index') }}" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" >
        
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
    <h1 class="h3 mb-0 text-gray-800"><a href="{{ route('state.index') }}">States</a> / Update</h1>
    
</div>
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 mt-2 font-weight-bold text-primary d-inline-block">Update State</h5> <a class="float-right btn btn-primary" href="{{route('state.index')}}"> <i class="fas fa-plus-eye "></i> All State</a>
    </div>
    <div class="card-body">
            <div class="row justify-content-center my-4">
                <div class="col-lg-7">
                    
                    <form action="{{ route('state.update',$state->id)}}" method="post" >
                        @csrf
                        @method('PUT')
                        <div class="form-group ">
                            <label for="name" class=" text-dark">State Name</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name',$state->name) }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group ">
                            <label for="country_id" class="text-dark">Country Name</label>
                                <select class="form-control" id="country_id" name="country_id" @error('country_id') is-invalid @enderror" >
                                    <option>Select Country</option>
                                    @foreach ($country as $item)
                                    <option {{ $item->id == $state->country_id ? 'selected':'' }} value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                  </select>

                                @error('country_id')
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
        <div class="card-footer">
            <a id="IdDelete" data-toggle="modal" data-target="#Deletecountry" href="javascript:void()" class="btn btn-danger">Delete State</a>
        </div>    
</div>

<!-- Modal -->
<div class="modal fade" id="Deletecountry" tabindex="-1" role="dialog" aria-labelledby="mySoftDeleteLabel">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('state.destroy',$state->id) }}">
            @csrf
            @method('DELETE')
            <div class="modal-content primary">
                <div class="modal-header">
                <h4 class="modal-title modal_popup" id="myModalLabel">Confirm Message</h4>
                </div>
                <div class="modal-body">
                Are you sure you want to delete?
                <input type="hidden" id="modal_id" name="modal_id" value="{{$state->id}}">
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