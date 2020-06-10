<template>
    <div class="mine">
        <div class="pageTitle">
            <div class="textTitle animated flipInX">个人中心</div>
            <img class="circleC" src="../assets/mine/img_CircleC.png"/>
            <img class="circleA" src="../assets/mine/img_CircleA.png"/>
            <img class="circleB" src="../assets/mine/img_CircleB.png"/>
        </div>
        <div class="contentView">
            <div class="personalInfo animated flipInY">
                <div class="detail">
                    <img class="imgUser" @click="showChangeUserImg" :src="this.$store.state.userPicture"/>
                    <div class="nameId">
                        <div class="nameBar">
                            <span class="name" v-text="this.$store.state.nickName"></span>
                            <img class="iconEdit" @click="showChangeName" src="../assets/mine/icon_Edit.png"/>
                        </div>
                        <div class="id" v-text="'ID：'+this.$store.state.guid"></div>
                    </div>
                </div>
                <div class="vipBar">
                    <div class="vipName" v-text="'vip'+this.$store.state.vipLevel">vip0</div>
                    <div class="vipLine">
                        <div class="currentLine"></div>
                    </div>
                    <div class="vipName" v-text="'vip'+(this.$store.state.vipLevel+1)">vip1</div>
                </div>
                <div class="currentNumber" v-text="'当前经经验值：'+this.$store.state.experience+'/10000'">当前经验值：3000/10000</div>
            </div>
            <div class="itemBox animated bounceInUp" v-for="item in itemBox">
                <div class="boxTitle" v-text="item.title">个人信息</div>
                <div class="boxItem">
                    <div class="item animated delay-350" :class="{flipInX:index%2===0,flipInY:index%2===1}" v-for="(itemCount,index) in item.list" @click="open(itemCount.path)">
                        <img class="itemIcon" :src="itemCount.icon"/>
                        <div class="itemName" v-text="itemCount.name">当前积分</div>
                    </div>
                </div>
            </div>
            <div class="exitLogin" @click="logout">退出登录</div>
        </div>
        <comMenu/>
        <changeName v-if="this.$store.state.isShowChangeName"/>
        <changeUserImg v-if="this.$store.state.isShowChangeUserImg"/>
    </div>
</template>

<script>
    import comMenu from '../pages/components/menu'
    import changeName from '../pages/components/changeName'
    import changeUserImg from '../pages/components/changeUserImg'
    export default {
        components:{
            comMenu,
            changeName,
            changeUserImg,
        },
        data () {
            return {
                itemBox:[
                    {title:"个人信息",list:[
                        {icon:require("../assets/mine/icon_Credits.png"),name:"当前积分"},
                        {icon:require("../assets/mine/icon_Vip.png"),name:"我的VIP",path:"/myVip"}
                        ]},
                    {title:"报表管理",list:[
                        {icon:require("../assets/mine/icon_UserDetail.png"),name:"账户明细"},
                        {icon:require("../assets/mine/icon_PersonalList.png"),name:"个人报表"},
                        {icon:require("../assets/mine/icon_BetRecord.png"),name:"投注记录"},
                        {icon:require("../assets/mine/icon_LoadRecord.png"),name:"充值记录",path:"/reChargeRecord"},
                        {icon:require("../assets/mine/icon_WithdrawRecord.png"),name:"提现记录",path:"/withdrawRecord"}
                        ]},
                    {title:"其他服务",list:[
                        {icon:require("../assets/mine/icon_SafelyCenter.png"),name:"安全中心",path:"/safelyCenter"},
                        {icon:require("../assets/mine/icon_HelpCenter.png"),name:"帮助中心",path:"/helpCenter"},
                        {icon:require("../assets/mine/icon_MessageCenter.png"),name:"消息中心",path:"/messageCenter"},
                        {icon:require("../assets/mine/icon_ServiceCenter.png"),name:"客服中心",path:"/serviceCenter"},
                        ]}
                ],
                isShowExitLoginBox:false
            }
        },

        methods:{
            open(path){all.router.push(path)},
            back(){all.router.go(-1)},
            showChangeName(){
                all.store.commit("isShowChangeName",true)
            },
            showChangeUserImg(){
                all.store.commit("isShowChangeUserImg",true)
            },
            logout(){
                all.tool.tipWinShow("是否确定退出当前登录账号",()=>{
                    all.tool.send("logout",null,res=>{
                        all.tool.setLogoutData();
                        all.router.push("/")
                    },req=>{console.log(req)});
                },{icon:"warn",name:"退出登录"})
            },
        },
    }
