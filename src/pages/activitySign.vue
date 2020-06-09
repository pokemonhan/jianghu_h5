<template>
    <div class="activitySign">
        <div class="pageTitle">
            <div class="iconBack" @click="back"></div>
            <div class="textTitle" v-text="title">活动详情</div>
        </div>
        <div class="contentView">
            <div class="signBox">
                <div class="dayText"><b>已连续签到</b><b class="dayCount" v-text="day"></b><b>天</b></div>
                <div class="textTip" v-text="'连续签到'+continueDay+'天即可享受惊喜大礼包'"></div>
                <div class="lineBox">
                    <div class="lineBg">
                        <div class="lineWidth" :style="{width:day/continueDay*6+'rem'}"></div>
                    </div>
                    <div class="startPoint" :style="{left:day/continueDay*6+'rem'}"></div>
                    <div class="endPoint"></div>
                </div>
                <div class="dayNumber">
                    <em class="dayStart">0天</em>
                    <em class="dayNow" :style="{left:day/continueDay*6+'rem',display:(day===0 || day===continueDay)?'none':'' }" v-text="day+'天'"></em>
                    <em class="dayEnd" v-text="continueDay+'天'"></em>
                </div>
                <div class="toDoSign">点击签到</div>
            </div>
            <div class="signBook">
                <div class="bookTitle">签到打卡记录</div>
                <div class="signBar">
                    <div class="signCard" v-for="(item,index) in dayList">
                        <img class="card" :src="index<day?cardBg[0]:cardBg[1]"/>
                        <div class="cardText" :class="{noSignText:index>=day}"  v-text="item"></div>
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
                title:null,
                day:0,
                continueDay:10,
                pointLeft:null,
                cardBg:[
                    require("../assets/activity/bg_AlreadySign.png"),
                    require("../assets/activity/bg_NoSign.png"),
                ],
                dayList:[
                    "第一天","第二天","第三天","第四天","第五天","第六天","第七天",
                    "第八天","第九天","第十天","第十一天","第十二天","第十三天","第十四天"
                ]
            }
        },
        methods:{
            open(path){all.router.push(path)},
            back(){all.router.go(-1)}
        },
        created() {
            this.title=all.tool.getStore("activityDetailTitle");
        }
    }
</script>

<style scoped>
    .activitySign{
        display:flex;
        flex-direction:column;
        background:#efefef;
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
        flex:1;
        display:flex;
        flex-direction:column;
        align-items:center;
        overflow:scroll;
        background:url("../assets/activity/bg_Sign.png") no-repeat left top;
        background-size:100% auto;
    }
    .signBox{
        width:6.9rem;
        height:4.2rem;
        border-radius:0.08rem;
        background:#ffffff;
        margin-top:3.6rem;
        display:flex;
        flex-direction:column;
        align-items:center;
        padding-top:0.45rem;
    }
    .dayText{
        font-size:0.34rem;
    }
    .dayCount{
        color:#1d7ef0;
        margin:0 0.1rem;
    }
    .textTip{
        font-size:0.18rem;
        color:#7f7f7f;
        margin:0.15rem 0 0.6rem;
    }
    .lineBox{
        width:6rem;
        height:0.32rem;
        position:relative;
        display:flex;
        align-items:center;
    }
    .lineBg{
        width:6rem;
        height:0.12rem;
        background:#e4efff;
        border-radius:0.06rem;
        flex:1;
        overflow:hidden;
    }
    .lineWidth{
        width:3rem;
        height:0.12rem;
        background:#1d7ef0;
    }
    .startPoint{
        width:0.32rem;
        height:0.32rem;
        background:#ffffff;
        border:0.13rem solid #1d7ef0;
        border-radius:50%;
        position:absolute;
        z-index:1;
        margin-left:-0.16rem;
    }
    .endPoint{
        width:0.32rem;
        height:0.32rem;
        background:#ffffff;
        border:0.13rem solid #e4efff;
        border-radius:50%;
        position:absolute;
        right:-0.16rem;
    }
    .dayNumber{
        width:6rem;
        font-size:0.18rem;
        color:#7f7f7f;
        margin-top:-0.64rem;
        position:relative;
    }
    .dayStart{
        position:absolute;
        left:-0.16rem;
    }
    .dayEnd{
        position:absolute;
        right:-0.16rem;
    }
    .dayNow{
        position:absolute;
        top:0.75rem;
        color:#1d7ef0;
        font-weight:bold;
        margin-left:-0.16rem;
    }
    .toDoSign{
        width:4.4rem;
        height:0.7rem;
        border-radius:0.35rem;
        background:#1d7ef0;
        color:#ffffff;
        font-size:0.3rem;
        font-weight:bold;
        display:flex;
        justify-content:center;
        align-items:center;
        margin-top:1.4rem;
        box-shadow:0 0.1rem 0.2rem rgba(90,167,255,0.5);
    }
    .bookTitle{
        font-size:0.3rem;
        font-weight:bold;
        color:#3f3f3f;
        margin:0.3rem 0 0.5rem;
        text-align:center;
    }
    .signBar{
        display:flex;
        width:6.9rem;
        flex-wrap:wrap;
        justify-content:space-between;
    }
    .signCard{
        width:0.88rem;
        height:1.12rem;
        position:relative;
        border-radius:0.08rem;
        overflow:hidden;
        margin-bottom:0.5rem;
    }
    .card{
        width:0.88rem;
        height:1.12rem;
    }
    .cardText{
        position:absolute;
        top:0;
        left:0;
        font-size:0.18rem;
        color:#ffffff;
        width:0.88rem;
        height:0.38rem;
        background:#1d7ef0;
        display:flex;
        justify-content:center;
        align-items:center;
    }
    .noSignText{
        background:#5aa7ff
    }
</style>
