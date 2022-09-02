@extends('master')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="container ">
                <div class="row">
                    <div class="col-md-12">
                        <center>
                            <h1 class="text-dark">السلام علیکم</h1>
                            <h1 class="text-dark">Welcome To <span style="color: rgb(68, 0, 255)">Bismillah Future Sheen
                                    School System </span></h1>
                            <h5 class="text-dark" style="text-decoration: underline">   <div id="tiemdate">

                            </div></h5>

                        </center>

                    </div>
                </div>
            </div>
            <div class="container mt-5">
                <div class="row ">
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="card">
                            <div class="card-statistic-4">
                                <div class="align-items-center justify-content-between">
                                    <div class="row ">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                            <div class="card-content">
                                                <a href="/teachers-data" class="text-dark"
                                                    style="text-decoration: none; font-size:20px; font-weight: bold;">Access
                                                    Teachers</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                            <div class="banner-img">
                                                <img src="{{ asset('Res/assets/img/banner/1.png') }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="card">
                            <div class="card-statistic-4">
                                <div class="align-items-center justify-content-between">
                                    <div class="row ">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                            <div class="card-content">
                                                <a href="/student-datatable" class="text-dark"
                                                    style="text-decoration: none; font-size:20px; font-weight: bold;">Access
                                                    Students</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                            <div class="banner-img">
                                                <img src="{{ asset('Res/assets/img/banner/1.png') }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="card">
                            <div class="card-statistic-4">
                                <div class="align-items-center justify-content-between">
                                    <div class="row ">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                            <div class="card-content">
                                                <a href="/student-section" class="text-dark"
                                                    style="text-decoration: none; font-size:20px; font-weight: bold;">Access
                                                    Sections</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                            <div class="banner-img">
                                                <img src="{{ asset('Res/assets/img/banner/1.png') }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="card" style="height: 140px">
                            <div class="card-statistic-4">
                                <div class="align-items-center justify-content-between">
                                    <div class="row ">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                            <div class="card-content">
                                                <a href="/fee-data" class="text-dark"
                                                    style="text-decoration: none; font-size:20px; font-weight: bold;">Access
                                                    <br>
                                                    Fees</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                            <div class="banner-img">
                                                <img src="{{ asset('Res/assets/img/banner/1.png') }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    {{-- <?php date_default_timezone_set('Asia/Karachi');echo date('d-m-Y h:i'); ?> --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        function GetDAteTimeFunction() {
            var DateTime = new Date();
            $("#tiemdate").html(DateTime);
        }
        $(document).ready(function() {
            setInterval(GetDAteTimeFunction, 1000);
        });
    </script>
@endsection
