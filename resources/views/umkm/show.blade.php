@extends('layouts.app')

@section('title', 'Detail Produk - ' . $product['nama'])

@section('content')

<div class="main-wrapper">
    <a href="{{ route('umkm.index') }}" class="back-btn">
        <i class="fas fa-arrow-left"></i>
    </a>
    <section class="umkm-show-container">
        <div class="umkm-card-horizontal">
            
            <div class="card-left">
                @if(isset($product['label']) && $product['label'] != '')
                    <div class="badge-umkm">{{ $product['label'] }}</div>
                @endif
    
                <img src="{{ $product['gambar'] }}" alt="{{ $product['nama'] }}" class="product-img">
            </div>

            <div class="card-right">
                <h1 class="product-title">{{ $product['nama'] }}</h1>
                <p class="product-desc">
                    Produk UMKM pilihan yang diproses secara higienis dan mendukung kesehatan tubuh Anda.
                </p>

                <div class="price-section">
                    <div class="price-item">
                        <span class="price-label">SALDO HEALTHKOIN KAMU</span>
                        <div class="price-value">
                            <img src="/asset/coin.png" class="coin-icon">
                            <span>{{ number_format($healthkoin) }}</span>
                        </div>
                    </div>
                    <div class="price-item text-right">
                        <span class="price-label">HARGA PENUKARAN</span>
                        <div class="price-value">
                            <img src="/asset/coin.png" class="coin-icon">
                            <span>{{ number_format($product['healthkoin']) }}</span>
                        </div>
                    </div>
                </div>

                <form method="POST" action="/partner-umkm/{{ $product['slug'] }}/tukar">
                    @csrf
                    <button type="submit" class="btn-tukar-pill">Tukar Sekarang</button>
                </form>
            </div>

        </div>
    </section>
</div>
@endsection