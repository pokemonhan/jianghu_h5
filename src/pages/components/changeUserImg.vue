<template>
    <div class="changeUserImg">
        <div class="changeBox animated fadeInDown faster">
            <img class="bgLogin" src="../../assets/login/bg_Login.png"/>
            <img class="iconClose" @click="toDoClose" src="../../assets/mine/icon_Close.png"/>
            <span class="changeTitle">选择头像</span>
            <div class="changeBar">
                <img class="userImg" :class="{choose:chooseIndex===index}" @click="choosePic(index)" v-for="(item,index) in imgList" :src="item.img"/>
            </div>
            <div class="commit" @click="toDoCommit">确定</div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                chooseIndex:all.tool.getStore("userImgIndex") || 0,
                imgList:[
                    {img:require("../../assets/mine/img_UserA.png")},
                    {img:require("../../assets/mine/img_UserB.png")},
                    {img:require("../../assets/mine/img_UserC.png")},
                    {img:require("../../assets/mine/img_UserD.png")},
                    {img:require("../../assets/mine/img_UserE.png")},
                    {img:require("../../assets/mine/img_UserF.png")},
                    {img:require("../../assets/mine/img_UserG.png")},
                    {img:require("../../assets/mine/img_UserH.png")},
                    {img:require("../../assets/mine/img_UserI.png")},
                    {img:require("../../assets/mine/img_UserJ.png")},
                    {img:require("../../assets/mine/img_UserK.png")},
                    {img:require("../../assets/mine/img_UserL.png")},
                    {img:require("../../assets/mine/img_UserM.png")},
                    {img:require("../../assets/mine/img_UserN.png")},
                    {img:require("../../assets/mine/img_UserO.png")},
                    {img:require("../../assets/mine/img_UserP.png")},
                ]
            }
        },
        methods:{
            toDoClose(){
                all.$(".changeBox").addClass("zoomOut");
                setTimeout(()=>{all.store.commit("isShowChangeUserImg",false)},150)
            },
            choosePic(index){
                this.chooseIndex=index
            },
            toDoCommit(index){
                this.toDoClose();
                all.tool.setStore("userImgIndex",this.chooseIndex);
                all.store.commit("userPicture",this.imgList[this.chooseIndex].img)
            },
        }
    }
</script>

<style scoped>
    .changeUserImg{
        width:100%;
        height:100%;
        position:absolute;
        left:0;
        top:0;
        background:rgba(0,0,0,0.5);
        display:flex;
        justify-content:center;
        align-items:center;
        font-size:0.24rem;
        color:#7f7f7f;
        z-index:10;
    }
    .changeBox{
        width:6.9rem;
        height:8.6rem;
        border-radius:0.08rem;
        background:#20a6f9;
        position:relative;
        display:flex;
        flex-direction:column;
        align-items:center;
    }
    .bgLogin{
        width:6.9rem;
        height:auto;
        position:absolute;
        top:0;
        left:0;
    }
    .iconClose{
        width:0.25rem;
        height:0.25rem;
        position:absolute;
        right:0.28rem;
        top:0.28rem;
    }
    .changeTitle{
        font-size:0.36rem;
        font-weight:400;
        line-height:0.36rem;
        color:#ffffff;
        width:1.46rem;
        height:0.4rem;
        margin:0.2rem 0
    }
    .changeBar{
        width:6.5rem;
        height:6.5rem;
        border-radius:0.08rem;
        background:#ffffff;
        padding:0.25rem;
        overflow:scroll;
    }
    .userImg{
        width:1.3rem;
        height:1.3rem;
        margin:0.1rem;
    }
    .choose{
        border-radius:0.15rem;
        border:0.02rem solid #1f80f1;
        box-shadow:0 0.03rem 0.05rem rgba(31,128,241,0.8);
    }
    .commit{
        font-size:0.34rem;
        color:#ffffff;
        width:4.8rem;
        height:0.7rem;
        border-radius:0.08rem;
        background:url("../../assets/login/bg_Commit.png") no-repeat;
        background-size:100% 100%;
        display:flex;
        justify-content:center;
        align-items:center;
        margin-top:0.3rem;
        box-shadow:0 0.01rem 0.03rem rgba(0,27,97,0.5);
    }
</style>