<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    protected $fillable = ['emp_qualification_id', 'emp_f_name', 'emp_m_name', 'emp_l_name', 'post_id', 'fld_DeptID', 'emp_dob', 'emp_gender', 'emp_type', 'emp_blood_group', 
	'emp_contact_no', 'emp_alt_contact_no', 'bank_account_no', 'pension_bank_account_no', 'emp_present_house_no', 'emp_present_locality', 'emp_present_city', 'emp_present_district',
	 'emp_permanent_house_no', 'emp_permanent_locality', 'emp_permanent_city', 'emp_permanent_district', 'emp_cast', 'emp_religion', 'emp_date_of_retirement', 'submission_date'];
	public $timestamps = false;
}
