<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Health4Us'))</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:wght@300;400;500;700" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('style/beranda.css') }}">
    <link rel="stylesheet" href="{{ asset('style/lengkapi-profil.css') }}">
    <link rel="stylesheet" href="{{ asset('style/jelajahi.css') }}">
    <link rel="stylesheet" href="{{ asset('style/aktivitas.css') }}">
    <link rel="stylesheet" href="{{ asset('style/tantangan.css') }}">
    <link rel="stylesheet" href="{{ asset('style/tantangan-detail.css') }}">
    <link rel="stylesheet" href="{{ asset('style/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('style/umkm.css') }}">
    <link rel="stylesheet" href="{{ asset('style/umkm-show.css') }}">
    

    @stack('styles')

    <style>
        @font-face {
            font-family: 'Inter-Bold-24';
            src: url('fonts/Inter/Inter_24pt-Bold.ttf');
        }

        @font-face {
            font-family: 'Inter-ExtraBold-28';
            src: url('fonts/Inter/Inter_28pt-ExtraBold.ttf');
        }

        @font-face {
            font-family: 'Inter-Regular';
            src: url('fonts/Inter/Inter_18pt-Regular.ttf');
        }

        :root {
            --primary-green: #4E9C94; 
        }
        
        body {
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            color: #2A5568;
            font-family: 'Inter', sans-serif;
            background: linear-gradient(#FFFCF5, #82BEAA);
        }

        main {
            flex: 1;
        }
        
        #navbarNav .navbar-nav:first-child { 
            gap: 20px;
            margin-left: 20px;
        }

        .navbar-light .navbar-nav .nav-link,
        .navbar-brand {
            color: #2A5568 !important;
            font-weight: 500;
            font-family: 'Inter-Bold-24' !important;
        }

        .navbar-light .navbar-nav .nav-link:hover {
            color: #007bff !important;
            text-decoration: underline;
        }
        
        .nav-link.active {
            font-weight: bold;
            font-family: 'Inter-ExtraBold-28' !important;
        }

        .dropdown-menu {
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand-img {
            height: 50px;
            width: auto;
        }

        .icon-btn {
            background-color: transparent;
            color: #555;
            padding: 0.5rem 0.75rem;    
            border: 1px solid #2A5568;
            border-radius: 8px;
            transition: all 0.2s;
            margin-right: 5px;
        }

        .icon-btn:hover {
            background-color: #f0f0f0; 
            border-color: #2A5568;
        }

        .icon-btn i {
            font-size: 1.25rem; 
            color: #2A5568; 
            vertical-align: middle;
        }

        .badge-custom {
            height: 10px;
            width: 10px;
            top: 5px; 
            right: 0px; 
            border: 1px solid white; 
        }

        footer {
            background-image: linear-gradient(to bottom, #EFBF43 0%, #FFECBA 100%);        
            padding: 40px 0 20px 0;
            margin-top: auto;
        }

        footer h4 {
            font-family: 'Inter-ExtraBold-28';
            color: #2A5568;
            margin-bottom: 15px;
        }

        footer a {
            color: #2A5568;
            text-decoration: none;
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            transition: color 0.2s;
        }

        footer a:hover {
            color: #007bff;
            text-decoration: underline;
        }

        .social-icon img {
            height: 32px;
            width: auto;
            margin-right: 15px;
            vertical-align: middle;
        }
    
        .social-icon {
            margin-right: 15px;
            display: inline-block; 
        }
    
        .social-icon:hover {
            color: #2A5568;
        }

        .footer-logo-img {
            height: 80px;
            width: auto;
            vertical-align: middle;
        }
    </style>
</head>
<body>

    @if(!Route::is('login') && !Route::is('register') && !Route::is('password.request') && !Route::is('password.email') && 
    !Route::is('password.reset'))
        @include('includes.navbar')
    @endif

    <main>
        @yield('content')

        @if(session('success') || session('error'))
            <div class="popup-overlay" id="statusPopup">
                <div class="popup-content {{ session('success') ? 'is-success' : 'is-error' }}">
                    <div class="popup-icon">
                        @if(session('success')) ✔ @else ✖ @endif
                    </div>
                    <h3>{{ session('success') ? 'Berhasil!' : 'Gagal!' }}</h3>
                    <p>{{ session('success') ?? session('error') }}</p>
                    <button class="popup-close-btn" onclick="document.getElementById('statusPopup').style.display='none'">Tutup</button>
                </div>
            </div>
        @endif

    </main>

    @if(!Route::is('login') && !Route::is('register') && !Route::is('password.request') && !Route::is('password.email') && 
    !Route::is('password.reset'))
        @include('includes.footer')
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>

    @stack('scripts')
</body>
</html>
