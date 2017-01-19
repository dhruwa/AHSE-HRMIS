
@extends('layouts.app')

@section('htmlheader_title')
    Post Redesignation
@endsection

@section('contentheader_title')
    Post Redesignation
@endsection

@section('main-content')

<div class="row">  
	<form action="{{action('PostController@update_post_redesignation')}}" method="post">      
		<div class="col-md-4">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Post Redesignation</h3>
				</div>
				<div class="box-body">                 
					<input type="hidden" name="_method" value="PATCH">

						{{ csrf_field() }}
						
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" name="fld_PostID"
							value="{{ $row->fld_PostID }}" />
					</div>										
					<div class="form-group has-feedback">
						Old Name
						<input type="text" class="form-control" value="{{ $row->fld_PostName }}" />
					</div>
					<div class="form-group has-feedback">
						New Name
						<input type="text" class="form-control" name="fld_PostName" data-validation="required" data-validation-error-msg="Required Field" />
					</div>
					<div class="row">                    
						<div class="col-xs-4">
							<button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
						</div>
					</div>
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
