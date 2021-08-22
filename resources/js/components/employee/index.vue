<template>
    <div>
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Topbar Search -->
    <form method="GET" action="" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" >
        
        <div class="input-group">
            <input type="search" class="form-control bg-light  small" name="search" placeholder="Search for employee">
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
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                <img class="img-profile rounded-circle"
                    src="">
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
            <!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Employees</h1>
    
</div>
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 mt-2 font-weight-bold text-primary d-inline-block">All Employees</h6> <a  href=""> </a>
        <router-link :to="{name:'EmployeesCreate'}" class="float-right btn btn-info"><i class="fas fa-plus-circle "> </i> Create Employee </router-link>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="" width="100%">
                <thead>
                    <tr>
                        <th>Id </th>
                        <th>Full Name</th>
                        <th>Address</th>
                        <th>Department</th>
                        <th>State</th>
                        <th>Manage</th>
                    </tr>
                </thead>
                
                <tbody>
                   
                    <tr v-for="employee in employees" :key="employee.id">
                        <th> {{employee.id}} </th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>  </td>
                        <td>
                            <a href="" class="btn "><i class="fas fa-eye text-success"></i></a>
                            <a href="" class="btn"><i class="fas fa-edit"></i></a> 

                        </td>                     
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>
    </div>
</template>

<script>
    export default {
       data(){
           return{
               employees:[],
           }
       },
       created(){
           this.getEmplyees();
       },
       methods:{
           getEmplyees(){
               axios.get('/api/employees')
               .then(res =>{
                   this.employees=res.data
               })
               .catch(error =>{
                   console.log(error)
               })
           }
       }
    }
</script>

<style scoped>

</style>