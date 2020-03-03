<template>
    <div class="myVip">
        <div class="pageTitle">
            <div class="textTitle">
                <img class="iconBack" src="../assets/activity/btn_Back.png" @click="back"/>
                <span>VIP特权</span>
            </div>
            <img class="circleC" src="../assets/mine/img_CircleC.png"/>
            <img class="circleA" src="../assets/mine/img_CircleA.png"/>1234
            <img class="circleB" src="../assets/mine/img_CircleB.png"/>
        </div>
        <div class="contentView">
            <div class="personalInfo">
                <div class="detail">
                    <img class="imgUser" :src="this.$store.state.userPicture"/>
                    <div class="nameId">
                        <div class="name" v-text="this.$store.state.nickName">两只小蜜蜂</div>
                        <div class="id" v-text="'ID：'+this.$store.state.guid">ID：189673</div>
                    </div>
                </div>
                <div class="vipBar">
                    <div class="vipName">vip0</div>
                    <div class="vipLine">
                        <div class="currentLine"></div>
                    </div>
                    <div class="vipName">vip1</div>
                </div>
                <div class="currentNumber">当前经验值：3000/10000</div>
            </div>
            <div class="levelBox">
                <div class="levelTurn" @click="prevLevel">
                    <img class="prevNext" v-if="levelIndex===0" src="../assets/myVip/icon_left.png"/>
                    <img class="prevNext" v-if="levelIndex>0" src="../assets/myVip/icon_leftLight.png"/>
                    <div class="levelText" :style="{color:levelIndex>0?'#333333':'#b6b6b6'}">上一等级</div>
                </div>
                <div class="levelIndex">
                    <img class="levelIcon" src="../assets/myVip/icon_Vip.png"/>
                    <div class="levelName" v-text="vipLevel[levelIndex].name"></div>
                </div>
                <div class="levelTurn" @click="nextLevel">
                    <div class="levelText" :style="{color:levelIndex<vipLevel.length-1?'#333333':'#b6b6b6'}">下一等级</div>
                    <img class="prevNext" v-if="levelIndex>=vipLevel.length-1" src="../assets/myVip/icon_Right.png"/>
                    <img class="prevNext" v-if="levelIndex<vipLevel.length-1" src="../assets/myVip/icon_RightLight.png"/>
                </div>
            </div>
            <div class="privilegeBox">
                <div class="privilegeItem">
                    <div class="title">
                        <img class="iconPromoted" src="../assets/myVip/icon_Promoted.png"/>
                        <div class="titleText">晋级奖金</div>
                    </div>
                    <div class="number" v-text="vipLevel[levelIndex].promoted"></div>
                    <img class="btnGet" src="../assets/myVip/btn_Get.png"/>
                </div>
                <div class="privilegeItem">
                    <div class="title">
                        <img class="iconWeek" src="../assets/myVip/icon_Week.png"/>
                        <div class="titleText">周奖金</div>
                    </div>
                    <div class="number" v-text="vipLevel[levelIndex].week"></div>
                    <img class="btnGet" src="../assets/myVip/btn_Get.png"/>
                </div>
                <div class="privilegeItem">
                    <div class="title">
                        <img class="iconSign" src="../assets/myVip/icon_Sign.png"/>
                        <div class="titleText">签到倍数</div>
                    </div>
                    <div class="number" v-text="vipLevel[levelIndex].sign+'倍'"></div>
                    <img class="btnGet" src="../assets/myVip/btn_AutoGet.png"/>
                </div>
                <div class="privilegeItem">
                    <div class="title">
                        <img class="iconPacket" src="../assets/myVip/icon_Packet.png"/>
                        <div class="titleText">抢红包倍数</div>
                    </div>
                    <div class="number" v-text="vipLevel[levelIndex].packet+'倍'"></div>
                    <img class="btnGet" src="../assets/myVip/btn_AutoGet.png"/>
                </div>
            </div>
            <div class="tipBox">
                <div>尊贵的VIP会员，您可享受以上专属权益！</div>
                <div class="specialTip">等级越高特权越高哦！</div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                levelIndex:0,
                vipLevel:[
                    {name:"vip1",promoted:11.11,week:11.11,sign:1,packet:1},
                    {name:"vip2",promoted:22.22,week:22.22,sign:2,packet:2},
                    {name:"vip3",promoted:33.33,week:33.33,sign:3,packet:3},
                    {name:"vip4",promoted:44.44,week:44.44,sign:4,packet:4},
                    {name:"vip5",promoted:55.55,week:55.55,sign:5,packet:5},
                    {name:"vip6",promoted:66.66,week:66.66,sign:6,packet:6},
                    {name:"vip7",promoted:77.77,week:77.77,sign:7,packet:7},
                    {name:"vip8",promoted:88.88,week:88.88,sign:8,packet:8},
                    {name:"vip9",promoted:99.99,week:99.99,sign:9,packet:9},
                    {name:"vip10",promoted:111.11,week:111.11,sign:10,packet:10},
                ]
            }
        },
        methods:{
            open(path){all.router.push(path)},
            back(){all.router.go(-1)},
            prevLevel(){if(this.levelIndex>0)this.levelIndex-=1},
            nextLevel(){if(this.levelIndex<this.vipLevel.length-1)this.levelIndex+=1},
        },
        created() {
            all.tool.send("grades",null,res=>{
                console.log('res',res)
            })
        }
    }
