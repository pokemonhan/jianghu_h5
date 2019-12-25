<template>
    <div class="activityDetail">
        <div class="pageTitle">
            <img class="iconBack" src="../assets/activity/btn_Back.png" @click="back"/>
            <div class="textTitle">推广帮助</div>
        </div>
        <div class="contentView">
            <div class="stepText" v-for="item in promoted">
                <div class="stepTitle" v-text="item.title"></div>
                <div class="stepContent" v-text="item.content"></div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                promoted:[
                    {title:"1.怎么代理？",content:"扫码或者点击邀请链接选择在浏览器中打开，注册下载游戏，用您得专属二维码或邀请链接推广。"},
                    {title:"2.自己的邀请码在哪？",content:"游戏主界面，点击“推广赚钱”会有您自己的专属二维码和注册链接，保存图片就可以分享了，通过此方法注册的会员即成为您的直属下级，其邀请的下级会员皆算做您的团队成员，依次类推，可裂变式发展。"},
                    {title:"3.怎么的佣金在哪里查看？",content:"游戏主界面，点击“推广赚钱”就能看到您的可领取佣金、下级返利佣金详情。"},
                    {title:"4.佣金是怎么算的？",content:"指玩家在游戏内有效投注的情况下的输的钱，如推广的一个玩家下注输500元，一级返利15%，二级返利是10%，三级返利是5%；那么您得到佣金就是500*15%+500*10%+500*10%。"},
                    {title:"5.佣金多久结算？",content:"返佣制度为日结算，每日23：59分就行结算，系统自动发放至您的账户。"},
                ]
            }
        },
        methods:{
            open(path){all.router.push(path)},
            back(){all.router.go(-1)}
        },
    }
</script>

<style scoped>
    .activityDetail{
        display:flex;
        flex-direction:column;
        background:#eeeeee;
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
    .iconBack{
        width:0.18rem;
        height:0.34rem;
        position:absolute;
        left:0.3rem;
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
        align-items:flex-start;
        overflow:scroll;
        padding-top:0.3rem;
    }
    .stepText{
        width:6.9rem;
        margin-bottom:0.3rem;
        border-radius:0.1rem;
        background:#ffffff;
        font-size:0.2rem;
        color:#999999;
        padding:0.3rem 0.2rem;
    }
    .stepTitle{
        font-size:0.24rem;
        color:#666666;
        font-weight:400;
    }
    .stepContent{
        padding:0.1rem;
        line-height:0.35rem;
        text-indent:2em;
    }

</style>
