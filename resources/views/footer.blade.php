<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sistem Pencatatan Pengunjung - KKSE</title>
    <link rel="icon" type="image/png" href="{{ asset('images/kkse.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
body {
  margin: 0;
  min-height: 80vh;
  position: relative;
}

/* gradasi tetap di bawah */
body::before {
  content: "";
  position: fixed;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 25vh;
  background: linear-gradient(to top, rgba(205, 53, 11, 0.5), transparent);
  z-index: -1;
  pointer-events: none;
}
</style>
</head>

    <div class="fixed justify-between items-center bg-white py-4 z-40 text-center text-sm text-black shadow-lg">
        ©2025 Kelompok Keilmuan Sistem Enterprise. All rights reserved.
    </div>