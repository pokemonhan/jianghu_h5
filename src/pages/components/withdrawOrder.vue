<template>
    <div class="withdrawOrder">
        <div class="setBox animated fadeInDown faster">
            <img class="bgLogin" src="../../assets/login/bg_Login.png"/>
            <img class="iconClose" @click="toDoClose" src="../../assets/mine/icon_Close.png"/>
            <span class="setTitle">提现</span>
            <div class="setBar">
                <div class="inputItem">
                    <div class="itemIcon">
                        <img class="icon" src="../../assets/reCharge/icon_Money .png"/>
                    </div>
                    <input type="text" class="inputEdit" v-model="amount" placeholder="请输入要提现的额度" @blur="checkAmount" @keyup="limitAmount" maxlength="8">
                    <div class="clear" @click="clear">清除</div>
                </div>
                <!--<div class="inputItem">
                    <div class="itemIcon">
                        <img class="icon" src="../../assets/login/icon_RePassword.png"/>
                    </div>
                    <input :type="rePasswordState" class="inputEdit" v-model="rePassword" placeholder="请确认安全码(取款密码)" @blur="checkRePassword" @keyup="limitRePassword" maxlength="16">
                    <img v-if="rePasswordState==='password'" class="iconEye" @click="rePasswordShow('text')" src="../../assets/mine/icon_EyeClose.png"/>
                    <img v-if="rePasswordState==='text'" class="iconEye" @click="rePasswordShow('password')" src="../../assets/mine/icon_EyeOpen.png"/>
                </div>-->
                <div class="inputItem">
                    <div class="itemIcon">
                        <img class="icon" src="../../assets/login/icon_Lock.png"/>
                    </div>
                    <input :type="passwordState" class="inputEdit" v-model="password" placeholder="请输入安全码(取款密码)" @blur="checkPassword" @keyup="limitPassword" maxlength="16">
                    <img v-if="passwordState==='password'" class="iconEye" @click="passwordShow('text')" src="../../assets/mine/icon_EyeClose.png"/>
                    <img v-if="passwordState==='text'" class="iconEye" @click="passwordShow('password')" src="../../assets/mine/icon_EyeOpen.png"/>
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
                amount:"",
                password:"",
                passwordState:"password",
                withdrawItem:""
            }
        },
        methods:{
            limitAmount(){this.amount=this.amount.match(/[0-9]*/i)[0]},
            checkAmount(){
                if(this.amount.length===0){
                    all.tool.editTipShow("提现金额不能为空！");
                    return false;
                }
                else if(this.amount>parseInt(this.$store.state.amount)){
                    all.tool.editTipShow("最大提现额度为:"+parseInt(this.$store.state.amount)+"元");
                    return false;
                }
                else if(!/^([0-9]{1,8})$/.test(this.amount)){
                    all.tool.editTipShow("请输入正确的充值金额！");
                    return false
                }
                else if(this.amount<0){
                    all.tool.editTipShow("提现额度不能小于０元元");
                    return false
                }
                else return true;
            },
            clear(){
                this.amount=""
            },
            limitPassword(){this.password=this.password.match(/[0-9]*/i)[0]},
            checkPassword(){
                if(this.password.length===0){
                    all.tool.editTipShow("安全码不能为空！");
                    return false;
                }
                else if(!/^([a-zA-Z0-9]{8,16})$/.test(this.password)){
                    all.tool.editTipShow("请输入正确的8至16位数字或字母安全码！");
                    return false
                }
                else return true;
            },
            passwordShow(text){
                this.passwordState=text
            },
            toDoClose(){
                all.$(".setBox").addClass("zoomOut");
                setTimeout(()=>{all.store.commit("isShowWithdrawOrder",false)},150)
            },
            toDoCommit(){
                if(this.checkAmount() && this.checkPassword()){
                    all.tool.send("withdrawal",{amount:this.amount,bank_id:this.withdrawItem.id,fund_password:this.password},res=>{
                        this.toDoClose();
                        /*all.tool.send("dynamicInformation",null,result=>{
                            all.store.commit("amount",result.data.balance)
                        });*/
                        all.tool.tipWinShow("已成功提交提现审请，请等待审核！",()=>{},{icon:"right"});
                    })
                }
            },
        },
        created() {
            this.withdrawItem=all.tool.getStore("withdrawItem")
        }
    }
</script>

<style scoped>
    .withdrawOrder{
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
        height:4.9rem;
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
        height:2.8rem;
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
    .iconEye{
        width:0.35rem;
        height:auto;
        position:absolute;
        right:0.2rem;
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
    .clear{
        color:#feff03;
        font-weight:400;
        text-decoration:underline;
        position:absolute;
        right:0.2rem;
    }
</style>