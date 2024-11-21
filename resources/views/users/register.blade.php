<!-- resources/views/auth/register.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Registrasi Mahasiswa - Nano Library</title>
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

    <!-- Custom CSS -->
    <style>
        /* Custom styles for the registration form */
        .registration-form {
            max-width: 500px;
            margin: 0 auto;
        }

        .registration-form .form-control {
            border-radius: 0.5rem;
            padding: 1rem;
        }

        .registration-form label {
            margin-bottom: 0.5rem;
        }

        .registration-form .btn-primary {
            background-color: #1E90FF;
            border-color: #1E90FF;
        }

        .registration-form .btn-primary:hover {
            background-color: #006ad5;
            border-color: #006ad5;
        }
    </style>
</head>

<body>
    <!-- Registration Form Start -->
    <div class="container-fluid pt-2 mb-5">
        <div class="container pt-3">
            <div class="row g-5 pt-5">
                <div class="col-lg-6 align-self-center text-center text-md-end fadeIn" data-wow-delay="0.5s">
                    <img class="img-fluid animated slideInRight" src="{{ asset('assets1/img/ftmm.png') }}" alt="">
                </div>
                <div class="col-lg-6 align-self-center text-left">
                    <div class="registration-form">
                        <h2 class="text-center mb-5">Daftar Akun</h2>

                        <!-- Display Success Message -->
                        @if(session('registration_success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('registration_success') }}
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

                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <!-- Nama Lengkap -->
                            <div class="mb-3">
                                <label for="Nama" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="Nama" name="Nama" placeholder="Nama Lengkap" value="{{ old('Nama') }}" required>
                            </div>
                            <!-- NIM -->
                            <div class="mb-3">
                                <label for="NIM" class="form-label">NIM</label>
                                <input type="text" class="form-control" id="NIM" name="NIM" placeholder="16xxxxxxx" value="{{ old('NIM') }}" required>
                            </div>
                            <!-- Nomor Telepon -->
                            <div class="mb-3">
                                <label for="No_Telp" class="form-label">Nomor Telepon</label>
                                <input type="text" class="form-control" id="No_Telp" name="No_Telp" placeholder="08xxxxxxxxxx (9-13 angka)" value="{{ old('No_Telp') }}" required>
                            </div>
                            <!-- Email -->
                            <div class="mb-3">
                                <label for="Email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="Email" name="Email" placeholder="Nama.Lengkap-angkatan@ftmm.unair.ac.id" value="{{ old('Email') }}" required>
                            </div>
                            <!-- Password -->
                            <div class="mb-3">
                                <label for="Password" class="form-label">Kata Sandi</label>
                                <input type="password" class="form-control" id="Password" name="Password" placeholder="Minimal 8 karakter" required>
                            </div>
                            <!-- Konfirmasi Password -->
                            <div class="mb-4">
                                <label for="Password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
                                <input type="password" class="form-control" id="Password_confirmation" name="Password_confirmation" placeholder="Tulis Ulang Kata Sandi" required>
                            </div>
                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary w-100 py-2">Daftar</button>
                        </form>
                        <p class="mt-3 text-center">
                            Sudah punya akun? <a href="{{ route('login') }}" class="text-primary">Masuk</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Registration Form End -->

    <!-- Success Registration Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="successModalLabel">Registrasi Berhasil</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Registrasi berhasil! Silakan login untuk melanjutkan.</p>
          </div>
          <div class="modal-footer">
            <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer Start -->
    <!-- ... your existing footer code ... -->
    <!-- Footer End -->

    <!-- Back to Top -->
    <!-- ... your existing back to top button ... -->

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

    <!-- Trigger the Modal if Success -->
    <!-- Include your existing scripts -->
<!-- ... existing scripts ... -->

<!-- Script to auto-hide the success alert after 3 seconds -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Select the success alert element
            let alert = document.querySelector('.alert-success');
            if (alert) {
                // Hide the alert after 3 seconds (3000 milliseconds)
                setTimeout(function() {
                    // Use Bootstrap's alert 'close' method
                    let alertInstance = bootstrap.Alert.getOrCreateInstance(alert);
                    alertInstance.close();
                }, 3000);
            }
        });
    </script>

</body>

</html>
