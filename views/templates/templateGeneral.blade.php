<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('tittle')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous" defer>
    </script>
</head>

<body class="container-fluid bg-info">
    <header class="">
        <form name="formHeader" class="" method="post" action="{{ $_SERVER['PHP_SELF'] }}" target="_self">
            <div class="row d-flex justify-content-end">
                <div class="col-1">
                    <label class="form-label d-flex justify-content-center align-items-center" for="user"><i
                            class="bi bi-person-fill fs-2"></i></label>
                </div>
                <div class="col-2">
                    <input type="text" class="form-control bg-info text-white" name="user"
                        value="{{ $_SESSION['user'] }}" disabled>
                </div>
                <div class="col-1">
                    @if ($_SESSION['user'] === 'invitado')
                        <a class="btn btn-primary" href="login.php">Login</a>
                    @else
                        <button type="submit" class="btn btn-danger" name="login">Salir</button>
                    @endif
                </div>
            </div>
        </form>
    </header>
    <main>
        <header class="row text-center">
            <h2 class="col">@yield('header')</h2>
        </header>
        @yield('content')
    </main>
</body>

</html>
