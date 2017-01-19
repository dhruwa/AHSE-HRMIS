@extends('layouts.app')

@section('htmlheader_title')
    Employee Salary Increment
@endsection

@section('contentheader_title')
    Employee Salary Increment
@endsection

@section('header-extra')

@stop

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    Employee Salary Increment
                </div
                <div class="box-body">
                    <table class="table table-bordered">
					{!! Form::open(array('route' => 'pension.increment_update', 'id' => 'pension.increment_update')) !!}
                        <thead>
							<tr>
                                <th><input type="checkbox" name="check_all" id="select_all" class="minimal"> Check All </th>
								<th>Sl. No</th>
								<th>Employee Code</th>
								<th>Basic Pay</th>
							</tr>
                        </thead>
                        <tbody>
						<?php 
						$rows = DB::table('servicebooks')->where('status', '1')->orderBy('service_id', 'asc')->get();	
						$i=1;
						?>
						@foreach($rows as $r)
						<tr>
							<td><input type="checkbox" name="check_all" class="minimal checkbox" checked></td>
							<td><input type="text" class="form-control" placeholder="" name="sl_no[]" id="sl_no" value="{{ $i++ }}" readonly /></td>
							<td><input type="text" class="form-control" placeholder="" name="emp_id[]" id="emp_id" value="{{ $r->emp_id }}" readonly /></td>
							<td><input type="text" class="form-control" placeholder="" name="basic_pay[]" id="basic_pay" value="{{ $r->basic_pay }}" readonly /></td>
						</tr>
						@endforeach
                        </tbody>
                    </table>
                    <hr>
                    {!! Form::label('', '', array('class' => 'col-md-3 control-label')) !!}
                    {!! Form:: submit('Increment', ['class' => 'btn btn-success btn-lg']) !!}
                    {!!form::close()!!}
                    
                </div>
               
            </div>
        </div>
    </div>
@endsection
@section('scripts-extra')
{{--<script>--}}
    {{--$('.btn-danger').on('click', function() {--}}
        {{--swal(--}}
                {{--'Good job!',--}}
                {{--'You clicked the button!',--}}
                {{--'success'--}}
        {{--)--}}
    {{--});--}}
{{--</script>--}}

<script>
	$(".checkbox").prop('checked', true);
	$("#select_all").prop('checked', true);
	$("#select_all").change(function(){  //"select all" change
		$(".checkbox").prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status
	});

	//".checkbox" change
	$('.checkbox').change(function(){
		//uncheck "select all", if one of the listed checkbox item is unchecked
		if(false == $(this).prop("checked")){ //if this item is unchecked
			$("#select_all").prop('checked', false); //change "select all" checked status to false
		}
		//check "select all" if all checkbox items are checked
		if ($('.checkbox:checked').length == $('.checkbox').length ){
			$("#select_all").prop('checked', true);
		}
	});
</script>

@endsection