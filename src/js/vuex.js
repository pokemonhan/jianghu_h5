import Vue from 'vue'
import Vuex from 'vuex';


Vue.use(Vuex);

const state={
    isLogin:true,
    amount:"12345678.00",
    nickName:"哈土奇一号"
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
