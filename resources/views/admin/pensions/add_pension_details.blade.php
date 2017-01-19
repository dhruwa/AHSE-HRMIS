@extends('layouts.app')

@section('htmlheader_title')
    Add Bank and Address Details : Retired Employees 
@endsection

@section('contentheader_title')
    Add Bank and Address Details : Retired Employees 
@endsection


@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    Add Retirement Details
                </div>
               
                <div class="box-body">
                    <table class="table table-bordered">
                        <thead>
							<tr>
                                <th>#</th>
								<th>Name</th>
								<th>Date of Retirement</th>
                                <th>Date of Birth</th>
                                <th>Gender</th>
                                <th>Post</th>
                                <th>Department</th>
                                <th>Contact No(s)</th>
                                <th>Add Details</th>
								<th>View Details</th>
							</tr>
                        </thead>
                        <tbody>
                            <?php  $count = 1; ?>
                            
							@foreach ($employees as $k => $employee)
                            <?php $indx = $k+1; ?>
                            <tr>
                                <td> {{ (($employees->currentPage() - 1 ) * $employees->perPage() ) + $count + $k }} </td>
                                <td> {{ $employee->emp_f_name }} {{ $employee->emp_m_name }} {{ $employee->emp_l_name }} </td>
                                <td> {{ date('d-m-Y', strtotime($employee->date_of_retirement)) }}</td>
                                <td> {{ date('d-m-Y', strtotime($employee->dob)) }} </td>
                                <td> {{ $employee->gender }} </td>
                                <td> {{ $employee->postName }} </td>
                                <td> {{ $employee->departmentName }} </td>
                                <td> {{ $employee->contactNumber }} @if($employee->altContactNumber != '') / {{ $employee->altContactNumber }} @endif </td>
                                <td> <a href="{{ route('pension.employees.add_pension_details', Crypt::encrypt($employee->employeeId)) }}" class="btn btn-info btn-sm">Add Details</a>
                                </td>
                                <td>
                                    <a href="emp_show/{{ $employee->employeeId }}"><span class="label label-success">View Details</a></span>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    <hr>
                    {!! Form::label('', '', array('class' => 'col-md-3 control-label')) !!}
                    {!! Form:: submit('Settle Pension', ['class' => 'btn btn-success btn-lg']) !!}
                    {!!form::close()!!}
                    <div class="pagination">
                        {!! $employees->render() !!}
                    </div>
                </div>
               
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection
