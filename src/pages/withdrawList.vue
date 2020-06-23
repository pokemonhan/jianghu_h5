<template>
    <div class="withdrawList">
        <div class="pageTitle">
            <div class="iconBack" @click="back"></div>
            <div class="textTitle">取款管理</div>
        </div>
        <div class="contentView">
            <!--<div class="noBind" v-if="cardList.length===0">
                <img class="bindIcon" src="../assets/reCharge/icon_NoBind.png"/>
                <div class="bindText">您还没绑定银行卡或支付宝账号！</div>
                <div class="bindBtn" @click="showAddBankCard">去绑定银行卡</div>
                <div class="bindBtn" @click="showAddAliPay">去绑定支付宝</div>
            </div>-->
            <div class="bankCardList">
                <div class="listTitle">
                    <div class="titleText">银行卡列表：</div>
                    <div class="addBtn" @click="showAddBankCard">添加银行卡</div>
                </div>
                <div class="cardItem" v-for="item in bankAccountList" @click="withdraw(item)">
                    <img class="accountBg" :src="require('../assets/reCharge/bg_'+item.code+'.png')"/>
                    <div class="itemText">
                        <div class="bankName" v-text="item.bank"></div>
                        <div>
                            <span class="bankAccount">储蓄卡</span>
                            <span v-text="item.card_number_hidden"></span>
                        </div>
                    </div>
                    <div class="deleteBtn" v-on:click.stop="enterSafePassword(item)">删除</div>
                </div>
            </div>
            <div class="aliPayList">
                <div class="listTitle">
                    <div class="titleText">支付宝列表：</div>
                    <div class="addBtn" @click="showAddAliPay">添加支付宝</div>
                </div>
                <div class="cardItem" v-for="item in aliAccountList" @click="withdraw(item)">
                    <img class="accountBg" :src="require('../assets/reCharge/bg_'+item.code+'.png')"/>
                    <div class="itemText">
                        <div class="bankName" v-text="item.owner_name"></div>
                        <div>
                            <span class="bankAccount">储蓄卡</span>
                            <span v-text="item.card_number_hidden"></span>
                        </div>
                    </div>
                    <div class="deleteBtn" v-on:click.stop="enterSafePassword(item)">删除</div>
                </div>
            </div>
        </div>
        <addAliPay v-if="this.$store.state.isShowAddAliPay"/>
        <addBankCard v-if="this.$store.state.isShowAddBankCard"/>
        <setSafePassword v-if="this.$store.state.isShowSetSafePassword"/>
        <checkSafePassword v-if="this.$store.state.isShowCheckSafePassword"/>
        <withdrawOrder v-if="this.$store.state.isShowWithdrawOrder"/>
    </div>
</template>

<script>
    import addAliPay from '../pages/components/addAliPay'
    import addBankCard from '../pages/components/addBankCard'
    import setSafePassword from '../pages/components/setSafePassword'
    import checkSafePassword from '../pages/components/checkSafePassword'
    import withdrawOrder from '../pages/components/withdrawOrder'

    export default {
        components:{
            addAliPay,
            addBankCard,
            setSafePassword,
            checkSafePassword,
            withdrawOrder
        },
        data () {
            return {
                cardList:[],
                aliAccountList:[],
                bankAccountList:[]
            }
        },
        methods:{
            open(path,title){all.router.push(path)},
            back(){all.router.go(-1)},
            showAddBankCard(){
                all.tool.setStore("afterSetPassword","addBankCard");
                all.tool.send("dynamicInformation",null,res=>{
                    if(res.data.fund_password===0){
                        all.tool.tipWinShow("您还未设置安全码，请先前往设置！",()=>{
                            all.store.commit("isShowSetSafePassword",true);
                        },{icon:"right",name:"设置安全码"});
                    }
                    if(res.data.fund_password===1){
                        all.store.commit("isShowAddBankCard",true);
                    }
                });
            },
            showAddAliPay(){
                all.tool.setStore("afterSetPassword","addAliPay");
                all.tool.send("dynamicInformation",null,res=>{
                    if(res.data.fund_password===0){
                        all.tool.tipWinShow("您还未设置安全码，请先前往设置！",()=>{
                            all.store.commit("isShowSetSafePassword",true);
                        },{icon:"right",name:"设置安全码"});
                    }
                    if(res.data.fund_password===1){
                        all.store.commit("isShowAddAliPay",true);
                    }
                });
            },
            withdraw(item){
                all.tool.setStore("withdrawItem",item);
                all.store.commit("isShowWithdrawOrder",true);
            },
            enterSafePassword(item){
                all.tool.setStore("deleteCard",item);
                all.store.commit("isShowCheckSafePassword",true);
            }
        },
        created() {
            all.tool.send("cardList",null,res=>{
                this.cardList=res.data;
                res.data.forEach(item=>{
                    if(item.type===2){this.aliAccountList.push(item)}
                    if(item.type===1){this.bankAccountList.push(item)}
                });
            });
        }
    }
</script>

<style scoped>
    .withdrawList{
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
        padding-top:0.4rem;
        flex:1;
        display:flex;
        flex-direction:column;
        align-items:center;
        overflow:scroll;
    }
    .noBind{
        margin-top:0.5rem;
    }
    .bindIcon{
        width:2.78rem;
        height:auto;
        display:block;
        margin:0 auto;
    }
    .bindText{
        font-size:0.3rem;
        color:#96bbf3;
        margin-top:0.2rem;
        margin-bottom:1.4rem;
        text-align:center;
    }
    .bindBtn{
        width:5.76rem;
        height:0.74rem;
        display:flex;
        justify-content:center;
        align-items:center;
        font-size:0.28rem;
        color:#ffffff;
        background:url("../assets/reCharge/btn_Bind.png") no-repeat center center;
        background-size:100% 100%;
        margin-bottom:0.4rem;
    }
    .bankCardList{
        width:6.9rem;
        background:#ffffff;
        border-radius:0.08rem;
    }
    .aliPayList{
        width:6.9rem;
        background:#ffffff;
        border-radius:0.08rem;
        margin-top:0.4rem;
    }
    .listTitle{
        height:0.7rem;
        display:flex;
        justify-content:space-between;
        align-items:center;
        padding:0 0.2rem;
    }
    .titleText{
        font-size:0.28rem;
        color:#333333;
        background:url("../assets/reCharge/icon_UnionPay.png") no-repeat left center;
        background-size:0.4rem 0.25rem;
        padding-left:0.6rem;
        font-weight:500;
    }
    .aliPayList .titleText{
        background:url("../assets/reCharge/icon_AliPay.png") no-repeat left center;
        background-size:0.28rem 0.28rem;
    }
    .addBtn{
        font-size:0.22rem;
        color:#1d7ef0;
        text-decoration:underline;
    }
    .cardItem{
        display:flex;
        justify-content:center;
        align-items:center;
        margin:0 0.2rem 0.2rem;
        position:relative;
    }
    .accountBg{
        width:6.5rem;
        height:1.5rem;
    }
    .itemText{
        position:absolute;
        left:1.5rem;
        font-size:0.3rem;
        color:#ffffff;
        line-height:0.4rem;
    }
    .bankAccount{
        font-size:0.24rem;
        margin-top:0.1rem;
        line-height:0.4rem;
    }
    .deleteBtn{
        font-size:0.24rem;
        color:#ffffff;
        width:1rem;
        height:0.4rem;
        border-radius:0.08rem;
        border:0.01rem solid #f5f1eb;
        display:flex;
        justify-content:center;
        align-items:center;
        position:absolute;
        right:0.2rem;
        top:0.35rem;
    }

</style>
