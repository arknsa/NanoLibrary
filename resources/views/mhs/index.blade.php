@extends('layouts.app')

@section('content')
<!-- Hero Start -->
<div class="container-fluid mb-5 p-0">
    <div class="carousel relative" x-data="{ currentSlide: 0 }" x-init="setInterval(() => { currentSlide = (currentSlide === 3) ? 0 : currentSlide + 1 }, 3000)">
        <div class="carousel-images">
            <!-- Slide 1 -->
            <div x-show="currentSlide === 0" class="relative w-full h-screen bg-cover bg-center" style="background-image: url('{{ asset('assets1/img/header1.png') }}');">
                <div class="absolute inset-0 bg-opacity-50 bg-black"></div>
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center">
                    <h1 class="text-6xl font-bold text-white mb-4">Selamat Datang di Nanolib, Perpustakaan Gedung Nano FTMM!</h1>
                    <p class="text-white mb-4">Di sini, kamu bisa menemukan berbagai referensi yang mendukung studimu di Fakultas Teknologi Maju dan Multidisiplin. Akses buku fisik, e-book, jurnal, hingga skripsi, semua dalam satu platform yang mudah diakses.</p>
                </div>
            </div>
            <!-- Slide 2 -->
            <div x-show="currentSlide === 1" class="relative w-full h-screen bg-cover bg-center" style="background-image: url('{{ asset('assets1/img/header2.png') }}');">
                <div class="absolute inset-0 bg-opacity-50 bg-black"></div>
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center">
                    <h1 class="text-6xl font-bold text-white mb-4">Selamat Datang di Nanolib, Perpustakaan Gedung Nano FTMM!</h1>
                    <p class="text-white mb-4">Di sini, kamu bisa menemukan berbagai referensi yang mendukung studimu di Fakultas Teknologi Maju dan Multidisiplin. Akses buku fisik, e-book, jurnal, hingga skripsi, semua dalam satu platform yang mudah diakses.</p>
                </div>
            </div>
            <!-- Slide 3 -->
            <div x-show="currentSlide === 2" class="relative w-full h-screen bg-cover bg-center" style="background-image: url('{{ asset('assets1/img/header3.png') }}');">
                <div class="absolute inset-0 bg-opacity-50 bg-black"></div>
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center">
                    <h1 class="text-6xl font-bold text-white mb-4">Selamat Datang di Nanolib, Perpustakaan Gedung Nano FTMM!</h1>
                    <p class="text-white mb-4">Di sini, kamu bisa menemukan berbagai referensi yang mendukung studimu di Fakultas Teknologi Maju dan Multidisiplin. Akses buku fisik, e-book, jurnal, hingga skripsi, semua dalam satu platform yang mudah diakses.</p>
                </div>
            </div>
            <!-- Slide 4 -->
            <div x-show="currentSlide === 3" class="relative w-full h-screen bg-cover bg-center" style="background-image: url('{{ asset('assets1/img/header4.png') }}');">
                <div class="absolute inset-0 bg-opacity-50 bg-black"></div>
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center">
                    <h1 class="text-6xl font-bold text-white mb-4">Selamat Datang di Nanolib, Perpustakaan Gedung Nano FTMM!</h1>
                    <p class="text-white mb-4">Di sini, kamu bisa menemukan berbagai referensi yang mendukung studimu di Fakultas Teknologi Maju dan Multidisiplin. Akses buku fisik, e-book, jurnal, hingga skripsi, semua dalam satu platform yang mudah diakses.</p>
                </div>
            </div>
        </div>
        <!-- Carousel controls -->
        <button @click="currentSlide = (currentSlide === 0) ? 2 : currentSlide - 1" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-white text-black p-3 rounded-full">
            &#10094;
        </button>
        <button @click="currentSlide = (currentSlide === 2) ? 0 : currentSlide + 1" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-white text-black p-3 rounded-full">
            &#10095;
        </button>
    </div>
</div>
<!-- Hero End -->

<!-- About Start -->
<div class="container-fluid mt-5 pt-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5 align-self-end text-center text-md-end wow fadeIn" data-wow-delay="0.5s">
                <div class="carousel relative" x-data="{ currentSlide: 0 }" x-init="setInterval(() => { currentSlide = (currentSlide === 2) ? 0 : currentSlide + 1 }, 5000)">
                    <div class="carousel-images">
                        <!-- Slide 1 -->
                        <div x-show="currentSlide === 0" class="relative w-96 h-96 bg-cover bg-center rounded-lg overflow-hidden" style="background-image: url('{{ asset('assets1/img/hero1.png') }}');">
                            <div class="absolute inset-0 bg-opacity-50 bg-black"></div>
                            <div class="absolute bottom-0 left-0 p-6">
                            </div>
                        </div>
                        <!-- Slide 2 -->
                        <div x-show="currentSlide === 1" class="relative w-96 h-96 bg-cover bg-center rounded-lg overflow-hidden" style="background-image: url('{{ asset('assets1/img/hero2.png') }}');">
                            <div class="absolute inset-0 bg-opacity-50 bg-black"></div>
                            <div class="absolute bottom-0 left-0 p-6">
                            </div>
                        </div>
                        <!-- Slide 3 -->
                        <div x-show="currentSlide === 2" class="relative w-96 h-96 bg-cover bg-center rounded-lg overflow-hidden" style="background-image: url('{{ asset('assets1/img/hero3.png') }}');">
                            <div class="absolute inset-0 bg-opacity-50 bg-black"></div>
                            <div class="absolute bottom-0 left-0 p-6">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 wow fadeIn" data-wow-delay="0.5s">
                <h1 class="mb-4" style="text-align: left;">Buat pengalaman belajarmu lebih nyaman dengan check-in pakai QR code</h1>
                <p class="mb-4" style="text-align: left;">Cek ketersediaan tempat secara real-time, jadi kamu bisa memastikan ruang baca yang pas sebelum datang</p>
                <div class="row g-4 pt-3">
                    <div class="col-sm-6">
                        <div class="d-flex rounded p-3 bg-dark">
                            <i class="fa fa-users fa-3x text-light"></i>
                            <div class="ms-3">
                                <h2 class="text-light mb-0" data-toggle="counter-up">{{ $capacity }}</h2>
                                <p class="text-light mb-0">Kapasitas</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex rounded p-3 bg-dark">
                            <i class="fa fa-check fa-3x text-light"></i>
                            <div class="ms-3">
                                <h2 class="text-light mb-0" data-toggle="counter-up">{{ $occupied }}</h2>
                                <p class="text-light mb-0">Terisi</p>
                            </div>
                        </div>
                    </div>
                                      
                </div>
            </div>
        </div>
        <div class="row mb-5"><br></div>
    </div>
</div>
<!-- About End -->

<!-- Guide Section Start -->
<div class="container-fluid mt-5 pt-5">
    <div class="container text-center d-flex flex-column align-items-center">
        <img src="https://github.com/arknsa/NanoLib-FTMM/blob/main/img/book/panduan_peminjaman.png?raw=true" alt="Panduan Peminjaman" class="img-fluid rounded" style="max-width: 80%; height: auto;">
        <div class="row mb-5"><br></div>
    </div>
</div>
<!-- Guide Section End -->


@endsection
