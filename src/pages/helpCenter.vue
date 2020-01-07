<template>
    <div class="helpCenter">
        <div class="pageTitle">
            <img class="iconBack" src="../assets/activity/btn_Back.png" @click="back"/>
            <div class="textTitle">帮助中心</div>
        </div>
        <div class="contentView">
            <div class="helpItem" v-for="item in helpItem" v-text="item.title" @click="open(item.path)"></div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                helpItem:[
                    {title:"1.APP安装教程",path:"/helpApp"},
                    {title:"2.推广帮助",path:"/helpPromote"},
                    {title:"3.存取帮助",path:"/helpDeposit"},
                ]
            }
        },
        methods:{
            open(path){all.router.push(path)},
            back(){all.router.go(-1)}
        },
    }
</script>

<style scoped>
    .helpCenter{
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
        padding-top:0.3rem;
    }
    .helpItem{
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

</style>
