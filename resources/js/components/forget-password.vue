<template>
    <div>
        <div class="col-xs col col-sm col-md col-lg col-xl-12 forget-pass">
            <div class="col-xs col col-sm col-md col-lg col-xl-4 forget-pass-inside">
                <div class="col-xs col col-sm col-md col-lg col-xl-12 input-login">
                    <div class="col-xs col col-sm col-md col-lg col-xl-12 input-login-top">
                        <span>  فراموشی رمز عبور </span>
                    </div>
                    <div class="col-xs col col-sm col-md col-lg col-xl-12 input-login-bottom">
                        <div class="form-group col-xs col-10 col-sm col-md col-lg col-xl-12 flex delete-padding">
                            <label for="inputState1" class="text-purple-input" style="width: 80px;"> شماره همراه   </label>
                            <input type="text" v-model="phone" class="form-control color-border p-input" id="inputState1" placeholder="شماره همراه خود را وارد کنید" style="text-align: center;">
                        </div>
                        <div class="alert alert-danger color-border p-input" v-if="error === 0" role="alert" style="margin-top: 71px;height: auto;float: right">
                            {{errors.data}}
                        </div>
                        <div class="alert alert-success color-border p-input" v-if="error === 1" role="alert" style="margin-top: 71px;height: auto;float: right">
                            {{data}}
                        </div>
                        <div style="cursor: pointer" class="col-xs col col-sm col-md col-lg col-xl-12 login-inside">
                            <a @click="getCode"><span> ارسال </span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="ok === 1" class="col-xs col col-sm col-md col-lg col-xl-4 forget-pass-inside">
                <div class="col-xs col col-sm col-md col-lg col-xl-12 input-login">
                    <div class="col-xs col col-sm col-md col-lg col-xl-12 input-login-top">
                        <span>  کد تایید </span>
                    </div>
                    <div class="col-xs col col-sm col-md col-lg col-xl-12 input-login-bottom">
                        <div class="form-group col-xs col-10 col-sm col-md col-lg col-xl-12 flex delete-padding">
                            <label for="inputState2" class="text-purple-input" style="width: 80px;"> کد ارسال شده   </label>
                            <input type="text" v-model="code" class="form-control color-border p-input" id="inputState2" placeholder="شماره همراه خود را وارد کنید" style="text-align: center;">
                        </div>
                        <div class="alert alert-danger color-border p-input" v-if="error1 === 0" role="alert" style="margin-top: 71px;height: auto;float: right">
                            {{errors.data}}
                        </div>
                        <div class="alert alert-success color-border p-input" v-if="error1 === 1" role="alert" style="margin-top: 71px;height: auto;float: right">
                            {{data1}}
                        </div>
                        <div style="cursor: pointer" class="col-xs col col-sm col-md col-lg col-xl-12 login-inside">
                            <a @click="verify"><span> ارسال </span></a>
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
            console.log('forget password mounted.')
        } ,
        data() {
            return {
                phone: '' ,
                errors: '' ,
                ok: '' ,
                code: '' ,
                error: '' ,
                error1: '' ,
                data: '' ,
                data1: '' ,
            }
        } ,
        methods: {
            getCode() {
                axios({
                    url: '/api/getcode' ,
                    method: 'post' ,
                    data: {
                        phone: this.phone
                    }
                })
                    .then(res => {
                        console.log(res);
                        this.ok = 1;
                        this.error = 1;
                        this.data = res.data
                    })
                    .catch(err => {
                        console.log(err.response);
                        this.errors = err.response;
                        this.ok = 0;
                        this.error = 0;
                    })
            } ,
            verify() {
                axios({
                    url: '/api/verification' ,
                    method: 'post' ,
                    data: {
                        phone: this.phone ,
                        code: this.code
                    }
                })
                    .then(res => {
                        console.log(res);
                        this.error1 = 1;
                        this.data1 = res.data;
                        localStorage.setItem('phone' , this.phone);
                        window.location = '/reset-password' ;
                    })
                    .catch(err => {
                        console.log(err.response);
                        this.errors = err.response;
                        this.error1 = 0;
                    })
            }
        }
    }
</script>


