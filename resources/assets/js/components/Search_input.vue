<template>
    <div class="search_wrap">
        <div class="list_header">
            <select name="" id="">
                <option value="">北京</option>
                <option value="">上海</option>
                <option value="">广州</option>
            </select>
            <input type="text" placeholder="请输入搜索内容..." @click="search" v-model="word" id="search_input">
            <span @click="start_search">搜索</span>
        </div>

    </div>

</template>

<script>
    import Venue from "./Venue";
    export default {
        name: "Search_input",
        components: {Venue},
        data(){
            return {
                word:"",
                base_url:"http://www.yutang.test",
                list:[]
            }
        },
        mounted(){
            let input =document.getElementById("search_input");
            input.focus();
        },
        created(){

        },
        methods:{
            search(){
                this.$router.push("/search");
            },
            start_search(){
                console.log(this.word);
                axios.post(this.base_url+"/venue/m_search",{word:this.word}).then((res)=>{
                    this.$emit("my_click",res.data);
                })
            }
        }
    }
</script>

<style scoped>
    .list_header{
        background:#c0c0c0;
        height:.95rem;
        border-bottom: 1px #dedede solid;
        display: flex;
        align-items: center;
        justify-content: space-between;
        width:100%;
        position: fixed;
        left:0;
        top:0;
    }
    .list_header select{
        margin-left:.3rem;
        border:none;
        width:1.25rem;
        display: flex;
        border-radius:5px;
        justify-content:center;
    }
    .list_header input{

        width:5.3rem;
        height:.58rem;
        justify-content:center;
        border:none;
        border-radius:5px;
        padding-left:.1rem;
        margin:0 .2rem;
    }
    .list_header input:focus{
        outline:none;
    }
    .list_header select:focus{
        outline:none;
    }
    .list_header span{
        border-radius:5px;
        padding-left:.1rem;
        background: #eee;
        margin-right:.2rem;
        display:block;
        width:.9rem;
        display: flex;
    }
    .search_list{
        padding-top:1rem;
        padding-left:.3rem;

    }
    .search_list .item{
        border-bottom:1px #ccc solid;
    }
</style>