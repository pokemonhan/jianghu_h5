<template>
    <div class="setGamePassword">
        <div class="setBox animated fadeInDown faster">
            <img class="bgLogin" src="../../assets/login/bg_Login.png"/>
            <img class="iconClose" @click="toDoClose" src="../../assets/mine/icon_Close.png"/>
            <span class="setTitle" v-text="this.$store.state.reChargeOrder.item.name"></span>
            <div class="setBar">
                <div class="inputItem">
                    <div class="itemIcon">
                        <img class="icon" src="../../assets/reCharge/icon_Money .png"/>
                    </div>
                    <input type="text" class="inputEdit" v-model="amount" :placeholder="'最小充值'+minAmount+'元,最大充值'+maxAmount+'元'" @blur="checkAmount" @keyup="limitAmount" maxlength="8">
                    <div class="clear" @click="clear">清除</div>
                </div>
                <div class="fastItem">
                    <div class="amountFast" v-for="item in fastAmount" @click="fastEnter(item)" v-text="item"></div>
                </div>
            </div>
            <div class="commit" @click="toDoCommit">确定</div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                minAmount:0,
                maxAmount:0,
                amount:"",
                fastAmount:[100,500,1000,2000,5000,10000,20000,50000],
                item:this.$store.state.reChargeOrder.item
            }
        },
        methods:{
            limitAmount(){this.amount=this.amount.match(/[0-9]*/i)[0]},
            checkAmount(){
                if(this.amount.length===0){
                    all.tool.editTipShow("充值金额不能为空！");
                    return false;
                }
                else if(this.amount>this.maxAmount){
                    all.tool.editTipShow("最大充值额度为:"+this.maxAmount+"元");
                    return false;
                }
                else if(!/^([0-9]{1,8})$/.test(this.amount)){
                    all.tool.editTipShow("请输入正确的充值金额！");
                    return false
                }
                else if(this.amount<this.minAmount){
                    all.tool.editTipShow("最小充值额度为:"+this.minAmount+"元");
                    return false
                }
                else return true;
            },
            fastEnter(amount){
                if(amount<this.minAmount)return all.tool.editTipShow("最小充值额度为:"+this.minAmount+"元");
                if(amount>this.maxAmount)return all.tool.editTipShow("最大充值额度为:"+this.maxAmount+"元");
                this.amount=amount
            },
            clear(){
                this.amount=""
            },
            toDoClose(){
                all.$(".setBox").addClass("zoomOut");
                setTimeout(()=>{all.store.commit("reChargeOrder",{isShow:false})},150)
            },
            toDoCommit(){
                if(this.checkAmount()){
                    all.tool.send("recharge",{is_online:all.tool.getStore("reChargeIsOnline"),channel_id:this.item.id,money:this.amount},res=>{
                        this.toDoClose();
                        all.tool.setStore("orderDetail",res.data);
                        all.router.push("/reChargeOrderDetail")
                    })
                }
            },
        },
        created() {
            this.minAmount=all.tool.getStore("offlineRecharge").transfer_account.min_amount;
            this.maxAmount=all.tool.getStore("offlineRecharge").transfer_account.max_amount
        }
    }
</script>

<style scoped>
    .setGamePassword{
        width:100%;
        height:100%;
        position:absolute;
        left:0;
        top:0;
        background:rgba(0,0,0,0.5);
        display:flex;
        justify-content:center;
        align-items:center;
        font-size:0.24rem;
        color:#7f7f7f;
        z-index:10;
    }
    .setBox{
        width:6.9rem;
        height:5.9rem;
        border-radius:0.08rem;
        background:#20a6f9;
        position:relative;
        display:flex;
        flex-direction:column;
        align-items:center;
    }
    .bgLogin{
        width:6.9rem;
        height:auto;
        position:absolute;
        top:0;
        left:0;
    }
    .iconClose{
        width:0.25rem;
        height:0.25rem;
        position:absolute;
        right:0.28rem;
        top:0.28rem;
    }
    .setTitle{
        font-size:0.36rem;
        font-weight:400;
        line-height:0.36rem;
        color:#ffffff;
        height:0.4rem;
        margin:0.2rem 0
    }
    .setBar{
        width:6.5rem;
        height:3.8rem;
        border-radius:0.08rem;
        background:#ffffff;
        display:flex;
        flex-direction:column;
        justify-content:center;
        align-items:center;
        padding:0 0.4rem;
    }
    .inputItem{
        width:5.4rem;
        height:0.8rem;
        background:url("../../assets/login/bg_Edit.png") no-repeat;
        background-size:100% 100%;
        display:flex;
        align-items:center;
        margin-bottom:0.3rem;
        position:relative;
        flex-shrink:0;
    }
    .clear{
        color:#feff03;
        font-weight:400;
        text-decoration:underline;
        position:absolute;
        right:0.2rem;
    }
    .inputItem:last-child{
        margin-bottom:0;
    }
    .itemIcon{
        width:0.8rem;
        height:0.8rem;
        display:flex;
        justify-content:center;
        align-items:center;
    }
    .icon{
        height:0.3rem;
        width:auto
    }
    .inputEdit{
        flex:1;
        height:0.8rem;
        border:none;
        background:none;
        font-size:0.3rem;
        color:#ffffff;
    }
    .inputEdit::placeholder{
        font-size:0.24rem;
        color:#e9e9e9
    }
    .fastItem{
        display:flex;
        width:5.4rem;
        height:1.3rem;
        flex-wrap:wrap;
        justify-content:space-between;
        align-content:space-between;

    }
    .amountFast{
        width:1.2rem;
        height:0.5rem;
        border-radius:0.08rem;
        background:#149cfb;
        font-size:0.28rem;
        color:#ffffff;
        display:flex;
        justify-content:center;
        align-items:center;
        font-weight:400;
    }
    .commit{
        font-size:0.34rem;
        color:#ffffff;
        width:4.8rem;
        height:0.7rem;
        border-radius:0.08rem;
        background:url("../../assets/login/bg_Commit.png") no-repeat;
        background-size:100% 100%;
        display:flex;
        justify-content:center;
        align-items:center;
        margin-top:0.3rem;
        box-shadow:0 0.01rem 0.03rem rgba(0,27,97,0.5);
    }
</style>