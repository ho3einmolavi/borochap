<!DOCTYPE html>
<html>
<head>

    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" initial-scale="1">
    <meta charset="UTF-8">
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="marymordi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Title Page-->
    <title> پرداخت </title>

    <!-- Fontfaces CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css" type="text/css">

    <!--select2-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <!-- Loading Flat UI -->
    <link href="/css/flat-ui/flat-ui.css" rel="stylesheet">

    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/step-price/step-price.css">
    <link rel="stylesheet" type="text/css" href="/css/menu-responsive/toggle.css">

</head>
<body>
<!---------------------------header------------------------------->

<!---------------------------end-header--------------------------->




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
        <div id="logo" class="col-xs col-9 col-sm-9 col-md col-lg-2 col-xl-2 header-main-top-inside delete-padding">
            {{--my api--}}
        </div>

        <div id="logo1" class="col-xs col-7 col-sm-7 col-md-8 col-lg-2 col-xl-2 header-main-top-inside-res delete-padding">
            <img src="/img/logo/logo-top-res.png">
        </div>
        <div class="col-xs col col-sm col-md-9 col-lg-6 col-xl-6 header-main-beetween-right-menu">
            <div class="span-login" id="33">
                {{--my api--}}
            </div>
        </div>
        <!----new----->
        <div id="newdropdown" class="col-xs col col-sm col-md-3 col-lg-3 col-xl-4 main-welcome">
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

</div>


<!---------------------------body------------------------------->
<div id="app">
    <order></order>
</div>
<!---------------------------end-body--------------------------->

<!---------------------------footer------------------------------->
@include('layout.footer')
<!---------------------------end-footer--------------------------->
<script src="{{ asset('js/app.js') }}"></script>
<script src="/js/header.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="sweetalert2.all.min.js"></script>
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