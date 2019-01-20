<template>  
  <section class="content">
    <div class="container-fluid">
      <div class="row justify-content-around">
          
          <div class="col-md-10">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add new Course</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" @submit.prevent="addcourse()" enctype="multipart/form-data">
                <!-- {{ csrf_field() }} -->
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Add new Course</label>
                    <input type="text" class="form-control" id="title"  name="title" placeholder="Enter new Course Title"
                          v-model="courseform.title" :class="{ 'is-invalid': courseform.errors.has('title') }">
                          <has-error :form="courseform" field="title"></has-error>
                  </div>                 
                  <div class="form-group">
                    <label for="description">Add new Course Description</label>
                    <!-- <textarea type="text" class="form-control" id="description"  name="description" placeholder="Enter Course Description"
                          v-model="courseform.description" :class="{ 'is-invalid': courseform.errors.has('description') }">
                    </textarea> -->
                    <markdown-editor v-model="courseform.description"></markdown-editor>
                          <has-error :form="courseform" field="description"></has-error>
                  </div>                 
                                  
                  <div class="form-group">
                    <label for="category_id">Select Category</label>
                      <select class="form-control"
                       v-model="courseform.category_id" :class="{ 'is-invalid': courseform.errors.has('category_id') }">
                            <option disabled value="">Select one Category</option>
                            <option v-for="category in getallCategory" :value="category.id" :key="category.id">{{category.name}}</option>                       
                      </select>
                          
                          <has-error :form="courseform" field="category_id"></has-error>
                  </div>                 
                  <div class="form-group">
                        <input @change="changePhoto($event)" type="file" name="photo"
                               :class="{ 'is-invalid': courseform.errors.has('photo') }"> 
                               <img :src="courseform.photo" alt="" width="200px" >
                        <has-error :form="courseform" field="category_id"></has-error>
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
  title: "New",
  data(){
    return{
      courseform: new Form({           
            title:'',
            description:'',
            photo:'',
            user_id:'',
            category_id:'',
            comment_id:'',
      })

    }
  },
  mounted(){
    this.$store.dispatch("allCategory")

  },
  computed:{
      getallCategory(){
                return this.$store.getters.getCategory
     },  
  },
  methods:{
    changePhoto(event){
      let file = event.target.files[0];
      let reader = new FileReader();
      reader.onload = event=> {
        // The file's text will be printed here
        this.courseform.photo =event.target.result
      };

      reader.readAsDataURL(file);

    },
    addcourse(){
       this.$Progress.start();
       this.courseform.post('/course/store')
       .then(()=>{
           this.$router.push('/course-list')
            toast({
              type: 'success',
              title: 'Course Created successfully'
            })
          this.$Progress.finish(); 
       })
       .catch(()=>{

          this.$Progress.fail(); 
       })
      }
  }

}
</script>

<style scoped>

</style>
