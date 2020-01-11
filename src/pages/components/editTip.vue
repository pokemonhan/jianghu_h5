<template>
    <div class="editTip">
        <div class="errBox animated fadeInDown faster">
            <img class="errIcon" src="../../assets/login/icon_Error.png"/>
            <div class="errText" v-text="this.$store.state.editTip.content"></div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "editTip",
        created() {
            setTimeout(()=>{
                all.$(".errBox").addClass("zoomOut");
                all.tool.editTipHide()
            },1500);
        }
    }
</script>

<style scoped>
    .editTip{
        width:100%;
        height:100%;
        position:absolute;
        top:0;
        left:0;
        display:flex;
        justify-content:center;
        align-items:center;
        z-index:100;
    }
    .errBox{
        min-width:4rem;
        min-height:1.3rem;
        max-width:6.9rem;
        background:rgba(5,10,50,0.8);
        border-radius:0.08rem;
        display:flex;
        flex-direction:column;
        justify-content:center;
        align-items:center;
        font-size:0.24rem;
        color:#ffffff;
        padding:0.1rem 0.2rem;
    }
    .errIcon{
        width:0.3rem;
        height:0.3rem;
        margin-bottom:0.1rem;
    }
    .errText{
        text-align:center;
        line-height:0.35rem;
        word-wrap:break-word;
    }

</style>