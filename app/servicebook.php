<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class servicebook extends Model
{
    protected $fillable = ['emp_id', 'dept_id', 'post_id', 'emp_type', 'application_id', 'da', 'basic_pay', 'scale',
	'emp_pf_category', 'gpf_persentage', 'nps_persentage',  'doa', 'doj', 
	'service_image', 'dop', 'dol', 'doi', 'dor', 'remarks', 'status'];
	public $timestamps = false;
}
