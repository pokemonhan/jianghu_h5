import Vue from 'vue'
import Vuex from 'vuex';


Vue.use(Vuex);

const state={
    isLogin:false
};
const mutations={};
for(let item in state){
    mutations[item]=(state,value)=>{
        state[item]=value
    }
}
export default new Vuex.Store({
    state,
    mutations
})
