<!DOCTYPE html>
<html>
<head>

	<!-- Required meta tags-->
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" initial-scale="1">
    <meta charset="UTF-8">
    <meta name="description" id="1111" content="">
    <meta name="keywords" id="2222" content="">
    <meta name="author" content="sarinweb.com">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <script>window.Laravel = { csrfToken: '{{csrf_token()}}' }</script>

	<!-- Title Page-->
	<title></title>

	<!-- Fontfaces CSS-->
	<link rel="stylesheet" href="/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

	<!-- Bootstrap CSS-->
	<link rel="stylesheet" href="/css/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="/css/bootstrap/bootstrap.min.css" type="text/css">

    <!--select2-->
    <link href="/css/select2.min.css" rel="stylesheet" />
    <script src="/js/select2.min.js"></script>
    <script src="/js/axios.js"></script>
    <script src="/js/index.js"></script>
    <!-- Loading Flat UI -->
    <link href="/css/flat-ui/flat-ui.css" rel="stylesheet">

    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/step-price/step-price.css">
    <link rel="stylesheet" type="text/css" href="/css/menu-responsive/toggle.css">
    <link rel="stylesheet" type="text/css" href="/css/loading.css">
    <link rel="stylesheet" type="text/css" href="/css/video.css">
    <script src="/js/header.js"></script>
    <script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="1ace1ed2-2d7c-4f94-a71e-bfd1a680fc23";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>
