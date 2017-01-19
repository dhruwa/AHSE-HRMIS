@extends('layouts.app')

@section('htmlheader_title')
    Add Bank and Address Details : Retired Employees 
@endsection

@section('contentheader_title')
    Add Bank and Address Details : {{ $employee->emp_f_name }} {{ $employee->emp_m_name }} {{ $employee->emp_l_name }} 
@endsection


@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    Add Bank and Address Details : {{ $employee->emp_f_name }} {{ $employee->emp_m_name }} {{ $employee->emp_l_name }} 
                </div>
               
                <div class="box-body">
                    {!! Form::open(array('route' => ['pension.post.employees.add_pension_details', Crypt::encrypt($employee->employeeId)], 'id' => 'pension.post.employees.add_pension_details', 'class' => 'form-horizontal row-border')) !!}
                    <div class="form-group {{ $errors->has('bank_details') ? 'has-error' : ''}}">
                        {!! Form::label('bank_details', '', array('class' => 'col-md-3 control-label')) !!}
                        <div class="col-md-6">
                          {!! Form::textarea('bank_details', $bank_account_details, ['class' => 'form-control required', 'id' => 'bank_details', 'placeholder' => 'Bank Details including branch, account number etc', 'autocomplete' => 'off', 'required' => 'true', 'rows' => 4]) !!}
                        </div>
                        {!! $errors->first('bank_details', '<span class="help-inline">:message</span>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('current_address') ? 'has-error' : ''}}">
                      {!! Form::label('current_address', '', array('class' => 'col-md-3 control-label')) !!}
                      <div class="col-md-6">
                        {!! Form::textarea('current_address', $address, ['class' => 'form-control required', 'id' => 'current_address', 'placeholder' => 'Current Address', 'autocomplete' => 'off', 'required' => 'true', 'rows' => 4]) !!}
                      </div>
                      {!! $errors->first('current_address', '<span class="help-inline">:message</span>') !!}
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
