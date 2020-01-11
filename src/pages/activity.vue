<template>
    <div class="activity">
        <div class="pageTitle">
            <div class="textTitle animated flipInX">活动</div>
        </div>
        <div class="contentView">
            <img class="bgActivity animated faster" :class="{fadeInLeft:index%2===0,lightSpeedIn:index%2===1}" v-for="(item,index) in activityInfo" @click="open('/activityDetail',item)" :src="item.imgTitle"/>
        </div>
        <comMenu/>
    </div>
</template>

<script>
    import comMenu from '../pages/components/menu'
    export default {
        components:{
            comMenu
        },
        data () {
            return {
                activityInfo:[
                    {title:"有奖竞猜",imgTitle:require('../assets/activity/bg_ActivityA.png'),imgContent:require('../assets/activity/bg_ActivityDetailA.png')},
                    {title:"幸运轮盘",imgTitle:require('../assets/activity/bg_ActivityB.png'),imgContent:require('../assets/activity/bg_ActivityDetailB.png')},
                    {title:"每日签到",imgTitle:require('../assets/activity/bg_ActivityC.png'),imgContent:require('../assets/activity/bg_ActivityDetailC.png')},
                    {title:"抢红包",imgTitle:require('../assets/activity/bg_ActivityD.png'),imgContent:require('../assets/activity/bg_ActivityDetailD.png')},
                    {title:"推广返佣",imgTitle:require('../assets/activity/bg_ActivityE.png'),imgContent:require('../assets/activity/bg_ActivityDetailE.png')},
                    {title:"注册有礼",imgTitle:require('../assets/activity/bg_ActivityF.png'),imgContent:require('../assets/activity/bg_ActivityDetailF.png')},
                    {title:"首充赠金",imgTitle:require('../assets/activity/bg_ActivityG.png'),imgContent:require('../assets/activity/bg_ActivityDetailG.png')},
                ]
            }
        },
        methods:{
            open(path,item){all.tool.setStore("activityDetail",item);all.router.push(path)},
            back(){all.router.go(-1)}
        },
    }
</script>

<style scoped>
    .activity{
        display:flex;
        flex-direction:column;
    }
    .pageTitle{
        height:0.9rem;
        background:#1d7ef0;
        display:flex;
        align-items:center;
        justify-content:center;
        color:#fff;
        padding:0 0.3rem;
        flex-shrink:0;
        position:relative;
    }
    .textTitle{
        font-size:0.36rem;
        font-weight:400;
    }
    .contentView{
        margin:0 0.3rem;
        flex:1;
        display:flex;
        flex-direction:column;
        align-items:center;
        overflow:scroll;
        padding-top:0.2rem;
    }
    .bgActivity{
        width:6.9rem;
        height:2.3rem;
        margin-bottom:0.2rem;
        border-radius:0.1rem;
        box-shadow:0 0.01rem 0.03rem rgba(0,27,97,0.5);
        flex-shrink:0;
    }

</style>
