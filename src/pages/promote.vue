<template>
    <div class="mine">
        <div class="pageTitle">
            <div class="textTitle">佣金</div>
            <img class="circleC" src="../assets/mine/img_CircleC.png"/>
            <img class="circleA" src="../assets/mine/img_CircleA.png"/>
            <img class="circleB" src="../assets/mine/img_CircleB.png"/>
        </div>
        <div class="contentView">
            <img class="banner" src="../assets/homePage/bannerA.png"/>
            <div class="itemBox">
                <div class="boxTitle">推广管理</div>
                <div class="boxItem">
                    <div class="item" v-for="item in itemList" @click="open(item.path)">
                        <img class="itemIcon" :src="item.icon"/>
                        <div class="itemName" v-text="item.name">当前积分</div>
                    </div>
                </div>
            </div>
            <div class="itemBox">
                <div class="boxTitle">今日数据</div>
                <div class="boxItem">
                    <div class="itemData" v-for="item in dataList" @click="open(item.path)">
                        <div class="itemTitle" v-text="item.title"></div>
                        <div class="itemValue" v-text="item.value"></div>
                    </div>
                </div>
            </div>
            <div class="rqBox">
                <img class="code" src="../assets/promote/icon_RqCode.png"/>
                <div class="codeId">
                    <div class="codeText">
                        <span>邀请码：</span>
                        <span class="id">88888</span>
                    </div>
                    <span class="copy">复制</span>
                </div>
            </div>
        </div>
        <comMenu/>
    </div>
</template>

<script>
    import comMenu from '../pages/components/menu'
    export default {
        components:{
            comMenu
        },
        data () {
            return {
                itemBox:[
                    {title:"推广管理",list:[
                            {icon:require("../assets/promote/icon_Notice.png"),name:"推广说明"},
                            {icon:require("../assets/promote/icon_Earnings.png"),name:"推广收益",path:"/myVip"},
                            {icon:require("../assets/promote/icon_Xingma.png"),name:"洗码收益",path:"/myVip"}
                        ]}
                ],
                itemList:[
                    {icon:require("../assets/promote/icon_Notice.png"),name:"推广说明"},
                    {icon:require("../assets/promote/icon_Earnings.png"),name:"推广收益",path:"/myVip"},
                    {icon:require("../assets/promote/icon_Xingma.png"),name:"洗码收益",path:"/myVip"}
                ],
                dataList:[
                    {title:"活跃人数",value:"10人"},
                    {title:"首充人数",value:"10人"},
                    {title:"直属新增",value:"10人"},
                    {title:"返佣佣金",value:"500.00"},
                    {title:"团队新增",value:"10人"},
                ],
            }
        },

        methods:{
            open(path){all.router.push(path)},
            back(){all.router.go(-1)},

        },

    }
</script>

<style scoped>
    .mine{
        display:flex;
        flex-direction:column;
        background:#eeeeee;
    }
    .pageTitle{
        height:3.3rem;
        background:linear-gradient(90deg,#51a1ff,#1d7ef0);
        color:#fff;
        padding:0 0.3rem;
        flex-shrink:0;
    }
    .textTitle{
        height:1rem;
        display:flex;
        justify-content:center;
        align-items:center;
        font-size:0.36rem;
        font-weight:400;
        position:relative;
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
        margin:-2.3rem 0 0;
        flex:1;
        display:flex;
        align-items:center;
        flex-direction:column;
        overflow:scroll;
    }
    .banner{
        width:6.9rem;
        height:3rem;
        margin-bottom:0.3rem;
        flex-shrink:0;
        border-radius:0.15rem;
        box-shadow:0 0.01rem 0.03rem rgba(0,27,97,0.5);
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
    .itemData{
        font-size:0.2rem;
        width:2rem;
        height:1.32rem;
        background:#eeeeee;
        margin-right:0.2rem;
        margin-top:0.1rem;
        margin-bottom:0.1rem;
        color:#ffffff;
        display:flex;
        flex-direction:column;
        align-items:center;
        border-radius:0.08rem;
        overflow:hidden;
    }
    .itemData:nth-child(3){
        margin-right:0;
    }
    .itemTitle{
        height:0.45rem;
        width:2rem;
        display:flex;
        align-items:center;
        justify-content:center;
        font-weight:400;
        background:#1d7ef0;
    }
    .itemData:nth-child(2) .itemTitle{
        background:#1ac2d8
    }
    .itemData:nth-child(3) .itemTitle{
        background:#7c75fb
    }
    .itemData:nth-child(4) .itemTitle{
        background:#e6753f
    }
    .itemData:nth-child(5) .itemTitle{
        background:#e460b2
    }
    .itemValue{
        color:#1d7ef0;
        font-size:0.34rem;
        font-weight:400;
        margin-top:0.2rem;
    }
    .itemData:nth-child(2) .itemValue{
        color:#1ac2d8
    }
    .itemData:nth-child(3) .itemValue{
        color:#7c75fb
    }
    .itemData:nth-child(4) .itemValue{
        color:#e6753f
    }
    .itemData:nth-child(5) .itemValue{
        color:#e460b2
    }
    .rqBox{
        width:6.9rem;
        background:#ffffff;
        border-radius:0.15rem;
        box-shadow:0 0.01rem 0.03rem rgba(0,27,97,0.5);
        padding:0.3rem 0.25rem;
        flex-shrink:0;
        margin:0 0.3rem 0.3rem;
        display:flex;
        flex-direction:column;
        align-items:center;
        z-index:2;
    }
    .code{
        width:3rem;
        height:3rem;
        margin-bottom:0.4rem;
    }
    .codeId{
        font-size:0.24rem;
        color:#666666;
        line-height:0.4rem;
        width:3rem;
        display:flex;
        justify-content:space-between;
    }
    .codeText{

    }
    .id{
        font-size:0.3rem;
        color:#000000;
        font-weight:400;
    }
    .copy{
        color:#1d7ef0;
        text-decoration:underline;
    }
</style>
