//全局配置文件 api配置，路由白黑名单配置，正则配置等....
const config={
    // basePath:"http://api.jianghu.local/",
    basePath:"http://api.397017.com/",
    api:{
        login:{url:'h5-api/login',method:'post'},
        logout:{url:'h5-api/user/logout',method:'get'},
        register:{url:'h5-api/register',method:'post'},
        registerCode:{url:'h5-api/register/verification-code',method:'post'},
        resetPassword:{url:'h5-api/user/reset-password',method:'put'},
        resetPasswordCode:{url:'h5-api/reset-password/verification-code',method:'post'},
        slides:{url:'h5-api/games-lobby/slides',method:'post'},
        gameCategories:{url:'h5-api/games-lobby/game-categories',method:'get'},
        information:{url:'h5-api/user/information',method:'get'},
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