<template>
    <div class="addBankCard">
        <div class="setBox animated fadeInDown faster">
            <img class="bgLogin" src="../../assets/login/bg_Login.png"/>
            <img class="iconClose" @click="toDoClose" src="../../assets/mine/icon_Close.png"/>
            <span class="setTitle">添加银行卡</span>
            <div class="setBar">
                <div class="inputItem">
                    <div class="itemIcon">
                        <img class="icon" src="../../assets/reCharge/icon_Bank.png"/>
                    </div>
                    <div class="selectTitle">选择银行</div>
                    <select class="selectItem" v-model="selectBank" @change="chooseBank">
                        <option class="option" :value="item" v-for="item in bankList" v-text="item.name"></option>
                    </select>
                </div>
                <div class="inputItem">
                    <div class="itemIcon">
                        <img class="icon" src="../../assets/reCharge/icon_CardName.png"/>
                    </div>
                    <input type="text" class="inputEdit" v-model="name" placeholder="请输入持卡人姓名" @blur="checkName" @keyup="limitName" maxlength="4">
                </div>
                <div class="inputItem">
                    <div class="itemIcon">
                        <img class="icon" src="../../assets/reCharge/icon_Card.png"/>
                    </div>
                    <input type="text" class="inputEdit" v-model="account" placeholder="请输入银行卡账号" @blur="checkAccount" @keyup="limitAccount" maxlength="19">
                </div>
                <div class="inputItem">
                    <div class="itemIcon">
                        <img class="icon" src="../../assets/reCharge/icon_Address.png"/>
                    </div>
                    <input type="text" class="inputEdit" v-model="address" placeholder="请输入开户地址" @blur="checkAddress" @keyup="limitAddress" maxlength="40">
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
                bankList:[],
                selectBank:[],
                name:"",
                account:"",
                address:"",
                bankAccountList:[],

            }
        },
        methods:{
            chooseBank(e){
                // console.log(this.selectBank)
            },
            limitName(){this.name=this.name.match(/[\u4e00-\u9fa5]*/i)[0]},
            limitAccount(){this.account=this.account.match(/[0-9]*/i)[0]},
            limitAddress(){this.address=this.address.match(/[a-zA-Z0-9\u4e00-\u9fa5]*/i)[0]},
            checkName(){
                if(this.name.length===0){
                    all.tool.editTipShow("姓名不能为空！");
                    return false;
                }
                else if(!/^([\u4e00-\u9fa5]{2,4})$/.test(this.name)){
                    all.tool.editTipShow("请输入正确的2至4位中文字符！");
                    return false
                }
                else return true;
            },
            checkAccount(){
                if(this.account.length===0){
                    all.tool.editTipShow("银行账号不能为空！");
                    return false;
                }
                else if(!/^([0-9]{15,19})$/.test(this.account)){
                    all.tool.editTipShow("请输入正确的15至19位数字账号！");
                    return false
                }
                else return true;
            },
            checkAddress(){
                if(this.address.length===0){
                    all.tool.editTipShow("开户地址不能为空！");
                    return false;
                }
                else return true;
            },
            toDoClose(){
                all.$(".setBox").addClass("zoomOut");
                setTimeout(()=>{all.store.commit("isShowAddBankCard",false)},150)
            },
            toDoCommit(){
                if(this.checkName() && this.checkAccount() && this.checkAddress()){
                    all.tool.send("bankBinding",{owner_name:this.name,card_number:this.account,branch:this.address,code:this.selectBank.code,bank_id:this.selectBank.id},res=>{
                        this.toDoClose();
                        all.tool.send("cardList",null,res=>{
                            res.data.forEach(item=>{
                                if(item.type===1){this.bankAccountList.push(item)}
                            });
                            this.$parent.bankAccountList=this.bankAccountList;
                        });
                        all.tool.tipWinShow("添加银行卡账号成功！",()=>{},{icon:"right"});
                    })
                }
            },
        },
        created() {console.log(this.$parent);
            all.tool.send("bankList",null,res=>{
                this.bankList=res.data;
                this.selectBank=res.data[0]
            })
        }
    }
</script>

<style scoped>
    .addBankCard{
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
        height:6.9rem;
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
        height:4.8rem;
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
    .selectTitle{
        font-size:0.24rem;
        color:#e9e9e9;
        margin-right:0.2rem;
    }
    .selectItem{
        width:3.15rem;
        height:100%;
        font-size:0.24rem;
        color:#ffffff;
        background:url("../../assets/reCharge/icon_Down.png") no-repeat right center;
        background-size:0.24rem 0.14rem;
        border:none;
        appearance:none
    }
    .option{
        background:#20a6f9;
        font-size:0.24rem;
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
</style>