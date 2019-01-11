
<template>
    <div class="game_wrap">
        <div class="game_header">
            发布活动>>
        </div>
        <div class="game_body">
            <div class="types">
                <mt-radio
                        title="活动项目"
                        v-model="value"
                        :options="types">
                </mt-radio>
            </div>
            <div class="date_time" @click="select">
                <span>时间</span>
                <span>{{val}}<i class="glyphicon glyphicon-menu-right"></i></span>
            </div>
            <div class="venue" @click="sel_venue">
                <span>地点</span>
                <span>{{address}}<i class="glyphicon glyphicon-menu-right"></i></span>
            </div>
        </div>
        <mt-datetime-picker
                @confirm="on_confirm"
                ref="picker"
                type="datetime"
                v-model="pickerValue">
        </mt-datetime-picker>
    </div>
</template>

<script>
    export default {
        name: "Create_game",

        data(){
            return {
                val:"请选择",
                address:"请选择",
                "types":["篮球","足球","台球","羽毛球"],
                base_url:"http://www.yutang.test",
                value:"篮球",
                pickerValue:"",
                form_data:{
                    name:"",
                    venue_id:"",
                    des:"",
                    start_date:"",
                    start_time:"",
                    hours:"",
                    close_time:"",
                    price:"",
                    user_num:""
                }
            }

        },
        created(){


            if(this.$route.params.address){
                this.address = this.$route.params.address;
            }

        },
        methods:{
            sel_venue(){
                this.$router.push("/sel_venue");
            },
            save_form(){
                //console.log(this.form_data);
                axios.post(this.base_url+"/game/m_save",this.form_data).then((res)=>{
                    //console.log(res);
                    if(res.data.status=="200"){
                        alert("保存成功");
                    }
                })
            },
            select(){
                //打开时间组件
                this.$refs.picker.open();
            },
            on_confirm(val){
                var d = new Date(val);
                //转换标准时间格式
                this.val = d.getFullYear() + '-' + (d.getMonth() + 1) + '-' + d.getDate() + ' ' + d.getHours() + ':' + d.getMinutes() + ':' + d.getSeconds();

            }
        }
    }
</script>

<style scoped>

    .game_header{
        font-size:.36rem;
        height: 1rem;
        background-color: #eee;
        line-height: 1rem;
        padding-left:.3rem;
    }
    .game_body{
        padding:.3rem;

    }
    .date_time,.venue{
        height:.9rem;
        display:flex;
        justify-content: space-between;
        align-items:center;
        border-bottom:1px #efefef solid;
    }

</style>