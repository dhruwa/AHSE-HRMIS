
@extends('layouts.app')

@section('htmlheader_title')
    Post Master
@endsection

@section('contentheader_title')
    Post Master
@endsection

@section('main-content')
<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="js/bootstrap-datepicker.js"></script>

<div class="row">
	<form action="poststore" method="post">
		<div class="col-md-4">
			<div class="box box-primary">
				<div class="box-header with-border">
				   <h3 class="box-title">Post Master</h3>
				</div>
				<div class="box-body">	
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="Post Name" name="fld_PostName" data-validation="required" data-validation-error-msg="This Field is Required"/>
					</div> 
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="Grade Pay" name="fld_GradePay" data-validation="number" data-validation-error-msg="Input Should be Numeric Value"/>
					</div>					
				</div>
				<div class="form-group has-feedback">
					<input type="text" class="form-control" placeholder="Sanction No" name="fld_SanctionNo" value=""/>
				</div> 
				<div class="form-group has-feedback">
					<input type="text" class="form-control" placeholder="Sanction Date" name="fld_SanctionDate" id="fld_SanctionDate" value=""/>
					<script type="text/javascript"> $('#fld_SanctionDate').datepicker({format: 'yyyy/mm/dd'});</script>
				</div>
				<div class="form-group has-feedback">
					<input type="text" class="form-control" placeholder="Pay Scale(Lower Limit)" name="fld_PayScale_lower_limit" id="fld_PayScale" data-validation="number" data-validation-error-msg="Input Should be Numeric Value"/>
				</div>
				<div class="form-group has-feedback">
					<input type="text" class="form-control" placeholder="Pay Scale(Upper Limit)" name="fld_PayScale_uper_limit" id="fld_PayScale" data-validation="number" data-validation-error-msg="Input Should be Numeric Value"/>
				</div>
				<div class="form-group has-feedback">
					<input type="hidden" class="form-control" placeholder="Date Of Increament" name="fld_Status" id="fld_Status" value="1"/>
				</div>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="col-xs-4">
					<button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
				</div>
			</div>
		</div>
	</form>
</div>
<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
<script src="js/jquery.form-validator.min.js" type="text/javascript"></script>
	<script>
        $.validate({
        });
    </script>
@include('layouts.partials.scripts_auth')

@endsection
