
@extends('layouts.app')

@section('htmlheader_title')
    Promotion
@endsection

@section('contentheader_title')
    Promotion
@endsection

@section('main-content')
<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
<script>
	$(document).ready(function() {  
		$(document).ready(function() {
			$('select[name="emp_id"]').on('change', function() {
				var emp_id = $(this).val();
				if(emp_id) {
					$.ajax({
						url: 'employee_name/'+emp_id,
						type: "GET",						
						dataType: "json",
						success:function(data) {
							//console.log(data);
							$.each(data, function() {	
								document.getElementById('firstname').value = data.emp_f_name;
								document.getElementById('middlename').value = data.emp_m_name;
								document.getElementById('lastname').value = data.emp_l_name;
								document.getElementById('current_post_id').value = data.post_id;
								var post_id = data.post_id;
								if(post_id){
									$.ajax({
										url: 'post_name/'+post_id,
										type: "GET",						
										dataType: "json",
										success:function(name) {
											console.log(name);
											document.getElementById('current_post_name').value = name.fld_PostName;
										}
									});
								}
							});
						}
					});
				}					
			});
		});
	});
	
	$(document).ready(function() {  
		$(document).ready(function() {
			$('select[name="new_post_id"]').on('change', function() {
				var fld_PostID = $(this).val();
				console.log(fld_PostID);
				if(fld_PostID) {
					$.ajax({
						url: 'pay_scale/'+fld_PostID,
						type: "GET",						
						dataType: "json",
						success:function(data) {
							console.log(data);
							$.each(data, function() {
								document.getElementById('scale').value = data.fld_PayScale;
								document.getElementById('grade_pay').value = data.fld_GradePay;
							});
						}
					});
				}					
			});
		});
	});
</script>
<body class="hold-transition register-page">
    <div class="register-box">        
        <div class="register-box-body">
            <p class="login-box-msg">Promotion</p>
            <form action="promotion_store" method="post">
				<div class="form-group has-feedback">
					<select name="emp_id" id="emp_id" class="form-control">
						<option value="0">Select Employee ID</option>
						<?php
							$users = DB::table('employees')->get();							
							foreach ($users as $user)
							{ 
								?>
									<option value="{{ $user->emp_id}}">{{ $user->emp_id }}</option>									
								<?php
							}														
						?>												
					</select>
				</div>
				<div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="First Name" name="firstname" id="firstname" value="" readonly />
                </div>
				<div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Middle Name" name="middlename" id="middlename" value="" readonly />
                </div>
				<div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Last Name" name="lastname" id="lastname" value="" readonly />
                </div>
				<div class="form-group has-feedback">
                    <input type="hidden" class="form-control" placeholder="" name="current_post_id" id="current_post_id" value="" readonly />
                </div>
				<div class="form-group has-feedback">
					Current Designation
                    <input type="text" class="form-control" placeholder="" name="current_post_name" id="current_post_name" value="" readonly />
                </div>
				
				<div class="form-group has-feedback">
					<select name="new_post_id" id="new_post_id" class="form-control">
						New Designation
						<option value="0">Select Post</option>
						<?php
							$users = DB::table('posts')->get();							
							foreach ($users as $user)
							{ 
								?>
									<option value="{{ $user->fld_PostID}}">{{ $user->fld_PostName }}</option>
								<?php
							}														
						?>												
					</select>
				</div>
				<div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Pay Scale" name="scale" id="scale" value=""/>
				</div>
				<div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Grade Pay" name="grade_pay" id="grade_pay" value=""/>
				</div>
				<div class="form-group has-feedback">
                    <input type="hidden" class="form-control" placeholder="Profession" name="submission_date" value="<?php echo date('Y/m/d'); ?>"/>
				</div>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">                    
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @include('layouts.partials.scripts_auth')
</body>
@endsection
