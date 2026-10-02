@extends('layouts.app')

@section('title', 'Health4Us')

@section('content')
    
<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2500">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <div class="carousel-inner">
        
        <div class="carousel-item active">
            <img src="{{ asset('asset/banner 1.png') }}" class="d-block w-100 hero-banner-img" alt="Banner 1">
            
            <div class="carousel-caption d-none d-md-block text-start">
                <h5 class="text-white">Pelajari Lebih Lanjut Tentang</h5>
                <img src="{{ asset('asset/logo.png') }}" alt="Logo Health4Us">
                <h2 class="text-white fw-bold mt-3">Siap Tukar Keringat Jadi Diskon?</h2>
                <a href="/jelajahi" class="btn btn-jelajahi btn-lg mt-3 fw-bold">Jelajahi Manfaatnya</a>
            </div>
        </div>

        <div class="carousel-item">
            <img src="{{ asset('asset/banner 2.png') }}" class="d-block w-100 hero-banner-img" alt="Banner 2">
            
            <div class="carousel-caption d-none d-md-block text-start">
                <h5 class="text-white">Pelajari Lebih Lanjut Tentang</h5>
                <img src="{{ asset('asset/logo.png') }}" alt="Logo Health4Us">
                <h2 class="text-white fw-bold mt-3">Siap Tukar Keringat Jadi Diskon?</h2>
                <a href="/jelajahi" class="btn btn-jelajahi btn-lg mt-3 fw-bold">Jelajahi Manfaatnya</a>
            </div>
        </div>

        <div class="carousel-item">
            <img src="{{ asset('asset/banner 3.png') }}" class="d-block w-100 hero-banner-img" alt="Banner 3">
            
            <div class="carousel-caption d-none d-md-block text-start">
                 <h5 class="text-white">Pelajari Lebih Lanjut Tentang</h5>
                <img src="{{ asset('asset/logo.png') }}" alt="Logo Health4Us">
                <h2 class="text-white fw-bold mt-3">Siap Tukar Keringat Jadi Diskon?</h2>
                <a href="/jelajahi" class="btn btn-jelajahi btn-lg mt-3 fw-bold">Jelajahi Manfaatnya</a>
            </div>
        </div>
    </div>
</div>

@auth
<div class="container py-5">
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="header-title">Hai, {{ Auth::user()->name }}!</h2>
            <h3 class="header-subtitle">Ini Progress Sehatmu</h3>
        </div>
        <img src="{{ asset('asset/mascot.png') }}" alt="Mascot Sehat" class="mascot-img-header">
    </div>
    
    <div class="row g-3">
        <div class="col-md-4">
            <a href="{{ url('/aktivitas') }}" class="text-decoration-none">
                <div class="stat-card">
                    <span class="material-symbols-rounded stat-icon">local_fire_department</span>
                    <h4>Total Kalori:</h4>
                    <div class="value">{{ $caloriesToday ?? 0 }} Kkal</div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="{{ url('/aktivitas') }}" class="text-decoration-none">
            <div class="stat-card">
                <span class="material-symbols-rounded stat-icon">schedule</span>
                <h4>Total Olahraga:</h4>
                <div class="value">{{ $activeMinutesToday ?? 0 }} Menit</div>
            </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="{{ url('/aktivitas') }}" class="text-decoration-none">
                <div class="stat-card">
                    <span class="material-symbols-rounded stat-icon">payments</span>
                    <h4>HealthKoin Kamu:</h4>
                    <div class="value">
                        {{ number_format(Auth::user()->coins ?? 0) }} Koin
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="text-center mt-4">
        <a href="{{ url('/aktivitas') }}" class="btn-detail-progress-custom">Lihat Selengkapnya</a>
    </div>
    
</div>
@endauth

<div class="tips-section">
    <div class="tips-container">
            
        <h1 class="tips-title">Tips Sehat Hari Ini</h1>
        <h2 class="tips-subtitle">Kesehatanmu Berharga, Mulai dari Langkah Kecil</h2>

        <div class="tips-images">
            <div class="tips-card">
                <img src="{{ asset('asset/tips sehat 1.png') }}" alt="Tip 1">
                <div class="tips-overlay">
                    <p>Makanan penyumbang keberhasilan diet sebesar 10%</p>
                </div>
            </div>

            <div class="tips-card">
                <img src="{{ asset('asset/tips sehat 2.png') }}" alt="Tip 2">
                <div class="tips-overlay">
                    <p>Tidur berlebihan dapat menyebabkan kenaikan berat badan</p>
                </div>
            </div>

            <div class="tips-card">
                <img src="{{ asset('asset/tips sehat 3.png') }}" alt="Tip 3">
                <div class="tips-overlay">
                    <p>Olahraga harus dilakukan secara rutin setiap minggunya</p>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="weekly-challenge">
    <div class="section-header">
        <div class="header-text-group">
            <h2>Tantangan Mingguan</h2>
            <p class="subtitle">Pilih tantangan favoritmu dan kumpulkan poin kesehatan!</p>
        </div>
        <div class="header-action">
            <a href="{{ route('tantangan.index') }}" class="btn-detail-progress-custom">Lihat Selengkapnya</a>
        </div>
    </div>
    
    <div class="challenge-scroll">
        @foreach ($challenges as $challenge)
            <div class="challenge-card">
                <img src="{{ asset($challenge->gambar) }}" alt="{{ $challenge->judul }}">

                <div class="card-content">
                    <h3>{{ $challenge->judul }}</h3>
                    <p>{{ Str::limit($challenge->deskripsi, 50) }}</p>

                    <div class="meta">
                        <span>🪙 {{ $challenge->koin }} Koin</span>
                        <span>📍 {{ $challenge->jarak }}</span>
                    </div>

                    <a href="{{ route('tantangan.show', $challenge->slug) }}" class="btn-detail">
                        Lihat Detail
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>  

<div class="umkm-section">
    <div class="umkm-container"> 
        <h1 class="umkm-title">Top UMKM Minggu Ini</h1>
        <h2 class="umkm-subtitle">Tukarkan Keringatmu, Dukung UMKM Lokal!</h2>

        <div class="umkm-cards">
            @foreach($displayUmkm as $item)
                <div class="umkm-card">
                    @if($item->label)
                        <span class="umkm-badge">{{ $item->label }}</span>
                    @endif
                    
                    <img src="{{ asset($item->gambar) }}" class="umkm-img" alt="{{ $item->nama }}">

                    <div class="umkm-card-body">
                        <h4 class="umkm-name">{{ $item->nama }}</h4>
                        <div class="umkm-coins">
                            <img src="{{ asset('asset/coin.png') }}" class="coin-icon">
                            {{ $item->healthkoin }} HealthKoin
                        </div>
                        <a href="{{ route('umkm.show', $item->slug) }}" class="umkm-tukar-btn">Tukar</a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-4">
            <a href="{{ url('/partner-umkm') }}" class="umkm-more-btn">Lihat Selengkapnya</a>
        </div>
        
    </div>
</div>


@endsection


@section('scripts')
    <script src="{{ asset('javaScript/tips-sehat.js') }}"></script>
    <script src="{{ asset('javaScript/umkm.js') }}"></script>
@endsection