<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">

    <title>Book's Store - Transaction Application</title>

    {!! HTML::style('assets/css/bootstrap.css') !!}

    <!--external css-->
    {!! HTML::style('assets/font-awesome/css/font-awesome.css') !!}
    <link rel="stylesheet" href="assets/css/zabuto_calendar.css" type="text/css">
    <link rel="stylesheet" href="assets/js/gritter/css/jquery.gritter.css" type="text/css">
    <link rel="stylesheet" href="assets/lineicons/style.css" type="text/css">

    {!! HTML::style('assets/css/style-responsive.css') !!}
    {!! HTML::style('assets/css/style.css') !!}

    {!! HTML::script('assets/js/chart-master/Chart.js') !!}
</head>
<body>
    <section id="container">
        <!--Header-->
        @include('includes.header')
        <!--Sidebar-->
        <aside>
            <div id="sidebar"  class="nav-collapse">
        @include('includes.sidebar')
             </div>
        </aside>


        <!--main content-->
        <section id="main-content">
            <section class="wrapper site-min-height ">
                @yield('content')
            </section>
        </section>
    </section>

    {!! HTML::script('assets/js/jquery.js') !!}
    {!! HTML::script('assets/js/bootstrap.min.js') !!}
    {!! HTML::script('assets/js/jquery-ui-1.9.2.custom.min.js') !!}
    {!! HTML::script('assets/js/jquery.ui.touch-punch.min.js') !!}
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    {!! HTML::script('assets/js/jquery.scrollTo.min.js') !!}
    <script src="assets/js/jquery.niceroll.js" type="text/javascript"></script>
    {!! HTML::script('assets/js/common-scripts.js') !!}

    <script>
        $(function(){
            $('select.styled').customSelect();
        });
    </script>

</body>
</html>
