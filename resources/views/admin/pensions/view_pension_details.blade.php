@extends('layouts.app')

@section('htmlheader_title')
    List of Retired Employees
@endsection

@section('contentheader_title')
    Retired Employees
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    Pension Details
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <thead>
							<tr>
                                <th>#</th>
								<th>Name</th>
                                <th>DOB</th>
                                <th>Bank Details</th>
                                <th>Address</th>
								<th>View Details</th>
							</tr>
                        </thead>
                        <tbody>
                            <?php  $count = 1; ?>
                            
							@foreach ($employees as $k => $employee)
                            <tr>
                                <td> {{ (($employees->currentPage() - 1 ) * $employees->perPage() ) + $count + $k }} </td>
                                <td>{{ $employee->emp_f_name }} {{ $employee->emp_m_name }} {{ $employee->emp_l_name }}</td>
                                <td>{{ $employee->dob}}</td>
                                <td>{{ $employee->bank_details }}</td>
                                <td>{{ $employee->current_address }}</td>
                                <td>
                                    <a href="emp_show/{{ $employee->employeeId }}"><span class="label label-primary">View Details</a></span>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    
                    <div class="pagination">
                        {!! $employees->render() !!}
                    </div>
                </div>
                
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection