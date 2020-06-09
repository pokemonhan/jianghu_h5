<template>
    <div class="safelyCenter">
        <div class="pageTitle">
            <div class="iconBack" @click="back"></div>
            <div class="textTitle">安全中心</div>
        </div>
        <div class="contentView">
            <div class="itemBox" @click="showChangePassword">
                <img class="iconPassword" src="../assets/mine/icon_Password.png"/>
                <div class="itemText">修改登录密码</div>
            </div>
            <div class="itemBox" @click="showChangeBox('修改安全码')">
                <img class="iconSafely" src="../assets/mine/icon_Safely.png"/>
                <div class="itemText">修改安全密码</div>
            </div>
            <div class="itemBox" @click="showChangeGamePassword">
                <img class="iconGame" src="../assets/mine/icon_Game.png"/>
                <div class="itemText">修改游戏密码</div>
            </div>
        </div>
        <changeGamePassword v-if="this.$store.state.changeGamePassword.isShow"/>
        <changePassword v-if="this.$store.state.changePassword.isShow"/>
        <div class="changeBox" v-if="isShowChangeBox">
            <div class="changeWin">
                <div class="changeTitle">
                    <span v-text="changeTitle"></span>
                    <img class="iconClose" @click="hideChangeBox" src="../assets/mine/icon_Close.png"/>
                </div>
                <div class="editBar">
                    <div class="editTitle">安全码：</div>
                    <div class="editEnter">
                        <input :type="placeholderSafe" class="editInput" placeholder="请输入安全码">
                        <img v-if="placeholderSafe==='password'" class="iconEye" @click="eyeState('safe','text')" src="../assets/mine/icon_EyeClose.png"/>
                        <img v-if="placeholderSafe!=='password'" class="iconEye" @click="eyeState('safe','password')" src="../assets/mine/icon_EyeOpen.png"/>
                    </div>
                </div>
                <div class="editBar">
                    <div class="editTitle">新密码：</div>
                    <div class="editEnter">
                        <input :type="placeholderNewPassword" class="editInput" placeholder="请输入新密码">
                        <img v-if="placeholderNewPassword==='password'" class="iconEye" @click="eyeState('new','text')" src="../assets/mine/icon_EyeClose.png"/>
                        <img v-if="placeholderNewPassword!=='password'" class="iconEye" @click="eyeState('new','password')"  src="../assets/mine/icon_EyeOpen.png"/>
                    </div>
                </div>
                <div class="editBar">
                    <div class="editTitle">确认密码：</div>
                    <div class="editEnter">
                        <input :type="placeholderSurePassword" class="editInput" placeholder="请确认密码">
                        <img v-if="placeholderSurePassword==='password'" class="iconEye" @click="eyeState('sure','text')"  src="../assets/mine/icon_EyeClose.png"/>
                        <img v-if="placeholderSurePassword!=='password'" class="iconEye" @click="eyeState('sure','password')"  src="../assets/mine/icon_EyeOpen.png"/>
                    </div>
                </div>
                <div class="editBar">
                    <div class="editTitle">验证码：</div>
                    <div class="editEnter codeEnter">
                        <input type="text" class="editInput" placeholder="请输入验证码">
                    </div>
                    <div class="getCode">获取验证码</div>
                </div>
                <div class="errorTip">请输入正确的验证码。</div>
                <div class="commit">确认提交</div>
            </div>
        </div>
    </div>
</template>

<script>
    import changePassword from '../pages/components/changePassword'
    import changeGamePassword from '../pages/components/changeGamePassword'
    export default {
        components:{
            changePassword,
            changeGamePassword,
        },
        data () {
            return {
                isShowChangeBox:false,
                changeTitle:null,
                placeholderSafe:"password",
                placeholderNewPassword:"password",
                placeholderSurePassword:"password",
            }
        },
        methods:{
            open(path){all.router.push(path)},
            back(){all.router.go(-1)},
            showChangePassword(){
                all.store.commit("changePassword",{isShow:true})
            },
            showChangeGamePassword(){
                all.store.commit("changeGamePassword",{isShow:true})
            },
            showChangeBox(title){
                this.changeTitle=title;
                this.isShowChangeBox=true
            },
            hideChangeBox(){
                this.isShowChangeBox=false
            },
            eyeState(key,value){
                if(key==="safe")this.placeholderSafe=value;
                if(key==="new")this.placeholderNewPassword=value;
                if(key==="sure")this.placeholderSurePassword=value;
            }
        },
    }
