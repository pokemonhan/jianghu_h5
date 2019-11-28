<template>
    <div class="login">
        <div class="pageTitle">
            <img class="iconBack" src="../assets/gameList/icon_Back.png" @click="back"/>
            <img class="textTitle" src="../assets/login/text_PageTitle.png"/>
            <img class="iconService" src="../assets/login/icon_Service.png"/>
        </div>
        <div class="contentView">
            <div class="fromBox">
                <div class="textWelcome">欢迎登录江湖互娱</div>
                <div class="inputBar">
                    <div class="inputTitle">手机号码：</div>
                    <input type="text" class="inputEdit" placeholder="请输入您的手机号码" maxlength="11">
                    <img class="iconClear" src="../assets/login/icon_Clear.png"/>
                </div>
                <div class="inputBar">
                    <div class="inputTitle">密码：</div>
                    <input type="password" class="inputEdit" placeholder="请输入密码" maxlength="11">
                    <img class="iconClear" src="../assets/login/icon_Clear.png"/>
                </div>
                <div class="btnBar">
                    <div class="btnRegister" @click="open('/register')">注册帐号</div>
                    <div class="btnForget" @click="open('/findPassword')">找回密码</div>
                </div>
                <div class="commit">确认登陆</div>
            </div>
            <div class="lineBox">
                <div class="lineTitle">线路切换</div>
                <div class="textBar">
                    <div class="lineText lineChose">线路1</div>
                    <div class="lineText">线路2</div>
                    <div class="lineText">线路3</div>
                </div>
                <div class="speedBar">
                    <div class="speedText nice">20ms(推荐)</div>
                    <div class="speedText middle">210ms(良好)</div>
                    <div class="speedText bad">400ms(差)</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        data () {
            return {

            }
        },
        methods:{
            back(){all.router.go(-1)},
            open(path){all.router.push(path)},
        }
    }
</script>

<style scoped>
    .login{
        background:#eeeeee;
        display:flex;
        flex-direction:column;
    }
    .pageTitle{
        height:0.8rem;
        background:url("../assets/gameList/bg_PageTitle.png") no-repeat;
        background-size:100% 100%;
        display:flex;
        justify-content:center;
        align-items:center;
        position:relative;
    }
    .iconBack{
        width:0.2rem;
        height:auto;
        position:absolute;
        left:0.55rem;
    }
    .textTitle{
        width:1.38rem;
        height:auto
    }
    .iconService{
        width:0.33rem;
        height:auto;
        position:absolute;
        right:0.55rem;
    }
    .contentView{
        flex:1;
        background:url("../assets/login/bg_Content.png") no-repeat;
        background-size:100% auto;
        display:flex;
        flex-direction:column;
        justify-content:space-between;
        padding:0.9rem 0.55rem 0;
        overflow:scroll;
    }
    .fromBox{
        margin-bottom:1rem;
    }
    .textWelcome{
        font-size:0.4rem;
        display:flex;
        flex-direction:column;
        align-items:center;
        margin-bottom:0.5rem;
    }
    .inputBar{
        display:flex;
        align-items:center;
        height:0.8rem;
        border-bottom:0.025rem solid #cccccc;
        font-size:0.26rem;
        color:#999999;
        margin-bottom:0.15rem;
    }
    .inputTitle{
        width:1.3rem;
        text-align:justify;
        line-height:0.4rem;
        height:0.4rem;
        overflow:hidden;
        margin-right:0.2rem;
    }
    .inputTitle:after{
        content:"";
        display:inline-block;
        width:100%;
    }
    .inputEdit{
        border:none;
        background:none;
        font-size:0.34rem;
        color:#000000;
        line-height:0.4rem;
        flex:1;
        caret-color:red;
    }
    .inputEdit::placeholder{
        font-size:0.26rem;
        color:#d2d2d2;
        line-height:0.4rem;
    }
    .iconClear{
        width:0.15rem;
        height:0.15rem;
    }
    .btnBar{
        display:flex;
        justify-content:space-between;
        font-size:0.26rem;
        color:#ee8585;
        margin-top:0.2rem;
        margin-bottom:0.5rem;
    }
    .btnRegister,.btnForget{
        border-bottom:0.01rem solid #ee8585;
        line-height:0.4rem;
    }
    .commit{
        width:6.4rem;
        height:0.68rem;
        background:url("../assets/login/bg_Commit.png") no-repeat;
        background-size:100% 100%;
        display:flex;
        justify-content:center;
        align-items:center;
        font-size:0.3rem;
        color:#ffffff;
        font-weight:500;
    }
    .lineBox{
        margin-bottom:0.4rem;
    }
    .lineTitle{
        border-bottom:0.02rem solid #999999;
        font-size:0.28rem;
        color:#999999;
        display:flex;
        justify-content:center;
        align-items:center;
        line-height:0.76rem;
        margin-bottom:0.2rem;
    }
    .textBar{
        font-size:0.26rem;
        color:#666666;
        display:flex;
        justify-content:space-between;
        padding:0 0.2rem;
        margin-bottom:0.15rem;
    }
    .lineText{
        padding-left:0.4rem;
        background:url("../assets/login/icon_Circle.png") no-repeat 0.04rem center;
        background-size:0.23rem 0.23rem;
        width:1.55rem;
    }
    .lineChose{
        background:url("../assets/login/icon_CircleA.png") no-repeat 0.04rem center;
        background-size:0.23rem 0.23rem;
    }
    .speedBar{
        font-size:0.2rem;
        display:flex;
        justify-content:space-between;
        padding:0 0.2rem;
    }
    .speedText{
        padding-left:0.4rem;
        width:1.55rem;
    }
    .nice{
        color:#22e30e;
        background:url("../assets/login/icon_SpeedNice.png") no-repeat left center;
        background-size:0.34rem 0.24rem;
    }
    .middle{
        color:#e38b0e;
        background:url("../assets/login/icon_SpeedMiddle.png") no-repeat left center;
        background-size:0.34rem 0.24rem;
    }
    .bad{
        color:#e33b0e;
        background:url("../assets/login/icon_SpeedBad.png") no-repeat left center;
        background-size:0.34rem 0.24rem;
    }
</style>
