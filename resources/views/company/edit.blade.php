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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Company</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Company Edit</h4>
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
                        <form method="post" action="{{ route('company.update', $company->id) }}">
                            @csrf  @method('PUT')
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Name</label>
                                        <input type="text" class="form-control" name="name"  placeholder="Enter Company Name" value="{{ $company->name }}">
                                    </div>
                                </div>
                                <div class="col-lg-6"> 
                                    <div class="form-group mb-3">
                                        <label for="example-email">Email</label>
                                        <input type="email" class="form-control" name="email"  placeholder="Email" value="{{ $company->email }}">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Address</label>
                                        <textarea class="form-control" name="address" id="example-textarea" rows="5">
                                            {{ $company->address }}
                                        </textarea>
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