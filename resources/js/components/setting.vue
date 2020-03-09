<template>
    <div>
        <form class="needs-validation" novalidate="">

            <div class="form-group col-md-12">
                <label for="inputname">عنوان سایت </label>
                <input type="text" v-model="setting_data.title" class="form-control" id="inputname" placeholder="عنوان سایت را وارد کنید">
            </div>
            <div class="form-group col-md-12">
                <label for="validationTextarea"> توضیحات وب سایت </label>
                <textarea class="form-control" v-model="setting_data.description" id="validationTextarea" placeholder="توضیحات مربوط به سایت را وارد کنید" required=""></textarea>
                <div class="invalid-feedback">
                    لطفا توضیحات  دسته را واد کنید
                </div>
            </div>


            <div class="form-group col-md-12">
                <label for="validationTextareaa"> متن footer سایت </label>
                <textarea class="form-control" v-model="setting_data.footer_text" id="validationTextareaa" placeholder="متن را وارد کنید مثال: برو چاپ یکی از بزرگترین و معتبرترین مراکز چاپ انلاین کشور می باشد. که با اتکا به محصولات با کیفیت و قیمت رقابتی پا به عرصه فروش آنلاین در ایران گذاشته است و فعالیت خود را در زمینه  چاپ از سال 1397 آغاز کرد" required=""></textarea>
                <div class="invalid-feedback">
                    لطفا توضیحات  دسته را واد کنید
                </div>
            </div>


            <div class="form-group col-md-12">
                <label for="inputEmail4"> کلمات کلیدی</label>
                <textarea class="form-control" id="inputEmail4" v-model="setting_data.keywords" placeholder=" کلمات کلیدی را با کاما از هم جدا کنید. مثال کتاب,چاپ,اصفهان" required=""></textarea>
                <div class="invalid-feedback">
                    لطفا توضیحات  دسته را واد کنید
                </div>
            </div>

            <div class="form-group col-md-12">
                <label for="inputEmail43"> آدرس </label>
                <textarea class="form-control" v-model="setting_data.address" id="inputEmail43" placeholder=" آدرس خود را وارد کنید" required=""></textarea>
                <div class="invalid-feedback">
                    آدرس خود را وارد کنید
                </div>
            </div>


            <div class="form-group col-md-12">
                <label for="inputname1"> شماره تماس مشاوره </label>
                <input type="text" class="form-control" v-model="setting_data.consultant_mobile" id="inputname1" placeholder="شماره تماس  مشاوره">
            </div>
            <div class="form-group col-md-12">
                <label for="inputname2"> داخلی مشاور </label>
                <input type="text" v-model="setting_data.consultant_number" class="form-control" id="inputname2" placeholder="شماره داخلی مشاور را وارد کنید">
            </div>

            <div class="form-group col-md-12">
                <label for="inputname3"> ارتباط از طریق تلگرام </label>
                <input type="text" class="form-control" id="inputname3" v-model="setting_data.telegram" placeholder="شماره را وارد کنید">
            </div>


            <div class="form-group col-md-12">
                <label for="inputname4">ایمیل</label>
                <input type="text" class="form-control" v-model="setting_data.email" id="inputname4" placeholder="آدرس ایمیل را وارد کنید">
            </div>
            <div class="form-group col-md-12">
                <label for="inputname5">ایمیل  info</label>
                <input type="text" class="form-control" v-model="setting_data.email_info" id="inputname5" placeholder="آدرس ایمیل را وارد کنید">
            </div>
            <div class="form-group col-md-12">
                <label for="inputname6">  اینستاگرام </label>
                <input type="text" class="form-control" v-model="setting_data.instagram" id="inputname6" placeholder="آدرس  اینستاگرام خود را وارد کنید">
            </div>
            <div class="form-group col-md-12">
                <label for="inputname7"> شماره حساب </label>
                <input type="text" class="form-control" id="inputname7" v-model="setting_data.account_number" placeholder="شماره حساب بانکی خود را وارد کنید">
            </div>
            <div class="form-group col-md-12">
                <label for="inputname8">  شماره کارت </label>
                <input type="text" class="form-control" v-model="setting_data.card_number" id="inputname8" placeholder="شماره کارت هود را وارد کنید">
            </div>
            <div class="form-group col-md-12">
                <label for="inputname9"> دارنده حساب  </label>
                <input type="text" class="form-control" v-model="setting_data.account_owner" id="inputname9" placeholder="نام دارنده حساب را همراه با بانک وارد کنید. مثال بانک ملت-حسین مولوی">
            </div>
            <div class="custom-file" style="margin-top: 25px;text-align: left;margin-right: 15px;">
                <input type="file" class="custom-file-input" id="logo1" ref="logo" v-on:change="handle">
                <label class="custom-file-label" for="logo1"> عکس لوگو را آپلود کنید  </label>
            </div>
            <button class="btn btn-primary" v-on:click="get_setting" type="button" style="margin-top: 20px;font-size: 13px;margin-right: 15px;">  ذخیره تغییرات </button>
        </form>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.update_local();
            console.log('setting mounted.');
        } ,
        data() {
            return {

                setting_data: {
                    title: '' ,
                    description: '' ,
                    keywords: '' ,
                    address: '' ,
                    consultant_mobile: '' ,
                    consultant_number: '' ,
                    telegram: '',
                    email: '' ,
                    email_info: '' ,
                    instagram: '' ,
                    footer_text: '' ,
                    account_number: '' ,
                    card_number: '' ,
                    account_owner: '' ,
                    logo1: ''
                }
            }
        } ,

        methods: {
            update_local() {
                axios({
                    url: '/api/setting/index' ,
                    method: 'get' ,
                    headers: {
                        accept: 'application/json'
                    } ,
                })
                    .then(res => {
                        this.setting_data = res.data[0];

                    })
                    .catch(err => {
                        console.log(err.response);
                    })
            } ,
            handle() {
               this.logo1 = this.$refs.logo.files[0];
               this.logo(this.logo1)
            } ,
            logo(file) {
                let data = new FormData();
                if (file !== '' && file !== null)
                {
                    data.append('logo' , file);
                    axios({
                        url: '/api/logo' ,
                        method: 'post' ,
                        headers: {
                            accept: 'application/json'
                        } ,
                        data: data
                    })
                        .then(res => {
                            console.log(res.data);
                            localStorage.setItem('setting' , JSON.stringify(res.data));
                            this.$swal('تغییرات با موفقیت اعمال شد' , '' , 'success');
                        })
                        .catch(err => {
                            console.log(err.response);
                            this.$swal('فایل انتخاب شده قابل ارسال نیست' , '' , 'error');
                        })
                }
                else
                {
                    this.$swal('فایل انتخاب شده قابل ارسال نیست' , '' , 'error');
                }

            } ,
            get_setting() {
                axios({
                    url: '/api/setting' ,
                    method: 'post' ,
                    headers: {
                        accept: 'application/json'
                    } ,
                    data: {
                        title: this.setting_data.title ,
                        description: this.setting_data.description ,
                        keywords: this.setting_data.keywords ,
                        address: this.setting_data.address ,
                        consultant_mobile: this.setting_data.consultant_mobile ,
                        consultant_number: this.setting_data.consultant_number ,
                        telegram: this.setting_data.telegram,
                        email: this.setting_data.email ,
                        email_info: this.setting_data.email_info ,
                        instagram: this.setting_data.instagram ,
                        account_number: this.setting_data.account_number ,
                        card_number: this.setting_data.card_number ,
                        account_owner: this.setting_data.account_owner ,
                        footer_text: this.setting_data.footer_text


                    }
                })
                    .then(res => {
                        console.log(res);
                        this.setting_data = res.data;
                        localStorage.setItem('setting' , JSON.stringify(res.data));
                        this.$swal('تغییرات با موفقیت اعمال شد' , '' , 'success');
                    })
                    .catch(err => console.log(err.response))
            }
        }
    }
</script>
