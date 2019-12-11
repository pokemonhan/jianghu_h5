<template>
    <div class="activity">
        <div class="pageTitle">
            <img class="iconBack" src="../assets/activity/btn_Back.png" @click="back"/>
            <div class="textTitle" v-text="activityDetail.title">活动详情</div>
            <img class="iconService" src="../assets/homePage/icon_Service.png"/>
        </div>
        <div class="contentView">
            <div class="detail">
                <img class="imgContent" :src="activityDetail.imgContent"/>
                <div class="btnTodo"></div>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                activityDetail:null
            }
        },
        methods:{
            open(path){all.router.push(path)},
            back(){all.router.go(-1)}
        },
        created() {
            this.activityDetail=all.tool.getStore("activityDetail")
        }
    }
</script>

<style scoped>
    .activity{
        display:flex;
        flex-direction:column;
        justify-content:space-between;
    }
    .pageTitle{
        height:0.9rem;
        background:#1d7ef0;
        display:flex;
        align-items:center;
        justify-content:space-between;
        color:#fff;
        padding:0 0.3rem;
        flex-shrink:0;
    }
    .iconBack{
        width:0.18rem;
        height:0.34rem;
    }
    .textTitle{
        font-size:0.36rem;
        font-weight:400;
    }
    .iconService{
        width:0.45rem;
        height:auto;
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
        display:flex;
        justify-content:center;
        position:relative;
    }
    .imgContent{
        width:100%;
        height:auto
    }
    .btnTodo{
        width:5.7rem;
        height:0.56rem;
        position:absolute;
        bottom:0.45rem;
    }

</style>
