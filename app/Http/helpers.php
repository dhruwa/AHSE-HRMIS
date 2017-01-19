<?php namespace App\Http;
use DB, Validator, Redirect, Auth, Crypt;
class Helpers {
    public static function calculatePensionAmount( $employee_id ){

    	//calculate basic pay
    	$total_basic_pay = 0;
    	$basic_months = 10;
    	$pension = [];

        for( $i = $basic_months; $i > 0; $i--) {
        	//echo date("F",strtotime("-$i Months"));
        	$month 	= date("F",strtotime("-$i Months"));
        	$year 	= date("Y",strtotime("-$i Months"));
        	$res = DB::table('salary_claims')
	            ->where('emp_id', $employee_id)
	            ->where('month', $month)
	            ->where('year', $year)
	            ->select('basic_pay')
	            ->first();
	        $total_basic_pay += $res->basic_pay;
        }

        $average_pay = $total_basic_pay/$basic_months;

        //calculate basic pension

        //Qualifying service
        $emp = DB::table('servicebooks')
	            ->where('emp_id', $employee_id)
	            ->select('doj', 'dor')
	            ->first();
	    $date1 = $emp->doj;
		$date2 = $emp->dor;

		$datetime1 = new \DateTime($date1);
		$datetime2 = new \DateTime($date2);
		$interval = $datetime1->diff($datetime2);

		$service_years 	= $interval->format('%y');
		$service_months = $interval->format('%m');

		$service_months = $service_months/12;
		
		$qualifying_services = $service_years+$service_months;

		$basic_pension = ($average_pay/2) * ($qualifying_services/25);

		$pension['basic_pension'] = $basic_pension;
		$pension['average_pay'] = $average_pay;
		$pension['work_duration'] = $interval;
		return $pension;
    }
}