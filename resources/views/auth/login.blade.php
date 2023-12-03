<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('assets/login/css/main.css')}}">
</head>
<body>
    <div class="limiter">
		<div class="container-login100" style="background-image: url('img/ciber1.webp');">
				<div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">

        <a href="auth/google" class="d-flex flex-column align-items-center mt-4">
            <img src="{{asset('assets/login/images/icons/icon-google2.jpeg')}}" alt="GOOGLE" width="300" height="70">
        </a>
        <br> <div class="d-flex flex-column align-items-center mt-4"> OR </div><br>
        
            <div class="d-flex flex-column align-items-center mt-4">
            <button class="btn btn-primary py-sm-3 px-sm-5 rounded-pill me-3 animated slideInLeft">
                FACIAL RECOGNITION 
            </button>
            <br><br>
            <a href="{{ url('/facial') }}" class="text-containe">
                <img src="{{ asset('img/icon-faceid.png') }}" alt="" width="200" height="200">
            </a>

            <br><br>

            <!-- Botón para regresar a la página anterior -->
						 <a href="javascript:history.back()" class="btn btn-danger py-sm-3 px-sm-5 rounded-pill me-3 animated slideInLeft">
							Back
						</a>
            <!-- Botón para abrir el modal -->
        <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#termsModal">
            By continuing you agree that you have read and accepted the terms and conditions
        </button>
  
        {{-- body --}}
<!-- Modal de Términos y Condiciones -->
<div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="termsModalLabel">Terms and Conditions</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Agrega aquí tu contenido de términos y condiciones -->
                <li>Disclaimer for Improper Use </li>
                <li> Forgotten Password and Access to Encrypted Files </li>
                <li>Privacy of Encrypted Files</li>
                <li>Service Availability </li>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
            </div>
        </div>
    </div>

    </div>
        

        
        <br><br>
        
        


</body>
<!-- Bootstrap JS (si no lo has incluido en tu archivo principal) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
