@extends('layouts.app')

@section('content')

<!-- Hero Start -->
<div class="container-fluid pt-5 bg-primary hero-header mb-0">
    <div class="container pt-5">
        <div class="row g-5">
            <div class="col-lg-6 align-self-center mb-md-5 pb-md-5 wow fadeIn" data-wow-delay="0.3s">
                <h1 class="text-light mb-4" style="text-align: justify;">Nanolib</h1>
                <p class="text-light mb-4" style="text-align: justify;">Nanolib adalah ruang baca di Gedung Nano Kampus C Universitas Airlangga yang menyediakan berbagai literatur tentang teknologi dan multidisiplin. Kami siap mendukung kebutuhan belajarmu, baik lewat buku fisik, skripsi, bahkan e-journal dari Fakultas Teknologi Maju dan Multidisplin.</p>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <h6 class="text-light mb-3"><i class="fa fa-check text-light me-2"></i>Fasilitas Lengkap</h6>
                        <h6 class="text-light mb-0"><i class="fa fa-check text-light me-2"></i>Koleksi Skripsi</h6>
                    </div>
                    <div class="col-sm-6">
                        <h6 class="text-light mb-3"><i class="fa fa-check text-light me-2"></i>Koleksi Buku</h6>
                        <h6 class="text-light mb-0"><i class="fa fa-check text-light me-2"></i>Koleksi Proposal</h6>
                    </div>
                </div>
                <div class="row g-4 pt-3">
                    <div class="d-flex align-items-center mt-4">
                        <a class="btn btn-outline-light btn-square me-3" href="http://twitter.com/ftmmunair"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-square me-3" href="https://www.youtube.com/@ftmmunair"><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-square me-3" href="https://www.instagram.com/ftmmunair/"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-outline-light btn-square me-3" href="https://www.linkedin.com/in/ftmm-universitas-airlangga-8161ab207"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 align-self-center text-center text-md-end wow fadeIn" data-wow-delay="0.5s">
                <img class="img-fluid" src="{{asset('assets1/img/ftmm.png')}}" alt="">
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->

<!-- Team Start -->
<div class="container-fluid bg-light py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-12 text-center wow fadeIn" data-wow-delay="0.1s">
                <h1 class="mb-4">Kenalan Dengan Pengembang Website Nanolib</h1>
                <p class="mb-4">Mahasiswa Semester 5 Teknologi Sains Data Kelas Basis Data A1</p>
            </div>
        </div>

        <div class="row g-4 text-center">
            <div class="col-lg-3 col-md-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="team-item bg-white rounded p-4 pt-0">
                    <img class="img-fluid rounded-circle p-4" src="{{asset('assets1/img/team-4.jpg')}}" alt="">
                    <h5 class="mb-0">Jihan Ashifa Hakim</h5>
                    <small>164221016</small>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeIn" data-wow-delay="0.3s">
                <div class="team-item bg-white rounded p-4 pt-0">
                    <img class="img-fluid rounded-circle p-4" src="{{asset('assets1/img/team-2.jpg')}}" alt="">
                    <h5 class="mb-0">Yusuf Eka Maulana</h5>
                    <small>164221020</small>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="team-item bg-white rounded p-4 pt-0">
                    <img class="img-fluid rounded-circle p-4" src="{{asset('assets1/img/team-3.jpg')}}" alt="">
                    <h5 class="mb-0">Amalika Ari Anindya</h5>
                    <small>164221029</small>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeIn" data-wow-delay="0.7s">
                <div class="team-item bg-white rounded p-4 pt-0">
                    <img class="img-fluid rounded-circle p-4" src="{{asset('assets1/img/team-1.jpg')}}" alt="">
                    <h5 class="mb-0">Arkan Syafiq Attaqy</h5>
                    <small>164221062</small>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team End -->



@endsection