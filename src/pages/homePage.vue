<template>
    <div class="homePage">
        <div class="pageTitle">
            <div class="userInfo" v-if="this.$store.state.isLogin">
                <img class="imgUser" src="../assets/homePage/img_User.png"/>
                <div class="nameId">
                    <div class="name">两只小蜜蜂</div>
                    <div class="id">ID：189673</div>
                </div>
                <div class="amountBar">
                    <img class="iconGoldCoin" src="../assets/homePage/icon_GoldCoin.png"/>
                    <div class="amount" v-text="this.$store.state.amount"></div>
                    <img class="iconAdd" src="../assets/homePage/icon_Add.png"/>
                </div>
            </div>
            <div class="shortcutMenu">
                <img class="iconService" src="../assets/homePage/icon_Service.png"/>
                <div class="menuText" v-if="!this.$store.state.isLogin">登录</div>
                <div class="menuText" v-if="!this.$store.state.isLogin">注册</div>
            </div>
        </div>
        <div class="contentView">
            <div class="bannerBox">
                <img v-for="item in bannerList" class="banner" :src="item"/>
                <div class="bannerPoint">
                    <div v-for="(item,index) in bannerList" class="point" :class="{currentPoint:index===currentIndex}"></div>
                </div>
            </div>
            <div class="noticeBox">
                <img class="noticeIcon" src="../assets/homePage/icon_Notice.png"/>
                <marquee class="noticeText" align="left" behavior="scroll" direction="left" scrollamount="5" scrolldelay="100">
                    恭喜玩家 “江湖王者”在飞禽走兽中一掷1000金币，成功登上本周单次下注榜首...
                </marquee>
            </div>
            <div class="gameBox">
                <div class="gameItem">
                    <img class="gameBg" src="../assets/homePage/bg_GameA.png"/>
                    <img class="gameTitle" src="../assets/homePage/title_GameA.png"/>
                    <img class="gameIconA" src="../assets/homePage/icon_GameA.png"/>
                    <div class="gameText">赚现金 赢大奖</div>
                </div>
                <div class="gameItem">
                    <img class="gameBg" src="../assets/homePage/bg_GameB.png"/>
                    <img class="gameTitle" src="../assets/homePage/title_GameB.png"/>
                    <img class="gameIconB" src="../assets/homePage/icon_GameB.png"/>
                    <div class="gameText">赚现金 赢大奖</div>
                </div>
                <div class="gameItem">
                    <img class="gameBg" src="../assets/homePage/bg_GameC.png"/>
                    <img class="gameTitle" src="../assets/homePage/title_GameC.png"/>
                    <img class="gameIconC" src="../assets/homePage/icon_GameC.png"/>
                    <div class="gameText">赚现金 赢大奖</div>
                </div>
                <div class="gameItem">
                    <img class="gameBg" src="../assets/homePage/bg_GameD.png"/>
                    <img class="gameTitle" src="../assets/homePage/title_GameD.png"/>
                    <img class="gameIconD" src="../assets/homePage/icon_GameD.png"/>
                    <div class="gameText">赚现金 赢大奖</div>
                </div>
                <div class="gameItem">
                    <img class="gameBg" src="../assets/homePage/bg_GameE.png"/>
                    <img class="gameTitle" src="../assets/homePage/title_GameE.png"/>
                    <img class="gameIconE" src="../assets/homePage/icon_GameE.png"/>
                    <div class="gameText">赚现金 赢大奖</div>
                </div>
                <div class="gameItem">
                    <img class="gameBg" src="../assets/homePage/bg_GameF.png"/>
                    <img class="gameTitle" src="../assets/homePage/title_GameF.png"/>
                    <img class="gameIconF" src="../assets/homePage/icon_GameF.png"/>
                    <div class="gameText">赚现金 赢大奖</div>
                </div>
            </div>
            <div class="shortcutTitle">常玩游戏</div>
            <div class="shortcutGameBox">
                <img class="imgGame" src="../assets/homePage/img_GameA.png"/>
                <img class="imgGame" src="../assets/homePage/img_GameB.png"/>
                <img class="imgGame" src="../assets/homePage/img_GameC.png"/>
                <img class="imgGame" src="../assets/homePage/img_GameD.png"/>
                <img class="imgGame" src="../assets/homePage/img_GameE.png"/>
                <img class="imgGame" src="../assets/homePage/img_GameF.png"/>
                <img class="imgGame" src="../assets/homePage/img_GameH.png"/>
                <img class="imgGame" src="../assets/homePage/img_GameI.png"/>
                <img class="imgGame" src="../assets/homePage/img_GameJ.png"/>
            </div>
        </div>
        <comMenu/>
    </div>
