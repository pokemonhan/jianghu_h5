<template>
    <div class="promote">
        <div class="pageTitle">
            <div class="textTitle animated flipInX">佣金</div>
            <img class="circleC" src="../assets/mine/img_CircleC.png"/>
            <img class="circleA" src="../assets/mine/img_CircleA.png"/>
            <img class="circleB" src="../assets/mine/img_CircleB.png"/>
        </div>
        <div class="contentView">
            <img class="banner animated flipInX" :src="banner"/>
            <div class="itemBox animated bounceInUp">
                <div class="boxTitle">推广管理</div>
                <div class="boxItem">
                    <div class="item animated delay-350" :class="{flipInX:index%2===0,flipInY:index%2===1}" v-for="(item,index) in itemList" @click="open(item.path)">
                        <img class="itemIcon" :src="item.icon"/>
                        <div class="itemName" v-text="item.name">当前积分</div>
                    </div>
                </div>
            </div>
            <div class="itemBox animated bounceInUp">
                <div class="boxTitle">今日数据</div>
                <div class="boxItem">
                    <div class="itemData animated swing delay-1s" v-for="(item,index) in dataList" @click="open(item.path)">
                        <div class="itemTitle" v-text="item.title"></div>
                        <div class="itemValue" v-text="item.value"></div>
                    </div>
                </div>
            </div>
            <div class="rqBox animated bounceInUp">
                <img class="code animated delay-2s flash" :src="'https://api.qrserver.com/v1/create-qr-code/?data='+rqCodeUrl"/>
                <div class="codeId">
                    <div class="codeText">
                        <span>邀请码：</span>
                        <span class="id" v-text="userId"></span>
                    </div>
                    <span class="copy" v-clipboard:copy="userId" v-clipboard:success="onCopy" v-clipboard:error="onCopyError">复制分享</span>
                </div>
                <div class="net">
                    <div class="netText" v-text="rqCodeUrl"></div>
                    <span class="copy" v-clipboard:copy="rqCodeUrl" v-clipboard:success="onCopy" v-clipboard:error="onCopyError">复制分享</span>
                </div>
                <!--<div class="shareBtn">
                    <div class="shareWeChat">分享微信好友</div>
                    <div class="shareFriend">分享到朋友圈</div>
                </div>-->
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
                rqCodeUrl:window.location.origin+"/register?id="+this.$store.state.guid,
                banner:require("../assets/homePage/bannerA.png"),
                userId:this.$store.state.guid,
             /*   userUrl:window.location.origin+this.,*/
                itemList:[
                    {icon:require("../assets/promote/icon_Notice.png"),name:"推广说明",path:"/promoteExplain"},
                    {icon:require("../assets/promote/icon_Earnings.png"),name:"推广收益",path:"/promoteEarnings"},
                    {icon:require("../assets/promote/icon_Xingma.png"),name:"洗码收益",path:"/promoteWashCode"}
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
            onCopy(e){all.tool.editTipShow("成功复制"+e.text)},
            onCopyError(){all.tool.editTipShow("复制失败","error")},

        },
        created() {
            all.tool.send("slides",{flag:"2"},res=>{res.data.forEach(item=>{if(item.redirect_url==="promote")this.banner=item.pic_path})});
        }
    }
</script>

<style scoped>
    .promote{
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
        animation:circleA 8s infinite alternate;
    }
    .circleB{
        width:1.65rem;
        height:auto;
        position:absolute;
        top:1.8rem;
        left:4.8rem;
        z-index:1;
        animation:circleB 7s infinite alternate;
    }
    .circleC{
        width:1.1rem;
        height:auto;
        position:absolute;
        top:0.7rem;
        left:2.7rem;
        z-index:1;
        animation:circleC 6s infinite alternate;
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
        display:flex;
        justify-content:space-between;
        text-overflow:ellipsis;
        overflow:hidden;
        white-space:nowrap;
    }
    .codeText{
        width:2.5rem;
    }
    .id{
        font-size:0.3rem;
        color:#000000;
        font-weight:400;
    }
    .net{
        display:flex;
        justify-content:space-between;
        font-size:0.24rem;
        line-height:0.4rem;
        margin-top:0.05rem;
    }
    .copy{
        color:#1d7ef0;
        text-decoration:underline;
    }
    .netText{
        font-size:0.24rem;
        color:#666666;
        text-overflow:ellipsis;
        overflow:hidden;
        white-space:nowrap;
        font-weight:400;
    }
    .shareBtn{
        width:5.1rem;
        display:flex;
        justify-content:space-between;
        color:#ffffff;
        font-size:0.3rem;
        margin-top:0.5rem;
        margin-bottom:0.3rem;
    }
    .shareWeChat{
        width:2.2rem;
        height:0.58rem;
        background:#1dd258;
        border-radius:0.08rem;
        display:flex;
        align-items:center;
        justify-content:center;
        box-shadow:0 0.01rem 0.03rem rgba(0,27,97,0.5);
    }
    .shareFriend{
        width:2.2rem;
        height:0.58rem;
        background:#1d7ef0;
        border-radius:0.08rem;
        display:flex;
        align-items:center;
        justify-content:center;
        box-shadow:0 0.01rem 0.03rem rgba(0,27,97,0.5);
    }
</style>
