
@extends('layouts.app')

@section('htmlheader_title')
    Scale Revision
@endsection

@section('contentheader_title')
    Scale Revision
@endsection

@section('main-content')
<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="js/bootstrap-datepicker.js"></script>
<script>
	$(document).ready(function() {
		$('select[name="PayScale_lower_limit"]').on('change', function() {
			var PayScale_lower_limit = $(this).val();
			console.log(PayScale_lower_limit);
			if(PayScale_lower_limit) {
				$.ajax({
					url: 'get_PayScale_upper_limit/'+PayScale_lower_limit,
					type: "GET",						
					dataType: "json",
					success:function(data) {
						console.log(data);
						$.each(data, function() {	
							document.getElementById('PayScale_uper_limit').value = data.fld_PayScale_uper_limit;							
						});
					}
				});
			}			
		});
	});
</script>

<body class="hold-transition register-page">
    <div class="register-box">        
        <div class="register-box-body">
            <p class="login-box-msg">Scale Revision</p>
            <form action="{{action('PostController@scale_revision_update')}}" method="post">
				
				<input type="hidden" name="_method" value="PATCH">

						{{ csrf_field() }}
						
				<div class="form-group has-feedback">
					Scale Lower Limit
					<select name="PayScale_lower_limit" id="PayScale_lower_limit" class="form-control" data-validation="required" data-validation-error-msg="Required Field">
						<option value="">Select Scale Lower Limit</option>
						<?php
							$users = DB::table('posts')->distinct()->get(['fld_PayScale_lower_limit']);							
							foreach ($users as $user)
							{ 
								?>
									<option value="{{ $user->fld_PayScale_lower_limit}}">{{ $user->fld_PayScale_lower_limit }}</option>									
								<?php
							}														
						?>												
					</select>
				</div>
				<div class="form-group has-feedback">
					Scale Upper Limit
					<input type="text" class="form-control" placeholder="" name="PayScale_uper_limit" id="PayScale_uper_limit" readonly />
				</div>
				<div class="form-group has-feedback">
					New Scale Lower Limit
					<input type="text" class="form-control" placeholder="" name="fld_PayScale_lower_limit" id="fld_PayScale_lower_limit" data-validation="number" data-validation-error-msg="Numeric Value Only" />
				</div>
				<div class="form-group has-feedback">
					New Scale Upper Limit
					<input type="text" class="form-control" placeholder="" name="fld_PayScale_uper_limit" id="fld_PayScale_uper_limit" data-validation="number" data-validation-error-msg="Numeric Value Only" />
				</div>				
				<div class="row">                    
					<div class="col-xs-4">
						<button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
					</div>
				</div>
            </form>
        </div>
    </div>
	<script src="js/jquery.form-validator.min.js" type="text/javascript"></script>
	<script>
        $.validate({
        });
    </script>
    @include('layouts.partials.scripts_auth')
</body>
@endsection
