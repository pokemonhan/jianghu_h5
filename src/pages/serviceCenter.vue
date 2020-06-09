<template>
    <div class="serviceCenter">
        <div class="pageTitle">
            <div class="iconBack" @click="back"></div>
            <div class="textTitle">客服中心</div>
        </div>
        <div class="contentView">
            <div class="itemBox qq" @click="showContactBox('qq')">
                <img class="iconQq" src="../assets/mine/icon_Qq.png"/>
                <div class="itemText">QQ客服</div>
                <img class="icon_Next" src="../assets/mine/icon_Next.png"/>
            </div>
            <div class="contactBox">
                <div class="contactItem" v-for="item in qqList">
                    <img class="userImg" :src="item.img"/>
                    <div class="nickName" v-text="'昵称：'+item.nickName"></div>
                    <div class="account" v-text="item.account"></div>
                    <div class="enterBtn">点击进入</div>
                </div>
            </div>
            <div class="itemBox weChat" @click="showContactBox('weChat')">
                <img class="iconWeChat" src="../assets/mine/icon_WeChat.png"/>
                <div class="itemText">微信客服</div>
                <img class="icon_Next" src="../assets/mine/icon_Next.png"/>
            </div>
            <div class="contactBox">
                <div class="contactItem" v-for="item in qqList">
                    <img class="userImg" :src="item.img"/>
                    <div class="nickName" v-text="'昵称：'+item.nickName"></div>
                    <div class="account" v-text="item.account"></div>
                    <div class="enterBtn">点击进入</div>
                </div>
            </div>
            <div class="itemBox" @click="open('/onlineService')">
                <img class="iconOnline" src="../assets/mine/icon_Online.png"/>
                <div class="itemText">在线客服</div>
                <img class="icon_Next" src="../assets/mine/icon_Next.png"/>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                qqList:[
                    {nickName:"QQ客服1号",account:"11111111",img:require("../assets/mine/img_Qq1.png")},
                    {nickName:"QQ客服2号",account:"22222222",img:require("../assets/mine/img_Qq1.png")},
                    {nickName:"QQ客服3号",account:"33333333",img:require("../assets/mine/img_Qq1.png")},
                    {nickName:"QQ客服4号",account:"44444444",img:require("../assets/mine/img_Qq1.png")},
                    {nickName:"QQ客服5号",account:"55555555",img:require("../assets/mine/img_Qq1.png")},
                    {nickName:"QQ客服6号",account:"66666666",img:require("../assets/mine/img_Qq1.png")},
                ],
                weChatList:[
                    {nickName:"微信客服1号",account:"AAAAAAAA",img:require("../assets/mine/img_Qq1.png")},
                    {nickName:"微信客服2号",account:"BBBBBBBB",img:require("../assets/mine/img_Qq1.png")},
                    {nickName:"微信客服3号",account:"CCCCCCCC",img:require("../assets/mine/img_Qq1.png")},
                    {nickName:"微信客服4号",account:"DDDDDDDD",img:require("../assets/mine/img_Qq1.png")},
                    {nickName:"微信客服5号",account:"EEEEEEEE",img:require("../assets/mine/img_Qq1.png")},
                    {nickName:"微信客服6号",account:"FFFFFFFF",img:require("../assets/mine/img_Qq1.png")},
                ],
                timeRun:null
            }
        },
        methods:{
            open(path){all.router.push(path)},
            back(){all.router.go(-1)},
            showContactBox(string){
                let elem=all.$("."+string).find(".icon_Next");
                if(string==="qq"){
                    all.$(".weChat").next().css("display","none");
                    all.$(".weChat").find(".icon_Next").addClass("backRotate").removeClass("nextRotate");
                }
                if(string==="weChat"){
                    all.$(".qq").next().css("display","none");
                    all.$(".qq").find(".icon_Next").addClass("backRotate").removeClass("nextRotate");
                }
                if(elem.hasClass("nextRotate")){
                    elem.addClass("backRotate").removeClass("nextRotate");
                    all.$("."+string).next().slideUp();
                }else {
                    elem.addClass("nextRotate").removeClass("backRotate");
                    all.$("."+string).next().slideDown().css("display","flex");
                }
            }
        },
    }
</script>

<style scoped>
    .serviceCenter{
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
        padding-bottom:0.3rem;
    }
    .itemBox{
        font-size:0.2rem;
        color:#666666;
        background:#ffffff;
        padding-right:0.7rem;
        padding-left:0.2rem;
        width:6.9rem;
        height:0.88rem;
        display:flex;
        flex-shrink:0;
        align-items:center;
        margin-top:0.3rem;
        border-radius:0.1rem;
        position:relative;
    }
    .itemText{
        font-weight:400;
        margin-left:0.2rem;
    }
    .icon_Next{
        width:0.18rem;
        height:0.33rem;
        position:absolute;
        right:0.2rem;

    }
    .nextRotate{
        animation:rotateA 200ms 1 forwards ease-in-out;
    }
    .backRotate{
        animation:rotateB 200ms 1 forwards ease-in-out;
    }
    @keyframes rotateA {
        0%{transform:rotateZ(0deg)}
        100%{transform:rotateZ(90deg)}
    }
    @keyframes rotateB {
        0%{transform:rotateZ(90deg)}
        100%{transform:rotateZ(0deg)}
    }
    .iconQq{
        width:0.43rem;
        height:auto;
        margin-right:0.14rem;
    }
    .iconWeChat{
        width:0.52rem;
        height:auto;
        margin-right:0.05rem
    }
    .iconOnline{
        width:0.57rem;
        height:auto
    }
    .contactBox{
        width:6.9rem;
        height:6.5rem;
        background:#ffffff;
        border-radius:0.1rem;
        margin-top:0.1rem;
        flex-wrap:wrap;
        justify-content:flex-start;
        align-items:center;
        padding:0.15rem;
        display:none;
    }
    .contactItem{
        width:2.1rem;
        height:3rem;
        flex-shrink:0;
        border-radius:0.08rem;
        background:#eeeeee;
        margin:0.05rem;
        display:flex;
        flex-direction:column;
        align-items:center;
        font-size:0.2rem;
        color:#333333;
        font-weight:400;
        line-height:0.3rem;
    }
    .userImg{
        width:0.98rem;
        height:0.98rem;
        margin:0.2rem 0
    }
    .enterBtn{
        font-size:0.24rem;
        color:#ffffff;
        width:1.5rem;
        height:0.52rem;
        border-radius:0.26rem;
        background:#83bcff;
        line-height:0.52rem;
        text-align:center;
        margin-top:0.26rem;
    }
</style>
