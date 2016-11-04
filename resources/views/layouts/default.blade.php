<html>
    <head>
        <title>App Name - @yield('title')</title>
        <meta charset="utf-8">

        <!-- Latest compiled and minified CSS -->
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
        <link rel="stylesheet" href="/css/bootstrap-3.3.7.min.css">

        <!-- jQuery library -->
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
        <script src="/js/jquery-1.12.4.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
        <script src="/js/bootstrap-3.3.7.min.js"></script>


        <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
        <script src="http://f4ba43e0.fanoutcdn.com/bayeux/static/faye-browser-min.js"></script>
        <script type="text/javascript" src="/js/liveticker.js"></script>
        <script type="text/javascript" src="/js/form.js"></script>

    </head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>