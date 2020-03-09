<template>
    <div>
        <div class="col-xs col col-sm col-md col-lg col-xl-10 filter-all flex">
            <div class="col-xs col col-sm col-md-5 col-lg col-xl-6 filter-all-right">
                <div class="col-xs col col-sm col-md col-lg col-xl-12 filter-all-right-top delete-padding flex">
                    <div class="col-xs col col-sm col-md col-lg col-xl-2 filter-all-right-top-icon delete-padding">
                        <div class="calculate-price delete-padding m-icon">
                            <img src="/img/icon/calculate-price.png">
                        </div>
                    </div>
                    <div class="col-xs col col-sm col-md col-lg col-xl-10 filter-all-right-top-price delete-padding">
                        <div class="m-price">
                            <span class=" text-white title-3">   محاسبه قیمت </span>
                        </div>
                    </div>
                </div>
                <div class="col-xs col col-sm col-md col-lg col-xl-11 filter-all-right-bottom">
                    <form class="needs-validation" novalidate="">
                        <div class="form-group col-xs col col-sm col-md col-lg col-xl-11 flex">
                            <label for="inputname13" class="text-purple-input">  قطع کتاب  </label>
                            <select id="inputname13" v-model="size" class="form-control form-option select-size color-border">
                                <option class="opti" v-for="item in sizes1"> {{item.name}} </option>
                            </select>
                        </div>

                        <div class="form-group col-xs col col-sm col-md col-lg col-xl-11 flex">
                            <label for="inputname12" class="text-purple-input">  جنس کاغذ </label>
                            <select id="inputname12" v-model="material" class="form-control form-option select-size color-border">
                                <option class="opti" v-for="item in materials1"> {{item.name}}  </option>
                            </select>
                        </div>

                        <div class="form-group col-xs col col-sm col-md col-lg col-xl-11 flex">
                            <label for="inputname11" class="text-purple-input">  نوع صحافی </label>
                            <select id="inputname11" class="form-control form-option select-size color-border" v-model="Binding">
                                <option selected class="opti">  چسب گرم  </option>
                                <option >جلد سخت</option>
                                <option>فنر زنی</option>
                                <option>منگنه زنی</option>
                            </select>
                        </div>


                        <div class="form-group col-xs col col-sm col-md col-lg col-xl-11 flex">
                            <label for="inputname10" class="text-purple-input">  جنس جلد </label>
                            <select id="inputname10" v-model="thickness" class="form-control form-option select-size color-border">
                                <option selected="" class="opti" value="200">  200 گرم </option>
                                <option value="250"> 250 گرم  </option>
                                <option value="300">  300 گرم </option>
                            </select>
                        </div>




                        <div class="form-group col-xs col col-sm col-md col-lg col-xl-11 flex">
                            <label for="inputname9" class="text-purple-input">  پوشش جلد </label>
                            <select id="inputname9" v-model="cover_material" class="form-control form-option select-size color-border">
                                <option selected="" class="opti">سلفون براق</option>
                                <option>سلفون مات</option>
                            </select>
                        </div>

                        <div class="form-group col-xs col col-sm col-md col-lg col-xl-11 flex">
                            <label for="inputname8" class="text-purple-input"> چاپ جلد </label>
                            <select id="inputname8" v-model="cover_type" class="form-control form-option select-size color-border">
                                <option selected="" class="opti"> یک رو </option>
                                <option> دو رو </option>
                            </select>
                        </div>

                    <div class="form-group col-xs col col-sm col-md col-lg col-xl-11 flex">
                        <label for="inputname7" class="text-purple-input">  لبه برگردان </label>
                        <select id="inputname7" v-model="edge" class="form-control form-option select-size color-border">
                            <option selected="" class="opti" value="0">  ندارد </option>
                            <option value="1"> یک لبه برگردان </option>
                            <option value="2">  دو لبه برگردان </option>
                        </select>
                    </div>


                        <div class="form-group col-xs col col-sm col-md col-lg col-xl-11 flex">
                            <label for="inputname6" class="text-purple-input">  دورگرد جلد </label>
                            <select id="inputname6" v-model="circle_cover" class="form-control form-option select-size color-border">
                                <option selected="" class="opti">ندارد </option>
                                <option> دارد </option>
                            </select>
                        </div>



                        <!--<div class="form-group col-xs col col-sm col-md col-lg col-xl-11 flex">-->
                        <!--<label for="inputname21" class="text-purple-input">تراکم تونر رنگی</label>-->
                        <!--<select id="inputname21" v-model="colorful_toner" class="form-control form-option select-size color-border">-->
                        <!--<option selected="" class="opti" value="text"> متن </option>-->
                        <!--<option value="text_picture"> متن و تصویر  </option>-->
                        <!--<option value="picture">  تصویر  </option>-->
                        <!--</select>-->
                        <!--</div>-->


                    </form>

                </div>
            </div>
            <div class="col-xs col col-sm col-md-7 col-lg col-xl-6 filter-all-left">


                <form class="needs-validation" novalidate="">

                    <!--<div class="form-group col-xs col col-sm col-md col-lg col-xl-11 flex">-->
                    <!--<label for="inputname20" class="text-purple-input">تراکم تونر مشکی</label>-->
                    <!--<select id="inputname20" v-model="one_color_toner" class="form-control form-option select-size color-border">-->
                    <!--<option selected="" class="opti" value="text"> متن </option>-->
                    <!--<option value="text_picture"> متن و تصویر  </option>-->
                    <!--<option value="picture">  تصویر  </option>-->
                    <!--</select>-->
                    <!--</div>-->


                    <div class="form-group col-xs col-8 col-sm col-md col-lg col-xl-11 flex number-page-2">
                        <label for="inputname5" class="text-purple-input">  تعداد صفحات  سیاه و سفید</label>
                        <input type="number" v-model="one_color_number" class="form-control color-border p-input" id="inputname5" style="background-color: #cbcbcb;">
                    </div>

                    <div class="form-group col-xs col col-sm col-md col-lg col-xl-11 flex number-page-2">
                        <label for="inputname7" class="text-purple-input">  محتوای صفحات سیاه و سفید </label>
                        <select id="inputname7" v-model="one_color_toner" class="form-control form-option select-size color-border">
                            <option selected="" class="opti" value="text"> متن </option>
                            <option value="text_picture"> متن و تصویر  </option>
                            <option value="picture">  تصویر  </option>
                        </select>
                    </div>


                    <div class="form-group col-xs col-8 col-sm col-md col-lg col-xl-11 flex number-page">
                        <label for="inputname4" class="text-purple-input"> تعداد صفحات  رنگی </label>
                        <input type="number" v-model="colorful_number" class="form-control color-border p-input" id="inputname4" style="background-color: #d2bdd0;">
                    </div>

                    <div class="form-group col-xs col col-sm col-md col-lg col-xl-11 flex">
                        <label for="inputname71" class="text-purple-input">  محتوای صفحات  رنگی</label>
                        <select id="inputname71" v-model="colorful_toner" class="form-control form-option select-size color-border">
                            <option selected="" class="opti" value="text_picture"> متن  و تصویر </option>
                            <option value="text"> متن  </option>
                            <option value="picture"> تصویر </option>
                        </select>
                    </div>

                    <div class="form-group col-xs col-8 col-sm col-md col-lg col-xl-11 flex">
                        <label for="inputname3" class="text-purple-input" > تیراژ کتاب </label>
                        <input type="number" v-model="circulation" class="form-control color-border p-input" id="inputname3">
                    </div>


<!------>
                    <div class="form-group col-xs col col-sm col-md col-lg col-xl-11 flex">
                        <label for="inputname7" class="text-purple-input">  نحوه محاسبه قیمت </label>
                        <select id="inputname7" class="form-control form-option select-size color-border">
                            <option selected="" class="opti" value="0">  همراه با کاغذ </option>
                            <option value="1"> بدون کاغذ  </option>
                        </select>
                    </div>

<!------>


                    <div class="form-group col-xs col col-sm col-md col-lg col-xl-11 flex">
                        <div class="input-price text-purple-input">
                            <div class="col-xs col col-sm col-md col-lg col-xl-12 delete-padding-left">
                                <input type="button" v-on:click="final_cost" name="price" value="محاسبه قیمت  نهایی">
                            </div>
                        </div>
                    </div>


                    <div v-if="loader === 0" class="col-xs col-12 col-sm col-md col-lg col-xl-12 index-form">
                        <div class="form-group col-xs col-12 col-sm col-md col-lg col-xl-11 flex">
                            <label  class="text-purple-input PRICE-P"> قیمت هر جلد </label>
                            <!--<input type="text" class="form-control color-border p-input" v-model="final.book_cost"  id="inputname1" placeholder="تومان " value="تومان" style="direction: ltr">-->
                            <span  class="price-cover"> {{final.book_cost}}</span>
                            <span style="padding-right: 5px;padding-top: 5px;"> تومان </span>
                        </div>
                        <div class="form-group col-xs col-12 col-sm col-md col-lg col-xl-11 flex">
                            <label class="text-purple-input PRICE-T">قیمت کل سفارش</label>
                           <!-- <input type="text" class="form-control color-border" v-model="final.final_price"  id="inputname" placeholder="تومان" style="direction: ltr">-->
                            <span class="price-cover"> {{final.final_price}}</span>
                            <span style="padding-right: 5px;padding-top: 5px;"> تومان</span>
                        </div>
                    </div>
                    <div v-if="loader === 1" class="col-xs col-12 col-sm col-md col-lg col-xl-12  lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
                    <div class="col-xs col-7 col-sm col-md col-lg col-xl-7 alert alert-danger form-control color-border p-input" v-if="ok === 0" role="alert" style="omargin-tp: 71px;height: auto;float: left; margin-left: 50px !important;text-align:right;font-size:12px;">
                        {{errors.data}}
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        created() {
            localStorage.removeItem('final');
            localStorage.removeItem('title');
            localStorage.removeItem('cost');
            localStorage.removeItem('details');
            console.log('Component mounted.');
            this.sizes();
            this.materials();
        } ,
        data() {
            return {
                loader: '' ,
                ok: '',
                errors: '' ,
                one_color_toner: 'text' ,
                circle_cover: 'ندارد' ,
                circulation: 1 ,
                thickness: '200' ,
                edge: '0' ,
                Binding: 'چسب گرم' ,
                size: '',
                material: '' ,
                one_color_number: 1 ,
                colorful_number: 1 ,
                colorful_toner: 'text_picture' ,
                cover_type: 'یک رو' ,
                cover_material: 'سلفون براق' ,
                sizes1 : [] ,
                materials1: [] ,
                final: []
            }
        } ,
        methods:{
            final_cost() {
                this.loader = 1;
                this.ok = 1;
                axios({
                        url: '/api/Cal' ,
                    method: 'post' ,
                    headers: {
                        accept: 'application/json'
                    } ,
                    data:{
                        one_color_toner: this.one_color_toner ,
                        circulation: this.circulation ,
                        thickness: this.thickness ,
                        edge: this.edge ,
                        Binding: this.Binding ,
                        size: this.size ,
                        material: this.material ,
                        circle_cover: this.circle_cover ,
                        one_color_number: this.one_color_number ,
                        colorful_number: this.colorful_number ,
                        colorful_toner: this.colorful_toner ,
                        cover_type: this.cover_type ,
                        cover_material: this.cover_material ,
                    }
                })
                    .then(res => {
                        console.log(res);
                        localStorage.setItem('final' , JSON.stringify(res.data));
                        this.final = res.data;
                        this.final.book_cost = this.final.book_cost.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                        this.final.final_price = this.final.final_price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                        this.ok = 1 ;
                        this.loader = 0;
                    })
                    .catch(err => {
                        if (err.response.status === 400 || err.response.status === 404)
                        {
                            console.log(err.response);
                            localStorage.removeItem('final');
                            this.ok = 0;
                            this.errors = err.response;
                            this.final = '';
                            this.loader = '';
                        }
                        else
                        {
                            console.log(err.response);
                            localStorage.removeItem('final');
                            this.ok = 0;
                            this.errors = 'error';
                            this.final = '';
                            this.loader = '';
                        }

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

<style scoped>
    .lds-roller {
        display: inline-block;
        position: relative;
        width: 40px;
        height: 40px;
    }
    .lds-roller div {
        animation: lds-roller 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
        transform-origin: 40px 40px;
    }
    .lds-roller div:after {
        content: " ";
        display: block;
        position: absolute;
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #6a2260;
        margin: -4px 0 0 -4px;
    }
    .lds-roller div:nth-child(1) {
        animation-delay: -0.036s;
    }
    .lds-roller div:nth-child(1):after {
        top: 63px;
        left: 63px;
    }
    .lds-roller div:nth-child(2) {
        animation-delay: -0.072s;
    }
    .lds-roller div:nth-child(2):after {
        top: 68px;
        left: 56px;
    }
    .lds-roller div:nth-child(3) {
        animation-delay: -0.108s;
    }
    .lds-roller div:nth-child(3):after {
        top: 71px;
        left: 48px;
    }
    .lds-roller div:nth-child(4) {
        animation-delay: -0.144s;
    }
    .lds-roller div:nth-child(4):after {
        top: 72px;
        left: 40px;
    }
    .lds-roller div:nth-child(5) {
        animation-delay: -0.18s;
    }
    .lds-roller div:nth-child(5):after {
        top: 71px;
        left: 32px;
    }
    .lds-roller div:nth-child(6) {
        animation-delay: -0.216s;
    }
    .lds-roller div:nth-child(6):after {
        top: 68px;
        left: 24px;
    }
    .lds-roller div:nth-child(7) {
        animation-delay: -0.252s;
    }
    .lds-roller div:nth-child(7):after {
        top: 63px;
        left: 17px;
    }
    .lds-roller div:nth-child(8) {
        animation-delay: -0.288s;
    }
    .lds-roller div:nth-child(8):after {
        top: 56px;
        left: 12px;
    }
    @keyframes lds-roller {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }

</style>


