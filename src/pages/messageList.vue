<template>
    <div class="messageList">
        <div class="pageTitle">
            <div class="iconBack" @click="back"></div>
            <div class="textTitle" v-text="title"></div>
            <div class="btnDelete" v-if="messageList.length>0" @click="showDeleteWin('all')">全部删除</div>
        </div>
        <div class="contentView">
            <div class="itemBox" @click="showDetailWin(index)" v-for="(item,index) in messageList">
                <img v-if="title==='未读消息'" class="iconImg" src="../assets/mine/icon_NewMessage.png"/>
                <img v-if="title==='已读消息'" class="iconImg" src="../assets/mine/icon_ReadMessage.png"/>
                <div class="item">
                    <div class="itemTitle">
                        <span v-text="item.title"></span>
                        <span class="itemTime" v-text="item.time"></span>
                    </div>
                    <div class="itemContent" v-text="item.content"></div>
                    <img class="iconDelete" @click.stop="showDeleteWin(index)" src="../assets/mine/icon_Delete.png"/>
                </div>
            </div>
            <img class="noMessage" v-if="messageList.length===0" src="../assets/mine/img_NoMessage.png"/>
        </div>
        <div class="detailBox" v-if="isShowDetailBox">
            <div class="detailWin">
                <div class="detailTitle" v-text="messageList[deleteTarget].title"></div>
                <div class="detailInfo">
                    <span>发件人：江湖互娱官方</span>
                    <span v-text="messageList[deleteTarget].time.slice(0,10)"></span>
                </div>
                <div class="detailContent" v-text="messageList[deleteTarget].content"></div>
                <div class="detailBtnBar">
                    <div class="delete" @click="showDeleteWin(deleteTarget)">删除</div>
                    <div class="close" @click="hideDetailWin">关闭</div>
                </div>
            </div>
        </div>
        <div class="exitLoginBox" v-if="isShowDeleteBox">
            <div class="tipWin">
                <div class="tipText" v-text="deleteTarget==='all'?'是否删除全部邮件消息':'是否删除本条消息'"></div>
                <div class="btnBar">
                    <div class="cancel" @click="hideDeleteWin">取消</div>
                    <div class="sure" @click="deleteMessage">确定</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                isShowDeleteBox:false,
                isShowDetailBox:false,
                title:all.tool.getStore("messageTitle"),
                messageList:all.tool.getStore("messageTitle")==="未读消息"?all.store.state.messageData.unread:all.store.state.messageData.read,
                deleteTarget:null
            }
        },
        methods:{
            open(path){all.router.push(path)},
            back(){all.router.go(-1)},
            showDeleteWin(target){this.deleteTarget=target;this.isShowDeleteBox=true},
            hideDeleteWin(){this.isShowDeleteBox=false},
            deleteMessage(){
                this.hideDeleteWin();
                this.hideDetailWin();
                if(this.deleteTarget==="all"){this.messageList=[]}
                else {this.messageList.splice(this.deleteTarget,1)}
            },
            showDetailWin(target){this.deleteTarget=target;this.isShowDetailBox=true},
            hideDetailWin(){this.isShowDetailBox=false}
        },
    }
</script>

<style scoped>
    .messageList{
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
    .btnDelete{
        font-size:0.22rem;
        position:absolute;
        right:0.3rem;
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
    .noMessage{
        width:2.78rem;
        height:3.42rem;
        margin-top:0.8rem;
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
        position:relative;
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
    .iconDelete{
        width:0.26rem;
        height:0.25rem;
        position:absolute;
        bottom:0.15rem;
        right:0.2rem;
    }
    .itemContent{
        width:5.79rem;
        height:0.54rem;
        background:#eeeeee;
        border-radius:0.08rem;
        padding-right:4em;
        line-height:0.54rem;
        font-size:0.2rem;
        color:#999999;
        text-overflow:ellipsis;
        overflow:hidden;
        white-space:nowrap;
        text-indent:2em;
    }
    .exitLoginBox,.detailBox{
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
        height:9.12rem;
        background:url("../assets/mine/bg_MessageDetail.png") no-repeat;
        background-size:100% 100%;
        color:#ffffff;
        margin:1rem 0;
        position:relative;
        display:flex;
        justify-content:center;
        align-items:center;
    }
    .detailTitle{
        font-size:0.32rem;
        position:absolute;
        top:1rem;
        left:0.3rem;
        font-weight:400;
    }
    .detailInfo{
        font-size:0.2rem;
        display:flex;
        flex-direction:column;
        text-align:right;
        line-height:0.3rem;
        position:absolute;
        right:0.3rem;
        top:2.3rem;
    }
    .detailContent{
        width:5.8rem;
        height:3.8rem;
        font-size:0.22rem;
        line-height:0.4rem;
        color:#333333;
        text-indent:2em;
        position:absolute;
        top:3.8rem;
        overflow:scroll;
    }
    .detailBtnBar{
        width:5.32rem;
        display:flex;
        justify-content:space-between;
        position:absolute;
        bottom:0.4rem;
        font-size:0.36rem;
        font-weight:400;
        text-align:center;
        line-height:0.72rem;
    }
    .delete{
        width:2rem;
        height:0.72rem;
        border-radius:0.36rem;
        background:#e6e6e6;
        color:#999999;
        box-shadow:0 0.01rem 0.03rem rgba(0,27,97,0.5);
    }
    .close{
        width:2rem;
        height:0.72rem;
        border-radius:0.36rem;
        background:#1f80f1;
        color:#ffffff;
        box-shadow:0 0.01rem 0.03rem rgba(0,27,97,0.5);
    }
    .tipWin{
        width:5rem;
        height:2.2rem;
        border-radius:0.1rem;
        background:#ffffff;
    }
    .tipText{
        text-align:center;
        line-height:1.25rem;
        border-bottom:0.01rem solid #eeeeee;
        font-weight:400;
    }
    .btnBar{
        display:flex;
        height:0.95rem;
        font-size:0.3rem;
        font-weight:400;
        color:#1d7ef0;
    }
    .cancel{
        flex:1;
        display:flex;
        justify-content:center;
        align-items:center;
    }
    .sure{
        flex:1;
        display:flex;
        justify-content:center;
        align-items:center;
        border-left:0.01rem solid #eeeeee;
    }
</style>
