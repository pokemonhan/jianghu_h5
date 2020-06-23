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
            <div class="itemBox" @click="showChangeSafePassword">
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
        <changeSafePassword v-if="this.$store.state.isShowChangeSafePassword"/>
    </div>
</template>

<script>
    import changePassword from '../pages/components/changePassword'
    import changeGamePassword from '../pages/components/changeGamePassword'
    import changeSafePassword from '../pages/components/changeSafePassword'
    export default {
        components:{
            changePassword,
            changeGamePassword,
            changeSafePassword,
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
            showChangeSafePassword(){
                all.store.commit("isShowChangeSafePassword",true)
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

</style>
