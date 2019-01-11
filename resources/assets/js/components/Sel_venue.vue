<template>
    <div class="sel_venue">
        <div class="header">
            选择场馆>>
        </div>
        <div class="body">
            <div class="venue_item" v-for="item in list"  @click="create_game(item)">
                <h3>{{item.name}}</h3>
                <p>{{item.address}}</p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Sel_venue",
        data(){
            return {
                base_url:"http://www.yutang.test",
                list:[]
            }
        },
        created(){
            axios.get(this.base_url+"/venue/m_list").then((res)=>{
                this.list = res.data;

            })
        },
        methods:{
            create_game(venue){
                this.$router.push({name:'create_game',params:venue});
            }
        }
    }
</script>

<style scoped>
.header{
    padding-left:.3rem;
    font-size:.36rem;
    line-height: 1.12rem;
    height:1.12rem;
    background-color:#ececf6;
}
.venue_item{

    padding:0 .2rem;
    padding-left:.7rem;
    background: url("/images/map_icon.jpg") no-repeat .23rem center;
    border-bottom:1px #ececf6 solid;

}
.venue_item h3{
     font-size:.36rem;
    padding-top:.2rem;
    padding-left:.3rem;
}
.venue_item p{
    font-size:.2rem;
    padding-top:.1rem;
    padding-left:.3rem;
}
</style>