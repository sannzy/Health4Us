<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
    <div class="container-fluid" style="padding-left: 20px; padding-right: 20px;">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('asset/logo.png') }}" alt="Logo Health4Us" class="navbar-brand-img">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav"> 
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Beranda</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('aktivitas') ? 'active' : '' }}" href="/aktivitas">Aktivitas</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('tantangan') ? 'active' : '' }}" href="/tantangan">Tantangan</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('partner-umkm') ? 'active' : '' }}" href="/partner-umkm">Partner UMKM</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex flex-row align-items-center">
                <li class="nav-item me-2">
                    <button class="btn icon-btn" type="button" data-bs-toggle="modal" data-bs-target="#searchModal">
                        <i class="fas fa-search fa-lg"></i>
                    </button>
                </li>
                
                <li class="nav-item me-2">
                    <button class="btn icon-btn position-relative" type="button" data-bs-toggle="offcanvas" data-bs-target="#notificationOffcanvas">
                        <i class="fas fa-bell fa-lg"></i>
                        @auth
                            @php
                                $unreadCount = \App\Models\Notification::where('user_id', auth()->id())->where('is_read', false)->count();
                            @endphp
                            
                            @if($unreadCount > 0)
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ $unreadCount }}
                                </span>
                            @endif
                        @endauth
                    </button>
                </li>

                <li class="nav-item dropdown">
                    @guest
                        <a class="btn icon-btn" href="#" id="navbarDropdownAuth" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-circle fa-lg"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end mt-4" aria-labelledby="navbarDropdownAuth">
                            @if (Route::has('register'))
                                <li>
                                    <a class="dropdown-item" href="{{ route('register') }}">
                                        Daftar
                                    </a>
                                </li>
                            @endif
                            @if (Route::has('login'))
                                <li>
                                    <a class="dropdown-item" href="{{ route('login') }}">
                                        Masuk
                                    </a>
                                </li>
                            @endif
                        </ul>
                    @else
                        <a class="btn icon-btn" href="#" id="navbarDropdownProfile" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-circle fa-lg"></i>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end mt-4" aria-labelledby="navbarDropdownProfile">
                            <li class="dropdown-item-text fw-semibold text-center">
                                {{ Auth::user()->name }}
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('lengkapi-profil') }}">
                                    Lengkapi Profil
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Keluar
                                </a>
                            </li>
                        </ul>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endguest
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0 pb-3">
                <h5 class="modal-title" id="searchModalLabel">Cari Sesuatu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body pt-0">
                <form action="/" method="GET">
                    <input type="search" class="form-control" placeholder="Ketik kata kunci">
                </form>
            </div>
        </div>
    </div>
</div>

<div class="offcanvas offcanvas-end" tabindex="-1" id="notificationOffcanvas" aria-labelledby="notificationOffcanvasLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="notificationOffcanvasLabel"><i class="fas fa-bell me-2"></i> Notifikasi Terbaru</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    
    <div class="offcanvas-body">
        <div class="list-group">
            @auth
                @php
                    $userNotifs = \App\Models\Notification::where('user_id', auth()->id())
                                    ->latest()
                                    ->get();
                @endphp

                @forelse($userNotifs as $notif)
                    {{-- Link diarahkan ke URL yang disimpan di database --}}
                    <a href="{{ route('notifications.read', $notif->id) }}" class="list-group-item list-group-item-action mb-2 border-start border-4 {{ $notif->is_read ? 'border-light' : 'border-primary' }}">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-1 fw-bold">{{ $notif->title }}</h6>
                            <small class="text-muted">{{ $notif->created_at->diffForHumans() }}</small>
                        </div>
                        <p class="mb-1 small text-secondary">{{ $notif->message }}</p>
                        
                        @if(!$notif->is_read)
                            <span class="badge bg-danger rounded-pill" style="font-size: 0.7rem;">Baru</span>
                        @endif
                    </a>
                @empty
                    <div class="text-center py-5">
                        <i class="fas fa-bell-slash fa-3x text-light mb-3"></i>
                        <p class="text-muted">Belum ada notifikasi untukmu.</p>
                    </div>
                @endforelse
            @else
                <div class="text-center py-5">
                    <i class="fas fa-bell-slash fa-3x text-light mb-3" style="color: #dee2e6 !important;"></i>
                    <p class="text-muted">Belum ada notifikasi.<br>Silakan masuk ke akun Anda.</p>
                    <a href="{{ route('login') }}" class="btn btn-outline-primary btn-sm mt-2">Masuk</a>
                </div>
            @endauth
        </div>
    </div>
</div>