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
                                        <label>Class Name</label>
                                        <input type="text" id="class-name" name="class_name_update"
                                            placeholder="Enter class Name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Program</label>
                                        <select name="program_update" class="form-control" id="program-update-dropdown">
                                            <option value="">Select Program</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
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
                                <form id="insert-subject">
                                    @csrf
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label style="display: flex;">Select Class</label>
                                                    <select id="class-dropdown" name="class_id" class="form-control">

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label style="display: flex;">Select Section</label>
                                                    <select id="section-dropdown" name="section_id" class="form-control">

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label>Subject Name</label>
                                                    <input type="text" name="subject_name" placeholder="Enter Subject Name"
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
                                    <table class="table table-striped" id="myTable">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    #
                                                </th>
                                                <th>Section</th>
                                                <th>Class</th>
                                                <th>Status</th>
                                                <th>Roll Start</th>
                                                <th>Roll end</th>
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

                programDropdown();
                // function to show class on Dropdown
                function programDropdown() {
                    $.ajax({
                        url: '/fetch_classes',
                        method: 'get',
                        success: function(response) {
                            $("#class-dropdown").html(response);

                        },
                        error: function() {
                            alert("Error:One ");
                        }
                    });
                }
                //Insert Subjects records to the DataBase Table --start
                $("#insert-subject").submit(function(e) {
                    e.preventDefault();
                    $.ajax({
                        url: '/subject-insert',
                        method: 'post',
                        data: $('#insert-subject').serialize(),
                        success: function() {
                            alert("record has been inserted successfully");
                            $("#insert-subject")[0].reset()
                        },
                        error: function() {
                            alert("Error:Two ");
                        }

                    });
                });

                // function to show sections on Dropdown
                $('#class-dropdown').change(function() {
                    let class_id = $(this).val();

                    $.ajax({
                        url: '/dateSheet/sections-dropdown',
                        type: 'post',
                        data: 'class_id=' + class_id + ' &_token={{ csrf_token() }}',
                        success: function(result) {
                            $('#section-dropdown').html(result);

                        },
                        error: function() {
                            alert("Issue");

                        }
                    });
                });

            });
        </script>

    @endsection
