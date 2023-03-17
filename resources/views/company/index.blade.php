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
                            <li class="breadcrumb-item active">Lists</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Company</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-2 d-flex justify-content-end">
                <div>
                    @if(Auth::guard('web')->user()->is_admin)
                    <a href="{{ route('company.create') }}" class="btn btn-outline-primary">
                        <i class="ti-plus"></i>
                    </a>
                    @endif
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="col-sm-3 d-flex align-item-center mb-2">
                        <h4 class="header-title m-2 ">Search </h4>

                        <input id="company-filter" type="text" class="form-control" name="name" placeholder="Enter Company Name">
                    </div>
                   
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Employee Count</th>
                                    @if(Auth::guard('web')->user()->is_admin)
                                    <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody id="table-body">
                                @php
                                   $num = $companies->perPage() * ($companies->currentPage() - 1) + 1;
                                @endphp
                                @foreach ($companies as $company)
                                    <tr>
                                        <th scope="row">{{ $num++ }}</th>
                                        <td>{{ $company->name }}</td>
                                        <td>{{ $company->email }}</td>
                                        <td>{{ $company->address }}</td>
                                        <td>{{ count($company->employees) }}</td>
                                        @if(Auth::guard('web')->user()->is_admin)
                                        <td class="d-flex">
                                            <a href="{{ route('company.edit', $company->id) }}" title="Edit" class="btn btn-outline-warning mr-2">
                                                <i class=" ti-marker-alt"></i>
                                            </a>
                                            <form action="{{ route('company.destroy', $company->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-outline-danger" type="submit">
                                                     <i class=" ti-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $companies->links() }}
                    </div>
                </div> <!-- end card-box-->
            </div> <!-- end col-->
        </div>
        <!-- end page title -->

    </div> <!-- container -->

</div> <!-- content -->

@endsection

@section('js')

<script type="text/javascript">

const companyFilter = document.getElementById('company-filter');
const tableBody = document.getElementById('table-body');

// Filter the table by company name
companyFilter.addEventListener('keyup', () => {

  const filterValue = companyFilter.value.toLowerCase();
  const rows = tableBody.getElementsByTagName('tr');
  Array.from(rows).forEach((row) => {
    const name = row.getElementsByTagName('td')[0].textContent.toLowerCase();
    if (name.includes(filterValue)) {
      row.style.display = '';
    } else {
      row.style.display = 'none';
    }
  });
});
</script>

@endsection