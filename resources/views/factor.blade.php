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

    <!-- Title Page-->
    <title> فاکتور    </title>

    <!-- Fontfaces CSS-->
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css" type="text/css">

    <!--select2-->
    <link href="/css/select2.min.css" rel="stylesheet" />
    <script src="/js/select2.min.js"></script>
    <!-- Loading Flat UI -->
    <link href="css/flat-ui/flat-ui.css" rel="stylesheet">

    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/step-price/step-price.css">
    <link rel="stylesheet" type="text/css" href="css/menu-responsive/toggle.css">

</head>
<body>
<!---------------------------header------------------------------->
<div class="col-xs col col-sm col-md col-lg-12 col-xl header-main delete-padding">
    @include('layout.header')
    <!---------------------------end-header--------------------------->


    <!---------------------body----------------------------->
<div id="app">
    <factor></factor>
</div>
<script src="{{asset('js/app.js')}}"></script>
    <div class="col-xs col col-sm col-md col-lg col-xl-12 factor-chap">
        <div class="col-xs col col-sm col-md col-lg col-xl-3 factor-chap-inside">
            <span onclick="window.print()">  چاپ پیش فاکتور </span>
        </div>
    </div>
</div>
</body>
    <!---------------------end-body------------------------->


    <!---------------------footer------------------------->
   @include('layout.footer')

    <!---------------------------end-footer--------------------------->
    <!--flat-ui-->

    <script src="js/flat-ui/flat-ui.js"></script>
    <!--step-price-->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
    <script  src="./script.js"></script>
    <script src="js/step-price/step-price.js"></script>

</html>