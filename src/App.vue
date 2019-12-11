<template>
    <div id="app">
        <router-view class="pageView"/>
    </div>
</template>

<script>
    export default {
        name: 'App'
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
