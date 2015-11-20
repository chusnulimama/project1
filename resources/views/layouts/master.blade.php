<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">

    <title>Book's Store - Transaction Application</title>

    {!! HTML::style('assets/css/bootstrap.css') !!}
    {!! HTML::style('assets/font-awesome/css/font-awesome.css') !!}
    {!! HTML::style('assets/css/style.css') !!}
    {!! HTML::style('assets/css/style-responsive.css') !!}
</head>
<body>
    <section id="container">
        <!--Header-->
        @include('includes.header')
        <!--Sidebar-->
        @include('includes.sidebar')

        <!--main content-->
        <section id="main-content">
            <section class="wrapper site-min-height">
                @yield('content')
            </section>
        </section>
    </section>

{!! HTML::script('assets/js/jquery.js') !!}
{!! HTML::script('assets/js/bootstrap.min.js') !!}
{!! HTML !!}

</body>
</html>