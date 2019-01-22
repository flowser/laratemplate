import AdminHome from './components/admin/AdminHome.vue'
//category
import CategoryList  from './components/admin/category/List.vue'
import AddCategory  from './components/admin/category/New.vue'
import EditCategory  from './components/admin/category/Edit.vue'
//course
import CourseList  from './components/admin/course/List.vue'
import AddCourse  from './components/admin/course/New.vue'
import EditCourse  from './components/admin/course/Edit.vue'

//FrontEnd Comonent
import PublicHome from './components/public/PublicHome.vue'
import BlogPost from './components/public/blog/BlogPost.vue'




export const routes = [
    { 
      path: '/home', 
      component: AdminHome 
    }, 
    { 
      path: '/category-list', 
      component: CategoryList 
    },
    { 
      path: '/add-category', 
      component: AddCategory 
    },
    { 
      path:'/edit-category/:categoryid',
      component: EditCategory 
    },

  //Course
    { 
      path: '/course-list', 
      component: CourseList 
    },
    { 
      path: '/add-course', 
      component: AddCourse 
    },
    { 
      path:'/edit-course/:courseid',
      component: EditCourse 
    },


//Front End
  { 
    path:'/',
    component: PublicHome 
  },
  { 
    path:'/blog',
    component: BlogPost 
  },



]


