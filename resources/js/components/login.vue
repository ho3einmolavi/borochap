<template>
    <div>
        <div class="col-xs col col-sm col-md col-lg col-xl-12 body-main-inside">
            <div class="col-xs col col-sm col-md col-lg col-xl-10 all-page-inside">
                <div class="col-xs col col-sm col-md col-lg col-xl-10 contact-us-inside flex">


                    <div class="col-xs col col-sm col-md col-lg col-xl-6 pay-inside-right">
                        <div class="col-xs col col-sm col-md col-lg col-xl-12 contact-us-inside-right-top flex delete-padding">

                            <div class="col-xs col col-sm col-md col-lg col-xl-2 filter-all-right-top-icon delete-padding">
                                <div class="calculate-price delete-padding m-icon">
                                    <img src="img/icon/register1.png">

                                </div>
                            </div>
                            <div class="col-xs col col-sm col-md col-lg col-xl-10 filter-all-right-top-price delete-padding">
                                <div class="m-price">
                                    <span class=" text-white title-3">  ورود / ثبت نام </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs col col-sm col-md col-lg col-xl-12 login-inside-right-main">
                            <div class="col-xs col col-sm col-md col-lg col-xl-12 input-login">
                                <div class="col-xs col col-sm col-md col-lg col-xl-12 input-login-top">
                                    <span>  ورود  </span>
                                </div>
                                <div class="col-xs col col-sm col-md col-lg col-xl-12 input-login-bottom">
                                    <div class="form-group col-xs col col-sm col-md col-lg col-xl-12 flex delete-padding">
                                        <label for="inputname" class="text-purple-input">  نام  کاربری</label>
                                        <input type="text" class="form-control color-border p-input" v-model="username" id="inputname" placeholder="09133102418" style="text-align: center;">
                                    </div>
                                    <div class="form-group col-xs col col-sm col-md col-lg col-xl-12 flex delete-padding">
                                        <label for="inputname1" class="text-purple-input"> گذرواژه </label>
                                        <input type="password" class="form-control color-border p-input" v-model="password" id="inputname1" placeholder="********" style="text-align: center;">
                                    </div>
                                    <div class="form-group col-xs col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10 flex delete-padding">
                                        <div class="alert alert-danger form-control color-border p-input" v-if="ok === 0" role="alert" style="margin-top: 20px;height: auto;float: right;text-align: right;
font-size: 12px;">
                                            {{errors.data}}
                                        </div>
                                    </div>

                                    <div class="col-xs col col-sm col-md col-lg col-xl-12 login-inside">
                                        <a @click="login" style="cursor: pointer"><span> ورود </span></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-xs col col-sm col-md col-lg col-xl-6 login-inside-left">
                        <div class="login-inside-left-inside">
                            <div class="col-xs col col-sm col-md col-lg col-xl-12 forget-password">
                                <a href="/forget-password"><span class="title-4">   گذرواژه خود را فراموش کرده ام </span></a>
                            </div>
                            <div class="col-xs col col-sm col-md col-lg col-xl-12 no-register">
                                <a href="/register"><span class="title-4">  ثبت نام جدید  </span></a>
                            </div>
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
            console.log('login mounted.')
        } ,
        data() {
            return {
                username: '' ,
                password: '' ,
                ok: '' ,
                errors: ''
            }
        } ,
        methods: {
            login() {
                axios({
                    url: '/api/login' ,
                    method: 'post' ,
                    data: {
                        username: this.username ,
                        password: this.password
                    }
                })
                    .then(res => {
                        console.log(res);
                        localStorage.setItem('user' , res.data);
                        localStorage.setItem('token' , res.data.api_token);
                        window.location = '/'
                    })
                    .catch(err => {
                        console.log(err.response);
                        this.ok = 0 ;
                        this.errors = err.response;
                    })
            }
        }
    }
</script>
