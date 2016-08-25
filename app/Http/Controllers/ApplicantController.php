<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Applicant;
use App\Http\Requests;
use App\User;
use App\contact;
use App\institution;

class ApplicantController extends Controller
{
	protected $applicant;
	
    public function __construct(Applicant $applicant){
		$this->middleware('auth');
		$this->applicant=$applicant;
		
	}
	
	//list job category
	public function listjobcat(){
		
		return view('dpr.available_jobs');
	}
	
	//get available jobs by category
	public function availablejobs($cat){
		
		$availablejob=$this->applicant->availablejob($cat);
		return view('dpr.listjobs',['listjobs'=>$availablejob]);
		
	}
	
	//set applied for jobs
	public function appliedfor($position=1,$id=1,$type){
		
		
		return view('dpr.apply',['positionid'=>$id,'title'=>$position,'type'=>$type]);
		
	}

	public function apply(Request $request) {

		$this->validate($request,[
			'file' => 'required|mimes:png,jpg,jpeg',
			'middle_name' => 'required|max:255|string', 
			'phone_number' => 'required|max:13', 
			'date_of_birth' => 'required|date',
		]);
		
			$year = date('Y');
			$year_birth = explode('-', $request->date_of_birth);
			$age = (int) $year - (int) $year_birth;
			try{
				$filename=time().'.'.$request->file('file')->getClientOriginalExtension();
				$request->file('file')->move('upload',$filename);
				$apply_cand = User::where('id',$request->id)
				->update([
					'm_name'=>$request->middle_name,
					'phone_num' => $request->phone_number, 
					'dob' => $request->date_of_birth, 
					'sex' => $request->sex, 
					'image'=>$filename,
					'age' => $age,
					'marital_status' => $request->marital_status
				]);
				return "success";
			}
			catch(\Exception $ex){
				return $ex;
			}

	}

	public function contact(){
		
		
		//return view('dpr.contact',['positionid'=>$id,'title'=>$position,'type'=>$type]);

		return view('dpr.contact');
		
	}

	public function savecontact(Request $request) {

		$this->validate($request, [
			'id'=> 'required', 
			'street'  => 'required|max:255', 
			'city'    => 'required|max:100|string', 
			'lga'	  => 'required|max:100|string', 
			'state'	  => 'required|max:50|string', 
			'state_origin' => 'required|max:50|string',
		]);

		$savecontact = contact::create([
			'user_ref' => $request->id, 
			'street' => $request->street, 
			'city' => $request->city, 
			'state' => $request->state, 
			'state_origin' => $request->state_origin
		]);

		return redirect('/education');
	}

	public function education() {
		return view('dpr.education');
	}

	public function saveducation(Request $request) {

		$this->validate($request, [
			'file' => 'required|mimes:docx,doc,pdf',
			'user_ref' => 'required', 
			'name' => 'required|string|max:200', 
			'start_month' => 'required|string|max:10', 
			'start_year' => 'required', 
			'end_month' => 'required|string|max:10', 
			'end_year' => 'required', 
			'degree' => 'required|string|max:255', 
			'grade' => 'string|max:50',
		]);
		 try{
		$idate = $request->idate;
		$sdate = $request->sdate;
		$pdate = $request->pdate;

		$idate = date('Y-m-d', $idate);
		$sdate = date('Y-m-d', $sdate);
		$pdate = date('Y-m-d', $pdate);

		$istart_date = substr($idate, 0, 10);
		$iend_date = substr($idate, 12, 21);

		$sstart_date = substr($sdate, 0, 10);
		$send_date = substr($sdate, 12, 21);

		$pstart_date = substr($pdate, 0, 10);
		$pend_date = substr($pdate, 12, 21);

		
				//loop throug and upload
				foreach($request->file('file') as $files){
				$filename = $request->user()->f_name . time().'.'.$files->getClientOriginalExtension();
				 $request->$file->move('upload/profiles',$filename);
				//return $filename1;
				}
				
				
				//database save info
					$saveducation = institution::create([
						'user_ref' => $request->id,
						'name' => $request->name, 
						'istart_date' => $istart_date, 
						'iend_date' => $iend_date, 
						'sstart_date' => $sstart_date, 
						'send_date' => $send_date, 
						'pstart_date' => $pstart_date, 
						'pend_date' => $pend_date,
						'grade' => $request->grade, 
						'degree' => $request->degree, 
						'ifile' => $filename
					]);	
				return respose()->json('success');
		
	}
	catch (\Exception $ex ){
		return $ex;
	

	}
	}

	public function edprofile() {
		return view('dpr.profile');
	}
}
