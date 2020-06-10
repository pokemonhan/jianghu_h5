<template>
    <div class="withdrawDetail">
        <div class="pageTitle">
            <div class="iconBack" @click="back"></div>
            <div class="textTitle">提款详情</div>
        </div>
        <div class="contentView">
            <div class="detailBar">
                <div class="amount" v-text="detail.amount"></div>
                <div class="status" :class="{red:detail.status===2 || detail.status===6,green:detail.status===3 || detail.status===4 || detail.status===5,yellow:detail.status===0 || detail.status===1}" v-text="(detail.status===0　|| detail.status===1)?'审核中':(detail.status===3 || detail.status===4 || detail.status===5)?'提款成功':'提款失败'"></div>
                <div class="orderNoBar">
                    <span class="barTitle">订单号：</span>
                    <span class="orderNo" v-text="detail.order_no"></span>
                </div>
                <div class="timeBar">
                    <span class="barTitle">时间：</span>
                    <span class="time" v-text="detail.created_at"></span>
                </div>
                <div class="typeBar">
                    <span class="barTitle">提款方式：</span>
                    <span class="type" v-text="detail.account_type===1?'支付宝提款':'银行卡提款'"></span>
                </div>
            </div>
            <div class="onlineServer">对此提款有疑问？请联系客服！</div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                detail:null
            }
        },
        methods:{
            open(path){all.router.push(path)},
            back(){all.router.go(-1)},
        },
        created() {
            this.detail=all.tool.getStore("withdrawDetail")
        },

    }
</script>

<style scoped>
    .withdrawDetail{
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
        width:0.5rem;
        height:0.5rem;
        background:url("../assets/activity/btn_Back.png") no-repeat left center;
        background-size:0.18rem 0.34rem;
        position:absolute;
        left:0.3rem;
    }
    .textTitle{
        font-size:0.36rem;
        font-weight:400;
    }
    .contentView{
        flex:1;
        display:flex;
        flex-direction:column;
        align-items:center;
        overflow:scroll;
        padding:0.5rem;
        font-size:0.3rem;
        color:#333333;
    }
    .detailBar{
        width:6.9rem;
        height:5.2rem;
        border-radius:0.12rem;
        background:#ffffff;
        padding:0.6rem 0.2rem
    }
    .amount{
        text-align:center;
        font-size:0.36rem;
        color:#131313;
        font-weight:400;
        margin-bottom:0.2rem;
    }
    .yellow{
        color:#ffc600;
        background:url("../assets/mine/icon_Doing.png") no-repeat left center;
        background-size:0.21rem 0.21rem;
        padding-left:0.3rem;
    }
    .red{
        color:#d30101;
        background:url("../assets/mine/icon_Defeat.png") no-repeat left center;
        background-size:0.21rem 0.21rem;
        padding-left:0.3rem;
    }
    .green{
        color:#2ec590;
        background:url("../assets/mine/icon_Success.png") no-repeat left center;
        background-size:0.21rem 0.21rem;
        padding-left:0.3rem;
    }
    .status{
        width:1.6rem;
        margin:0 auto;
        text-align:center;
    }
    .orderNoBar{
        margin-top:0.5rem;
        border-bottom:solid 0.01rem #333333;
        line-height:0.8rem;
        height:0.8rem;
        display:flex;
        justify-content:space-between;
    }
    .timeBar,.typeBar{
        border-bottom:solid 0.01rem #333333;
        line-height:0.8rem;
        height:0.8rem;
        display:flex;
        justify-content:space-between;
    }
    .onlineServer{
        margin-top:0.4rem;
        color:#999999;
        font-size:0.24rem;
        text-align:center;
    }
</style>
