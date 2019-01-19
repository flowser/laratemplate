export default{
  state:{
        category:[],
        course:[],
  },
  getters:{
       getCategory(state){
          return state.category
    },
       getCourse(state){
          return state.course
    }
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
  },
  mutations:{
      categoriesdata(state, data){
        return state.category = data
      },       
      coursesdata(state, data){
        return state.course = data
      }       

  }
}