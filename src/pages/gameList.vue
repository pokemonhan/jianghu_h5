<template>
    <div class="gameList">
        <div class="pageTitle">
            <div class="iconBack"  @click="back"></div>
            <div class="textTitle" v-text="gameTitle">活动详情</div>
        </div>
        <div class="contentView">
            <div class="gameBox">
                <div class="menuBar">
                    <div class="gameType" :class="{choose:index===gameIndex}" @click="chooseType(index,item.sub_type_id)" v-for="(item,index) in gameClass.sub_type" v-text="item.sub_type_name">VR游戏</div>
                </div>
                <div class="gameBar">
                    <div class="gameItem" v-for="item in subGameList" @click="openGame(item)">
                        <img class="iconGame" :src="item.icon"/>
                        <div class="gameText" v-text="item.name"></div>
                    </div>
                </div>
            </div>
        </div>
        <setGamePassword v-if="this.$store.state.setGamePassword.isShow"/>
    </div>
</template>

<script>
    import setGamePassword from '../pages/components/setGamePassword'
    export default {
        components:{
            setGamePassword
        },
        data () {
            return {
                gameTitle:null,
                gameClass:null,
                gameDetailList:null,
                gameIndex:0,
                subTypeId:null,
                typeId:null,
                subGameList:null
            }
        },
        methods:{
            open(path){
                all.router.push(path)
            },
            back(){all.router.push("/")},
            chooseType(index,id){
               this.gameIndex=index;
               this.subTypeId=id;
               this.subGameList=this.gameDetailList[this.typeId][this.subTypeId];
            },
            openGame(item){
                all.tool.send("openGame"+item.url,null,res=>{
                   if(res.data.type===1){
                       all.tool.setStore("gameFrameTitle",item.name);
                       all.tool.setStore("gameFrameUrl",res.data.url);
                       all.router.push("/gameFrame")
                   }
                   if(res.data.type===2){
                       all.store.commit("setGamePassword",{isShow:true,registerUrl:res.data.url,item:item})
                   }
                });
            }
        },
        created() {
            this.gameClass=all.tool.getStore("gameClass");
            this.gameDetailList=all.tool.getStore("gameDetailList");
            this.gameTitle=this.gameClass.type_name;
            this.typeId=all.tool.getStore("gameClass").type_id;
            this.subTypeId=all.tool.getStore("gameClass").sub_type[0].sub_type_id;
            this.subGameList=all.tool.getStore("gameDetailList")[all.tool.getStore("gameClass").type_id][all.tool.getStore("gameClass").sub_type[0].sub_type_id];
        }
    }
</script>

<style scoped>
    .gameList{
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
        /*justify-content:center;*/
        overflow:scroll;
        padding-top:0.45rem;
    }
    .gameBox{
        width:6.9rem;
        height:10rem;
        padding:0.25rem 0.25rem 0.25rem 0;
        border-radius:0.1rem;
        background:#4c9dfd;
        display:flex;
        justify-content:space-between;
        align-items:flex-start;
    }
    .menuBar{
        width:1.65rem;
        height:9.5rem;
        padding-top:0.3rem;
    }
    .gameType{
        font-size:0.20rem;
        text-align:right;
        padding-right:0.1rem;
        line-height:0.6rem;
        color:#f9f9f9;
        height:0.6rem;
        margin-bottom:0.2rem;
    }
    .choose{
        color:#ffffff;
        font-size:0.24rem;
        border-bottom:0.02rem solid #ffffff;
        border-top:0.02rem solid #ffffff;
        font-weight:bold;
        box-shadow:0 0.1rem 0.15rem rgba(0,0,0,0.5);
    }
    .gameBar{
        width:5rem;
        height:9.5rem;
        background:#ffffff;
        padding:0.2rem 0 0 0.2rem;
        display:flex;
        flex-wrap: wrap;
        overflow:scroll;
        align-content:flex-start;
        border-radius:0.08rem;
    }
    .gameItem{
        width:1.4rem;
        height:1.75rem;
        margin-right:0.2rem;
        margin-bottom:0.2rem;
        border-radius:0.08rem;
        box-shadow:0 0.1rem 0.15rem rgba(90,167,255,0.5);
        position:relative;
        display:flex;
        flex-direction:column;
        justify-content:space-between;
        align-items:center;
    }
    .iconGame{
        width:1.4rem;
        height:auto;
    }
    .gameText{
        font-size:0.18rem;
        position:absolute;
        bottom:0.05rem;
        color:#5aa7ff;
    }

</style>
