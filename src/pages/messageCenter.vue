<template>
    <div class="messageCenter">
        <div class="pageTitle">
            <img class="iconBack" src="../assets/activity/btn_Back.png" @click="back"/>
            <div class="textTitle">消息中心</div>
        </div>
        <div class="contentView">
            <div class="itemBox" @click="open('/systemNotice')">
                <img class="iconImg" src="../assets/mine/icon_Notice.png"/>
                <div class="count" v-text="messageData.notice.length"></div>
                <div class="item">
                    <div class="itemTitle">系统公告</div>
                    <div class="itemTitleCount">
                        <span class="itemContent animated" v-text="messageData.notice[noticeIndex].title"></span>
                        <span class="time" v-text="messageData.notice[noticeIndex].time.slice(0,10)"></span>
                    </div>
                </div>
            </div>
            <div class="itemBox" @click="open('/messageList','未读消息')">
                <img class="iconImg" src="../assets/mine/icon_NewMessage.png"/>
                <div class="count" v-text="messageData.unread.length"></div>
                <div class="item">
                    <div class="itemTitle">未读消息</div>
                    <div class="itemTitleCount">
                        <span class="itemContent animated" v-text="messageData.unread[unreadIndex].title"></span>
                        <span class="time" v-text="messageData.unread[unreadIndex].time.slice(0,10)"></span>
                    </div>
                </div>
            </div>
            <div class="itemBox" @click="open('/messageList','已读消息')">
                <img class="iconImg" src="../assets/mine/icon_ReadMessage.png"/>
                <div class="item">
                    <div class="itemTitle">已读消息</div>
                    <div class="itemTitleCount" >
                        <span class="itemContent animated" v-text="messageData.read[readIndex].title"></span>
                        <span class="time" v-text="messageData.read[readIndex].time.slice(0,10)"></span>
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
                messageData:all.store.state.messageData,
                noticeIndex:0,
                readIndex:0,
                unreadIndex:0,
                change:true
            }
        },
        methods:{
            open(path,title){all.router.push(path);if(path==='/messageList')all.tool.setStore("messageTitle",title)},
            back(){all.router.go(-1)}
        },
        created() {
            setInterval(()=>{
                this.noticeIndex<this.messageData.notice.length-1?this.noticeIndex+=1:this.noticeIndex=0;
                this.unreadIndex<this.messageData.unread.length-1?this.unreadIndex+=1:this.unreadIndex=0;
                this.readIndex<this.messageData.read.length-1?this.readIndex+=1:this.readIndex=0;
            },5000)
        }
    }
</script>

<style scoped>
    .messageCenter{
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
    }
    .itemTitleCount{
        height:0.54rem;
        background:#eeeeee;
        border-radius:0.08rem;
        padding:0 0.2rem;
        line-height:0.54rem;
        font-size:0.2rem;
        color:#999999;
        display:flex;
        justify-content:space-between;
        overflow:hidden;
    }
    .itemContent{
        width:4rem;
        height:0.54rem;
        background:#eeeeee;
        border-radius:0.08rem;
        line-height:0.54rem;
        font-size:0.2rem;
        color:#999999;
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap;
    }
    .count{
        width:0.3rem;
        height:0.3rem;
        border-radius:50%;
        background:red;
        color:#ffffff;
        font-size:0.24rem;
        display:flex;
        justify-content:center;
        align-items:center;
        position:absolute;
        top:0.15rem;
        left:1.11rem;
    }
</style>
