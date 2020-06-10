<template>
    <div class="reChargeRecord">
        <div class="pageTitle">
            <div class="iconBack" @click="back"></div>
            <div class="textTitle">充值记录</div>
        </div>
        <div class="contentView">
            <div class="dateBar">
                <div class="barTitle">快捷查询：</div>
                <div class="dateBtn" :class="{choose:index===active}" v-for="(item,index) in btnArray" v-text="item" @click="chooseTime(index)"></div>
            </div>
            <div class="recordBar animated faster" :class="{fadeInLeft:index%2===0,lightSpeedIn:index%2===1}" v-for="(item,index) in recordList">
                <div class="leftSide">
                    <div class="itemImg">
                        <img class="iconImg" :src="iconList[item.finance_type_name]"/>
                    </div>
                    <div class="amountBar">
                        <div class="amount" v-text="'金额：'+item.money"></div>
                        <div class="rechargeType" v-text="item.finance_type_name"></div>
                    </div>
                </div>
                <div class="rightSide">
                    <div class="timeBar">
                        <div class="status" :class="{red:item.status===-1 || item.status===-2 || item.status===-3,green:item.status===1,yellow:item.status===0}" v-text="item.status===0?'审核中':item.status===1?'审核通过':item.status===-3?'订单撤销':item.status===-2?'订单过期':item.status===-1?'审核拒绝':'审核失败'"></div>
                        <div class="time" v-text="item.created_at"></div>
                    </div>
                    <div class="detailBtn">详情</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                time:"",
                btnArray:["全部","昨日","今日","上周","上月"],
                active:0,
                recordList:[],
                iconList:{
                    "支付宝转账":require('../assets/reCharge/icon_AliPay.png'),
                    "支付宝支付":require('../assets/reCharge/icon_AliPay.png'),
                    "微信转账":require('../assets/reCharge/icon_WeChat.png'),
                    "微信支付":require('../assets/reCharge/icon_WeChat.png'),
                    "银联支付":require('../assets/reCharge/icon_UnionPay.png'),
                    "在线网银支付":require('../assets/reCharge/icon_OnlinePay.png'),
                    "京东钱包":require('../assets/reCharge/icon_JdPay.jpg'),
                    "百度钱包":require('../assets/reCharge/icon_BaiduPay.png'),
                    "云闪付转账":require('../assets/reCharge/icon_CloudPay.png'),
                    "银行卡转账":require('../assets/reCharge/icon_BankPay.png'),
                },
                statusList:{
                    0:"审核中",
                    1:"审核通过"
                }
            }
        },
        methods:{
            open(path){all.router.push(path)},
            back(){all.router.go(-1)},
            chooseTime(index){
                let data={type:2};
                this.active=index;
                if(index===1)this.time="["+all.tool.getBeforeDate(new Date(),1)+","+all.tool.getBeforeDate(new Date(),0)+"]";
                if(index===2)this.time="["+all.tool.getBeforeDate(new Date(),0)+","+all.tool.getBeforeDate(new Date(),-1)+"]";
                if(index===3)this.time="["+all.tool.getBeforeDate(new Date(),new Date().getDay()+6)+","+all.tool.getBeforeDate(new Date(),new Date().getDay())+"]";
                if(index===4)this.time="["+all.tool.getBeforeDate(new Date(),new Date().getDate()+30)+","+all.tool.getBeforeDate(new Date(),new Date().getDate())+"]";
                this.time=this.time.slice(0,1)+'"'+this.time.slice(1,20)+'"'+this.time.slice(20,21)+'"'+this.time.slice(21,40)+'"'+this.time.slice(40);
                data={type:2,created_at:this.time};
                if(index===0)data={type:2};
                all.tool.send("record",data,res=>{
                    this.recordList=res.data.data;
                    if(res.data.total===0)all.tool.editTipShow("暂无充值记录")
                })
            }
        },
        created() {
            all.tool.send("record",{type:2},res=>{
                this.recordList=res.data.data;
                if(res.data.total===0)all.tool.editTipShow("暂无充值记录")
            })
        }

    }
</script>

<style scoped>
    .reChargeRecord{
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
        margin:0 0.3rem;
        flex:1;
        display:flex;
        flex-direction:column;
        align-items:center;
        overflow:scroll;
        padding-top:0.45rem;
    }
    .dateBar{
        width:6.9rem;
        height:0.44rem;
        flex-shrink:0;
        margin-bottom:0.3rem;
        display:flex;
        justify-content:flex-start;
    }
    .barTitle{
        font-size:0.3rem;
        color:#333333;
    }
    .dateBtn{
        background:#ffffff;
        display:flex;
        justify-content:center;
        align-items:center;
        font-size:0.24rem;
        color:#666666;
        width:0.9rem;
        height:0.44rem;
        border-radius:0.08rem;
        border:0.02rem solid #0a7df9;
        margin:0 0.05rem;
    }
    .choose{
        background:#0a7df9;
        color:#ffffff;
    }
    .recordBar{
        display:flex;
        font-size:0.24rem;
        color:#333333;
        align-items:center;
        justify-content:space-between;
        width:6.9rem;
        height:1.1rem;
        margin-bottom:0.3rem;
        background:#ffffff;
        border-radius:0.08rem;
        padding-left:0.2rem;
        flex-shrink:0;
    }
    .leftSide,.rightSide{
        display:flex;
        align-items:center;
    }
    .itemImg{
        width:1.1rem;
        height:1.1rem;
        display:flex;
        justify-content:center;
        align-items:center;
    }
    .iconImg{
        width:auto;
        height:0.76rem;
    }
    .amountBar{
        margin-left:0.1rem;
        height:0.76rem;
        display:flex;
        flex-direction:column;
        justify-content: space-between;
        padding:0.05rem 0;
    }
    .timeBar{
        margin-right:0.2rem;
        display:flex;
        flex-direction:column;
        align-items:flex-end;
        height:0.76rem;
        justify-content: space-between;
        padding:0.05rem 0;
    }
    .detailBtn{
        width:0.8rem;
        height:1.1rem;
        border-left:0.02rem solid #eeeeee;
        font-size:0.22rem;
        color:#1d7ef0;
        text-decoration:underline;
        display:flex;
        justify-content:center;
        align-items:center;
    }
    .status{
        width:1.3rem;
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
</style>
