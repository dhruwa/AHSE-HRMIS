
@extends('layouts.app')

@section('htmlheader_title')
    Service Book Master
@endsection

@section('contentheader_title')
    Service Book Master
@endsection

@section('main-content')
<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="js/bootstrap-datepicker.js"></script>
<script>	
	$(document).ready(function() {
		$('select[name="emp_id"]').on('change', function() {
			var emp_id = $(this).val();
			if(emp_id) {
				$.ajax({
					url: 'employee_name/'+emp_id,
					type: "GET",						
					dataType: "json",
					success:function(data) {
						console.log(data);
						$.each(data, function() {	
							document.getElementById('firstname').value = data.emp_f_name;
							document.getElementById('middlename').value = data.emp_m_name;
							document.getElementById('lastname').value = data.emp_l_name;
						});
					}
				});
			}					
		});
	});
	
	$(document).ready(function() {
		$('select[name="emp_pf_category"]').on('change', function() {
			var emp_pf_category = $(this).val();
			console.log(emp_pf_category);
			if(emp_pf_category == 'GPF'){
				document.getElementById('nps_persentage').value = 0;
				document.getElementById('gpf_persentage').value = '';
			}
			else{
				document.getElementById('gpf_persentage').value = 0;
				document.getElementById('nps_persentage').value = '';
			}
		});
	});
	
	$(document).ready(function() {
		$('select[name="post_id"]').on('change', function() {
			var post_id = $(this).val();
			if(post_id) {
				$.ajax({
					url: 'post_scale/'+post_id,
					type: "GET",						
					dataType: "json",
					success:function(data) {
						console.log(data);
						$.each(data, function() {	
							document.getElementById('scale').value = data.fld_PayScale;							
						});
					}
				});
			}					
		});
	});
	
	function getBasicpay(){			
		var initial_pay = parseFloat(document.getElementById('initial_pay').value);
		var grade_pay = parseFloat(document.getElementById('grade_pay').value);
		var basic_pay = initial_pay + grade_pay;
		var da_persentage = parseFloat(document.getElementById('da_persentage').value);
		var da = (da_persentage/100) * basic_pay;
		document.getElementById('basic_pay').value = basic_pay;
		document.getElementById('da').value = da;
	}	
</script>
<style>
	form div.required fieldset legend,form div.required label,label.required{font-weight:700}
