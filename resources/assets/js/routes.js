

import  VueRouter from "vue-router";

let routes=[
    {
        path:"/",
        component:require("./components/Venue")
    },
    {
        path:"/venue",
        component:require("./components/Venue")
    },
    {
        path:"/game",
        component:require("./components/Game")
    },
    {
        path:"/find",
        component:require("./components/Find")
    },
    {
        path:"/about",
        component:require("./components/About")
    },
    {
        path:"/detail",
        component:require("./components/Detail"),
        name:'detail'
    },
    {
        path:"/search",
        component:require("./components/Search"),
        name:'search'
    },
    {
        path:"/create_game",
        component:require("./components/Create_game"),
        name:'create_game'
    },
    {
        path:"/game_detail/:id",
        component:require("./components/Game_detail")
    },
    {
        path:"/my_follows",
        component:require("./components/My_follows")
    },
    {
        path:"/register",
        component:require("./components/Register")
    },
    {
        path:"/sel_venue",
        component:require("./components/Sel_venue")
    }

]

export default new VueRouter({
    //  "mode":"history",
    routes
})