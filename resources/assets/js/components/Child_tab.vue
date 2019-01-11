<template>
    <li @click="go" :class="{active:bool}">
        <slot name="icon"></slot>
        <span>{{title}}</span>
    </li>
</template>

<script>
    export default {
        name: "Child_tab",
        data(){
            return {}
        },
        props:["title","mark","sel"],
        methods:{
            go(){
                this.$router.push("/"+this.mark);
                //把mark传递给父组件
                this.$emit("my_click",this.mark);
                //父组件获取mark值
            }
        },
        computed:{
            bool:function () {
                return this.mark == this.sel;
            }
        }
    }
</script>

<style scoped>
li{
    display:flex;
   flex-direction: column;
    padding-top:.04rem;
    justify-content: center;
    height:1.13rem;
    align-items:center;
    flex-grow: 1;
    border-top:1px darkgreen solid;
}
.active{
    color:#3397ec;
 }
</style>