<template>
    <div class="col-xs col-sm col col-md col-lg col-xl-12 body-main-inside">
        <div class="col-xs col-sm col col-md col-lg col-xl-10 all-page-inside">
            <div class="col-xs col-sm col col-md col-lg col-xl-10 contact-us-inside flex">


                <div class="col-xs col-sm col col-md col-lg col-xl-6 pay-inside-right">
                    <div class="col-xs col-sm col col-md col-lg col-xl-12 contact-us-inside-right-top flex delete-padding">

                        <div class="col-xs col-sm col col-md col-lg col-xl-2 filter-all-right-top-icon delete-padding">
                            <div class="calculate-price delete-padding m-icon">
                                <img src="/img/icon/payment.png">
                            </div>
                        </div>
                        <div class="col-xs col-sm col col-md col-lg col-xl-10 filter-all-right-top-price delete-padding">
                            <div class="m-price">
                                <span class="bold text-white title-2"> پرداخت  </span>
                            </div>
                        </div>
                    </div>

                    <div class="pay-inside-right-main">
                        <div class="col-xs col-sm col col-md col-lg col-xl-12 pay-inside-right-main-text">
                            <span class="text-purple-input title-3">  قطع کتاب  : <span class="text-gray-all title-3"> {{get.size}} </span></span>
                        </div>
                        <div class="col-xs col-sm col col-md col-lg col-xl-12 pay-inside-right-main-text">
                            <span class="text-purple-input title-3">  جنس کاغذ :  <span class="text-gray-all title-3">  {{get.material}} </span></span>
                        </div>
                        <div class="col-xs col-sm col col-md col-lg col-xl-12 pay-inside-right-main-text">
                            <span class="text-purple-input title-3">  نوع صحافی :   <span class="text-gray-all title-3">  {{get.Binding}} </span></span>
                        </div>
                        <div class="col-xs col-sm col col-md col-lg col-xl-12 pay-inside-right-main-text">
                            <span class="text-purple-input title-3">  جنس جلد :    <span class="text-gray-all title-3">  {{get.thickness}} </span></span>
                        </div>
                        <div class="col-xs col-sm col col-md col-lg col-xl-12 pay-inside-right-main-text">
                            <span class="text-purple-input title-3">  پوشش جلد :   <span class="text-gray-all title-3"> {{get.cover_material}} </span></span>
                        </div>
                        <div class="col-xs col-sm col col-md col-lg col-xl-12 pay-inside-right-main-text">
                            <span class="text-purple-input title-3"> چاپ جلد :   <span class="text-gray-all title-3">  {{get.cover_type}}  </span></span>
                        </div>
                        <div class="col-md-12 pay-inside-right-main-text">
                            <span class="text-purple-input title-3"> لبه برگردان :   <span class="text-gray-all title-3">  {{get.edge}} </span></span>
                        </div>
                        <div class="col-xs col-sm col col-md col-lg col-xl-12 pay-inside-right-main-text">
                            <span class="text-purple-input title-3"> دورگرد جلد :   <span class="text-gray-all title-3"> {{get.circle_cover}} </span></span>
                        </div>
                        <div class="col-xs col-sm col col-md col-lg col-xl-12 pay-inside-right-main-text">
                            <span class="text-purple-input title-3"> تعداد صفحات  مشکی :  <span class="text-gray-all title-3">  {{get.one_color_number}} </span></span>
                        </div>
                        <div class="col-xs col-sm col col-md col-lg col-xl-12 pay-inside-right-main-text">
                            <span class="text-purple-input title-3"> تعداد صفحات رنگی  : <span class="text-gray-all"> {{get.colorful_number}} </span></span>
                        </div>
                        <div class="col-xs col-sm col col-md col-lg col-xl-12 pay-inside-right-main-text">
                            <span class="text-purple-input title-3"> تیراژ کتاب : <span class="text-gray-all"> {{get.circulation}} </span></span>
                        </div>
                    </div>

                </div>


                <div class="col-xs col-sm col col-md col-lg col-xl-6 pay-inside-left">
                    <div class="col-xs col-sm col col-md col-lg col-xl-12 pay-inside-left-top">
                        <div class="col-xs col-sm col col-md col-lg col-xl-12 pay-inside-right-main-text" style="height: 60px;display: flex;align-items: flex-start;padding-top: 12px;">
                            <span class="text-purple-input title-3"> نحوه محاسبه قیمت  : <span class="text-gray-all"> همراه با کاغد </span></span>
                        </div>
                        <div class="col-xs col-sm col col-md col-lg col-xl-12 pay-inside-right-main-text" style="height: 60px;display: flex;align-items: flex-start;padding-top: 12px;">
                            <span class="text-purple-input title-3"> قیمت نهایی هر جلد  : <span class="text-gray-all"> {{price0}} </span></span>
                        </div>
                        <div class="col-xs col-sm col col-md col-lg col-xl-12 pay-inside-right-main-text" style="height: 60px;display: flex;align-items: flex-start;padding-top: 12px;">
                            <span class="text-purple-input title-3"> قیمت کل سفارش  : <span class="text-gray-all"> {{price1}} </span></span>
                        </div>
                        <div class="col-xs col-sm col col-md col-lg col-xl-12 pay-inside-right-main-text" style="height: 60px;display: flex;align-items: flex-start;padding-top: 12px;">
                            <span class="text-purple-input title-3"> قیمت کل سفارش با تخفیف : <span class="text-gray-all"> {{price2}}</span></span>
                        </div>
                        <!--<div class="form-group col-xs col-sm col-8 col-md col-lg col-xl-11 flex">-->
                            <!--<label for="inputState" class="text-purple-input bold"> قیمت نهایی هر جلد </label>-->
                            <!--<input type="text" class="form-control color-border p-input" id="inputname" placeholder="تومان " style="direction: ltr">-->
                        <!--</div>-->
                        <!--<div class="form-group col-xs col-sm col-8 col-md col-lg col-xl-11 flex">-->
                            <!--<label for="inputState" class="text-purple-input bold"> قیمت کل سفارش </label>-->
                            <!--<input type="text" class="form-control color-border p-input" id="inputname" placeholder="تومان " style="direction: ltr">-->
                        <!--</div>-->
                    </div>
                    <div class="col-xs col-sm col col-md col-lg col-xl-12 pay-inside-left-bottom">
                        <!---->
                        <div class="col-xs col-sm col col-md col-lg col-xl-12 pay-inside-left-bottom-insidee flex">
                            <div class="col-xs col-sm col col-md col-lg col-xl-2 pay-inside-left-bottom-insidee-right delete-padding">
                                <a href="#"><img src="img/icon/img2.png"></a>
                            </div>
                            <div class="col-xs col-sm col col-md col-lg col-xl-10 pay-inside-left-bottom-insidee-left">
                                <a href="/factor" target="_blank"><input type="button" value="پرینت محاسبه قیمت"></a>
                            </div>
                        </div>
                        <!---->

                        <!---->
                        <div class="col-xs col-sm col col-md col-lg col-xl-12 pay-inside-left-bottom-insidee flex">
                            <div class="col-xs col-sm col col-md col-lg col-xl-2 pay-inside-left-bottom-insidee-right delete-padding">
                                <a href="#"><img src="img/icon/img2.png"></a>
                            </div>
                            <div class="col-xs col-sm col col-md col-lg col-xl-10 pay-inside-left-bottom-insidee-left">
                                <a @click="credit_limit"><input type="button" value="پرداخت از محل اعتبار"></a>
                            </div>
                        </div>


                        <div class="col-xs col-sm col col-md col-lg col-xl-12 pay-inside-left-bottom-insidee flex">
                            <div class="col-xs col-sm col col-md col-lg col-xl-2 pay-inside-left-bottom-insidee-right delete-padding">
                                <a href="#"><img src="img/icon/img2.png"></a>
                            </div>
                            <div class="col-xs col-sm col col-md col-lg col-xl-10 pay-inside-left-bottom-insidee-left">
                                <a @click="prepayment"><input type="button" value="پیش پرداخت"></a>
                            </div>
                        </div>
                        <!---->
                        <!---->
                        <div class="col-xs col-sm col col-md col-lg col-xl-12 pay-inside-left-bottom-insidee flex">
                            <div class="col-xs col-sm col col-md col-lg col-xl-2 pay-inside-left-bottom-insidee-right delete-padding">
                                <a href="#"><img src="/img/icon/img2.png"></a>
                            </div>
                            <div class="col-xs col-sm col col-md col-lg col-xl-10 pay-inside-left-bottom-insidee-left">
                                <a @click="go_to_pay(cost)" ><input type="button" value="پرداخت از درگاه بانکی"></a>
                            </div>
                        </div>
                        <!---->



                        <div class="col-xs col-sm col col-md col-lg col-xl-12 pay-inside-left-bottom-insidee">
                        </div>
                        <div class="col-xs col-sm col col-md col-lg col-xl-12 pay-inside-left-bottom-insidee">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <!--<div>-->
        <!--<div class="col-xs col col-sm col-md col-lg col-xl-12 body-main-inside delete-padding">-->
            <!--<div class="col-xs col col-sm col-md col-lg col-xl-10 all-page-inside flex d-p-responsive">-->
                <!--<div class="col-xs col col-sm col-md col-lg col-xl-11 contact-us-inside flex">-->


                    <!--<div class="col-xs col col-sm col-md col-lg col-xl-6 pay-inside-right">-->
                        <!--<div class="col-xs col col-sm col-md col-lg col-xl-12 contact-us-inside-right-top flex delete-padding">-->

                            <!--<div class="col-xs col col-sm col-md col-lg col-xl-2 filter-all-right-top-icon delete-padding">-->
                                <!--<div class="calculate-price delete-padding m-icon">-->
                                    <!--<img src="/img/icon/payy.png">-->

                                <!--</div>-->
                            <!--</div>-->
                            <!--<div class="col-xs col col-sm col-md col-lg col-xl-10 filter-all-right-top-price delete-padding">-->
                                <!--<div class="m-price">-->
                                    <!--<span class=" text-white title-3"> پرداخت  </span>-->
                                <!--</div>-->
                            <!--</div>-->
                        <!--</div>-->

                        <!--<div class="pay-inside-right-main">-->
                            <!--<div class="col-xs col col-sm col-md col-lg col-xl-12 pay-inside-right-main-text">-->
                                <!--<span class="text-purple-input title-3">  قطع کتاب  :<span class="text-gray-all title-3">  {{get.size}} </span></span>-->
                            <!--</div>-->
                            <!--<div class="col-xs col col-sm col-md col-lg col-xl-12 pay-inside-right-main-text">-->
                                <!--<span class="text-purple-input title-3">  جنس کاغذ :  <span class="text-gray-all title-3">{{get.material}} </span></span>-->
                            <!--</div>-->
                            <!--<div class="col-xs col col-sm col-md col-lg col-xl-12 pay-inside-right-main-text">-->
                                <!--<span class="text-purple-input title-3">  نوع صحافی :   <span class="text-gray-all title-3"> {{get.Binding}} </span></span>-->
                            <!--</div>-->
                            <!--<div class="col-xs col col-sm col-md col-lg col-xl-12 pay-inside-right-main-text">-->
                                <!--<span class="text-purple-input title-3">  جنس جلد :    <span class="text-gray-all title-3"> {{get.thickness}} گرم</span></span>-->
                            <!--</div>-->
                            <!--<div class="col-xs col col-sm col-md col-lg col-xl-12 pay-inside-right-main-text">-->
                                <!--<span class="text-purple-input title-3">  پوشش جلد :   <span class="text-gray-all title-3"> {{get.cover_material}}  </span></span>-->
                            <!--</div>-->
                            <!--<div class="col-xs col col-sm col-md col-lg col-xl-12 pay-inside-right-main-text">-->
                                <!--<span class="text-purple-input title-3"> چاپ جلد :   <span class="text-gray-all title-3">  {{get.cover_type}}  </span></span>-->
                            <!--</div>-->
                            <!--<div class="col-xs col col-sm col-md col-lg col-xl-12 pay-inside-right-main-text">-->
                                <!--<span class="text-purple-input title-3"> لبه برگردان :   <span class="text-gray-all title-3"> {{get.edge}} لبه برگردان </span></span>-->
                            <!--</div>-->
                            <!--<div class="col-xs col col-sm col-md col-lg col-xl-12 pay-inside-right-main-text">-->
                                <!--<span class="text-purple-input title-3"> دورگرد جلد :   <span class="text-gray-all title-3">   {{get.circle_cover}} </span></span>-->
                            <!--</div>-->
                            <!--<div class="col-xs col col-sm col-md col-lg col-xl-12 pay-inside-right-main-text">-->
                                <!--<span class="text-purple-input title-3"> تعداد صفحات سیاه و سفید :   <span class="text-gray-all title-3"> {{get.one_color_number}}  </span></span>-->
                            <!--</div>-->
                            <!--<div class="col-xs col col-sm col-md col-lg col-xl-12 pay-inside-right-main-text">-->
                                <!--<span class="text-purple-input title-3"> تعداد صفحات رنگی :   <span class="text-gray-all"> {{get.colorful_number}} </span></span>-->
                            <!--</div>-->

                        <!--</div>-->

                    <!--</div>-->

                    <!--<div class="col-xs col col-sm col-md col-lg col-xl-6 pay-inside-left">-->
                        <!--<div class="col-xs col col-sm col-md col-lg col-xl-12 pay-inside-left-top">-->
                            <!--<div class="form-group col-xs col-8 col-sm col-md col-lg col-xl-11 flex">-->
                                <!--&lt;!&ndash;<label for="inputState" class="text-purple-input bold"> تیراژ کتاب</label>-->
                                <!--<input type="text" class="form-control color-border p-input" v-model="get.circulation" id="inputState" placeholder="1" style="direction: ltr">-->
                                <!--&ndash;&gt;-->
                                <!--<span class="text-purple-input title-3 bold">  تیراژ کتاب :   <span class="text-gray-all"> {{get.circulation}} </span></span>-->
                            <!--</div>-->
                            <!--<div class="form-group col-xs col-8 col-sm col-md col-lg col-xl-11 flex">-->
                                <!--&lt;!&ndash;<label for="inputState1" class="text-purple-input bold"> قیمت هر جلد </label>&ndash;&gt;-->
                                <!--&lt;!&ndash;<input type="text" class="form-control color-border p-input" v-model="get.book_cost" id="inputState1" placeholder="تومان " style="direction: ltr">&ndash;&gt;-->
                                <!--<span class="text-purple-input title-3 bold">  قیمت هر جلد :   <span class="text-gray-all"> {{price0}} </span></span>-->
                            <!--</div>-->
                            <!--<div class="form-group col-xs col-8 col-sm col-md col-lg col-xl-11 flex">-->
                                <!--&lt;!&ndash;<label for="inputState3" class="text-purple-input bold"> قیمت کل سفارش </label>&ndash;&gt;-->
                                <!--&lt;!&ndash;<input type="text" class="form-control color-border p-input" v-model="get.final_price" id="inputState3" placeholder="تومان " style="direction: ltr">&ndash;&gt;-->
                                <!--<span class="text-purple-input title-3 bold">  قیمت کل سفارش :   <span class="text-gray-all"> {{price1}} </span></span>-->
                            <!--</div>-->
                            <!--<div class="form-group col-xs col-8 col-sm col-md col-lg col-xl-9 flex">-->
                                <!--<label for="inputState4" class="text-purple-input bold"> کد تخفیف</label>-->
                                <!--<input type="text" v-model="off" class="form-control color-border p-input" id="inputState4" placeholder="کد تخفیف را وارد کنید" style="direction: rtl;font-size: 12px;">-->
                            <!--</div>-->
                            <!--<div class="alert alert-danger form-group col-xs col-8 col-sm col-md col-lg col-xl-11 flex" v-if="ok === 0" role="alert" style="height: auto;float: right;font-family:irs">-->
                                <!--{{errors.data}}-->
                            <!--</div>-->

                        <!--</div>-->
                        <!--<div class="col-xs col col-sm col-md col-lg col-xl-12 pay-inside-left-bottom">-->

                               <!--<div class="form-group col-xs col-8 col-sm col-md col-lg col-xl-11 flex">-->
                                <!--<div class="col-xs col-10 col-sm col-md col-lg col-xl-11 send-info-register-pay">-->
                                    <!--<input type="button" style="cursor: pointer" value="محاسبه قیمت نهایی" v-on:click="getData"  class="btn-btn">-->
                                <!--</div>-->
                            <!--</div>-->

                            <!--<div class="form-group col-xs col-8 col-sm col-md col-lg col-xl-11 flex Total-Factor-Sum">-->
                                <!--<label class="text-purple-input bold">جمع کل فاکتور</label>-->
                                <!--&lt;!&ndash;<span class="all-factor"> {{price2}} تومان </span>&ndash;&gt;-->
                                <!--<div class="all-factor">-->
                                <!--<span > {{price2}} تومان </span>-->
                                <!--</div>-->
                            <!--</div>-->

                            <!--<div class="pay-inside-left-bottom-invoice">-->
                                <!--<a href="/factor" target="_blank"><span> صدور پیش فاکتور </span></a>-->
                            <!--</div>-->

                            <!--<div class="pay-inside-left-bottom-pay flex">-->
                                <!--<div v-if="ok1 === 1" style="cursor: pointer" v-on:click="go_to_pay" class="col-xs col col-sm col-md col-lg col-xl-6 pay-inside-left-bottom-pay-right">-->
                                    <!--<div class="pay-pay" style="margin-right: 122px">-->
                                        <!--<ul>-->
                                            <!--<li><span class="title-2">  پرداخت   </span></li>-->
                                            <!--<li><span class="title-4"> از درگاه بانک </span></li>-->
                                        <!--</ul>-->
                                        <!--<div v-if="loader === 1" class="col-xs col-12 col-sm col-md col-lg col-xl-12  lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>-->
                                    <!--</div>-->
                                <!--</div>-->
                            <!--</div>-->
                        <!--</div>-->
                    <!--</div>-->
                <!--</div>-->
            <!--</div>-->
        <!--</div>-->
    <!--</div>-->
