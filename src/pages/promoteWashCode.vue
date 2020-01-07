<template>
    <div class="promoteEarnings">
        <div class="pageTitle">
            <img class="iconBack" src="../assets/activity/btn_Back.png" @click="back"/>
            <div class="textTitle">洗码收益</div>
        </div>
        <div class="contentView">
            <div class="itemBox">
                <div class="boxTitle">游戏类型</div>
                <div class="boxItem">
                    <div class="item" v-for="item in itemList" @click="gameChoose(item.name)">
                        <img class="itemIcon" :src="item.icon"/>
                        <div class="itemName" v-text="item.name">当前积分</div>
                    </div>
                </div>
            </div>
            <div class="itemBox">
                <div class="boxTitle">
                    <span>游戏报表</span>
                    <div class="timeChoose">
                        <span class="time">全部</span>
                        <span class="time">昨日</span>
                        <span class="time">今日</span>
                        <span class="time choose">上周</span>
                        <span class="time">上月</span>
                        <img class="iconDate" src="../assets/promote/icon_Date.png"/>
                    </div>
                </div>
                <div class="listBox">
                    <div class="listTitleItem">
                        <div class="listTitle">游戏平台</div>
                        <img class="iconPoint" src="../assets/promote/icon_Point.png"/>
                        <div class="listTitle">有效下注</div>
                        <img class="iconPoint" src="../assets/promote/icon_Point.png"/>
                        <div class="listTitle">洗码比例</div>
                        <img class="iconPoint" src="../assets/promote/icon_Point.png"/>
                        <div class="listTitle">洗码金额</div>
                        <img class="iconPoint" src="../assets/promote/icon_Point.png"/>
                        <div class="listTitle">日期</div>
                    </div>
                    <div class="listDataItem" v-for="(item,index) in dataList" v-if="item.name===gameName || gameName==='全部'">
                        <div class="listData" v-text="item.name"></div>
                        <div class="listData" v-text="item.betAmount"></div>
                        <div class="listData" v-text="item.ratio"></div>
                        <div class="listData" v-text="item.back"></div>
                        <div class="listData" v-text="item.date"></div>
                    </div>
                    <div class="countText">
                        <div class="pageCount">本页合计：100000.00</div>
                        <div class="allCount">总计：100000.00</div>
                    </div>
                    <div class="pageNumberItem">
                        <img class="btnPage" src="../assets/promote/icon_Prev.png"/>
                        <div class="pageNumber currentPage">1</div>
                        <div class="pageNumber">2</div>
                        <img class="btnPage" src="../assets/promote/icon_Next.png"/>
                        <div class="pageCount">共9页</div>
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
                itemList:[
                    {icon:require("../assets/homePage/img_GameA.png"),name:"开元棋牌"},
                    {icon:require("../assets/homePage/img_GameB.png"),name:"江湖互娱"},
                    {icon:require("../assets/homePage/img_GameC.png"),name:"龙城棋牌"},
                    {icon:require("../assets/homePage/img_GameD.png"),name:"九五至尊"},
                    {icon:require("../assets/homePage/img_GameE.png"),name:"VR棋牌"},
                    {icon:require("../assets/homePage/img_GameF.png"),name:"亚博体育"},
                    {icon:require("../assets/homePage/img_GameH.png"),name:"全部"},
                ],
                dataList:[
                    {name:"开元棋牌",betAmount:"5000",ratio:"2%",back:"100.00",date:"2019-02-08"},
                    {name:"江湖互娱",betAmount:"10000",ratio:"5%",back:"100.00",date:"2019-03-12"},
                    {name:"龙城棋牌",betAmount:"63000",ratio:"6%",back:"200.00",date:"2019-05-26"},
                    {name:"财神棋牌",betAmount:"35800",ratio:"8%",back:"130.00",date:"2019-06-07"},
                    {name:"亚博体育",betAmount:"12800",ratio:"12%",back:"150.00",date:"2019-06-18"},
                    {name:"开元棋牌",betAmount:"95600",ratio:"15%",back:"108.00",date:"2019-07-25"},
                    {name:"开元棋牌",betAmount:"15760",ratio:"18%",back:"104.00",date:"2019-08-04"},
                    {name:"龙城棋牌",betAmount:"42810",ratio:"21",back:"12.00",date:"2019-08-24"},
                    {name:"龙城棋牌",betAmount:"24680",ratio:"16%",back:"140.00",date:"2019-09-03"},
                    {name:"龙城棋牌",betAmount:"20300",ratio:"56%",back:"700.00",date:"2019-09-11"},
                    {name:"亚博体育",betAmount:"53090",ratio:"72%",back:"200.00",date:"2019-09-17"},
                    {name:"亚博体育",betAmount:"14570",ratio:"34%",back:"190.00",date:"2019-09-26"},
                    {name:"九五至尊",betAmount:"10450",ratio:"12%",back:"101.00",date:"2019-10-02"},
                    {name:"九五至尊",betAmount:"90800",ratio:"63%",back:"203.00",date:"2019-10-27"},
                    {name:"VR棋牌",betAmount:"30060",ratio:"42%",back:"174.00",date:"2019-11-05"},
                    {name:"VR棋牌",betAmount:"10400",ratio:"71%",back:"803.00",date:"2019-11-19"},
                    {name:"VR棋牌",betAmount:"70500",ratio:"13%",back:"409.00",date:"2019-12-01"},
                ],
                gameName:"全部",
            }
        },
        methods:{
            open(path){all.router.push(path)},
            back(){all.router.go(-1)},
            gameChoose(name){this.gameName=name}
        },
    }
