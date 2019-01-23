export default{
  state:{
        category:[],
        course:[],
        blogcourse:[], //blogcoursedata, + courses per cateegory id
        singlecourse:[],
        allcategories:[],
        
  },
  getters:{
       getCategory(state){
          return state.category
    },
       getCourse(state){
          return state.course
    },
       getBlogCourse(state){
          return state.blogcourse
    },
       singlecourse(state){
          return state.singlecourse
    },
       allcategories(state){
          return state.allcategories
    },
    
  },
  actions:{
      allCategory(context){
          axios.get('/category')
                .then((response)=>{
                    // console.log(response.data)
                    context.commit('categoriesdata', response.data.categories)
                })
      },
      allCourse(context){
          axios.get('/course')
                .then((response)=>{
                    // console.log(response.data)
                    context.commit('coursesdata', response.data.courses)
                })
      },
      allBlogCourse(context){
          axios.get('/blogcourse')
                .then((response)=>{
                    // console.log(response.data)
                    context.commit('blogdata', response.data.courses)
                })
      },
      getCourseById(context, payload){
          axios.get('/blogcourse/show/'+payload)
                .then((response)=>{
                    // console.log(response.data)
                    context.commit('singlecoursedata', response.data.course)
                })
      },
      allcategories(context){
          axios.get('/blogcourse/categories/')
                .then((response)=>{
                    // console.log(response.data)
                    context.commit('allcategoriesdata', response.data.categories)
                })
      },
      getCoursebyCatId(context, payload){
          axios.get('/blogcourse/categories/courses/'+payload)
                .then((response)=>{
                    console.log(response.data.courses)
                    context.commit('getCoursebyCatId', response.data.courses)
                })
      },
  },
  mutations:{
      categoriesdata(state, data){
        return state.category = data
      },       
      coursesdata(state, data){
        return state.course = data
      },       
      blogdata(state, data){
        return state.blogcourse = data
      },       
      singlecoursedata(state, data){
        return state.singlecourse = data
      },       
      allcategoriesdata(state, data){
        return state.allcategories = data
      },       
      getCoursebyCatId(state, payload){
        return state.blogcourse = payload
      }       

  }
}