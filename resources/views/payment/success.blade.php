<html>

<head>
    <meta charset="utf-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ setting('app_description') }}" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon"
        href="{{ asset(str_replace('public/', 'storage/', setting('icon'))) ?? asset('assets/img/favicon/favicon.ico') }}" />
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
    <title>{{ setting('app_name') }} - Success</title>
    <style>
        body {
            text-align: center;
            padding: 40px 0;
            background: #EBF0F5;
        }

        h1 {
            color: #88B04B;
            font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
            font-weight: 900;
            font-size: 40px;
            margin-bottom: 10px;
        }

        p {
            color: #404F5E;
            font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
            font-size: 20px;
            margin: 0;
        }

        i {
            color: #9ABC66;
            font-size: 100px;
            line-height: 200px;
            margin-left: -15px;
        }

        .card {
            background: white;
            padding: 60px;
            border-radius: 4px;
            box-shadow: 0 2px 3px #C8D0D8;
            display: inline-block;
            margin: 0 auto;
        }

        .button-container a {
            display: block;
            background: #009688;
            color: white;
            margin-top: 2rem;
            font-size: 18px;
            padding: 14px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: 900;
        }
    </style>
</head>

<body>
    <div class="card">
        <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
            <i class="checkmark">✓</i>
        </div>
        <h1>تم عملية الدفع بنجاح</h1>
        <div class="button-container">
            <a href="{{ route('home') }}">الرئيسية</a>
        </div>
    </div>
</body>

</html>
