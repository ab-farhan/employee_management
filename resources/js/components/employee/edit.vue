<template>
    <div>
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">



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
    <h1 class="h3 mb-0 text-gray-800"> <router-link :to="{name:'EmployeesIndex'}" class="text-decoration-none"> Employees </router-link> / Edit</h1>
    
</div>
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 mt-2 font-weight-bold text-primary d-inline-block">Add Employee</h5> <router-link :to="{name:'EmployeesIndex'}" class="float-right btn btn-info" > <i class="fas fa-plus-eye "></i> All Department</router-link>
    </div>
    <div class="card-body">
            <div class="row justify-content-center my-4">
                <div class="col-lg-7">
                    
                    <form @submit.prevent="updateEmployee">

                        <div class="form-group ">
                            <label for="first_name" class=" text-dark">First Name</label>
                            <input id="first_name" type="text" class="form-control" name="first_name"  required autofocus v-model="formData.first_name">                              
                        </div>

                        <div class="form-group ">
                            <label for="middle_name" class=" text-dark">Middle Name</label>
                            <input id="middle_name" type="text" class="form-control" name="middle_name" required  v-model="formData.middle_name">                              
                        </div>

                        <div class="form-group ">
                            <label for="last_name" class=" text-dark">Last Name</label>
                            <input id="last_name" type="text" class="form-control" name="last_name" required  v-model="formData.last_name">                              
                        </div>

                        <div class="form-group ">
                            <label for="address" class=" text-dark">Address</label>
                            <input id="address" type="text" class="form-control" name="address"  required  v-model="formData.address">                              
                        </div>

                        <div class="form-group ">
                            <label for="department_id" class="text-dark">Department</label>
                                <select class="form-control" id="department_id" name="department_id" v-model="formData.department_id">
                                    <option disabled>Select Department</option>
                                    <option v-for="department in departments" :key="department.id" :value="department.id">{{department.name}}</option>
                                  </select>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label for="country_id" class="text-dark">Country</label>
                                        <select class="form-control" id="country_id" name="country_id" v-model="formData.country_id" @change="getStates">
                                             <option selected disabled>Select Country</option>
                                             <option v-for="country in countries" :key="country.id" :value="country.id">{{country.name}}</option> 
                                  
                                        </select>

                                        


                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label for="state_id" class="text-dark">State</label>
                                        <select class="form-control" id="state_id" name="state_id" v-model="formData.state_id" @change="getCities">
                                            <option disabled>Select State</option>
                                            <option v-for="state in states" :key="state.id" :value="state.id" >{{state.name}}</option>
                                            
                                        </select>
                                </div>
                            </div>
                        </div>
                        

                        

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label for="city_id" class="text-dark">City</label>
                                        <select class="form-control" id="city_id" name="city_id"  v-model="formData.city_id">
                                            <option disabled>Select City </option>
                                            <option v-for="city in cities" :key="city.id" :value="city.id" >{{city.name}}</option>
                                        </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label for="zip_code" class=" text-dark">Zip Code</label>
                                    <input id="zip_code" type="text" class="form-control" name="zip_code"  required  v-model="formData.zip_code">                              
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label for="birth_date" class=" text-dark">Birth Date</label>
                                    <datepicker id="birth_date" name="birth_date" input-class="form-control" required   v-model="formData.birth_date"> </datepicker>                             
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label for="date_hired" class=" text-dark" >Join Date</label>
                                    <!-- <input id="date_hired" type="date" class="form-control" name="date_hired"  required v-model="formData.date_hired">       -->
                                    <datepicker id="date_hired" name="date_hired" input-class="form-control" required  v-model="formData.date_hired"> </datepicker>                        
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    
</div>
    </div>
</template>

<script>
import Datepicker from 'vuejs-datepicker';
import moment from 'moment';
    export default {
        components: {
            Datepicker
        },
        data(){
        return{
            departments:[],
            countries:[],
            states:[],
            cities:[],
            formData:{
                first_name:'',
                middle_name:'',
                last_name:'',
                address:'',
                department_id:'',
                country_id:'',
                state_id:'',
                city_id:'',
                zip_code:'',
                birth_date:'',
                date_hired:'',
            }
        }
        },
        created(){
            this.getEmployee();
            this.getCountries();
            this.getDepartments();
            
        },
        methods:{
            getEmployee(){
                axios.get('/api/employees/'+this.$route.params.id)
                .then(res =>{
                    this.formData =res.data.data
                    this.getStates();
                    this.getCities();
                }).catch(error=>{
                    console.log(console.error)
                })
            },
            getCountries(){
                axios.get('/api/employees/countries')
                .then(res =>{
                    this.countries =res.data
                }).catch(error=>{
                    console.log(console.error)
                })
            },
            getStates(){
                axios.get('/api/employees/'+this.formData.country_id+'/state')
                .then(res =>{
                    this.states =res.data
                }).catch(error=>{
                    console.log(console.error)
                })
            },
            getCities(){
                axios.get('/api/employees/'+this.formData.state_id+'/city')
                .then(res =>{
                    this.cities =res.data
                }).catch(error=>{
                    console.log(console.error)
                })
            },
            getDepartments(){
                axios.get('/api/employees/departments')
                .then(res =>{
                    this.departments =res.data
                }).catch(error=>{
                    console.log(console.error)
                })
            },
            updateEmployee(){
                  axios.put('/api/employees/'+this.$route.params.id,{
                      'first_name':this.formData.first_name,
                      'middle_name':this.formData.middle_name,
                      'last_name':this.formData.last_name,
                      'address':this.formData.address,
                      'department_id':this.formData.department_id,
                      'country_id':this.formData.country_id,
                      'state_id':this.formData.state_id,
                      'city_id':this.formData.city_id,
                      'zip_code':this.formData.zip_code,
                      'birth_date':this.formatDate(this.formData.birth_date),
                      'date_hired':this.formatDate(this.formData.date_hired),
                  }).then(res=>{
                      this.$router.push({name:'EmployeesIndex'});   
                  }).catch(error=>{
                       console.log(console.error)
                  })
            },
            formatDate(value){
                if(value){
                    return moment(String(value)).format('YYYYMMDD')
                }
            },

        },
    }
</script>

<style scoped>

</style>