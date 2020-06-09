<template>
    <div class="systemNotice">
        <div class="pageTitle">
            <div class="iconBack" @click="back"></div>
            <div class="textTitle">系统公告</div>
        </div>
        <div class="contentView">
            <div class="itemBox" v-for="item in noticeList" @click="showDetailBox(item)">
                <img class="iconImg" src="../assets/mine/icon_Notice.png"/>
                <div class="new" v-if="item.isRead"></div>
                <div class="item">
                    <div class="itemTitle">
                        <span v-text="item.title"></span>
                        <span class="itemTime" v-text="item.time"></span>
                    </div>
                    <div class="itemContent" v-text="item.content"></div>
                </div>
            </div>
        </div>
        <div class="detailBox" v-if="isShowDetailBox">
            <div class="detailWin">
                <div class="detailTitle">
                    <span v-text="detailItem.title"></span>
                    <img class="iconClose" src="../assets/mine/icon_Close.png" @click="hideDetailBox"/>
                </div>
                <div class="detailContent" v-text="detailItem.content"></div>
                <div class="detailTime" v-text="'时间：'+detailItem.time"></div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                noticeList:all.store.state.messageData.notice,
                isShowDetailBox:false,
                detailItem:null
            }
        },
        methods:{
            open(path){all.router.push(path)},
            back(){all.router.go(-1)},
            showDetailBox(item){
                this.detailItem=item;
                this.isShowDetailBox=true
            },
            hideDetailBox(){this.isShowDetailBox=false}
        },
    }
</script>

<style scoped>
    .systemNotice{
        display:flex;
        flex-direction:column;
        background:#ffffff;
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
        padding-top:0.1rem;
        flex:1;
        display:flex;
        flex-direction:column;
        align-items:center;
        overflow:scroll;
    }
    .itemBox{
        width:100%;
        height:1.56rem;
        padding:0 0.3rem;
        display:flex;
        align-items:center;
        font-size:0.24rem;
        color:#666666;
        border-bottom:0.01rem solid #eeeeee;
        position:relative;
        flex-shrink:0;
    }
    .iconImg{
        width:0.96rem;
        height:0.96rem;
        margin-right:0.15rem;
    }
    .item{
        display:flex;
        flex-direction:column;
        flex:1;
    }
    .itemTitle{
        line-height:0.42rem;
        font-weight:400;
        display:flex;
        justify-content:space-between;
    }
    .itemTime{
        font-size:0.2rem;
        color:#999999;
        font-weight:normal;
    }
    .itemContent{
        width:5.79rem;
        height:0.54rem;
        background:#eeeeee;
        border-radius:0.08rem;
        padding-right:2em;
        line-height:0.54rem;
        font-size:0.2rem;
        color:#999999;
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap;
        text-indent:2em;
    }
    .new{
        width:0.2rem;
        height:0.2rem;
        border-radius:50%;
        background:red;
        position:absolute;
        top:0.2rem;
        left:1.16rem;
    }
    .detailBox{
        width:100%;
        height:100%;
        background:rgba(0,0,0,0.5);
        position:absolute;
        z-index:3;
        font-size:0.24rem;
        color:#7f7f7f;
        display:flex;
        justify-content:center;
        align-items:center;
        overflow:scroll;
    }
    @media screen and (orientation: landscape){.detailBox{align-items:flex-start}}
    .detailWin{
        width:6.9rem;
        height:8.73rem;
        background:url("../assets/mine/bg_NoticeDetail.png") no-repeat;
        background-size:100% 100%;
        color:#ffffff;
        margin:1rem 0;
        position:relative;
        display:flex;
        align-items:center;
        flex-direction:column;
    }
    .detailTitle{
        font-size:0.32rem;
        font-weight:400;
        width:100%;
        height:1rem;
        display:flex;
        align-items:center;
        justify-content:center;
        position:relative;
    }
    .iconClose{
        width:0.25rem;
        height:0.25rem;
        position:absolute;
        right:0.3rem;
    }
    .detailContent{
        width:5.8rem;
        height:6rem;
        font-size:0.22rem;
        line-height:0.4rem;
        margin-top:0.5rem;
        color:#333333;
        display:flex;
        align-items:center;
        text-indent:2em;
        overflow:scroll;
    }
    .detailTime{
        width:5.8rem;
        text-align:right;
        color:#333333;
        font-weight:400;
    }
</style>
