@extends('layouts.app')

@section('htmlheader_title')
    List of Settled Pensions
@endsection

@section('contentheader_title')
    List of Settled Pensions
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            @if(Session::has('message'))
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert {{ Session::get('alert-class', 'alert-info') }}">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {!! Session::get('message') !!}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    List of Settled Pensions
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <thead>
							<tr>
                                <th>#</th>
								<th>Name</th>
                                <th>Employee ID</th>

                                <th>Pension Order Number</th>
                                <th>Pension Order Date</th>
                                <th>Pension Type</th>
								<th>Month/Year</th>

                                <th>DR</th>
                                <th>Medical</th>
                                <th>Pension</th>
                                <th>Basic</th>
                                <th>Total Pension</th>

                                <th>Action</th>
							</tr>
                        </thead>
                        <tbody>
                            <?php  $count = 1; ?>
                            
							@foreach ($results as $k => $v)
                            <tr>
                                <td> {{ (($results->currentPage() - 1 ) * $results->perPage() ) + $count + $k }} </td>
                                <td>{{ $v->emp_f_name }} {{ $v->emp_m_name }} {{ $v->emp_l_name }}</td>

                                <td>{{ $v->employeeId }}</td>

                                <td>{{ $v->pension_order_number}}</td>
                                <td>{{ date('d-m-Y', strtotime($v->pension_order_date)) }}</td>
                                <td>{{ $v->pension_type }}</td>
                                <td>{{ $v->month }} {{ $v->year }}</td>


                                <td>{{ $v->dr}}</td>
                                <td>{{ $v->medical}}</td>
                                <td>{{ $v->pension }}</td>
                                <td>{{ $v->basic }}</td>
                                <td>{{ $v->total_pension }}</td>

                                <td>
                                    @if($v->rtgs_generated == 'no')
                                    <a href="{{ route('edit.pension_data', Crypt::encrypt($v->pension_id)) }}"><span class="label label-primary">Edit</a></span>
                                    @else
                                    RTGS already generated
                                    @endif
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    
                    <div class="pagination">
                        {!! $results->render() !!}
                    </div>
                </div>
                
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection