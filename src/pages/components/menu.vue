<template>
    <div class="menuBox">
        <div class="menuItem" @click="open('/')">
            <img class="menuIcon" src="../../assets/componentMenu/icon_HomeActive.png"/>
            <div class="menuText">首页</div>
        </div>
        <div class="menuItem">
            <img class="menuIcon" src="../../assets/componentMenu/icon_Brokerage.png"/>
            <div class="menuText">佣金</div>
        </div>
        <div class="menuItem">
            <img class="menuIcon" src="../../assets/componentMenu/icon_ReCharge.png"/>
            <div class="menuText">充值</div>
        </div>
        <div class="menuItem" @click="open('/activity')">
            <img class="menuIcon" src="../../assets/componentMenu/icon_Activity.png"/>
            <div class="menuText">活动</div>
        </div>
        <div class="menuItem" @click="open('/mine')">
            <img class="menuIcon" src="../../assets/componentMenu/icon_Mine.png"/>
            <div class="menuText">我的</div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {

            }
        },
        methods:{
            open(path){all.router.history.current.path!==path && all.router.push(path)},
        }
    }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
    .menuBox{
        height:1rem;
        background:#4596f5;
        display:flex;
        align-items:center;
        font-size:0.18rem;
        color:#fff;
        flex-shrink:0;
    }
    .menuItem{
        flex:1;
        display:flex;
        flex-direction:column;
        justify-content:center;
        align-items:center;
    }
    .menuIcon{
        height:0.52rem;
        width:auto;
        margin-bottom:0.05rem;
    }

</style>