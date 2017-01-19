@extends('layouts.app')

@section('htmlheader_title')
    Arrear List as on {{ date('d-m-Y', strtotime($current_date)) }}
@endsection

@section('contentheader_title')
    Arrear List as on {{ date('d-m-Y', strtotime($current_date)) }}
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
                    Arrear List as on {{ date('d-m-Y', strtotime($current_date)) }}
                </div>
                <!-- /.box-header -->
 
                <div class="box-body" id="printableArea">
                    <h3>Arrear List as on {{ date('d-m-Y', strtotime($current_date)) }}</h3>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Employee Code</th>
                                <th>Name</th>
                                <th>Arrear</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($employees as $k => $employee)
                            <tr>
                                <td> {{ $k+1 }} </td>
                                <td>{{ $employee->emp_id }}</td>
                                <td>{{ $employee->emp_f_name }} {{ $employee->emp_m_name }} {{ $employee->emp_l_name }}</td>
                                <td>{{ $employee->arrear}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-2" style="margin-top:20px;"><input type="button" class="btn btn-success" onclick="printDiv('printableArea')" value="PRINT" /></div>

                <div class="col-md-5" style="margin-top:20px;">
                    <a href="{{route('arrears.excel') }}" class="btn btn-info"> Download Excel </a>
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
    var headstr = "<html><head><title>Arrear List as on {{ date('d-m-Y', strtotime($current_date)) }}</title></head><body>";
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