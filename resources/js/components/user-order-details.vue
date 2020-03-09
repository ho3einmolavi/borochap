<template>
    <center>
        <div class="col-xs col-sm col col-md col-lg col-xl-8 main-details-order">
            <div class="col-xs col-sm col col-md col-lg col-xl-12 main-details-order-inside flex">
                <div class="col-xs col-sm col col-md col-lg col-xl-7 main-details-order-right">
                    <div class="col-xs col-sm col col-md col-lg col-xl-12 main-details-order-right-inside">
                        <span>
                            نام مشتری :
                            <span v-if="order.user.printing_office">{{order.user.first_name}} {{order.user.last_name}} | {{order.user.printing_office}} </span>
                            <span v-else>{{order.user.first_name}} {{order.user.last_name}} </span>
                        </span>
                    </div>
                    <div class="col-xs col-sm col col-md col-lg col-xl-12 main-details-order-right-inside">
                        <span>  شماره همراه : <span>   {{order.user.username}}</span>  </span>
                    </div>
                    <div class="col-xs col-sm col col-md col-lg col-xl-12 main-details-order-right-inside">
                        <span>  شماره تلفن ثابت : <span> {{order.user.printing_office_number}}</span>  </span>
                    </div>
                    <div class="col-xs col-sm col col-md col-lg col-xl-12 main-details-order-right-inside">
                        <span>  شناسه پرداخت : <span> {{order.order.pay_id}}</span>  </span>
                    </div>
                    <div v-if="order.order.final_price !== order.order.paid" class="col-xs col-sm col col-md col-lg col-xl-12 main-details-order-right-inside">
                        <span> میزان بدهی : <span> {{order.order.final_price - order.order.paid}}</span>  </span>
                    </div>
                    <div class="col-xs col-sm col col-md col-lg col-xl-12 main-details-order-right-inside">
                        <span>  آدرس : <span>{{order.user.address}}</span>  </span>
                    </div>
                    <div class="col-xs col-sm col col-md col-lg col-xl-12 main-details-order-right-inside">
                        <span>  کد پستی : <span> {{order.user.postal_code}}</span>  </span>
                    </div>
                    <div class="col-xs col-sm col col-md col-lg col-xl-12 main-details-order-right-inside">
                        <span>  نوع ارسال : <span> {{order.user.delivery}}</span>  </span>
                    </div>
                    <div class="col-xs col-sm col col-md col-lg col-xl-12 main-details-order-right-inside">
                        <span>  موضوع سفارش : <span>{{order.order.title}}</span>  </span>
                    </div>
                    <div class="col-xs col-sm col col-md col-lg col-xl-12 main-details-order-right-inside">
                        <span>  اندازه : <span> رقعی بزرگ (14.5*22)  </span>  </span>
                    </div>
                    <div class="col-xs col-sm col col-md col-lg col-xl-12 main-details-order-right-inside">
                        <span>  جنس کاغذ : <span> تحریر 70</span>  </span>
                    </div>
                </div>
                <div class="col-xs col-sm col col-md col-lg col-xl-5 main-details-order-left">
                    <div class="col-xs col-sm col col-md col-lg col-xl-12 main-details-order-left-inside">
                        <span>  نوع صحافی : <span> چسب گرم</span>  </span>
                    </div>
                    <div class="col-xs col-sm col col-md col-lg col-xl-12 main-details-order-left-inside">
                        <span>  جنس جلد:  <span> 200 گرم</span>  </span>
                    </div>
                    <div class="col-xs col-sm col col-md col-lg col-xl-12 main-details-order-left-inside">
                        <span>  پوشش جلد:<span>  سلفون مات  </span>  </span>
                    </div>
                    <div class="col-xs col-sm col col-md col-lg col-xl-12 main-details-order-left-inside">
                        <span>  چاپ جلد: <span>یک رو   </span>  </span>
                    </div>
                    <div class="col-xs col-sm col col-md col-lg col-xl-12 main-details-order-left-inside">
                        <span> لبه برگردان : <span> ندارد </span>  </span>
                    </div>
                    <div class="col-xs col-sm col col-md col-lg col-xl-12 main-details-order-left-inside">
                        <span>  دور گرد جلد : <span>ندارد  </span>  </span>
                    </div>
                    <div class="col-xs col-sm col col-md col-lg col-xl-12 main-details-order-left-inside">
                        <span>  تعداد صفحات سیاه و سفید :<span> 64 </span>  </span>
                    </div>
                    <div class="col-xs col-sm col col-md col-lg col-xl-12 main-details-order-left-inside">
                        <span>  تعداد صفحات رنگی :<span> 1 </span>  </span>
                    </div>
                    <div class="col-xs col-sm col col-md col-lg col-xl-12 main-details-order-left-inside">
                        <span>  تیراژ : <span>  1</span>  </span>
                    </div>
                    <div class="col-xs col-sm col col-md col-lg col-xl-12 main-details-order-left-inside">
                        <span>  قیمت نهایی : <span> 1/650/000 <span> تومان </span>  </span>  </span>
                    </div>
                </div>
            </div>

            <div class="col-xs col-sm col col-md col-lg col-xl-12 main-details-order-inside-input flex">
                <!--<div class="col-xs col-sm col col-md col-lg col-xl-6 main-details-order-inside-input-right">-->
                    <!--<button type="button" class="btn btn-primary"> دانلود صفحات</button>-->
                <!--</div>-->
                <!--<div class="col-xs col-sm col col-md col-lg col-xl-6 main-details-order-inside-input-left">-->
                    <!--<button type="button" class="btn btn-primary">دانلود جلد</button>-->
                <!--</div>-->
            </div>


        </div>
    </center>
</template>

<script>
    export default {
        name: "user-order-details" ,

        created() {
            this.get_order(this.$route.params.orderID);
        } ,

        data() {
            return {
                order: []
            }
        } ,

        methods: {
            get_order(id) {
                axios({
                    url: `/api/order/${id}` ,
                    method: 'get' ,
                    headers: {
                        Authorization: `Bearer ${localStorage.getItem('token')}`
                    } ,
                })
                    .then(res => {
                        console.log(res)
                        this.order = res.data;
                    })
                    .catch(err => {
                        console.log(err.response);
                    })
            }
        }
    }
</script>

<style scoped>

</style>