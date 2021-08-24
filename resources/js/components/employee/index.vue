<template>
    <div>
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Topbar Search -->
    <form method="GET" action="" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" >
        
        <div class="input-group">
            <input type="search" class="form-control bg-light  small" placeholder="Search for employee" v-model.lazy="search">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
           
            <select class="form-control" id="department_id" name="department_id" v-model="selectedDepartment">
                <option disabled selected>Select Department</option>
                <option v-for="department in departments" :key="department.id" :value="department.id">{{department.name}}</option>
            </select>
            
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
    <div class="row justify-content-center" v-if="isDelete">
        <div class="col-lg-5">
            <div class="alert alert-success" role="alert">
                {{message}}
            </div>
        </div>
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
                        <th># Id </th>
                        <th>Full Name</th>
                        <th>Department</th>
                        <th>Country</th>
                        <th>State</th>
                        <th>Joining Date</th>
                        <th>Manage</th>
                    </tr>
                </thead>
                
                <tbody>
                   
                    <tr v-for="employee in employees" :key="employee.id">
                        <th> {{employee.id}} </th>
                        <td> {{employee.first_name}} {{employee.middle_name}} {{employee.last_name}} </td>
                        <td>{{employee.department.name}}</td>
                        <td>{{employee.country.name}}</td>
                        <td>{{employee.state.name}}</td>
                        <td>{{employee.hired_date}}</td>
                        <td>
                            <router-link class="btn btn-success" :to="{name:'EmployeesEdit',params:{id:employee.id}}"><i class="fas fa-edit "></i> </router-link>
                            <button class="btn btn-danger" @click="deleteEmployee(employee.id)"><i class="fas fa-trash"></i> </button> 
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
               isDelete:false,
               message:'',
               search:'',
               selectedDepartment:null,
               departments:[],
           }
       },
       created(){
           this.getEmplyees();
           this.getDepartments();
       },
       watch:{
           search(){
               this.getEmplyees();
           },
           selectedDepartment(){
                this.getEmplyees();
           }
       },
       methods:{
           getEmplyees(){
               axios.get('/api/employees',{
                   params:{
                       search:this.search,
                       department_id:this.selectedDepartment,
                   }
               })
               .then(res =>{
                   this.employees=res.data
               })
               .catch(error =>{
                   console.log(error)
               })
           },
           deleteEmployee(id){
               axios.delete('/api/employees/'+id)
                .then(res =>{
                    this.getEmplyees();
                    this.isDelete=true;
                    this.message= res.data;
                })
                .catch(error =>{
                    console.log(error)
                })
           },
           getDepartments(){
                axios.get('/api/employees/departments')
                .then(res =>{
                    this.departments =res.data
                }).catch(error=>{
                    console.log(console.error)
                })
            }
       }
    }
</script>

<style scoped>

</style>