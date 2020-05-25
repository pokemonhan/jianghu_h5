<template>
    <div class="setGamePassword">
        <div class="setBox animated fadeInDown faster">
            <img class="bgLogin" src="../../assets/login/bg_Login.png"/>
            <img class="iconClose" @click="toDoClose" src="../../assets/mine/icon_Close.png"/>
            <span class="setTitle">修改游戏密码</span>
            <div class="setBar">
                <div class="inputItem">
                    <div class="itemIcon">
                        <img class="icon" src="../../assets/login/icon_Lock.png"/>
                    </div>
                    <input :type="passwordState" class="inputEdit" v-model="password" placeholder="请设置新的游戏密码" @blur="checkPassword" @keyup="limitPassword" maxlength="40">
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
                password:"",
                passwordState:"password"
            }
        },
        methods:{
            limitPassword(){this.password=this.password.match(/[a-zA-Z0-9]*/i)[0]},
            checkPassword(){
                if(this.password.length===0){
                    all.tool.editTipShow("游戏密码不能为空！");
                    return false;
                }
                else if(!/^([a-zA-Z0-9]{5,40})$/.test(this.password)){
                    all.tool.editTipShow("请输入正确的5至40位字符昵称格式！");
                    return false
                }
                else return true;
            },
            passwordShow(text){
                this.passwordState=text
            },
            toDoClose(){
                all.$(".setBox").addClass("zoomOut");
                setTimeout(()=>{all.store.commit("changeGamePassword",{isShow:false})},150)
            },
            toDoCommit(){
                if(this.checkPassword()){
                    all.tool.send("changeGamePassword",{password:this.password},res=>{
                        this.toDoClose();
                        all.tool.tipWinShow("修改密码成功！",()=>{},{icon:"right"});
                    })
                }
            },
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
</style>