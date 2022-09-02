@extends('master')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Class Promotion Form</h4>
                            </div>
                            <div class="card-body">
                                <form id="frm" action="/student-promotion/insert" method="POST">
                                    @csrf
                                    <div class="container">
                                        <div class="row">

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Older Class</label>
                                                    <select name="old_class_id" class="form-control"
                                                        id="programs-dropdown">
                                                        <option value="">Select Class</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Section</label>
                                                    <select name="old_section_id" class="form-control"
                                                        id="classes-dropdown">
                                                        <option value="">Select Section</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>New Class</label>
                                                    <select name="new_class_id" class="form-control"
                                                        id="programs-dropdown2">
                                                        <option value="">Select Class</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Section</label>
                                                    <select name="new_section_id" class="form-control"
                                                        id="classes-dropdown2">
                                                        <option value="">Select Section</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Promotion Fee</label>
                                                    <input type="number" name="promotion_fee" class="form-control"
                                                        placeholder="">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <button id="promote-submit" class=" container btn btn-primary mb-3"
                                        type="submit">Promote</button>
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
                programsDropdown();

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
                programsDropdown2();

                function programsDropdown2() {
                    $.ajax({
                        url: '/programs-dropdown',
                        method: 'get',
                        success: function(response) {
                            $("#programs-dropdown2").html(response);
                        },
                        error: function() {
                            alert("Error: ");
                        }
                    });
                }
                // function to show classes on Dropdown
                $('#programs-dropdown2').change(function() {
                    let program_id = $(this).val();
                    $.ajax({
                        url: '/classes-dropdown',
                        type: 'post',
                        data: 'program_id=' + program_id + ' &_token={{ csrf_token() }}',
                        success: function(result) {
                            $('#classes-dropdown2').html(result);
                        },
                        error: function() {
                            alert("Issue");
                        }
                    });
                });
            });
        </script>
    @endsection
