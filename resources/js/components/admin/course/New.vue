<template>  
  <section class="content">
    <div class="container-fluid">
      <div class="row justify-content-around">
          
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add new Course</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" @submit.prevent="addcourse()">
                <!-- {{ csrf_field() }} -->
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Add new Course</label>
                    <input type="text" class="form-control" id="name"  name="name" placeholder="Enter Add new Course"
                          v-model="courseform.name" :class="{ 'is-invalid': courseform.errors.has('name') }">
                          <has-error :form="courseform" field="name"></has-error>
                  </div>                 
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
      </div>
    </div>
  </section>
   
</template>

<script>
export default {
  name: "New",
  data(){
    return{
      courseform: new Form({
            name:'',
      })

    }
  },
  methods:{
      addcourse(){
        this.courseform.post('/course/store')
                     .then(()=>{// if successfully without any errors from form submission
                        this.$router.push('/course-list')
                        // Fire.$emit('AfterCreate'); //event
                        // $('#Course').modal('hide') 
                        toast({
                            type: 'success',
                            title: 'Course Created successfully'
                        })
                        // this.$Progress.finish();  
                    })
                    .catch(()=>{
                        toast({
                            type: 'error',
                            title: 'There are errors check  your form again'
                        })
                        // this.$Progress.fail();  
                    })
      }
  }

}
</script>

<style scoped>

</style>
