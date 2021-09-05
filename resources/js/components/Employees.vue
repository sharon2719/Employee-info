<template>
  <div>
    <div class="container">
      <h2>Employees</h2>
      <div class="panel panel-primary">
        <div class="panel-heading">
           Employees
            <router-link to="/add" class="btn btn-info pull-right" style="margin-top:-7px;margin-left:2px;">Add Employees</router-link>
        </div>
        <div class="panel-body">
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Company</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="employee in employees" :key="employee.id">
                <td>{{ employee.id }}</td>
                <td>{{ employee.firstname }}</td>
                <td>{{ employee.lastname }}</td>
                <td>{{ employee.company }}</td>
                <td>{{ employee.phone }}</td>
                <td>{{ employee.email }}</td>
               <td>{{ employee.phone }}</td>

                <td>
                  <div class="btn-group" role="group">
                    <router-link
                      :to="{ name: 'edit', params: { id: employee.id } }"
                      class="btn btn-success"
                      >Edit</router-link
                    >
                    <button
                      class="btn btn-danger"
                      @click="deleteEmployee(employee.id)"
                    >
                      Delete
                    </button>
                  </div>
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
  data() {
    return {
      employees: [],
    };
  },
  created() {
    this.axios.get("http://localhost:8000/api/employees").then((response) => {
      this.employees = response.data;
    });
  },
  methods: {
    deleteEmployee(id) {
      this.axios
        .delete(`http://localhost:8000/api/employees/${id}`)
        .then((response) => {
          let i = this.employees.map((data) => data.id).indexOf(id);
          this.employees.splice(i, 1);
        });
    },
  },
};
</script>
                