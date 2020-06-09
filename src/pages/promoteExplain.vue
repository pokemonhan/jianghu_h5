<template>
    <div class="promoteExplain">
        <div class="pageTitle">
            <div class="iconBack" @click="back"></div>
            <div class="textTitle">推广说明</div>
        </div>
        <div class="contentView">
            <div class="itemBox">
                <div class="boxTitle">推广收益三级推广</div>
                <div class="boxContent">
                    <div class="leftContent">
                        <div>玩家：</div>
                        <div>一级推广：</div>
                        <div>二级推广：</div>
                        <div>三级推广：</div>
                    </div>
                    <img class="rightContent" src="../assets/promote/icon_Level.png"/>
                </div>
                <div class="boxTip">系统自动结算，为您打造自动化平台！</div>
            </div>
            <div class="itemBox">
                <div class="boxTitle">层级返利表</div>
                <div class="listBox">
                    <div class="listTitleItem">
                        <div class="listTitle">
                            <img class="iconPoint" src="../assets/promote/icon_Point.png"/>
                            <span>层级名称</span>
                            <img class="iconPoint" src="../assets/promote/icon_Point.png"/>
                        </div>
                        <div class="listTitle"><img class="iconPoint" src="../assets/promote/icon_Point.png"/>
                            <span>层级返利</span>
                            <img class="iconPoint" src="../assets/promote/icon_Point.png"/></div>
                    </div>
                    <div class="listDataItem" v-for="item in dataList">
                        <div class="listData" v-text="item.name"></div>
                        <div class="listData" v-text="item.value"></div>
                    </div>
                </div>
            </div>
            <div class="itemBox">
                <div class="boxTitle">返利佣金计算</div>
                <div class="stepTitle">推广收益计算：</div>
                <div class="stepCount">推广收益=(一级玩家总输赢*一级返利比例)+(二级玩家总输赢*二级返利比例)+(三级玩家总输赢*三级返利比例)</div>
                <div class="stepExample">例如：一级玩家输赢总额100，二级玩家输总额500，三级玩家输总额1000，那么您的收益为(100*15%)+(500*10%)+(1000*6%)=125</div>
                <div class="stepTitle">洗码收益计算：</div>
                <div class="stepCount">洗码收益=有效下注额*VIP等级返利比例</div>
                <div class="stepExample">例如：您的VIP等级为VIP4，VIP4洗码返利比例为8%，有效下注额为1000，那么您的洗码返利为1000*8%=80</div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                dataList:[
                    {name:"一级返利",value:"15%"},
                    {name:"二级返利",value:"10%"},
                    {name:"三级返利",value:"6%"},
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
    .promoteExplain{
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
    .boxContent{
        display:flex;
        justify-content:space-between;
        margin-top:0.3rem;
    }
    .leftContent{
        font-size:0.24rem;
        color:#666666;
        font-weight:400;
        height:3.4rem;
        line-height:0.4rem;
        text-align:right;
        display:flex;
        flex-direction:column;
        justify-content:space-between;
        margin-left:0.4rem;
    }
    .rightContent{
        width:4.11rem;
        height:3.4rem;
        margin-right:0.4rem;
    }
    .boxTip{
        font-size:0.18rem;
        color:#1d7ef0;
        text-align:center;
        margin:0.7rem 0 0.3rem;
    }
    .listBox{
        margin:0.2rem 0;
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
        margin:0 0.1rem;
    }
    .listDataItem{
        width:6.4rem;
        height:0.5rem;
        display:flex;
        align-items:center;
        justify-content:space-around;
        font-size:0.18rem;
        color:#999999;
        border-left:0.01rem solid #d9d9d9;
        border-right:0.01rem solid #d9d9d9;
        border-bottom:0.01rem solid #d9d9d9;
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
    }
    .stepTitle{
        font-size:0.24rem;
        color:#666666;
        margin:0.2rem 0;
        font-weight:400
    }
    .stepCount{
        font-size:0.2rem;
        color:#ffffff;
        line-height:0.35rem;
        background:#7cb9ff;
        border-radius:0.08rem;
        padding:0.15rem;
        margin-bottom:0.2rem;
    }
    .stepExample{
        font-size:0.18rem;
        color:#d30101;
        padding:0 0.2rem;
        margin-bottom:0.2rem;
        line-height:0.3rem;
    }
</style>
