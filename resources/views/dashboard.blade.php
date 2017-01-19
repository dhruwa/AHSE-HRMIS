@extends('layouts.app')

@section('htmlheader_title')
    Dashboard
@endsection

@section('contentheader_title')
    Dashboard
@endsection

@section('main-content')
<style>
	.dropbtn {
		background-color: #00c0ef;
		color: white;
		padding: 14px;
		font-size: 16px;
		border: none;
		cursor: pointer;
	}
					
	.dropdown {
		position: relative;
		display: inline-block;
	}
							
	.dropdown-content {
		display: none;
		position: absolute;
		background-color: #f9f9f9;
		min-width: 160px;
		box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	}
							
	.dropdown-content a {
		color: black;
		padding: 12px 16px;
		text-decoration: none;
		display: block;
	}
							
	.dropdown-content a:hover {background-color: #f1f1f1}
						
	.dropdown:hover .dropdown-content {
		display: block;
	}
					
	.dropdown:hover .dropbtn {
		background-color: #3e8e41;
	}
</style>
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Welcome</h3>
    </div>
    <div class="box-body">
        Welcome to Assam Higher Secondary Education Council</br></br>
		<?php echo Auth::user()->firstname." ".Auth::user()->lastname ?></br></br>
		<div class="dropdown">
			<button class="dropbtn">Leave Application</button>
			<div class="dropdown-content">
				<a href="applyleave">Apply Leave</a>
				<a href="view_leave_status">View Status of Leave</a>
				<a href="view_available_leave">View Balance Leave</a>
				<?php if(Auth::user()->role == '6'){ ?>
				<a href="applyleave_others">Apply Leave For other Employee</a>
				<?php } ?>
			</div>
		</div>
		<div class="dropdown">
			<button class="dropbtn">Loan Application</button>
			<div class="dropdown-content">
				<a href="apply_loan">Apply Loan</a>
				<a href="view_loan_status">View Loan Status</a>
				<?php if(Auth::user()->role == '6'){ ?>
				<a href="apply_loan_others">Apply Loan For other Employee</a>
				<?php } ?>
			</div>
		</div>		
    </div>
</div>

@endsection
