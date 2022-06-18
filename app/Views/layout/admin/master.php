<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon -->
    <link rel="shortcut icon" href="/img/logo/lampung-timur.png" type="image/x-icon">
    <link rel="icon" href="/img/logo/lampung-timur.png" type="image/x-icon">

    <title><?= $title ?></title>

    <!-- Custom fonts for this template-->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/css/admin/sb-admin-2.min.css" rel="stylesheet">

    <!-- My CSS -->
    <link rel="stylesheet" href="/css/admin/style.css">

    <!-- Custom styles for this page -->
    <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Summernote -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

    <!-- Leaflet JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />

    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('/admin/dashboard') ?>">
                <!-- <img src="/img/logo/lampung-timur.png" alt="" width="40"> -->
                <i class="fas fa-user-cog"></i>
                <div class="sidebar-brand-text mx-3">Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item -->
            <li class="nav-item <?= $uri === 'dashboard' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('/admin/dashboard') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item <?= $uri === 'tentang-aplikasi' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('/admin/tentang-aplikasi') ?>">
                    <i class="fas fa-address-card"></i>
                    <span>Tentang Aplikasi</span></a>
            </li>

            <li class="nav-item <?= $uri === 'map-settings' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('/admin/map-settings') ?>">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Map Settings</span></a>
            </li>

            <li class="nav-item <?= $uri === 'administrator' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('/admin/administrator') ?>">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Administrator</span></a>
            </li>

            <li class="nav-item <?= $uri === 'menu-manager' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('/admin/menu-manager') ?>">
                    <i class="fas fa-fw fa-copy"></i>
                    <span>Menu Manager</span></a>
            </li>

            <li class="nav-item <?= $uri === 'settings' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('/admin/settings') ?>">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Settings</span></a>
            </li>

            <li class="nav-item <?= $uri === 'popup-manager' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('/admin/popup-manager') ?>">
                    <i class="fas fa-fw fa-copy"></i>
                    <span>Popup Manager</span></a>
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
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <h3 class="text-dark">Peta Potensi Daerah Lampung Timur</h3>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle text-dark" href="<?= base_url('/admin/guestbooks') ?>">
                                <i class="fas fa-envelope"></i>
                                <!-- Counter - Messages -->
                                <div class="ml-1">Guestbooks</div>
                                <span class="badge badge-counter <?= $count == 0 ? 'badge-secondary' : 'badge-danger' ?>"><?= $count ?></span>
                            </a>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <li class="nav-item">
                            <a class="nav-link" href="index.html">
                                <span class="text-dark">Logout</span>
                                <i class="fa fa-sign-out-alt text-dark ml-2"></i>
                            </a>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->


                <!-- Page Heading -->
                <?= $this->renderSection('content') ?>


            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Cinda Logika Grafia</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/js/demo/datatables-demo.js"></script>

    <!-- Summernote -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $('#summernote').summernote({
            tabsize: 2,
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                // ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>

    <script>
        function previewImg() {
            const photo = document.querySelector('#photo');
            const imgPreview = document.querySelector('.img-preview');

            const filePhoto = new FileReader();
            filePhoto.readAsDataURL(photo.files[0]);

            filePhoto.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>

</body>

</html>