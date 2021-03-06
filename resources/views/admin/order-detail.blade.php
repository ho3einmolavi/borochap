<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" initial-scale="1">
    <meta charset="UTF-8">
    <meta name="description" id="1111" content="">
    <meta name="keywords" id="2222" content="">
    <meta name="author" content="sarinweb.com">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/js/axios.js"></script>
    <script src="/js/access1.js"></script>
    <!-- Title Page-->
    <title> جزئیات سفارش</title>


    <!--select2-->
    <link href="/css/select2.min.css" rel="stylesheet" />
    <script src="/js/select2.min.js"></script>

    <!-- Fontfaces CSS-->
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="../css/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css" type="text/css">

    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/menu-responsive/toggle.css">

    <!-- Loading Flat UI -->
    <link href="../css/flat-ui/flat-ui.css" rel="stylesheet">

    <!--select2-->
    <link href="/css/select2.min.css" rel="stylesheet" />
    <script src="/js/select2.min.js"></script>


</head>

<body>
@include('layout.header')



<div id="app">
    <order-details></order-details>
</div>

@include('layout.footer')




<!---------------------------end-footer--------------------------->
<!-- Bootstrap 4 requires Popper.js -->
<script src="{{asset('js/app.js')}}"></script>
<script src="https://unpkg.com/popper.js@1.14.1/dist/umd/popper.min.js" crossorigin="anonymous"></script>

<!--select2-->
<script src="../js/flat-ui/flat-ui.js"></script>
<script src="../js/application.js"></script>

<!--flat-ui-->
<script src="../js/flat-ui/flat-ui.js"></script>

</body>
</html>