</style>
<div class="row">
	<form action="serviceinsert" enctype="multipart/form-data" method="post">
		<div class="col-md-4">
			<div class="box box-primary">
				<div class="box-header with-border">
				   <h3 class="box-title">Service Book Master</h3>
				</div>
				<div class="box-body">
					<!--<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="Qualification" name="emp_qualification_id" value=""/>
					</div>-->					
					<div class="required">
						<div class="form-group has-feedback">
							<select required x-moz-errormessage="Please Select an item from the list" name="emp_id" id="emp_id" class="form-control">
								<option value="">Select Employee ID</option>
								<?php
									$users = DB::table('employees')->get();							
									foreach ($users as $user)
									{ 
										?>
											<option value="{{ $user->emp_id }}">{{ $user->emp_id }}</option>
										<?php 
									}														
								?>												
							</select>
						</div>	
					</div>
					<div class="required">
						<div class="form-group has-feedback">
							<select required x-moz-errormessage="Please Select an item from the list" name="dept_id" id="dept_id" class="form-control">
								<option value="">Select Department</option>
								<?php
									$users = DB::table('departments')->get();							
									foreach ($users as $user) { ?>
										<option value="{{ $user->fld_DeptID }}">{{ $user->fld_Department }}</option>
								<?php }	?>												
							</select>
						</div>
					</div>
					<div class="required">
						<div class="form-group has-feedback">
							<select required x-moz-errormessage="Please Select an item from the list" name="post_id" id="post_id" class="form-control">
								<option value="">Select Post</option>
								<?php
									$users = DB::table('posts')->where('fld_Status', 1)->get();							
									foreach ($users as $user) 
									{ ?>
										<option value="{{ $user->fld_PostID }}">{{ $user->fld_PostName }}</option>
								<?php }	?>												
							</select>
						</div>
					</div>
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="First Name" name="firstname" id="firstname" data-validation="required" data-validation-error-msg="This Field is Required" readonly />
					</div>
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="Middle Name" name="middlename" id="middlename" value="" readonly />
					</div>
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="Last Name" name="lastname" id="lastname" value="" readonly />
					</div>
					<div class="required">
						<div class="form-group has-feedback">
							<select name="emp_type" id="emp_type" class="form-control" onkeyup="getBasicpay();" data-validation="required" data-validation-error-msg="This field is Required">
								<option value="">Select Employee Type</option>
								<option value="Permanent">Permanent</option>
								<option value="Casual">Casual</option>					
							</select>
						</div>
					</div>
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="Application Id" name="application_id" onkeyup="getBasicpay();"/>
					</div>
					<div class="form-group has-feedback">
						Initaial Pay
						<input type="text" class="form-control" placeholder="" name="initial_pay" id="initial_pay" onkeyup="getBasicpay();" data-validation="number" data-validation-error-msg="Input Should be Numeric Value"/>
					</div>
					<div class="form-group has-feedback">
						Grade Pay
						<input type="text" class="form-control" placeholder="" name="grade_pay" id="grade_pay" onkeyup="getBasicpay();"  data-validation="number" data-validation-error-msg="Input Should be Numeric Value"/>
					</div>					
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="box box-primary">            
				<div class="box-body">
					<div class="form-group has-feedback">
						<?php $da = DB::table('parameter_values')->where([['parameter_id', '1'],['status', '1']])->first();?>
						<input type="hidden" class="form-control" placeholder="DA" name="da_persentage" id="da_persentage" value="{{ $da->value }}" onkeyup="getBasicpay();" readonly />						
					</div>
					<div class="form-group has-feedback">
						Dearness Allowance
						<input type="text" class="form-control" placeholder="Dearness Allowance" name="da" id="da" readonly />						
					</div>
					<div class="form-group has-feedback">
						Basic Pay
						<input type="text" class="form-control" placeholder="Basic Pay" name="basic_pay" id="basic_pay" readonly />
					</div>					
					<div class="form-group has-feedback">
						Pay Scale
						<input type="text" class="form-control" placeholder="Scale" name="scale" id="scale" value="" readonly />
					</div> 
					<div class="form-group has-feedback">
						<select name="emp_pf_category" id="emp_type" class="form-control" data-validation="required" data-validation-error-msg="This field is Required">
							<option value="">Provident Fund Category</option>
							<option value="GPF">GPF</option>
							<option value="NPS">NPS</option>					
						</select>
					</div>
					<div class="form-group has-feedback">
						GPF Persentage
						<input type="text" class="form-control" placeholder="GPF Persentage" name="gpf_persentage" id="gpf_persentage" data-validation="number" data-validation-error-msg="Input Should be Numeric Value" />
					</div>
					<div class="form-group has-feedback">
						NPS Persentage
						<input type="text" class="form-control" placeholder="NPS Persentage" name="nps_persentage" id="nps_persentage" data-validation="number" data-validation-error-msg="Input Should be Numeric Value" />
					</div>
					<div class="form-group has-feedback">
						Date of Appointment
						<input type="text" class="form-control" placeholder="Date of Appointment" name="doa" id="doa" value=""/>
						<script type="text/javascript"> $('#doa').datepicker({format: 'yyyy/mm/dd'});</script>
					</div>
					<div class="form-group has-feedback">
						Date of Joining
						<input type="text" class="form-control" placeholder="Date of Joining" name="doj" id="doj" value=""/>
						<script type="text/javascript"> $('#doj').datepicker({format: 'yyyy/mm/dd'});</script> 
					</div>
					<div class="form-group has-feedback">
						Service Image
						<input type="file" class="form-control" placeholder="Service Image" name="service_image" value=""/>
					</div>					
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="box box-primary">            
				<div class="box-body">
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="Remarks" name="remarks" value=""/>
					</div>
					<div class="form-group has-feedback">
						Date of Promotion
						<input type="text" class="form-control" placeholder="Date of Promotion" name="dop" id="dop" value=""/>
						<script type="text/javascript"> $('#dop').datepicker({format: 'yyyy/mm/dd'});</script>
					</div> 
					<div class="form-group has-feedback">
						Date of Lien
						<input type="text" class="form-control" placeholder="Date of Lien" name="dol" id="dol" value=""/>
						<script type="text/javascript"> $('#dol').datepicker({format: 'yyyy/mm/dd'});</script>
					</div>
					<div class="form-group has-feedback">
						Date of Increament
						<input type="text" class="form-control" placeholder="Date of Increament" name="doi" id="doi" value=""/>
						<script type="text/javascript"> $('#doi').datepicker({format: 'yyyy/mm/dd'});</script>
					</div>
					<div class="form-group has-feedback">
						Date of Retirement
						<input type="text" class="form-control" placeholder="Date of Retirement" name="dor" id="dor" value=""/>
						<script type="text/javascript"> $('#dor').datepicker({format: 'yyyy/mm/dd'});</script>
					</div>
					<!--<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="Leave" name="leave_id" value=""/>
					</div>
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="No of Days" name="no_of_days" value=""/>
					</div>
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="Month" name="month" value=""/>
					</div>
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="Year" name="year" value=""/>
					</div>-->			
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" placeholder="Status" name="status" value="1"/>
					</div>
				</div>
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="row">                    
					<div class="col-xs-4">
						<button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
					</div>
				</div>		
			</div>
		</div>
	</form>
</div>
<script src="js/jquery.form-validator.min.js" type="text/javascript"></script>
<script>
    $.validate({
    });
</script>
@include('layouts.partials.scripts_auth')
</body>

@endsection
