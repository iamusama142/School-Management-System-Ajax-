@extends('master')
@section('content')
    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="alert-after">
                        <h4>Update the Classes record</h4>
                    </div>
                    <form id="class-form">
                        @csrf
                        <input type="text" id="class_update_id" name="class_update_id" style="display: none;">
                        <div class="container">

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status_update" class="form-control" id="status">
                                            <option value="">Select Status</option>
                                            <option id="Active" value="Active">Active</option>
                                            <option id="Deactive" value="Deactive">Deactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="submit" id="sbumit" class=" container btn btn-primary mb-3 "
                                            value="Update">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <button type="button" class=" container btn btn-danger reload-records"
                                            data-dismiss="modal">
                                            Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Add new Section</h4>
                            </div>
                            <div class="card-body">
                                <form id="insert-class">
                                    @csrf
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Section Name</label>
                                                    <input type="text" name="section_name" placeholder="Enter Section Name"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label style="display: flex;">Select Class &nbsp;&nbsp;&nbsp; <div
                                                            id="error_phone"> </div></label>
                                                    <select id="program-dropdown" name="class_id" class="form-control">

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Roll NO. Start</label>
                                                    <input type="number" name="rollno_start" placeholder="Enter Roll"
                                                        class="form-control" min=0>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Roll No. End</label>
                                                    <input type="number" name="rollno_end" placeholder="Enter Section Name"
                                                        class="form-control" min=0>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" id="" class="container btn btn-dark mb-3 reload-records"
                                        value="Submit">
                            </div>
                        </div>
                        {{-- <button class=" container btn btn-dark mb-3">Submit</button> --}}
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Manage Classes</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="myTable">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    #
                                                </th>
                                                <th>Class</th>
                                                <th>Program</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="classsData">
                                            {{-- Data will be here --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- Bootstrap 4 Model  Update data show in form --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                // CLose btn Upadte Modal
                // $('.reload-records').click(function() {
                //     fetchAllclasss();
                //
                //     $('#success').remove();
                // });
                programDropdown();
                fetchAllclasss();

                // function to show class on Dropdown
                function programDropdown() {
                    $.ajax({
                        url: '/fetch_classes',
                        method: 'get',
                        success: function(response) {
                            $("#program-dropdown").html(response);
                        },
                        error: function() {
                            alert("Error: ");
                        }
                    });
                }
                // function to show classs
                function fetchAllclasss() {
                    $.ajax({
                        url: '/fetchall-class',
                        method: 'get',
                        success: function(response) {
                            $("#classsData").html(response);
                            var table = $('#myTable').DataTable();
                        },
                        error: function() {
                            alert("Error: ");
                        }
                    });
                }
                //insert into section
                $("#insert-class").submit(function(e) {
                    e.preventDefault();
                    $.ajax({
                        url: '/section-insert',
                        method: 'post',
                        data: $('#insert-class').serialize(),
                        success: function(response) {
                            console.log(response);

                            alert("Congratulations! Record is Inserted Successfully");
                            $("#insert-class")[0].reset();
                            fetchAllclasss();
                            programDropdown();
                        },
                        error: function() {
                            alert("Error: ");
                        }
                    });
                });
            });
        </script>
    @endsection
