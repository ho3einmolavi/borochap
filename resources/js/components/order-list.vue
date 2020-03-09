<template>
    <div>
        <div class="col-xs col-10 col-sm-10 col-md-11 col-lg-10 col-xl-12 users-main delete-padding">
            <div class="user-list-page">
                <div class="user-list-manage-box margin-bottom">
                    <div class="col-xs col col-sm col-md col-lg col-xl-4 user-list-manage-box-search delete-padding">
                        <div class="input-group mb-3 input-name-doctor" style="direction: ltr;width: 98%;">
                            <div class="input-group-prepend button-name-doctor">
                                <button class="btn btn-outline-secondary" v-on:click="search" type="button" id="button-addon1"><i class="fas fa-search"></i></button>
                            </div>
                            <input style="text-align: right;font-size: 12px;" type="text" v-model="q" v-on:change="search" class="form-control input-form-control" placeholder="کد سفارش مورد نظر خود را جستجو کنید" aria-label="Example text with button addon" aria-describedby="button-addon1">
                        </div>
                    </div>
                </div>
                <div class="col-xs col col-sm col-md col-lg col-xl-12 word-list flex">
                    <div class="col-xs col col-sm col-md col-lg col-xl-2 word-list-img">
                        <span class="title-4"> سفارش </span>
                    </div>
                    <div class="col-xs col col-sm col-md col-lg col-xl-2 word-list-name">
                        <span class="title-4">  تاریخ سفارش</span>
                    </div>
                    <div class="col-xs col col-sm col-md col-lg col-xl-2 word-list-all">
                        <span class="title-4"> یادداشت </span>
                    </div>
                    <div class="col-xs col col-sm col-md col-lg col-xl-2 word-list-des">
                        <span class="title-4">  وضعیت</span>
                    </div>
                    <div class="col-xs col col-sm col-md col-lg col-xl-2 word-list-ads">
                        <span class="title-4"> مجموع</span>
                    </div>
                    <div class="col-xs col col-sm col-md col-lg col-xl-2 word-list-delete-details">
                        <span class="title-4" style="padding-right: 33px;"> تایید و حذف </span>
                    </div>
                </div>
                <ol id="selectable" class="col-xs col col-sm col-md col-lg col-xl-12 delete-padding-left" v-if="ok===1">
                    <li class="ui-state-default user-list-info-box flex" v-for="ord in orders" >
                        <div class="col-xs col col-sm col-md col-lg col-xl-2 user-list-info-box-image">
                            <span class="text-span title-4">   {{ord.code}} </span>
                        </div>
                        <div class="col-xs col col-sm col-md col-lg col-xl-2 user-list-info-box-name">
                            <span class="text-span title-4"> {{ord.tarikh}} </span>
                        </div>
                        <div class="col-xs col col-sm col-md col-lg col-xl-2 user-list-info-box-number">
                            <span class="text-span title-4" v-if="ord.status">{{ord.status}}</span>
                            <span class="text-span title-4" v-else> - </span>
                        </div>
                        <div v-if="ord.verification === 0" class="col-xs col col-sm col-md col-lg col-xl-2 user-list-info-box-number">
                            <span class="text-span title-4 c-stop"> در انتظار تایید </span>
                        </div>
                        <div v-if="ord.verification === 1" class="col-xs col col-sm col-md col-lg col-xl-2 user-list-info-box-number">
                            <span class="text-span title-4 c-stop" style="color: green"> تایید شده </span>
                        </div>
                        <div class="col-xs col col-sm col-md col-lg col-xl-2 user-list-info-box-email">
                            <span class="text-span title-4"> {{ord.final_price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}} تومان </span>
                        </div>
                        <div class="col-xs col col-sm col-md col-lg col-xl-2 table-data-feature flex">
                            <a id="" v-on:click="verify(ord.id)"  class="item confirm" data-toggle="tooltip" data-placement="top" title="" data-original-title="تایید">
                                <i class="fas fa-check"></i>
                            </a>
                            <a id="error2" class="item delete" v-on:click="delete_order(ord.id)" data-toggle="tooltip" data-placement="top" title="" data-original-title="حذف ">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                            <a class="item verify" v-on:click="order(ord.id)" data-toggle="tooltip" data-placement="top" title="" data-original-title="جزئیات ">
                                <i class="fas fa-ellipsis-h"></i>
                            </a>
                        </div>
                    </li>
                </ol>
                <div v-if="ok === 0" class="alert alert-danger col-xs col col-sm col-md col-lg col-xl-12">
                    نتیجه ای یافت نشد
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.get_orders();
            console.log('order-list mounted.')
        } ,

        data() {
            return {
                orders: [] ,
                date: '' ,
                ok: 1 ,
                q: ''
            }
        } ,

        methods: {
            get_orders() {
                axios({
                    url: '/api/orders' ,
                    method: 'get'
                })
                    .then(res => {
                        console.log(res);
                        this.orders = res.data;
                    })
                    .catch(err => {
                        console.log(err.response)
                    })
            } ,
            order(id) {
                localStorage.removeItem('details');
                axios({
                    url: `/api/order/${id}` ,
                    method: 'get'
                })
                    .then(res => {
                        console.log(res);
                        localStorage.setItem('details' , JSON.stringify(res.data));
                        window.location = '/admin/order-details'
                    })
                    .catch(err => {
                        console.log(err.response)
                    })
            } ,

            search() {
                axios({
                    url: `/api/search/orders/code` ,
                    method: 'post' ,
                    data: {
                        q: this.q
                    }
                })
                    .then(res => {
                        console.log(res);
                        this.orders = res.data;
                        this.ok = 1;
                    })
                    .catch(err => {
                        console.log(err.response);
                        this.ok = 0;
                    })
            } ,
            delete_order(id) {
                if (confirm('آیا از حذف کردن این سفارش مطمئن هستید ؟'))
                {
                    axios({
                        url: `/api/order/${id}/delete` ,
                        method: 'get'
                    })
                        .then(res => {
                            console.log(res);
                            this.get_orders();
                        })
                        .catch(err => {
                            console.log(err.response)
                        })
                }
            } ,
            verify(id) {
                axios({
                    url: `/api/order/${id}/verify` ,
                    method: 'get'
                })
                    .then(res => {
                        console.log(res);
                        this.get_orders();
                    })
                    .catch(err => {
                        console.log(err.response)
                    })
                }
            }
    }
</script>
