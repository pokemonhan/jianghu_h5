<template>
    <div class="changeName">
        <div class="changeBox animated fadeInDown faster">
            <img class="bgLogin" src="../../assets/login/bg_Login.png"/>
            <img class="iconClose" @click="toDoClose" src="../../assets/mine/icon_Close.png"/>
            <span class="changeTitle">修改昵称</span>
            <div class="changeBar">
                <div class="inputItem">
                    <div class="itemIcon">
                        <img class="icon" src="../../assets/login/icon_Person.png"/>
                    </div>
                    <input type="text" class="inputEdit" v-model="name" placeholder="请输入新的昵称" @blur="checkName" @keyup="limitName" maxlength="5">
                </div>

            </div>
            <div class="commit" @click="toDoCommit">确定</div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                name:""
            }
        },
        methods:{
            limitName(){this.name=this.name.match(/[a-zA-Z0-9\u4e00-\u9fa5]*/i)[0]},
            checkName(){
                if(this.name.length===0){
                    all.tool.editTipShow("新的昵称不能为空！");
                    return false;
                }
                else if(!/^([a-zA-Z0-9\u4e00-\u9fa5]{2,5})$/.test(this.name)){
                    all.tool.editTipShow("请输入正确的2至5位字符昵称格式！");
                    return false
                }
                else return true;
            },
            toDoClose(){
                all.$(".changeBox").addClass("zoomOut");
                setTimeout(()=>{all.store.commit("isShowChangeName",false)},150)
            },
            toDoCommit(){
                this.toDoClose();
                if(this.checkName())all.store.commit("nickName",this.name);
            },
        }
    }
</script>

<style scoped>
    .changeName{
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
    .changeBox{
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
    .changeTitle{
        font-size:0.36rem;
        font-weight:400;
        line-height:0.36rem;
        color:#ffffff;
        width:1.46rem;
        height:0.4rem;
        margin:0.2rem 0
    }
    .changeBar{
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
    .inputItem{
        width:5.4rem;
        height:0.8rem;
        background:url("../../assets/login/bg_Edit.png") no-repeat;
        background-size:100% 100%;
        display:flex;
        align-items:center;
        margin-bottom:0.3rem;
        position:relative;
        flex-shrink:0;
    }
    .inputItem:last-child{
        margin-bottom:0;
    }
    .itemIcon{
        width:0.8rem;
        height:0.8rem;
        display:flex;
        justify-content:center;
        align-items:center;
    }
    .icon{
        height:0.3rem;
        width:auto
    }
    .inputEdit{
        flex:1;
        height:0.8rem;
        border:none;
        background:none;
        font-size:0.3rem;
        color:#ffffff;
    }
    .inputEdit::placeholder{
        font-size:0.24rem;
        color:#e9e9e9
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