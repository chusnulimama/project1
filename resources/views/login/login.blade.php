<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewreport" content="width=device-width, initial-scale=1.0">

    <title>--Welcome, Please Login First!!--</title>

    {{--Boostrap core css--}}
    {!! HTML::style('assets/css/bootstrap.css') !!}
    {{--external css--}}
    {!! HTML::style('assets/font-awesome/css/font-awesome.css') !!}

    {{--costum styles for this telmplate--}}
    {!! HTML::style('assets/css/style.css') !!}
    {!! HTML::style('assets/css/style-resposive.css') !!}
</head>
<body>

{{--main content--}}
    <div id="login-page">
        <div class="container">
            {!! Form::open(['url' => route('login')]) !!}
                <h2 class="form-login-heading">Sign in now</h2>
                <div class="login-wrap">
                    {!! Form::text('email', Input::old('email'), ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                    <br>
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
                    {!! Form::label('class' => 'checkbox', 'span' => 'pull-right') !!}

                    <button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i>SIGN IN</button>
                    <hr>

                    <div class="login-social-link centered">
                        <p>Sign in via your social network</p>
                            <button class="btn btn-facebook" type="submit"><i class="fa fa-facebook"></i>Facebook</button>
                            <button class="btn btn-twitter" type="submit"><i class="fa fa-twitter"></i>Twitter</button>
                    </div>

                </div>
            {!! Form::close() !!}
        </div>
    </div>
{{--is places at the end of document so the pages load faster--}}
{!! HTML::script('assets/js/jquery.js') !!}
{!! HTML::script('assets/js/bootstrap.min.js') !!}

        <!--BACKSTRETCH-->
<!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
<script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
<script>
    $.backstretch("assets/img/login-bg.jpg", {speed: 500});
</script>

</body>
</html>