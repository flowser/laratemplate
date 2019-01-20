<template>  
  <section class="content">
    <div class="container-fluid">
      <div class="row justify-content-around">
          
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add new Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" @submit.prevent="addcategory()">
                <!-- {{ csrf_field() }} -->
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Add new Category</label>
                    <input type="text" class="form-control" id="name"  name="name" placeholder="Enter Add new Category"
                          v-model="categoryform.name" :class="{ 'is-invalid': categoryform.errors.has('name') }">
                          <has-error :form="categoryform" field="name"></has-error>
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
      categoryform: new Form({
            name:'',
      })

    }
  },
  methods:{
      addcategory(){
        
        this.categoryform.pooouist('/category/store')
        
                     .then(()=>{// if successfully without any errors from form submission
                      
                        this.$router.push('/category-list')
                        // Fire.$emit('AfterCreate'); //event
                        // $('#Category').modal('hide') 
                        this.$Progress.start();
                        toast({
                            type: 'success',
                            title: 'Category Created successfully'
                        })
                        this.$Progress.finish();  
                    })
                    .catch(()=>{
                        toast({
                            type: 'error',
                            title: 'There are errors check  your form again'
                        })
                        this.$Progress.fail();  
                    })
      }
  }

}
</script>

<style scoped>

</style>
