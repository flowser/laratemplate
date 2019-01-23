<template>
    <span id="sidebar">
         <div class="span4">
                <aside class="right-sidebar">
                        <div class="widget">
                            <form class="form-search">
                            <input placeholder="Type something" type="text" class="input-medium search-query">
                            <button type="submit" class="btn btn-square btn-theme">Search</button>
                            </form>
                        </div>
                        <div class="widget">
                            <h5 class="widgetheading">Categories</h5>
                            <ul class="cat">
                                <li v-for="category in allcategories" :key="category.id">
                                    <i class="icon-angle-right"></i>
                                    <router-link :to="`/categories/${category.id}`">{{category.name}}</router-link>
                                    <span> (20)</span>
                                </li>                            
                            </ul>
                        </div>
                        <div class="widget">
                            <h5 class="widgetheading">Latest posts</h5>
                            <ul class="recent">
                                <li v-for="(course, index) in   blogcourse" :key="course.id" v-if="index<5">
                                    <img :src="`img/courses/small/${course.photo}`" class="pull-left" alt="" width="70" />
                                    <h6><router-link :to="`/blog/${course.id}`">{{course.title}}</router-link></h6>
                                    <p>
                                    {{course.description | sortlength(100, "....")}}
                                    </p>
                                </li>                           
                            </ul>
                        </div>
                       
                 </aside>
            </div>
                        

    </span>
</template>

<script>
    export default {
      name:"BlogSidebar",
      computed:{
          allcategories(){
              return this.$store.getters.allcategories;
          },
            blogcourse(){
                        return this.$store.getters.getBlogCourse
                    }
      },
        mounted() {
             this.$store.dispatch('allBlogCourse'); //action from index.js
            this.$store.dispatch('allcategories');
        },
       
    }
</script>
