@extends('layouts.app')

@section('title', 'Health4Us - Aktivitas')

@section('content')
<div class="container py-5">
    <h1 class="text-center dashboard-title"><i class="fas fa-heartbeat me-2"></i>Dashboard Aktivitas Sehat Anda</h1>
    <div class="row g-4">
        <div class="col-lg-3">
            <div class="sidebar p-4 sticky-top">
                <h3 class="sidebar-heading">Data Aktivitas Anda</h3>
                
                <button type="button" class="btn calendar-btn w-100 mb-4" data-bs-toggle="modal" data-bs-target="#calendarModal">
                    <i class="far fa-calendar-alt me-2"></i> Lihat Aktivitas Bulanan
                </button>

                <div class="tip-card">
                    <p class="mb-1"><i class="fas fa-lightbulb me-2 text-warning"></i> <strong>Tips Sehat Hari Ini:</strong></p>
                    <small>Lakukan peregangan ringan selama 5 menit setiap jam saat bekerja untuk meredakan ketegangan otot.</small>
                </div>
                
                <ul class="list-unstyled mt-4">
                    <li><a href="/" class="text-white d-block py-2 text-decoration-none opacity-75"><i class="fas fa-home me-2"></i> Kembali ke Beranda</a></li>
                    <li><a href="#" class="text-white d-block py-2 text-decoration-none opacity-75"><i class="fas fa-chart-line me-2"></i> Laporan Detail Lainnya</a></li>
                    <li><a href="/lengkapi-profil" class="text-white d-block py-2 text-decoration-none opacity-75"><i class="fas fa-cog me-2"></i> Pengaturan Akun</a></li>
                </ul>
            </div>
        </div>

        <div class="col-lg-9">
            
            <div class="main-header">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="header-greeting">
                        <i class="fas fa-user-circle me-2"></i> Selamat Datang, {{ Auth::user()->name }}
                    </div>
                </div>

                <div class="row g-3">
                    
                    <div class="col-md-4">
                        <div class="stat-card">
                            <span class="material-symbols-rounded stat-icon">local_fire_department</span>
                            <h4>Total Kalori:</h4>
                            <div class="value">{{ $caloriesToday ?? 0 }} Kkal</div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="stat-card">
                            <span class="material-symbols-rounded stat-icon">schedule</span>
                            <h4>Total Olahraga:</h4>
                            <div class="value">{{ $activeMinutesToday ?? 0 }} Menit</div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="stat-card">
                            <span class="material-symbols-rounded stat-icon">payments</span>
                            <h4>HealthKoin Kamu:</h4>
                            <div class="value">
                                @if(Auth::check())
                                    {{ number_format(Auth::user()->coins ?? 0) }} Koin
                                @else
                                    0 Koin
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row g-4">
                
                <div class="col-md-6">
                    <div class="custom-card p-4 h-100">
                        <h5 class="chart-title"><i class="fas fa-shoe-prints me-2 text-primary"></i> Langkah Mingguan</h5>
                        <canvas id="stepsChart"></canvas>
                        
                        <div class="insight-box">
                            <p class="mb-0">
                                <i class="fas fa-exclamation-triangle alert-icon me-2"></i> 
                                <strong>Perhatian!</strong> Terjadi <strong>penurunan aktivitas</strong> pada minggu ke-3 (15-21) dari 10.000 menjadi 8.000 langkah. Coba tingkatkan 2000 langkah hari ini!
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="custom-card p-4 h-100">
                        <h5 class="chart-title"><i class="fas fa-fire me-2 text-danger"></i> Kalori Terbakar Harian</h5>
                        <canvas id="calorieChart"></canvas>

                        <div class="insight-box">
                            <p class="mb-0">
                                <i class="fas fa-check-circle success-icon me-2"></i> 
                                <strong>Sangat Baik!</strong> Anda secara konsisten membakar kalori tertinggi pada hari <strong>Sabtu (600 Kkal)</strong>. Pertahankan intensitas olahraga di akhir pekan.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="custom-card p-4 h-100">
                        <h5 class="chart-title"><i class="fas fa-running me-2 text-success"></i> Durasi Olahraga Bulanan</h5>
                        <canvas id="exerciseChart"></canvas>
                        
                        <div class="insight-box">
                            <p class="mb-0">
                                <i class="fas fa-star success-icon me-2"></i> 
                                <strong>Rekor Pribadi!</strong> Bulan <strong>Desember</strong> mencatat durasi olahraga tertinggi (300 menit). Anda telah mencapai target bulanan Anda!
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="custom-card p-4 h-100">
                        <h5 class="chart-title"><i class="fas fa-brain me-2 text-info"></i> Tingkat Stres Mingguan</h5>
                        <div class="d-flex justify-content-center">
                            <canvas id="stressChartPie" style="max-width:200px; max-height:200px;"></canvas>
                        </div>

                        <div class="summary-box mt-4">
                            <p><strong>Rata-rata stres:</strong> <span class="badge bg-warning text-dark">5.0</span></p>
                            <p><strong>Stres tertinggi:</strong> 6 (Minggu 1-7)</p>
                            <p><strong>Stres terendah:</strong> 4 (Minggu 15-21)</p>
                        </div>
                        
                        <div class="insight-box">
                            <p class="mb-0">
                                <i class="fas fa-exclamation-triangle alert-icon me-2"></i> 
                                <strong>Waspada!</strong> Stres tertinggi terjadi di <strong>awal bulan (Minggu 1-7)</strong>. Coba jadwalkan sesi meditasi atau relaksasi di minggu depan.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="calendarModal" tabindex="-1" aria-labelledby="calendarModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header text-white" style="background-color: #008080;">
        <h5 class="modal-title" id="calendarModalLabel"><i class="far fa-calendar-alt me-2"></i> Kalender Aktivitas Bulanan</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h4 class="text-center my-3 text-success">Desember 2025</h4>
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead>
                    <tr tr style="background-color: #40E0D0; color: white;">
                        <th>Min</th><th>Sen</th><th>Sel</th><th>Rab</th><th>Kam</th><th>Jum</th><th>Sab</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-muted">1</td><td>2</td><td>3</td><td>4</td><td>5 <span class="badge bg-success">O</span></td><td>6</td><td>7</td>
                    </tr>
                    <tr>
                        <td>8</td><td>9 <span class="badge bg-danger">S</span></td><td>10</td><td>11</td><td>12</td><td>13 <span class="badge bg-success">O</span></td><td>14</td>
                    </tr>
                    <tr>
                        <td>15</td><td>16</td><td>17</td><td>18 <span class="badge bg-success">O</span></td><td>19</td><td>20</td><td>21</td>
                    </tr>
                    <tr>
                        <td>22</td><td>23</td><td>24</td><td>25</td><td>26 <span class="badge bg-danger">S</span></td><td>27</td><td>28</td>
                    </tr>
                    <tr>
                        <td>29</td><td>30</td><td>31</td><td class="text-muted">1</td><td class="text-muted">2</td><td class="text-muted">3</td><td class="text-muted">4</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <p class="mt-3 text-end"><span class="badge bg-success">O</span> = Olahraga, <span class="badge bg-danger">S</span> = Stres Tinggi</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
    <script>
        window.healthAppData = {
            steps: {!! json_encode($weeklySteps ?? [1000, 2000, 1500, 3000]) !!},
            calories: {!! json_encode($dailyCalories ?? [400, 300, 500, 450, 600, 700, 350]) !!},
            exercise: {!! json_encode($monthlyExercise ?? [100, 150, 200, 250]) !!},
            stress: {!! json_encode($weeklyStress ?? [5, 4, 6, 3]) !!}
        };
    </script>
    <script src="{{ asset('js/aktivitas.js') }}"></script>
@endpush