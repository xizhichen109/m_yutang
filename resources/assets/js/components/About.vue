<template>
    <div class="about_wrap">
        <div class="about_header">
            <h3>我的</h3>
        </div>
        <div class="about_body">
            <dl>
                <dt><i class="glyphicon glyphicon-user"></i></dt>
                <dd><span>头像设置</span> <i class="glyphicon glyphicon-chevron-right"></i></dd>
            </dl>
            <dl>
                <dt><i class="glyphicon glyphicon-flag"></i></dt>
                <dd><span>我的活动</span> <i class="glyphicon glyphicon-chevron-right"></i></dd>
            </dl> <dl>
            <dt><i class="glyphicon glyphicon-star"></i></dt>
            <dd @click="go"><span>我的收藏</span> <i class="glyphicon glyphicon-chevron-right"></i></dd>
        </dl>

        </div>
    </div>

</template>

<script>
    export default {
        name: "About",
        methods:{
            go(){
                this.$router.push("/my_follows");
            }
        }
    }
</script>

<style scoped>
    .about_header{
        height:4.25rem;
        margin-bottom:.2rem;
    }
    .about_header h3{
        height:1rem;
        line-height:1rem;
        text-align: center;
        border-bottom:1px #e1e1e1 solid;
    }
    .about_body{
        margin-top:.2rem;
        padding:0 .4rem;
    }

    .about_body dl{
        height:1rem;
        display:flex;
    }
    .about_body dd{
        width:6.2rem;
        height:1rem;
        line-height:1rem;
        border-bottom:#ededed 1px solid;

    }
    .about_body dt{
        width:.55rem;
        height:1rem;
        line-height:1rem;

    }
</style>