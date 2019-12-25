<template>
    <div class="activityDetail">
        <div class="pageTitle">
            <img class="iconBack" src="../assets/activity/btn_Back.png" @click="back"/>
            <div class="textTitle" v-text="reChargeItem.name"></div>
        </div>
        <div class="contentView">
            <div class="stepBox" v-if="reChargeItem.reChargeType">
                <div class="stepTitle">请选择转账方式：</div>
                <div class="reChargeType">
                    <div class="typeItem" :class="{choose:index===typeIndex}" @click="chooseType(index)" v-for="(item,index) in reChargeItem.reChargeType">
                        <img class="typeIcon" :src="item.icon"/>
                        <div class="typeName" v-text="item.type"></div>
                        <img class="typeChoose" v-if="index===typeIndex" src="../assets/reCharge/icon_Choose.png"/>
                    </div>
                </div>
            </div>
            <div class="stepBox"jj>
                <div class="stepTitle">请选择银行类型</div>
                <div class="reChargeType">
                    <div class="listItem" :class="{choose:index===listIndex}" @click="chooseList(index)" v-for="(item,index) in reChargeItem.reChargeType?reChargeItem.reChargeList[typeIndex]:reChargeItem.reChargeList">
                        <img class="listIcon" :class="{center:reChargeItem.name==='官方充值' && typeIndex===0}" :src="item.icon"/>
                        <div class="listName" v-text="item.type" v-if="!(reChargeItem.name==='官方充值' && typeIndex===0)"></div>
                        <img class="typeChoose" v-if="index===listIndex" src="../assets/reCharge/icon_Choose.png"/>
                    </div>
                </div>
            </div>
            <div class="stepBox">
                <div class="stepTitle">请输入转账金额：</div>
                <div class="enterBar">
                    <div class="amountItem">
                        <input class="amountInput" type="text" v-model="amount" placeholder="最低可充值100元，最高可充值10000元">
                        <div class="amountText">元</div>
                    </div>
                    <div class="fastItem">
                        <div class="amountFast" v-for="item in fastAmount" @click="fastEnter(item)" v-text="item"></div>
                    </div>
                    <div class="commit" @click="toDoCommit">确认提交</div>
                </div>
            </div>
        </div>
        <div class="listBox" v-if="reChargeItem.reChargeType && isShowOrder && ((isHasBankOrder && typeIndex===0) || (isHasAliPayOrder && typeIndex===1))">
            <div class="listWin">
                <div class="winTitle">
                    <span>订单</span>
                    <img class="iconClose" @click="hideListBox" src="../assets/mine/icon_Close.png"/>
                </div>
                <div class="textLine">
                    <span class="lineTitle">账号：</span>
                    <span>256894130745985621</span>
                    <div class="copy">复制</div>
                </div>
                <div class="textLine" v-if="typeIndex===1">
                    <span class="lineTitle">姓名：</span>
                    <span>李四</span>
                    <div class="copy">复制</div>
                </div>
                <div class="textLine" v-if="typeIndex===0">
                    <span class="lineTitle">持卡人：</span>
                    <span>天津信海销售有限责任公司</span>
                    <div class="copy">复制</div>
                </div>
                <div class="textLine" v-if="typeIndex===0">
                    <span class="lineTitle">开户行：</span>
                    <span>车公庄支行</span>
                    <div class="copy">复制</div>
                </div>
                <div class="textLine">
                    <span class="lineTitle">转账额度：</span>
                    <span class="realAmount">5000.01</span>
                    <div class="copy">复制</div>
                </div>
                <div class="tipText">注意：请使用系统生成转账额度（5000.01）进行转账！</div>
                <div class="validTime">有效时间：10分30秒</div>
                <div class="btnBar">
                    <div class="cancel" @click="cancelOrder">撤销订单</div>
                    <div class="alreadyPay" @click="cancelOrder">我已转账</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                reChargeItem:all.tool.getStore("reChargeItem"),
                fastAmount:[100,500,1000,2000,5000,10000,20000,50000],
                typeIndex:0,
                listIndex:0,
                amount:null,
                isShowOrder:all.tool.getStore("bankOrder"),
                isHasBankOrder:all.tool.getStore("bankOrder"),
                isHasAliPayOrder:all.tool.getStore("aliPayOrder"),
            }
        },
        methods:{
            open(path){all.router.push(path)},
            back(){all.router.go(-1)},
            chooseType(index){
                this.typeIndex=index;
                this.listIndex=0;
                if(all.tool.getStore("bankOrder")){
                    this.isHasBankOrder=true;
                    this.isShowOrder=true
                }
                if(all.tool.getStore("aliPayOrder")){
                    this.isHasAliPayOrder=true;
                    this.isShowOrder=true
                }
            },
            chooseList(index){this.listIndex=index},
            fastEnter(amount){this.amount=amount},
            hideListBox(){this.isShowOrder=false},
            cancelOrder(){
                if(this.typeIndex===0){
                    this.isHasBankOrder=false;
                    all.tool.setStore("bankOrder",false);
                }
                if(this.typeIndex===1){
                    this.isHasAliPayOrder=false;
                    all.tool.setStore("aliPayOrder",false);
                }
                this.isShowOrder=false
            },
            toDoCommit(){
                if(!this.reChargeItem.reChargeType)this.open("/reChargePay");
                else {
                    if(this.typeIndex===0){
                        this.isHasBankOrder=true;
                        all.tool.setStore("bankOrder",true);
                    }
                    if(this.typeIndex===1){
                        this.isHasAliPayOrder=true;
                        all.tool.setStore("aliPayOrder",true);
                    }
                    this.isShowOrder=true
                }
            }
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
        flex:1;
        display:flex;
        flex-direction:column;
        overflow:scroll;
        padding:0.3rem;
    }
    .stepBox{
        margin-bottom:0.2rem;
    }
    .stepTitle{
        font-size:0.28rem;
        color:#333333;
        font-weight:400;
        line-height:0.4rem;
        margin-bottom:0.2rem;
    }
    .reChargeType{
        display:flex;
        flex-wrap:wrap;
    }
    .typeItem{
        width:2.2rem;
        height:0.6rem;
        display:flex;
        align-items:center;
        border-radius:0.08rem;
        background:#e0e0e0;
        border:0.02rem solid #cccccc;
        font-size:0.24rem;
        color:#333333;
        font-weight:400;
        margin-left:0.15rem;
        margin-bottom:0.15rem;
        position:relative;
    }
    .choose{
        background:#ffffff !important;
        border:0.02rem solid #1d7ef0 !important;
    }
    .typeItem:first-child,.typeItem:nth-child(4),.typeItem:nth-child(7){
        margin-left:0;
    }
    .typeIcon{
        width:0.44rem;
        height:auto;
        margin:0 0.15rem;
    }
    .typeChoose{
        width:0.2rem;
        height:0.2rem;
        position:absolute;
        right:-0.05rem;
        bottom:-0.05rem;
    }
    .listItem{
        width:2.2rem;
        height:0.6rem;
        display:flex;
        align-items:center;
        justify-content:center;
        border-radius:0.08rem;
        background:#e0e0e0;
        border:0.02rem solid #cccccc;
        font-size:0.24rem;
        color:#333333;
        font-weight:400;
        margin-left:0.15rem;
        margin-bottom:0.15rem;
        position:relative;
    }
    .listItem:first-child,.listItem:nth-child(4),.listItem:nth-child(7),.listItem:nth-child(10){
        margin-left:0;
    }
    .listIcon{
        height:0.34rem;
        width:auto;
        position:absolute;
        left:0.1rem;
    }
    .center{
        position:relative;
        left:0;
    }
    .listName{
        margin-left:0.1rem;
        font-size:0.2rem;
    }
    .enterBar{
        width:6.9rem;
        height:5rem;
        border-radius:0.1rem;
        background:#ffffff;
        display:flex;
        flex-shrink:0;
        flex-direction:column;
        align-items:center;
        padding-top:0.5rem;
    }
    .amountItem{
        width:5.7rem;
        height:0.6rem;
        border-radius:0.08rem;
        background:#eaeaea;
        display:flex;
        flex-shrink:0;
        align-items:center;
        justify-content:space-between;
        padding:0 0.2rem;
        font-size:0.3rem;
        color:#333333;
        margin-bottom:0.6rem;
    }
    .amountInput{
        height:100%;
        flex:1;
        margin-right:0.2rem;
        border:none;
        background:#eaeaea;
        font-size:0.3rem;
    }
    .amountInput::placeholder{
        color:#6b6b6b;
        font-size:0.22rem;
        font-weight:400;
    }
    .fastItem{
        display:flex;
        width:5.7rem;
        flex-wrap:wrap;
        justify-content:space-between;
    }
    .amountFast{
        width:1.2rem;
        height:0.5rem;
        border-radius:0.08rem;
        background:#71b2ff;
        font-size:0.28rem;
        color:#ffffff;
        display:flex;
        justify-content:center;
        align-items:center;
        font-weight:400;
        margin-bottom:0.3rem;
    }
    .commit{
        width:5.7rem;
        height:0.68rem;
        border-radius:0.08rem;
        background:linear-gradient(to bottom,#94ccff,#086bf7);
        display:flex;
        justify-content:center;
        align-items:center;
        font-size:0.28rem;
        color:#ffffff;
        font-weight:300;
        box-shadow:0 0.01rem 0.03rem rgba(0,27,97,0.5);
        margin-top:0.4rem;
    }
    .listBox{
        width:100%;
        height:100%;
        background:rgba(0,0,0,0.5);
        position:absolute;
        z-index:3;
        font-size:0.24rem;
        color:#7f7f7f;
        display:flex;
        justify-content:center;
        align-items:center;
        overflow:scroll;
    }
    @media screen and (orientation: landscape){.listBox{align-items:flex-start}}
    .listWin{
        width:6.9rem;
        height:6.3rem;
        border-radius:0.08rem;
        background:#ffffff;
        overflow:hidden;
        margin:1rem 0;
        font-size:0.24rem;
        color:#666666;
        position:relative;
    }
    .winTitle{
        height:1rem;
        background:linear-gradient(to bottom,#52a2ff,#1d7ef0);
        font-size:0.3rem;
        color:#ffffff;
        display:flex;
        justify-content:center;
        align-items:center;
        position:relative;
        font-weight:400;
        margin-bottom:0.15rem;
    }
    .iconClose{
        position:absolute;
        right:0.3rem;
        width:0.25rem;
        height:0.25rem;
    }
    .textLine{
        margin:0 0.3rem;
        border-bottom:0.02rem solid #eeeeee;
        height:0.65rem;
        display:flex;
        align-items:center;
        position:relative;
    }
    .lineTitle{
        width:1.2rem;
        text-align:justify;
        overflow:hidden;
        height:0.65rem;
        line-height:0.65rem;
    }
    .lineTitle:after{
        content:"";
        padding-left:100%;
        display:inline-block;
    }
    .copy{
        font-size:0.2rem;
        color:#1d7ef0;
        text-decoration:underline;
        position:absolute;
        right:0
    }
    .realAmount{
        font-size:0.28rem;
        color:#1f80f1;
        font-weight:400;
    }
    .tipText{
        font-size:0.18rem;
        color:#d30101;
        padding-left:1.5rem;
        line-height:0.3rem;
        margin:0.2rem 0;
    }
    .validTime{
        font-size:0.3rem;
        text-align:center;
        font-weight:400;
    }
    .btnBar{
        width:6.9rem;
        padding:0 0.8rem;
        display:flex;
        justify-content:space-between;
        position:absolute;
        bottom:0.4rem;
    }
    .cancel{
        font-size:0.36rem;
        color:#999999;
        font-weight:400;
        width:2rem;
        height:0.72rem;
        border-radius:0.36rem;
        display:flex;
        align-items:center;
        justify-content:center;
        box-shadow:0 0.01rem 0.03rem rgba(0,27,97,0.5);
        background:#e6e6e6;
    }
    .alreadyPay{
        font-size:0.36rem;
        color:#ffffff;
        font-weight:400;
        width:2rem;
        height:0.72rem;
        border-radius:0.36rem;
        display:flex;
        align-items:center;
        justify-content:center;
        box-shadow:0 0.01rem 0.03rem rgba(0,27,97,0.5);
        background:#1f80f1;
    }
</style>
