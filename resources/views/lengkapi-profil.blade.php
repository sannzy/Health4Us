@extends('layouts.app')

@section('title', 'Health4Us - Lengkapi Profil')

@section('content')

<div class="container profile-container">
    <a href="{{ route('beranda') }}" class="back-btn">
        <i class="fas fa-arrow-left"></i>
    </a>

    <div class="text-center profile-header">
        <h1>Halo {{ Auth::user()->name }}, <br> Mohon Lengkapi Profil Anda!</h1>
    </div>
    
    <form action="{{ route('profil.update') }}" method="POST" novalidate>
        @csrf
        <div class="row">
            <div class="col-lg-4 mb-4">
                <h2 class="column-title">Data Pribadi</h2>
                <div class="mb-4">
                    <label for="nama" class="form-label">Nama<span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" 
                    value="{{ old('nama', Auth::user()->name) }}">
                    
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" 
                    value="{{ old('email', Auth::user()->email) }}">
                    
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="kata-sandi" class="form-label">Kata Sandi</label>
                    <input type="password" class="form-control @error('kata-sandi') is-invalid @enderror" id="kata-sandi" 
                    name="kata-sandi" placeholder="••••••••">
                    
                    @error('kata-sandi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-4">
                    <label for="nomor-telepon" class="form-label">Nomor Telepon<span class="text-danger">*</span></label>
                    <input type="tel" class="form-control @error('nomor-telepon') is-invalid @enderror" id="nomor-telepon" 
                    name="nomor-telepon" placeholder="Nomor telepon" value="{{ old('nomor-telepon', Auth::user()->no_telp) }}">
                    
                    @error('nomor-telepon')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-lg-4 mb-4">
                <h2 class="column-title">Rincian Kesehatan</h2>
                
                <div class="mb-4">
                    <label for="jenis-kelamin" class="form-label">Jenis Kelamin<span class="text-danger">*</span></label>
                    <select class="form-select @error('jenis-kelamin') is-invalid @enderror" id="jenis-kelamin" name="jenis-kelamin" required>
                        <option value="" disabled {{ is_null(Auth::user()->jenis_kelamin) ? 'selected' : '' }}>Jenis kelamin</option>
                        <option value="laki" {{ Auth::user()->jenis_kelamin == 'laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="perempuan" {{ Auth::user()->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>

                    @error('jenis-kelamin')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="tinggi-badan" class="form-label">Tinggi Badan<span class="text-danger">*</span></label>
                    <input type="number" class="form-control @error('tinggi-badan') is-invalid @enderror" id="tinggi-badan" 
                    name="tinggi-badan" placeholder="Tinggi badan" value="{{ old('tinggi-badan', Auth::user()->tinggi_badan) }}" min=1>
                    
                    @error('tinggi-badan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-4">
                    <label for="berat-badan" class="form-label">Berat Badan<span class="text-danger">*</span></label>
                    <input type="number" class="form-control @error('berat-badan') is-invalid @enderror" id="berat-badan" name="berat-badan" 
                    placeholder="Berat badan" value="{{ old('berat-badan', Auth::user()->berat_badan) }}" min=1>
                    
                    @error('berat-badan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-4">
                    <label for="tanggal-lahir" class="form-label">Tanggal Lahir<span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('tanggal-lahir') is-invalid @enderror" id="tanggal-lahir" 
                    name="tanggal-lahir" placeholder="dd/mm/yyyy" onfocus="(this.type='date')" onblur="(this.type='text')" 
                    value="{{ old('tanggal-lahir', Auth::user()->tanggal_lahir) }}">
                    
                    @error('tanggal-lahir')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-lg-4 mb-4">
                <h2 class="column-title">Integrasi Aplikasi</h2>

                <div class="mb-4">
                    <label for="kota-kabupaten" class="form-label">Kota/Kabupaten<span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('kota-kabupaten') is-invalid @enderror" id="kota-kabupaten" 
                    name="kota-kabupaten" placeholder="Kota/kabupaten" value="{{ old('kota-kabupaten', Auth::user()->kota) }}">
                    
                    @error('kota-kabupaten')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-4">
                    <label for="aplikasi-kesehatan" class="form-label">Aplikasi Kesehatan<span class="text-danger">*</span></label>
                    <select class="form-select" id="aplikasi-kesehatan" name="aplikasi-kesehatan" onchange="handleIntegration(this.value)" required>
                        <option value="" disabled {{ is_null(Auth::user()->aplikasi_sehat) ? 'selected' : '' }}>Hubungkan ke aplikasi kesehatan</option>
                        <option value="google_fit" {{ Auth::user()->aplikasi_sehat == 'google_fit' ? 'selected' : '' }}>Google Fit</option>
                        <option value="strava" {{ Auth::user()->aplikasi_sehat == 'strava' ? 'selected' : '' }}>Strava</option>
                    </select>

                    @error('aplikasi-kesehatan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <script>
                        function handleIntegration(provider) {
                            if (provider === 'google_fit') {
                                window.location.href = "{{ route('google.fit.connect') }}"; 
                            } else if (provider === 'strava') {
                                window.location.href = "/auth/strava/redirect";
                            }
                        }
                    </script>
                </div>
                
                <div class="mb-4">
                    <label for="e-wallet" class="form-label">E-Wallet<span class="text-danger">*</span></label>
                    <select class="form-select @error('e-wallet') is-invalid @enderror" id="e-wallet" name="e-wallet" required>
                        <option value="" disabled {{ is_null(Auth::user()->e_wallet) ? 'selected' : '' }}>Hubungkan ke E-Wallet</option>
                        <option value="gopay" {{ Auth::user()->e_wallet == 'gopay' ? 'selected' : '' }}>GoPay</option>
                        <option value="ovo" {{ Auth::user()->e_wallet == 'ovo' ? 'selected' : '' }}>OVO</option>
                        <option value="dana" {{ Auth::user()->e_wallet == 'dana' ? 'selected' : '' }}>Dana</option>
                        <option value="shopeepay" {{ Auth::user()->e_wallet == 'shopeepay' ? 'selected' : '' }}>ShopeePay</option>
                    </select>

                    @error('e-wallet')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div style="height: 90px;"></div> 
            </div>
        </div>
        
        <div class="d-flex justify-content-end mt-4 me-3">
            <button type="submit" class="btn btn-simpan">Simpan</button>
        </div>
    </form>
</div>

@endsection