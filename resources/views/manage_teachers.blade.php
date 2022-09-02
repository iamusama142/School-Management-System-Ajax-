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
                                <h4 class="mx-auto" style="font-size: 30px">Update Teacher Record
                                </h4>
                            </div>

                            <div class="card-body ">
                                <form action="/edit/{{$data->id}}" method="POST">
                                    @csrf
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Teacher Name</label>
                                                    <input type="text" name="teacher_name"
                                                        placeholder="Enter Your Full Name" class="form-control"
                                                        autocomplete="off" required  value="{{$data->teacher_name}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Teacher's Father Name</label>
                                                    <input type="text" name="teacher_father_name"
                                                        placeholder="Enter teacher's Father Name" class="form-control"
                                                        autocomplete="off" required  value="{{$data->father_name}}">
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
                                                        placeholder="Enter Phone Number"  class="form-control"
                                                       autocomplete="off" required    value="{{$data->phone}}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Wattsapp Number</label>
                                                    <input type="number" name="teacher_watsapp_number"
                                                        placeholder="Enter Watsapp Number" class="form-control"
                                                        autocomplete="off" required  value="{{$data->watsapp}}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Blood Group</label>
                                                    <input type="text" name="teacher_bloodgroup"
                                                        placeholder="Enter Blood Group" class="form-control"
                                                        autocomplete="off" required  value="{{$data->blood_group}}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>School Joing Date</label>
                                                    <input type="date" name="teacher_job_date" class="form-control"
                                                        autocomplete="off" required  value="{{$data->school_joining_date}}">
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
                                                        placeholder="Enter Present Address" autocomplete="off" required  value="{{$data->present_address}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Permanent Address</label>
                                                    <input type="text" name="teacher_permanent_address"
                                                        placeholder="Enter Permanent Address" class="form-control"
                                                        autocomplete="off" required  value="{{$data->permanent_address}}">
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
                                                        autocomplete="off" required  value="{{$data->qualification}}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Teacher Skill</label>
                                                    <input type="text" name="teacher_skill"
                                                        placeholder="Enter Teacher Skill" class="form-control"
                                                        autocomplete="off" required  value="{{$data->skill}}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Teacher Sallery</label>
                                                    <input type="number" name="teacher_pay"
                                                        placeholder="Enter Teacher Sallery" class="form-control"
                                                        autocomplete="off" required  value="{{$data->sallery}}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Bank Account Number</label>
                                                    <input type="number" name="teacher_account"
                                                        placeholder="Enter Teacher Bank Account Number"
                                                        class="form-control" autocomplete="off" required  value="{{$data->bank_account_number}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class=" container btn btn-dark mb-3" type="submit">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    @endsection
