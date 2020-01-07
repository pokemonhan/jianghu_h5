<template>
    <div class="promoteEarnings">
        <div class="pageTitle">
            <img class="iconBack" src="../assets/activity/btn_Back.png" @click="back"/>
            <div class="textTitle">推广收益</div>
        </div>
        <div class="contentView">
            <div class="itemBox">
                <div class="boxTitle">推广级别</div>
                <div class="boxItem">
                    <div class="item" v-for="item in itemList" @click="levelChoose(item.level)">
                        <img class="itemIcon" :src="item.icon"/>
                        <div class="itemName" v-text="item.name">当前积分</div>
                    </div>
                </div>
            </div>
            <div class="itemBox">
                <div class="boxTitle">
                    <span>推广报表</span>
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
                        <div class="listTitle">下级ID</div>
                        <img class="iconPoint" src="../assets/promote/icon_Point.png"/>
                        <div class="listTitle">推广层级</div>
                        <img class="iconPoint" src="../assets/promote/icon_Point.png"/>
                        <div class="listTitle">游戏输赢</div>
                        <img class="iconPoint" src="../assets/promote/icon_Point.png"/>
                        <div class="listTitle">返利金额</div>
                        <img class="iconPoint" src="../assets/promote/icon_Point.png"/>
                        <div class="listTitle">日期</div>
                    </div>
                    <div class="listDataItem" v-for="(item,index) in dataList" v-if="index<10 && (item.level===dataLevel || dataLevel==='全部')">
                        <div class="listData" v-text="item.id"></div>
                        <div class="listData" v-text="item.level"></div>
                        <div class="listData" :class="{win:item.amount>0,lose:item.amount<0}" v-text="item.amount"></div>
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
                    {icon:require("../assets/promote/icon_levelA.png"),name:"一级推广",level:"一级"},
                    {icon:require("../assets/promote/icon_levelB.png"),name:"二级推广",level:"二级"},
                    {icon:require("../assets/promote/icon_levelC.png"),name:"三级推广",level:"三级"},
                    {icon:require("../assets/promote/icon_levelD.png"),name:"全部",level:"全部"}
                ],
                dataList:[
                    {id:"465456",level:"一级",amount:100,back:"100.00",date:"2019-02-08"},
                    {id:"562353",level:"二级",amount:-100,back:"100.00",date:"2019-03-12"},
                    {id:"678623",level:"三级",amount:-200,back:"200.00",date:"2019-05-26"},
                    {id:"896587",level:"二级",amount:400,back:"130.00",date:"2019-06-07"},
                    {id:"265656",level:"三级",amount:1000,back:"150.00",date:"2019-06-18"},
                    {id:"964552",level:"三级",amount:-310,back:"108.00",date:"2019-07-25"},
                    {id:"145279",level:"二级",amount:248,back:"104.00",date:"2019-08-04"},
                    {id:"398978",level:"一级",amount:365,back:"12.00",date:"2019-08-24"},
                    {id:"123321",level:"一级",amount:179,back:"140.00",date:"2019-09-03"},
                    {id:"920923",level:"三级",amount:-396,back:"700.00",date:"2019-09-11"},
                    {id:"256325",level:"一级",amount:-573,back:"200.00",date:"2019-09-17"},
                    {id:"924552",level:"二级",amount:742,back:"190.00",date:"2019-09-26"},
                    {id:"167477",level:"三级",amount:-235,back:"101.00",date:"2019-10-02"},
                    {id:"264312",level:"三级",amount:471,back:"203.00",date:"2019-10-27"},
                    {id:"675429",level:"二级",amount:122,back:"174.00",date:"2019-11-05"},
                    {id:"109475",level:"二级",amount:385,back:"803.00",date:"2019-11-19"},
                    {id:"205431",level:"一级",amount:-106,back:"409.00",date:"2019-12-01"},
                ],
                dataLevel:"一级"
            }
        },
        methods:{
            open(path){all.router.push(path)},
            back(){all.router.go(-1)},
            levelChoose(level){this.dataLevel=level}
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
        border-radius:0.15rem;
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
        flex-wrap:wrap;
    }
    .item{
        width:1.6rem;
        height:1.6rem;
        display:flex;
        flex-direction:column;
        align-items:center;
        justify-content:center;
    }
    .itemIcon{
        height:0.5rem;
        width:auto;
        margin-bottom:0.25rem;
    }
    .itemName{
        font-size:0.24rem;
        font-weight:400
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
