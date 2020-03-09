<template>
    <div id="app" class="col-xs col-10 col-sm-10 col-md-10 col-lg-9 col-xl-9">
        <div>
            <div class="col-xs col-sm col- col-md col-lg col-xl-12 users-main delete-padding">

                <div class="user-list-page">
                    <div class="col-md-12 word-list flex">
                        <div class="col-xs col-sm col col-md col-lg col-xl-1 word-list-neme">
                            <span class="title-little"> شماره سفارش  </span>
                        </div>
                        <div class="col-xs col-sm col col-md col-lg col-xl-2 word-list-name">
                            <span class="title-little">  زمان ثبت سفارش   </span>
                        </div>
                        <div class="col-xs col-sm col col-md col-lg col-xl-1 word-list-name">
                            <span class="title-little"> مبلغ کل  </span>
                        </div>
                        <div class="col-xs col-sm col col-md col-lg col-xl-1 word-list-name">
                            <span class="title-little">  نام مشتری </span>
                        </div>
                        <div class="col-xs col-sm col col-md col-lg col-xl-2 word-list-name">
                            <span class="title-little"> نام کاربری مشتری  </span>
                        </div>
                        <div class="col-xs col-sm col col-md col-lg col-xl-2 word-list-name">
                            <span class="title-little"> وضعیت سفارش  </span>
                        </div>
                        <div class="col-xs col-sm col col-md col-lg col-xl-1 word-list-name">
                            <span class="title-little"> جزئیات </span>
                        </div>
                    </div>

                    <ol id="selectable" class="col-xs col-sm col col-md col-lg col-xl-12 delete-padding-left">
                        <li v-for="item in orders" class="ui-state-default user-list-info-box flex">

                            <div class="col-xs col-sm col col-md col-lg col-xl-1 user-list-info-box-name">
                                <span class="text-span title-little"> {{item.code}}  </span>
                            </div>
                            <div class="col-xs col-sm col col-md col-lg col-xl-2 user-list-info-box-name">
                                <span class="text-span title-little">  {{item.tarikh}}  </span>
                            </div>
                            <div class="col-xs col-sm col col-md col-lg col-xl-1 user-list-info-box-name">
                                <span class="text-span title-little">{{item.final_price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}} <span>تومان  </span></span>
                            </div>
                            <div class="col-xs col-sm col col-md col-lg col-xl-1 user-list-info-box-name">
                                <span class="text-span title-little"> {{item.user.fullname}}  </span>
                            </div>
                            <div class="col-xs col-sm col col-md col-lg col-xl-2 user-list-info-box-name">
                                <span class="text-span title-little" v-if="item.user.office">  {{item.user.office}} </span>
                                <span class="text-span title-little" v-else>  - </span>
                            </div>
                            <div class="col-xs col-sm col col-md col-lg col-xl-2 user-list-info-box-img flex delete-padding">
                                <div style="font-family: irs;" class="btn-group" role="group" v-if="item.paid !== item.final_price">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        تسویه بدهکاری
                                    </button>
                                    <div style="cursor: pointer" class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <a class="dropdown-item" @click="checkout(item.id , item.final_price - item.paid , item)">پرداخت بدهکاری</a>
                                        <a  class="dropdown-item" @click="requestForPayment(item.id)">درخواست تسویه به صورت حضوری</a>
                                    </div>
                                </div>
                                <span v-else class="text-span title-little">  پرداخت شده </span>
                            </div>
                            <div class="col-xs col-sm col col-md col-lg col-xl-1 user-list-info-box-name">
                              <span class="">
                                <router-link :to="'/user/order-details/' + item.id"><i class="fas fa-ellipsis-h"></i></router-link>
                              </span>
                            </div>
                        </li>
                    </ol>
                </div>
            </div>


        </div></div>
</template>

<script>
    export default {
        name: "user-orders-list" ,

        created() {
            this.get_orders();
        } ,

        data() {
            return {
                orders: []
            }
        } ,

        methods: {
            checkout(orderId , cost , order) {
                axios({
                    url: '/api/zarinpal/request/checkout' ,
                    method: 'post' ,
                    headers: {
                        Authorization: `Bearer ${localStorage.getItem('token')}`
                    } ,
                    data: {
                        price: cost ,
                        order_id: orderId ,
                    }
                })
                    .then(res => {
                        console.log(res);
                        localStorage.setItem('final' , JSON.stringify(order));
                        open(res.data , '_blank')
                    })
                    .catch(err => {
                        console.log(err.response);
                    })
            } ,
            requestForPayment(id) {
                axios({
                    url: `/api/requestForPay/${id}` ,
                    method: 'get' ,
                    headers: {
                        Authorization: `Bearer ${localStorage.getItem('token')}`
                    } ,
                })
                    .then(res => {
                        console.log(res);
                        Swal.fire({
                            title: 'درخواست شما ارسال شد' ,
                            text: 'با تشکر' ,
                            icon: 'success' ,
                            confirmButtonColor: '#5f1255',
                        })
                    })
                    .catch(err => {
                        console.log(err.response);
                    })
            } ,
            get_orders() {
                axios({
                    url: '/api/user/orders' ,
                    method: 'get' ,
                    headers: {
                        Authorization: `Bearer ${localStorage.getItem('token')}`
                    } ,
                })
                    .then(res => {
                        console.log(res)
                        this.orders = res.data;
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