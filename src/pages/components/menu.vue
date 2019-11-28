<template>
    <div class="menuBox">
        <div class="menu">
            <img class="icon" src="../../assets/componentMenu/icon_Home.png"/>
            <img class="text" src="../../assets/componentMenu/text_Home.png"/>
        </div>
        <img class="line" src="../../assets/componentMenu/line.jpg"/>
        <div class="menu">
            <img class="icon" src="../../assets/componentMenu/icon_Promote.png"/>
            <img class="text" src="../../assets/componentMenu/text_Promote.png"/>
        </div>
        <img class="line" src="../../assets/componentMenu/line.jpg"/>
        <div class="menu">
            <img class="iconAdd" src="../../assets/componentMenu/icon_ReCharge.png"/>
            <img class="text" src="../../assets/componentMenu/text_ReCharge.png"/>
        </div>
        <img class="line" src="../../assets/componentMenu/line.jpg"/>
        <div class="menu">
            <img class="icon" src="../../assets/componentMenu/icon_Personal.png"/>
            <img class="text" src="../../assets/componentMenu/text_Personal.png"/>
        </div>
        <img class="line" src="../../assets/componentMenu/line.jpg"/>
        <div class="menu">
            <img class="icon" src="../../assets/componentMenu/icon_Message.png"/>
            <img class="text" src="../../assets/componentMenu/text_Message.png"/>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {

            }
        }
    }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
    .menuBox{
        height:0.9rem;
        background:url("../../assets/componentMenu/bg_Shading.png") no-repeat #f5eae2;
        background-size:100% 100%;
        border-top:0.02rem solid #37a0ba;
        display:flex;
        align-items:center;
    }
    .menu{
        flex:1;
        display:flex;
        flex-direction:column;
        align-items:center;
        justify-content:center;
    }
    .icon{
        height:0.44rem;
        width:auto;
        margin-bottom:0.05rem;
    }
    .text{
        height:0.22rem;
        width:auto;
        position:relative;
        z-index:1;
    }
    .line{
        height:0.4rem;
        width:0.01rem;
    }
    .iconAdd{
        height:0.88rem;
        width:0.88rem;
        transform:rotateZ(-45deg);
        margin-top:-0.55rem;
        margin-bottom:0.05rem;
    }
</style>