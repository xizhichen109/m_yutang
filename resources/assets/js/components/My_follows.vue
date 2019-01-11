<template>
    <div class="my_follows">
        <div class="header">
             我关注的场馆>>>
        </div>
        <div class="body">
            <div class="item" v-for="item in list">
                <h3>{{item.name}}</h3>
                <p>{{item.address}}</p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "My_follows",
        data(){

            return{
                base_url:"http://www.yutang.test",
                list:[]
            }
        },
        created(){

            axios.get(this.base_url+"/venue/m_my_follows").then((res)=>{
                console.log(res);
                this.list = res.data;
            });
        }
    }
</script>

<style scoped>
.header{
    text-align:left;
    height:1rem;
    border-bottom:1px solid #0a88ff;
    line-height:1rem;
    padding-left:.3rem;
}
    .item{
        padding:.3rem;
        border-bottom:1px #edecf2 solid;
    }
.item>p{
    margin-top:.1rem;
    color:#a1a1a1;
}
</style>