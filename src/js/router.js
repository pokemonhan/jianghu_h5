import Vue from 'vue'
import Router from 'vue-router'
import homePage from '../pages/homePage'
import gameList from '../pages/gameList'
import login from '../pages/login'
import register from '../pages/register'
import findPassword from '../pages/findPassword'

Vue.use(Router);

export default new Router({
    // base:'/dist',
    // mode:"history",
    routes: [
        { path: '/', component: homePage},
        { path:'/gameList',component:gameList},
        { path:'/login',component:login},
        { path:'/register',component:register},
        { path:'/findPassword',component:findPassword},
    ]
})