</template>

<script>

    export default {
        mounted() {
            console.log('pay');
            this.cal();
           // this.getData();
        } ,

        data() {
            return  {
                loader: '' ,
                get: '' ,
                off: '' ,
                cost: '' ,
                ok1: 0 ,
                errors: [] ,
                code: '' ,
                ok: '' ,
                price0: '' ,
                price1: '' ,
                price2: '' ,
            }
        } ,


        methods:{
            prepayment() {
                axios({
                    url:'/api/use/prepayment' ,
                    method: 'post' ,
                    data: {
                        base: this.cost
                    } ,
                    headers: {
                        Authorization: `Bearer ${localStorage.getItem('token')}`
                    }
                })
                    .then(res => {
                        console.log(res);
                        if (res.data.status === 'success')
                        {
                            this.cost = res.data.cost;
                            this.go_to_pay(this.cost);
                        }
                    })
                    .catch(err => {
                        console.log(err.response);
                        if (err.response.data.status === 'error')
                        {
                            Swal.fire({
                                title: 'خطا' ,
                                text: err.response.data.message ,
                                icon: 'error' ,
                                confirmButtonColor: '#d33',
                            })
                        }
                    })
            } ,
            sendMessage(code) {
                axios({
                    url: '/api/sendMessage' ,
                    method: 'post' ,
                    data: {
                        phone: JSON.parse(localStorage.getItem('user')).phone ,
                        code: code ,
                        template: 'borochap'
                    } ,
                    headers: {
                        Accept: 'application/json' ,
                        Authorization: `Bearer ${localStorage.token}`
                    }
                })
                    .then(res => {
                        console.log(res);
                        open('/' , '_blank');
                    })
                    .catch(err => {
                        console.log(err.response);
                    })
            } ,
            credit_limit() {
                axios({
                    url:'/api/use/creditLimit' ,
                    method: 'post' ,
                    data: {
                        base: this.cost
                    } ,
                    headers: {
                        Authorization: `Bearer ${localStorage.getItem('token')}`
                    }
                })
                    .then(res => {
                        console.log(res);
                        if (res.data.message === 'success')
                        {
                            axios({
                                url: '/api/create/order' ,
                                method: 'post' ,
                                data: {
                                    one_color_toner: this.get.one_color_toner ,
                                    circle_cover: this.get.circle_cover ,
                                    circulation: this.get.circulation ,
                                    thickness: this.get.thickness ,
                                    edge: this.get.edge ,
                                    Binding: this.get.Binding ,
                                    size: this.get.size,
                                    material: this.get.material ,
                                    one_color_number: this.get.one_color_number ,
                                    colorful_number: this.get.colorful_number ,
                                    colorful_toner: this.get.colorful_toner ,
                                    cover_type: this.get.cover_type ,
                                    cover_material: this.get.cover_material ,
                                    book_cost: this.get.book_cost ,
                                    //pay_id: this.Authority ,
                                    paid: this.cost ,
                                    final_price: this.cost ,
                                    finance: res.data.finance_id
                                } ,
                                headers: {
                                    Accept: 'application/json' ,
                                    Authorization: `Bearer ${localStorage.token}`
                                }
                            })
                                .then(res => {
                                    console.log(res);
                                    let msg = `کد پیگیری سفارش شما: ${res.data.code} `;
                                    localStorage.removeItem('final');
                                    Swal.fire({
                                        title: 'سفارش شما ثبت شد' ,
                                        text: msg ,
                                        icon: 'success' ,
                                        confirmButtonColor: '#5f1255',
                                    });
                                    this.sendMessage(res.data.code);

                                })
                                .catch(err => {
                                    console.log(err.response);
                                    Swal.fire({
                                        title: 'خطا' ,
                                        text: 'پرداخت ناموفق' ,
                                        icon: 'error' ,
                                        confirmButtonColor: '#d33',
                                    })
                                })
                        }
                        else
                        {
                            Swal.fire({
                                text: res.data.message ,
                                icon: 'error' ,
                                confirmButtonColor: '#d33',
                            })
                        }
                    })
                    .catch(err => {
                        console.log(err.response);
                        Swal.fire({
                            text: 'something went wrong',
                            icon: 'error' ,
                            confirmButtonColor: '#d33',
                        })
                    })
            } ,
            cal() {
                if (localStorage.final)
                {
                    axios({
                        url:'/api/Cal' ,
                        method: 'post' ,
                        data: JSON.parse(localStorage.getItem('final'))
                    })
                        .then(res => {
                            localStorage.setItem('final' , JSON.stringify(res.data));
                            this.get = res.data;
                            this.checkForDiscounts();
                        })
                        .catch(err => {
                            console.log(err.response);
                        })
                }
            } ,
            checkForDiscounts() {
                axios({
                    url:'/api/check/discounts' ,
                    method: 'get' ,
                    headers: {
                        Accept: 'application/json' ,
                        Authorization: `Bearer ${localStorage.token}`
                    }
                })
                    .then(res => {
                        console.log(res);
                        let status = res.data.status;
                        if (status === 1)
                        {
                            axios({
                                url:'/api/use/off/type' ,
                                method: 'post' ,
                                data: {
                                    base: this.get.final_price ,
                                    number: this.get.circulation
                                }
                            })
                                .then(res => {
                                    console.log(res);
                                    this.cost = res.data;
                                    localStorage.setItem('cost' , JSON.stringify(this.cost));
                                    this.ok1 = 1;
                                    this.ok = 1;
                                    this.price0 = this.get.book_cost.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    this.price1 = this.get.final_price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    this.price2 = this.cost.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                })
                                .catch(err => {
                                    console.log(err.response);
                                    this.discount();
                                })
                        }
                        else if (status === 2)
                        {
                            axios({
                                url:'/api/use/exclusive_discounts' ,
                                method: 'post' ,
                                data: {
                                    base: this.get.final_price
                                } ,
                                headers: {
                                    Accept: 'application/json' ,
                                    Authorization: `Bearer ${localStorage.token}`
                                }
                            })
                                .then(res => {
                                    console.log(res);
                                    this.cost = res.data;
                                    localStorage.setItem('cost' , JSON.stringify(this.cost));
                                    this.ok1 = 1;
                                    this.ok = 1;
                                    this.price0 = this.get.book_cost.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    this.price1 = this.get.final_price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    this.price2 = this.cost.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                })
                                .catch(err => {
                                    console.log(err.response);
                                    this.discount();
                                })
                        }
                        else if (status === 3)
                        {
                            this.discount();
                        }
                    })
                    .catch(err => {
                        console.log(err.response);
                    })
            } ,
            getData() {
                if (localStorage.final)
                {
                    this.get = JSON.parse(localStorage.final);
                }
                this.checkForDiscounts();
              //  this.discount();
            } ,
            discount() {
                localStorage.removeItem('cost');
                axios({
                    url: '/api/off' ,
                    method: 'post' ,
                    data: {
                        base: this.get.final_price ,
                        name: this.off ,
                    } ,
                    headers: {
                        Accept: 'application/json' ,
                        Authorization: `Bearer ${localStorage.token}`
                    }
                })
                    .then(res => {
                        console.log(res);
                        this.cost = res.data.cost_after_off;
                        localStorage.setItem('cost' , JSON.stringify(this.cost));
                        this.ok1 = 1;
                        this.ok = 1;
                        this.price0 = this.get.book_cost.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                        this.price1 = this.get.final_price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                        this.price2 = this.cost.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                    })
                    .catch(err => {
                        console.log(err.response);
                        if (err.response.status === 404)
                        {
                            this.ok = 0;
                            this.ok1 = 1;
                            this.errors = err.response;
                            this.cost = this.get.final_price;
                            localStorage.setItem('cost' , JSON.stringify(this.cost));
                        }
                        else
                        {
                            this.ok = 1;
                            this.ok1 = 1;
                            this.cost = this.get.final_price;
                            this.price0 = this.get.book_cost.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                            this.price1 = this.get.final_price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                            this.price2 = this.cost.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                            localStorage.setItem('cost' , JSON.stringify(this.cost));
                        }

                    });
            } ,
            go_to_pay(cost) {
                if(! this.cost)
                {
                    this.$swal('شما سفارشی ثبت نکرده اید' , '' , 'error');
                }
                else
                {
                    this.loader = 1;
                    axios({
                        url:'/api/zarinpal/request' ,
                        method: 'post' ,
                        data: {
                            price: cost
                        } ,
                        headers: {
                            Authorization: `Bearer ${localStorage.token}`
                        }
                    })
                        .then(res => {
                            this.loader = 0;
                            console.log(res);
                            open(res.data , '_blank');
                        })
                        .catch(err => {
                            console.log(err.response);
                            this.loader = 0;
                        })
                }
                
            }
        }
    }
