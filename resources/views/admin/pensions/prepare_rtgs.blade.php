@extends('layouts.app')

@section('htmlheader_title')
    Prepare RTGS
@endsection

@section('contentheader_title')
    Prepare RTGS
@endsection

@section('header-extra')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Zebra_datepicker/1.9.4/css/default.css">
@stop

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    Prepare RTGS
                </div>
                <!-- /.box-header -->
               
                <div class="box-header with-border">
                    {!! Form::open(array('route' => 'pension.generate.rtgs', 'id' => 'pension.generate.rtgs')) !!}
                    <div class="col-md-4">
                        <div class="control-group {{ $errors->has('name') ? 'has-error' : ''}}">
                            {!! Form::label('mothyear', 'Select Month/Year', array('class' => 'control-label')) !!}
                            <div class="controls">
                            {!! Form::text('mothyear', null, ['class' => 'monthyear col-md-12 form-control', 'id' => 'mothyear', 'placeholder' => 'Select month and year', 'autocomplete' => 'off', 'title' => 'Select month and year', 'required' => 'true']) !!}
                          </div>
                          {!! $errors->first('mothyear', '<span class="help-inline">:message</span>') !!}
                        </div>
                    </div>

                    <div class="col-md-12" style="margin-top:20px;">
                        {!! Form:: submit('Generate RTGS', ['class' => 'btn btn-success']) !!}
                        {!!form::close()!!}
                    </div>
                </div>
                <!-- /.box-body -->
                
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection

@section('scripts-extra')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Zebra_datepicker/1.9.4/javascript/zebra_datepicker.js"></script>
<script>
$('.monthyear').Zebra_DatePicker({
  format: 'Y-m'
});
</script>
@endsection