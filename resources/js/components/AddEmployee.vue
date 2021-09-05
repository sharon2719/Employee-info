<template>
  <div>
    <div class="container">
      <h2>Add Employee</h2>
      <div class="panel panel-primary">
        <div class="panel-heading">
            Add Employee
            <router-link to="/" class="btn btn-info pull-right" style="margin-top:-7px;margin-left:2px;">Employee List</router-link>
        </div>
        <div class="panel-body">

          <form @submit.prevent="addEmployee">
             <div class="form-group">
              <label>First name</label>
              <input type="text" class="form-control" v-model="employee.firstname" />
            </div>

            <div class="form-group">
              <label>Last name</label>
              <input type="text" class="form-control" v-model="employee.lastname" />
            </div>

            <div class="form-group">
              <label>Company</label>
              <input type="text" class="form-control" v-model="employee.company" />
            </div>

            <div class="form-group">
              <label>Email</label>
              <input
                type="email"
                class="form-control"
                v-model="employee.email"
              />
            </div>

            <div class="form-group">
              <label>Phone</label>
              <input type="text" class="form-control" v-model="employee.phone" />
            </div>
            

            <button type="submit" class="btn btn-primary">Add</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>
 
<script>
import axios from 'axios';
export default {
  data() {
    return {
      employee: {},
    };
  },
  methods: {
    addEmployee() {
      axios
        .post("http://localhost:8000/api/employees", this.employee)
        .then((response) => this.$router.push({ name: "home" }))
        .catch((err) => console.log(err))
        .finally(() => (this.loading = false));
    },
  },
};
</script>