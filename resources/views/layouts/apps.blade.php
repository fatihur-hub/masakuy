<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> {{ config('app.name') }}</title>
<link rel="shortcut icon" href="{{asset('icon/icon-hitam.png')}}" type="image/x-icon">
    <!-- Custom fonts for this template -->
    <link href="{{ asset('ADMIN/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- include libraries(jQuery, bootstrap) -->
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('ADMIN/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/css/jquery-editable.css" rel="stylesheet"/>
    <link href="{{ 'ADMIN/vendor/datatables/dataTables.bootstrap4.min.css' }}" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{'/'}}">
                <div class="sidebar-brand-icon ">
                    <img src="{{asset('icon/icon-putih.png')}}" style="height: 50px; width:50px;" alt="">
                </div>
                <div class="sidebar-brand-text mx-3">{{config('app.name')}}</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Data
            </div>

            <!-- Nav Item - Pages Collapse Menu -->


            <!-- Nav Item - Tables -->
            @if (Auth::check() &&Auth::user()->role == 'admin')
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('admin/users') }}">
                        <i class="fas fa-fw fa-user"></i>
                        <span>User</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('admin/kategori') }}">
                        <i class="fas fa-fw fa-bars"></i>
                        <span>Kategori</span></a>
                </li>
            @endif
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('admin/resep') }}">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Resep</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('admin/artikel') }}">
                    <i class="fas fa-fw fa-clone"></i>
                    <span>Artikel</span></a>
            </li>



            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::check() && Auth::user()->name }}</span>

                            </a>


                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf

                                    <button type="submit" class="dropdown-item"
                                        onclick="return confirm('Apakah Anda yakin ingin Log Out?')">Logout</button>
                                </form>
                                <!-- Dropdown - User Information -->

                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->


    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('ADMIN/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('ADMIN/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('ADMIN/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('ADMIN/js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('ADMIN/js/tinymce.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('ADMIN/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('ADMIN/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/js/jquery-editable-poshytip.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="{{ asset('ADMIN/js/demo/datatables-demo.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <!-- Initialize Quill editor -->

    <script>
        var quill = new Quill('#quill_editor', {
            theme: 'snow'
        });
        quill.on('text-change', function(delta, oldDelta, source) {
            document.getElementById("quill_html").value = quill.root.innerHTML;
        });
    </script>
     <script>
        var quill = new Quill('#quill_editor1', {
            theme: 'snow'
        });
        quill.on('text-change', function(delta, oldDelta, source) {
            document.getElementById("quill_html1").value = quill.root.innerHTML;
        });
    </script>
    
</body>

</html>
