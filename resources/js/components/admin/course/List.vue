<template>  
  <div>
   <!-- Main content -->
    <section class="content">
      <div class="row justify-content-around">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Course list</h3>
              <div class="card-tools">
                <button class="btn btn-primary btn md">
                  <router-link to="/add-course" style="color:#ffff"> Add Course</router-link>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>                   
                    <th>S1</th>
                    <th>User</th>
                    <th>category</th>
                    <!-- <th>comment</th> -->
                    <th>Title</th>
                    <th>Description</th>
                    <th>Photo</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(course, index) in getallCourse" :key="course.id">              
                    <td>{{index+1}}</td>
                    <td v-if="course.user">{{course.user.name}}</td>
                    <td v-if="course.category">{{course.category.name}}</td>
                    <td>{{course.title | sortlength(20, "---")}}</td>
                    <td>{{course.description | sortlength(40, "....")}}</td>
                    <td><img :src="course.photo" alt="" width="150px"></td>
                    <td>
                         <a href="">Edit</a>
                          <a href="">Delete</a>
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
       this.$store.dispatch("allCourse")
    },
    computed:{
      getallCourse(){
          return this.$store.getters.getCourse
      }     
    },
    methods:{
      deletecourse(id){
        // console.log(id)
         this.$Progress.start();
          axios.get('/course/destroy/'+id)
             .then(()=>{// if successfully without any errors from form submission
                       this.$store.dispatch("allCourse") // refresh dataviwed fromdb
                        // Fire.$emit('AfterCreate'); //event
                        // $('#Course').modal('hide') 
                        toast({
                            type: 'success',
                            title: 'Course Deleted successfully'
                        })
                        this.$Progress.finish();  
                    })
                    .catch(()=>{
                        toast({
                            type: 'error',
                            title: 'Cannot delete the course'
                        })
                        this.$Progress.fail();  
                    })         
      }

    }
}
</script>

<style scoped>

</style>
