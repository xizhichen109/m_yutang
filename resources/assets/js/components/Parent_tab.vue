<template>
    <ul class="tab">
        <c_tab title="场馆" mark="venue" @my_click="get_mark" :sel="sel_mark"><i class="glyphicon glyphicon-home" slot="icon" ></i></c_tab>
        <c_tab title="活动" mark="game" @my_click="get_mark" :sel="sel_mark"><i slot="icon"  class="glyphicon glyphicon-fire"></i></c_tab>
        <c_tab title="发现" mark="find" @my_click="get_mark" :sel="sel_mark"><i slot="icon" class="glyphicon glyphicon-search"></i></c_tab>
        <c_tab title="我的" mark="about" @my_click="get_mark" :sel="sel_mark"><i slot="icon" class="glyphicon glyphicon-user"></i></c_tab>
    </ul>
</template>

<script>
    export default {
        name: "Parent_tab",
        data(){
            return{
                sel_mark:"venue"
            }
        },
        methods:{
            get_mark:function (sel_mark) {
                //父组件接收子组件传出来的值
                //console.log(sel_mark);
                 this.sel_mark = sel_mark;
            }
        }
    }
</script>

<style scoped>
    .tab{
        width:100%;
        height:1.13rem;
        position:fixed;
        left:0;
        bottom:0;
        display: flex;
        background-color:#fff;
    }

</style>