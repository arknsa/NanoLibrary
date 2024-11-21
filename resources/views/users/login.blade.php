<!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login - Nano Library</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="{{ asset('assets1/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <!-- Include any other fonts you need -->

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets1/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets1/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets1/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets1/css/style.css') }}" rel="stylesheet">

    <!-- Custom CSS for the login form -->
    <style>
        .login-form {
            max-width: 500px;
            margin: 0 auto;
        }

        .login-form .form-control {
            border-radius: 0.5rem;
            padding: 1rem;
        }

        .login-form label {
            margin-bottom: 0.5rem;
        }

        .login-form .btn-primary {
            background-color: #741B47;
            border-color: #741B47;
        }

        .login-form .btn-primary:hover {
            background-color: #5e1536;
            border-color: #5e1536;
        }
    </style>
</head>

<body>
    <!-- Login Form Start -->
    <div class="container-fluid pt-2">
        <div class="container pt-3">
            <div class="row g-5 pt-5">
                <div class="col-lg-6 align-self-center text-center text-md-end fadeIn" data-wow-delay="0.5s">
                    <img class="img-fluid animated slideInRight" src="{{ asset('assets1/img/ftmm.png') }}" alt="">
                </div>
                <div class="col-lg-6 align-self-center text-left">
                    <div class="login-form">
                        <h2 class="text-center mb-5">Login</h2>

                        <!-- Display Success Message -->
                        @if(session('login_success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('login_success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <!-- Display Validation Errors -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <!-- Email -->
                            <div class="mb-3">
                                <label for="Email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="Email" name="Email" placeholder="Email-20xx@ftmm.unair.ac.id"
                                    value="{{ old('Email') }}" required autofocus>
                            </div>
                            <!-- Password -->
                            <div class="mb-4">
                                <label for="Password" class="form-label">Kata Sandi</label>
                                <input type="password" class="form-control" id="Password" name="Password" placeholder="Minimal 8 Karakter"
                                    required>
                            </div>
                            <!-- Remember Me -->
                            <div class="mb-4 form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Ingat Saya</label>
                            </div>
                            <!-- Submit Button -->
                            <button type="submit" class="btn w-100 py-2" style="background-color: #1E90FF; color: white;">Masuk</button>
                        </form>
                        <p class="mt-3 text-center">
                            Belum punya akun? <a href="/register" class="text-primary">Daftar</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Form End -->
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


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="{{ asset('assets1/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets1/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets1/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets1/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('assets1/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets1/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('assets1/js/main.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Check if login was successful
            @if(session('login_success'))
                // Get the redirect URL from the session
                var redirectTo = "{{ session('redirect_to') }}";

                // Set a timeout to hide the alert and redirect after 3 seconds
                setTimeout(function() {
                    // Hide the alert using Bootstrap's alert component
                    var alertElement = document.querySelector('.alert-success');
                    if (alertElement) {
                        var alertInstance = bootstrap.Alert.getOrCreateInstance(alertElement);
                        alertInstance.close();
                    }

                    // Redirect to the intended page
                    window.location.href = redirectTo;
                }, 3000);
            @endif
        });
    </script>
</body>

</html>