</template>

<script>
    import comMenu from '../pages/components/menu'
    export default {
        components:{
            comMenu
        },
        data () {
            return {
                currentIndex:0,
                bannerList:[
                    require("../assets/homePage/bannerA.png"),
                    require("../assets/homePage/bannerB.png"),
                    require("../assets/homePage/bannerC.png"),
                    require("../assets/homePage/bannerD.png"),
                ]
            }
        },
        watch:{
            currentIndex:{
                handler(newVal,oldVal){
                    all.$(".banner:first-child").animate({marginLeft:0-parseInt(all.$(".banner:first-child").width())},"swing",
                        ()=>{all.$(".banner:first-child").css("marginLeft",0).insertBefore(all.$(".bannerPoint"))});
                },
                deep:true
            },
        },
        methods:{
            open(path){all.router.push(path)},
        },
        created() {
            setInterval(()=>{this.currentIndex>=3?this.currentIndex=0:this.currentIndex+=1},6000)
        }
    }
</script>

<style scoped>
    .homePage{
        display:flex;
        flex-direction:column;
        justify-content:space-between;
    }
    .pageTitle{
        height:0.9rem;
        background:#1d7ef0;
        display:flex;
        align-items:center;
        color:#fff;
        padding:0 0.3rem;
        position:relative;
        flex-shrink:0;
    }
    .userInfo{
        display:flex;
        align-items:center;
    }
    .imgUser{
        width:0.52rem;
        height:0.52rem;
        margin-right:0.2rem;
    }
    .nameId{
        font-size:0.2rem;
        font-weight:400;
        margin-right:0.4rem;
    }
    .amountBar{
        display:flex;
        align-items:center;
        font-size:0.18rem;
        position:relative;
        width:2.2rem;
        height:0.42rem;
        background:url("../assets/homePage/bg_Amount.png") no-repeat ;
        background-size:100% 100%;
    }
    .iconGoldCoin{
        height:0.4rem;
        width:auto;
        position:absolute;
        left:-0.2rem;
    }
    .amount{
        width:2.2rem;
        height:0.42rem;
        text-align:center;
        line-height:0.42rem;
        font-weight:bold;
        background: linear-gradient(180deg,#fff991,#ffce24);
        -webkit-background-clip: text;
        color:transparent;
        -webkit-text-stroke:0.01rem #501300;
    }
    .iconAdd{
        height:0.4rem;
        width:auto;
        position:absolute;
        right:-0.2rem;
    }
    .shortcutMenu{
        position:absolute;
        right:0.3rem;
        font-size:0.3rem;
        font-weight:400;
        display:flex;
    }
    .iconService{
        width:0.45rem;
        height:auto;
    }
    .menuText{
        margin-left:0.2rem;
    }
    .contentView{
        margin:0 0.3rem;
        flex:1;
        display:flex;
        flex-direction:column;
        align-items:center;
        overflow:scroll;
    }
    .bannerBox{
        width:6.9rem;
        height:3.15rem;
        flex-shrink:0;
        margin-top:0.2rem;
        border-radius:0.15rem;
        display:flex;
        position:relative;
        overflow:hidden;
    }
    .banner{
        width:6.9rem;
        height:3.14rem;
        flex-shrink:0;
        border-radius:0.15rem;
        box-shadow:0 0.01rem 0.03rem rgba(0,27,97,0.5);
    }
    .bannerPoint{
        position:absolute;
        right:0.3rem;
        bottom:0.2rem;
        display:flex;
    }
    .point{
        width:0.08rem;
        height:0.08rem;
        border-radius:50%;
        border:0.01rem solid #ffffff;
        margin-left:0.06rem;
    }
    .currentPoint{
        background:#ffffff;
    }
    .noticeBox{
        width:6.74rem;
        height:0.44rem;
        flex-shrink:0;
        display:flex;
        font-size:0.2rem;
        color:#ffffff;
        font-weight:400;
        background:#1d7ef0;
        border-radius:0.25rem;
        align-items:center;
        margin:0.2rem 0;
        border:0.01rem solid #a9cffd;
        padding:0 0.25rem;
        box-shadow:0 0.01rem 0.08rem rgba(0,27,97,0.8);
    }
    .noticeIcon{
        width:0.26rem;
        height:0.21rem;
        margin-right:0.1rem;
    }
    .gameBox{
        width:100%;
        display:flex;
        justify-content:space-between;
        flex-wrap:wrap;
    }
    .gameItem{
        position:relative;
        width:3.35rem;
        height:1.8rem;
        border-radius:0.1rem;
        box-shadow:0 0.01rem 0.03rem rgba(0,27,97,0.5);
        margin-bottom:0.2rem;
        overflow:hidden;
    }
    .gameBg{
        width:3.35rem;
        height:1.8rem;
    }
    .gameTitle{
        height:0.4rem;
        width:auto;
        position:absolute;
        top:0.4rem;
        left:0.2rem;
    }
    .gameIconA{
        width:0.83rem;
        height:1.07rem;
        position:absolute;
        right:0.25rem;
        bottom:0.02rem;
    }
    .gameIconB{
        width:1.24rem;
        height:1.07rem;
        position:absolute;
        right:-0.1rem;
        bottom:-0.2rem;
    }
    .gameIconC{
        width:1.18rem;
        height:1.05rem;
        position:absolute;
        right:0.05rem;
        bottom:0;
    }
    .gameIconD{
        width:1.09rem;
        height:1.09rem;
        position:absolute;
        right:0;
        bottom:-0.05rem
    }
    .gameIconE{
        width:0.83rem;
        height:1.37rem;
        position:absolute;
        right:0.2rem;
        bottom:-0.2rem
    }
    .gameIconF{
        width:1.3rem;
        height:0.67rem;
        position:absolute;
        right:-0.1rem;
        bottom:0.1rem;
    }
    .gameText{
        font-size:0.2rem;
        color:#ffffff;
        position:absolute;
        left:0.2rem;
        top:0.9rem;
    }
    .shortcutTitle{
        width:100%;
        height:0.4rem;
        line-height:0.4rem;
        background:url("../assets/homePage/icon_Heart.png") no-repeat 0.2rem center;
        background-size:0.28rem 0.23rem;
        padding-left:0.6rem;
        font-size:0.24rem;
        color:#333333;
        margin-bottom:0.1rem;
        font-weight:400;
    }
    .shortcutGameBox{
        width:6.9rem;
        height:1.6rem;
        background:url("../assets/homePage/bg_ShortcutGame.png") no-repeat;
        background-size:100% 100%;
        margin-bottom:0.2rem;
        flex-shrink:0;
        display:flex;
        align-items:center;
        padding:0 0.5rem;
        border-radius:0.12rem;
        box-shadow:0 0.01rem 0.05rem rgba(0,27,97,0.8);
        overflow:scroll;
    }
    .imgGame{
        width:1.2rem;
        height:1.2rem;
        margin-right:0.35rem;
        flex-shrink:0;
    }
</style>
