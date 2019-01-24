<template>
    <span id="blogCourse">
       <section id="inner-headline">
            <div class="container">
                <div class="row">
                <div class="span4">
                    <div class="inner-heading">
                    <h2>Blog left sidebar </h2>
                    </div>
                </div>
                <div class="span8">
                    <ul class="breadcrumb">
                    <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
                    <li><a href="#">Blog</a><i class="icon-angle-right"></i></li>
                    <li class="active">Blog with left sidebar</li>
                    </ul>
                </div>
                </div>
            </div>
    </section>
    <section id="content">
      <div class="container">
        <div class="row">
          <div class="span8">
            <article v-for="course in blogcourse" :key="course.id">
              <div class="row">
                <div class="span8">
                  <div class="post-image">
                    <div class="post-heading">
                      <h3><a href="#">{{course.title}}</a></h3>
                    </div>
                    <img :src="`img/courses/large/${course.photo}`" alt="" >
                  </div>
                  <p>
                   {{course.description | sortlength(500, "...")}}
                  </p>
                  <div class="bottom-article">
                    <ul class="meta-post">
                      <li><i class="icon-calendar"></i><a href="#"> {{course.created_at | dateformat}}</a></li>
                      <li v-if="course.user"><i class="icon-user"></i><a href="#"> {{course.user.name}}</a></li>
                      <li v-if="course.category"><i class="icon-folder-open"></i><a href="#"> {{course.category.name}}</a></li>
                      <li><i class="icon-comments"></i><a href="#">4 Comments</a></li>
                    </ul>
                    <router-link :to="`/blog/${course.id}`" class="pull-right">Continue Reading <i class="icon-angle-right"></i></router-link>
                  </div>
                </div>
              </div>
            </article>
           
            <div id="pagination">
              <span class="all">Page 1 of 3</span>
              <span class="current">1</span>
              <a href="#" class="inactive">2</a>
              <a href="#" class="inactive">3</a>
            </div>
          </div>
        
           <BlogSidebar/>
        </div>
      </div>
    </section>
</span>
</template>

<script>
    import BlogSidebar from "./BlogSidebar.vue"
        export default {
            name:"BlogCourse",
                           
            components:{
                    BlogSidebar
                },
                mounted() {
                    this.$store.dispatch('allBlogCourse'); //action from index.js
                },
                computed:{
                    blogcourse(){
                        return this.$store.getters.getBlogCourse
                    }
                },
                methods:{
                    getAllCategoryCourse(){
                      if(this.$route.params.id !=null){
                          this.$store.dispatch('getCoursebyCatId', this.$route.params.id); 
                      }else{
                          this.$store.dispatch('allBlogCourse'); //action from index.js
                      }
                        
                    }
                },
                watch:{
                  $route(to, from){
                      this.getAllCategoryCourse();
                  }
                }
            }
</script>
