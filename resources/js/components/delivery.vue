<template>
    <div>
        <div class="col-xs col col-sm col-md col-lg col-xl-12 body-main-inside delete-padding">
            <div class="col-xs col col-sm col-md col-lg col-xl-10 all-page-inside flex d-p-responsive">
                <div class="col-xs col col-sm col-md col-lg col-xl-11 contact-us-inside flex">



                    <div class="col-xs col col-sm col-md-7 col-lg col-xl-7 delivery-inside-right">
                        <div class="col-xs col col-sm col-md col-lg col-xl-12 contact-us-inside-right-top flex delete-padding">

                            <div class="col-xs col col-sm col-md col-lg col-xl-2 filter-all-right-top-icon delete-padding">
                                <div class="calculate-price delete-padding m-icon">
                                    <img src="/img/icon/tee.png">

                                </div>
                            </div>
                            <div class="col-xs col col-sm col-md col-lg col-xl-10 filter-all-right-top-price delete-padding">
                                <div class="m-price">
                                    <span class="text-white title-3">  تحویل </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs col col-sm col-md col-lg col-xl-12 delivery-all">

                            <div class="col-xs col col-sm col-md col-lg col-xl-12 delivery-all-bottom">
                                <div class="form-group col-xs col-7 col-sm col-md col-lg col-xl-12 flex">
                                    <label for="inputState20" class="text-purple-input"> نام تحویل گیرنده </label>
                                    <input type="text" v-model="fullName"  class="form-control color-border p-input" id="inputState20" placeholder="" style="text-align: center;">
                                </div>
                                <div class="form-group col-xs col-7 col-sm col-md col-lg col-xl-12 flex">
                                    <label for="inputState1" class="text-purple-input" style="font-size: 12px;margin-top: 5px;">  نام چاپخانه یا انتشارات </label>
                                    <input type="text" v-model="userData.printing_office" class="form-control color-border p-input" id="inputState1" placeholder="" style="text-align: center;">
                                </div>
                                <div class="form-group col-xs col-7 col-sm col-md col-lg col-xl-12 flex">
                                    <label for="inputState2" class="text-purple-input"> تلفن همراه </label>
                                    <input type="text" v-model="userData.phone"  class="form-control color-border p-input" id="inputState2" placeholder="" style="text-align: center;">
                                </div>
                                <div class="form-group col-xs col-7 col-sm col-md col-lg col-xl-12 flex">
                                    <label for="inputState" class="text-purple-input">  شماره ثابت </label>
                                    <input type="text" v-model="userData.printing_office_number" class="form-control color-border p-input" id="inputState " placeholder="" style="text-align: center;">
                                </div>
                                <div class="form-group col-xs col-7 col-sm col-md col-lg col-xl-12 flex">
                                    <label for="inputState3" class="text-purple-input">   آدرس دقیق </label>
                                    <input type="text" v-model="userData.address" value="اصفهان , خیابان بزرگمهر , کوچه ..." class="form-control color-border p-input" id="inputState3" placeholder="" style="text-align: center;">
                                </div>
                                <div class="form-group col-xs col-7 col-sm col-md col-lg col-xl-12 flex">
                                    <label for="inputState" class="text-purple-input"> کد پستی </label>
                                    <input type="text" v-model="userData.postal_code" value="302453268" class="form-control color-border p-input" id="inputState" placeholder="" style="text-align: center;">
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="col-xs col col-sm col-md-5 col-lg col-xl-5 delivery-inside-left">
                        <div class="col-xs col col-sm col-md col-lg col-xl-12 delivery-inside-left-inside">
                            <form action="/action_page.php">
                                <div class="col-xs col col-sm col-md col-lg col-xl delivery-inside-left-inside-1">
                                 <input type="radio" v-model="delivery" name="gender" value="دریافت به صورت حضوری ">  دریافت به صورت حضوری <br>
                             </div>
                             <div class="col-xs col- col-sm col-md col-lg col-xl delivery-inside-left-inside-2">
                                 <input type="radio" v-model="delivery" name="gender" value="ارسال به آدرس مشتری"> ارسال به آدرس مشتری <br>
                             </div>
                            </form>
                        </div>

                        <div class="col-xs col-10 col-sm col-md col-lg col-xl-11 send-info-register-delivery">
                            <input type="button" value="مرحله بعد" v-on:click="edit"  class="btn-btn" style="">
                        </div>

                        <div class="alert alert-success form-control color-border p-input" v-if="ok === 1" role="alert" style="margin-top: 71px;height: auto;float: right">
                            اطلاعات شما تکمیل شد لطفا دکمه ادامه را بزنید
                        </div>

                        <div class="alert alert-danger form-control color-border p-input" v-if="ok === 0" role="alert" style="margin-top: 71px;height: auto;float: right">
                            {{errors.data}}
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="ok === 1" class="col-xs col col-sm col-md col-lg col-xl-12 send-input" style="display: flex;align-items: center;justify-content: flex-end;height: 45px;">
                <div class="col-xs col-4 col-sm-3 col-md-2 col-lg-1 col-xl-1 send-input-inside" style="height: 45px;background-color:#7c1065;;border-radius: 5px;display: flex;align-items: center;justify-content: flex-end;margin-top: 85px;margin-left: 160px">
                    <a href="/pay"  style="width: 146px;color: #fff;text-align: center;">
                        ادامه
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        created() {
            console.log('delivery mounted');
            this.get_user();
        } ,
        data() {
            return {
                userData: '' ,
                fullName: '' ,
                ok: '' ,
                delivery: '' ,
                errors: []
            }
        } ,

        methods: {
            get_user() {
                axios({
                    method: 'get' ,
                    url: '/api/user' ,
                    headers: {
                        Accept: 'application/json' ,
                        Authorization: `Bearer ${localStorage.token}`
                    }
                })
                    .then(res => {
                        console.log(res);
                        localStorage.setItem('user' , JSON.stringify(res.data));
                        this.userData = res.data;
                        this.fullName = `${this.userData.first_name }  ${this.userData.last_name}`

                    })
                    .catch(err => {
                        console.log(err.response);
                    });
            } ,
            edit() {
                axios({
                    method: 'post' ,
                    url: '/api/edit' ,
                    data:{
                        first_name: this.userData.first_name ,
                        last_name: this.userData.last_name ,
                        address: this.userData.address ,
                        postal_code: this.userData.postal_code ,
                        printing_office: this.userData.printing_office ,
                        printing_office_number: this.userData.printing_office_number ,
                        delivery: this.delivery ,
                        phone: this.userData.phone
                    } ,
                    headers: {
                        Accept: 'application/json' ,
                        Authorization: `Bearer ${localStorage.token}`
                    }
                })
                    .then(res => {
                        console.log(res);
                        localStorage.setItem('user' , JSON.stringify(res.data));
                        this.ok = 1;
                        this.get_user();
                    })
                    .catch(err => {
                        console.log(err.response);
                        this.ok = 0;
                        this.errors = err.response;
                    })
            }
        }
    }
</script>
