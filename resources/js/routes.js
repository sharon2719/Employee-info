import Employees from './components/Employees.vue';
import AddEmployee from './components/AddEmployee.vue';
import UpdateEmployee from './components/UpdateEmployee.vue';

export const routes=[{
    name:'home',
    path:'/',
    component:Employees
},
{
    name:'add',
    path:'/add',
    component: AddEmployee
},
{
    name:'edit',
    path:'/edit/:id',
    component:UpdateEmployee
}
];