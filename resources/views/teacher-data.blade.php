@extends('master')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card border border-secondary">
                            <div class="card-header mt-3">
                                <h4 class="mx-auto" style="font-size: 30px"><i class="fas fa-database" style="font-size: 35px;
                                                    margin-right: 8px;"></i>Teacher Records</h4>
                            </div>
                            @if (session('update'))
                                <div class="alert alert-warning alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <center>
                                        {{ session('update') }}
                                    </center>
                                </div>
                            @endif
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="myTable">
                                        <thead>
                                            <tr class="text-center">
                                                <th>
                                                    #
                                                </th>
                                                <th>Teacher Name</th>
                                                <th>Teacher Father Name</th>
                                                <th>Phone Number</th>
                                                <th>Watsapp Number</th>
                                                <th>Blood Group</th>
                                                <th>School Joining Date</th>
                                                <th>Present Adress</th>
                                                <th>Permanent Address</th>
                                                <th>Qualification</th>
                                                <th>Skill</th>
                                                <th>Sallery</th>
                                                <th>Bank Account Number</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            @foreach ($data as $item)
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->teacher_name }}</td>
                                                    <td>{{ $item->father_name }}</td>
                                                    <td>{{ $item->phone }}</td>
                                                    <td>{{ $item->watsapp }}</td>
                                                    <td>{{ $item->blood_group }}</td>
                                                    <td>{{ $item->school_joining_date }}</td>
                                                    <td>{{ $item->present_address }}</td>
                                                    <td>{{ $item->permanent_address }}</td>
                                                    <td>{{ $item->qualification }}</td>
                                                    <td>{{ $item->skill }}</td>
                                                    <td>{{ $item->sallery }}</td>
                                                    <td>{{ $item->bank_account_number }}</td>
                                                    <td><a href="update/{{ $item->id }}"
                                                            class="btn btn-primary">Update</a></td>
                                                </tr>
                                            @endforeach
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
    <script>
        $(document).ready(function() {
            var table = $('#myTable').DataTable();
        });
    </script>
@endsection
