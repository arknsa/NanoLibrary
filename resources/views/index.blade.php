<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Nano Library</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Favicon -->
    <link href="{{ asset('assets1/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Ubuntu:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets1/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets1/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets1/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets1/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <div class="container-fluid sticky-top bg-primary" style="z-index: 1030;">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light p-0">
                <a href="/" class="navbar-brand">
                    <img src="{{ asset('assets1/img/logo.svg') }}" alt="Logo" style="height: 30px;">
                </a>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="/" class="nav-item nav-link text-white">Beranda</a>
                        <a href="/mhs-profil" class="nav-item nav-link text-white">Tentang Kami</a>

                        <!-- Dropdown Layanan -->
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle text-white" data-bs-toggle="dropdown">Layanan</a>
                            <div class="dropdown-menu bg-light mt-2">
                                <a href="/mhs-peminjaman" class="dropdown-item">Peminjaman Buku</a>
                                <a href="/mhs-ebook" class="dropdown-item">E-Book</a>
                                <a href="https://e-journal.unair.ac.id/JATM" class="dropdown-item">E-Journal</a>
                            </div>
                        </div>

                        <!-- Dropdown Status -->
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle text-white" data-bs-toggle="dropdown">Status</a>
                            <div class="dropdown-menu bg-light mt-2">
                                <a href="/mhs-riwayat_peminjaman" class="dropdown-item">Riwayat Peminjaman</a>
                                <a href="/mhs-riwayat_pengembalian" class="dropdown-item">Riwayat Pengembalian</a>
                            </div>
                        </div>

                        <a href="/login " class="nav-item nav-link">
                            <button type="button" class="btn text-white p-0 d-none d-lg-block">
                                <i class="fa fa-user"></i>
                            </button>
                        </a>
                        <a href="#" class="nav-item nav-link">
                            <button type="button" class="btn text-white p-0 d-none d-lg-block" data-bs-toggle="modal" data-bs-target="#searchModal">
                                <i class="fa fa-search"></i>
                            </button>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>


    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(20, 24, 62, 0.7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn btn-square bg-white btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-light p-3"
                            placeholder="Type search keyword">
                        <button class="btn btn-light px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->

    <!-- Navbar End -->
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



    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(20, 24, 62, 0.7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn btn-square bg-white btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-light p-3"
                            placeholder="Type search keyword">
                        <button class="btn btn-light px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->


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
                                    <h2 class="text-light mb-0" data-toggle="counter-up">60</h2>
                                    <p class="text-light mb-0">Kapasitas</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex rounded p-3 bg-dark">
                                <i class="fa fa-check fa-3x text-light"></i>
                                <div class="ms-3">
                                    <h2 class="text-light mb-0" data-toggle="counter-up">55</h2>
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

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                    <a href="index.html" class="d-inline-block mb-3">
                        <img src="{{ asset('assets1/img/logo.svg') }}" alt="Logo" style="height: 30px;">
                    </a>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href="http://twitter.com/ftmmunair"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href="https://www.youtube.com/@ftmmunair"><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href="https://www.instagram.com/ftmmunair/"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-outline-light btn-social" href="https://www.linkedin.com/in/ftmm-universitas-airlangga-8161ab207"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                    <h5 class="text-white mb-4">Hubungi kami</h5>
                    <p><i class="fa fa-map-marker-alt me-3"></i>Gedung Nano, Kampus C UNAIR kota Surabaya</p>
                    <p><i class="fa fa-phone-alt me-3"></i>+62881-0360-00830</p>
                    <p><i class="fa fa-envelope me-3"></i>info@ftmm.unair.ac.id</p>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.7s">
                    <h5 class="text-white mb-4">Layanan Kami</h5>
                    <a class="btn btn-link" href="/mhs-profil">Ruang Baca</a>
                    <a class="btn btn-link" href="/mhs-peminjaman">Peminjaman Buku</a>
                    <a class="btn btn-link" href="/mhs-ebook">E-Book</a>
                    <a class="btn btn-link" href="https://e-journal.unair.ac.id/JATM">E-Journal</a>
                </div>
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <img class="align-center" src="{{ asset('assets1/img/footer@300x.png') }}" alt="img-fluid" width="100%">
                </div>
            </div>

        </div>
        <div class="container wow fadeIn" data-wow-delay="0.1s">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a href="#">NANO Library
                            Created By Kelompok 8 Basis Data A1</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top pt-2"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('assets1/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('assets1/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('assets1/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('assets1/lib/counterup/counterup.min.js')}}"></script>
    <script src="{{asset('assets1/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <!-- Template Javascript -->
    <script src="{{asset('assets1/js/main.js')}}"></script>
</body>

</html>