
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


import zh_CN from './locale/zh_cn';
import VeeValidate, { Validator } from 'vee-validate';
Vue.use(VeeValidate);
Validator.localize('zh_CN', zh_CN);

//引入vue-router
import VueRouter from "vue-router"
Vue.use(VueRouter);

//引入spa路由
import router from "./routes.js"
//引入mint-ui
import Mint from 'mint-ui'

import'mint-ui/lib/style.css'

Vue.use(Mint);

    /**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.use(VeeValidate);
Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('sidebar', require('./components/Aside'));
//注册父组件
Vue.component('p_tab', require('./components/Parent_tab'));
//注册子组件
Vue.component('c_tab', require('./components/Child_tab'));
//搜索控件
Vue.component('search_input', require('./components/search_input'));
//
Vue.component('venue_item', require('./components/venue_item'));
const app = new Vue({
    el: '#app',
    router
});
app.url = "http://www.yutang.test";