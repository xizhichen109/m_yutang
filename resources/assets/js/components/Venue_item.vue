<template>
    <div>
        <div class="item" @click = "go(venue.id)">
            <div class="pic"><img src="/images/venue_m_icon.jpg"></div>
            <div class="txt">
                <h3>{{venue.name}}</h3>
                <p class="type">{{venue.type_id}}</p>
                <p class="area"><span>朝阳区</span>  <span>32.6km</span></p>
                <p class="order"><span>线上预定</span>  <span class="price">￥10元起/时</span></p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Venue_item",
        props:["venue"],
        methods:{
            go(id){
                this.$router.push({name:'detail',params:{id:id}});
            }
        }
    }
</script>

<style scoped>
    .item{
        padding:.3rem 0;
        border-bottom:1px #e7e7e7 solid;
        display:flex;
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
        line-height:.45rem;
    }
    .txt h3{
        font-weight:normal;
        font-size:.40rem;
        color:#000;
    }
    .txt .type{
        font-size:.25rem;
    }

    .txt .area{
        padding-bottom:.1rem;
        border-bottom:1px solid #eaeaea;
    }
    .area,.order{
        display:flex;
        justify-content:space-between;
        align-items: center;
    }
    .order{
        height:.8rem;
    }
    .order .price{
        color: #ff6700;
    }
</style>