</script>

<style scoped>
    .mine{
        display:flex;
        flex-direction:column;
        background:#eeeeee;
    }
    .pageTitle{
        height:3.1rem;
        background:linear-gradient(90deg,#51a1ff,#1d7ef0);
        color:#fff;
        padding:0 0.3rem;
        flex-shrink:0;
    }
    .textTitle{
        height:0.9rem;
        display:flex;
        justify-content:center;
        align-items:center;
        font-size:0.36rem;
        font-weight:400;
        position:relative;
    }
    .circleA{
        width:2.58rem;
        height:auto;
        position:absolute;
        top:0.2rem;
        left:0.5rem;
        z-index:1;
        animation:circleA 8s infinite alternate;
    }
    .circleB{
        width:1.65rem;
        height:auto;
        position:absolute;
        top:1.8rem;
        left:4.8rem;
        z-index:1;
        animation:circleB 7s infinite alternate;
    }
    .circleC{
        width:1.1rem;
        height:auto;
        position:absolute;
        top:0.7rem;
        left:2.7rem;
        z-index:1;
        animation:circleC 6s infinite alternate;
    }
    .contentView{
        margin:-2.2rem 0 0;
        flex:1;
        display:flex;
        flex-direction:column;
        overflow:scroll;
    }
    .personalInfo{
        width:6.9rem;
        height:2.6rem;
        background:linear-gradient(140deg,#0075ff,#006def);
        border-radius:0.15rem;
        box-shadow:0 0.01rem 0.03rem rgba(0,27,97,0.5);
        display:flex;
        flex-direction:column;
        justify-content:center;
        padding:0 0.55rem;
        margin:0 0.3rem 0.4rem;
        flex-shrink:0;
        z-index:2;
    }
    .detail{
        color:#ffffff;
        font-size:0.3rem;
        display:flex;
        align-items:center;
        z-index:2;
    }
    .imgUser{
        width:1rem;
        height:1rem;
        margin-right:0.3rem;
    }
    .nameBar{
        display:flex;
        align-items:center;
        margin-bottom:0.05rem;
    }
    .name{
        width:1.6rem;
    }
    .iconEdit{
        width:0.3rem;
        height:0.3rem;
        margin-left:0.3rem;
    }
    .vipBar{
        font-size:0.18rem;
        color:#ffffff;
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin:0.2rem 0;
        z-index:2;
    }
    .vipLine{
        height:0.14rem;
        background:#f5eae2;
        border:0.01rem solid #ffffff;
        flex:1;
        margin:0 0.2rem;
    }
    .currentLine{
        width:30%;
        height:0.12rem;
        background:#fca52b;
    }
    .currentNumber{
        font-size:0.18rem;
        color:#ffffff;
        z-index:2;
    }
    .itemBox{
        background:#ffffff;
        border-radius:0.15rem;
        box-shadow:0 0.01rem 0.03rem rgba(0,27,97,0.5);
        padding:0.2rem 0.25rem;
        flex-shrink:0;
        margin:0 0.3rem 0.3rem;
        z-index:2;
    }
    .boxTitle{
        font-size:0.3rem;
        font-weight:400;
        height:0.4rem;
        padding-left:0.05rem;
    }
    .boxItem{
        display:flex;
        flex-wrap:wrap;
    }
    .item{
        width:1.6rem;
        height:1.6rem;
        display:flex;
        flex-direction:column;
        align-items:center;
        justify-content:center;
    }
    .itemIcon{
        height:0.5rem;
        width:auto;
        margin-bottom:0.25rem;
    }
    .itemName{
        font-size:0.24rem;
        font-weight:400
    }
    .exitLogin{
        height:0.8rem;
        display:flex;
        justify-content:center;
        align-items:center;
        font-size:0.3rem;
        font-weight:400;
        color:#333333;
        background:#ffffff;
        box-shadow:0 0.01rem 0.03rem rgba(0,27,97,0.5);
        margin-bottom:0.6rem;
        flex-shrink:0;
    }

</style>
