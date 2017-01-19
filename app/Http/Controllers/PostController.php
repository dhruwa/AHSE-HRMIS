<?php

namespace App\Http\Controllers;
use Request;
use Kamaln7\Toastr\Facades\Toastr;
use App\post;
use App\department;
use App\servicebook;
use App\promotion;
use App\logbook;
use App\transfer;
use App\pay_scale;
use App\grade_pay;
use DB, Auth, Input, Validator;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
	
	public function index(){
		return view('post');
	}
	
	public function poststore(Request $request){	
		post::create(Request::all());
		$id = Auth::user()->id;
		$row = DB::table('users')->where('id', $id)->first();
		$data =['id' => $id, 'action' => 'Post Insert',	'role' => $row->role, 'table_name' => 'posts'];
		logbook::insert($data);
		return redirect('/post_view');
    }
	
	public function post_view(){
        $posts = post::all();
        return view('post_view', compact('posts'));
    }
	
	public function post_redesignation($fld_PostID){
        $row = DB::table('posts')->where('fld_PostID', $fld_PostID)->first();
		return view('post_redesignate_view')->with('row', $row);;
    }
	
	public function update_post_redesignation(Request $request){
		$post = Request::all();
		$data =[
			'fld_PostName' => $post['fld_PostName']
		];		
        $i = DB::table('posts')->where('fld_PostID', $post['fld_PostID'])->update($data);
		$id = Auth::user()->id;
		$row = DB::table('log_books')->where('id', $id)->first();
		$data =[
			'id' => $id,
			'action' => 'Post redesignation',
			'role' => $row->role,
			'table_name' => 'employees'
		];
		logbook::insert($data);
		return redirect("/post_view");
    }
	
	public function department(){
		return view('department');
	}
	
	public function department_store(Request $request){	
		department::create(Request::all());
		$id = Auth::user()->id;
		$row = DB::table('users')->where('id', $id)->first();
		$data =['id' => $id, 'action' => 'Depertment Insert', 'role' => $row->role,	'table_name' => 'departments'];
		logbook::insert($data);
		return redirect('/department_view');
    }
	
	public function department_view(){
        $departments = department::all();
        return view('department_view', compact('departments'));
    }
	
	public function department_delete($fld_DeptID){
        $del = DB::table('departments')->where('fld_DeptID', $fld_DeptID)->delete();
		$id = Auth::user()->id;
		$row = DB::table('users')->where('id', $id)->first();
		$data =['id' => $id, 'action' => 'Depertment Delete', 'role' => $row->role,	'table_name' => 'departments'];
		logbook::insert($data);
		return redirect('/department_view');
    }
	
	public function promotion(){
		return view('promotion');
	}
	
	public function promotion_store(Request $request){	
		promotion::create(Request::all());
		return redirect('/promotion_view');
    }
	
	public function promotion_view(){
        $promotions = promotion::all();
        return view('promotion_view', compact('promotions'));
    }
	
	public function get_post_name($post_id){
		$posts = DB::table('posts')->where('fld_PostID', $post_id)->first();
		return json_encode($posts);
	}
	
	public function pay_scale($fld_PostID){
		$posts = DB::table('posts')->where('fld_PostID', $fld_PostID)->first();
		return json_encode($posts);
	}
	
	public function transfer(){
		return view('transfer');
	}
	
	public function department_name($fld_DeptID){
		$posts = DB::table('departments')->select('fld_Department')->where('fld_DeptID', $fld_DeptID)->first();
		return json_encode($posts);
	}
	
	public function transfer_store(Request $request){	
		transfer::create(Request::all());
		return redirect('/transfer_view');
    }
	
	public function transfer_view(){
        $promotions = transfer::all();
        return view('transfer_view', compact('promotions'));
    }
	
	public function increment(){
        return view('increment');
	}
	
	public function increment_update1(){
		//$sl_no = Input::get('sl_no');
		$emp_id = Input::get('emp_id');
		$basic_pay = Input::get('basic_pay');
		foreach($emp_id as $key => $n ){
			$data = array(
				'emp_id'=>$emp_id[$key],
				'basic_pay'=>((103/100)*$basic_pay[$key])			
			);
			servicebook::update($data);
			return redirect('/increment');
		}
	}
	
	public function increment_update(){
		//$sl_no = Input::get('sl_no');
		$emp_id = Input::get('emp_id');
		$basic_pay = Input::get('basic_pay');
		foreach($emp_id as $key => $n ){
			$data = array(
				//'emp_id'=>$emp_id[$key],
				'basic_pay'=>((103/100)*$basic_pay[$key])			
			);
			//servicebook::update($data);
			return redirect('/increment');
		}
	}
	
	public function scale_revision(){
        return view('scale_revision');
	}
	
	public function scale_revision_update(Request $request){
		$post = Request::all();
		$data =[
			'fld_PayScale_lower_limit' => $post['fld_PayScale_lower_limit'],
			'fld_PayScale_uper_limit' => $post['fld_PayScale_uper_limit']			
		];
        $i = DB::table('posts')->where([['fld_PayScale_lower_limit', $post['PayScale_lower_limit']], ['fld_PayScale_uper_limit', $post['PayScale_uper_limit']]])->update($data);
		$id = Auth::user()->id;
		$row = DB::table('log_books')->where('id', $id)->first();
		$data =[
			'id' => $id,
			'action' => 'Scale revision',
			'role' => $row->role,
			'table_name' => 'posts'
		];
		logbook::insert($data);
		return redirect("/post_view");
    }
	
	public function revision_update(Request $request){
		$post = Request::all();
		$j = DB::table('posts')->where('fld_PostID', $post['fld_PostID'])->update(['fld_Status' => 0]);
		post::create(Request::all());
		$id = Auth::user()->id;
		$row = DB::table('users')->where('id', $id)->first();
		$data =['id' => $id, 'action' => 'Scale Revision', 'role' => $row->role, 'table_name' => 'post'];
		logbook::insert($data);		
	}
	
	public function department_edit($fld_DeptID){		
	} 
	
	public function get_PayScale_upper_limit($PayScale_lower_limit){
		$posts = DB::table('posts')->where('fld_PayScale_lower_limit', $PayScale_lower_limit)->first();
		return json_encode($posts);
	}
	
	public function grade_pay_revision(){
		return view('grade_pay_revision');
	}
	
	public function grade_pay_revision_update(Request $request){
		$post = Request::all();		
		$data = ['fld_GradePay' => $post['fld_GradePay']];
		$j = DB::table('posts')->where('fld_GradePay', $post['GradePay'])->update($data);
		$id = Auth::user()->id;
		$row = DB::table('log_books')->where('id', $id)->first();
		$data =[
			'id' => $id,
			'action' => 'Grade Pay Revision',
			'role' => $row->role,
			'table_name' => 'posts'
		];
		logbook::insert($data);
		return redirect("/post_view");
    }
	
	public function new_scale_grade_pay(){
		return view('new_scale');
	}
	
	public function new_grade_pay(){
		return view('new_grade_pay');
	}
	
	public function new_grade_pay_add(Request $request){
		grade_pay::create(Request::all());
		$id = Auth::user()->id;
		$row = DB::table('log_books')->where('id', $id)->first();
		$data =[
			'id' => $id,
			'action' => 'Add New Grade Pay',
			'role' => $row->role,
			'table_name' => 'grade_pay'
		];
		logbook::insert($data);
		return redirect('/new_grade_pay');	
	}
	
	public function new_scale_add(Request $request){
		pay_scale::create(Request::all());
		$id = Auth::user()->id;
		$row = DB::table('log_books')->where('id', $id)->first();
		$data =[
			'id' => $id,
			'action' => 'Add New Scale',
			'role' => $row->role,
			'table_name' => 'scale'
		];
		logbook::insert($data);
		return redirect('/new_scale');	
	}
	
	public function audit_trail(){
        $rows = DB::table('log_books')->get();
		return view('audit_trail', compact('rows'));
    }
}
