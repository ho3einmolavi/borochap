<template>
    <div>
        <div class="col-xs col-12 col-sm-10 col-md-11 col-lg-10 col-xl-12 users-main delete-padding-left">
            <div class="ui-state-default user-list-info-box-add">
                <div class="admin-form col-xs col col-sm col-md col-lg col-xl-8">
                    <form class="needs-validation" novalidate="">





                        <div class="form-group col-xs col col-sm col-md col-lg col-xl-12">
                            <label for="inputname">کد تخفیف</label>
                            <input type="text" v-model="name" class="form-control" id="inputname" placeholder="شناسه را وارد کنید">
                        </div>


                        <div class="form-group col-xs col col-sm col-md col-lg col-xl-12">
                            <label for="inputname1">مبلغ تخفیف</label>
                            <input type="text" v-model="amount" class="form-control" id="inputname1" placeholder=" مبلغ تخفیف را به تومان وارد کنید">
                        </div>
                        <div class="form-group col-xs col col-sm col-md col-lg col-xl-12">
                            <label>تاریخ انقضا</label>
                            <date-picker v-model="expire" :color="'#7A0099'"></date-picker>
                            {{expire}}
                        </div>
                        <div class="alert alert-danger form-group col-xs col col-sm col-md col-lg col-xl-12" v-if="ok === 0" role="alert" style="margin-top: 71px;height: auto;float: right">
                            {{errors.data}}
                        </div>
                        <div class="alert alert-success form-group col-xs col col-sm col-md col-lg col-xl-12" v-if="ok === 1" role="alert" style="margin-top: 71px;height: auto;float: right">
                            کد تخفیف با موفقیت ثبت شد
                        </div>
                        <button class="btn btn-primary" type="button" v-on:click="add_off" style="margin-top: 30px;font-size: 13px;margin-right: 20px;"> افزودن  تخفیف</button>
                    </form>

                    <div class="table-table-right col-xs col col-sm- col-md col-lg col-xl-8" style="margin-top:20px;">
                        <table class="table table-bordered table-transation table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
                            <thead>
                                <tr>
                                    <th scope="col" class="title-4">ردیف</th>
                                     <th scope="col" class="title-4">  کد تخفیف </th>
                                      <th scope="col" class="title-4"> مبلغ تخفیف </th>
                                      <th scope="col" class="title-4"> تاریخ انقضا </th>
                                        <th scope="col" class="title-4"> حذف </th>
                                    </tr>
                                </thead>
                                 <tbody>
                                    <tr v-for="item in offs">
                                        <th scope="row">{{item[0].id}}</th>
                                         <td class="title-4">{{item[0].name}}</td>
                                           <td class="title-4"> {{item[0].amount}}</td>
                                           <td class="title-4"> {{item[1]}}</td>
                                            <td v-on:click="delete_off('discounts' , item[0].id)" class="title-4"><i class="fas fa-trash-alt"></i></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    var moment = require('jalali-moment');
    export default {
        mounted() {
            console.log('add discount mounted.');
            this.get_off();
        },

        data() {
            return {
                name: '' ,
                amount: '' ,
                expire: '' ,
                ok: '' ,
                errors: '' ,
                offs: []
            }
        } ,

        methods: {
            delete_off(table , id) {
                axios({
                    url: `/api/${table}/${id}/delete` ,
                    method: 'get' ,
                    headers: {
                        accept: 'application/json'
                    } ,
                })
                    .then(res => {
                        console.log(res);
                        this.get_off();
                    })
                    .catch(err => console.log(err.response))
            } ,
            get_off() {
                axios({
                    url: '/api/discounts',
                    method: 'get',
                    headers: {
                        accept: 'application/json'
                    },
                })
                    .then(res => {
                        console.log(res);
                        this.offs = res.data;
                    })
                    .catch(err => {
                        console.log(err.response);
                    })
            } ,

            add_off() {
                axios({
                    url: '/api/create/off',
                    method: 'post',
                    headers: {
                        accept: 'application/json'
                    },
                    data: {
                        name: this.name ,
                        amount: this.amount ,
                        expire: moment.from(this.expire, 'fa', 'YYYY/MM/DD').format('YYYY-MM-DD')
                    }
                })
                    .then(res => {
                        console.log(res);
                        this.ok = 1 ;
                        this.get_off();
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



