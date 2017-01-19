@extends('layouts.app')
@section('htmlheader_title')
    Salary
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
								<th>Employee Name</th>								
								<th>Bank Account No</th>
								<th>Amount to be credited to Bank A/C</th>
							</tr>
							<?php $i = 1; ?>
							@foreach ($loans as $loan)
							<tr>
								<td>{{ $i++ }}</td>
								<td>{{ $loan->emp_id }}</td>
								<td>
									<?php
										$employee = DB::table('employees')->where('emp_id', $loan->emp_id)->get();
										foreach($employee as $emp)
										echo $emp->emp_f_name ?>&nbsp;<?php echo $emp->emp_m_name ?>&nbsp;<?php echo $emp->emp_l_name														
									?>
								</td>
								<td>
									<?php
										$employee = DB::table('employees')->where('emp_id', $loan->emp_id)->get();
										foreach($employee as $emp)
										echo $emp->bank_account_number													
									?>
								</td>
								<td>								
								<?php 
									$net_salary = $loan->total_deduction+$loan->gross_salary;
									echo $net_salary;
								?>
								</td>
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
