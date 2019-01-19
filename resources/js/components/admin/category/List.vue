<template>  
  <div>
   <!-- Main content -->
    <section class="content">
      <div class="row justify-content-around">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Category list</h3>
              <div class="card-tools">
                <button class="btn btn-primary btn md">
                  <router-link to="/add-category" style="color:#ffff"> Add Category</router-link>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>S1</th>
                    <th>Category Name</th>
                    <th>Date</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(category, index) in getallCategory" :key="category.id">
                    <td>{{index+1}}</td>
                    <td>{{category.name}}</td>
                    <td>{{category.created_at | dateformat}}</td>
                    <td>
                      <a href="" >Edit</a>
                      <a href="" >Delete</a>
                    </td>                  
                  </tr>              
                </tbody>               
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section> 
  </div>
</template>

<script>
export default {
    name: "List",
    mounted(){
       this.$store.dispatch("allCategory")
    },
    computed:{
      getallCategory(){
          return this.$store.getters.getCategory
      }     
    },
    methods:{

    }
}
</script>

<style scoped>

</style>
