<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Your Dashboard</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Barra lateral -->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <!-- Contenido de la barra lateral -->
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Tu enlace 1
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Tu enlace 2
                            </a>
                        </li>
                        <!-- Añade más enlaces según tus necesidades -->
                    </ul>
                </div>
            </nav>

            <!-- Contenido principal -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Tu Dashboard</h1>
                    <button class="btn btn-primary" onclick="toggleSidebar()">Toggle Sidebar</button>
                </div>

                <!-- Contenido principal de tu dashboard -->
            </main>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('d-none');
        }
    </script>
</body>
</html>
