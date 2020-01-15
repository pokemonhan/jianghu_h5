<template>
    <div class="register">
        <div class="pageTitle">
            <div class="textTitle">
                <span>注册</span>
                <img class="iconBack" src="../assets/activity/btn_Back.png" @click="back"/>
            </div>
            <img class="circleC" src="../assets/mine/img_CircleC.png"/>
            <img class="circleA" src="../assets/mine/img_CircleA.png"/>
            <img class="circleB" src="../assets/mine/img_CircleB.png"/>
        </div>
        <div class="contentView">
            <img class="banner" :src="banner"/>
            <div class="registerBox">
                <img class="bgRegister" src="../assets/login/bg_Login.png"/>
                <img class="iconLogo" src="../assets/login/icon_Logo.png"/>
                <div class="editBar">
                    <div class="inputItem">
                        <div class="itemIcon">
                            <img class="icon" src="../assets/login/icon_Mobile.png"/>
                        </div>
                        <input type="text" class="inputEdit" v-model="mobile" placeholder="请输入手机号码（11位数字）" @blur="checkMobile" @keyup="limitMobile" maxlength="11">
                    </div>
                    <div class="inputItem">
                        <div class="itemIcon">
                            <img class="icon" src="../assets/login/icon_Lock.png"/>
                        </div>
                        <input class="inputEdit" :type="passwordState" v-model="password" placeholder="请输入密码（8-16位英文和数字组合）" @blur="checkPassword" @keyup="limitPassword" maxlength="16">
                        <img v-if="passwordState==='password'" class="iconEye" @click="passwordShow('text')" src="../assets/mine/icon_EyeClose.png"/>
                        <img v-if="passwordState==='text'" class="iconEye" @click="passwordShow('password')" src="../assets/mine/icon_EyeOpen.png"/>
                    </div>
                    <div class="inputItem">
                        <div class="itemIcon">
                            <img class="icon" src="../assets/login/icon_RePassword.png"/>
                        </div>
                        <input class="inputEdit" :type="rePasswordState" v-model="rePassword" placeholder="请确认密码（8-16位英文和数字组合）" @blur="checkRePassword" @keyup="limitRePassword" maxlength="16">
                        <img v-if="rePasswordState==='password'" class="iconEye" @click="rePasswordShow('text')" src="../assets/mine/icon_EyeClose.png"/>
                        <img v-if="rePasswordState==='text'" class="iconEye" @click="rePasswordShow('password')" src="../assets/mine/icon_EyeOpen.png"/>
                    </div>
                    <div class="inputItem">
                        <div class="itemIcon">
                            <img class="icon" src="../assets/login/icon_CheckCode.png"/>
                        </div>
                        <input type="text" class="inputEdit" placeholder="请输入验证码（6位数字）" v-model="msmCode" @blur="checkMsmCode" @keyup="limitMsmCode" maxlength="6">
                        <div class="getCode" v-text="getCode" @click="toDoGetCode"></div>
                    </div>
                    <div class="inputItem">
                        <div class="itemIcon">
                            <img class="icon" src="../assets/login/icon_Invite.png"/>
                        </div>
                        <input type="text" class="inputEdit" placeholder="请输入邀请码（7位数字*非必填）" v-model="inviteCode" @blur="checkInviteCode" @keyup="limitInviteCode" maxlength="6">
                    </div>
                </div>
                <div class="commit" @click="toDoRegister">注册</div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                passwordState:"password",
                rePasswordState:"password",
                mobile:"",
                password:"",
                rePassword:"",
                msmCode:"",
                inviteCode:"",
                getCode:"获取验证码",
                countTime:null,
                verification_key:null,
                nextReqTime:null,
                banner:require("../assets/homePage/bannerC.png")
            }
        },
        methods:{
            open(path){all.router.push(path)},
            back(){all.router.go(-1)},
            passwordShow(value){this.passwordState=value},
            rePasswordShow(value){this.rePasswordState=value},
            limitMobile(){this.mobile=this.mobile.match(/[0-9]*/i)[0]},
            checkMobile(){
                if(this.mobile.length===0){
                    all.tool.editTipShow("手机号码不能为空！");
                    return false;
                }
                else if(!/^1[3456789][0-9]{9}$/.test(this.mobile)){
                    all.tool.editTipShow("请输入正确的11位手机号码！");
                    return false
                }
                else return true;
            },
            limitPassword(){this.password=this.password.match(/[a-zA-Z0-9]*/i)[0]},
            checkPassword(){
                if(this.password.length===0){
                    all.tool.editTipShow("密码不能为空！");
                    return false
                }
                else if(!/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{8,16}$/.test(this.password)){
                    all.tool.editTipShow("密码为8-16位字母和数字组合！");
                    return false
                }
                else return true;
            },
            limitRePassword(){this.rePassword=this.rePassword.match(/[a-zA-Z0-9]*/i)[0]},
            checkRePassword(){
                if(this.rePassword.length===0){
                    all.tool.editTipShow("确认密码不能为空！");
                    return false
                }
                else if(!/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{8,16}$/.test(this.rePassword)){
                    all.tool.editTipShow("确认密码为8-16位字母和数字组合！");
                    return false
                }
                else if(this.rePassword!==this.password){
                    all.tool.editTipShow("两次输入密码不一致！");
                    return false
                }
                else return true;
            },
            limitMsmCode(){this.msmCode=this.msmCode.match(/[0-9]*/i)[0]},
            checkMsmCode(){
                if(this.msmCode.length===0){
                    all.tool.editTipShow("短信验证码不能为空！");
                    return false
                }
                else if(!/^[0-9]{6}$/.test(this.msmCode)){
                    all.tool.editTipShow("短信验证码为6位数字！");
                    return false
                }
                return true
            },
            limitInviteCode(){this.inviteCode=this.inviteCode.match(/[0-9]*/i)[0]},
            checkInviteCode(){
                if(this.inviteCode.length!==0 && !/^[0-9]{7}$/.test(this.inviteCode)){
                    all.tool.editTipShow("邀请码为7位数字！");
                    return false
                }
                return true
            },
            startCount(time){
                if(!this.countTime){
                    this.countTime=setInterval(()=>{
                        time--;
                        this.getCode=time+"秒";
                        if(time===0){
                            clearInterval(this.countTime);
                            this.countTime=null;
                            this.getCode="获取验证码"
                        }
                    },1000)
                }
            },
            toDoGetCode(){
                if(this.checkMobile()){
                    let availTime=parseInt(all.tool.getStore("nextReqTime")-new Date().getTime()/1000);
                    if(availTime>0)return all.tool.editTipShow("获取验证码间隔时间太短，请"+availTime+"秒后再试！");
                    all.tool.send("registerCode",{mobile:this.mobile},res=>{
                        all.tool.setStore("nextReqTime",res.data.nextReqTime);
                        all.tool.editTipShow("验证码已发送到您的手机上，请注意查收！");
                        this.msmCode=res.data.verification_code;
                        this.verification_key=res.data.verification_key;
                        let now=new Date().getTime()/1000;
                        this.startCount(parseInt(res.data.nextReqTime-now))
                    })
                }
            },
            toDoRegister(){
                if(this.checkMobile() && this.checkPassword() && this.checkRePassword() && this.checkMsmCode() && this.checkInviteCode()){
                    all.tool.send("register",{mobile:this.mobile,password:this.password,password_confirmation:this.rePassword,verification_code:this.msmCode,verification_key:this.verification_key,inviter:this.inviteCode},res=>{
                        all.tool.setStore("Authorization",res.data.token_type+" "+res.data.access_token);
                        all.tool.send("information",null,res=>{
                            all.tool.setLoginData(res.data);
                            all.router.push("/")
                        });
                    })
                }
            },
        },
        created() {
            all.tool.send("slides",{flag:"2"},res=>{res.data.forEach(item=>{if(item.redirect_url==="register")this.banner=item.pic_path})});
            this.nextReqTime=all.tool.getStore("nextReqTime");
            let now=new Date().getTime()/1000;
            if(now<this.nextReqTime){
                this.startCount(parseInt(this.nextReqTime-now));
            }
        }
    }
