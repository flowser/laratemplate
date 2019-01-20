<template>  
  <section class="content">
    <div class="container-fluid">
      <div class="row justify-content-around">
          
          <div class="col-md-10">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Course {{this.$route.params.courseid}}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" @submit.prevent="updateCourse()" enctype="multipart/form-data">
                <!-- {{ csrf_field() }} -->
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Update Course</label>
                    <input type="text" class="form-control" id="title"  name="title" placeholder="Enter new Course Title"
                          v-model="courseform.title" :class="{ 'is-invalid': courseform.errors.has('title') }">
                          <has-error :form="courseform" field="title"></has-error>
                  </div>                 
                  <div class="form-group">
                    <label for="description">Edit Course Description</label>                    
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
                    <!-- updateCourseImage
                    img/courses/small/${courseform.photo} -->
                        <input @change="changePhoto($event)" type="file" name="photo"
                               :class="{ 'is-invalid': courseform.errors.has('photo') }"> 
                               <img :src=" updateCourseImage()" alt="" width="250">
                        <has-error :form="courseform" field="category_id"></has-error>
                  </div>                 
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Udpate</button>
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
  created(){
      axios.get(`/course/edit/${this.$route.params.courseid}`) //fetch data to editn fill form
        .then((response)=>{
          console.log(response.data)
              this.courseform.fill(response.data.course)
        })
        .catch(()=>{

        })
  },
  computed:{
      getallCategory(){
                return this.$store.getters.getCategory
     },  
  },
  methods:{
    changePhoto(event){
      let file = event.target.files[0];  
          if(file.size>1048576){
            Swal.fire({
                    type: 'error',
                    title: 'Oops...',
                    text: 'The File youe are uploading is larger than 2mbs!',
                    footer: '<a href>Why do I have this issue?</a>'
                  })
          }else{
              let reader = new FileReader();
                reader.onload = event=> {
                      this.courseform.photo =event.target.result
                          console.log(event.target.result)
                    };
                reader.readAsDataURL(file);
          }
      

    },
    updateCourse(){
       this.$Progress.start();
       this.courseform.post(`/course/update/${this.$route.params.courseid}`)
       .then(()=>{
           this.$router.push('/course-list')
            toast({
              type: 'success',
              title: 'Course Updated successfully'
            })
          this.$Progress.finish(); 
       })
       .catch(()=>{

          this.$Progress.fail(); 
       })
      },
      updateCourseImage(){
         let img = this.courseform.photo;
                if(img.length>100){
                    return  this.courseform.photo
                }else{
                    return `img/courses/medium/${this.courseform.photo}`
                }
      }

  }

}
</script>

<style scoped>

</style>
