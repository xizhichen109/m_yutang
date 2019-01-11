<template>
    <div class="game_detail">
        <div class="detail_header">
            活动详情
        </div>
        <div class="body">
            <p>日期： {{game.start_date}}&nbsp;&nbsp;&nbsp;&nbsp;时间：{{game.start_time}}</p>
            <p>场馆： {{game.venue_id}}</p>
            <p>费用： {{game.price}} 元</p>
            <p>组织者： {{game.user_id}}</p>
            <p>活动人数： {{game.user_num}}</p>
            <p>描述信息： {{game.des}}</p>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Game_detail",
        data(){
            return{
                base_url:"http://www.yutang.test",
                game:{}
            }
        },
        created(){

            let game_id = this.$route.params.id;
            axios.get(this.base_url+"/game/m_detail/"+game_id).then((res)=>{
                this.game = res.data;
            })
        }
    }
</script>

<style scoped>

</style>