import EmployeesIndex from './components/employee/index';
import EmployeesCreate from './components/employee/create';
import EmployeesEdit from './components/employee/edit';
export const routes=[
    {
        path:'/employees',
        name:'EmployeesIndex',
        component:EmployeesIndex
    },
    {
        path:'/employees/create',
        name:'EmployeesCreate',
        component:EmployeesCreate
    },
    {
        path:'/employees/:id',
        name:'EmployeesEdit',
        component:EmployeesEdit
    },
];