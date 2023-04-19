<!doctype html>
<html lang="ar" dir="rtl">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />
    <link href="{{ asset('assets/fontawesome/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/fontawesome/brands.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/fontawesome/solid.css') }}" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-T5m5WERuXcjgzF8DAb7tRkByEZQGcpraRTinjpywg37AO96WoYN9+hrhDVoM6CaT" crossorigin="anonymous">

    <title>{{ $page->title }}</title>

    <style>
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin: 1.8rem 0;
            line-height: 1.6em
        }

        p {
            font-size: 16px;
            color: #5b5c5e;
            line-height: 1.6em;
            margin: 1.5rem 0;
        }

        blockquote {
            border-right: .25rem solid #a34e78;
            padding: 1rem !important;
            box-shadow: 0 .05rem .25rem rgba(0, 0, 0, .075) !important;
        }

        blockquote p {
            font-size: .9rem !important;
            font-weight: 600;
            color: #818181;
            margin: 0px;
            font-style: italic
        }

        ul {
            margin: 25px 0;
        }

        ul li {
            padding: 5px 0;
            font-size: 15px;
        }
    </style>

</head>

<body>

    <section class="page-container mt-5">
        <div class="container">
            <div class="d-flex align-items-center justify-content-center shadow py-5 px-3 position-relative">
                <div class="col-md-8 py-4">
                    @php echo $page->content; @endphp
                </div>
                <a href="{{ route('home') }}" class="position-absolute text-primary"
                    style="top: 25px; left:30px; font-size: 28px"><i class="fa fa-home"></i></a>
            </div>
        </div>
    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
    </script>
    -->
</body>

</html>
