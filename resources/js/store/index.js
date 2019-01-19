export default{
  state:{
        category:[],
  },
  getters:{
       getCategory(state){
          return state.category
    }
  },
  actions:{
      allCategory(context){
          axios.get('/category')
                .then((response)=>{
                    // console.log(response.data)
                    context.commit('categoris', response.data.categories)
                })
      },
  },
  mutations:{
      categoris(state, data){
        return state.category = data
      }       

  }
}