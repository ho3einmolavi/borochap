<template>
    <div>
        <div class="col-xs col-12 col-sm-10 col-md-11 col-lg-10 col-xl-12 users-main delete-padding-left">
            <div class="ui-state-default user-list-info-box-add">
                <div class="admin-form col-xs col col-sm- col-md col-lg col-xl-8">
                     <form class="needs-validation" novalidate="">
                        <div class="form-group col-xs col col-sm- col-md col-lg col-xl-12 flex">
                            <div class="form-group col-xs col col-sm- col-md col-lg col-xl-5">
                                <label for="inputname"> سایز کتاب  </label>
                                <input type="text" class="form-control" v-model="size_name" id="inputname" placeholder="سایز کتاب را وارد کنید">
                            </div>
                            <div class="form-group col-xs col col-sm- col-md col-lg col-xl-5">
                                <label for="inputname1"> مساحت کتاب </label>
                                <input type="number" v-model="surface" class="form-control" id="inputname1" placeholder="مساحت کتاب را وارد کنید">
                            </div>
                             <div class="col-xs col col-sm- col-md col-lg col-xl-2">
                            <button class="btn btn-primary" type="button" v-on:click="add_sizes" style="margin-top: 40px;font-size: 13px;margin-right: 20px;"> ارسال </button>
                        </div>

                        </div>
                        <div class="form-group col-xs col col-sm- col-md col-lg col-xl-12 flex">

                              <div class="form-group col-xs col col-sm- col-md col-lg col-xl-3">
                                <label for="inputname2"> جنس کاغذ</label>
                                <input type="text" v-model="material_name" class="form-control" id="inputname2" placeholder="جنس کاغذ را وارد کنید">
                            </div>
                            <div class="form-group col-xs col col-sm- col-md col-lg col-xl-3">
                                <label for="inputState">  نوع کاغذ </label>
                                <select id="inputState" v-model="type" class="form-control form-option select-size">
                                    <option selected="" class="opti">  گلاسه  </option>
                                    <option>تحریر</option>
                                   </select>
                            </div>
                            <div class="form-group col-xs col col-sm- col-md col-lg col-xl-3">
                                <label for="inputname5"> ضریب اندازه عطف</label>
                                <input type="number" v-model="turning_number" class="form-control" id="inputname5" placeholder="جنس کاغذ را وارد کنید">
                            </div>
                             <div class="col-xs col col-sm- col-md col-lg col-xl-2">
                            <button class="btn btn-primary" type="button" v-on:click="add_material" style="margin-top: 40px;font-size: 13px;margin-right: 20px;"> ارسال </button>
                        </div>
                        </div>

                     </form>
                </div>
                <div class="table-table col-xs col col-sm- col-md col-lg col-xl-12 flex">
                     <div class="table-table-right col-xs col col-sm- col-md col-lg col-xl-5">
 <table class="table table-bordered table-transation table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
  <thead>
    <tr>
      <th scope="col" class="title-4">ردیف</th>
      <th scope="col" class="title-4">  سایز کتاب </th>
      <th scope="col" class="title-4">  مساحت کتاب </th>
      <th scope="col" class="title-4"> حذف </th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="item in sizes1">
      <th scope="row">{{item.id}}</th>
      <td class="title-4">{{item.name}}  </td>
      <td class="title-4">{{item.surface}}</td>
      <td class="title-4" v-on:click="delete1('sizes' , item.id)"><i class="fas fa-trash-alt"></i></td>
    </tr>
  </tbody>
</table>
                     </div>

                      <div class="table-table-left col-xs col col-sm- col-md col-lg col-xl-7">

                         <table class="table table-bordered table-transation table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
  <thead>
    <tr>
      <th scope="col" class="title-4">ردیف</th>
      <th scope="col" class="title-4">  جنس کاغذ  </th>
      <th scope="col" class="title-4"> نوع کاغذ</th>
      <th scope="col" class="title-4"> ضریب اندازه عطف</th>
      <th scope="col" class="title-4"> حذف </th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="item in materials1">
      <th scope="row">{{item.id}}</th>
      <td class="title-4">{{item.name}}</td>
      <td class="title-4"> {{item.type}}   </td>
      <td class="title-4"> {{item.turning_number}}   </td>
      <td class="title-4" v-on:click="delete2('materials' , item.id)"><i class="fas fa-trash-alt"></i></td>
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
            console.log('add size mounted.');
            this.sizes();
            this.materials();
        } ,

        data() {
            return {
                size_name: '' ,
                surface: '' ,
                material_name: '' ,
                type: '' ,
                sizes1: [] ,
                materials1: [] ,
                turning_number: ''
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
                        this.sizes();
                    })
                    .catch(err => console.log(err.response))
            },
            delete2(table , id) {
                axios({
                    url: `/api/${table}/${id}/delete` ,
                    method: 'get' ,
                    headers: {
                        accept: 'application/json'
                    } ,
                })
                    .then(res => {
                        console.log(res);
                        this.materials();
                    })
                    .catch(err => console.log(err.response))
            },
            add_sizes() {
                axios({
                    url: '/api/create/size',
                    method: 'post',
                    data: {
                        name: this.size_name,
                        surface: this.surface
                    }
                })
                    .then(res => {
                        console.log(res.data);
                        this.sizes();
                    })
                    .catch(err => {
                        console.log(err.response)
                    })
            },
            add_material() {
                axios({
                    url: '/api/create/material',
                    method: 'post',
                    data: {
                        name: this.material_name,
                        type: this.type ,
                        turning_number: this.turning_number
                    }
                })
                    .then(res => {
                        console.log(res.data);
                        this.materials();
                    })
                    .catch(err => {
                        console.log(err.response)

                    })
            } ,
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

        }
    }
</script>
