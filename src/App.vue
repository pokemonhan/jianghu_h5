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
        font-family: 'Avenir', Helvetica, Arial, sans-serif;
    }
    .pageView{
        height:100%;
    }
</style>
