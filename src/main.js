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
    timeout:5000,
    header:{
        'X-Requested-With':'XMLHttpRequest',
        'content-type':'application/x-www-form-urlencoded'
    },
    // validateStatus:status=>{return status>=100 && status<=600}
});
all.http.interceptors.request.use(req=>{
    let Authorization=all.tool.getStore("Authorization");
    let notLoginApi=req.url.indexOf("h5-api/login")===-1;
    if(Authorization && notLoginApi)req.headers.Authorization=Authorization;
    return req;
});
if(all.tool.getStore("Authorization")){
    all.tool.send("information",null,res=>{all.tool.setLoginData(res.data.data)},err=>{console.log(err.response)});
}
all.http.interceptors.response.use(res=>{return Promise.resolve(res.data);},error=>{
    console.log("拦截器",error.response);
    if(error.response.status===401)all.tool.tipWinShow(error.response.data.message,()=>{all.router.push("/login")},"前往登录");
    if(error.response.status===403)all.tool.tipWinShow(error.response.data.message,()=>{},"确定");
    return Promise.reject(error)
});
all.$=$;
/* eslint-disable no-new */
new Vue({
    el: '#app',
    router,
    store,
    components: { App },
    template: '<App/>'
});