</head>
<body>
<!---------------------------header------------------------------->
<div class="col-xs col col-sm col-md col-lg-12 col-xl header-main delete-padding">
    <div class="col-xs col col-sm col-md col-lg-12 col-xl header-main-top delete-padding flex">
        <div class="col-xs col-2 col-sm-2 col-md-2 col-lg-1 col-xl menu-line">
            <input type="checkbox" id="menu-hamburguer" class="input-none">
            <label for="menu-hamburguer">
                <div class="menu-responsive">
                    <span class="hamburguer"></span>
                </div>
            </label>

            <nav>
                <ul id="88">
                   {{--my api--}}
                </ul>
            </nav>
        </div>
        <div id="logo" class="col-xs col-9 col-sm-9 col-md col-lg-3 col-xl-3 header-main-top-inside delete-padding">
            {{--my api--}}
        </div>

        <div id="logo1" class="col-xs col-7 col-sm-4 col-md-5 col-lg-2 col-xl-2 header-main-top-inside-res delete-padding">
            <img src="/img/logo/logo-top-res.png">
        </div>
        <div class="col-xs col col-sm col-md-9 col-lg-6 col-xl-6 header-main-beetween-right-menu">
            <div class="span-login" id="33">
                {{--my api--}}
            </div>
        </div>
        <!----new----->
        <div id="newdropdown" class="col-xs col col-sm col-md-4 col-lg-3 col-xl-3 main-welcome">
            <div class="col-xs col col-sm col-md- col-lg- col-xl-12 main-welcome-inside">
                <a href="#menu" id="toggle">
                    <span class="user-icone">
                    <img src="/img/icon/user-icon-img.png">
                </span>
                <span class="title-3" id="fullname">
                    {{--my api--}}
                </span>
                <span><i class="fas fa-angle-down"></i></span>
                </a>
                    <div id="menu">
                      <ul style="margin-bottom: 0px;">
                        <li style="height: 30px;">
                            <a href="#home">مانده اعتبار  : <span style="color: #645d5d !important;" id="credit">
                                    {{--my api--}}
                                </span>
                            </a>
                            </li>
                        <li style="height: 30px;"><a href="">پنل مدیریت</a></li>
                        <li style="height: 30px;"><a href="/user/orders">  سفارش های من </a></li>
                         <li style="height: 30px;"><a href="/user/wallet">  حساب مالی </a></li>
                        <li style="height: 30px;cursor: pointer"><a onclick="logout()">خروج </a></li>
                      </ul>
                    </div>


            </div>
        </div>
        <!--------->
    </div>


    <div class="col-xs col col-sm col-md col-lg col-xl-12 header-main-beetween delete-padding flex">
        <div class="col-md-9 header-main-beetween-right delete-padding">

            <div class="col-md-12 header-main-beetween-right-des">
                <div class="col-xs col col-sm col-md col-lg col-xl-8 header-main-beetween-right-des-one">
                    <span class="title-1">  بروچاپ </span>
                </div>
                <div class="col-xs col col-sm col-md col-lg col-xl-8 header-main-beetween-right-des-two">
                    <span class="title-1">  مجموعه تخصصی چاپ دیجیتال کتاب </span>
                </div>
                <div class="col-xs col col-sm col-md col-lg col-xl-8 header-main-beetween-right-des-three">
                    <span class="title-4"> مجهز به ماشین آلات پیشرفته چاپ و مراحل تکمیلی بهترین کیفیت / بالاترین سرعت / مناسب ترین قیمت  </span>
                </div>
                <div class="col-xs col col-sm col-md col-lg col-xl-8 header-main-beetween-right-des-three">
                    <span class="title-4">
                        <h5 id="off_text">
                            {{--my api--}}
                        </h5>
                    </span>
                </div>
            </div>
        </div>

    </div>
    <div class="col-xs col col-sm col-md col-lg col-xl-12 header-main-end delete-padding flex">
        <div class="col-xs col col-sm col-md col-lg col-xl-8 header-main-end-right delete-padding">
            <div class="col-xs col col-sm col-md col-lg col-xl-10 header-main-end-right-top flex">
                <!--<div class="col-xs col col-sm col-md-11 col-lg col-xl header-main-end-right-top-one">
                    <a href="#price"><span> محاسبه سریع قیمت  </span></a>
                </div>-->

               <!--<div class="col-xs col col-sm col-md-8 col-lg col-xl-4 important-points-inside-right-bottom-advice" style="padding-top: 15px;">
                    <div class="col-xs col col-sm col-md col-lg col-xl-3 important-points-img delete-padding-left">
                        <a href="#price"><img src="/img/icon/car11.png" style="width: 30px;height: 30px;"></a>
                    </div>
                    <div class="col-xs col col-sm col-md col-lg col-xl-12 important-points-span delete-padding-right">
                        <a href="#price"><span class="title-4"> محاسبه سریع قیمت </span></a>
                    </div>
                </div>-->

                <div class="col-xs col col-sm col-md-8 col-lg col-xl-4 important-points-inside-right-bottom-advice" style="padding-top: 15px;">
                    <div class="col-xs col col-sm col-md col-lg col-xl-3 important-points-img delete-padding-left">
                        <a href=""><img src="/img/icon/contact2.png"></a>
                    </div>
                    <div class="col-xs col col-sm col-md col-lg col-xl-12 important-points-span delete-padding-right">
                        <a href="#"><span class="title-4">   مشاوره قبل از چاپ </span></a>
                    </div>
                </div>

                <div class="col-xs col col-sm col-md-8 col-lg col-xl-4 important-points-inside-right-bottom-advice" style="padding-top: 15px;">
                    <div class="col-xs col col-sm col-md col-lg col-xl-3 important-points-img delete-padding-left">
                        <a href="/Calculate-turning-size"><img src="/img/icon/book.png" style="    width: 36px;
    height: 35px;
    vertical-align: sub;"></a>
                    </div>
                    <div class="col-xs col col-sm col-md col-lg col-xl-12 important-points-span delete-padding-right">
                        <a href="/Calculate-turning-size" target="_blank"><span class="title-4">  محاسبه اندازه عطف </span></a>
                    </div>
                </div>

            </div>
            <div class="col-xs col col-sm col-md col-lg col-xl-12 header-main-end-right-bottom flex">
                <div class="col-xs col col-sm col-md col-lg col-xl-2 header-main-end-right-bottom-start">
                    <a href="#price"><span>  شروع کنید !  </span></a>
                </div>



                <div class="col-xs col col-sm col-md col-lg col-xl-6 header-main-end-right-bottom-select flex delete-padding">

                </div>

                <div  class="col-xs col col-sm col-md col-lg col-xl-6 header-main-end-right-botto-img"><img src="/img/icon/start.png">
                </div>
            </div>
        </div>

<!--video-->
    <div class="col-xs col col-sm col-md col-lg col-xl-3 header-main-end-left delete-padding">
            
            <!--<div class="icon-film">
                <img src="img/header/icon-film.png">
            </div>-->
<article class="video-item">
  <figure>
    <a href="#post-popup1" class="open-video-link">
    <div class="icon-film">
           <img src="/img/header/icon-film.png">
         </div>
       <img src="/img/header/mashin.png">
    </a>
  </figure>
</article>

