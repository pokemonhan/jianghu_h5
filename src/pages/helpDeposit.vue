<template>
    <div class="activityDetail">
        <div class="pageTitle">
            <img class="iconBack" src="../assets/activity/btn_Back.png" @click="back"/>
            <div class="textTitle">存取帮助</div>
        </div>
        <div class="contentView">
            <div class="stepText" v-for="item in promoted">
                <div class="stepTitle" v-text="item.title"></div>
                <div class="stepContent" v-text="item.content"></div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                promoted:[
                    {title:"1.取款有什么要求？",content:"游戏主界面，点击“取款”就能查看您当前可取款的额度，若是没有完成打码量就行取是回被扣除费用的，扣除的具体费用可联系客服咨询；最低提款额度为100元，单笔提现高达50000万。通过审核后即可到账。"},
                    {title:"2.充值有什么要求？",content:"充值通道有在线充值和官方入款充值渠道，最低充值金额10元，使用线下充值时资金到账时间大约在5~10分钟。"},
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
        align-items:flex-start;
        overflow:scroll;
        padding-top:0.3rem;
    }
    .stepText{
        width:6.9rem;
        margin-bottom:0.3rem;
        border-radius:0.1rem;
        background:#ffffff;
        font-size:0.2rem;
        color:#999999;
        padding:0.3rem 0.2rem;
    }
    .stepTitle{
        font-size:0.24rem;
        color:#666666;
        font-weight:400;
    }
    .stepContent{
        padding:0.1rem;
        line-height:0.35rem;
        text-indent:2em;
    }

</style>
