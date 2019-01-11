<template>
    <div class="search_wrap">
        <search_input @my_click="get_data"></search_input>
        <div class="search_list">
            <template class="item" v-for="item in list">
                <venue_item :venue="item"></venue_item>
            </template>
        </div>
    </div>

</template>

<script>
    export default {
        name: "Search",
        data(){
            return {
                list:[]

            }
        },
        methods:{
            get_data(list){
                this.list = list;

            }
        }
    }
</script>

<style scoped>
.search_list{
    padding:0 .3rem;
    padding-top:1rem;
}
</style>