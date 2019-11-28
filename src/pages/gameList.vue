<template>
    <div class="gameList">
        <div class="pageTitle">
            <img class="iconBack" src="../assets/gameList/icon_Back.png" @click="back"/>
            <img class="textTitle" src="../assets/gameList/text_PageTitle.png"/>
        </div>
        <div class="contentView">
            <div class="gameMenu">
                <img class="imgMenu" src="../assets/gameList/img_GameMenu1.png"/>
                <img class="imgMenu" src="../assets/gameList/img_GameMenu2.png"/>
                <img class="imgMenu" src="../assets/gameList/img_GameMenu3.png"/>
                <img class="imgMenu" src="../assets/gameList/img_GameMenu4.png"/>
                <img class="imgMenu" src="../assets/gameList/img_GameMenu5.png"/>
                <img class="imgMenu" src="../assets/gameList/img_GameMenu6.png"/>
                <img class="imgMenu" src="../assets/gameList/img_GameMenu7.png"/>
                <img class="imgMenu" src="../assets/gameList/img_GameMenu8.png"/>
                <img class="imgMenu" src="../assets/gameList/img_GameMenu9.png"/>
                <img class="imgMenu" src="../assets/gameList/img_GameMenu10.png"/>
                <img class="imgMenu" src="../assets/gameList/img_GameMenu11.png"/>
                <img class="imgMenu" src="../assets/gameList/img_GameMenu12.png"/>
            </div>
            <div class="gameContent">
                <img class="gameTitle" src="../assets/gameList/text_GameTitle.png"/>
                <div class="gameBox">
                    <div class="scrollView">
                        <div class="gameItem">
                            <img class="itemIcon" src="../assets/homePage/icon_GameA.png"/>
                        </div>
                        <div class="gameItem">
                            <img class="itemIcon" src="../assets/homePage/icon_GameB.png"/>
                        </div>
                        <div class="gameItem">
                            <img class="itemIcon" src="../assets/homePage/icon_GameC.png"/>
                        </div>
                        <div class="gameItem">
                            <img class="itemIcon" src="../assets/homePage/icon_GameD.png"/>
                        </div>
                        <div class="gameItem">
                            <img class="itemIcon" src="../assets/homePage/icon_GameE.png"/>
                        </div>
                        <div class="gameItem">
                            <img class="itemIcon" src="../assets/homePage/icon_GameF.png"/>
                        </div>
                        <div class="gameItem">
                            <img class="itemIcon" src="../assets/homePage/icon_GameH.png"/>
                        </div>
                        <div class="gameItem">
                            <img class="itemIcon" src="../assets/homePage/icon_GameI.png"/>
                        </div>
                        <div class="gameItem">
                            <img class="itemIcon" src="../assets/homePage/icon_GameJ.png"/>
                        </div>
                        <div class="gameItem">
                            <img class="itemIcon" src="../assets/homePage/icon_GameK.png"/>
                        </div>
                        <div class="gameItem">
                            <img class="itemIcon" src="../assets/homePage/icon_GameL.png"/>
                        </div>
                        <div class="gameItem">
                            <img class="itemIcon" src="../assets/homePage/icon_GameJ.png"/>
                        </div>
                        <div class="gameItem">
                            <img class="itemIcon" src="../assets/homePage/icon_GameK.png"/>
                        </div>
                        <div class="gameItem">
                            <img class="itemIcon" src="../assets/homePage/icon_GameL.png"/>
                        </div>
                    </div>
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
            back(){all.router.go(-1)}
        }
    }
</script>

<style scoped>
    .gameList{
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
    .contentView{
        flex:1;
        overflow:scroll;
    }
    .gameMenu{
        margin:0.25rem 0.2rem 0.15rem;
        display:flex;
        justify-content:space-between;
        flex-wrap:wrap;
    }
    .imgMenu{
        flex:1;
        height:0.76rem;
        margin:0.05rem;
    }
    .gameContent{
        margin:0 0.25rem 0.5rem;
        width:7rem;
        height:9rem;
        background:url("../assets/gameList/bg_GameContent.png") no-repeat;
        background-size:100% 100%;
        display:flex;
        flex-direction:column;
        align-items:center;
    }
    .gameTitle{
        height:0.26rem;
        width:1.03rem;
        margin:0.2rem 0 0.1rem;
    }
    .gameBox{
        width:6.6rem;
        height:8.1rem;
        background:url("../assets/gameList/bg_GameBox.png") no-repeat;
        background-size:100% 100%;
        display:flex;
        justify-content:center;
        padding:0.055rem 0;
     }
    .scrollView{
        width:5.7rem;
        display:flex;
        flex-wrap:wrap;
        overflow:scroll;
    }
    .gameItem{
        width:1.6rem;
        height:1.6rem;
        background:url("../assets/homePage/bg_Game.png") no-repeat;
        background-size:100% 100%;
        padding:0.15rem;
        margin:0.15rem;
        display:flex;
        align-items:center;
        justify-content:center;
    }
    .itemIcon{
        width:100%;
        height:auto;
    }

</style>
