// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './js/router'
import store from './js/vuex'
import tool from './js/tool'
import config from './js/config'
import animate from 'animate.css'
import $ from 'jquery'
import http from 'axios'

Vue.config.productionTip = false;
Vue.use(animate);
window.all={};
all.store=store;
all.router=router;
all.tool=tool;
all.config=config;
all.http=http.create({
    baseURL:all.config.basePath,
    header:{
        'X-Requested-With':'XMLHttpRequest',
        'content-type':'application/x-www-form-urlencoded'
    }});
all.$=$;
/* eslint-disable no-new */
new Vue({
    el: '#app',
    router,
    store,
    components: { App },
    template: '<App/>'
});
