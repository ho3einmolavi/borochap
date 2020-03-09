<html>
<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" initial-scale="1">
    <meta charset="UTF-8">
    <meta name="description" id="1111" content="">
    <meta name="keywords" id="2222" content="">
    <meta name="author" content="sarinweb.com">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


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
    <link rel="stylesheet" href="/css/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="/css/bootstrap/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">


    <!--select2-->
    <link href="/css/select2.min.css" rel="stylesheet" />
    <script src="/js/select2.min.js"></script>
</head>
<body>

<div id="app">
    <pay status="{{$status}}" message="{{$message}}" flash="{{session('flash')}}" Authority="{{$Authority}}" price="{{$price}}"></pay>
</div>
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>