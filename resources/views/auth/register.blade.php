@extends('layouts.app')

@section('title', 'Health4US - Daftar')

@section('content')
<div class="container">
    <div class="left-panel">
        <img src="/asset/background.png" class="background-img" alt="background">
    </div>

    <div class="right-panel">
        <div class="form-wrapper">
            <h1 class="form-title">{{ __('Mulailah Perjalanan Anda') }} <br> {{ ('dengan Health4Us!') }}</h1>

            <form method="POST" action="{{ route('register') }}" novalidate>
                @csrf
                
                <div class="mb-4">
                    <label for="name">{{ __('Nama') }}<span class="required">*</span></label>

                    <div class="input-box">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" 
                        value="{{ old('name') }}" required placeholder="Nama lengkap" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <div class="mb-4">
                    <label for="email">{{ __('Email') }}<span class="required">*</span></label>

                    <div class="input-box">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" 
                        value="{{ old('email') }}" required placeholder="username@gmail.com">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <div class="mb-4">
                    <label for="password">{{ __('Kata Sandi') }}<span class="required">*</span></label>

                    <div class="input-box password-box">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                        name="password" required placeholder="Kata sandi">

                        <img src="/asset/eye-close.svg" class="toggle-password" id="togglePassword" alt="show/hide">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label for="password-confirm">{{ __('Konfirmasi Kata Sandi') }}<span class="required">*</span></label>

                    <div class="input-box">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required 
                        placeholder="Konfirmasi kata sandi">

                        <img src="/asset/eye-close.svg" class="toggle-password" id="togglePassword" alt="show/hide">
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary">{{ __('Daftar') }}</button>
            </form>

            <div class="divider">Atau masuk dengan</div>

            <a href="{{ route('google.login') }}" class="google-btn">
                <img src="/asset/google.svg" class="google-icon" alt="google icon">
                Google
            </a>

            <p class="option">
                Sudah memiliki akun?
                <a href="{{ route('login') }}">Masuk</a>
            </p>
        </div>

        <img src="/asset/mascot.png" class="mascot" alt="mascot">
    </div>
</div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('style/auth/base.css') }}">
    <link rel="stylesheet" href="{{ asset('style/auth/register.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/auth/register-login.js') }}"></script>
@endpush