@extends('layouts.app')

@section('title', 'Health4US - Lupa Kata Sandi')

@section('content')
<div class="container">
    <div class="left-panel">
        <img src="/asset/background.png" class="background-img" alt="background">
    </div>
    
    <div class="right-panel">
        <div class="form-wrapper">
            <h1 class="form-title">Lupa Kata Sandi?</h1>

            <p class="desc">Masukkan email Anda untuk menerima link reset kata sandi.</p>

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" novalidate>
                @csrf
                
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

                <button type="submit" class="btn btn-primary">{{ __('Kirim Link Reset') }}</button>
            </form>
        </div>

        <img src="/asset/mascot.png" class="mascot" alt="mascot">
    </div>
</div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('style/auth/base.css') }}">
    <link rel="stylesheet" href="{{ asset('style/auth/lupa-sandi.css') }}">
@endpush