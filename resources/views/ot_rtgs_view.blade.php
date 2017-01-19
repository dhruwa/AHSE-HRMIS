@extends('layouts.app')
@section('htmlheader_title')
    Over Time
@endsection
@section('contentheader_title')
    OFFICE OF THE</br>
ASSAM HIGHER SECONDARY EDUCATION COUNCIL</br>
BAMUNIMAIDAM, GUWAHATI-21

@endsection
@section('main-content')

<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
<div class="row">
        <div class="col-md-12">		
            <div class="box box-primary"> 
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
							<tr>
								<th>Sl. No</th>
								<th>Employee Code</th>
								<th>No. of Days</th>								
								<th>OT Hours </th>
								<th>Amount</th>
							</tr>
							<?php $i = 1; ?>
							@foreach ($loans as $loan)
							<tr>
								<td>{{ $i++ }}</td>
								<td>{{ $loan->emp_id }}</td>
								<td>{{ $loan->working_days }}</td>
								<td>{{ $loan->ot_hours }}</td>
								<td>{{ $loan->amount }}</td>
							</tr>							
							@endforeach
                        </tbody>
                    </table>
                </div>                
            </div>
        </div>
    </div>

    @include('layouts.partials.scripts_auth')
@endsection
