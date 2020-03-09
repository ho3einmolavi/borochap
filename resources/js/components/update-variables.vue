<template>
    <div>
        <div class="col-xs col-12 col-sm-10 col-md-11 col-lg-10 col-xl-12 users-main delete-padding-left">
            <div class="ui-state-default user-list-info-box-add">
                <div class="admin-form col-xs col col-sm col-md col-lg col-xl-8">
                    <form class="needs-validation" novalidate="">

                        <div class="form-group col-xs col col-sm col-md col-lg col-xl-12">
                            <label for="inputname">جمع استهلاک مشکی</label>
                            <input type="text" v-model="variable[0].jame_estelake_meshki"  class="form-control" id="inputname" >
                        </div>


                        <div class="form-group col-xs col col-sm col-md col-lg col-xl-12">
                            <label for="inputname1">تونر متن مشکی</label>
                            <input type="text" v-model="variable[0].toner_matn_meshki"  class="form-control" id="inputname1" >
                        </div>

                        <div class="form-group col-xs col col-sm col-md col-lg col-xl-12">
                            <label for="inputname10">کلیه تحریرها</label>
                            <input type="text" v-model="variable[0].koliye_tahrirha" class="form-control" id="inputname10" >
                        </div>


                        <div class="form-group col-xs col col-sm col-md col-lg col-xl-12">
                            <label for="inputname10">کلیه گلاسه ها</label>
                            <input type="text" v-model="variable[0].koliye_gelaseha"  class="form-control" id="inputname10">
                        </div>


                        <div class="form-group col-xs col col-sm col-md col-lg col-xl-12">
                            <label for="inputname10">تونر متن رنگی</label>
                            <input type="text"  v-model="variable[0].toner_rangi_matn" class="form-control" id="inputname10" >
                        </div>


                        <div class="form-group col-xs col col-sm col-md col-lg col-xl-12">
                            <label for="inputname10">تونر متن و تصویر رنگی</label>
                            <input type="text" v-model="variable[0].toner_rangi_matn_tasvir"  class="form-control" id="inputname10" >
                        </div>



                        <div class="form-group col-xs col col-sm col-md col-lg col-xl-12">
                            <label for="inputname10">تونر تصویر رنگی</label>
                            <input type="text" v-model="variable[0].toner_rangi_tasvir" class="form-control" id="inputname10" >
                        </div>




                        <div class="form-group col-xs col col-sm col-md col-lg col-xl-12">
                            <label for="inputname10">سود مورد نظر حاشیه سود مشکی</label>
                            <input type="text" v-model="variable[0].sude_morede_nazar"  class="form-control" id="inputname10">
                        </div>

                        <div class="form-group col-xs col col-sm col-md col-lg col-xl-12">
                            <label for="inputname10">استهلاک رنگی کلیه کاغذها</label>
                            <input type="text" v-model="variable[0].toner_rangi_estelak" class="form-control" id="inputname10" >
                        </div>

                        <div class="form-group col-xs col col-sm col-md col-lg col-xl-12">
                            <label for="inputname10">هزینه جلد + سلفون رحلی</label>
                            <input type="text" v-model="variable[0].hazine_jeld_selefon" class="form-control" id="inputname10" >
                        </div>


                        <div class="form-group col-xs col col-sm col-md col-lg col-xl-12">
                            <label for="inputname10">چسب گرم</label>
                            <input type="text" v-model="variable[0].chasbe_garm" class="form-control" id="inputname10" >
                        </div>

                        <div class="form-group col-xs col col-sm col-md col-lg col-xl-12">
                            <label for="inputname10">جلد سخت</label>
                            <input type="text" v-model="variable[0].jelde_sakht"  class="form-control" id="inputname10" >
                        </div>

                        <div class="form-group col-xs col col-sm col-md col-lg col-xl-12">
                            <label for="inputname10">فنر زنی</label>
                            <input type="text" v-model="variable[0].fanar_zani" class="form-control" id="inputname10" >
                        </div>

                        <div class="form-group col-xs col col-sm col-md col-lg col-xl-12">
                            <label for="inputname10">منگنه زنی</label>
                            <input type="text" v-model="variable[0].mangane_zani"  class="form-control" id="inputname10">
                        </div>


                        <div class="alert alert-danger form-group col-xs col col-sm col-md col-lg col-xl-12" v-if="ok === 0" role="alert" style="margin-top: 71px;height: auto;float: right">
                            {{error}}
                        </div>
                        <div class="alert alert-success form-group col-xs col col-sm col-md col-lg col-xl-12" v-if="ok === 1" role="alert" style="margin-top: 71px;height: auto;float: right">
                            تغییرات با موفقیت اعمال شد
                        </div>
                        <button class="btn btn-primary" type="button" @click="add_variable"  style="margin-top: 30px;font-size: 13px;margin-right: 20px;"> تغییر متغیرها</button>
                    </form>

                    <div class="table-table-right col-xs col col-sm- col-md col-lg col-xl-8" style="margin-top:20px;">
                        <table class="table table-bordered table-transation table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
                            <thead>
                            <tr>
                                <th scope="col" class="title-4">ردیف</th>
                                <th scope="col" class="title-4"> جمع استهلاک مشکی </th>
                                <th scope="col" class="title-4">تونر متن مشکی </th>
                                <th scope="col" class="title-4">کلیه تحریر ها</th>
                                <th scope="col" class="title-4">کلیه گلاسه ها</th>
                                <th scope="col" class="title-4">تونر متن رنگی</th>
                                <th scope="col" class="title-4">تونر متن و تصویر رنگی</th>
                                <th scope="col" class="title-4">تونر تصویر رنگی</th>
                                <th scope="col" class="title-4">سود مورد نظر حاشیه سود مشکی</th>
                                <th scope="col" class="title-4">استهلاک رنگی کلیه کاغذها</th>
                                <th scope="col" class="title-4">هزینه جلد + سلفون رحلی</th>
                                <th scope="col" class="title-4">چسب گرم</th>
                                <th scope="col" class="title-4">جلد سخت</th>
                                <th scope="col" class="title-4">فنر زنی</th>
                                <th scope="col" class="title-4">منگنه زنی</th>
                                <th scope="col" class="title-4"> حذف </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(item , index) in variables">
                                <th scope="row">{{index}}</th>
                                <td class="title-4">{{item.jame_estelake_meshki}}</td>
                                <td class="title-4"> {{item.toner_matn_meshki}}</td>
                                <td class="title-4"> {{item.koliye_tahrirha}}</td>
                                <td class="title-4"> {{item.koliye_gelaseha}}</td>
                                <td class="title-4"> {{item.toner_rangi_matn}}</td>
                                <td class="title-4"> {{item.toner_rangi_matn_tasvir}}</td>
                                <td class="title-4"> {{item.toner_rangi_tasvir}}</td>
                                <td class="title-4"> {{item.sude_morede_nazar}}</td>
                                <td class="title-4"> {{item.toner_rangi_estelak}}</td>
                                <td class="title-4"> {{item.hazine_jeld_selefon}}</td>
                                <td class="title-4"> {{item.chasbe_garm}}</td>
                                <td class="title-4"> {{item.jelde_sakht}}</td>
                                <td class="title-4"> {{item.fanar_zani}}</td>
                                <td class="title-4"> {{item.mangane_zani}}</td>
                                <td v-on:click="delete_var('variables' , item.id)" class="title-4"><i class="fas fa-trash-alt"></i></td>
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
        mounted() {
            console.log('update variables mounted.');
            this.show();
        },

        data() {
            return {
                variable: {
                    chasbe_garm: '' ,
                    fanar_zani: '' ,
                    hazine_jeld_selefon: '' ,
                    jame_estelake_meshki: '' ,
                    jelde_sakht: '' ,
                    koliye_gelaseha: '' ,
                    koliye_tahrirha: '' ,
                    mangane_zani: '' ,
                    sude_morede_nazar: '' ,
                    toner_matn_meshki: '' ,
                    toner_rangi_estelak: '' ,
                    toner_rangi_matn: '' ,
                    toner_rangi_matn_tasvir: '' ,
                    toner_rangi_tasvir: '' ,
                } ,
                ok: '' ,
                error: [] ,
                variables: []
            }
        } ,

        methods: {
            delete_var(table , id) {
                axios({
                    url: `/api/${table}/${id}/delete` ,
                    method: 'get' ,
                    headers: {
                        accept: 'application/json'
                    } ,
                })
                    .then(res => {
                        console.log(res);
                        this.show();
                    })
                    .catch(err => console.log(err.response))
            } ,
            add_variable(){
                axios({
                    url: '/api/create/variables' ,
                    method: 'post' ,
                    headers: {
                        accept: 'application/json'
                    } ,
                    data: {
                        chasbe_garm: this.variable[0].chasbe_garm ,
                        fanar_zani: this.variable[0].fanar_zani ,
                        hazine_jeld_selefon:  this.variable[0].hazine_jeld_selefon ,
                        jame_estelake_meshki:  this.variable[0].jame_estelake_meshki ,
                        jelde_sakht:  this.variable[0].jelde_sakht ,
                        koliye_gelaseha:  this.variable[0].koliye_gelaseha ,
                        koliye_tahrirha:  this.variable[0].koliye_tahrirha ,
                        mangane_zani:  this.variable[0].mangane_zani ,
                        sude_morede_nazar:  this.variable[0].sude_morede_nazar ,
                        toner_matn_meshki:  this.variable[0].toner_matn_meshki ,
                        toner_rangi_estelak:  this.variable[0].toner_rangi_estelak ,
                        toner_rangi_matn:  this.variable[0].toner_rangi_matn ,
                        toner_rangi_matn_tasvir:  this.variable[0].toner_rangi_matn_tasvir ,
                        toner_rangi_tasvir:  this.variable[0].toner_rangi_tasvir ,
                    }
                })
                    .then(res => {
                        console.log(res);
                        this.ok = 1;
                        this.show();
                    })
                    .catch(err => {
                        console.log(err.response);
                        this.ok = 0;
                        this.error = err.response.data
                    })
            } ,
           show() {
               axios({
                   url: '/api/show/variables' ,
                   method: 'get' ,
                   headers: {
                       accept: 'application/json'
                   } ,
               })
                   .then(res => {
                        console.log(res);
                       this.variables = res.data;
                       this.variable = this.variables;
                       console.log(this.variable)
                       console.log(this.variables)
                   })
                   .catch(err => {
                       console.log(err.response);
                       this.ok = 0;
                       this.error = err.response.data
                   })
           }
        } ,


    }
</script>

<style scoped>

</style>