</script>
<style scoped>
    .lds-roller {
        display: inline-block;
        position: relative;
        width: 40px;
        height: 40px;
    }
    .lds-roller div {
        animation: lds-roller 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
        transform-origin: 40px 40px;
    }
    .lds-roller div:after {
        content: " ";
        display: block;
        position: absolute;
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #6a2260;
        margin: -4px 0 0 -4px;
    }
    .lds-roller div:nth-child(1) {
        animation-delay: -0.036s;
    }
    .lds-roller div:nth-child(1):after {
        top: 63px;
        left: 63px;
    }
    .lds-roller div:nth-child(2) {
        animation-delay: -0.072s;
    }
    .lds-roller div:nth-child(2):after {
        top: 68px;
        left: 56px;
    }
    .lds-roller div:nth-child(3) {
        animation-delay: -0.108s;
    }
    .lds-roller div:nth-child(3):after {
        top: 71px;
        left: 48px;
    }
    .lds-roller div:nth-child(4) {
        animation-delay: -0.144s;
    }
    .lds-roller div:nth-child(4):after {
        top: 72px;
        left: 40px;
    }
    .lds-roller div:nth-child(5) {
        animation-delay: -0.18s;
    }
    .lds-roller div:nth-child(5):after {
        top: 71px;
        left: 32px;
    }
    .lds-roller div:nth-child(6) {
        animation-delay: -0.216s;
    }
    .lds-roller div:nth-child(6):after {
        top: 68px;
        left: 24px;
    }
    .lds-roller div:nth-child(7) {
        animation-delay: -0.252s;
    }
    .lds-roller div:nth-child(7):after {
        top: 63px;
        left: 17px;
    }
    .lds-roller div:nth-child(8) {
        animation-delay: -0.288s;
    }
    .lds-roller div:nth-child(8):after {
        top: 56px;
        left: 12px;
    }
    @keyframes lds-roller {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }

</style>