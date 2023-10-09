<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        .navbar {
            background-color: #343a40;
        }

        .navbar-brand {
            color: #fff;
        }

        .navbar-nav .nav-item .nav-link {
            color: #fff;
        }
    </style>
</head>

<body>

    @include('layouts.nav')

    @yield('slot')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#pilihBahasa').change(function() {
                var selectedLocale = $(this).val();
                var currentPath = window.location.pathname;
                var filter = ['/id', '/en', '/pl'];

                var pathMatched = false;
                for (var i = 0; i < filter.length; i++) {
                    if (currentPath.includes(filter[i])) {
                        currentPath = currentPath.replace(filter[i], '/' + selectedLocale);
                        pathMatched = true;
                        break;
                    }
                }

                if (!pathMatched) {
                    currentPath = '/' + selectedLocale + currentPath;
                }

                window.location.href = currentPath;
            });

        });
    </script>
</body>

</html>
