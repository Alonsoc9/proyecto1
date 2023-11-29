<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="stylesheet" href="css/dash.css">

    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
</head>
<body id="body">
    
  <header>
    <div class="header-container">
      <div class="icon__menu" onclick="toggleSidebar()">
        <i class="fas fa-bars" id="btn_open"></i>
      </div>
  
    </div>
  
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <span class="btn btn-warning py-sm-3 px-sm-5 rounded-pill me-3 animated slideInLeft">
        Hello, {{ auth()->user()->name }}
      </span>    
    </div>

     <div class="image-container">
     
      <img src="img/logomini.png" alt="Logo" class="logo-img" width="200" height="200">
    </div> 
  </header>

    <div class="menu__side" id="menu_side">
        <div class="name__page">
          <img id="userAvatar" src="{{ auth()->user()->profile_image }}" alt="User Avatar" class="rounded-circle me-2" style="border-radius: 50%;">
        </div>

        <br><br><br><br>
        
        <div class="options__menu">	
          <br>
          <span class="btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3 animated slideInLeft">
            {{ auth()->user()->email }}
        </span> 

            <a href="{{ route('dashboard') }}" class="selected">
                <div class="option">
                    <i class="fas fa-home" title="Inicio"></i>
                    <h4>Home</h4>
                </div>
            </a>

            <a href="{{ route('historial') }}">
                <div class="option">
                  <i class="fa-solid fa-folder-open" title="Historial"></i>
                    <h4>History</h4>
                </div>
            </a>
            
            <a href="{{ route('encriptar') }}">
                <div class="option">
                  <i class="fa-solid fa-file-shield" title="Encrypt"></i>
                    <h4>Encrypt</h4>
                </div>
            </a>

            <a href="{{ route('desencriptar') }}">
                <div class="option">
                  <i class="fa-solid fa-lock-open" title="Decrypt"></i>
                    <h4>Decrypt</h4>
                </div>
            </a>
           
          
    <!-- Enlace de Logout con el ícono y clase especificados -->
    <form id="logout-form" method="POST" action="{{ route('logout') }}">
      @csrf
      <a href="#" class="logout-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <div class="option">
              <i class="fa-solid fa-right-from-bracket" style="color: red;" title="Log Out"></i>
              <h4>Log Out</h4>
          </div>
      </a>
      <img src="img/logomini.png" alt="logo" class="img-responsive" style="max-width: 70%; height: auto;">

  </form>   

        </div>
    </div>

    <main>
        @yield('content')
    </main>

    <script src="js/dash.js"></script>
</body>
</html>
