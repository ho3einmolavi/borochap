<template>
    <div>
        <div class="col-xs col col-sm col-md col-lg col-xl-12  body-main-inside">
            <div class="col-xs col col-sm col-md col-lg col-xl-10 all-page-inside flex d-p-responsive">
                <div class="col-xs col col-sm col-md col-lg col-xl-10 contact-us-inside flex">


                    <div class="col-xs col col-sm col-md col-lg col-xl-6 register-inside-right">
                        <div class="col-xs col col-sm col-md col-lg col-xl-12 contact-us-inside-right-top flex delete-padding">

                            <div class="col-xs col col-sm col-md col-lg col-xl-2 filter-all-right-top-icon delete-padding">
                                <div class="calculate-price delete-padding m-icon">
                                    <img src="/img/icon/register1.png">

                                </div>
                            </div>
                            <div class="col-xs col col-sm col-md col-lg col-xl-10 filter-all-right-top-price delete-padding">
                                <div class="m-price">
                                    <span class=" text-white title-3"> ثبت نام </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 all-Gender flex">
                            <div class="col-xs col-6 col-sm col-md col-lg col-xl-6 all-Gender-right">
                                <form>
                                    <label class="custom-control custom-checkbox ga-accommodation-Hotel">
                                        <input  type="radio" class="custom-control-input accommodation_itm" value="آقا" v-model="gender">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description text-purple-input mester" style="padding-left:0px;">آقا</span>
                                    </label>
                                </form>
                            </div>
                            <div class="col-xs col-6 col-sm col-md col-lg col-xl-6 all-Gender-left">
                                <form style="    margin-left: 34px;">
                                    <label class="custom-control custom-checkbox ga-accommodation-Hotel">
                                        <input class="custom-control-input accommodation_itm" value="خانم" type="radio" v-model="gender">
                                        <span class="custom-control-indicator2"></span>
                                        <span class="custom-control-description" style="left: 30px !important;position: absolute;">خانم</span>
                                    </label>
                                </form>
                            </div>
                        </div>
                        <div class="col-xs col-10 col-sm col-md col-lg col-xl-12 all-description">
                            <div class="form-group col-xs col-10 col-sm col-md col-lg col-xl-11 flex">
                                <label for="inputState" class="text-purple-input">  نام </label>
                                <input type="text" v-model="first_name" class="form-control color-border p-input" id="inputState" placeholder="امیرحسین" style="text-align: center;">
                            </div>
                            <div class="form-group col-xs col-10 col-sm col-md col-lg col-xl-11 flex">
                                <label for="inputState1" class="text-purple-input">  نام  خانولدگی</label>
                                <input type="text" v-model="last_name" class="form-control color-border p-input" id="inputState1" placeholder="محمدی" style="text-align: center;">
                            </div>
                            <div class="form-group col-xs col-10 col-sm col-md col-lg col-xl-11 flex">
                                <label for="inputState2" class="text-purple-input">  شماره همراه </label>
                                <input type="text" v-model="phone" class="form-control color-border p-input" id="inputState2" placeholder=" 09133102418" style="text-align: center;">
                            </div>



                            <div class="col-xs col-10 col-sm col-md col-lg col-xl-10 all-chekbox flex">
                                <div class="col-xs col-12 col-sm col-md col-lg col-xl-6 all-chekbox-right">
                                    <input type="radio" name="gender" v-model="type" value="ناشر"> ناشر <br>
                                    <input type="radio" name="gender" v-model="type" value="مولف "> مولف  <br>
                                    <input type="radio" name="gender" v-model="type" value="استاد"> استاد <br>


                                </div>
                                <div class="col-xs col-12 col-sm col-md col-lg col-xl-6 all-chekbox-left">
                                    <input type="radio" name="gender" v-model="type" value="چاپخانه">  چاپخانه  <br>
                                    <input type="radio" name="gender" v-model="type" value="دانشجو"> دانشجو <br>
                                    <input type="radio" name="gender" v-model="type" value="سایر"> سایر<br>

                                </div>
                            </div>



                        </div>
                    </div>


                    <div class="col-xs col col-sm col-md col-lg col-xl-6 register-inside-left">
                        <div class="col-xs col col-sm col-md col-lg col-xl-12 register-inside-left-top">
                            <div v-if="type === 'ناشر'" class="form-group col-xs col-10 col-sm col-md col-lg col-xl-11 flex">
                                <label for="inputState3" class="text-purple-input"> نام انتشارات  </label>
                                <input type="text" v-model="printing_office" class="form-control color-border p-input" id="inputState3" placeholder="پارسیان" style="text-align: center;">
                            </div>
                            <div v-if="type === 'چاپخانه'" class="form-group col-xs col-10 col-sm col-md col-lg col-xl-11 flex">
                                <label for="inputState3" class="text-purple-input"> نام چاپخانه  </label>
                                <input type="text" v-model="printing_office" class="form-control color-border p-input" id="inputState3" placeholder="پارسیان" style="text-align: center;">
                            </div>
                                 <div class="form-group col-xs col-10 col-sm col-md col-lg col-xl-11 flex">
                                      <label for="inputState4" class="text-purple-input">  ایمیل(اختیاری) </label>
                                      <input type="text" v-model="email" class="form-control color-border p-input" id="inputState4" placeholder="ایمیل خود را وارد کنید" style="text-align: center;">
                                 </div>
                                <div class="form-group col-xs col-10 col-sm col-md col-lg col-xl-11 flex">
                                <label for="inputState4" class="text-purple-input">  نام  کاربری</label>
                                <input type="text" v-model="phone" class="form-control color-border p-input" id="inputState4" placeholder="09133102418" style="text-align: center;">
                            </div>

                            <div class="form-group col-xs col-10 col-sm col-md col-lg col-xl-11 flex">
                                <label for="inputState5" class="text-purple-input">  گذرواژه </label>
                                <input type="password" v-model="password" class="form-control color-border p-input" id="inputState5" placeholder="******" style="text-align: center;">
                            </div>
                            <div class="form-group col-xs col-10 col-sm col-md col-lg col-xl-11 flex">
                                <label for="inputState6"  class="text-purple-input">  تکرار گذرواژه </label>
                                <input type="password" v-model="confirm" class="form-control color-border p-input" id="inputState6" placeholder="******" style="text-align: center;">
                            </div>
                        </div>

                        <div class="form-group col-xs col-10 col-sm col-md col-lg col-xl-10 flex send-img">
                            <!--<a href="#"><span class="title-4">  ارسال تصویر مجوز انتشارات /چاپخانه </span></a>-->
                            <div class="custom-file" v-if="type === 'ناشر'">

                                <input type="file" id="customFile" class="custom-file-input" ref="file" @change="handle">
                                <label for="customFile" class="custom-file-label" style="margin-right: 15px; margin-top: 1px;text-align: right;padding-right: 58px;">
                                    تصویر مجوز انتشارات
                                </label>
                            </div>

                            <div class="custom-file" v-if="type === 'چاپخانه'">

                                <input type="file" id="customFile1" class="custom-file-input" ref="file" @change="handle">
                                <label for="customFile1" class="custom-file-label" style="margin-right: 15px; margin-top: 1px;text-align: right;padding-right: 58px;">
                                    تصویر مجوز چاپخانه
                                </label>
                            </div>

                        </div>
                        <div class="col-xs col-10 col-sm col-md col-lg col-xl-11 send-info-register">
                            <button type="button" @click="register" class="send-register">ارسال</button>
                        </div>

                        <div class="alert alert-success form-control color-border p-input" v-if="ok1 === 1" role="alert" style="margin-top: 71px;height: auto;float: right">
                            ثبت نام شما با موفقیت انجام شد
                        </div>

                        <div class="alert alert-danger form-control color-border p-input" v-if="ok1 === 0" role="alert" style="margin-top: 71px;height: auto;float: right">
                            {{errors.data}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        el: 'app1' ,
        created() {
            console.log('Component mounted.')
        } ,
        data () {
            return {
                password: '' ,
                confirm: '' ,
                phone: '' ,
                first_name: '' ,
                email: '' ,
                last_name: '' ,
                gender: '' ,
                printing_office: '' ,
                ok: 0 ,
                ok1: '' ,
                errors: [] ,
                type: '' ,
                user_file: ''
            }

        } ,
        methods: {
            handle() {
                this.user_file = this.$refs.file.files[0];
            } ,
            register() {
                // let data = {} ;
                // if (this.user_file === '' || this.user_file === null)
                // {
                //     data =
                // }
                let data = new FormData();
                data.append('password' , this.password);
                data.append('confirm' , this.confirm);
                data.append('phone' , this.phone);
                data.append('first_name' , this.first_name);
                data.append('last_name' , this.last_name);
                data.append('email' , this.email);
                data.append('gender' , this.gender);
                data.append('printing_office' , this.printing_office);
                data.append('file' , this.user_file);
                axios({
                    method: 'post' ,
                    url: '/api/register' ,
                    data: data
                })
                    .then(res => {
                        console.log(res);
                        this.ok = 1;
                        this.ok1 = 1;
                        localStorage.setItem('token' , res.data.api_token);
                        window.location = '/';
                    })
                    .catch(err => {
                        console.log(err.response);
                        this.ok = 0;
                        this.ok1 = 0;
                        this.errors = err.response
                    })
            }
        }
    }
</script>
