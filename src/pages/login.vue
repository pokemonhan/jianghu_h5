<template>
    <div class="login">
        <div class="pageTitle">
            <div class="textTitle">
                <span>登录</span>
                <img class="iconBack" src="../assets/activity/btn_Back.png" @click="back"/>
            </div>
            <img class="circleC" src="../assets/mine/img_CircleC.png"/>
            <img class="circleA" src="../assets/mine/img_CircleA.png"/>
            <img class="circleB" src="../assets/mine/img_CircleB.png"/>
        </div>
        <div class="contentView">
            <img class="banner" src="../assets/homePage/bannerA.png"/>
            <div class="editBox">
                <img class="iconLogo" src="../assets/login/icon_Logo.png"/>
                <div class="editBar">
                    <div class="editContent">
                        <div class="inputItem">
                            <div class="inputTitle">手机号码:</div>
                            <input class="inputEdit inputMobile" type="text" v-model="mobile" placeholder="请输入11位手机号码" @blur="checkMobile" @keyup="limitMobile" maxlength="11">
                        </div>
                        <div class="inputItem">
                            <div class="inputTitle">密码:</div>
                            <input class="inputEdit" :type="placeholderState"  v-model="password" placeholder="请输入8-16位英文和数字组合" @blur="checkPassword" @keyup="limitPassword" maxlength="16">
                            <img v-if="placeholderState==='password'" class="iconEye" @click="eyeState('text')" src="../assets/mine/icon_EyeClose.png"/>
                            <img v-if="placeholderState==='text'" class="iconEye" @click="eyeState('password')" src="../assets/mine/icon_EyeOpen.png"/>
                        </div>
                        <div class="tipItem">
                            <div class="errorTip" v-text="errorTip" :style="{opacity:errorTip?1:0}"></div>
                            <div class="forget" @click="open('/forgetPassword')">忘记密码</div>
                        </div>
                    </div>
                    <div class="commit" @click="toDoLogin">登录</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                placeholderState:"password",
                mobile:"18844446666",
                password:"12345Eth",
                errorTip:null
            }
        },

        methods:{
            open(path){all.router.push(path)},
            back(){all.router.go(-1)},
            eyeState(value){this.placeholderState=value},
            limitMobile(){
                this.errorTip=null;
                this.mobile=this.mobile.match(/[0-9]*/i)[0]
            },
            checkMobile(){
                if(this.mobile.length===0){
                    this.errorTip="手机号码不能为空";
                    return false;
                }
                else if(!/^1[3456789][0-9]{9}$/.test(this.mobile)){
                    this.errorTip="请输入正确的11位手机号码";
                    return false
                }
                else return true;
            },
            limitPassword(){
                this.errorTip=null;
                this.password=this.password.match(/[a-zA-Z0-9]*/i)[0]
            },
            checkPassword(){
                if(this.password.length===0){
                    this.errorTip="密码不能为空";
                    return false
                }
                else if(!/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{8,16}$/.test(this.password)){
                    this.errorTip="密码为8-16位字母和数字组合";
                    return false
                }
                else return true;
            },
            toDoLogin(){
                all.tool.send("login",{mobile:this.mobile,password:this.password},res=>{
                    all.tool.setStore("Authorization",res.data.token_type+" "+res.data.access_token);
                    all.tool.send("information",null,res=>{
                        all.tool.setLoginData(res.data);
                        all.router.push("/")
                    },this.fail);
                },this.fail);
            },
            fail(err){console.log('失败',err.response)}
        },

    }
</script>

<style scoped>
    .login{
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
    .editBox{
        width:6.9rem;
        height:7.82rem;
        background:url("../assets/login/bg_EditBox.png") no-repeat;
        background-size:100% 100%;
        display:flex;
        flex-direction:column;
        align-items:center;
        flex-shrink:0;
        margin-bottom:0.5rem;
        border-radius:0.1rem;
        box-shadow:0 0.01rem 0.03rem rgba(0,27,97,0.5);
    }
    .iconLogo{
        width:1.93rem;
        height:0.5rem;
        margin:0.3rem 0;
    }
    .editBar{
        width:6.5rem;
        height:6.5rem;
        background:url("../assets/login/bg_Edit.png") no-repeat;
        background-size:100% 100%;
        display:flex;
        flex-direction:column;
        align-items:center;
        justify-content:space-between;
    }
    .editContent{
        width:5.2rem;
        margin-top:0.5rem;
        margin-bottom:0.5rem;
        flex:1;
        display:flex;
        flex-direction:column;
        justify-content:center;
    }
    .commit{
        font-size:0.34rem;
        color:#ffffff;
        width:4.62rem;
        height:0.68rem;
        border-radius:0.12rem;
        background:linear-gradient(to bottom,#65a3ff,#006cff);
        display:flex;
        justify-content:center;
        align-items:center;
        margin-bottom:0.5rem;
    }
    .inputItem{
        display:flex;
        background:url("../assets/login/icon_UnderLine.png") no-repeat center bottom;
        background-size:5.16rem 0.08rem;
        height:0.8rem;
        align-items:center;
        position:relative;
    }
    .inputTitle{
        font-size:0.28rem;
        color:#666666;
        font-weight:400;
        width:1.2rem;
        text-align:justify;
        overflow:hidden;
        height:0.8rem;
        line-height:0.8rem;
    }
    .inputTitle:after{
        content:"";
        padding-left:100%;
        display:inline-block;
    }
    .inputEdit{
        flex:1;
        height:0.6rem;
        border:none;
        font-size:0.3rem;
        color:#333333;
        margin-left:0.2rem
    }
    .inputEdit::placeholder{
        font-size:0.22rem;
        color:#999999
    }
    .iconEye{
        width:0.35rem;
        height:auto;
        position:absolute;
        right:0.4rem;
    }
    .tipItem{
        line-height:0.8rem;
        display:flex;
        justify-content:space-between;
    }
    .errorTip{
        font-size:0.18rem;
        color:#d90000;
        background:url("../assets/mine/icon_Error.png") no-repeat left center;
        background-size:0.2rem 0.2rem;
        padding-left:0.3rem;
    }
    .forget{
        font-size:0.24rem;
        color:#1f80f1;
        text-decoration:underline;
        margin-right:0.4rem;
    }
</style>
