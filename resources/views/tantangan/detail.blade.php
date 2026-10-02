@extends('layouts.app')

@section('title', 'Detail Tantangan - ' . $event->judul)

@section('content')
<link rel="stylesheet" href="{{ asset('css/challenge-detail.css') }}">


<div class="container-detail">

    <a href="{{ route('tantangan.index') }}" class="back-btn">
        <i class="fas fa-arrow-left"></i>
    </a>

    <img src="{{ asset($event->gambar) }}" class="header-img" alt="{{ $event->judul }}">


    <h1 class="event-title">{{ $event->judul }}</h1>

    <div class="event-highlights">
        <div>
            <span class="emoji">📅</span>
            <strong>Tanggal</strong>
            <span class="value">{{ \Carbon\Carbon::parse($event->tanggal)->format('d M Y') }}</span>
        </div>
        <div>
            <span class="emoji">📏</span>
            <strong>Jarak</strong>
            <span class="value">{{ $event->jarak ?: '-' }}</span>
        </div>
        <div>
            <span class="emoji">🎖️</span>
            <strong>Hadiah</strong>
            <span class="value">{{ $event->hadiah ?: '-' }}</span>
        </div>
        <div>
            <span class="emoji">🪙</span>
                <strong>Koin</strong>
            <span class="value">{{ $event->koin }} koin</span>
        </div>
    </div>

    <div class="content-box">
        <h3>Tentang Tantangan</h3>
        <p>{!! nl2br(e($event->deskripsi)) !!}</p>
    </div>
    
    @if(!$statusDaftar)
        <form action="{{ route('tantangan.register', $event->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn-register" style="width: 100%; padding: 15px; font-weight: bold;">
                Daftar Sekarang
            </button>
        </form>
    @elseif(!$statusDaftar->sudah_mengikuti_tantangan)
        <form action="{{ route('tantangan.klaim', $event->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn-register" style="width: 100%; padding: 15px; font-weight: bold; background-color: #ffc107; color: #000;">
                Klaim Hadiah {{ $event->koin }} Koin
            </button>
        </form>
    @else
        <button class="btn-register" disabled style="width: 100%; padding: 15px; background-color: #6c757d; cursor: not-allowed;">
            Tantangan Selesai
        </button>
    @endif
</div>
@endsection