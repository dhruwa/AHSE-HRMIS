@extends('layouts.app')

@section('htmlheader_title')
    RTGS Generated List for {{ $month }} {{ $year }}
@endsection

@section('contentheader_title')
    RTGS Generated List for {{ $month }}/{{ $year }}
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
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    RTGS Generated List for {{ $month }}/{{ $year }}
                </div>
                <!-- /.box-header -->
 
                <div class="box-body" id="printableArea">
                    <h3>RTGS Generated List for {{ $month }}/{{ $year }}</h3>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Employee Code</th>
                                <th>Name</th>
                                <th>Bank Account Number</th>
                                <th>Amount to be Credited</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($employees as $k => $employee)
                            <tr>
                                <td> {{ $k+1 }} </td>
                                <td>{{ $employee->emp_id }}</td>
                                <td>{{ $employee->emp_f_name }} {{ $employee->emp_m_name }} {{ $employee->emp_l_name }}</td>
                                <td>{{ $employee->bank_details}}</td>
                                <td>{{ $employee->total_pension}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-2" style="margin-top:20px;"><input type="button" class="btn btn-success" onclick="printDiv('printableArea')" value="PRINT" /></div>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection

@section('scripts-extra')
<script>
function printDiv(printpage)
{
    var headstr = "<html><head><title>RTGS List : {{ $month }}/{{ $year }}</title></head><body>";
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