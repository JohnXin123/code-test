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
                            <li class="breadcrumb-item active">Lists</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Employee</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-2 d-flex justify-content-end">
                <div>
                    @if(Auth::guard('web')->user()->is_admin)
                    <a href="{{ route('employee.create') }}" class="btn btn-outline-primary">
                        <i class="ti-plus"></i>
                    </a>
                    @endif
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="col-sm-3 d-flex align-item-center mb-2">
                        <h4 class="header-title m-2 ">Search </h4>

                        <input id="search-input" type="text" class="form-control" name="name" placeholder="Enter Search Keyword">
                    </div>
                   
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Staff ID</th>
                                    <th>Email</th>
                                    <th>Department</th>
                                    <th>Phone Number</th>
                                    <th>Address</th>
                                    <th>Company</th>
                                    @if(Auth::guard('web')->user()->is_admin)
                                    <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody id="table-body">
                                @php
                                   $num = $employees->perPage() * ($employees->currentPage() - 1) + 1;
                                @endphp
                                @foreach ($employees as $employee)
                                    <tr>
                                        <th scope="row">{{ $num++ }}</th>
                                        <td>{{ $employee->user->name }}</td>
                                        <td>{{ $employee->staff_id }}</td>
                                        <td>{{ $employee->user->email }}</td>
                                        <td>{{ $employee->department }}</td>
                                        <td>{{ $employee->phone_no }}</td>
                                        <td>{{ $employee->address }}</td>
                                        <td>{{ $employee->company->name }}</td>
                                        @if(Auth::guard('web')->user()->is_admin)
                                        <td class="d-flex">
                                            <a href="{{ route('employee.edit', $employee->id) }}" title="Edit" class="btn btn-outline-warning mr-2">
                                                <i class=" ti-marker-alt"></i>
                                            </a>
                                            <form action="{{ route('employee.destroy', $employee->id) }}" method="POST">
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

                        {{ $employees->links() }}
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

const searchInput = document.getElementById('search-input');
const tableBody = document.getElementById('table-body');
const tableRows = tableBody.getElementsByTagName('tr');

searchInput.addEventListener('keyup', function(event) {

    const searchText = event.target.value.toLowerCase();

    for (let i = 0; i < tableRows.length; i++) {
        
        const rowCells = tableRows[i].getElementsByTagName('td');
        let matchFound = false;

        for (let j = 0; j < rowCells.length; j++) {
            const cellText = rowCells[j].textContent.toLowerCase();

            if (cellText.includes(searchText)) {
                matchFound = true;
                break;
            }
        }

        if (matchFound) {
            tableRows[i].style.display = '';
        } else {
            tableRows[i].style.display = 'none';
        }
    }
});
</script>

@endsection