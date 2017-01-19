<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {

    if (Auth::check()) {
        return redirect('/dashboard');
    }
    return view('auth.login');
});

Route::get('/home', function () {
    return redirect('/dashboard');
});

Route::auth();

//Appointment 
Route::get('appointment_master', 'AppointmentController@index');
Route::post('appointment_insert', 'AppointmentController@appointment_insert');
Route::get('appointment_view', 'AppointmentController@appointment_view');

//Salary Calculation
Route::get('salary_claim', 'SalaryController@salary_claim');
Route::get('salary_calculation/{emp_id}', 'SalaryController@getrecord');
Route::post('insert_sallary_claim', 'SalaryController@insert_sallary_claim');
Route::get('salary_view', 'SalaryController@salary_view');
Route::get('salary_deduction', 'SalaryController@salary_deduction');
Route::get('loan_calculation/{emp_id}', 'SalaryController@loan_calculation');
Route::get('housing_loan/{emp_id}', 'SalaryController@housing_loan');
Route::get('car_loan/{emp_id}', 'SalaryController@car_loan');
Route::get('bike_loan/{emp_id}', 'SalaryController@bike_loan');
Route::post('salary_deduction_insert', 'SalaryController@salary_deduction_insert');
Route::get('salary_details/{emp_id}', 'SalaryController@edit_salary');
Route::get('salary_claim_batch', 'SalaryController@salary_claim_batch');
Route::get('salary_claim_edit', 'SalaryController@salary_edit');
Route::get('salary_details/{emp_id}/{month}/{year}', 'SalaryController@salary_details');
Route::post('update_sallary_claim', 'SalaryController@update_sallary_claim');
Route::get('salary_deduction_edit', 'SalaryController@salary_deduction_edit');
Route::get('salary_deduction_details/{emp_id}', 'SalaryController@salary_deduction_details');
Route::post('salary_deduction_update', 'SalaryController@salary_deduction_update');
Route::get('generate_rtgs', 'SalaryController@generate_rtgs');
Route::get('generate_rtgs_insert', 'SalaryController@generate_rtgs_insert');
Route::get('calculate_salary/{month}/{year}', 'SalaryController@calculate_salary');
Route::get('rtgs', 'SalaryController@rtgs');
Route::post('rtgs', 'SalaryController@rtgs');
Route::get('salary_statement', 'SalaryController@salary_statement');
Route::post('generate_salary_statement', 'SalaryController@generate_salary_statement');
Route::get('kss_upload', 'SalaryController@kss_upload');
Route::post('kss_insert', 'AttendanceController@kss_insert');

//Loan
Route::get('apply_loan', 'LoanController@index');
Route::post('loaninsert', 'LoanController@loaninsert');
Route::get('apply_loan_view', 'LoanController@apply_loan_view');
Route::get('show_loan_details/{loan_transection_id}', 'LoanController@show_loan_details');
Route::patch('loan_forward', 'LoanController@loan_forward');
Route::get('loanapplication', 'LoanController@loanapplication');
Route::get('show_loan_detail/{loan_transection_id}', 'LoanController@show_loan_detail');
Route::get('approved_loan/{loan_transection_id}', 'LoanController@approved_loan');
Route::get('rejected_loan/{loan_transection_id}', 'LoanController@rejected_loan');
Route::get('back_to_branch_loan/{loan_transection_id}', 'LoanController@back_to_branch_loan');
Route::get('interest/{loan_type_id}', 'LoanController@interest');
Route::get('view_loan_status', 'LoanController@view_loan_status');

//Leave
Route::get('leave_add', 'LeaveController@leave_add');
Route::post('add_leave', 'LeaveController@add_leave');
Route::get('applyleave', 'LeaveController@index');
Route::get('view_leave_status', 'LeaveController@view_leave_status');
Route::get('view_available_leave', 'LeaveController@view_available_leave');
Route::post('leaveapply', 'LeaveController@leaveapply');
Route::get('viewapplyleave', 'LeaveController@viewapplyleave');
Route::get('show/{leave_transaction_id}', 'LeaveController@show_details');
Route::patch('forward', 'LeaveController@forward');
Route::get('manageleave', 'LeaveController@manageleave');
Route::get('show_leave_details/{leave_transaction_id}', 'LeaveController@show_leave_details');
Route::patch('brforward', 'LeaveController@brforward');
Route::get('leaveapplication', 'LeaveController@leaveapplication');
Route::get('show_leave/{leave_transaction_id}', 'LeaveController@show_leave');
Route::get('approved/{leave_transaction_id}', 'LeaveController@approved');
Route::get('rejected/{leave_transaction_id}', 'LeaveController@reject');
Route::get('back_to_branch/{leave_transaction_id}', 'LeaveController@backtobranch');
Route::get('show_balance_leave/{emp_id}/{leave_type_id}', 'LeaveController@show_balance_leave');

//Attendance
Route::get('showattendance', 'AttendanceController@showattendance');
Route::get('showattendanceform', 'AttendanceController@showattendanceform');
Route::post('attendanceentry', 'AttendanceController@attendanceentry');
Route::get('check_leave/{emp_id}', 'AttendanceController@check_leave');

//Import Excel Test
Route::get('importExport', 'MaatwebsiteDemoController@importExport');
Route::post('importExcel', 'MaatwebsiteDemoController@importExcel');

//Member
Route::get('member', 'MemberController@index');   // Member registration
Route::post('insert', 'MemberController@insert');
Route::get('edit_user/{user_id}', 'MemberController@member_edit');
Route::patch('update_user', 'MemberController@update_user');
Route::get('delete_user/{user_id}', 'MemberController@member_delete');
Route::get('memberview', 'MemberController@memberview');
Route::get('employee_name/{emp_id}', 'MemberController@getname');

//Service Book
Route::get('servicebook', 'ServicebookController@index');   // Service book
Route::get('servicebookview', 'ServicebookController@servicebookview');
Route::get('details/{emp_id}', 'ServicebookController@detail');
Route::get('view/{service_id}', 'ServicebookController@servicebook_detail_view');
Route::post('serviceinsert', 'ServicebookController@serviceinsert');
Route::get('post_scale/{post_id}', 'ServicebookController@post_scale');

//Dependant
Route::resource('dependantview', 'DependantController@dependantview');  // Dependant
Route::get('dependant', 'DependantController@index');  // Dependant
Route::get('edit_dependant/{dependant_id}', 'DependantController@edit_dependant');
Route::patch('update_dependant', 'DependantController@update_dependant');
Route::get('delete_dependant/{dependant_id}', 'DependantController@delete_dependant');
Route::post('dependantinsert', 'DependantController@dependantinsert');

//Login (Defult Laravel)
Route::get('/dashboard', 'HomeController@index');   // Defult
Route::resource('profile', 'ProfileController');
Route::patch('profile/{profile}/password', 'ProfileController@update_password');
Route::resource('admin', 'AdminController');

//Qualification
Route::get('qualification', 'QualificationController@index');   // return to qualification view
Route::post('store', 'QualificationController@store');          // store data to qualifications table
Route::get('delete/{qualification_id}', 'QualificationController@delete_qualification');
Route::get('edit/{qualification_id}', 'QualificationController@edit_qualification');
Route::patch('update_qualification', 'QualificationController@update_qualification');
Route::resource('qualification_view', 'QualificationViewController');

//Employee
Route::get('employee', 'EmployeeController@index');   // return to employee view
Route::post('empstore', 'EmployeeController@empstore');          // store data to employees table
Route::resource('employee_view', 'EmployeeViewController');
Route::get('emp_show/{emp_id}', 'EmployeeViewController@show');
Route::get('emp_delete/{del_emp_id}', 'EmployeeController@delete_employee');
Route::get('emp_edit/{emp_id}', 'EmployeeController@edit_employee');
Route::patch('update_employee', 'EmployeeController@update_employee');
Route::get('employee_lic', 'EmployeeController@employee_lic'); 

//Post
Route::get('post', 'PostController@index');
Route::post('poststore', 'PostController@poststore');
Route::get('post_view', 'PostController@post_view');
Route::get('post_redesignation/{fld_PostID}', 'PostController@post_redesignation');
Route::patch('update_post_redesignation', 'PostController@update_post_redesignation');
Route::patch('scale_revision_update', 'PostController@scale_revision_update');
Route::get('department', 'PostController@department');
Route::post('department_store', 'PostController@department_store');
Route::get('department_view', 'PostController@department_view');
Route::get('department_delete/{fld_DeptID}', 'PostController@department_delete');
Route::get('promotion', 'PostController@promotion');
Route::post('promotion_store', 'PostController@promotion_store');
Route::get('promotion_view', 'PostController@promotion_view');
Route::get('post_name/{post_id}', 'PostController@get_post_name');
Route::get('pay_scale/{fld_PostID}', 'PostController@pay_scale');
Route::get('transfer', 'PostController@transfer');
Route::post('transfer_store', 'PostController@transfer_store');
Route::get('transfer_view', 'PostController@transfer_view');
Route::get('department_name/{fld_DeptID}', 'PostController@department_name');
Route::post('department_edit/{fld_DeptID}', 'PostController@department_edit');
Route::get('increment', 'PostController@increment');
Route::get('scale_revision', 'PostController@scale_revision');
Route::post('revision_update', 'PostController@revision_update');
Route::get('get_PayScale_upper_limit/{PayScale_lower_limit}', 'PostController@get_PayScale_upper_limit');
Route::get('grade_pay_revision', 'PostController@grade_pay_revision');
Route::patch('grade_pay_revision_update', 'PostController@grade_pay_revision_update');
Route::get('new_scale', 'PostController@new_scale_grade_pay');
Route::get('new_grade_pay', 'PostController@new_grade_pay');
Route::post('new_grade_pay_add', 'PostController@new_grade_pay_add');
Route::post('new_scale_add', 'PostController@new_scale_add');
Route::get('audit_trail', 'PostController@audit_trail');

//Perameter 
Route::get('parameter', 'ParameterController@index');
Route::get('parameter_value', 'ParameterController@parameter_value');
Route::post('parameter_value_insert', 'ParameterController@parameter_value_insert');
Route::post('parameter_insert', 'ParameterController@parameter_insert');
Route::get('parameter_view', 'ParameterController@parameter_view');
Route::get('parameter_edit/{id}', 'ParameterController@parameter_edit');
Route::post('parameter_update', 'ParameterController@parameter_update');

//Pension Module Routes
Route::group(['prefix'=>'pension'], function() {

    Route::get('/employees/retired/add-pension-details/view-list', [
        'as' => 'pension.view_list.employees.add_pension_details',
        'middleware' => ['auth'],
        'uses' => 'PensionsController@addPensionDetails'
    ]);

    Route::get('/employees/retired/add-pension-details/{emp_id}', [
        'as' => 'pension.employees.add_pension_details',
        'middleware' => ['auth'],
        'uses' => 'PensionsController@addBankAddressDetails'
    ]);

    Route::post('/employees/retired/add-pension-details/{emp_id}', [
        'as' => 'pension.post.employees.add_pension_details',
        'middleware' => ['auth'],
        'uses' => 'PensionsController@postPensionDetails'
    ]);

    Route::get('/employees/retired/view-pension-details', [
        'as' => 'pension.employees.pension_details.view',
        'middleware' => ['auth'],
        'uses' => 'PensionsController@viewPensionDetails'
    ]);

    Route::get('/employees/view', [
        'as' => 'pension.view.employees',
        'middleware' => ['auth'],
        'uses' => 'PensionsController@viewEmployees'
    ]);
    
    Route::post('/settle', [
        'as' => 'pension.settle',
        'middleware' => ['auth'],
        'uses' => 'PensionsController@settle'
    ]);
	
	Route::post('/increment_update', [
        'as' => 'pension.increment_update',
        'middleware' => ['auth'],
        'uses' => 'PostController@increment_update'
    ]);

    Route::get('/employee/pension-data/{month}/{year}', [
        'as' => 'employees.pension_data',
        'middleware' => ['auth'],
        'uses' => 'PensionsController@viewPensionData'
    ]);

    Route::get('/view-settled-pension-data', [
        'as' => 'employees.settled.pension_data',
        'middleware' => ['auth'],
        'uses' => 'PensionsController@viewSettledPensionData'
    ]);

    Route::get('/edit-pension-data/{num}', [
        'as' => 'edit.pension_data',
        'middleware' => ['auth'],
        'uses' => 'PensionsController@editPensionData'
    ]);

    Route::post('/update-pension-data/{num}', [
        'as' => 'update.pension_data',
        'middleware' => ['auth'],
        'uses' => 'PensionsController@updatePensionData'
    ]);

    Route::get('/prepare-rtgs', [
        'as' => 'pension.prepare.rtgs',
        'middleware' => ['auth'],
        'uses' => 'PensionsController@prepareRTGS'
    ]);

    Route::post('/generate-rtgs', [
        'as' => 'pension.generate.rtgs',
        'middleware' => ['auth'],
        'uses' => 'PensionsController@generateRTGS'
    ]);
});

Route::group(['prefix'=>'arrears'], function() {

    Route::get('/calculate', [
        'as' => 'arrears.calculate',
        'middleware' => ['auth'],
        'uses' => 'ArrearsController@calculate'
    ]); 

    Route::get('/excel/download', [
        'as' => 'arrears.excel',
        'middleware' => ['auth'],
        'uses' => 'ArrearsController@arrearExcelDownload'
    ]);
});

//OT Generation
Route::get('ot_view', 'OtController@ot_view');
Route::post('ot_calculation', 'OtController@ot_calculation');
Route::post('generate_ot', 'OtController@generate_ot');
Route::get('ot_rtgs', 'OtController@ot_rtgs');
Route::post('generate_ot_rtgs', 'OtController@generate_ot_rtgs');

Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
