<template>
    <div class="tipWin">
        <div class="exitLoginBox">
            <div class="tipBox">
                <div class="tipText" v-text="this.$store.state.tipWin.content"></div>
                <div class="btnBar">
                    <div class="btn" v-for="item in this.$store.state.tipWin.btn" v-text="item.name" @click="toDoCallback(item.callback)"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "tipWin",
        methods:{
            toDoCallback(callback){
                all.tool.tipWinHide();
                (typeof(callback)==="function") && callback();
            },
        }
    }
</script>

<style scoped>
    .tipWin{
        width:100%;
        height:100%;
        position:absolute;
        left:0;
        top:0;
        background:rgba(0,0,0,0.5);
        display:flex;
        justify-content:center;
        align-items:center;
        font-size:0.24rem;
        color:#7f7f7f;
        z-index:10;
    }
    .tipBox{
        width:5rem;
        height:2.2rem;
        border-radius:0.1rem;
        background:#ffffff;
    }
    .tipText{
        text-align:center;
        height:1.25rem;
        line-height:0.35rem;
        border-bottom:0.01rem solid #eeeeee;
        margin:0 0.2rem;
        font-weight:400;
        display:flex;
        align-items:center;
        justify-content:center;
    }
    .btnBar{
        display:flex;
        height:0.95rem;
        font-size:0.3rem;
        font-weight:400;
        color:#1d7ef0;
    }
    .btn{
        flex:1;
        display:flex;
        justify-content:center;
        align-items:center;
    }
    .btn:nth-child(2){
        flex:1;
        display:flex;
        justify-content:center;
        align-items:center;
        border-left:0.01rem solid #eeeeee;
    }
</style>