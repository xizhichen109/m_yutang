<template>
    <div class="list_wrap" id="wrap">
        <search_input></search_input>
        <div class="list_body">
            <template class="item" v-for="item in list">
                <venue_item :venue="item"></venue_item>
            </template>
            <div v-show="is_loading">数据加载中...</div>
            <div @click="get_more" class="get_more">加载更多</div>

        </div>

    </div>
</template>

<script>
    export default {
        name: "Venue",
        data(){
            return{
                list:null,
                base_url : "http://www.yutang.test",
                page : 1,
                url:"",
                is_finish:false,
                is_loading:false
            }
        },
        created(){

            axios.get(this.base_url+"/venue/m_list").then((res)=>{
               this.list = res.data;
            })
        },
        mounted(){
            this.start();
        },
        methods:{

            get_more(){
                this.page++;
                this.url = this.base_url+"/venue/m_list?page="+this.page;
                //console.log(this.url);
                this.is_loading = true;
                axios.get(this.url).then((res)=>{

                    this.is_loading = false;

                    if(res.data.length==0){
                        this.is_finish = true;


                    }
                    this.list = this.list.concat(res.data);
                })
            },
            start(){
                //获取根元素
                var rootE=document.documentElement;
                var wrap = document.getElementById("wrap");//父容器
                var that=this;
                window.onscroll=function () {
                    //内容区的高度
                    var wrapH=wrap.scrollHeight;
                    //浏览器的高度+滚动距离
                    var t=rootE.clientHeight+(rootE.scrollTop||document.body.scrollTop);
                    if(t>=wrapH){
                        //当数据加载完毕之后，终止加载更多
                        if(that.is_finish||that.is_loading){
                            return false;
                        }
                        //触发加载更多
                       that.get_more();
                    }
                }
            },
            search(){
                this.$router.push("/search");
            }
        }
    }
</script>

<style scoped>
    .list_wrap{
        height:100vh;
    }

    .list_body{
       padding: 0 .3rem;
       padding-top:1rem;
    }

    .list_body{
        padding-bottom:2rem;
    }
    .get_more{
        background:#fafafa;
        height:.8rem;
        line-height:.8rem;
        text-align: center;
        font-size:.32rem;
    }
</style>