@extends('master')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-12">
                        <div class="card border border-secondary shadow-lg p-3 mb-5 bg-white rounded">
                            <div class="card-header mt-3 ">
                                <h4 class="mx-auto" style="font-size: 30px"><i class="fas fa-user-graduate" style="font-size: 35px;
                                        margin-right: 8px;"></i>Fill This Form and Register Student</h4>
                            </div>
                            <div class="card-body ">
                                <form id="frm">
                                    @csrf
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" name="fullname" placeholder="Enter You Full Name"
                                                        class="form-control" autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>نام</label>
                                                    <input type="text" name="nameurdu"
                                                        placeholder="اپنا نام اردو میں درج کریں" class="form-control"
                                                        placeholder="Enter Full Name"  autocomplete="off" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Father Name</label>
                                                    <input type="text" name="fathername" placeholder="Enter You Father Name"
                                                        class="form-control"  autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label> والد کا نام</label>
                                                    <input type="text" name="fathernameurdu"
                                                        placeholder="اپنے والد کا نام اردو میں درج کریں"
                                                        class="form-control"  autocomplete="off" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Phone Number</label>
                                                    <input type="number" name="pnum" class="form-control"
                                                        placeholder="Enter Phone Number"  autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Emergency Number</label>
                                                    <input type="number" name="emrnum" class="form-control"
                                                        placeholder="Enter Emergency Phone Number"  autocomplete="off" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <input type="text" name="address" class="form-control"
                                                        placeholder="Enter Your Adress"  autocomplete="off" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Permanent Address</label>
                                                    <input type="text" name="paddress" class="form-control"
                                                        placeholder="Enter Your Permanent Adress"  autocomplete="off" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container ml-2">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Date Of Birth</label>
                                                    <input type="date" name="dob" class="form-control"  autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Date Of Admission</label>
                                                    <input type="date" name="doa" class="form-control"  autocomplete="off" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Class</label>
                                                    <select name="program_id" class="form-control" id="programs-dropdown"  autocomplete="off" required>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Section</label>
                                                    <select name="section" class="form-control" id="classes-dropdown"  autocomplete="off" required>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Roll No</label>
                                                    <input type="number" name="rollno" class="form-control"  autocomplete="off" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container mt-3">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Given Admission Fee</label>
                                                    <input type="number" name="adfee" class="form-control"  autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Remaining Admissoin Fee</label>
                                                    <input type="number" name="readmissionfee" class="form-control"  autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Admission Fee Given Date</label>
                                                    <input type="date" name="admissiontime" class="form-control"  autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Tution Fee</label>
                                                    <input type="number" name="tfee" class="form-control"  autocomplete="off" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <button class=" container btn btn-dark mb-3" type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            //insert into programs
            $("form").submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: '/student-insert',
                    method: 'post',
                    data: $('form').serialize(),
                    success: function(response) {
                        // fetchAllprograms();
                        console.log(response)
                        swal("Congratulations!", "Student Record Is Added!", "success");
                        $("form")[0].reset();
                    },
                    error: function() {
                        swal("Try Agian!", "Error In Insert !", "error");

                    }

                });
                // fetchAllprograms();
            });
            // parentsDropdown();
            programsDropdown();

            // // function to all parents in the dropdown
            // function parentsDropdown() {
            //     $.ajax({
            //         url: '/parents-dropdown',
            //         method: 'get',
            //         success: function(response) {
            //             $("#parents-dropdown").html(response);

            //         },
            //         error: function() {
            //             alert("Error: ");
            //         }
            //     });
            // }
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


            // // function to show sections on Dropdown
            // $('#classes-dropdown').change(function() {
            //     let class_id = $(this).val();
            //     $.ajax({
            //         url: '/sections-dropdown',
            //         type: 'post',
            //         data: 'class_id=' + class_id + ' &_token={{ csrf_token() }}',
            //         success: function(result) {
            //             $('#sections-dropdown').html(result);
            //         },
            //         error: function() {
            //             alert("Issue");

            //         }
            //     });
            // });

            // function to show Rolls on Dropdown
            $('#sections-dropdown').change(function() {
                let section_id = $(this).val();
                $.ajax({
                    url: '/rolls-dropdown',
                    type: 'post',
                    data: 'section_id=' + section_id + ' &_token={{ csrf_token() }}',
                    success: function(result) {
                        $('#rolls-dropdown').html(result);
                    },
                    error: function() {
                        alert("Issue");

                    }
                });
            });



        });
    </script>
@endsection
