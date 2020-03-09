<!DOCTYPE html>
<html lang="en" >
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
    <title> لیست  سفارشات </title>


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
   <link rel="stylesheet" type="text/css" href="../css/multi-select-admin-user/multi-select.css">


  <!-- Loading Flat UI -->
    <link href="../css/flat-ui/flat-ui.css" rel="stylesheet">

    <!--select2-->
    <link href="/css/select2.min.css" rel="stylesheet" />
    <script src="/js/select2.min.js"></script>


  </head>
<!---------------------------header------------------------------->
@include('layout.header')
<!---------------------------end-header--------------------------->
<section>
  <center>
    <div class="col-xs col col-sm col-md col-lg col-xl-12 admin-page flex">
        @include('admin.dashboard')

        <div id="app" class="col-xs col-10 col-sm-10 col-md-11 col-lg-10 col-xl-9">
            <order-list></order-list>
        </div>

<script type="text/javascript">
  function() {
  if (!_clicked) {
    _clicked = true;
    $('.ui-selected').removeClass('ui-selected');
    $('#selectable li').attr('unselectable', 'on').css('user-select', 'none');
    $('#btn_select').show();
  }

  if ($(this).hasClass('ui-selecting')) {
    $(this).removeClass('ui-selecting');
  } else {
    $(this).addClass('ui-selecting');
  }
}
</script>
      </div>
    
  </center>
</section>
<!---------------------------footer------------------------------->
@include('layout.footer')
<!---------------------------end-footer--------------------------->
<!-- Bootstrap 4 requires Popper.js -->
<script src="{{asset('js/app.js')}}"></script>
    <script src="https://unpkg.com/popper.js@1.14.1/dist/umd/popper.min.js" crossorigin="anonymous"></script>

<!--select2-->
  <script src="js/flat-ui/flat-ui.js"></script>
  <script src="js/application.js"></script>

<!--flat-ui-->
<script src="../js/flat-ui/flat-ui.js"></script>
<script  src="../js/multi-select-admin-user/multi-select.js"></script>
</body>

</html>
