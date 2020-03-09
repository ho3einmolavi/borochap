<template>
    <div>
        <div class="col-xs col col-sm col-md col-lg col-xl-12 body-main-calculate">
            <div class="col-xs col col-sm col-md col-lg col-xl-7 calculate-turning flex">


                <div class="col-xs col col-sm col-md-4 col-lg-4 col-xl-4 calculate-turning-right delete-padding-right">
                    <div class="col-xs col col-sm col-md col-lg col-xl-12 calculate-turning-right-top">
                         <label for="inputState" class="text-purple-input">  جنس کاغذ </label>
                                <select id="inputState" v-model="mat" class="form-control form-option select-size color-border">
                                    <option selected="" v-bind:value="item.turning_number"  class="opti" v-for="item in materials1">{{item.name}} </option>
                                </select>
                    </div>
                    <div class="col-xs col col-sm col-md col-lg col-xl-12 calculate-turning-right-bottom">
                        <label for="inputState1" class="text-purple-input"> تعداد صفحه </label>
                                <input type="number" v-model="pages" class="form-control color-border p-input" id="inputState1" placeholder="700" style="text-align: center;">
                    </div>
                </div>
                <div class="col-xs col col-sm col-md-4 col-lg-4 col-xl-4 calculate-turning-left" style="cursor: pointer">
                    <span @click="turning">محاسبه  اندازه عطف</span>
                </div>

                <div class="col-xs col col-sm col-md-4 col-lg-4 col-xl-4 calculate-turning-end flex">
                    <span class="exit-calculate">  {{turning_number}} </span>
                        <span>  میلی متر </span>
                </div>



            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('turning mounted.');
            this.materials();
        } ,

        data() {
            return {
                mat: '',
                materials1: '' ,
                pages: '' ,
                turning_number: ''
            }
        } ,

        methods: {
            turning() {
                let p = this.pages;
                let m = this.mat;
                this.turning_number = (p/2) * m;
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
            }
        }
    }
</script>
