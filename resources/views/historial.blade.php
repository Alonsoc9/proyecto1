@extends('layout')
<br><br>


    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Jost:wght@500;600;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('assets/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

@section('content')
<body>
    <!-- Agrega el contenido específico de la página de historial aquí -->

    <div style="text-align: center;">
        <h1>My Files</h1>
    </div>
    
    <div class="table-responsive" style="max-width: 800px; overflow-x: auto; margin: 0 auto;">
        <table class="table table-success table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>File Name</th>
                    <th>Date of Encryption</th>
                    <th>Download</th>
                </tr>
            </thead>
            <tbody>
                @foreach(auth()->user()->encryptedFiles()->paginate(6) as $file)
                    <tr>
                        <td>{{ $file->id }}</td>
                        <td>{{ $file->filename }}</td>
                        <td>{{ $file->created_at }}</td>
                        <td>
                            <a href="{{ route('download', ['id' => $file->id]) }}">Download</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <!-- Agregar enlaces de paginación -->
        <!-- Mostrar enlaces de paginación con números -->
        <div class="d-flex justify-content-center">
            {{ auth()->user()->encryptedFiles()->paginate(6)->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('assets/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('assets/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('assets/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('assets/lib/counterup/conterup.min.js')}}"></script>
    <script src="{{asset('assets/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/lib/isotope/isotope.pkgd.min.js')}}"></script>
    <script src= "{{asset('assets/lib/lightbox/js/lightbox.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('assets/js/main.js')}}"></script>
</body>
