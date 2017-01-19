@extends('layouts.app')

@section('htmlheader_title')
    Edit Pension Data 
@endsection

@section('contentheader_title')
    Edit Pension Data
@endsection

@section('header-extra')
<link href="{{ asset('/css/datepicker3.css') }}" rel="stylesheet" type="text/css"/>
@stop
@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    Edit Pension Data
                </div>
               
                <div class="box-body">
                    {!! Form::model($pension, array('route' => ['update.pension_data', $id], 'id' => 'update.pension_data', 'class' => 'form-horizontal row-border', 'method' => 'POST')) !!}
                    <div class="form-group {{ $errors->has('pension_order_number') ? 'has-error' : ''}}">
                        {!! Form::label('pension_order_number', '', array('class' => 'col-md-3 control-label')) !!}
                        <div class="col-md-6">
                          {!! Form::text('pension_order_number', null, ['class' => 'form-control required', 'id' => 'bank_details', 'required' => 'true']) !!}
                        </div>
                        {!! $errors->first('pension_order_number', '<span class="help-inline">:message</span>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('pension_order_date') ? 'has-error' : ''}}">
                      {!! Form::label('pension_order_date', '', array('class' => 'col-md-3 control-label')) !!}
                      <div class="col-md-6">
                        {!! Form::text('pension_order_date', null, ['class' => 'datepicker form-control required', 'id' => 'pension_order_date', 'autocomplete' => 'off', 'required' => 'true']) !!}
                      </div>
                      {!! $errors->first('pension_order_date', '<span class="help-inline">:message</span>') !!}
                    </div>
                    <?php 
                        $pension_types['SP'] = 'SP'; 
                        $pension_types['FP'] = 'FP'; 
                    ?>
                    <div class="form-group {{ $errors->has('pension_type') ? 'has-error' : ''}}">
                      {!! Form::label('pension_type', '', array('class' => 'col-md-3 control-label')) !!}
                      <div class="col-md-4">
                        {!! Form::select('pension_type',$pension_types,null, ['class' => 'form-control required', 'id' => 'pension_type', 'autocomplete' => 'off', 'required' => 'true']) !!}
                      </div>
                      {!! $errors->first('pension_type', '<span class="help-inline">:message</span>') !!}
                    </div>

                    <div class="form-group {{ $errors->has('dr') ? 'has-error' : ''}}">
                      {!! Form::label('dr', 'DR', array('class' => 'col-md-3 control-label')) !!}
                      <div class="col-md-4">
                        {!! Form::text('dr', null, ['class' => 'form-control required', 'id' => 'da', 'autocomplete' => 'off', 'required' => 'true','onkeyup' => "calculateTotal()"]) !!}
                      </div>
                      <div class="col-md-2"><span class="help-inline">%</span></div> 
                      {!! $errors->first('dr', '<span class="help-inline">:message</span>') !!}
                    </div>

                    <div class="form-group {{ $errors->has('medical') ? 'has-error' : ''}}">
                      {!! Form::label('medical', '', array('class' => 'col-md-3 control-label')) !!}
                      <div class="col-md-4">
                        {!! Form::text('medical', null, ['class' => 'form-control required', 'id' => 'medical', 'autocomplete' => 'off', 'required' => 'true','onkeyup' => "calculateTotal()"]) !!}
                      </div>

                      {!! $errors->first('medical', '<span class="help-inline">:message</span>') !!}
                    </div>

                    <div class="form-group {{ $errors->has('basic') ? 'has-error' : ''}}">
                      {!! Form::label('basic', '', array('class' => 'col-md-3 control-label')) !!}
                      <div class="col-md-4">
                        {!! Form::text('basic', null, ['class' => 'form-control required', 'id' => 'basic', 'autocomplete' => 'off', 'required' => 'true', 'onkeyup' => "calculateTotal()"]) !!}
                      </div>

                      {!! $errors->first('basic', '<span class="help-inline">:message</span>') !!}
                    </div>

                    <div class="form-group {{ $errors->has('pension') ? 'has-error' : ''}}">
                      {!! Form::label('pension', '', array('class' => 'col-md-3 control-label')) !!}
                      <div class="col-md-4">
                        {!! Form::text('pension', null, ['class' => 'form-control required', 'id' => 'pension_amount', 'autocomplete' => 'off', 'required' => 'true', 'onkeyup' => "calculateTotal()"]) !!}
                      </div>

                      {!! $errors->first('pension', '<span class="help-inline">:message</span>') !!}
                    </div>

                    <div class="form-group {{ $errors->has('total_pension') ? 'has-error' : ''}}">
                      {!! Form::label('total_pension', '', array('class' => 'col-md-3 control-label')) !!}
                      <div class="col-md-4">
                        {!! Form::text('total_pension', null, ['class' => 'form-control required', 'id' => 'total_pension', 'autocomplete' => 'off', 'required' => 'true']) !!}
                      </div>

                      {!! $errors->first('total_pension', '<span class="help-inline">:message</span>') !!}
                    </div>

                    {!! Form::label('', '', array('class' => 'col-md-4 control-label')) !!}
                    {!! Form:: submit('Update Info', ['class' => 'btn btn-success']) !!}

                    {!!form::close()!!}
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection

@section('scripts-extra')
<script>
$('.datepicker').datepicker({
    autoclose: true,
    format: 'dd-mm-yyyy'
});

function calculateTotal() {
    var $total = 0;
    var $basic = 0;
    var $pension = 0;
    var $da      = $('#da').val(); 
    var $medical = $('#medical').val();

    if( $('#da').val() !='' &&  typeof $('#da').val() != 'undefined' ) {
        $da = $('#da').val();
    }

    if( $('#medical').val() !='' &&  typeof $('#medical').val() != 'undefined' ) {
        $medical = $('#medical').val();
    }

    if( $('#basic').val() !='' &&  typeof $('#basic').val() != 'undefined' ) {
        $basic = $('#basic').val();
    }

    if( $('#pension_amount').val() !='' && typeof $('#pension_amount').val() != 'undefined' ) {
        $pension = $('#pension_amount').val();
    }

    $total = parseFloat($pension)+parseFloat($basic*($da/100)) + parseFloat($medical);
    console.log(Math.round($total));
    $('#total_pension').val( Math.round($total) );
}
</script>
@stop
