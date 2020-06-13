<template>
    <div>
        <div class="col-xs col-10 col-sm-10 col-md-11 col-lg-10 col-xl-12 users-main delete-padding">
            <div class="user-list-page">
                <div class="user-list-manage-box margin-bottom">
                    <div class="col-xs col col-sm col-md col-lg col-xl-4 user-list-manage-box-search delete-padding">
                        <div class="input-group mb-3 input-name-doctor" style="direction: ltr;width: 98%;">
                            <div class="input-group-prepend button-name-doctor">
                                <button class="btn btn-outline-secondary" type="button" v-on:click="search" id="button-addon1"><i class="fas fa-search"></i></button>
                            </div>
                            <input style="text-align: right;font-size: 12px;" type="text" v-on:change="search" class="form-control input-form-control" v-model="q" placeholder="نام کاربر مورد نظر خود را جستجو کنید" aria-label="Example text with button addon" aria-describedby="button-addon1">
                        </div>
                    </div>
                </div>
                <div class="col-xs col col-sm col-md col-lg col-xl-12 word-list flex">
                    <div class="col-xs col col-sm col-md col-lg col-xl-1 word-list-name delete-padding">
                        <span class="title-little">  نام</span>
                    </div>
                    <div class="col-xs col col-sm col-md col-lg col-xl-1 word-list-name delete-padding">
                        <span class="title-little">  شماره همراه </span>
                    </div>
                    <div class="col-xs col col-sm col-md col-lg col-xl-1 word-list-name delete-padding">
                        <span class="title-little"> کد پستی </span>
                    </div>
                    <div class="col-xs col col-sm col-md col-lg col-xl-2 word-list-name delete-padding">
                        <span class="title-little" > آدرس  </span>
                    </div>

                    <div class="col-xs col col-sm col-md col-lg col-xl-2 word-list-delete-details delete-padding">
                        <span class="title-little">اعمال تخفیف اختصاصی </span>
                    </div>
                    <div class="col-xs col col-sm col-md col-lg col-xl-2 word-list-delete-details delete-padding">
                        <span class="title-little"> سقف اعتبار </span>
                    </div>
                    <div class="col-xs col col-sm col-md col-lg col-xl-2 word-list-delete-details delete-padding">
                        <span class="title-little"> پیش پرداخت </span>
                    </div>
                    <div class="col-xs col col-sm col-md col-lg col-xl-1 word-list-delete-details delete-padding">
                        <span class="title-little">حذف </span>
                    </div>
                </div>

                <!--
                <ol id="selectable" v-if="ok === 1"  class="col-xs col col-sm col-md col-lg col-xl-12 delete-padding-left">
                    <li class="ui-state-default user-list-info-box flex" v-for="item in users">
                        <div class="col-xs col col-sm col-md col-lg col-xl-2 user-list-info-box-image">
                            <span class="text-span title-little">  {{item.first_name}} {{item.last_name}} </span>
                        </div>
                        <div class="col-xs col col-sm col-md col-lg col-xl-2 user-list-info-box-name">
                            <span class="text-span title-little"> {{item.phone}} </span>
                        </div>
                        <div class="col-xs col col-sm col-md col-lg col-xl-2 user-list-info-box-number">
                            <span class="text-span title-little">{{item.postal_code}}</span>
                        </div>
                        <div class="col-xs col col-sm col-md col-lg col-xl-2 user-list-info-box-email">
                            <span class="text-span title-little"> {{item.address}} </span>
                        </div>
                        <div class="col-xs col col-sm col-md col-lg col-xl-2 table-data-feature flex">
                            <a id="error2" class="item delete" v-on:click="delete_user(item.id)" data-toggle="tooltip" data-placement="top" title="" data-original-title="حذف ">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </div>
                        <div class="col-xs col col-sm col-md col-lg col-xl-2 table-data-feature flex">
                            <a id="error234" v-if="item.Exclusive_discounts_id === 0" class="item delete" @click="set_off(item.id)" data-toggle="tooltip" data-placement="top" title="" data-original-title="حذف ">
                                <i   class="far fa-address-card"></i>
                            </a>
                            <a id="error23" @click="unset_off(item.id)" class="item delete" style="background-color: green" v-if="item.Exclusive_discounts_id !== 0"  data-toggle="tooltip" data-placement="top" title="" data-original-title="حذف ">
                                <i class="fas fa-check" style="color: white"></i>
                            </a>
                        </div>
                    </li>
                </ol>-->

