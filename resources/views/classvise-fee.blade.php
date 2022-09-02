@extends('master')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="container  mb-5 p-3 shadow-lg p-3" id="ajaxStudent">
                        <center>
                            <h4 class="text-dark ">Select Class and Section to Show Corresponding Data in Student Fee
                                Records</h4>
                        </center>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="text-dark ">Class</label>
                                    <select name="program_id" class="form-control" id="programs-dropdown">
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="text-dark ">Section</label>
                                    <select name="section" class="form-control" id="classes-dropdown">
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card border border-secondary">
                            <div class="card-header mt-3">
                                <h4 class="mx-auto" style="font-size: 30px"><i class="fas fa-database" style="font-size: 35px;
                                        margin-right: 8px;"></i>Student Fees Records</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="myTable">
                                        <thead>
                                            <tr class="text-center">
                                                <th>
                                                    #
                                                </th>
                                                <th>Student Name</th>
                                                <th>January</th>
                                                <th>February</th>
                                                <th>March</th>
                                                <th>April</th>
                                                <th>May</th>
                                                <th>June</th>
                                                <th>July</th>
                                                <th>August</th>
                                                <th>September</th>
                                                <th>October</th>
                                                <th>November</th>
                                                <th>December</th>
                                            </tr>
                                        </thead>
                                        <tbody id="studentfeeDetails" class="text-center">
                                            {{-- Data Will Be Here --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    {{-- Show Record In Modal --}}
    <script>
        $(document).ready(function() {
            function fetchAllstudents() {
                $.ajax({
                    url: '/fetchall-fees',
                    method: 'get',
                    success: function(response) {
                        $("#studentfeeDetails").html(response);
                        var table = $('#myTable').DataTable();
                        //success
                    }
                });
            }
            $(' .reload-records').click(function() {
                fetchAllstudents();
                $("#success").remove();
            });
            fetchAllstudents();
            programsDropdown();
            // function to show programs on Dropdown
            function programsDropdown() {
                $.ajax({
                    url: '/programs-dropdown',
                    method: 'get',
                    success: function(response) {
                        $("#programs-dropdown").html(response);
                    },
                    error: function() {
                        alert("Error: ");
                    }
                });
            }
            // function to show classes on Dropdown
            $('#programs-dropdown').change(function() {
                let program_id = $(this).val();
                $.ajax({
                    url: '/classes-dropdown',
                    type: 'post',
                    data: 'program_id=' + program_id + ' &_token={{ csrf_token() }}',
                    success: function(result) {
                        $('#classes-dropdown').html(result);
                    },
                    error: function() {
                        alert("Issue");
                    }
                });
            });
            //  to show data in ajax base
            $('#classes-dropdown').change(function() {
                let class_id = $(this).val();
                $.ajax({
                    url: '/ajaxfeetable',
                    type: 'post',
                    data: 'class_id=' + class_id + ' &_token={{ csrf_token() }}',
                    success: function(result) {

                        $("#studentfeeDetails").html(result);
                        var table = $('#myTable').DataTable();
                    },
                    error: function() {
                        alert("error");
                    }
                });
            });
            // function fetchAllhistory() {
            //     $.ajax({
            //         url: '/fee-history',
            //         method: 'get',
            //         success: function(response) {
            //             $("#studentfeeDetails").html(response);
            //             var table = $('#myTable').DataTable();
            //             alert("fee history");
            //             //success
            //         }
            //     });
            // }
            $(' .reload-records').click(function() {
                fetchAllhistory();
                $("#success").remove();
            });
            fetchAllhistory();
        });
    </script>
@endsection
