@extends('layouts.app')

@section('htmlheader_title')
    Loan Detail View
@endsection

@section('contentheader_title')
    Loan Detail View
@endsection

@section('header-extra')

@endsection

@section('main-content')
<div class="row">  
	<form action="{{action('LoanController@loan_forward')}}" method="post">       
		<div class="col-md-4">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Loan Detail View</h3>
				</div>
				<div class="box-body">                 
					<input type="hidden" name="_method" value="PATCH">

						{{ csrf_field() }}
						
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" name="loan_transection_id"
							value="{{ $row->loan_transection_id }}" />
					</div>	
												
					<?php	$employee = DB::table('employees')->where('emp_id', $row->emp_id)->first(); { ?>
					<div class="form-group has-feedback">
						Employee
						<input type="text" class="form-control" name="emp_id"
							value="{{ $employee->emp_f_name }} {{ $employee->emp_m_name }} {{ $employee->emp_l_name }}" readonly />
					</div>
					<?php } ?>
					<?php $leavetype = DB::table('loan_type')->where('loan_type_id', $row->loan_type_id)->first(); {	?>
					<div class="form-group has-feedback">
						Loan Type
						<input type="text" class="form-control" name="loan_type_id"
							value="{{ $leavetype->loan_type }}" readonly />
					</div>
					<?php } ?>
					<div class="form-group has-feedback">
						Loan Amount
						<input type="text" class="form-control" name="loan_ammount"
							value="{{ $row->loan_ammount }}" readonly />
					</div>					
					<div class="form-group has-feedback">	
						No of Instalment
						<input type="text" class="form-control" name="no_of_instalment"
							value="{{ $row->no_of_instalment }}" readonly />
					</div>
					<div class="form-group has-feedback">
						Interset Amount
						<input type="text" class="form-control" name="interest_amount"
							value="{{ $row->interest_amount }}" readonly />
					</div>
					<div class="form-group has-feedback">
						Pricipal Ammount
						<input type="text" class="form-control" name="pricipal_ammount"
							value="{{ $row->pricipal_ammount }}" readonly />
					</div>					
				</div>
			</div>
		</div> 
		<div class="col-md-4">
			<div class="box box-primary">
				<div class="box-header with-border">
					<a href="{{ url('loanapplication') }}" class="box-title">Back</h3></a>
				</div>
				<div class="box-body">
					<div class="form-group has-feedback">
						Applied On
						<input type="date" class="form-control" name="applied_on"
							value="{{ $row->applied_on }}" readonly />
					</div>
					<div class="form-group has-feedback">
						Applied For
						<input type="text" class="form-control" name="applied_for"
							value="{{ $row->applied_for }}" readonly />
					</div>
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" name="status"
							value="2" readonly />
					</div>					
					<div class="form-group has-feedback">
						Forwarded By
						<input type="text" class="form-control" name="forwarded_by"
							value="{{ $row->forwarded_by }}"  />
					</div>	
					<div class="form-group has-feedback">
						Forwarded On
						<input type="date" class="form-control" name="forwarded_on"
							value="{{ $row->forwarded_on }}" readonly />
					</div>
					<div class="form-group has-feedback">
						Remarks
						<input type="text" class="form-control" name="remarks"
							value="{{ $row->remarks}}" readonly />
					</div>
					<?php if($row->status == 2){ ?>						
						<a href="../approved_loan/{{ Crypt::encrypt($row->loan_transection_id) }}" class="btn btn-primary btn-block btn-flat" >Approve</a>
						<a href="../rejected_loan/{{ Crypt::encrypt($row->loan_transection_id) }}" class="btn btn-primary btn-block btn-flat" >Reject</a>
						<a href="../back_to_branch_loan/{{ Crypt::encrypt($row->loan_transection_id) }}" class="btn btn-primary btn-block btn-flat" >Resend</a>
						
					<?php } 
					elseif($row->status == 3){
					?>
					<a href="#" class="btn btn-primary btn-block btn-flat" readonly >Loan Approved</a>
					<?php } elseif($row->status == 4){?>
					<a href="#" class="btn btn-primary btn-block btn-flat" readonly >Loan Rejected</a>
					<?php } ?>
				</div>
			</div>
		</div>		
	</form>
</div>
@endsection
@section('scripts-extra')

@endsection