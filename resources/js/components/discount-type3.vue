<template>
    <div>
        <div class="col-xs col-12 col-sm-10 col-md-11 col-lg-10 col-xl-12 users-main delete-padding-left">
            <div class="ui-state-default user-list-info-box-add">
                <div class="admin-form col-xs col col-sm col-md col-lg col-xl-8">
                    <form class="needs-validation" novalidate="">





                        <div class="form-group col-xs col col-sm col-md col-lg col-xl-12">
                            <label for="inputname">چند درصد می خواهید تخفیف بدهید؟؟</label>
                            <input type="number" v-model="amount" class="form-control" id="inputname" placeholder="درصد تخفیف را وارد کنید">
                        </div>


                        <div class="form-group col-xs col col-sm col-md col-lg col-xl-12">
                            <label for="inputname1">این تخفیف را برای چه تعداد تیراژ اعمال می کنید؟</label>
                            <input type="number" v-model="number" class="form-control" id="inputname1" placeholder="تیراژ مورد نظر را وارد کنید">
                        </div>

                        <div class="form-group col-xs col col-sm col-md col-lg col-xl-12">
                            <label for="inputname12">متن تخفیف را جهت نمایش در بنر وارد کنید (اختیاری)</label>
                            <input type="text" v-model="text" class="form-control" id="inputname12" placeholder="متن مورد نظر را وارد کنید">
                        </div>

                        <div class="alert alert-danger form-group col-xs col col-sm col-md col-lg col-xl-12" v-if="ok === 0" role="alert" style="margin-top: 71px;height: auto;float: right">
                            {{errors.data}}
                        </div>
                        <div class="alert alert-success form-group col-xs col col-sm col-md col-lg col-xl-12" v-if="ok === 1" role="alert" style="margin-top: 71px;height: auto;float: right">
                            کد تخفیف با موفقیت ثبت شد
                        </div>
                        <button class="btn btn-primary" type="button" v-on:click="add_off" style="margin-top: 30px;font-size: 13px;margin-right: 20px;"> افزودن  تخفیف مناسبتی</button>
                    </form>

                    <div class="table-table-right col-xs col col-sm- col-md col-lg col-xl-8" style="margin-top:20px;">
                        <table class="table table-bordered table-transation table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
                            <thead>
                            <tr>
                                <th scope="col" class="title-4">ردیف</th>
                                <th scope="col" class="title-4">  مقدار تخفیف </th>
                                <th scope="col" class="title-4"> برای تیراژ بالای ... </th>
                                <th scope="col" class="title-4">متن تخفیف </th>
                                <th scope="col" class="title-4"> حذف </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(item , index) in offs">
                                <th scope="row">{{index + 1}}</th>
                                <td class="title-4">{{item.amount}} درصد</td>
                                <td class="title-4"> {{item.number}}</td>
                                <td class="title-4"> {{item.text}}</td>
                                <td v-on:click="delete_off('type_discounts' , item.id)" class="title-4"><i class="fas fa-trash-alt"></i></td>
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
    export default {
        name: "discount-type3" ,
        mounted() {
            console.log('add discount type3 mounted.');
            this.get_off();
        },
        data() {
            return {
                number: '' ,
                amount: '' ,
                text: '' ,
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
                    url: '/api/show/off/type',
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
                    url: '/api/create/off/type',
                    method: 'post',
                    headers: {
                        accept: 'application/json'
                    },
                    data: {
                        number: this.number ,
                        amount: this.amount ,
                        text: this.text ,
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

<style scoped>

</style>