<template>
    <div class="activityDetail">
        <div class="pageTitle">
            <img class="iconBack" src="../assets/activity/btn_Back.png" @click="back"/>
            <div class="textTitle" v-text="activityDetail.title">活动详情</div>
        </div>
        <div class="contentView">
            <div class="detail">
                <img class="imgContent" :src="activityDetail.imgContent"/>
                <div class="btnTodo" @click="open(activityPath[activityDetail.title])"></div>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                activityDetail:null,
                activityPath:{
                    "有奖竞猜":"/",
                    "幸运轮盘":"/",
                    "每日签到":"/activitySign",
                    "抢红包":"/",
                    "推广返佣":"/promote",
                    "注册有礼":"/register",
                    "首充赠金":"/reCharge"

                }
            }
        },
        methods:{
            open(path){
                all.tool.setStore("activityDetailTitle",this.activityDetail.title);
                all.router.push(path)
            },
            back(){all.router.go(-1)}
        },
        created() {
            this.activityDetail=all.tool.getStore("activityDetail")
        }
    }
</script>

<style scoped>
    .activityDetail{
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
        padding-top:0.45rem;
    }
    .detail{
        width:6.9rem;
        position:relative;
        margin-bottom:0.3rem;
    }
    .imgContent{
        width:100%;
        height:auto;
    }
    .btnTodo{
        width:5.7rem;
        height:0.56rem;
        position:absolute;
        left:0.6rem;
        bottom:0.45rem;
    }

</style>
