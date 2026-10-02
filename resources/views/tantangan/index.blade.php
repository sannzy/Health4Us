@extends('layouts.app')

@section('title', 'Health4Us - Tantangan')

@section('content')
<div class="banner">
    <img src="/asset/banner tantangan.png" class="banner-img" alt="Banner Tantangan">
</div>

<div class="tantangan-categories">
    <button class="tantangan-cat active" data-filter="all">
        <span class="material-symbols-rounded">grid_view</span> Semua
    </button>
    <button class="tantangan-cat" data-filter="lari">
        <i class="fa-solid fa-person-running"></i> Lari
    </button>
    <button class="tantangan-cat" data-filter="bersepeda">
        <i class="fa-solid fa-bicycle"></i> Sepeda
    </button>
    <button class="tantangan-cat" data-filter="renang">
        <i class="fa-solid fa-water"></i> Renang
    </button>
</div>

<div class="tantangan-cards">
    @foreach ($kategori as $namaKategori => $daftarTantangan)
        @foreach ($daftarTantangan as $item)
            <div class="tantangan-card" data-kategori="{{ $namaKategori }}">
                @if($item->kategori)
                    <span class="tantangan-badge badge-{{ $item->kategori }}">
                        {{ ucfirst($item->kategori) }}
                    </span>
                @endif

                <img src="{{ asset($item->gambar) }}" alt="{{ $item->judul }}" class="tantangan-img">
                
                <div class="tantangan-card-body">
                    <h3 class="tantangan-name">{{ $item->judul }}</h3>
                    <p class="tantangan-desc">{{ Str::limit($item->deskripsi, 80) }}</p>
                    <a href="{{ route('tantangan.show', $item->slug) }}" class="lihat-btn">
                        Lihat Selengkapnya
                    </a>
                </div>
            </div>
        @endforeach
    @endforeach
</div>
@endsection

@push('scripts')
    <script src="{{ asset('js/tantangan.js') }}"></script>
@endpush