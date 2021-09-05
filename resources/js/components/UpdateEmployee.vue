<template>
  <div>
    <div class="container">
      <h2>Update Company</h2>
      <div class="panel panel-primary">
        <div class="panel-heading">
            Update Company
            <router-link to="/" class="btn btn-info pull-right" style="margin-top:-7px;margin-left:2px;">Company List</router-link>
        </div>
        <div class="panel-body">
          <form @submit.prevent="updateCompany">
             <div class="form-group">
              <label>Logo</label>
              <input type="text" class="form-control" v-model="company.name" />
            </div>
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" v-model="company.name" />
            </div>
            <div class="form-group">
              <label>Email</label>
              <input
                type="email"
                class="form-control"
                v-model="company.email"
              />
            </div>
            
        

            <button type="submit" class="btn btn-primary">Add</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>
 
<script>
import axios from'axios';
import router from ''
export default {
  data() {
    return {
      employee: {},
    };
  },
  created() {
    axios
      .get(`http://localhost:8000/api/employees/${this.$route.params.id}`)
      .then((res) => {
        this.employee = res.data;
      })
      .catch(error => console.log(error))
  },
  methods: {
    updateEmployee() {
      axios
        .patch(
          `http://localhost:8000/api/employees/${this.$route.params.id}`,
          this.employee
        )
        .then((res) => {
            prompt(res);
          this.$router.push({ name: "home" });
        });
    },
  },
};
</script>