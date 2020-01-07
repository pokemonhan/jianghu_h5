<template>
    <div class="onlineService">
        <div class="pageTitle">
            <img class="iconBack" src="../assets/activity/btn_Back.png" @click="back"/>
            <div class="textTitle">在线客服</div>
        </div>
        <div class="contentView">

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
            open(path){all.router.push(path)},
            back(){all.router.go(-1)},
        },
    }
</script>

<style scoped>
    .onlineService{
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
        width:0.18rem;
        height:0.34rem;
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


</style>
