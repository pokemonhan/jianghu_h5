<template>
    <div class="horizontal">
        <img class="girl" src="../../assets/component/img_Girl.png"/>
        <div class="tipText">
            <img class="text" src="../../assets/component/img_Text.png"/>
        </div>
        <img class="imgCow" src="../../assets/component/img_Cow.png"/>
        <img class="downLoad animated flash" src="../../assets/component/btn_Download.png"/>
    </div>
</template>

<script>
    export default {
        name: "horizontal"
    }
</script>

<style scoped>
    .horizontal{
        width:100%;
        height:100%;
        position:absolute;
        top:0;
        left:0;
        background:url("../../assets/component/bg_Horizontal.png") no-repeat;
        background-size:100% 100%;
    }
    .girl{
        width:4.44rem;
        height:7.03rem;
        position:absolute;
        left:0.6rem;
        bottom:0;
        animation:rock 4s infinite;
    }
    .tipText{
        width:6.93rem;
        height:5.35rem;
        background:url("../../assets/component/bg_Text.png") no-repeat;
        background-size:100% 100%;
        display:flex;
        justify-content:center;
        align-items:center;
        position:absolute;
        left:4.64rem;
        top:0.12rem;
        animation:rock 4s infinite;
    }
    .text{
        width:5.52rem;
        height:1.85rem;
    }
    .imgCow{
        width:1.62rem;
        height:2.04rem;
        position:absolute;
        right:3rem;
        bottom:0.28rem;
        animation:rock 4s infinite;
    }
    .downLoad{
        width:2.52rem;
        height:0.85rem;
        position:absolute;
        right:0.47rem;
        bottom:0.57rem;
    }
    @keyframes rock {
        0%,100%{transform: translateX(-5%) rotateZ(-2deg)}
        25%,75%{transform: translateX(0) rotateZ(0)}
        50% {transform: translateX(5%) rotateZ(2deg)}
    }
</style>