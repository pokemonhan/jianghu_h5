<template>
    <div id="app">
        <router-view class="pageView animated fadeIn faster"/>
        <tipWin v-if="this.$store.state.tipWin.isShow"></tipWin>
        <loading v-if="this.$store.state.isLoading"></loading>
        <editTip v-if="this.$store.state.editTip.isShow"></editTip>
        <horizontal v-if="this.$store.state.isHorizontal"></horizontal>
    </div>
</template>

<script>
    import tipWin from '../src/pages/components/tipWin'
    import loading from '../src/pages/components/loading'
    import editTip from '../src/pages/components/editTip'
    import horizontal from '../src/pages/components/horizontal'
    export default {
        name: 'App',
        components:{
            tipWin,
            loading,
            editTip,
            horizontal,
        }
    }
</script>

<style>
    #app {
        font-weight:300;
        font-family: "Microsoft YaHei","Helvetica Neue", Helvetica, Arial, "PingFang SC", "Hiragino Sans GB", "Heiti SC",  "WenQuanYi Micro Hei", sans-serif;
    }
    .pageView{
        height:100%;
    }
    @keyframes circleA
    {
        0% {left:0;top:0;transform:scale(1)}
        25% {left:0.5rem;top:1.5rem;transform:scale(0.5)}
        50% {left:2rem;top:0.5rem;transform:scale(0.7)}
        75% {left:3.5rem;top:1.6rem;transform:scale(0.5)}
        100% {left:4.92rem;top:0.7rem;transform:scale(0.9)}
    }
    @keyframes circleB
    {
        0% {left:4.8rem;top:1.8rem;transform:scale(1)}
        20% {left:3.6rem;top:1.5rem;transform:scale(1.5)}
        40% {left:2.4rem;top:0.5rem;transform:scale(1.2)}
        60% {left:1.5rem;top:2.2rem;transform:scale(0.9)}
        80% {left:1.1rem;top:1.6rem;transform:scale(0.7)}
        100% {left:0;top:0.7rem;transform:scale(1)}
    }
    @keyframes circleC
    {
        0% {left:2.8rem;top:1rem;transform:scale(1)}
        20% {left:3.2rem;top:1.5rem;transform:scale(1.5)}
        40% {left:2.4rem;top:0.8rem;transform:scale(1.3)}
        60% {left:1.5rem;top:2.5rem;transform:scale(0.9)}
        80% {left:0.5rem;top:1.3rem;transform:scale(0.7)}
        100% {left:0;top:0.4rem;transform:scale(1)}
    }
    .delay-200 {
        animation-delay:200ms !important;
    }
    .delay-350 {
        animation-delay:350ms !important;
    }
    .delay-500 {
        animation-delay:500ms !important;
    }
</style>