</script>

<style scoped>
    .register{
        display:flex;
        flex-direction:column;
        background:#eeeeee;
    }
    .pageTitle{
        height:3.3rem;
        background:linear-gradient(90deg,#51a1ff,#1d7ef0);
        color:#fff;
        padding:0 0.3rem;
        flex-shrink:0;
    }
    .iconBack{
        width:0.18rem;
        height:0.34rem;
        position:absolute;
        left:0;
    }
    .textTitle{
        height:1rem;
        display:flex;
        justify-content:center;
        align-items:center;
        font-size:0.36rem;
        font-weight:400;
        position:relative;
    }
    .circleA{
        width:2.58rem;
        height:auto;
        position:absolute;
        top:0.2rem;
        left:0.5rem;
        z-index:1;
    }
    .circleB{
        width:1.65rem;
        height:auto;
        position:absolute;
        top:1.8rem;
        left:4.8rem;
        z-index:1;
    }
    .circleC{
        width:1.1rem;
        height:auto;
        position:absolute;
        top:0.7rem;
        left:2.7rem;
        z-index:1;
    }
    .contentView{
        margin:-2.3rem 0 0;
        flex:1;
        display:flex;
        align-items:center;
        flex-direction:column;
        overflow:scroll;
    }
    .banner{
        width:6.9rem;
        height:3rem;
        margin-bottom:0.3rem;
        flex-shrink:0;
        border-radius:0.15rem;
        box-shadow:0 0.01rem 0.03rem rgba(0,27,97,0.5);
    }
    .registerBox{
        width:6.9rem;
        height:8.4rem;
        border-radius:0.08rem;
        background:#20a6f9;
        box-shadow:0 0.01rem 0.03rem rgba(0,27,97,0.5);
        position:relative;
        display:flex;
        flex-direction:column;
        align-items:center;
        flex-shrink:0;
        margin-bottom:0.5rem;
    }
    .bgRegister{
        width:6.61rem;
        height:1.35rem;
        position:absolute;
        left:0;
        top:0;
    }
    .iconLogo{
        width:1.93rem;
        height:0.5rem;
        margin:0.3rem 0;
    }
    .editBar{
        width:6.5rem;
        height:6rem;
        border-radius:0.08rem;
        background:#ffffff;
        padding-top:0.4rem;
        display:flex;
        flex-direction:column;
        align-items:center;
    }
    .inputItem{
        width:5.4rem;
        height:0.8rem;
        background:url("../assets/login/bg_Edit.png") no-repeat;
        background-size:100% 100%;
        display:flex;
        align-items:center;
        margin-bottom:0.3rem;
        flex-shrink:0;
        position:relative;
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
        background:url("../assets/login/bg_Commit.png") no-repeat;
        background-size:100% 100%;
        display:flex;
        justify-content:center;
        align-items:center;
        margin-top:0.3rem;
        box-shadow:0 0.01rem 0.03rem rgba(0,27,97,0.5);
    }
    .getCode{
        font-size:0.24rem;
        width:1.5rem;
        height:0.6rem;
        color:#15a2fb;
        display:flex;
        justify-content:center;
        align-items:center;
        background:#ffffff;
        border-radius:0.08rem;
        position:absolute;
        right:0.1rem;
    }
</style>
