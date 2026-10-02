@extends('layouts.app')

@section('title', 'Health4Us - Jelajahi Manfaat')

@section('content')

<section class="jelajahi-section">
    <div class="jelajahi-container">
        <div class="jelajahi-header" data-aos="fade-down">
            <h2 class="jelajahi-title">Jelajahi Manfaatnya</h2>
            <div class="jelajahi-divider" data-aos="zoom-in" data-aos-delay="300"></div>
        </div>

        <div class="jelajahi-grid">

            <div class="jelajahi-card" data-aos="fade-up" data-aos-delay="400">
                <div class="jelajahi-icon-box">
                    <span class="material-symbols-rounded">fitness_center</span>
                </div>
                <h3>Gaya Hidup Sehat</h3>
                <p>Bangun kebiasaan hidup sehat melalui aktivitas positif yang memberi manfaat tidak hanya untuk diri sendiri, tetapi juga untuk sekitar.</p>
            </div>

            <div class="jelajahi-card" data-aos="fade-up" data-aos-delay="100">
                <div class="jelajahi-icon-box">
                    <span class="material-symbols-rounded">volunteer_activism</span>
                </div>
                <h3>Dukung UMKM Lokal</h3>
                <p>Setiap HealthKoin yang kamu kumpulkan membantu mendukung UMKM lokal agar terus tumbuh dan berdaya secara berkelanjutan.</p>
            </div>

            <div class="jelajahi-card" data-aos="fade-up" data-aos-delay="200">
                <div class="jelajahi-icon-box">
                    <span class="material-symbols-rounded">verified_user</span>
                </div>
                <h3>Kualitas Terjamin</h3>
                <p>Produk dan mitra UMKM dipilih dengan prinsip kesehatan, kualitas, dan dampak sosial yang sejalan dengan nilai Health 4 Us.</p>
            </div>

            <div class="jelajahi-card" data-aos="fade-up" data-aos-delay="300">
                <div class="jelajahi-icon-box">
                    <span class="material-symbols-rounded">redeem</span>
                </div>
                <h3>Tukar Kebaikan dengan Mudah</h3>
                <p>Gunakan HealthKoin hasil aktivitas sehatmu untuk menukar produk UMKM secara praktis, sehat untukmu, dan bermanfaat untuk banyak orang.</p>
            </div>

        </div>
    </div>
</section>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 1000,
        once: true,
        offset: 100
    });
</script>

@endsection