{{--<div id="post-popup1" class="post-popup popup-modal">--}}
  {{--<span class="close"></span>--}}
  {{--<div class="popup-header">--}}
    {{--<h4>برو چاپ</h4>--}}
  {{--</div>--}}
  {{--<div class="popup-video">--}}
    {{--<iframe width="560" height="300" src="/img/video/tt.mp4" frameborder="0" allowfullscreen></iframe>--}}
  {{--</div>--}}
{{--</div>--}}
    </div>
<!--end-video-->





    </div>
</div>

<!---------------------------end-header--------------->


<!-- partial:index.partial.html -->
<div class="col-md-12 container">
    <section>
        <div class="wizard">
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active">
                        {{--<a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="">--}}
                           {{----}}
                        {{--</a>--}}
                        <span class="round-tab">
                                <!--<i class="glyphicon glyphicon-folder-open"></i>-->
                                <img src="/img/icon/calculate-price.png">
                            </span>
                    </li>

                    <li role="presentation" class="disabled" id="22">
                      {{--my api--}}
                    </li>
                    <li role="presentation" class="disabled">
                            <span class="round-tab">
                                <!--<i class="glyphicon glyphicon-picture"></i>-->
                                <img src="/img/icon/send-file.png">
                            </span>
                    </li>
                    <li role="presentation" class="disabled">
                            <span class="round-tab">
                                <!--<i class="glyphicon glyphicon-picture"></i>-->
                               <img src="/img/icon/tee.png">
                            </span>
                    </li>
                    <li role="presentation" class="disabled">
                            <span class="round-tab">
                                <!--<i class="glyphicon glyphicon-picture"></i>-->

                                 <img src="/img/icon/payy.png">
                            </span>
                    </li>
                    <!--<li role="presentation" class="disabled">
                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                        </a>
                    </li>-->
                </ul>
            </div>
            <form role="form">
                <div class="tab-content">
                    <div id="loading" style="left: 50%;bottom: -50px;" class="lds-ellipsis">
                        <div></div><div></div><div></div><div></div></div>
                    <div id="app">
                        <app id="content"></app>
                    </div>

                    {{--<!--step2-->--}}
                    {{--<div class="tab-pane" role="tabpanel" id="step2">--}}
                        {{--<!--<h3>Step 2</h3>--}}
                        {{--<p>This is step 2</p>-->--}}

                        {{--<div id="app1">--}}
                            {{--<register></register>--}}
                        {{--</div>--}}

                    {{--</div>--}}
                    {{--<!--end-step2-->--}}

                    {{--<!--step3-->--}}
                    {{--<div class="tab-pane" role="tabpanel" id="step3">--}}
                        {{--<!--<h3>Step 2</h3>--}}
                        {{--<p>This is step 3</p>-->--}}
                        {{--<div id="app2">--}}
                            {{--<file></file>--}}
                        {{--</div>--}}
                        {{--<ul class="list-inline pull-right bb-responsive" style="margin-left: 80px;">--}}
                            {{--<div class="bottom-li">--}}
                                {{--<li><button type="button"  style="background-color: #5f1255 !important;" class="btn btn-primary next-step">ارسال و ادامه  </button></li>--}}
                                {{--<li><button type="button" style="background-color: #868282;margin-right: 10px;font-family: irs;" class="btn btn-default prev-step">قبل</button></li>--}}
                            {{--</div>--}}
                        {{--</ul>--}}

                        {{--<div id="777">--}}
                           {{--my api--}}
                        {{--</div>--}}

                    {{--</div>--}}
                    {{--<!--end-step3-->--}}


                    {{--<!--step4-->--}}
                    {{--<div class="tab-pane" role="tabpanel" id="step5">--}}
                        {{--<!--<h3>Step 2</h3>--}}
                        {{--<p>This is step 2</p>-->--}}
                        {{--<div id="app3">--}}
                            {{--<order></order>--}}
                        {{--</div>--}}
                        {{--<ul class="list-inline pull-right bb-responsive" style="margin-left: 180px;">--}}
                            {{--<div class="bottom-li">--}}
                                {{--<li><button type="button"  style="background-color: #5f1255 !important;" class="btn btn-primary next-step" @click="getData()">ارسال و ادامه  </button></li>--}}
                                {{--<li><button type="button" style="background-color: #868282;margin-right: 10px;font-family: irs;" class="btn btn-default prev-step">قبل</button></li>--}}
                            {{--</div>--}}
                        {{--</ul>--}}
                        {{--<div class="col-xs col col-sm col-md col-lg col-xl-12 send-input" style="display: flex;align-items: center;justify-content: flex-end;height: 45px;">--}}
                            {{--<div class="col-xs col-4 col-sm-3 col-md-2 col-lg-1 col-xl-1 send-input-inside" style="height: 45px;background-color:#7c1065;;border-radius: 5px;display: flex;align-items: center;justify-content: flex-end;margin-left: 160px">--}}
                                {{--<a href="#step4" data-toggle="tab" aria-controls="step4" role="tab" title="" style="width: 146px;color: #fff;text-align: center;">--}}
                                    {{--قبلی--}}
                                {{--</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                    {{--</div>--}}
                    {{--<!--end-step4-->--}}


                    {{--<!--step5-->--}}
                    {{--<div class="tab-pane" role="tabpanel" id="step4">--}}
                        {{--<!--<h3>Step 2</h3>--}}
                         {{--<p>This is step 2</p>-->--}}
                        {{--<div id="app4">--}}
                            {{--<delivery></delivery>--}}
                        {{--</div>--}}
                        {{--<ul class="list-inline pull-right bb-responsive" style="margin-left: 180px;">--}}
                            {{--<div class="bottom-li">--}}
                                {{--<li><button type="button"  style="background-color: #5f1255 !important;" class="btn btn-primary next-step">ارسال و ادامه  </button></li>--}}
                                {{--<li><button type="button" style="background-color: #868282;margin-right: 10px;font-family: irs;" class="btn btn-default prev-step">قبل</button></li>--}}
                            {{--</div>--}}
                        {{--</ul>--}}

                        {{--<div class="col-xs col col-sm col-md col-lg col-xl-12 send-input" style="display: flex;align-items: center;justify-content: flex-end;height: 45px;">--}}
                            {{--<div class="col-xs col-4 col-sm-3 col-md-2 col-lg-1 col-xl-1 send-input-inside" style="height: 45px;background-color:#7c1065;;border-radius: 5px;display: flex;align-items: center;justify-content: flex-end;margin-left: 160px">--}}
                                {{--<a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="" style="width: 146px;color: #fff;text-align: center;">--}}
                                    {{--قبلی--}}
                                {{--</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                    {{--</div>--}}
                    {{--<!--end-step5-->--}}

                    {{--<div class="tab-pane" role="tabpanel" id="complete">--}}
                        {{--<h3>Complete</h3>--}}
                        {{--<p>You have successfully completed all steps.</p>--}}
                    {{--</div>--}}
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </section>
</div>
</body>
<!-- partial -->


<!---------------------------footer------------------------------->

    @include('layout.footer')

<!---------------------------end-footer--------------------------->
<!--flat-ui-->

<script src="{{asset('js/app.js')}}"></script>
<script type="text/javascript">document.getElementById('loading').style.visibility = "hidden"</script>
<script src="/js/flat-ui/flat-ui.js"></script>
<!--step-price-->
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='/js/bootstrap.min.js'></script>
<script  src="./script.js"></script>
<script src="js/step-price/step-price.js"></script>
<!--toggle-->
<script  src="js/menu-responsive/toggle.js"></script>
<!--video-->
<script src='/js/jquery.min.js'></script>
<script src="js/video.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
<script type="text/javascript">
var theToggle = document.getElementById('toggle');

// based on Todd Motto functions
// https://toddmotto.com/labs/reusable-js/

// hasClass
function hasClass(elem, className) {
    return new RegExp(' ' + className + ' ').test(' ' + elem.className + ' ');
}
// addClass
function addClass(elem, className) {
    if (!hasClass(elem, className)) {
        elem.className += ' ' + className;
    }
}
// removeClass
function removeClass(elem, className) {
    var newClass = ' ' + elem.className.replace( /[\t\r\n]/g, ' ') + ' ';
    if (hasClass(elem, className)) {
        while (newClass.indexOf(' ' + className + ' ') >= 0 ) {
            newClass = newClass.replace(' ' + className + ' ', ' ');
        }
        elem.className = newClass.replace(/^\s+|\s+$/g, '');
    }
}
// toggleClass
function toggleClass(elem, className) {
    var newClass = ' ' + elem.className.replace( /[\t\r\n]/g, " " ) + ' ';
    if (hasClass(elem, className)) {
        while (newClass.indexOf(" " + className + " ") >= 0 ) {
            newClass = newClass.replace( " " + className + " " , " " );
        }
        elem.className = newClass.replace(/^\s+|\s+$/g, '');
    } else {
        elem.className += ' ' + className;
    }
}

theToggle.onclick = function() {
   toggleClass(this, 'on');
   return false;
}
</script>



</html>