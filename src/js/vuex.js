import Vue from 'vue'
import Vuex from 'vuex';


Vue.use(Vuex);

const state={
    isLoading:false,
    editTip:{isShow:false,content:""},
    tipWin:{isShow:false,content:"",callback:null,type:{icon:"",name:""}},
    isLogin:false,
    amount:"12345678.00",
    nickName:"哈土奇一号",
    uid:"123456",
    messageData:{
        notice:[
            {title:"1系统维护通知",content:"尊敬的玩家，本站因系统升级，将于2019-12-30 15:30:00至2019-12-30 16:30:00期间暂停游戏服务，进行升级，如有不便，敬请谅解！",time:"2019-12-30 15:30:24",isRead:false},
            {title:"2超级大奖",content:"尊恭喜玩家“一九四二”在开元棋牌抢庄牛牛的游戏中获得幸运超级大奖价值10000元的苹果电脑一台！",time:"2019-11-30 15:30:24",isRead:false},
            {title:"3关于VIP等级调整的通知",content:"尊敬的玩家，本站将于2019-12-30开始采用全新的VIP等级分级模式以给于玩家更多的优惠，期间由于等级模式更换，给玩家造成的不便，敬请谅解！",time:"2019-12-30 15:30:24",isRead:true},
            {title:"4新增游戏牛牛",content:"尊敬的玩家，本站新添加了一款牛牛游戏，乐趣多多，赢钱多多！",time:"2019-06-30 15:30:24",isRead:true},
        ],
        unread:[
            {title:"1到账通知",content:"尊敬的玩家，你的提款订单100元已经审核通过，资金已发送到你的银行卡上！",time:"2019-07-30 15:30:24"},
            {title:"2返水",content:"你的返水额度已经到账，请查收！",time:"2019-12-30 15:30:24"},
            {title:"3VIP等级",content:"尊敬的玩家，你已达到升VIP条件，系统已经自动为你升级，现VIP等级为VIP5，享受更多权利！",time:"2019-12-30 15:30:24"}
        ],
        read:[
            {title:"积分赠送",content:"尊敬的玩家，由于你游戏次数多，特为你赠送100积分，使用积分可以参与各种积分活动，如幸运轮盘，快乐竞猜等活动，多多游戏，多多赠送积分，提高活动中奖机会！",time:"2019-12-30 15:30:24"},
            {title:"洗码不足",content:"你的提现洗码额度不足，请继续游戏洗码，避免扣税！",time:"2019-12-20 15:30:24"},
            {title:"VIP等级",content:"尊敬的玩家，你已达到升VIP条件，系统已经自动为你升级，现VIP等级为VIP5，享受更多权利！",time:"2019-10-25 15:30:24"}
        ]
    }
};
const mutations={};
for(let item in state){
    mutations[item]=(state,value)=>{
        state[item]=value
    }
}
export default new Vuex.Store({
    state,
    mutations
})