@extends('layouts.app')
@section('htmlheader_title')
    Salary Claim
@endsection
@section('contentheader_title')
    Salary Claim
@endsection
@section('main-content')

<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>

<div class="row">
	<form action="insert_sallary_claim"  method="post">			
        <div class="col-md-12">			
            <div class="box box-primary">
				<div class="col-md-4">
					<div class="form-group has-feedback">
						<b>Month</b>
						<select name="month[]" id="month" class="form-control">
							<option value="0">Select month</option>
							<option value="January">January</option>
							<option value="February">February</option>
							<option value="March">March</option>
							<option value="April">April</option>
							<option value="May">May</option>
							<option value="June">June</option>
							<option value="July">July</option>
							<option value="August">August</option>
							<option value="September">September</option>
							<option value="October">October</option>
							<option value="November">November</option>
							<option value="December">December</option>
						</select>
					</div>
				</div>
				<div class="col-md-4">
					<b>Year</b>
					<input type="text" class="form-control" placeholder="Year" value="" name="year[]" id="year" />
				</div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>						
							<tr>
								<th>Name</th>
								<th>Basic Pay</th>
								<th>DA</th>
								<th>HRA</th>
								<th>Medical Allowance</th>
								<th>Conveyance Allowance</th>
								<th>City Allowance</th>
								<th>Other Allowance</th>
								<!--<th>Gross Total</th>-->
							</tr>
							@foreach ($views as $employee)							
                            <tr>
                                <td><input type="hidden" class="form-control" placeholder="" name="emp_id[]" id="emp_id" onkeyup="" value="{{$employee->emp_id}}" readonly />
								{{ $employee->emp_f_name }} {{ $employee->emp_m_name }} {{ $employee->emp_l_name }}</td>								
								
								<?php
									$rows = DB::table('servicebooks')->where('emp_id', $employee->emp_id)->orderBy('service_id', 'asc')->get();	
									$i=0;
									foreach($rows as $r){
										
									$hra= (15/100)*$r->basic_pay;
									$medical_allowance = 750;
									$conveyance_allowance = 1200;
									$city_allowance = 0;
									$others = 0;
									$i++;
								?>
								
								<?php } ?>	
								<td><input type="text" class="form-control" placeholder="" value="{{ $r->basic_pay }}" name="basic_pay[]" id="basic_pay<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" readonly /></td>
								<td><input type="text" class="form-control" placeholder="" value="{{ $r->da }}" name="dearness_allowance[]" id="dearness_allowance<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" readonly /></td>
								<td><input type="text" class="form-control" placeholder="" value="{{ $hra }}" name="hra[]" id="hra<?php echo $i ?>" onkeyup="getGrossSalary();" readonly /></td>
								<td><input type="text" class="form-control" placeholder="" value="{{ $medical_allowance }}" name="medical_allowance[]" id="medical_allowance<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" readonly /></td>
								<td><input type="text" class="form-control" placeholder="" value="{{ $conveyance_allowance }}" name="conveyance_allowance[]" id="conveyance_allowance<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" readonly /></td>
								<td><input type="text" class="form-control" placeholder="" value="{{ $city_allowance }}" name="city_allowance[]" id="city_allowance<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();"  /></td>
								<td><input type="text" class="form-control" placeholder="" value="{{ $others }}" name="others[]" id="others<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();"  /></td>
								<!--<td><input type="text" class="form-control" placeholder="" value="0" name="gross_salary[]" id="gross_salary<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();"  /></td>-->
							</tr>
							<script>
								function getGrossSalary<?php echo $i ?>(){
									var basic_pay = parseFloat(document.getElementById('basic_pay<?php echo $i ?>').value);
									console.log(basic_pay);
									var dearness_allowance = parseFloat(document.getElementById('dearness_allowance<?php echo $i ?>').value);
									var hra = parseFloat(document.getElementById('hra<?php echo $i ?>').value);
									var medical_allowance = parseFloat(document.getElementById('medical_allowance<?php echo $i ?>').value);
									var conveyance_allowance = parseFloat(document.getElementById('conveyance_allowance<?php echo $i ?>').value);
									var city_allowance = parseFloat(document.getElementById('city_allowance<?php echo $i ?>').value);
									var others = parseFloat(document.getElementById('others<?php echo $i ?>').value);
									var gross_salary = basic_pay + dearness_allowance + hra + medical_allowance + conveyance_allowance + city_allowance + others;
									document.getElementById('gross_salary<?php echo $i ?>').value = gross_salary;
								}	
							</script>
							@endforeach
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							
							<div class="row">                    
								<div class="col-xs-4">
									<button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
								</div>
							</div>
                        </tbody>
                    </table>
                </div>                
            </div>            
        </div>
	</form>
</div>

    @include('layouts.partials.scripts_auth')
@endsection
