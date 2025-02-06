@extends('layouts.app')<!--@extends: Ini adalah directive di Blade yang digunakan untuk menunjukkan bahwa tampilan (view) ini mengextends (mewarisi) layout dari sebuah tampilan utama yang sudah ada. -->
<!--'layouts.app': Ini mengarah pada file layout utama yang ada di dalam folder resources/views/layouts/-->

@section('content')<!--digunakan untuk mendefinisikan bagian konten yang akan disisipkan di dalam layout yang lebih besar.-->
    <h1>Halaman Category</h1><!-- adalah judul yang ditampilkan di halaman kategori.-->
@endsection<!-- menandakan bahwa bagian konten ini sudah selesai dan siap dimasukkan ke dalam layout.