</script>

<style scoped>
    .promoteEarnings{
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
    .itemBox{
        width:6.9rem;
        background:#ffffff;
        border-radius:0.2rem;
        box-shadow:0 0.01rem 0.03rem rgba(0,27,97,0.5);
        padding:0.2rem 0.25rem;
        flex-shrink:0;
        margin:0 0.3rem 0.3rem;
        z-index:2;
    }
    .boxTitle{
        font-size:0.3rem;
        font-weight:400;
        height:0.4rem;
        padding-left:0.05rem;
        position:relative;
        display:flex;
        align-items:center;
    }
    .boxItem{
        display:flex;
        background:url("../assets/homePage/bg_ShortcutGame.png") no-repeat;
        background-size:6.4rem 1.6rem;
        height:1.6rem;
        overflow:scroll;
        margin:0.15rem 0
    }
    .item{
        width:1.6rem;
        height:1.6rem;
        flex-shrink:0;
        display:flex;
        flex-direction:column;
        align-items:center;
        justify-content:center;
    }
    .itemIcon{
        height:1rem;
        width:auto;
        margin-bottom:0.05rem;
    }
    .itemName{
        font-size:0.24rem;
        font-weight:400;
        color:#ffffff;
    }
    .timeChoose{
        position:absolute;
        right:0;
        font-size:0.24rem;
        color:#999999
    }
    .time{
        display:inline-flex;
        justify-content:center;
        width:0.65rem;
    }
    .time.choose{
        color:#52a3ff;
    }
    .iconDate{
        width:0.28rem;
        height:0.28rem;
        margin-left:0.15rem;
    }
    .listBox{
        margin-top:0.2rem;
    }
    .listTitleItem{
        font-size:0.2rem;
        color:#ffffff;
        background:#7cb9ff;
        display:flex;
        justify-content:space-around;
        align-items:center;
        width:6.4rem;
        height:0.5rem;
    }
    .listTitle{
        flex:1;
        display:flex;
        align-items:center;
        justify-content:center;
    }
    .iconPoint{
        width:0.06rem;
        height:0.06rem;
    }
    .listDataItem{
        width:6.4rem;
        height:0.5rem;
        display:flex;
        align-items:center;
        justify-content:space-around;
        font-size:0.18rem;
        color:#999999;
        border-left:0.02rem solid #d9d9d9;
        border-bottom:0.02rem solid #d9d9d9;
        font-weight:400;
    }
    .listDataItem:nth-child(odd){
        background:#fafafa;
    }
    .listData{
        display:inline-flex;
        align-items:center;
        justify-content:center;
        flex:1;
        height:0.5rem;
        border-right:0.02rem solid #d9d9d9;
    }
    .win{
        color:#d70000
    }
    .lose{
        color:#22b51b;
    }
    .countText{
        font-size:0.22rem;
        color:#7cb9ff;
        display:flex;
        width:6.4rem;
        justify-content:flex-end;
        margin:0.2rem 0 0.4rem;
        font-weight:400;
    }
    .allCount{
        margin-left:0.2rem;
    }
    .pageNumberItem{
        font-size:0.18rem;
        display:flex;
        justify-content:center;
        align-items:center;
        margin-bottom:0.1rem;
    }
    .btnPage{
        width:0.15rem;
        height:0.15rem;
        margin:0 0.2rem;
    }
    .pageNumber{
        margin:0 0.1rem;
    }
    .currentPage{
        width:0.25rem;
        height:0.25rem;
        display:flex;
        justify-content:center;
        align-items:center;
        background:#7cb9ff;
        color:#ffffff;
        border-radius:50%;
    }
</style>
