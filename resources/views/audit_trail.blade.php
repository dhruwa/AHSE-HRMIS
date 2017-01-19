@extends('layouts.app')

@section('htmlheader_title')
    Audit Trail
@endsection

@section('contentheader_title')
    Audit Trail
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">                
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
							<tr>
								<th>Action</th>
								<th>Date & Time</th>
								<th>Table</th>
							</tr>
							@foreach ($rows as $row)
							<tr>
								<td>{{ $row->action }}</td>
								<td>{{ $row->date }}</td>
								<td>{{ $row->table_name }}</td>
								</tr>
							@endforeach
                        </tbody>
                    </table>
                </div>                
            </div>
        </div>
    </div>
@endsection
@section('scripts-extra')

@endsection