<ol id="selectable" v-if="ok === 1"  class="col-xs col col-sm col-md col-lg col-xl-12 delete-padding-left">
                    <li class="ui-state-default user-list-info-box flex" v-for="item in users">
                        <div class="col-xs col col-sm col-md col-lg col-xl-1 user-list-info-box-image">
                            <span class="text-span title-little"> {{item.first_name}} {{item.last_name}} </span>
                        </div>
                        <div class="col-xs col col-sm col-md col-lg col-xl-1 user-list-info-box-name">
                            <span class="text-span title-little"> {{item.phone}} </span>
                        </div>
                        <div class="col-xs col col-sm col-md col-lg col-xl-1 user-list-info-box-name">
                            <span class="text-span title-little">{{item.postal_code}}</span>
                        </div>
                        <div class="col-xs col col-sm col-md col-lg col-xl-2 user-list-info-box-email">
                            <span class="text-span title-little"> {{item.address}} </span>
                        </div>
                        <div  class="col-xs col col-sm col-md col-lg col-xl-2 table-data-feature user-list-info-box-email">
                            <a id="error234" v-if="item.Exclusive_discounts_id === 0" class="item delete" @click="set_off(item.id)" data-toggle="tooltip" data-placement="top" title="" data-original-title="حذف ">
                                <i class="far fa-address-card"></i>
                            </a>

                            <a style="cursor: pointer" @click="unset_off(item.id)" v-if="item.Exclusive_discounts_id !== 0"><span class="text-span title-little"> <span> {{item.exclusive_discount.amount}} </span> درصد </span></a>
                        </div>


                        <div class="col-xs col col-sm col-md col-lg col-xl-2 table-data-feature user-list-info-box-email">
                            <a id="error2s" v-if="!item.credit_limit" @click="set_credit_limit(item.id)" data-toggle="tooltip" data-placement="top" title="" data-original-title="حذف " class="item delete">
                                <i class="fas fa-credit-card"></i>
                            </a>
                            <a style="cursor: pointer" @click="set_credit_limit(item.id)" v-else><span class="text-span title-little"> <span> {{item.credit_limit}} </span> تومان </span></a>
                        </div>

                        <div @click="set_prepayment(item.id)" class="col-xs col col-sm col-md col-lg col-xl-2 table-data-feature user-list-info-box-email">
                            <span style="cursor: pointer" v-if="item.prepayment" class="text-span title-little"> %{{item.prepayment}}</span>
                            <a id="error222" v-if="!item.prepayment"  data-toggle="tooltip" data-placement="top" title="" data-original-title="حذف " class="item delete">
                                <i class="fas fa-dollar-sign"></i>
                            </a>
                        </div>
                        <div class="col-xs col col-sm col-md col-lg col-xl-1 table-data-feature flex">
                            <a @click="delete_user(item.id)" id="error2" data-toggle="tooltip" data-placement="top" title="" data-original-title="حذف " class="item delete">
                                <i class="fas fa-trash-alt"></i>
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
            console.log('users mounted.');
            this.users1();
        } ,
        data() {
            return {
                users: [] ,
                q: '' ,
                ok: 1 ,
            }
        } ,

        methods: {
            set_prepayment(id) {
                Swal.fire({
                    text: "میزان پیش پرداخت را برای این کاربر مشخص کنید (به درصد)",
                    input: "text",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'برداشتن پیش پرداخت',
                    confirmButtonText: 'اعمال پیش پرداخت' ,
                    // customClass: {
                    //     title: 'swl-title'
                    // }
                })
                    .then(value => {
                        if (value.value)
                        {
                            axios({
                                url: `/api/create/prepayment/${id}`,
                                method: 'post',
                                data: {
                                    prepayment: value.value,
                                }
                            })
                                .then(res => {
                                    console.log(res);
                                    Swal.fire({
                                        title: 'پیش پرداخت اعمال شد' ,
                                        icon: 'success',
                                        confirmButtonColor: "#5f1255",
                                    });
                                    this.users1();
                                })
                                .catch(err => {
                                    console.log(err.response);
                                    Swal.fire({
                                        icon: 'error' ,
                                        text: 'اوه به مشکل خوردیم :('
                                    });
                                })
                        }
                        else if (value.dismiss === 'cancel')
                        {
                            Swal.fire({
                                text: "پیش پرداخت برای این کاربر برداشته شود ؟",
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                cancelButtonText: 'خیر',
                                confirmButtonText: 'بله'
                            })
                                .then(result => {
                                    if (result.value)
                                    {
                                        axios({
                                            url: `/api/create/prepayment/${id}`,
                                            method: 'post',
                                            data: {
                                                prepayment: null,
                                            }
                                        })
                                            .then(res => {
                                                console.log(res);
                                                Swal.fire({
                                                    title: 'پیش پرداخت برداشته شد' ,
                                                    icon: 'success',
                                                    confirmButtonColor: "#5f1255",
                                                });
                                                this.users1();
                                            })
                                            .catch(err => {
                                                console.log(err.response);
                                                Swal.fire({
                                                    icon: 'error' ,
                                                    text: 'اوه به مشکل خوردیم :('
                                                });
                                            })
                                    }

                                })
                        }
                    })
            } ,
            set_credit_limit(id) {
                Swal.fire({
                    text: "سقف اعتبار را برای این کاربر مشخص کنید",
                    input: "text",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'برداشتن سقف اعتبار',
                    confirmButtonText: 'اعمال سقف اعتبار'
                })
                    .then((result) => {
                        if (result.dismiss === 'cancel') {
                            Swal.fire({
                                text: "سقف اعتبار برداشته شود؟؟",
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                cancelButtonText: 'خیر',
                                confirmButtonText: 'بله'
                            })
                                .then((ress) => {
                                    if (ress.value)
                                    {
                                        axios({
                                            url: `/api/create/creditLimit/${id}`,
                                            method: 'post',
                                            data: {
                                                credit_limit: result.value,
                                            }
                                        })
                                            .then(res => {
                                                console.log(res);
                                                Swal.fire({
                                                    title: 'سقف اعتبار برداشته شد' ,
                                                    icon: 'success',
                                                    confirmButtonColor: "#5f1255",
                                                });
                                                this.users1();
                                            })
                                            .catch(err => {
                                                console.log(err.response);
                                                Swal.fire({
                                                    icon: 'error' ,
                                                    text: 'اوه به مشکل خوردیم :('
                                                });
                                            })
                                    }

                                })
                        }
                        else if (result.value) {
                            axios({
                                url: `/api/create/creditLimit/${id}`,
                                method: 'post',
                                data: {
                                    credit_limit: result.value,
                                }
                            })
                                .then(res => {
                                    console.log(res);
                                    Swal.fire({
                                        icon: 'success',
                                        text: 'سقف اعتبار اعمال شد'
                                        //  confirmButtonColor: "#DD6B55",
                                    });
                                    this.users1();
                                })
                                .catch(err => {
                                    console.log(err.response);
                                    Swal.fire({
                                        icon: 'error' ,
                                        text: 'اوه به مشکل خوردیم :('
                                    });
                                })
                        }

                    })
            } ,
            unset_off(id) {
                Swal.fire({
                    text: "تخفیف اختصاصی برداشته شود؟؟",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'خیر',
                    confirmButtonText: 'بله'
                })
                    .then((value) => {
                        if (value.value)
                        {
                            axios({
                                url: '/api/delete/exclusive_discounts' ,
                                method: 'post' ,
                                data: {
                                    user_id: id
                                }
                            })
                                .then(res => {
                                    console.log(res);
                                    Swal.fire({
                                        text: "تخفیف اختصاصی برداشته شد",
                                        confirmButtonColor: '#5f1255',
                                        icon: 'success'
                                    });
                                    this.users1();
                                })
                                .catch(err => {
                                    console.log(err.response)
                                })
                        }

                    })

            } ,
            set_off(id) {
                Swal.fire({
                    text: "می خواهید چند درصد تخفیف دهید؟" ,
                    input: 'text'
                })
                    .then((value) => {
                        if (value.value)
                        {
                            axios({
                                url: '/api/create/exclusive_discounts' ,
                                method: 'post' ,
                                data:{
                                    amount: value.value ,
                                    user_id: id
                                }
                            })
                                .then(res => {
                                    console.log(res);
                                    Swal.fire({
                                        icon: 'success' ,
                                        text: 'تخفیف اختصاصی اعمال شد'
                                        //  confirmButtonColor: "#DD6B55",
                                    });
                                    this.users1();
                                })
                                .catch(err => {
                                    console.log(err.response);
                                    Swal.fire({
                                        text: 'اوه به مشکل خوردیم :(' ,
                                        icon: 'error'
                                    });
                                })
                        }

                    });
            } ,
            users1() {
                axios({
                    url: '/api/users' ,
                    method: 'get'
                })
                    .then(res => {
                        console.log(res);
                        this.users = res.data;
                    })
                    .catch(err => {
                        console.log(err.response)
                    })
            } ,
            delete_user(id) {
                if (confirm('آیا از حذف کردن این کاربر مطمئن هستید ؟'))
                {
                    axios({
                        url: `/api/${id}/deleteUser` ,
                        method: 'get'
                    })
                        .then(res => {
                            console.log(res);
                            this.users1();
                        })
                        .catch(err => {
                            console.log(err.response)
                        })
                }

            } ,
            search() {
                axios({
                    url: `/api/search/users/last_name` ,
                    method: 'post' ,
                    data: {
                        q: this.q
                    }
                })
                    .then(res => {
                        console.log(res);
                        this.users = res.data;
                        this.ok = 1;
                    })
                    .catch(err => {
                        console.log(err.response);
                        this.ok = 0;
                    })
            }
        }
    }
</script>

<style>
    .swal2-html-container {
        font-family: irs;
    }
    .swal2-confirm {
        font-family: irs;
    }
    .swal2-cancel {
        font-family: irs;
    }
</style>


