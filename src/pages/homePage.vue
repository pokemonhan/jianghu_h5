<template>
    <div class="homePage">
        <div class="contentView">
            <div class="bannerBox">
                <img class="banner" src="../assets/homePage/banner_A.jpg"/>
                <!--<img class="banner" src="../assets/homePage/banner_B.jpg"/>
                <img class="banner" src="../assets/homePage/banner_C.jpg"/>
                <img class="banner" src="../assets/homePage/banner_D.jpg"/>-->
            </div>
            <div class="noticeBox">
                <img class="noticeIcon" src="../assets/homePage/icon_Notice.png"/>
                <marquee class="noticeText" align="left" behavior="scroll" direction="left" scrollamount="5" scrolldelay="100">
                    恭喜玩家 “江湖王者”在飞禽走兽中一掷1000金币，成功登上本周单次下注榜首...
                </marquee>
            </div>
            <div class="infoBox">
                <img class="infoBg" src="../assets/homePage/bg_Info.png"/>
                <div class="infoContent">
                    <img class="infoLogo" src="../assets/homePage/icon_Logo.png"/>
                    <div class="infoContentBar">
                        <img class="infoContentBg" src="../assets/homePage/bg_InfoContent.png"/>
                        <div class="infoDetail">
                            <img class="userImage" src="../assets/homePage/userImage.png"/>
                            <div class="name" @click="open('/login')">未登陆...</div>
                            <div class="amount">
                                <span class="amountText">余额：0.0</span>
                            </div>
                            <img class="service" src="../assets/homePage/icon_Service.png"/>
                            <img class="activity" src="../assets/homePage/icon_Activity.png"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gameBox">
                <div class="gameItem" @click="open('/gameList')">
                    <img class="gameBg" src="../assets/homePage/bg_HotGame.png"/>
                    <div class="itemBar">
                        <img class="itemTitle" src="../assets/homePage/text_HotGame.png"/>
                        <span class="itemText">最热门的都在这里</span>
                        <img class="iconHotGame" src="../assets/homePage/icon_HotGame.png"/>
                    </div>
                </div>
                <div class="gameItem">
                    <img class="gameBg" src="../assets/homePage/bg_TigerGame.png"/>
                    <div class="itemBar">
                        <img class="itemTitle" src="../assets/homePage/text_TigerGame.png"/>
                        <span class="itemText">各种电子游戏应有尽有</span>
                        <img class="iconTigerGame" src="../assets/homePage/icon_TigerGame.png"/>
                    </div>
                </div>
                <div class="gameItem">
                    <img class="gameBg" src="../assets/homePage/bg_TrueMan.png"/>
                    <div class="itemBar">
                        <img class="itemTitle" src="../assets/homePage/text_TrueMan.png"/>
                        <span class="itemText">美女在线陪玩</span>
                        <img class="iconTrueMan" src="../assets/homePage/icon_TrueMan.png"/>
                    </div>
                </div>
                <div class="gameItem">
                    <img class="gameBg" src="../assets/homePage/bg_GuessGame.png"/>
                    <div class="itemBar">
                        <img class="itemTitle" src="../assets/homePage/text_GuessGame.png"/>
                        <span class="itemText">赚现金 赢大奖</span>
                        <img class="iconGuessGame" src="../assets/homePage/icon_GuessGame.png"/>
                    </div>
                </div>
                <div class="gameItem">
                    <img class="gameBg" src="../assets/homePage/bg_ChessGame.png"/>
                    <div class="itemBar">
                        <img class="itemTitle" src="../assets/homePage/text_ChessGame.png"/>
                        <span class="itemText">快来大展身手吧</span>
                        <img class="iconChessGame" src="../assets/homePage/icon_ChessGame.png"/>
                    </div>
                </div>
                <div class="gameItem">
                    <img class="gameBg" src="../assets/homePage/bg_Athletics.png"/>
                    <div class="itemBar">
                        <img class="itemTitle" src="../assets/homePage/text_Athletics.png"/>
                        <span class="itemText">体育电子竞技游戏</span>
                        <img class="iconAthletics" src="../assets/homePage/icon_Athletics.png"/>
                    </div>
                </div>
            </div>
            <div class="commonBox">
                <div class="commonTitle"></div>
                <div class="commonGame">
                    <div class="commonItem">
                        <img class="itemIcon" src="../assets/homePage/icon_GameA.png"/>
                    </div>
                    <div class="commonItem">
                        <img class="itemIcon" src="../assets/homePage/icon_GameB.png"/>
                    </div>
                    <div class="commonItem">
                        <img class="itemIcon" src="../assets/homePage/icon_GameC.png"/>
                    </div>
                    <div class="commonItem">
                        <img class="itemIcon" src="../assets/homePage/icon_GameD.png"/>
                    </div>
                    <div class="commonItem">
                        <img class="itemIcon" src="../assets/homePage/icon_GameE.png"/>
                    </div>
                    <div class="commonItem">
                        <img class="itemIcon" src="../assets/homePage/icon_GameF.png"/>
                    </div>
                </div>
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

            }
        },
        methods:{
            open(path){all.router.push(path)},
        }
    }
</script>

