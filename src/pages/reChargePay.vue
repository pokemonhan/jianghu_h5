<template>
    <div class="activityDetail">
        <div class="pageTitle">
            <img class="iconBack" src="../assets/activity/btn_Back.png" @click="back"/>
            <div class="textTitle">在线支付</div>
        </div>
        <div class="contentView">
            <div class="orderNumber">订单号：684521394520189346</div>
            <div class="amount">￥5000.00</div>
            <img class="rqCode" src="../assets/reCharge/icon_RqCode.png"/>
            <div class="tipText">请截图保存该二维码打开支付宝客户端扫码付款或是十分钟没有到账请将该截图发经客服补单，不要重复支付，造成损失概不负责。</div>
        </div>
    </div>
</template>

<script>
    export default {
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
    .activityDetail{
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
        align-items:center;
        overflow:scroll;
        padding-top:1rem;
    }
    .orderNumber{
        font-size:0.24rem;
        color:#666666;
    }
    .amount{
        font-size:0.36rem;
        font-weight:400;
        color:#333333;
        margin-top:0.3rem;
        margin-bottom:0.6rem;
    }
    .rqCode{
        width:2.8rem;
        height:2.8rem;
        margin-bottom:0.4rem;
    }
    .tipText{
        font-size:0.24rem;
        color:#999999;
        width:4.2rem;
        line-height:0.35rem;
        font-weight:400
    }
</style>
