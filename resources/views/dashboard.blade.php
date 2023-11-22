

<!DOCTYPE html>
<html lang="es-MX">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>TechEncrypt!</title>

  <link rel="stylesheet" href="{{asset('tem/assets2/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('tem/assets2/vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('tem/assets2/vendors/flag-icon-css/css/flag-icon.min.css')}}">
  <link rel="stylesheet" href="{{asset('tem/assets2/vendors/jvectormap/jquery-jvectormap.css')}}">
  <link rel="stylesheet" href="{{asset('tem/css/style.css')}}">
     <!--Icono-->
     <link rel="shortcut icon" type="image/png" href="{{asset('tem/img/TechEncrypt_logotipo.jpg')}}">

        <!-- Agrega el script de inicio de sesión de Google -->
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <!-- Agrega tu script personalizado -->
    <script src="../assets/assets2/js/script.js" defer></script>
  
</head>
<body>
<script src="{{asset('tem/js/preloader.js')}}"></script>
  <div class="body-wrapper">
    <aside class="mdc-drawer mdc-drawer--dismissible mdc-drawer--open">
     
      <div class="mdc-drawer__content">
        <div class="user-info">
          <p class="name">Usuario</p>
          <p class="email">@user</p>
        </div>
        <nav class="mdc-list mdc-drawer-menu">
            <!-- Div para la imagen de perfil -->
            <div class="profile-image-container">
                <!-- Agrega aquí tu imagen de foto de perfil -->
                <img src="ruta_a_tu_imagen.jpg" alt="Foto de perfil">
            </div>
        <div class="mdc-list-group">
          <nav class="mdc-list mdc-drawer-menu">
            <div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-drawer-link" href="#">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">home</i>
                Dashboard
              </a>
            </div>
            <div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-expansion-panel-link" href="#" data-toggle="expansionPanel" data-target="sample-page-submenu">
              </a>
              <div class="mdc-expansion-panel" id="sample-page-submenu">
               
              </div>
            </div>
          </nav>
        </div>
      </div>
      <div class="mdc-drawer__header">
        <a href="index.html" class="brand-logo">
          <img src="../assets/img/logo.png" alt="logo">
        </a>
      </div>
    </aside>
    <!-- partial -->
    <div class="main-wrapper mdc-drawer-app-content">
      <!-- partial:partials/_navbar.html -->
      <header class="mdc-top-app-bar">
        <div class="Container">
          <div class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
            <button class="material-icons mdc-top-app-bar__navigation-icon mdc-icon-button sidebar-toggler">menu</button>
          
            </div>
        </div>
      </header>
      <!-- partial -->
      <div class="page-wrapper mdc-toolbar-fixed-adjust">
        <main class="content-wrapper">
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop mdc-layout-grid__cell--span-12-tablet">
                  <div class="d-block d-sm-flex justify-content-between align-items-center">
                </div>
              </div>

              <!--En este div imprimo lo de google usuario-->
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12 mdc-layout-grid__cell--span-12-tablet">
                        <div class="mdc-card">
                            <p>Bienvenido </p>
                            <p>Email: </p>
                        </div>
                    </div>
                 <!--En este div termina donde imprimo lo de google usuario-->
                </main>
                <footer>
        
        </footer>
        <!-- partial -->
      </div>
    </div>
  </div>
  <!-- plugins:js -->
  <script src="{{asset('tem/assets2/vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{asset('tem/assets2/vendors/chartjs/Chart.min.js')}}"></script>
  <script src="{{asset('tem/assets2/vendors/jvectormap/jquery-jvectormap.min.js')}}"></script>
  <script src="{{asset('tem/assets2/vendors/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
  <script src="{{asset('tem/assets2/js/material.js')}}"></script>
  <script src="{{asset('tem/assets2/js/misc.js')}}"></script>
  <script src="{{asset('tem/assets2/js/dashboard.js')}}"></script>
  <!-- End custom js for this page-->
</body>
</html> 