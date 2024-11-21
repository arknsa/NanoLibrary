<!-- resources/views/adm/index.blade.php -->

@extends('layouts.admin')

@section('content')

<div class="container pt-5">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-5 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Dashboard</h3>
            </div>
        </div>

        <!-- Row for Cards -->
        <div class="row mb-4">
            <!-- Anggota -->
            <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center bubble-shadow-small">
                                    <i class="fas fa-users text-primary"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Anggota</p>
                                    <h4 class="card-title">{{ $totalMahasiswa }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Koleksi Buku -->
            <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center bubble-shadow-small">
                                    <i class="fas fa-book text-success"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Koleksi Buku</p>
                                    <h4 class="card-title">{{ $totalJenisBuku }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kategori Buku -->
            <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center bubble-shadow-small">
                                    <i class="fas fa-tags text-warning"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Kategori Buku</p>
                                    <h4 class="card-title">{{ $totalKategoriBuku }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Second Row for Cards -->
        <div class="row mb-4">
            <!-- Dipesan -->
            <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center bubble-shadow-small">
                                    <i class="fas fa-clipboard-list text-secondary"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Dipesan</p>
                                    <h4 class="card-title">{{ $totalDipesan }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dipinjamkan -->
            <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center bubble-shadow-small">
                                    <i class="fas fa-exchange-alt text-info"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Dipinjamkan</p>
                                    <h4 class="card-title">{{ $totalDipinjamkan }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dikembalikan -->
            <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center bubble-shadow-small">
                                    <i class="fas fa-undo text-danger"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Dikembalikan</p>
                                    <h4 class="card-title">{{ $totalDikembalikan }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Active Users Row -->
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card card-round">
                    <div class="card-body pb-0" style="text-align: center;">
                        <h2 class="mb-2">{{ $occupied }}</h2>
                        <p class="text-muted">Jumlah Mahasiswa di Ruang Baca</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Row -->
        <div class="row">
            <!-- Line Chart: Pertumbuhan Anggota per Bulan -->
            <div class="col-md-6 mb-4">
                <div class="card card-round">
                    <div class="card-body">
                        <h4 class="fw-bold">Pertumbuhan Anggota per Bulan</h4>
                        <div class="chart-container">
                            <canvas id="lineChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bar Chart: Stok Buku per Judul -->
            <!-- Bar Chart: Stok Buku per Judul (Vertikal) -->
            <!-- Bar Chart: Stok Buku per ID Buku (Horizontal) -->
            <div class="col-md-6 mb-4">
                <div class="card card-round">
                    <div class="card-body">
                        <h4 class="fw-bold">Stok Buku per ID Buku</h4>
                        <div class="chart-container" style="position: relative; width: 100%;">
                            <canvas id="stockBarChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart: Distribusi Kategori Buku -->
        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="card card-round">
                    <div class="card-body">
                        <h4 class="fw-bold">Distribusi Kategori Buku</h4>
                        <div class="chart-container">
                            <canvas id="kategoriPieChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Include Chart.js via CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- JavaScript untuk Menginisialisasi Chart -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Data untuk Line Chart
    const lineChartLabels = @json($lineChartLabels);
    const lineChartData = @json($lineChartData);

    const ctxLine = document.getElementById('lineChart').getContext('2d');
    const lineChart = new Chart(ctxLine, {
        type: 'line',
        data: {
            labels: lineChartLabels,
            datasets: [{
                label: 'Jumlah Anggota',
                data: lineChartData,
                backgroundColor: 'rgba(54, 162, 235, 0.2)', // Biru Transparan
                borderColor: 'rgba(54, 162, 235, 1)', // Biru Tua
                borderWidth: 2,
                fill: true,
                tension: 0.1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0
                    }
                }
            }
        }
    });

    // Data untuk Bar Chart: Stok Buku per ID Buku (Horizontal)
    const stockBarChartLabels = @json($stockBarChartLabels);
    const stockBarChartData = @json($stockBarChartData);
    const stockBarChartTitles = @json($stockBarChartTitles);

    const ctxStockBar = document.getElementById('stockBarChart').getContext('2d');
    const stockBarChart = new Chart(ctxStockBar, {
        type: 'bar',
        data: {
            labels: stockBarChartLabels,
            datasets: [{
                label: 'Jumlah Stok',
                data: stockBarChartData,
                backgroundColor: 'rgba(0, 123, 255, 0.6)', // Warna biru
                borderColor: 'rgba(0, 123, 255, 1)',
                borderWidth: 1,
                minBarLength: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            indexAxis: 'y', // Membuat chart horizontal
            scales: {
                x: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0,
                        stepSize: 1
                    },
                    grid: {
                        display: true
                    }
                },
                y: {
                    ticks: {
                        autoSkip: false,
                        font: {
                            size: 12
                        }
                    },
                    grid: {
                        display: false
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    enabled: true,
                    callbacks: {
                        label: function(context) {
                            let index = context[0].dataIndex;
                            let idBuku = context[0].label;
                            let judulBuku = stockBarChartTitles[index];
                            let judul = 'Judul' + judulBuku 
                            let label = 'Jumlah Stok: ' + context.parsed.x;
                            return judul
                        },
                        title: function(context) {
                            let index = context[0].dataIndex;
                            let idBuku = context[0].label;
                            let judulBuku = stockBarChartTitles[index];
                            return 'ID Buku: ' + idBuku + '\nJudul: ' + judulBuku;
                        }
                    }
                }
            }
        }
    });

    // Data untuk Pie Chart: Distribusi Kategori Buku
    const kategoriPieChartLabels = @json($kategoriPieChartLabels);
    const kategoriPieChartData = @json($kategoriPieChartData);

    const ctxKategoriPie = document.getElementById('kategoriPieChart').getContext('2d');
    const kategoriPieChart = new Chart(ctxKategoriPie, {
        type: 'pie',
        data: {
            labels: kategoriPieChartLabels,
            datasets: [{
                data: kategoriPieChartData,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.6)',    // Merah
                    'rgba(54, 162, 235, 0.6)',    // Biru
                    'rgba(255, 206, 86, 0.6)',    // Kuning
                    'rgba(75, 192, 192, 0.6)',    // Hijau
                    'rgba(153, 102, 255, 0.6)',   // Ungu
                    'rgba(255, 159, 64, 0.6)',    // Oranye
                    'rgba(199, 199, 199, 0.6)',   // Abu-abu
                    'rgba(83, 102, 255, 0.6)',    // Biru Tua
                    'rgba(255, 102, 255, 0.6)',   // Pink
                    'rgba(102, 255, 178, 0.6)'    // Hijau Muda
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',    
                    'rgba(54, 162, 235, 1)',    
                    'rgba(255, 206, 86, 1)',    
                    'rgba(75, 192, 192, 1)',    
                    'rgba(153, 102, 255, 1)',   
                    'rgba(255, 159, 64, 1)',    
                    'rgba(199, 199, 199, 1)',   
                    'rgba(83, 102, 255, 1)',    
                    'rgba(255, 102, 255, 1)',   
                    'rgba(102, 255, 178, 1)'    
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'right',
                },
                tooltip: {
                    enabled: true
                }
            }
        }
    });
});
</script>

@endsection
