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
                                                                margin-right: 8px;"></i>Fill This Form and Register Teacher
                                </h4>
                            </div>
                            @if (session('insert'))
                                <div class="alert alert-info alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <center>
                                        {{ session('insert') }}
                                    </center>
                                </div>
                            @endif

                            <div class="card-body ">
                                <form action="/teacher-insert" method="POST">
                                    @csrf
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Teacher Name</label>
                                                    <input type="text" name="teacher_name"
                                                        placeholder="Enter Your Full Name" class="form-control"
                                                        autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Teacher's Father Name</label>
                                                    <input type="text" name="teacher_father_name"
                                                        placeholder="Enter teacher's Father Name" class="form-control"
                                                        autocomplete="off" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Phone Number</label>
                                                    <input type="number" name="teacher_number"
                                                        placeholder="Enter Phone Number" class="form-control"
                                                        autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Wattsapp Number</label>
                                                    <input type="number" name="teacher_watsapp_number"
                                                        placeholder="Enter Watsapp Number" class="form-control"
                                                        autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Blood Group</label>
                                                    <input type="text" name="teacher_bloodgroup"
                                                        placeholder="Enter Blood Group" class="form-control"
                                                        autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>School Joing Date</label>
                                                    <input type="date" name="teacher_job_date" class="form-control"
                                                        autocomplete="off" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Present Address</label>
                                                    <input type="text" name="teacher_address" class="form-control"
                                                        placeholder="Enter Present Address" autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Permanent Address</label>
                                                    <input type="text" name="teacher_permanent_address"
                                                        placeholder="Enter Permanent Address" class="form-control"
                                                        autocomplete="off" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Teacher Qualification</label>
                                                    <input type="text" name="teacher_qualification"
                                                        placeholder="Enter Teacher Qualification" class="form-control"
                                                        autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Teacher Skill</label>
                                                    <input type="text" name="teacher_skill"
                                                        placeholder="Enter Teacher Skill" class="form-control"
                                                        autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Teacher Sallery</label>
                                                    <input type="number" name="teacher_pay"
                                                        placeholder="Enter Teacher Sallery" class="form-control"
                                                        autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Bank Account Number</label>
                                                    <input type="number" name="teacher_account"
                                                        placeholder="Enter Teacher Bank Account Number"
                                                        class="form-control" autocomplete="off" required>
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

    @endsection
