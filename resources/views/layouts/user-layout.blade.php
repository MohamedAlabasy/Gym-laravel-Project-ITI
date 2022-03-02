<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="{{ \URL::to('/') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
    <title>Gym System</title>
</head>
<style>
.fa,
.fas,
.fa {
    font-size: .9rem !important;
}

body {
    position: relative;
}

.dataTables_wrapper .dataTables_length {
    margin-left: 20px !important;
    margin-top: 10px !important;
}

.dataTables_wrapper .dataTables_filter,
.dataTables_wrapper .dataTables_info,
.dataTables_wrapper .dataTables_paginate {
    margin: 10px 20px !important;
}

@media (min-width: 768px) {

    body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .content-wrapper,
    body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .main-footer,
    body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .main-header {
        margin-left: 200px;
    }
}
</style>

<body>
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="imgs/gym-icon.png" alt="GymSystemLogo" height="150" width="150">
    </div>
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="font-size: 14px;">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="index3.html" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li>
                <a href="{{route('user.admin_profile')}}">
                    <div class="media align-items-center">
                        <img src="imgs/avatar.png" alt="User Avatar" class="mr-2 mt-1 img-size-32 img-circle mr-2">
                        <div class="media-body">
                          <h6 class="dropdown-item-title text-dark" style="font-size: 14px">
                            Admin
                          </h6>
                        </div>
                      </div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4" style="font-size: 14px;width: 200px;">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link px-2">
            <span class="brand-text font-weight-light px-4">Gym System</span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="imgs/avatar.png" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="{{route('user.admin_profile')}}" class="d-block">Admin</a>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>City Managers <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="pages/examples/profile.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>All City Managers</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/invoice.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add new</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-tree"></i>
                            <p>
                                Gym Managers
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="pages/examples/profile.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>All Managers</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/invoice.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add new</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                Users
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="pages/examples/profile.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>All Users</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/invoice.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add new</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            <p>
                                Coaches
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="pages/examples/profile.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>All Coaches</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/invoice.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add new</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-calendar-alt"></i>
                            <p>
                                Gyms
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/gym/create" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add Gym</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/gym/list" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>List Gyms</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="pages/gallery.html" class="nav-link">
                            <i class="nav-icon far fa-image"></i>
                            <p>
                                Training Packages
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="pages/examples/invoice.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Invoice</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/profile.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Profile</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/e-commerce.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>E-commerce</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/projects.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Projects</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/project-add.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Project Add</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="pages/kanban.html" class="nav-link">
                            <i class="nav-icon fas fa-columns"></i>
                            <p>
                                Training Session
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="pages/examples/invoice.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>All Sessions</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('gym.training_session')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Create Session</p>
                                </a>
                            </li>
                          
                          
                          
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-envelope"></i>
                            <p>
                                Coaches
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="pages/examples/invoice.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Invoice</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/profile.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Profile</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/e-commerce.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>E-commerce</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/projects.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Projects</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/project-add.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Project Add</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Attendance
                            </p>
                            <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="pages/mailbox/mailbox.html" class="nav-link">
                                    <p>Inbox</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/mailbox/compose.html" class="nav-link">
                                    <p>Compose</p>
                                </a>

                            </li>
                            <li class="nav-item">
                                <a href="pages/mailbox/read-mail.html" class="nav-link">
                                    <p>Read</p>
                                </a>
                            </li>
                        </ul>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-plus-square"></i>
                            <p>
                                Buy Package
                            </p>
                            <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="pages/mailbox/mailbox.html" class="nav-link">
                                    <p>Inbox</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/mailbox/compose.html" class="nav-link">
                                    <p>Compose</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/mailbox/read-mail.html" class="nav-link">
                                    <p>Read</p>
                                </a>
                            </li>
                        </ul>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-plus-square"></i>
                            <p>
                                Revenue
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="pages/examples/invoice.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Invoice</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/profile.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Profile</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/e-commerce.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>E-commerce</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/projects.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Projects</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/project-add.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Project Add</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    @yield('content')

    <div id="sidebar-overlay"></div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 3.2.0
        </div>
        <strong>Copyright &copy; 2021-2022 <a href="https://adminlte.io">Gym Ststem</a>.</strong> All rights reserved.
    </footer>
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="plugins/sparklines/sparkline.js"></script>
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <script src="dist/js/adminlte.js"></script>
    <script src="dist/js/demo.js"></script>
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../../plugins/jszip/jszip.min.js"></script>
    <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script>
    $(function() {
        $("#proj").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#proj_wrapper .col-md-6:eq(0)');
    });
    </script>
</body>

</html>
