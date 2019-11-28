const Tool = {//工具汇总

    //TODO 本地存储类工具*************************************************************************//

    setStore: (key, val) => sessionStorage.setItem(key, JSON.stringify(val)),//保存本地信息
    getStore: key => JSON.parse(sessionStorage.getItem(key)),//获取本地信息
    clearStore: key => sessionStorage.removeItem(key),  // 清除session
    setCookie: (key, val) => document.cookie = key + '=' + val,//保存本地cookie信息
    getCookie: key => { //获取本地cookie信息
        let val = false;
        document.cookie.split("; ").map(item => {
            if (item.split("=")[0] === key)
                val = item.split("=")[1]
        });
        return val
    },
    delCookie: key => {//删除本地cookie信息
        let exp = new Date();
        exp.setTime(exp.getTime() - 1);
        if (all.tool.getCookie(key) !== null) {
            all.tool.setCookie(key, all.tool.getCookie(key) + ";expires=" + exp.toGMTString())
        }
    },
    setLocal: (key, val) => localStorage.setItem(key, JSON.stringify(val)), // 设置localStorage
    getLocal: key => JSON.parse(localStorage.getItem(key)),  // 获取localStorage
    //工具类别分割线---------------------------------------------------------------------------------------------//

};
export default Tool;
