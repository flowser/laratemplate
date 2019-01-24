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
                    <th>
                      <select name="" id="" @change="deleteSelected" v-model="select">
                        <option value="">Select</option>
                        <option value="">Delete All</option>
                      </select><br>
                      <input type="checkbox" @click.prevent="selectAll" v-model="all_select">
                      <span v-if="all_select == false">Check all</span>
                      <span v-else>Uncheck all</span>
                     
                    </th>
                    <th>S1</th>
                    <th>Category Name</th>
                    <th>Date</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(category, index) in getallCategory" :key="category.id">
                    <td><input type="checkbox" v-model="categoryItem" :value="category.id"></td>
                    <td>{{index+1}}</td>
                    <td>{{category.name}}</td>
                    <td>{{category.created_at | dateformat}}</td>
                    <td>
                         <router-link :to="`/edit-category/${category.id}`">Edit</router-link>
                          <a href="" @click.prevent = "deletecategory(category.id)">Delete</a>
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
    data(){
      return{
        categoryItem:[],
        select:'',
        all_select: false
      }

    },
    mounted(){
       this.$store.dispatch("allCategory")
    },
    computed:{
      getallCategory(){
          return this.$store.getters.getCategory
      }     
    },
    methods:{
      deletecategory(id){
        // console.log(id)
         this.$Progress.start();
          axios.get('/category/destroy/'+id)
             .then(()=>{// if successfully without any errors from form submission
                      this.$Progress.start();
                      this.$store.dispatch("allCategory") // refresh dataviwed fromdb
                        // Fire.$emit('AfterCreate'); //event
                        // $('#Category').modal('hide') 
                        toast({
                            type: 'success',
                            title: 'Category Deleted successfully'
                        })
                        this.$Progress.finish();  
                    })
                    .catch(()=>{
                        toast({
                            type: 'error',
                            title: 'Cannot delete the category'
                        })
                        this.$Progress.fail();  
                    })         
      },
      deleteSelected(){
        console.log(this.categoryItem)
          axios.get('/category/destroy/selected/'+this.categoryItem)
            .then(()=>{// if successfully without any errors from form submission
                        this.$Progress.start();
                        this.categoryItem = []
                        this.$store.dispatch("allCategory") // refresh dataviwed fromdb
                          // Fire.$emit('AfterCreate'); //event
                          // $('#Category').modal('hide') 
                          toast({
                              type: 'success',
                              title: 'Category Deleted successfully'
                          })
                          this.$Progress.finish();  
                      })
                      .catch(()=>{
                          toast({
                              type: 'error',
                              title: 'Cannot delete the category'
                          })
                          this.$Progress.fail();  
                      }) 
      },
      selectAll(){
        if(this.all_select ==false){
             this.all_select = true
          for(var category in this.getallCategory ){
              this.categoryItem.push(this.getallCategory[category].id)
          }
        }else{
            this.all_select = false
            this.categoryItem = []//empty
        }
         
      }

    }
}
</script>

<style scoped>

</style>
