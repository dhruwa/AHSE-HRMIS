@extends('layouts.app')

@section('htmlheader_title')
    List of Retired Employees
@endsection

@section('contentheader_title')
    Pension Data
@endsection


@section('main-content')
<style>
@media print
{
    body {font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif !important; font-size: 9px;}
    .table { font-size: 9px !important; border: none !important; }
}
</style>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    Pension Data
                </div>
                <!-- /.box-header -->

                <div class="box-body">
                    
                        <div class="row">
                            <div class="col-xs-12">
                            <div id="printableArea">
                            <h3>Pension Data</h3>
                                <table class="table table-bordered">
                                    <thead>
            							<tr>
            								<th>#</th>
                                            <th>Pension Order No.</th>
                                            <th>Pension Order Date</th>
            								<th>Name</th>
                                            <th>Date of Birth</th>
                                            <th>Date of Joining</th>
                                            <th>Date of Retirement</th>
                                            <th>Total Service</th>
                                            <th>Net Qualifying Service</th>
                                            <th>Total Pension Amount</th>
                                            <th>Where payble</th>
                                            <th>Pension Type</th>
            							</tr>
                                    </thead>
                                    <tbody>

            							@foreach ($employees as $k => $employee)
                                        <?php
                                            $date1 = $employee->date_of_joining;
                                            $date2 = $employee->emp_date_of_retirement;

                                            $datetime1 = new \DateTime($date1);
                                            $datetime2 = new \DateTime($date2);
                                            $interval = $datetime1->diff($datetime2);

                                            $service_years  = $interval->format('%y');
                                            $service_months = $interval->format('%m');
                                            $service_days   = $interval->format('%d');
                                        ?>
                                        <tr>
                                            <td> {{ $k+1 }} </td>
                                            <td>{{ $employee->pension_order_number }}</td>
                                            <td>{{ $employee->pension_order_date }}</td>
                                            <td>{{ $employee->emp_f_name }} {{ $employee->emp_m_name }} {{ $employee->emp_l_name }}</td>
                                            <td>{{ $employee->dob}}</td>
                                            <td>{{ $employee->date_of_joining}}</td>
                                            <td>{{ $employee->emp_date_of_retirement}}</td>
                                            <td> {{ $service_years}} years {{ $service_months }} months {{ $service_days }} days</td>
                                            <td> {{ $service_years }} years </td>
                                            <td>{{ $employee->total_pension}}</td>
                                            <td>{{ $employee->bank_details}}</td>
                                            <td>{{ $employee->pension_type}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <div class="col-md-2"><input type="button" class="btn btn-success" onclick="printDiv('printableArea')" value="PRINT" /></div>
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection
@section('scripts-extra')
<script>
function printDiv(printpage)
{
    var headstr = "<html><head><title>Pensio Details as on Date : {{ date('d/m/Y h:i A') }}</title></head><body>";
    var footstr = "</body>";
    var newstr = document.all.item(printpage).innerHTML;
    var oldstr = document.body.innerHTML;
    document.body.innerHTML = headstr+newstr+footstr;
    window.print();
    document.body.innerHTML = oldstr;
    return false;
}
</script>
@endsection