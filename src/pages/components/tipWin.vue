<template>
    <div class="tipWin">
        <div class="tipBox animated fadeInDown faster">
            <img class="bgLogin" src="../../assets/login/bg_Login.png"/>
            <img class="iconClose" @click="toDoCloseTipWin" src="../../assets/mine/icon_Close.png"/>
            <img class="tipTitle" src="../../assets/login/text_TipTitle.png"/>
            <div class="tipBar">
                <img class="tipIcon" v-if="this.$store.state.tipWin.type.icon==='right'" src="../../assets/login/icon_Succeed.png"/>
                <img class="tipIcon" v-if="this.$store.state.tipWin.type.icon==='warn'" src="../../assets/login/icon_Warning.png"/>
                <img class="tipIcon" v-if="this.$store.state.tipWin.type.icon==='error'" src="../../assets/login/icon_ErrorBig.png"/>
                <div class="tipText" v-text="this.$store.state.tipWin.content"></div>
            </div>
            <div class="commit" @click="toDoCallback" v-text="this.$store.state.tipWin.type.name"></div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "tipWin",
        methods:{
            toDoCloseTipWin(){
                all.$(".tipBox").addClass("zoomOut");
                setTimeout(()=>{all.tool.tipWinHide()},150)
            },
            toDoCallback(){
                this.toDoCloseTipWin();
                (typeof(this.$store.state.tipWin.callback)==="function") && this.$store.state.tipWin.callback();
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
        width:6.9rem;
        height:4.9rem;
        border-radius:0.08rem;
        background:#20a6f9;
        position:relative;
        display:flex;
        flex-direction:column;
        align-items:center;
    }
    .bgLogin{
        width:6.9rem;
        height:auto;
        position:absolute;
        top:0;
        left:0;
    }
    .iconClose{
        width:0.25rem;
        height:0.25rem;
        position:absolute;
        right:0.28rem;
        top:0.28rem;
    }
    .tipTitle{
        width:1.46rem;
        height:0.4rem;
        margin:0.2rem 0
    }
    .tipBar{
        width:6.5rem;
        height:2.8rem;
        border-radius:0.08rem;
        background:#ffffff;
        display:flex;
        flex-direction:column;
        justify-content:center;
        align-items:center;
        padding:0 0.4rem;
    }
    .tipIcon{
        width:0.82rem;
        height:0.82rem;
        margin-bottom:0.2rem;
    }
    .tipText{
        font-size:0.3rem;
        font-weight:400;
        color:#131313;
        max-height:1.2rem;
        text-align:center;
        word-wrap:break-spaces;
        overflow:scroll;
    }
    .commit{
        font-size:0.34rem;
        color:#ffffff;
        width:4.8rem;
        height:0.7rem;
        border-radius:0.08rem;
        background:url("../../assets/login/bg_Commit.png") no-repeat;
        background-size:100% 100%;
        display:flex;
        justify-content:center;
        align-items:center;
        margin-top:0.3rem;
        box-shadow:0 0.01rem 0.03rem rgba(0,27,97,0.5);
    }
</style>