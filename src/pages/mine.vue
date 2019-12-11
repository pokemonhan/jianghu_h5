<template>
    <div class="mine">
        <div class="pageTitle">
            <div class="textTitle">
                <span>个人中心</span>
                <img class="iconService" src="../assets/homePage/icon_Service.png"/>
            </div>
            <img class="circleC" src="../assets/mine/img_CircleC.png"/>
            <img class="circleA" src="../assets/mine/img_CircleA.png"/>
            <img class="circleB" src="../assets/mine/img_CircleB.png"/>
        </div>
        <div class="contentView">
            <div class="personalInfo">
                <div class="detail">
                    <img class="imgUser" src="../assets/homePage/img_User.png"/>
                    <div class="nameId">
                        <div class="nameBar">
                            <span class="name">两只小蜜蜂</span>
                            <img class="iconEdit" src="../assets/mine/icon_Edit.png"/>
                        </div>
                        <div class="id">ID：189673</div>
                    </div>
                </div>
                <div class="vipBar">
                    <div class="vipName">vip0</div>
                    <div class="vipLine">
                        <div class="currentLine"></div>
                    </div>
                    <div class="vipName">vip1</div>
                </div>
                <div class="currentNumber">当前经验值：3000/10000</div>
            </div>
            <div class="itemBox">
                <div class="boxTitle">个人信息</div>
                <div class="boxItem">
                    <div class="item">
                        <img class="itemIcon" src="../assets/mine/icon_Credits.png"/>
                        <div class="itemName">当前积分</div>
                    </div>
                    <div class="item">
                        <img class="itemIcon" src="../assets/mine/icon_Vip.png"/>
                        <div class="itemName">我的VIP</div>
                    </div>
                </div>
            </div>
            <div class="itemBox">
                <div class="boxTitle">报表管理</div>
                <div class="boxItem">
                    <div class="item">
                        <img class="itemIcon" src="../assets/mine/icon_UserDetail.png"/>
                        <div class="itemName">账户明细</div>
                    </div>
                    <div class="item">
                        <img class="itemIcon" src="../assets/mine/icon_PersonalList.png"/>
                        <div class="itemName">个人报表</div>
                    </div>
                    <div class="item">
                        <img class="itemIcon" src="../assets/mine/icon_BetRecord.png"/>
                        <div class="itemName">投注记录</div>
                    </div>
                    <div class="item">
                        <img class="itemIcon" src="../assets/mine/icon_LoadRecord.png"/>
                        <div class="itemName">充值记录</div>
                    </div>
                    <div class="item">
                        <img class="itemIcon" src="../assets/mine/icon_WithdrawRecord.png"/>
                        <div class="itemName">提现记录</div>
                    </div>
                </div>
            </div>
            <div class="itemBox">
                <div class="boxTitle">其他服务</div>
                <div class="boxItem">
                    <div class="item">
                        <img class="itemIcon" src="../assets/mine/icon_SafelyCenter.png"/>
                        <div class="itemName">安全中心</div>
                    </div>
                    <div class="item">
                        <img class="itemIcon" src="../assets/mine/icon_HelpCenter.png"/>
                        <div class="itemName">帮助中心</div>
                    </div>
                    <div class="item">
                        <img class="itemIcon" src="../assets/mine/icon_MessageCenter.png"/>
                        <div class="itemName">消息中心</div>
                    </div>
                    <div class="item">
                        <img class="itemIcon" src="../assets/mine/icon_ServiceCenter.png"/>
                        <div class="itemName">客服中心</div>
                    </div>
                </div>
            </div>
            <div class="exitLogin">退出登录</div>
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

            }
        },

        methods:{
            open(path){all.router.push(path)},
            back(){all.router.go(-1)}
        },

    }
</script>

<style scoped>
    .mine{
        display:flex;
        flex-direction:column;
        justify-content:space-between;
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
    .iconService{
        width:0.45rem;
        height:auto;
        position:absolute;
        right:0;
    }
    .circleA{
        width:2.58rem;
        height:auto;
        position:absolute;
        top:0.2rem;
        left:0.5rem;
        z-index:1;
    }
    .circleB{
        width:1.65rem;
        height:auto;
        position:absolute;
        top:1.8rem;
        left:4.8rem;
        z-index:1;
    }
    .circleC{
        width:1.1rem;
        height:auto;
        position:absolute;
        top:0.7rem;
        left:2.7rem;
        z-index:1;
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
