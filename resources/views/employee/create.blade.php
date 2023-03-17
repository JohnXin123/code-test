@extends('master') 


@section('content')

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Employee</a></li>
                            <li class="breadcrumb-item active">Create</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Employee Create</h4>
                </div>
            </div>
        </div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
         <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('employee.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">First Name</label>
                                        <input type="text" class="form-control" name="first_name"  placeholder="Enter Employee First Name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Last Name</label>
                                        <input type="text" class="form-control" name="last_name"  placeholder="Enter Employee Last Name">
                                    </div>
                                </div>
                                <div class="col-lg-6"> 
                                    <div class="form-group mb-3">
                                        <label for="example-email">Department</label>
                                        <input type="text" class="form-control" name="department"  placeholder="Enter Employee Department">
                                    </div>
                                </div>
                                <div class="col-lg-6"> 
                                    <div class="form-group mb-3">
                                        <label for="example-email">Phone Number</label>
                                        <input type="tel" class="form-control" name="phone_no"  placeholder="Enter Employee Phone Number">
                                    </div>
                                </div>
                                <div class="col-lg-6"> 
                                    <div class="form-group mb-3">
                                        <label for="example-email">Email</label>
                                        <input type="email" class="form-control" name="email"  placeholder="Enter Employee Email">
                                    </div>
                                </div>
                                <div class="col-lg-6"> 
                                    <div class="form-group mb-3">
                                        <label for="example-email">Password</label>
                                        <input type="password" class="form-control" name="password"  placeholder="Enter Employee Password">
                                    </div>
                                </div>
                                <div class="col-lg-6"> 
                                    <div class="form-group mb-3">
                                        <label for="example-email">Staff ID</label>
                                        <input type="text" class="form-control" name="staff_id"  placeholder="Enter Employee Password">
                                    </div>
                                </div>
                                <div class="col-lg-6"> 
                                    <div class="form-group mb-3">
                                        <label for="example-email">Company</label>
                                        <select class="form-control" name="company_id" id="example-select">
                                            <option value="">Select Company</option>
                                            @foreach($companies as $company)
                                            <option value="{{$company->id}}">{{$company->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Address</label>
                                        <textarea class="form-control" name="address" id="example-textarea" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                        Submit
                                    </button>
                                </div>
                                
                            </div>
                        </form>
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div><!-- end col -->
        </div>
        <!-- end page title -->

    </div> <!-- container -->

</div> <!-- content -->

@endsection

@section('js')

@endsection