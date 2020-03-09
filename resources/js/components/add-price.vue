<template>
    <div>
        <div class="ui-state-default user-list-info-box-add">
            <div class="admin-form col-xs col col-sm- col-md col-lg col-xl-8">
                <form class="needs-validation" novalidate="">



                    <div class="form-group col-xs col col-sm- col-md col-lg col-xl-12 flex">
                        <div class="form-group col-xs col col-sm- col-md col-lg col-xl-6">


                            <label for="inputState"> سایز کتاب </label>
                            <select id="inputState" v-model="sizes2" class="form-control form-option select-size">
                                <option selected="" v-for="size in sizes1"  class="opti">  {{size.name}} </option>
                            </select>


                        </div>
                        <div class="form-group col-xs col col-sm- col-md col-lg col-xl-6">


                            <label for="inputState1"> جنس کاغذ </label>
                            <select id="inputState1" v-model="materials2" class="form-control form-option select-size">
                                <option selected="" v-for="material in materials1"  class="opti">  {{material.name}} </option>
                            </select>

                        </div>

                    </div>

                    <div class="col-xs col col-sm col-md col-lg col-xl-6 calculate-turning-bottom flex">
                        <div class="col-xs col col-sm col-md col-lg col-xl-7 calculate-turning-bottom-right">
                            <span v-on:click="price" style="cursor: pointer">   افزودن قیمت </span>
                        </div>
                        <div class="col-xs col col-sm col-md col-lg col-xl-5 calculate-turning-bottom-left delete-padding">
                            <input type="number" v-model="price1" name="add-price" class="add-pprice">
                        </div>
                    </div>

                    <div class="alert alert-danger form-group col-md-12 col-10 flex delete-padding" v-if="ok === 0" role="alert" style="margin-top: 71px;height: auto;float: right">
                        {{errors.data}}
                    </div>
                </form>

<div class="table-table-right col-xs col col-sm- col-md col-lg col-xl-8">
    <table class="table table-bordered table-transation table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
    <thead>
        <tr>
            <th scope="col" class="title-4">ردیف</th>
             <th scope="col" class="title-4">  سایز کتاب </th>
              <th scope="col" class="title-4"> جنس کاغذ</th> 
               <th scope="col" class="title-4"> قیمت </th>
              <th scope="col" class="title-4"> حذف </th>
          </tr>
      </thead>
       <tbody>
        <tr v-for="item in show1">
            <th scope="row">{{item.id}}</th>
             <td class="title-4">{{item.size}}  </td>
              <td class="title-4"> {{item.material}}</td>
               <td class="title-4"> {{item.price}} تومان</td>
              <td class="title-4" v-on:click="delete1('material_size' , item.id)"><i class="fas fa-trash-alt"></i></td>
          </tr>
       </tbody>
   </table>
</div>


            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('add price mounted.');
            this.sizes();
            this.materials();
            this.show();
        } ,

        data() {
            return {
                sizes1: '' ,
                sizes2: '' ,
                materials1: '' ,
                materials2: '' ,
                price1: '' ,
                ok: '' ,
                errors: '' ,
                data: '' ,
                show1: []
            }
        } ,

        methods: {
            delete1(table , id) {
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
            },
            show() {
                axios({
                    url: '/api/prices' ,
                    method: 'get' ,
                    headers: {
                        accept: 'application/json'
                    } ,
                })
                    .then(res => {
                        console.log(res);
                        this.show1 = res.data;
                    })
                    .catch(err => console.log(err.response))
            },
            sizes() {
                axios({
                    url: '/api/index/sizes' ,
                    method: 'get' ,
                    headers: {
                        accept: 'application/json'
                    } ,
                })
                    .then(res => {
                        console.log(res);
                        this.sizes1 = res.data;
                    })
                    .catch(err => console.log(err.response))
            } ,
            materials() {
                axios({
                    url: '/api/index/materials' ,
                    method: 'get' ,
                    headers: {
                        accept: 'application/json'
                    } ,
                })
                    .then(res => {
                        console.log(res);
                        this.materials1 = res.data;
                    })
                    .catch(err => console.log(err.response))
            } ,

            price() {
                axios({
                    url: '/api/create/price' ,
                    method: 'post' ,
                    headers: {
                        accept: 'application/json'
                    } ,
                    data: {
                        size: this.sizes2 ,
                        material: this.materials2 ,
                        price: this.price1,
                    }
                })
                    .then(res => {
                        console.log(res);
                        this.ok = 1;
                        this.data = res.data;
                        this.show();
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
