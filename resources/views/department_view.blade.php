@extends('layouts.app')

@section('htmlheader_title')
    Department View
@endsection

@section('contentheader_title')
    Department View
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <a href={{ url('department') }} class="btn btn-primary btn-block btn-flat">Add a new Record</a></br>
                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
							<tr>
								<th>Department Name</th>
								<th>Status</th>
								<th>Edit</th>
							</tr>
							@foreach ($departments as $department)
							<tr>
								<td>{{ $department->fld_Department }}</td>
								<?php if($department->fld_Status == 1) { ?>
								<td>Active</td>
								<?php } else { ?>
								<td>Inactive</td>
								<?php } ?>								
								<td><a href="department_edit/{{ $department-> fld_DeptID }}"><span class="label label-primary">Edit</a></span></td>
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