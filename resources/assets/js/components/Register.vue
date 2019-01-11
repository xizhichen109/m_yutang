<template>
    <div class="register">
        <form>
            <div class="form-group" :class="{'has-error':errors.has('user')}">
                <label>用户名</label>
                <input data-vv-as="用户名" type="text" name="user" class="form-control" v-validate="{ required:true, min:6}" />
                <span class="help-block" v-show="errors.has('user')">{{errors.first('user')}}</span>
            </div>
            <div class="form-group">
                <label>邮箱</label>
                <input type="text" name="email" class="form-control" v-validate="'required|email'" />
                <span class="help-block" v-show="errors.has('email')">{{errors.first('email')}}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-info" @click.prevent="submit">注册</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "Register",
        methods:{
            submit(){
                //对当前表单中所有验证规则进行验证，所有都通过验证 result返回bool真
                this.$validator.validateAll().then((result)=>{
                    if(result){
                        console.log("submit");
                    }else{
                        console.log("error");
                        return false;
                    }
                })
            }
        }
    }
</script>

<style scoped>
    .register{
        padding:.3rem;
    }
</style>