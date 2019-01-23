<template>
    <span id="singleblog">        
        <section id="content">
                <div class="container">
                    <div class="row">
                        <div class="span8">
                            <article>
                                <div class="row">
                                    <div class="span8">
                                        <div class="post-image">
                                            <div class="post-heading">
                                            <h3><a href="#">{{SingleCourse.title}}</a></h3>
                                            
                                            </div>
                                            <img :src="`img/courses/large/${SingleCourse.photo}`" alt="" />
                                        </div>
                                        <p>
                                            {{SingleCourse.description}}
                                        </p>                                       
                                        
                                        <div class="bottom-article">
                                            <ul class="meta-post">
                                            <li v-if="SingleCourse.user"><i class="icon-user"></i><a href="#"> {{SingleCourse.user.name}}</a></li>                                            
                                            <li v-if="SingleCourse.category"><i class="icon-tags"></i><a href="#">{{SingleCourse.category.name}}</a></li>
                                            </ul>
                                        </div>
                                    </div>                                  
                                </div>
                            </article>                                        
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
            name:"SingleBlog",
                           
            components:{
                    BlogSidebar
                },                
                computed:{
                    SingleCourse(){
                        return this.$store.getters.singlecourse
                    },
                    
                },
                methods:{
                    singlecourse(){
                        this.$store.dispatch('getCourseById', this.$route.params.id);   //action from index.js
                    }
                },
                mounted() { //action
                        this.singlecourse();  //method                   
                },
                watch:{
                    $route(to, from){
                          this.singlecourse();//method
                    }
                }
            }
</script>
