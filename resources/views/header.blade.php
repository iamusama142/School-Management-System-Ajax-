<!DOCTYPE html>
<html lang="en">


<!-- index  21 Nov 2019 03:44:50 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Admin Dashboard</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('Res/assets/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Res/assets/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('Res/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Res/assets/bundles/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet"
        href="{{ asset('Res/assets/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Res/assets/bundles/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Res/assets/bundles/jquery-selectric/selectric.css') }}">
    <link rel="stylesheet"
        href="{{ asset('Res/assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Res/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('Res/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('Res/assets/css/components.css') }}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset('Res/assets/css/custom.css') }}">
    <link rel='shortcut icon' type='image/x-icon' href="{{ asset('Res/assets/img/favicon.ico') }}" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar sticky">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i
                                    data-feather="align-justify"></i></a></li>
                    </ul>
                </div>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image"
                                src="{{ asset('Res/assets/img/user.png') }}" class="user-img-radious-style"> <span
                                class="d-sm-none d-lg-inline-block"></span></a>
                        <div class="dropdown-menu dropdown-menu-right pullDown">
                            <a href="profile" class="dropdown-item has-icon"> <i class="far
										fa-user"></i>
                                Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="auth-login" class="dropdown-item has-icon text-danger"> <i
                                    class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <i class="
                        fas fa-book-reader text-dark mt-3"
                            style="font-size: 30px; color: rgb(68, 0, 255);"></i>
                        <h3 class="logo-name text-dark font-weight-bold" style="font-size: 15px;
                    ">Bismillah Future Sheen School Shahpur</h3>

                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Main</li>
                        <li class="dropdown active">
                            <a href="index" class="nav-link"><i data-feather="monitor"></i><span>Index</span></a>
                        </li>
                        <li class="dropdown">
                            <a href="/student-class" class="nav-link"><i
                                    class="fas fa-address-book"></i><span>Class</span></a>
                        </li>
                        <li class="dropdown">
                            <a href="/student-section" class="nav-link"><i
                                    class="fas fa-server"></i><span>Section</span></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    class="fas fa-user-graduate"></i><span>Student </span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="/student-form">Add Student</a></li>
                                <li><a class="nav-link" href="/student-datatable">Manage Students</a></li>
                                <li><a class="nav-link" href="/student-deactive-data">Manage De Active
                                        Students</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    class="fas fa-chalkboard-teacher"></i><span>Teacher </span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="/teachers">Add Teacher</a></li>
                                <li><a class="nav-link" href="/teachers-data">Teachers Record</a></li>
                            </ul>
                        </li>
                        </li>
                        </li>
                        <li class="dropdown">
                            <a href="/fee-data" class="nav-link"><i class="fa fa-book"></i><span>Students Fee
                                    Details</span></a>
                        </li>
                        </li>
                        <li class="dropdown">
                            <a href="/student-promotion" class="nav-link"><i
                                    class="
                        fas fa-archive"></i><span>Students
                                    promotion</span></a>
                        </li>
                        </li>
                        <li class="dropdown">
                            <a href="/fee-voucher-all" class="nav-link"><i
                                    class="
                    fas fa-hand-holding-usd"></i><span>Fee voucher
                                    Download</span></a>
                        </li>
                    </ul>
                </aside>
            </div>