<style scoped>
    .homePage{
        background:#eeeeee;
        display:flex;
        flex-direction:column;
        justify-content:space-between;
    }
    .contentView{
        margin:0 0.25rem;
        flex:1;
        overflow:scroll;
    }
    .bannerBox{
        padding-top:0.15rem;
    }
    .banner{
        width:100%;
        height:auto;
    }
    .noticeBox{
        height:0.5rem;
        display:flex;
        align-items:center;
    }
    .noticeIcon{
        width:0.44rem;
        height:0.32rem;
    }
    .noticeText{
        font-size:0.2rem;
        font-weight:bold;
        margin-left:0.1rem;
        color:#727269
    }
    .infoBox{
        position:relative;
    }
    .infoBg{
        width:100%;
        height:auto;
    }
    .infoContent{
        position:absolute;
        top:0;
        left:0;
        width:100%;
        height:100%;
        display:flex;
        flex-direction:column;
        align-items:center;
        justify-content:center;
    }
    .infoLogo{
        width:16.4%;
        height:auto;
    }
    .infoContentBar{
        width:100%;
        padding:0 0.1rem;
        position:relative;
    }
    .infoContentBg{
        width:100%;
        height:auto;
    }
    .infoDetail{
        position:absolute;
        top:0;
        left:0;
        width:100%;
        height:100%;
        display:flex;
        align-items:center;
        justify-content:space-between;
        font-size:0.2rem;
        color:#f4a083;
        padding:0 0.55rem;
    }
    .userImage{
        width:0.91rem;
        height:0.91rem;
    }
    .name{
        background:linear-gradient(to bottom,#f4a083,#ce606b);
        -webkit-background-clip:text;
        color:transparent;
        opacity:0.8;
        margin-top:-0.2rem;
        margin-left:-0.25rem
    }
    .amountText{
        background:linear-gradient(to bottom,#f4a083,#ce606b);
        -webkit-background-clip:text;
        color:transparent;
        opacity:0.8;
        font-weight:bold;
    }
    .amount{
        width:2.13rem;
        height:0.38rem;
        background:url("../assets/homePage/bg_Amout.png") no-repeat;
        background-size:100% 100%;
        display:flex;
        align-items:center;
        padding-left:0.45rem;
        margin-top:-0.2rem;
    }
    .service,.activity{
        height:0.55rem;
        width:auto;
    }
    .gameBox{
        display:flex;
        justify-content:space-between;
        flex-wrap:wrap;
        margin-top:0.2rem;
    }
    .gameItem{
        width:50%;
        margin-bottom:0.14rem;
        position:relative;
    }
    .gameItem:nth-child(odd){
        padding-right:0.1rem;
    }
    .gameItem:nth-child(even){
        padding-left:0.1rem;
    }
    .gameBg{
        width:100%;
        height:auto;
    }
    .itemBar{
        position:absolute;
        left:0;
        top:0;
        width:100%;
        height:100%;
    }
    .itemTitle{
        height:0.34rem;
        width:auto;
        margin-top:0.3rem;
        margin-left:0.2rem;
    }
    .gameItem:nth-child(even) .itemTitle{
        margin-left:0.3rem;
    }
    .itemText{
        color:#ffffff;
        font-size:0.2rem;
        position:absolute;
        left:0.2rem;
        top:0.75rem;
    }
    .gameItem:nth-child(even) .itemText{
        left:0.3rem;
    }
    .iconHotGame{
        width:1.15rem;
        height:auto;
        position:absolute;
        bottom:0.25rem;
        right:0.05rem;
    }
    .iconTigerGame{
        width:0.86rem;
        height:auto;
        position:absolute;
        bottom:0.2rem;
        right:0.15rem;
    }
    .iconTrueMan{
        width:0.71rem;
        height:auto;
        position:absolute;
        bottom:0.11rem;
        right:0.4rem;
    }
    .iconGuessGame{
        width:1.14rem;
        height:auto;
        position:absolute;
        bottom:0.11rem;
        right:0.03rem;
    }
    .iconChessGame{
        width:0.95rem;
        height:auto;
        position:absolute;
        bottom:0.35rem;
        right:0.25rem;
    }
    .iconAthletics{
        width:1.35rem;
        height:auto;
        position:absolute;
        bottom:0.25rem;
        right:0.1rem;
    }
    .commonBox{
        margin-bottom:0.3rem;
        width:7rem;
        height:1.4rem;
        background:url("../assets/homePage/bg_CommonGame.png") no-repeat;
        background-size:100% 100%;
        display:flex;
        align-items:center;
        padding:0.1rem;
    }
    .commonTitle{
        width:0.4rem;
        height:1.2rem;
        background:url("../assets/homePage/text_CommonTitle.png") no-repeat center center #d36774;
        background-size:0.28rem 1.04rem;
    }
    .commonGame{
        flex:1;
        height:1.2rem;
        display:flex;
        overflow-x:scroll;
        overflow-y:hidden;
    }
    .commonItem{
        width:1.4rem;
        height:1.4rem;
        margin-top:-0.1rem;
        background:url("../assets/homePage/bg_Game.png") no-repeat;
        background-size:100% 100%;
        padding:0.1rem;
        margin-left:0.15rem;
    }
    .itemIcon{
        width:auto;
        height:100%;
    }
</style>
