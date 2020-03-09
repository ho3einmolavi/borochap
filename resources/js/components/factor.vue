<template>
    <div>
        <div class="col-xs col col-sm col-md col-lg col-xl-12 factor-main">
            <div class="col-xs col col-sm col-md col-lg col-xl-10 factor-main-inside flex delete-padding">
                <div class="col-xs col col-sm col-md-12 col-lg-9 col-xl-9 factor-main-inside-right">
                    <div class="col-xs col col-sm col-md col-lg col-xl-12 factor-main-inside-top delete-padding">
                        <div class="col-xs col col-sm col-md col-lg col-xl-12 factor-main-inside-top-subject">
                            <div class="factor-main-inside-top-subject-god">
                                <span> هوالرزاق </span>
                            </div>
                            <div class="factor-main-inside-top-subject-factor">
                                <span>  فاکتور فروش </span>
                            </div>
                            <div class="col-xs col col-sm col-md col-lg col-xl-12 factor-main-inside-top-subject-all flex delete-padding">
                                <div class="col-xs col col-sm col-md col-lg col-xl-6 factor-main-inside-top-subject-all-right delete-padding">
                                    <!--<div class="col-xs col col-sm col-md col-lg col-xl-12 Buyer-all">
                                        <span class="color-factor">  خریدار : {{data2.first_name}} {{data2.last_name}} </span>
                                    </div>-->
                                    <!--jadid-->
<div class="col-xs col col-sm col-md col-lg col-xl-12 Buyer-all flex">
  <div class="col-xs col col-sm col-md col-lg col-xl-9 Buyer-all-right">
  <span class="color-factor">  خریدار : {{data2.first_name}} {{data2.last_name}} </span>
</div>
    <div class="col-xs col col-sm col-md col-lg col-xl-3 Buyer-all-left">
  <span class="color-factor">  تاریخ  : 27/11/1398 </span>
</div>
</div>
                                    <!--end-jadid-->
                                    <!--<div class="col-xs col col-sm col-md col-lg col-xl-12 Buyer-all-res">-->
                                        <!--<span class="color-factor">  خریدار :</span>-->
                                    <!--</div>-->

                                   <!-- <div class="col-xs col col-sm col-md col-lg col-xl-12 address-all">
                                        <span class="color-factor">  آدرس : {{data2.address}} </span>
                                    </div>-->

                                    <!--jadid--->
<div class="col-xs col col-sm col-md col-lg col-xl-12 address-all flex">
  <div class="col-xs col col-sm col-md col-lg col-xl-9 address-all-right">
  <span class="color-factor">  آدرس : {{data2.address}} </span>
</div>
    <div class="col-xs col col-sm col-md col-lg col-xl-3 address-all-left">
  <span class="color-factor">  شماره سفارش  :  </span>
