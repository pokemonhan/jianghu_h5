import Vue from 'vue'
import Router from 'vue-router'
import homePage from '../pages/homePage'
import activity from '../pages/activity'
import activityDetail from '../pages/activityDetail'
import mine from '../pages/mine'
import myVip from '../pages/myVip'
import helpCenter from '../pages/helpCenter'
import helpApp from '../pages/helpApp'
import helpPromote from '../pages/helpPromote'
import helpDeposit from '../pages/helpDeposit'
import safelyCenter from '../pages/safelyCenter'
import serviceCenter from '../pages/serviceCenter'
import messageCenter from '../pages/messageCenter'
import systemNotice from '../pages/systemNotice'
import messageList from '../pages/messageList'
import onlineService from '../pages/onlineService'
import reCharge from '../pages/reCharge'
import reChargeOrder from '../pages/reChargeOrder'
import reChargePay from '../pages/reChargePay'
import login from '../pages/login'
import register from '../pages/register'
import forgetPassword from '../pages/forgetPassword'
import promote from '../pages/promote'
import promoteExplain from '../pages/promoteExplain'
import promoteEarnings from '../pages/promoteEarnings'
import promoteWashCode from '../pages/promoteWashCode'


Vue.use(Router);

export default new Router({
    mode:"history",
    routes: [
        { path: '/', component: homePage},
        { path: '/activity', component: activity},
        { path: '/activityDetail', component: activityDetail},
        { path: '/mine', component: mine},
        { path: '/myVip', component: myVip},
        { path: '/helpCenter', component: helpCenter},
        { path: '/helpApp', component: helpApp},
        { path: '/helpPromote', component: helpPromote},
        { path: '/helpDeposit', component: helpDeposit},
        { path: '/safelyCenter', component: safelyCenter},
        { path: '/serviceCenter', component: serviceCenter},
        { path: '/messageCenter', component: messageCenter},
        { path: '/systemNotice', component: systemNotice},
        { path: '/messageList', component: messageList},
        { path: '/onlineService', component: onlineService},
        { path: '/reCharge', component: reCharge},
        { path: '/reChargeOrder', component: reChargeOrder},
        { path: '/reChargePay', component: reChargePay},
        { path: '/login', component: login},
        { path: '/register', component: register},
        { path: '/forgetPassword', component: forgetPassword},
        { path: '/promote', component: promote},
        { path: '/promoteExplain', component: promoteExplain},
        { path: '/promoteEarnings', component: promoteEarnings},
        { path: '/promoteWashCode', component: promoteWashCode},
    ]
})
