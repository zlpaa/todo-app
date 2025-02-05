<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ $title }} - {{ config('app.name') }}</title>
     <!--Kelas CSS untuk menandai card yang dipilih -->
@card.selected {
        <background-color: #cce5ff;>  /* Mengubah warna latar belakang ketika card dipilih */
       <border: 2px solid #0056b3;> /* Mengubah warna border */
    }
    
     Kelas CSS untuk card dengan tugas selesai
    .card.completed {
        <background-color: #d4edda;  >/* Mengubah warna latar belakang tugas selesai */
        border: 2px solid #28a745;>
    }
    
    <!-- Import bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-icons/font/bootstrap-icons.min.css') }}">
</head>

<body style="background-image: url('{{asset('bg/bg.gif')}}'); background-size: cover; background-position: center;">

    @include('partials.navbar') <!-- Mengambil component navbar -->

   
    @yield('content') <!-- Render content -->


    @include('partials.modal')

    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script> <!-- Import bootstrap JS -->
</body>

</html>
