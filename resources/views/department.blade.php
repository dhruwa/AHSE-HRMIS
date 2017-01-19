
@extends('layouts.app')

@section('htmlheader_title')
    Department
@endsection

@section('contentheader_title')
    Department Master
@endsection

@section('main-content')

<body class="hold-transition register-page">
    <div class="register-box"> 
        <div class="register-box-body">
            <p class="login-box-msg">Department</p>
			
            <form action="department_store" method="post">

                {!! csrf_field() !!}

                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Department ID" name="fld_DeptID" value=""/>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Department Name" name="fld_Department" value=""/>
                </div>
				<div class="form-group has-feedback">
					<select name="fld_Status" id="fld_Status" class="form-control">
						<option value="0">Select Status</option>
						<option value="1">Active</option>
						<option value="2">Inactive</option>
					</select>
                </div>
                <div class="row">                    
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
                    </div><!-- /.col -->
                </div>
            </form>
        </div>
    </div>
    @include('layouts.partials.scripts_auth')
</body>
@endsection
