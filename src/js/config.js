//全局配置文件 api配置，路由白黑名单配置，正则配置等....
const config={
    basePath:"http://yapi.397017.com:8090/mock/18/",
    api:{
        login:{url:'h5-api/login',method:'post'},
        logout:{url:'h5-api/user/logout',method:'get'},
        register:{url:'h5-api/register',method:'post'},
        gameCategories:{url:'h5-api/games-lobby/game-categories',method:'get'},

    }
};
export default config;