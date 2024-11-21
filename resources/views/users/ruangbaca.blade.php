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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.4/html5-qrcode.min.js"
        integrity="sha512-k/KAe4Yff9EUdYI5/IAHlwUswqeipP+Cp5qnrsUjTPCgl51La2/JhyyjNciztD7mWNKLSXci48m7cctATKfLlQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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

        #reader {
            width: 100%;
            max-width: 600px;
        }
    </style>
</head>

<body>
    <!-- Form Start -->
    <div class="container-fluid pt-2">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif


        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="container pt-3">
            <div class="row g-5 pt-5">
                <div class="col-lg-6 align-self-center text-center text-md-end fadeIn" data-wow-delay="0.5s">
                    <img class="img-fluid animated slideInRight" src="{{ asset('assets1/img/ftmm.png') }}" alt="">
                </div>
                <div class="col-lg-6 align-self-center text-left">

                    <!-- Login Form -->
                    <div class="login-form">
                        <h2>Akses Ruang Baca</h2>
                        <span>Scan/Input NIM untuk akses keluar masuk</span>
                        <main class="flex flex-col items-center">
                            <div id="reader" class="border border-gray-300 rounded-lg shadow-lg mb-4"></div>
                            <div id="result" class="text-center text-sm font-semibold"></div>
                        </main>
                        <form id="entryForm" action="{{ route('reading-room.entry') }}" method="POST">
                            @csrf
                            <div class="form-group mt-3">
                                <input type="text" name="nim" id="nimInput" class="form-control" placeholder="NIM" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 py-2 mt-3">Proses</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Login Form End -->
    <div class="container mt-5">
        <h2>Pengguna Ruang Baca</h2>
        <table class="table">
            <thead class="border-b border-gray-200 bg-gray-100 p-4">
                <tr>
                    <th class="px-4 py-2 text-center">NIM</th>
                    <th class="px-4 py-2 text-center">Nama</th>
                    <th class="px-4 py-2 text-center">Waktu Masuk</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($activeUsers as $activeUser)
                <tr>
                    <td class="px-4 py-2 text-center">{{ $activeUser->user->NIM }}</td>
                    <td class="px-4 py-2 text-center">{{ $activeUser->user->Nama }}</td>
                    <td class="px-4 py-2 text-center">{{ $activeUser->entry_time }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

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
                    <a class="btn btn-link" href="/ruangbaca">Ruang Baca</a>
                    <a class="btn btn-link" href="/mhs/layananbuku">Peminjaman Buku</a>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('assets1/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets1/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets1/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets1/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('assets1/js/main.js') }}"></script>

    <!-- QR Code Scanner Script -->
    <script>
        const scanner = new Html5QrcodeScanner('reader', {
            qrbox: {
                width: 250,
                height: 250,
            },
            fps: 20,
        });

        // Function to handle QR code scan result
        function handleScan(result) {
            // Fill the NIM input with the scanned result
            document.querySelector('input[name="nim"]').value = result; 
            document.getElementById('result').innerHTML = `
                <h2 class="text-green-600">QR Code Scanned Successfully!</h2>
                <p class="text-blue-500">NIM: ${result}</p>
            `;
            // Automatically submit the form
            document.getElementById('entryForm').submit();
        }

        // Error handling for the QR code scanner
        function handleError(err) {
            console.error(err);
            // Optionally, show an error message to the user
            document.getElementById('result').innerHTML = `
                <h2 class="text-red-600">Scanning Error!</h2>
                <p class="text-red-500">Error: ${err.message}</p>
            `;
        }

        // Start scanning
        scanner.render(handleScan, handleError);
    </script>
</body>

</html>