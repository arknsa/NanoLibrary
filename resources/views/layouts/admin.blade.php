<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title>NanoLib Admin Dashboard</title>
    <link rel="icon" href="{{ asset('assets1/img/logo.svg') }}" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                families: ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["{{ asset('assets/css/fonts.min.css') }}"],
            },
            active: function() {
                sessionStorage.fonts = true;
            },
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/kaiadmin.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <style>
        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
            transition: 0.2s;
        }

        .btn-sm {
            padding: 5px 10px;
            font-size: 0.9em;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, .05);
        }

        .img-thumbnail {
            border-radius: 10%;
            transition: transform 0.2s ease-in-out;
        }

        .img-thumbnail:hover {
            transform: scale(1.1);
        }

        th {
            text-transform: uppercase;
        }

        h2 {
            font-weight: bold;
            color: #343a40;
        }

        .table thead {
            font-weight: bold;
            letter-spacing: 0.05em;
        }

        .table-responsive {
            background-color: #ffffff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: none;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar" data-background-color="dark">
            <div class="sidebar-logo">
                <div class="logo-header" data-background-color="dark">
                    <a href="/adm" class="logo">
                        <img src="{{ asset('assets1/img/logo.svg') }}" alt="navbar brand" class="navbar-brand" height="20" />
                    </a>
                    <div class="nav-toggle">
                        <button class="btn btn-toggle toggle-sidebar">
                            <i class="gg-menu-right"></i>
                        </button>
                        <button class="btn btn-toggle sidenav-toggler">
                            <i class="gg-menu-left"></i>
                        </button>
                    </div>
                    <button class="topbar-toggler more">
                        <i class="gg-more-vertical-alt"></i>
                    </button>
                </div>
            </div>
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <ul class="nav nav-secondary">
                        <li class="nav-item">
                            <a href="/adm/">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-bs-toggle="collapse" href="#base">
                                <i class="fas fa-layer-group"></i>
                                <p>Data</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="base">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="{{ route('adm-buku.index') }}">
                                            <span class="sub-item">Data Buku</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('adm-mahasiswa.index') }}">
                                            <span class="sub-item">Data Mahasiswa</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarLayouts">
                                <i class="fas fa-th-list"></i>
                                <p>Layanan</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="sidebarLayouts">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="/adm/pemesanan">
                                            <span class="sub-item">Pemesanan</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/adm/peminjaman">
                                            <span class="sub-item">Peminjaman</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/adm/pengembalian">
                                            <span class="sub-item">Pengembalian</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <div class="logo-header" data-background-color="dark">
                        <a href="/adm" class="logo">
                            <img src="{{ asset('assets1/img/logo.svg') }}" alt="navbar brand" class="navbar-brand" height="20" />
                        </a>
                        <div class="nav-toggle">
                            <button class="btn btn-toggle toggle-sidebar">
                                <i class="gg-menu-right"></i>
                            </button>
                            <button class="btn btn-toggle sidenav-toggler">
                                <i class="gg-menu-left"></i>
                            </button>
                        </div>
                        <button class="topbar-toggler more">
                            <i class="gg-more-vertical-alt"></i>
                        </button>
                    </div>
                </div>

                <!-- Navbar Header -->
                <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
                    <div class="container-fluid">
                        <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                            <li class="nav-item topbar-user dropdown hidden-caret">
                                <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                                    <div class="avatar-sm">
                                        <img src="{{ asset('assets/img/profile.jpg') }}" alt="..." class="avatar-img rounded-circle" />
                                    </div>
                                    <span class="profile-username">
                                        <span class="op-7">Hi,</span>
                                        <span class="fw-bold">Admin</span>
                                    </span>
                                </a>
                                <ul class="dropdown-menu dropdown-user animated fadeIn">
                                    <div class="dropdown-user-scroll scrollbar-outer">
                                        <li>
                                            <div class="user-box">
                                                <div class="avatar-lg">
                                                    <img src="{{ asset('assets/img/profile.jpg') }}" alt="image profile" class="avatar-img rounded" />
                                                </div>
                                                <div class="u-text">
                                                    <h4>Admin</h4>
                                                    <p class="text-muted">hello@example.com</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <button type="submit" class="dropdown-item">Logout</button>
                                            </form>
                                        </li>
                                    </div>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>

            <!-- Main content -->
            <div>
                @yield('content')
            </div>
            <!-- End Main content -->

            <!-- Footer -->

            <footer class="footer">
                <div class="container-fluid d-flex justify-content-between">
                    <div class="copyright">
                        2024, NANO Library Created By Kelompok 8 Basis Data A1
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- JS Files -->
    <script src="{{ asset('assets/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/js/kaiadmin.min.js') }}"></script>
    <script>
        function initDataTable(tableId) {
            $(document).ready(function () {
                // Initialize DataTable for any table based on passed tableId
                var table = $('#' + tableId).DataTable({
                    "dom": 't<"bottom"ip>', // Removes the default search and length menu inside the table
                    "pageLength": 5, // Default number of rows to display
                    "lengthMenu": [
                        [5, 10, 25, 50, -1],
                        [5, 10, 25, 50, "All"]
                    ], // Options for entries per page
                    "language": {
                        "lengthMenu": "Tampilkan MENU data",
                        "info": "Menampilkan START sampai END dari TOTAL data",
                        "paginate": {
                            "first": "Pertama",
                            "last": "Terakhir",
                            "next": "Berikutnya",
                            "previous": "Sebelumnya"
                        }
                    },
                    "initComplete": function () {
                        // Move the pagination controls and search input into the same container
                        var paginate = $('#' + tableId).closest('.table-container').find('.dataTables_paginate');
                        var search = $('#' + tableId).closest('.table-container').find('.dataTables_filter');
                        var length = $('#' + tableId).closest('.table-container').find('.dataTables_length');
    
                        // Move pagination after length and search controls
                        length.parent().append(paginate);
                        length.parent().append(search);
                    }
                });
    
                // Link the external search input to DataTables' search function
                $('.dataTables_filter input').on('keyup', function () {
                    table.search(this.value).draw();
                });
    
                // Link the external "Show Entries" dropdown to DataTables' page length
                $('.dataTables_length select').on('change', function () {
                    table.page.len(this.value).draw();
                });
            });
        }
    </script>
</body>

</html>