@extends('layouts.app')

@section('title', 'Health4US - Buat Kata Sandi Baru')

@section('content')
<div class="container">
    <div class="left-panel">
        <img src="/asset/background.png" class="background-img" alt="background">
    </div>
    
    <div class="right-panel">
        <div class="form-wrapper">
            <h1 class="form-title">Buat Kata Sandi Baru</h1>

            <p class="desc">Masukkan dan konfirmasikan kata sandi baru Anda di bawah ini.</p>
            
            <form method="POST" action="{{ route('password.update') }}" novalidate>
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

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
                    <label for="password">{{ __('Kata Sandi Baru') }}<span class="required">*</span></label>

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
                
                <button type="submit" class="btn btn-primary">{{ __('Ubah Kata Sandi') }}</button>
            </form>
        </div>

        <img src="/asset/mascot.png" class="mascot" alt="mascot">
    </div>
</div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('style/auth/base.css') }}">
    <link rel="stylesheet" href="{{ asset('style/auth/buat-sandi.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/auth/register-login.js') }}"></script>
@endpush