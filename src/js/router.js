import Vue from 'vue'
import Router from 'vue-router'
import homePage from '../pages/homePage'
import activity from '../pages/activity'
import activityDetail from '../pages/activityDetail'
import mine from '../pages/mine'


Vue.use(Router);

export default new Router({
    mode:"history",
    routes: [
        { path: '/', component: homePage},
        { path: '/activity', component: activity},
        { path: '/activityDetail', component: activityDetail},
        { path: '/mine', component: mine},

    ]
})
