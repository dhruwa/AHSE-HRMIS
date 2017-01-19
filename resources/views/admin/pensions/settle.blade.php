@extends('layouts.app')

@section('htmlheader_title')
    Settle
@endsection

@section('contentheader_title')
    Settle
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    SERVICE RECORD
                </div>
                <!-- /.box-header -->

                <?php $interval = $pension_details['work_duration']; ?>
                
                <div class="box-body">
                    <table class="table table-bordered table-condensed">
                        <thead>
							<tr>
								<th>Name</th>
                                <td>{{ $employee->emp_f_name }} {{ $employee->emp_m_name }} {{ $employee->emp_l_name }}</td>
							</tr>
                            <tr>
                                <th>Designation</th>
                                <td>{{ $employee->currentPost }}</td>
                            </tr>

                            <tr>
                                <th>Date of Birth</th>
                                <td>{{ date('d-m-Y', strtotime($employee->dob)) }}</td>
                            </tr>

                            <tr>
                                <th>Date of Joining</th>
                                <td>{{ date('d-m-Y', strtotime($employee->dateOfJoining)) }}</td>
                            </tr>

                            <tr>
                                <th>Date of Retirement</th>
                                <td>{{ date('d-m-Y', strtotime($employee->dateOfRetirement)) }}</td>
                            </tr>

                             <tr>
                                <th>Total Qualifying Service</th>
                                <td> {{ $interval->format('%y') }} Years {{ $interval->format('%m') }} Months {{ $interval->format('%d') }} Days </td>
                            </tr>

                            <tr>
                                <th>Last Basic Pay</th>
                                <td>{{ number_format((float)$last_basic_salary->basic_pay, 2, '.', '')}}</td>
                            </tr>

                        </thead>
                    </table>
                </div>
                
                <!-- /.box-body -->
                {{--<div class="box-footer clearfix">--}}
                    {{--<ul class="pagination pagination-sm no-margin pull-right">--}}
                        {{--<li><a href="#">«</a></li>--}}
                        {{--<li><a href="#">1</a></li>--}}
                        {{--<li><a href="#">2</a></li>--}}
                        {{--<li><a href="#">3</a></li>--}}
                        {{--<li><a href="#">»</a></li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection
@section('scripts-extra')
{{--<script>--}}
    {{--$('.btn-danger').on('click', function() {--}}
        {{--swal(--}}
                {{--'Good job!',--}}
                {{--'You clicked the button!',--}}
                {{--'success'--}}
        {{--)--}}
    {{--});--}}
{{--</script>--}}
@endsection