</div>
</div>
                                    <!--jadid--->
                                    <div class="col-xs col col-sm col-md col-lg col-xl-12 address-all-res">
                                        <span class="color-factor">  آدرس : {{data2.address}} </span>
                                    </div>



                                </div>
                                <div class="col-xs col col-sm col-md col-lg col-xl-6 factor-main-inside-top-subject-all-left delete-padding">
                                    <div class="col-xs col col-sm col-md col-lg col-xl-12 subject-all">
                                        <span class="color-factor">  موضوع : {{title}} </span>
                                    </div>

                                    <div class="col-xs col col-sm col-md col-lg col-xl-12 subject-all-res">
                                        <span class="color-factor">  موضوع : </span>
                                    </div>

                                    <div class="col-xs col col-sm col-md col-lg col-xl-12 tell-all">
                                        <span class="color-factor">   تلفن : {{data2.phone}} </span>
                                    </div>

                                    <div class="col-xs col col-sm col-md col-lg col-xl-12 tell-all-res">
                                        <span class="color-factor">   تلفن : </span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs col col-sm col-md col-lg col-xl-12 factor-main-inside-between table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl flex delete-padding">
                        <div class="col-xs col col-sm col-md col-lg col-xl-1 text-row">
                            <div class="text-row-inside">
                                <ul>
                                    <li class="roow"> ردیف </li>
                                    <li>1 </li>
                                    <li> 2 </li>
                                    <li> 3 </li>
                                    <li>  4</li>
                                    <li> 5 </li>
                                    <li>6</li>
                                    <li> 7 </li>
                                    <li> 8 </li>
                                    <li>9 </li>
                                    <li> 10</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs col col-sm col-md col-lg col-xl-4 Description-goods">
                            <div class="Description-goods-inside">
                                <ul>
                                    <li class="roow"> شرح کالا </li>
                                    <li>
                                      قطع کتاب : {{data1.size}} 
                                      </li>
                                      <li>
                                      جنس کاغذ :  {{data1.material}}  
                                        </li>
                                    <li> نوع صحافی : {{data1.Binding}}  </li>
                                    <li>   جنس جلد :{{data1.thickness}} گرم</li>
                                    <li>    پوشش جلد : {{data1.cover_material}} </li>
                                    <li> چاپ جلد : {{data1.cover_type}}  </li>
                                    <li>  لبه برگردان :{{data1.edge}} لبه برگردان  </li>
                                    <li>   دورگرد جلد : {{data1.circle_cover}} </li>
                                    <li>  تعداد صفحات سیاه و سفید : {{data1.one_color_number}} </li>
                                    <li>  تعداد صفحات رنگی : {{data1.colorful_number}} </li>
                                   
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs col col-sm col-md col-lg col-xl-2 Number-goods">
                            <div class="Number-goods-inside">
                                <ul>
                                    <li class="roow"> تعداد </li>
                                    <li>{{data1.circulation}} </li>
                                    <li>  </li>
                                    <li>  </li>
                                    <li>  </li>
                                    <li>  </li>
                                    <li></li>
                                    <li>  </li>
                                    <li> </li>
                                    <li> </li>
                                    <li> </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs col col-sm col-md col-lg col-xl-2 Unit-price">
                            <div class="Unit-price-inside">
                                <ul>
                                    <li class="roow"> فی </li>
                                    <li> {{price3}}</li>
                                    <li>  </li>
                                    <li>  </li>
                                    <li>  </li>
                                    <li>  </li>
                                    <li></li>
                                    <li>  </li>
                                    <li> </li>
                                    <li> </li>
                                    <li> </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs col col-sm col-md col-lg col-xl-3 Total-price">
                            <div class="Total-price-inside">
                                <ul>
                                    <li class="roow"> قیمت کل (تومان)  </li>
                                    <li> {{price}}</li>
                                    <li>  </li>
                                    <li>  </li>
                                    <li>  </li>
                                    <li>  </li>
                                    <li></li>
                                    <li>  </li>
                                    <li> </li>
                                    <li> </li>
                                    <li> </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs col col-sm col-md col-lg col-xl-12 factor-main-inside-end flex delete-padding">
                        <div class="col-xs col col-sm col-md col-lg col-xl-7 factor-main-inside-end-right delete-padding-right">
                            <div class="col-xs col col-sm col-md col-lg col-xl-12 factor-main-inside-end-right-top">
                                <!--<span>  امضاء خریدار </span>-->
                            </div>
                        </div>
                        <div class="col-xs col col-sm col-md col-lg col-xl-5 factor-main-inside-end-left delete-padding-right">
                            <div class="col-xs col col-sm col-md col-lg col-xl-12 factor-main-inside-end-left-inside flex">
                                <div class="col-xs col col-sm col-md col-lg col-xl-5 factor-all-pricee">
                                    <span class="bold">  جمع فاکتور </span>
                                </div>
                                <div class="col-xs col col-sm col-md col-lg col-xl-7 factor-all-box">
                                <div class="factor-all-box-span">
                                    <span>{{price}} </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs col col-sm col-md col-lg col-xl-12 factor-main-inside-end-left-inside flex">
                                <div class="col-xs col col-sm col-md col-lg col-xl-5 factor-all-pricee">
                                    <span>  تخفیف </span>
                                </div>
                                <div class="col-xs col col-sm col-md col-lg col-xl-7 factor-all-box">
                                <div class="factor-all-box-span">
                                    <span>{{price1}} </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs col col-sm col-md col-lg col-xl-12 factor-main-inside-end-left-inside flex">
                                <div class="col-xs col col-sm col-md col-lg col-xl-5 factor-all-pricee delete-padding">
                                    <span> مبلغ پرداختی (تومان)</span>
                                </div>
                                <div class="col-xs col col-sm col-md col-lg col-xl-7 factor-all-box">
                                <div class="factor-all-box-span">
                                    <span> {{price2}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xs col col-sm col-md col-lg-3 col-xl-3 factor-main-inside-left">
                    <div class="god-end-logo">
                        <img src="img/logo/logo-inside.png">
                    </div>
                    <div class="god-end-site">
                        <span class="bold"> www.parsiandigital.com  </span>
                    </div>
                    <div class="god-end-name">
                        (پارسیان تکثیر)
                    </div>
                    <div class="god-end-form">
                        <div class="god-end-form-top">
                            <span> تاریخ :  </span>
                        </div>
                        <div class="god-end-form-bottom">
                            <span> شماره سفارش : </span>
                        </div>
                    </div>
                    <div class="god-end-mohr">
                        <img src="img/factor/back.png">
                        <div class="god-end-mohr-span">
                            <span> مهر و امضاء فروشنده </span>
                        </div>
                    </div>

                    <div class="god-end-address">
                        <span> خیابان بزرگمهر / جنب خیابان آراسته / کوچه سرو (54) / ساختمان پارسیان </span>
                    </div>
                    <div class="god-end-tell">
                        <span>  تلفن : 32683004 </span>
                    </div>
                    <div class="col-xs col col-sm col-md col-lg col-xl-12 god-end-all-tell">
                        <div class="col-xs col col-sm col-md col-lg col-xl-12 god-end-all-tell-inside">
                            <span>  چاپ دیجیتال  <span style="padding-right: 35px;"> 09022683001</span> </span>
                        </div>
                        <div class="col-xs col col-sm col-md col-lg col-xl-12 god-end-all-tell-inside">
                            <span> چاپ کتاب   <span style="padding-right: 50px;"> 09022683002 </span></span>
                        </div>
                        <div class="col-xs col col-sm col-md col-lg col-xl-12 god-end-all-tell-inside">
                            <span> چاپ عریض    <span style="padding-right: 40px;"> 09022683003 </span></span>
                        </div>
                        <div class="col-xs col col-sm col-md col-lg col-xl-12 god-end-all-tell-inside">
                            <span> چاپ افست  <span style="padding-right: 42px;"> 09022683004 </span></span>
                        </div>
                        <div class="col-xs col col-sm col-md col-lg col-xl-12 god-end-all-tell-inside">
                            <span>  روابط عمومی    <span style="padding-right: 33px;"> 09022683005 </span></span>
                        </div>
                        <div class="col-xs col col-sm col-md col-lg col-xl-12 god-end-all-tell-inside">
                            <span>  گروه طراحی  <span style="padding-right: 15px;">10 - 09022683006  </span></span>
                        </div>
                    </div>
                    <div class="col-xs col col-sm col-md col-lg col-xl-12 icon-telegram">
                        <div class="icon-telegram-inside">
                            <i class="fab fa-telegram-plane"></i>
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
            console.log('factor mounted.');
            this.title = localStorage.title;
            this.factor();
        } ,
        data() {
            return {
                data1: '' ,
                data2: '' ,
                off: '' ,
                cost: '' ,
                title: '' ,
                price: '' ,
                price1: '' ,
                price2: '',
                price3: ''

            }
        } ,
        methods: {
            factor() {
                this.data1 = JSON.parse(localStorage.final);
                this.price3=this.data1.book_cost.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                this.data2 = JSON.parse(localStorage.user);
                this.price = this.data1.final_price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                if (localStorage.getItem('cost') === null)
                {
                    this.off = 0;
                    this.price1 = 0;
                    this.cost = this.data1.final_price;
                    this.price2 = this.cost.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                }
                else
                {
                    this.cost = JSON.parse(localStorage.cost);
                    this.off = (this.data1.final_price) - (this.cost);
                    this.price2 = this.cost.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                    this.price1 = this.off.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                }
            }
        }
    }
</script>
