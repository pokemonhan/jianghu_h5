//全局配置文件 api配置，路由白黑名单配置，正则配置等....
const config={
    // basePath:"http://api.jianghu.local/",
    // basePath:"http://api.397017.com/",
    basePath:"http://apistg.397017.com/",
    api:{
        login:{url:'h5-api/login',method:'post'},
        logout:{url:'h5-api/user/logout',method:'get'},
        register:{url:'h5-api/register',method:'post'},
        registerCode:{url:'h5-api/register/verification-code',method:'post'},
        resetPassword:{url:'h5-api/user/password-reset',method:'put'},
        resetPasswordCode:{url:'h5-api/password-reset/verification-code',method:'post'},
        slides:{url:'h5-api/games-lobby/slides',method:'post'},
        gameCategories:{url:'h5-api/games-lobby/game-categories',method:'get'},
        information:{url:'h5-api/user/information',method:'get'},
        informationP:{url:'h5-api/user/information',method:'post'},
        dynamicInformation:{url:'h5-api/user/dynamic-information',method:'get'},
        avatar:{url:'h5-api/system/avatar',method:'get'},
        grades:{url:'h5-api/user/grades',method:'get'},
        gameList:{url:'h5-api/games-lobby/game-list?',method:'post'},
        changeGamePassword:{url:'h5-api/games-lobby/in-game-reset-password/3',method:'post'},
        rechargeList:{url:'/h5-api/recharge/get-finance-info',method:'get'},
        recharge:{url:'/h5-api/recharge/recharge',method:'post'},
        cancel:{url:'/h5-api/recharge/cancel',method:'post'},
        confirm:{url:'/h5-api/recharge/confirm',method:'post'},
    },
    routerGuard:[
        "/",
        "/login",
        "/register",
        "/forgetPassword",
        "/onlineService"
    ],
};
export default config;
