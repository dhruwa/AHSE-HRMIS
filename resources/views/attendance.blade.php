
@extends('layouts.app')

@section('htmlheader_title')
    Attendance Master
@endsection

@section('contentheader_title')
    Attendance Master 
@endsection

@section('main-content')

    <body class="hold-transition register-page">
    <div class="register-box">       
        
        <div class="register-box-body">
            <p class="login-box-msg">Attendance Master </p>
            <form action="attendanceentry" method="post" enctype="multipart/form-data">

                {!! csrf_field() !!}
				
				<div class="form-group has-feedback">
					<input type="file" name="import_file" /></br>
				</div>
                <div class="form-group has-feedback">
                    <b>Month</b>
					<select name="month" id="month" class="form-control">
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
				<div class="form-group has-feedback">
                    <b>Year</b>
					<select name="year" id="year" class="form-control">
						<option value="0">Select Year</option>
						<option value="2016">2016</option>
						<option value="2017">2017</option>
						<option value="2018">2018</option>
						<option value="2019">2019</option>
						<option value="2020">2020</option>
						<option value="2021">2021</option>
						<option value="2022">2022</option>
						<option value="2023">2023</option>
						<option value="2024">2024</option>
						<option value="2025">2025</option>
						<option value="2026">2026</option>
						<option value="2027">2027</option>
						<option value="2028">2028</option>
					</select>
                </div>
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
