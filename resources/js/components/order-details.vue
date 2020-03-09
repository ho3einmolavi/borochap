<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
                    <div class="panel panel-info">
                        <div class="panel-body">
                            <div class="row">
                                <div class=" col-md-9 col-lg-9 dr-main-details ">
                                    <table class="table table-user-information">
                                        <tbody id="table">
                                        <tr>
                                            <td class="col-md-6">نام مشتری :</td>
                                            <td>{{data['order'].customer}}</td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-6">شماره همراه :</td>
                                            <td>{{data['user'].phone}}</td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-6">شناسه پرداخت :</td>
                                            <td>{{data['order'].pay_id}}</td>
                                        </tr>
                                        <tr v-if="data['order'].paid !== data['order'].final_price">
                                            <td class="col-md-6">میزان بدهی :</td>
                                            <td>{{((data['order'].final_price) - (data['order'].paid)).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}}<span> تومان </span></td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-6">شماره تلفن ثابت :</td>
                                            <td>{{data['user'].printing_office_number}}</td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-6">آدرس :</td>
                                            <td id="5">{{data['user'].address}}</td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-6">کد پستی :</td>
                                            <td>{{data['user'].postal_code}}</td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-6">نوع ارسال :</td>
                                            <td>{{data['user'].delivery}}</td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-6">موضوع سفارش :</td>
                                            <td>{{title}}</td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-6">اندازه :</td>
                                            <td>{{data['order'].size}}</td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-6">جنس کاغذ :</td>
                                            <td>{{data['order'].material}}</td>
                                        </tr>

                                        <tr>
                                            <td class="col-md-6">نوع صحافی :</td>
                                            <td id="3">{{data['order'].Binding}}</td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-6">جنس جلد: </td>
                                            <td id="4">{{data['order'].thickness}}</td>
                                        </tr>

                                        <tr>
                                            <td class="col-md-6">پوشش جلد:</td>
                                            <td id="6">{{data['order'].cover_material}} </td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-6">چاپ جلد:</td>
                                            <td id="7">{{data['order'].cover_type}}</td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-6">لبه برگردان :</td>
                                            <td id="8">{{data['order'].edge}} لبه برگردان </td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-6">دور گرد جلد :</td>
                                            <td id="9">{{data['order'].circle_cover}} </td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-6">تعداد صفحات سیاه و سفید :</td>
                                            <td id="10">{{data['order'].one_color_number}}</td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-6">تعداد صفحات رنگی :</td>
                                            <td>{{data['order'].colorful_number}}</td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-6">تیراژ :</td>
                                            <td>{{data['order'].circulation}}</td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-6">قیمت نهایی :</td>
                                            <td>{{data['order'].final_price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}}<span> تومان </span></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-primary" v-on:click="files(data['order'].file_id , 'pages' , data['user'].id)"> دانلود صفحات</button>
                                    <button type="button" class="btn btn-primary" v-on:click="files(data['order'].file_id , 'covers', data['user'].id)">دانلود جلد</button>
                                    <button type="button" v-if="ok === 1" class="btn btn-primary" v-on:click="files(data['order'].file_id , 'licenses', data['user'].id)">دانلود مجوز</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.data = JSON.parse(localStorage.details);
            console.log(this.data);
            console.log('order details mounted.');
            this.files(this.data['order'].file_id , 'title' , this.data['user'].id);

        } ,
        data() {
            return {
                data: [] ,
                files1:  [] ,
                title: '' ,
                ok: ''
            }
        } ,

        methods: {
            download(id , type , name) {
                axios({
                    url: `/api/download/${id}/${type}/${name}` ,
                    method: 'get'
                })
                    .then(res => {
                        window.location = `/api/download/${id}/${type}/${name}`;
                    })
                    .catch(err => {
                        console.log(err.response);
                        this.$swal('خطایی رخ داده است' , '' , 'error')
                    })
            } ,

            files(id , type , user_id) {
                let name = '';
                axios({
                    url: `/api/order/${id}/files` ,
                    method: 'get'
                })
                    .then(res => {
                        let a = 0;

                       if ( res.data.license_file === null ||  res.data.license_file === '')
                       {
                           this.ok = 0;
                       }
                       else
                       {
                           this.ok = 1;
                       }



                           if (type === 'pages')
                           {
                               name = res.data.pages_file;
                           }
                           if(type === 'covers')
                           {
                               name = res.data.cover_file;
                           }
                           if (type === 'licenses')
                           {
                               name = res.data.license_file;
                           }
                           if (type === 'title')
                           {
                               this.title = res.data.title;
                               a = 1;
                           }

                           if (a === 0)
                           {
                               this.files1 = res.data;
                               this.download(user_id , type , name);
                           }
                    })
                    .catch(err => {
                        console.log(err.response)
                    })
            }

        }
    }
</script>