</script>

<style scoped>
    .safelyCenter{
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
        padding-top:0.3rem;
    }
    .itemBox{
        font-size:0.2rem;
        color:#666666;
        background:url("../assets/mine/icon_Next.png") no-repeat 6.5rem center #ffffff;
        background-size:0.18rem 0.33rem;
        padding-right:0.7rem;
        padding-left:0.2rem;
        width:6.9rem;
        height:0.88rem;
        display:flex;
        flex-shrink:0;
        align-items:center;
        margin-bottom:0.3rem;
        border-radius:0.1rem;
    }
    .itemText{
        font-weight:400;
        margin-left:0.2rem;
    }
    .iconPassword{
        width:0.37rem;
        height:0.48rem;
    }
    .iconSafely{
        width:0.41rem;
        height:0.49rem;
    }
    .iconGame{
        width:0.41rem;
        height:0.36rem;
    }
    .changeBox{
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
    @media screen and (orientation: landscape){.changeBox{align-items:flex-start}}
    .changeWin{
        width:6.9rem;
        height:6.5rem;
        border-radius:0.1rem;
        background:#ffffff;
        margin:1rem 0;
        overflow:hidden;
    }
    .changeTitle{
        height:1rem;
        background:linear-gradient(to bottom,#52a2ff,#1d7ef0);
        font-size:0.3rem;
        color:#ffffff;
        display:flex;
        justify-content:center;
        align-items:center;
        position:relative;
        font-weight:400;
        margin-bottom:0.5rem;
    }
    .iconClose{
        position:absolute;
        right:0.3rem;
        width:0.25rem;
        height:0.25rem;
    }
    .editBar{
        display:flex;
        align-items:center;
        justify-content:center;
        margin-bottom:0.2rem;
        height:0.58rem;
    }
    .editTitle{
        width:1.2rem;
        text-align:justify;
        overflow:hidden;
        height:0.58rem;
        line-height:0.58rem;
        font-size:0.24rem;
        color:#333333;
        font-weight:400;
    }
    .editTitle::after{
        content:'';
        display:inline-block;
        padding-left:100%;
    }
    .editEnter{
        width:4.95rem;
        height:0.58rem;
        background:#eaeaea;
        border-radius:0.08rem;
        border:0.02rem solid #cccccc;
        display:flex;
        align-items:center;
        position:relative;
    }
    .codeEnter{
        width:3.5rem;
    }
    .getCode{
        font-size:0.2rem;
        color:#ffffff;
        width:1.3rem;
        height:0.58rem;
        border-radius:0.08rem;
        background:#58a2fc;
        margin-left:0.15rem;
        display:flex;
        justify-content:center;
        align-items:center;
    }
    .iconEye{
        width:0.36rem;
        height:auto;
        position:absolute;
        right:0.2rem;
    }
    .editInput{
        height:100%;
        width:85%;
        background:#eaeaea;
        padding-left:2em;
        font-size:0.2rem;
        border:none
    }
    .editInput::placeholder{
        color:#c7c7c7;
        font-weight:100;
    }
    .errorTip{
        font-size:0.18rem;
        color:#d90000;
        background:url("../assets/mine/icon_Error.png") no-repeat left center;
        background-size:0.2rem 0.2rem;
        padding-left:0.3rem;
        margin-left:1.65rem;
        margin-bottom:0.5rem;
    }
    .commit{
        width:6.1rem;
        height:0.68rem;
        border-radius:0.08rem;
        background:linear-gradient(to bottom,#94ccff,#086bf7);
        margin:0 auto;
        display:flex;
        justify-content:center;
        align-items:center;
        font-size:0.28rem;
        color:#ffffff;
        font-weight:300;
        box-shadow:0 0.01rem 0.03rem rgba(0,27,97,0.5);
    }
</style>
