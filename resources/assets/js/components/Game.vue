<template>
    <div class="game_wrap">
        <div class="game_header"><h3>活动列表</h3> </div>
        <div class="game_body">
            <div class="item" v-for="item in list" @click="go(item.id)">
                <div class="pic"><img src="/images/venue_m_icon.jpg" alt=""></div>
                <div class="txt">
                    <h3>{{item.name}}</h3>
                    <p>开始日期：{{item.start_date}}</p>
                    <p>时间：{{item.start_time}}</p>
                    <p>人数：{{item.user_num}}</p>
                    <p>发起者：{{item.user_id}}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Game",
        data(){

            return {
                base_url:"http://www.yutang.test",
                list:[]
            }
        },
        created(){
            axios.get(this.base_url+"/game/m_list").then((res)=>{
                this.list = res.data;
            })
        },
        methods:{
            go(id){
                this.$router.push("/game_detail/"+id);
            }
        }
    }
</script>

<style scoped>
    .game_header{
        height:.9rem;
        border-bottom:1px #e0e2e2 solid;

    }
    .game_header>h3{
        line-height:.9rem;
        text-align: center;
    }
    .game_body{
        padding: 0 .3rem;
    }
    .item{
        display:flex;
        padding:.25rem 0;
    }
    .pic{
        width:2rem;
    }
    .pic>img{
        width:100%;

    }
    .txt{
        width:4.6rem;
        margin-left:.3rem;
        border-bottom:1px solid #ececf6;
    }
    .txt>h3{
        font-size:.36rem;
    }
</style>