<template>
    <div class="reCharge">
        <div class="pageTitle">
            <div class="textTitle animated flipInX">充值</div>
            <img class="circleC" src="../assets/mine/img_CircleC.png"/>
            <img class="circleA" src="../assets/mine/img_CircleA.png"/>
            <img class="circleB" src="../assets/mine/img_CircleB.png"/>
        </div>
        <div class="contentView">
            <div class="personalInfo animated flipInY">
                <div class="detail">
                    <img class="imgUser" :src="this.$store.state.userPicture"/>
                    <div class="nameId">
                        <div class="nameBar" v-text="this.$store.state.nickName">两只小蜜蜂</div>
                        <div class="id" v-text="'ID：'+this.$store.state.uid">ID：189673</div>
                    </div>
                </div>
                <div class="currentAmount">
                    <span>当前余额：</span>
                    <span class="amount animated flash delay-1s" v-text="this.$store.state.amount">5000</span>
                </div>
                <div class="withdrawal">取款</div>
            </div>
            <div class="chooseTitle animated fadeInUp">请选择支付方式：</div>
            <div class="recommend animated fadeInDown">推荐使用官方充值，安全快捷精确到秒到帐！</div>
            <div class="reChargeItem animated faster" :class="{fadeInLeft:index%2===0,lightSpeedIn:index%2===1}" v-for="(item,index) in reChargeType" @click="open('/reChargeOrder',item)">
                <div class="itemImg">
                    <img class="iconImg" :src="item.icon"/>
                </div>
                <div class="itemName" v-text="item.name"></div>
                <img class="iconFire" v-if="item.isFire" src="../assets/reCharge/icon_Fire.png"/>
            </div>
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
                reChargeType:[
                    {name:"官方充值",isFire:true,icon:require('../assets/reCharge/icon_Officially.png'),reChargeType:[
                            {type:"银行卡转账",icon:require('../assets/reCharge/icon_UnionPay.png')},
                            {type:"支付宝转账",icon:require('../assets/reCharge/icon_AliPay.png')}
                        ],reChargeList:[
                            [
                                {type:"工商银行",icon:require('../assets/reCharge/icon_Icbc.png')},
                                {type:"农业银行",icon:require('../assets/reCharge/icon_Tabc.png')},
                                {type:"建设银行",icon:require('../assets/reCharge/icon_Ccb.png')},
                            ],
                            [
                                {type:"支付宝1",icon:require('../assets/reCharge/icon_AliPay.png')},
                                {type:"支付宝2",icon:require('../assets/reCharge/icon_AliPay.png')},
                                {type:"支付宝3",icon:require('../assets/reCharge/icon_AliPay.png')},
                            ],
                        ]},
                    {name:"银联扫码",isFire:false,icon:require('../assets/reCharge/icon_UnionPay.png'),reChargeType:null,reChargeList:[
                            {type:"渠道1",icon:require('../assets/reCharge/icon_UnionPay.png')},
                            {type:"渠道2",icon:require('../assets/reCharge/icon_UnionPay.png')},
                            {type:"渠道3",icon:require('../assets/reCharge/icon_UnionPay.png')},
                        ]},
                    {name:"微信支付",isFire:false,icon:require('../assets/reCharge/icon_WeChat.png'),reChargeType:null,reChargeList:[
                            {type:"微信1",icon:require('../assets/reCharge/icon_WeChat.png')},
                            {type:"微信2",icon:require('../assets/reCharge/icon_WeChat.png')},
                            {type:"微信3",icon:require('../assets/reCharge/icon_WeChat.png')},
                        ]},
                    {name:"微信扫码",isFire:false,icon:require('../assets/reCharge/icon_WeChat.png'),reChargeType:null,reChargeList:[
                            {type:"微信1",icon:require('../assets/reCharge/icon_WeChat.png')},
                            {type:"微信2",icon:require('../assets/reCharge/icon_WeChat.png')},
                            {type:"微信3",icon:require('../assets/reCharge/icon_WeChat.png')},
                        ]},
                    {name:"支付宝支付",isFire:false,icon:require('../assets/reCharge/icon_AliPay.png'),reChargeType:null,reChargeList:[
                            {type:"支付宝1",icon:require('../assets/reCharge/icon_AliPay.png')},
                            {type:"支付宝2",icon:require('../assets/reCharge/icon_AliPay.png')},
                            {type:"支付宝3",icon:require('../assets/reCharge/icon_AliPay.png')},
                        ]},
                    {name:"支付宝扫码",isFire:true,icon:require('../assets/reCharge/icon_AliPay.png'),reChargeType:null,reChargeList:[
                            {type:"支付宝1",icon:require('../assets/reCharge/icon_AliPay.png')},
                            {type:"支付宝2",icon:require('../assets/reCharge/icon_AliPay.png')},
                            {type:"支付宝3",icon:require('../assets/reCharge/icon_AliPay.png')},
                        ]},
                ]
            }
        },

        methods:{
            open(path,item){
                if(name!==null)all.tool.setStore("reChargeItem",item);
                all.router.push(path);
            },
            back(){all.router.go(-1)},

        },

    }
</script>

<style scoped>
    .reCharge{
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
        margin:0 0.3rem 0.2rem;
        flex-shrink:0;
        position:relative;
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
    .currentAmount{
        font-size:0.3rem;
        color:#ffffff;
        margin-left:1.3rem;
        margin-top:0.2rem;
    }
    .amount{
        font-size:0.34rem;
        color:#feff03;
        font-weight:400;
    }
    .withdrawal{
        font-size:0.24rem;
        color:#ffffff;
        width:1rem;
        height:0.4rem;
        border-radius:0.08rem;
        border:0.02rem solid #f5f1eb;
        position:absolute;
        right:0.5rem;
        top:0.58rem;
        display:flex;
        justify-content:center;
        align-items:center;
    }
    .chooseTitle{
        font-size:0.3rem;
        color:#333333;
        font-weight:400;
        margin:0 0.3rem 0.2rem;
    }
    .recommend{
        font-size:0.26rem;
        color:#666666;
        font-weight:400;
        margin:0 0.3rem 0.2rem;
        text-indent:2em;
    }
    .reChargeItem{
        width:6.9rem;
        height:0.88rem;
        border-radius:0.08rem;
        background:url("../assets/mine/icon_Next.png") no-repeat 6.5rem center #ffffff;
        background-size:0.18rem 0.33rem;
        margin:0 0.3rem 0.3rem;
        display:flex;
        align-items:center;
        font-size:0.24rem;
        color:#333333;
        font-weight:400;
        padding-left:0.05rem;
        flex-shrink:0;
    }
    .itemImg{
        width:0.88rem;
        height:0.88rem;
        display:flex;
        justify-content:center;
        align-items:center;
    }
    .iconImg{
        width:0.56rem;
        height:auto
    }
    .itemName{
        margin:0 0.12rem;
    }
    .iconFire{
        width:0.24rem;
        height:0.33rem;
        margin-top:-0.25rem;
        margin-left:0.08rem;
    }
</style>
