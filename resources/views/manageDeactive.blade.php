@extends('master')
@section('content')
    <!--Start Update Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" data-keyboard="false" data-backdrop="static"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="alert-after">
                        <h4>Update the Student record</h4>
                    </div>
                    <form id="student-form" action="/student-deactive-update" method="POST">
                        @csrf
                        <input type="text" id="student_update_id" name="id" style="display: none;">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Student Name</label>
                                        <input type="text" id="name" name="student_name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Student Name in Urdu</label>
                                        <input type="text" id="studenturdu" name="student_name_urdu" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Father Name</label>
                                        <input type="text" id="fathername" name="father_name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Father Name in Urdu</label>
                                        <input type="text" id="fatherurdu" name="father_name_urdu" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="display: flex">Phone &nbsp;&nbsp;&nbsp; <div id="">
                                            </div>
                                        </label>
                                        <input type="number" id="phone" name="phone" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="display: flex">Emergency Phone &nbsp;&nbsp;&nbsp; <div id=""> </div>
                                        </label>
                                        <input type="number" id="emrphone" name="emergencyphone" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" id="address" name="address" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Permanent Address</label>
                                        <input type="text" id="praddress" name="permanentaddress" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="CONTAINER">
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
                        </div> --}}
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date of birth</label>
                                        <input type="date" id="birth" name="dob" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date of Admission</label>
                                        <input type="date" id="admission" name="doa" class="form-control">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Roll No</label>
                                        <input type="number" id="roll" name="rollnumber" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Given Admission Fee</label>
                                        <input type="number" id="admssionfee" name="adfee" class="form-control"
                                            autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Remaining Admissoin Fee</label>
                                        <input type="number" id="remainingadmissionfee" name="readmissionfee"
                                            class="form-control" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Admission Fee Given Date</label>
                                        <input type="date" id="admissionfeegivedate" name="admissiontime"
                                            class="form-control" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Tution Fee</label>
                                        <input type="number" id="tutionfee" name="tfee" class="form-control"
                                            autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="sel1">Status</label>
                                        <select name="action_name" class="form-control" id="sel1">
                                            <option>active</option>
                                            <option>deactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 mx-auto">
                                    <button type="submit" class=" btn btn-info form-control" value="update"
                                        id="submit">Update</button>
                                </div>
                                <div class="col-md-6  mx-auto">
                                    <button type="button" class="btn btn-danger form-control  reload-records"
                                        data-dismiss="modal">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- End Update Modal --}}
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="container rounded mb-5 p-3 shadow-lg p-3" id="ajaxStudent">
                        <center>
                            <h4 class="text-dark ">Select Class and Section to Show Corresponding Data in Student
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
                                                    margin-right: 8px;"></i>Student Records</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered  table-hover" id="dataTable">
                                        <thead>
                                            <tr class="text-center">
                                                <th>
                                                    #
                                                </th>
                                                <th>Student Name</th>
                                                <th>Student Name In Urdu</th>
                                                <th>Father Name</th>
                                                <th>Father Name Urdu</th>
                                                <th>Phone Number</th>
                                                <th>Emergency Number</th>
                                                <th>Address</th>
                                                <th>Permanent Address</th>
                                                <th>Date of Birth</th>
                                                <th>Date of Admission</th>
                                                <th>Class</th>
                                                <th>Section</th>
                                                <th>Roll No</th>
                                                <th>Admission Fee</th>
                                                <th>Remaining Admission Fee</th>
                                                <th>Admission Fee Given Date</th>
                                                <th>Tution Fee</th>
                                                <th>Action</th>
                                                <th>Fee Voucher</th>
                                                <th>Collect Fee</th>
                                                <th>Fee History</th>
                                                <th>Collect Admisson Fee</th>
                                            </tr>
                                        </thead>
                                        <tbody id="studentData" class="text-center">
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
    {{-- CDN For Ajax --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    {{-- Show Record In Modal --}}
    <script>
        $(document).ready(function() {

            function fetchAllstudents() {
                $.ajax({
                    url: '/fetchall-deactive-student',
                    method: 'get',
                    success: function(response) {
                        $("#studentData").html(response);
                        var table = $('#dataTable').DataTable();
                        //success
                    }
                });
            }
            $(' .reload-records').click(function() {
                fetchAllstudents();
                $("#success").remove();
            });
            $(document).on('click', '.editIcon', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                $.ajax({
                    url: '/student-deactve-edit',
                    method: 'get',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $("#student_update_id").val(response[0].id);
                        $("#name").val(response[0].student_name);
                        $("#studenturdu").val(response[0].student_urdu);
                        $("#fathername").val(response[0].father_name);
                        $("#fatherurdu").val(response[0].father_urdu);
                        $("#phone").val(response[0].phone);
                        $("#emrphone").val(response[0].emergencyphone);
                        $("#address").val(response[0].address);
                        $("#praddress").val(response[0].permanentphone);
                        $("#birth").val(response[0].dateofbirth);
                        $("#admission").val(response[0].dateofadmission);
                        $("#programs-dropdown").val(response[0].program_id);
                        $("#classes-dropdown").val(response[0].class_id);
                        $("#roll").val(response[0].rollno);
                        $("#admssionfee").val(response[0].admissionfee);
                        $("#remainingadmissionfee").val(response[0].remainingadmissionfee);
                        $("#admissionfeegivedate").val(response[0].admissionfeegiven);
                        $("#tutionfee").val(response[0].tutionfee);
                        $("#sel1").val(response[0].status);
                    },
                    error: function() {
                        alert('issue');
                    }
                });
            });
            //    update data to database
            $("#student-form").submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: '/student-deactive-update',
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        swal("Congratulations!", "Record Is Updated!", "success");

                        $("#student-form")[0].reset()
                    },
                    error: function() {
                        alert("Error in Update: ");
                    }
                });
            });
            programsDropdown();
            // function to show programs on Dropdown
            function programsDropdown() {
                $.ajax({
                    url: '/programs-dropdown',
                    method: 'get',
                    success: function(response) {
                        $("#classid").html(response);

                    },
                    error: function() {
                        alert("Error: ");
                    }
                });
            }
            // function to show classes on Dropdown
            $('#classid').change(function() {
                let program_id = $(this).val();
                $.ajax({
                    url: '/classes-dropdown',
                    type: 'post',
                    data: 'program_id=' + program_id + ' &_token={{ csrf_token() }}',
                    success: function(result) {
                        $('#sectionid').html(result);
                    },
                    error: function() {
                        alert("Issue");
                    }
                });
            });
            // start correspond data
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
            // end correspond data
            //  to show data in ajax base
            $('#classes-dropdown').change(function() {
                let class_id = $(this).val();
                $.ajax({
                    url: '/ajax_deactive',
                    type: 'post',
                    data: 'class_id=' + class_id + ' &_token={{ csrf_token() }}',
                    success: function(result) {
                        $("#studentData").html(result);
                        var table = $('#myTable').DataTable();
                    },
                    error: function() {
                        $("#studentData").html();
                        var table = $('#myTable').DataTable();
                    }
                });
            });
            fetchAllstudents();
        });
    </script>
@endsection