</script>

<style scoped>
    .myVip{
        display:flex;
        flex-direction:column;
        background:#eeeeee;
    }
    .pageTitle{
        height:3.1rem;
        background:linear-gradient(90deg,#51a1ff,#1d7ef0);
        color:#fff;
        padding:0 0.3rem;
        flex-shrink:0;
    }
    .textTitle{
        height:0.9rem;
        display:flex;
        justify-content:center;
        align-items:center;
        font-size:0.36rem;
        font-weight:400;
        position:relative;
    }
    .iconBack{
        width:0.18rem;
        height:0.34rem;
        position:absolute;
        left:0;
    }
    .circleA{
        width:2.58rem;
        height:auto;
        position:absolute;
        top:0.2rem;
        left:0.5rem;
        z-index:1;
    }
    .circleB{
        width:1.65rem;
        height:auto;
        position:absolute;
        top:1.8rem;
        left:4.8rem;
        z-index:1;
    }
    .circleC{
        width:1.1rem;
        height:auto;
        position:absolute;
        top:0.7rem;
        left:2.7rem;
        z-index:1;
    }
    .contentView{
        margin:-2.2rem 0 0;
        flex:1;
        display:flex;
        flex-direction:column;
        overflow:scroll;
    }
    .personalInfo{
        width:6.9rem;
        height:2.6rem;
        background:linear-gradient(140deg,#0075ff,#006def);
        border-radius:0.15rem;
        box-shadow:0 0.01rem 0.03rem rgba(0,27,97,0.5);
        display:flex;
        flex-direction:column;
        justify-content:center;
        padding:0 0.55rem;
        margin:0 0.3rem 0.4rem;
        flex-shrink:0;
    }
    .detail{
        color:#ffffff;
        font-size:0.3rem;
        display:flex;
        align-items:center;
        z-index:2;
    }
    .imgUser{
        width:1rem;
        height:1rem;
        margin-right:0.3rem;
    }
    .name{
        width:1.6rem;
        margin-bottom:0.05rem;
    }
    .vipBar{
        font-size:0.18rem;
        color:#ffffff;
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin:0.2rem 0;
        z-index:2;
    }
    .vipLine{
        height:0.14rem;
        background:#f5eae2;
        border:0.01rem solid #ffffff;
        flex:1;
        margin:0 0.2rem;
    }
    .currentLine{
        width:30%;
        height:0.12rem;
        background:#fca52b;
    }
    .currentNumber{
        font-size:0.18rem;
        color:#ffffff;
        z-index:2;
    }
    .levelBox{
        display:flex;
        justify-content:space-between;
        align-items:center;
        font-size:0.22rem;
        color:#b6b6b6;
        font-weight:400;
        margin:0.35rem 0.88rem 0.8rem;
        z-index:2;
    }
    .prevNext{
        width:0.18rem;
        height:0.21rem;
    }
    .levelTurn{
        display:flex;
        align-items:center;
    }
    .levelText{
        margin:0 0.28rem;
    }
    .levelIndex{
        display:flex;
        align-items:center;
    }
    .levelIcon{
        width:0.63rem;
        height:auto;
        margin-top:-0.35rem;
        margin-right:0.1rem;
    }
    .levelName{
        color:#bb8800;
        font-size:0.34rem;
        font-weight:400;
        text-shadow:0 0.01rem 0.03rem rgba(0,27,97,0.5);
    }
    .privilegeBox{
        margin:0 0.3rem;
        display:flex;
        flex-wrap:wrap;
        justify-content:space-between;
        z-index:2;
    }
    .privilegeItem{
        width:3.35rem;
        height:3.21rem;
        background:url("../assets/myVip/bg_Item.png") no-repeat;
        background-size:100% 100%;
        margin-bottom:0.2rem;
        display:flex;
        flex-direction:column;
        font-size:0.24rem;
        font-weight:400;
        align-items:center;
        justify-content:space-between;
        color:#333333;
    }
    .title{
        width:100%;
        display:flex;
        align-items:center;
        justify-content:center;
        height:0.9rem;
        position:relative;
    }
    .iconPromoted{
        width:0.55rem;
        height:0.52rem;
        position:absolute;
        left:0.4rem;
    }
    .iconWeek{
        width:0.44rem;
        height:0.47rem;
        position:absolute;
        left:0.4rem;
    }
    .iconSign{
        width:0.48rem;
        height:0.45rem;
        position:absolute;
        left:0.4rem;
    }
    .iconPacket{
        width:0.66rem;
        height:0.51rem;
        margin-left:-0.5rem;
        margin-right:0.2rem;
    }
    .number{
        margin-bottom:0.5rem;
        font-size:0.42rem;
        color:#fb751e;
    }
    .btnGet{
        width:1.38rem;
        height:0.52rem;
        margin-bottom:0.25rem;
    }
    .tipBox{
        text-align:center;
        font-size:0.18rem;
        color:#999999;
        font-weight:400;
        line-height:0.3rem;
        z-index:2;
    }
    .specialTip{
        color:#333333;
    }

</style>
