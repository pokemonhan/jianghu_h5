<template>
    <div class="gameFrame">
        <div class="pageTitle" v-if="!this.$store.state.isHorizontal">
            <div class="iconBack" @click="back"></div>
            <div class="textTitle" v-text="gameTitle"></div>
        </div>
        <div class="contentView">
            <iframe class="iframe" :src="gameUrl" frameborder="0"></iframe>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                gameTitle:null,
                gameUrl:null
            }
        },
        methods:{
            open(path){
                all.router.push(path)
            },
            back(){all.router.go(-1)},
        },
        created() {
            this.gameTitle=all.tool.getStore("gameFrameTitle");
            this.gameUrl=all.tool.getStore("gameFrameUrl");
        }
    }
</script>

<style scoped>
    .gameFrame{
        display:flex;
        flex-direction:column;
        background:#eeeeee;
        position:relative;
        z-index:100000;
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
        overflow:scroll;
        flex:1;
    }
    .iframe{
        height:100%;
        width:100%;
    }


</style>
