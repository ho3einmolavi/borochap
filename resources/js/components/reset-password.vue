<template>
    <div>
        <div class="col-md-12 forget-pass">
            <div class="col-md-4 forget-pass-inside">
                <div class="col-md-12 input-login">
                    <div class="col-md-12 input-login-top">
                        <span>  تغییر رمز عبور </span>
                    </div>
                    <div class="col-md-12 input-login-bottom">
                        <div class="form-group col-md-12 col-10 flex delete-padding">
                            <label for="inputState2" class="text-purple-input" style="width: 80px;"> رمز عبور جدید   </label>
                            <input type="password" v-model="new1" class="form-control color-border p-input" id="inputState2" placeholder="رمز عبور جدید را وارد کنید" style="text-align: center;">
                        </div>
                        <div class="form-group col-md-12 col-10 flex delete-padding">
                            <label for="inputState3" class="text-purple-input" style="width: 80px;"> تکرار عبور جدید   </label>
                            <input type="password" v-model="confirm" class="form-control color-border p-input" id="inputState3" placeholder="تکرار رمز عبور جدید" style="text-align: center;">
                        </div>
                        <div class="alert alert-danger form-group col-md-12 col-10 flex delete-padding" v-if="ok === 0" role="alert" style="margin-top: 71px;height: auto;float: right">
                            {{errors.data}}
                        </div>
                        <div class="alert alert-success form-group col-md-12 col-10 flex delete-padding" v-if="ok === 1" role="alert" style="margin-top: 71px;height: auto;float: right">
                            {{data}}
                        </div>
                        <div style="cursor: pointer" class="col-md-12 login-inside">
                            <a @click="reset"><span> تایید </span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('reset mounted.')
        } ,
        data() {
            return {
                old: '' ,
                new1: '' ,
                confirm: '' ,
                ok: '' ,
                errors: '' ,
                data: ''
            }
        } ,
        methods: {
            reset() {
                axios({
                    url: '/api/changePassword' ,
                    method: 'post' ,
                    data: {
                        phone: localStorage.getItem('phone') ,
                        new: this.new1 ,
                        confirm: this.confirm
                    } ,
                    headers: {
                        accept: 'application/json' ,
                        Authorization: `Bearer ${localStorage.token}`
                    }
                })
                    .then(res => {
                        console.log(res);
                        this.ok = 1;
                        this.data = res.data ;
                        localStorage.removeItem('phone');
                        window.location = '/login' ;
                    })
                    .catch(err => {
                        console.log(err.response);
                        this.errors = err.response;
                        this.ok = 0;
                    })
            }
        }
    }
</script>
