<template>
    <div class="detail">
        <div class="detail_header">
            <div class="title">
                <h3>{{venue.name}}</h3>
                <!--灰色表示已关注，需要取消关注   红色表示未关注，需要进行关注-->
                <img src="images/shoucan.png" alt="" @click="follow(venue.id)" v-show="!is_follow">
                <img src="images/shoucang.png" alt="" @click="unfollow(venue.id)" v-show="is_follow">
            </div>
            <div class="item">
                <div class="pic">
                    <img src="images/venue_m_icon.jpg" alt="">
                </div>
                <div class="txt">

                    <p>{{venue.address}}</p>
                    <p>营业时间：09:00--22:00</p>
                </div>
            </div>
            <div class="tel">
                <span>{{venue.tel}}</span>
                <span class="glyphicon glyphicon-earphone tel_icon"></span>
            </div>
        </div>
        <div class="detail_body">
            <div class="des">{{venue.des}}</div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Detail",
        data(){
            return{
                is_follow:false,
                base_url:"http://www.yutang.test",
                venue:{}
            }
        },
        created(){
            let id = this.$route.params.id;
            axios.get(this.base_url+"/venue/m_detail/"+id).then((res)=>{
                //console.log(res);
                this.venue=res.data;
                /*重置is_follow*/
                this.is_follow = this.venue.is_follow;
            })
        },
        methods:{
            follow(id){
                axios.get(this.base_url+"/venue/m_follow/"+id).then((res)=>{
                    if(res.data.status=="200"){
                        this.is_follow = !this.is_follow;
                        alert(res.data.msg);
                    }
                })
            },
            unfollow(id){
                axios.get(this.base_url+"/venue/m_unfollow/"+id).then((res)=>{
                    if(res.data.status=="200"){
                        this.is_follow = !this.is_follow;
                        alert(res.data.msg);
                    }
                })
            }
        }
    }
</script>

<style scoped>
    .title{
        height:1rem;
        border-bottom:1px solid gray;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top:.2rem;
        padding-left:.3rem;
    }
    .title>img{
        width:.6rem;
        height:.6rem;
    }

    .detail_header{
        padding:0 .3rem;
        border-bottom:1px #e9e9e9 solid;
    }
    .detail_header h3{
        font-size:.32rem;
    }
    .tel{
        height:1.08rem;
        display:flex;
        justify-content:space-between;
        align-items:center;
    }
    .tel_icon{
        color:#56a5e7;
    }
    .item{
        padding:.3rem 0;
        display: flex;
        border-bottom:1px #ececec solid;
    }
    .item .pic{
        width:2rem;
    }
    .item .pic>img{
        width:100%;
    }

    .item>.txt{
        width:4.63rem;
        margin-left:.3rem;
    }
    .des{
        padding:.3rem;
    }
</style>