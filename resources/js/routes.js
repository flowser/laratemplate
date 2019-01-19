import AdminHome from './components/admin/AdminHome.vue'
//category
import CategoryList  from './components/admin/category/List.vue'
import AddCategory  from './components/admin/category/New.vue'
import EditCategory  from './components/admin/category/Edit.vue'
//course
import CourseList  from './components/admin/course/List.vue'
import AddCourse  from './components/admin/course/New.vue'
import EditCourse  from './components/admin/course/Edit.vue'

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

]


