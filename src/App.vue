<template>
    <div id="app">
        <router-view class="pageView"/>
        <tipWin v-if="this.$store.state.tipWin.isShow"></tipWin>
    </div>
</template>

<script>
    import tipWin from '../src/pages/components/tipWin'
    export default {
        name: 'App',
        components:{
            "tipWin": tipWin,
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
</style>
