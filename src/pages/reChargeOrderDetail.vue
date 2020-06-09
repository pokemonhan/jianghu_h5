<template>
    <div class="orderDetail">
        <div class="pageTitle">
            <div class="iconBack" @click="back"></div>
            <div class="textTitle">订单</div>
        </div>
        <div class="contentView">
            <div class="accountBar">
                <span class="barTitle">账户：</span>
                <span class="account" v-text="orderDetail.account"></span>
                <span class="copy" v-clipboard:copy="orderDetail.account" v-clipboard:success="onCopy" v-clipboard:error="onCopyError">复制</span>
            </div>
            <div class="userBar">
                <span class="barTitle">持卡人：</span>
                <span class="user" v-text="orderDetail.username"></span>
                <span class="copy" v-clipboard:copy="orderDetail.username" v-clipboard:success="onCopy" v-clipboard:error="onCopyError">复制</span>
            </div>
            <div class="branchBar" v-if="orderDetail.branch">
                <span class="barTitle">开户行：</span>
                <span class="branch" v-text="orderDetail.branch"></span>
                <span class="copy" v-clipboard:copy="orderDetail.branch" v-clipboard:success="onCopy" v-clipboard:error="onCopyError">复制</span>
            </div>
            <div class="orderNoBar">
                <span class="barTitle">订单号：</span>
                <span class="orderNo" v-text="orderDetail.order_no"></span>
                <span class="copy" v-clipboard:copy="orderDetail.order_no" v-clipboard:success="onCopy" v-clipboard:error="onCopyError">复制</span>
            </div>
            <div class="amountBar">
                <span class="barTitle">转账额度：</span>
                <span class="amount" v-text="orderDetail.real_money"></span>
            </div>
            <div class="noticeBar">
                <span class="noticeText">注意：请使用系统生成的转账金额</span>
                <span class="amount" v-text="orderDetail.real_money"></span>
                <span class="noticeText">进行转账！</span>
            </div>
            <div class="countTime" v-text="'有效时间：'+minute+'分'+seconds+'秒'"></div>
            <div class="btnBar">
                <span class="cancelBtn" @click="cancelOrder">撤销订单</span>
                <span class="alreadyPayBtn" @click="confirmOrder">我已转账</span>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        data () {
            return {
                orderDetail:null,
                minute:0,
                seconds:0,
                timeRun:null
            }
        },
        methods:{
            open(path){all.router.push(path)},
            back(){all.router.go(-1)},
            cancelOrder(){
                all.tool.send("cancel",{order_no:this.orderDetail.order_no},res=>{
                    all.tool.tipWinShow("撤销成功，订单已失效！",()=>{this.back()},{icon:"right"})
                })
            },
            confirmOrder(){
                let isOnline=all.tool.getStore("reChargeIsOnline");
                let orderData={is_online:isOnline,order_no:this.orderDetail.order_no};
                if(isOnline!==1){
                    orderData={is_online:isOnline,order_no:this.orderDetail.order_no,card_number:this.orderDetail.account,branch:this.orderDetail.branch}
                }
                all.tool.send("confirm",orderData,res=>{
                    all.tool.tipWinShow("已通知管理员，系统将优先处理您的订单！",()=>{this.back()},{icon:"right"})
                })
            },
            countTime(){
                let now=new Date().getTime();
                let expired=new Date(this.orderDetail.expired_at).getTime();
                if(now>=expired){
                    clearInterval(this.timeRun);
                    this.timeRun=null;
                    all.tool.tipWinShow("订单已失效，请重新提交订单！",()=>{this.back()},{icon:"warn"})
                }
                else {
                    let time=Math.floor(expired-now)/1000;
                    this.minute=Math.floor(time/60);
                    if(this.minute<10){this.minute="0"+this.minute}
                    this.seconds=Math.floor(time%60);
                    if(this.seconds<10){this.seconds="0"+this.seconds}
                }
            },
            onCopy(e){all.tool.editTipShow("成功复制"+e.text)},
            onCopyError(){all.tool.editTipShow("复制失败","error")},
        },
        created() {
            this.orderDetail=all.tool.getStore("orderDetail");
            console.log(new Date().getTime());
            console.log(new Date(this.orderDetail.expired_at).getTime());
            this.timeRun=setInterval(()=>{this.countTime()},1000)
        },
        destroyed() {
            clearInterval(this.timeRun);
            this.timeRun=null;
        },
    }
</script>

<style scoped>
    .orderDetail{
        display:flex;
        flex-direction:column;
        background:#ffffff;
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
    .accountBar,.userBar,.branchBar,.amountBar,.orderNoBar{
        width:6rem;
        position:relative;
        border-bottom:solid 0.01rem #333333;
        line-height:0.8rem;
        height:0.8rem;
    }
    .barTitle{
        display:inline-block;
        width:1.5rem;
        text-align:justify;
        height:0.8rem;
        line-height:0.8rem;
        overflow:hidden;
        font-weight:bold;
    }
    .barTitle::after{
        content:'';
        display:inline-block;
        padding-left:100%;
    }
    .copy{
        position:absolute;
        right:0;
        color:#1d7ef0;
    }
    .amount{
        color:#1d7ef0;
    }
    .noticeBar{
        width:6rem;
        line-height:0.8rem;
        height:0.8rem;
        color:red;
        font-size:0.24rem;
    }
    .countTime{
        margin:0.3rem 0;
        font-size:0.36rem;
        font-weight:bold;
    }
    .btnBar{
        width:5.5rem;
        margin-top:0.8rem;
        display:flex;
        justify-content:space-between;
    }
    .cancelBtn{
        width:2rem;
        height:0.72rem;
        border-radius:0.36rem;
        background:#e6e6e6;
        color:#999999;
        font-size:0.36rem;
        display:flex;
        justify-content:center;
        align-items:center;
    }
    .alreadyPayBtn{
        width:2rem;
        height:0.72rem;
        border-radius:0.36rem;
        background:#1f80f1;
        color:#ffffff;
        font-size:0.36rem;
        display:flex;
        justify-content:center;
        align-items:center;
    }
</style>
