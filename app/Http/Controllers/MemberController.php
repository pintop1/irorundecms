<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class MemberController extends Controller
{
    public function __construct()
	{
	    $this->middleware('auth:member');
	}

    public function logout(Request $request){

        Auth::logout();

        $request->session()->flush();

        return redirect('/');

    }

    public function index(){
    	$id = Auth::id();
        $user = DB::table('members')->where('id', $id)->first();
    	$activity = DB::table('members_activity')->where('user_email', $user->email)->orderBy('id', 'desc')->get();
        $deposits = DB::table('deposits')->where('email', $user->email)->sum('amount');
        $loans = DB::table('loans')->where(['email'=>$user->email,'status'=>'approved'])->sum('amount');
        $savings = DB::table('savings')->where('email', $user->email)->sum('amount');
        Session::put('logged', 'member');
    	return view('member.index', ['user'=>$user,'activity'=>$activity,'deposits'=>$deposits,'loans'=>$loans,'savings'=>$savings]);
    }

    public function showLoanForm(){
    	$id = Auth::id();
        $user = DB::table('members')->where('id', $id)->first();
    	$guarantor = DB::table('members')->where('status', 'complete')->orderBy('id', 'desc')->get();
        $activity = DB::table('members_activity')->where('user_email', $user->email)->orderBy('id', 'desc')->get();
    	return view('member.loanForm', ['user'=>$user,'activity'=>$activity, 'guarantor'=>$guarantor]);
    }

    public function showActiveLoans(){
    	$id = Auth::id();
    	$user = DB::table('members')->where('id', $id)->first();
        $activity = DB::table('members_activity')->where('user_email', $user->email)->orderBy('id', 'desc')->get();
        $loans = DB::table('loans')->where(['email'=> $user->email,'status'=>'approved'])->orderBy('id', 'desc')->get();
        if(Input::get('view') !== ''){

            $view = Input::get('view');
            $loanView = DB::table('loans')->where('id',$view)->first();
            return view('member.activeLoan', ['user'=>$user,'activity'=>$activity, 'loans'=>$loans, 'view'=>$loanView]);
        }else {
            return view('member.activeLoan', ['user'=>$user,'activity'=>$activity, 'loans'=>$loans]);
        }
    }

    public function showLoanLogs(){
    	$id = Auth::id();
        $user = DB::table('members')->where('id', $id)->first();
        $activity = DB::table('members_activity')->where('user_email', $user->email)->orderBy('id', 'desc')->get();
        $loans = DB::table('loans')->where(['email'=> $user->email])->orderBy('id', 'desc')->get();
        if(Input::get('view') !== ''){

            $view = Input::get('view');
            $loanView = DB::table('loans')->where('id',$view)->first();
            return view('member.loanLogs', ['user'=>$user,'activity'=>$activity, 'loans'=>$loans, 'view'=>$loanView]);
        }else {
            return view('member.loanLogs', ['user'=>$user,'activity'=>$activity, 'loans'=>$loans]);
        }
    }

    public function showLoanStatus(){
    	$id = Auth::id();
    	$user = DB::table('members')->where('id', $id)->first();
        $activity = DB::table('members_activity')->where('user_email', $user->email)->orderBy('id', 'desc')->get();
        $total_loaned = DB::table('loans')->where(['status'=>'approved','email'=>$user->email])->sum('amount');
        $total_repaid = DB::table('repayments')->where('email', $user->email)->sum('amount_repayed');
    	return view('member.loanStatus', ['user'=>$user,'activity'=>$activity, 'loaned'=>$total_loaned,'repaid'=>$total_repaid]);
    }

    public function showSavingsLog(){
    	$id = Auth::id();
    	$user = DB::table('members')->where('id', $id)->first();
        $activity = DB::table('members_activity')->where('user_email', $user->email)->orderBy('id', 'desc')->get();
        $savings = DB::table('savings')->where(['email'=> $user->email])->orderBy('id', 'desc')->paginate(30);
        return view('member.savingsLog', ['user'=>$user,'activity'=>$activity,'savings'=>$savings]);
    }

    public function showDepositsLog(){
    	$id = Auth::id();
    	$user = DB::table('members')->where('id', $id)->first();
        $activity = DB::table('members_activity')->where('user_email', $user->email)->orderBy('id', 'desc')->get();
        $deposits = DB::table('deposits')->where(['email'=> $user->email])->orderBy('id', 'desc')->paginate(30);
    	return view('member.depositsLog', ['user'=>$user,'activity'=>$activity,'deposits'=>$deposits]);
    }

    public function showThriftLog(){
    	$id = Auth::id();
    	$user = DB::table('members')->where('id', $id)->first();
        $activity = DB::table('members_activity')->where('user_email', $user->email)->orderBy('id', 'desc')->get();
        $thrifts = DB::table('thrift')->where(['email'=> $user->email])->orderBy('id', 'desc')->paginate(30);
    	return view('member.thriftsLog', ['user'=>$user, 'activity'=>$activity, 'thrifts'=>$thrifts]);
    }

    public function showQlaForm(){
    	$id = Auth::id();
    	$user = DB::table('members')->where('id', $id)->first();
        $activity = DB::table('members_activity')->where('user_email', $user->email)->orderBy('id', 'desc')->get();
        $guarantor = DB::table('members')->where('status', 'complete')->orderBy('id', 'desc')->get();
    	return view('member.qlaForm', ['user'=>$user,'activity'=>$activity, 'guarantor'=>$guarantor]);
    }

    public function showActiveQla(){
    	$id = Auth::id();
    	$user = DB::table('members')->where('id', $id)->first();
        $activity = DB::table('members_activity')->where('user_email', $user->email)->orderBy('id', 'desc')->get();
        $qlas = DB::table('asset')->where(['email'=> $user->email,'status'=>'approved'])->orderBy('id', 'desc')->get();
        if(Input::get('view') !== ''){

            $view = Input::get('view');
            $qlaView = DB::table('asset')->where('id',$view)->first();
            return view('member.activeQla', ['user'=>$user,'activity'=>$activity, 'qlas'=>$qlas, 'view'=>$qlaView]);
        }else {

    	   return view('member.activeQla', ['user'=>$user, 'activity'=>$activity]);

        }
    }

    public function showQlaLogs(){
    	$id = Auth::id();
        $user = DB::table('members')->where('id', $id)->first();
        $activity = DB::table('members_activity')->where('user_email', $user->email)->orderBy('id', 'desc')->get();
        $qlas = DB::table('asset')->where(['email'=> $user->email])->orderBy('id', 'desc')->get();
        if(Input::get('view') !== ''){

            $view = Input::get('view');
            $qlaView = DB::table('asset')->where('id',$view)->first();
            return view('member.qlaLog', ['user'=>$user,'activity'=>$activity, 'qlas'=>$qlas, 'view'=>$qlaView]);
        }else {

           return view('member.qlaLog', ['user'=>$user, 'activity'=>$activity]);

        }
    }

    public function showQlaStatus(){
    	$id = Auth::id();
    	$user = DB::table('members')->where('id', $id)->first();
        $activity = DB::table('members_activity')->where('user_email', $user->email)->orderBy('id', 'desc')->get();
        // $total_qla = DB::table('asset')->where('status', 'approved')->sum('amount');
        return view('member.qlaStatus', ['user'=>$user,'activity'=>$activity, /*'loaned'=>$total_loaned*/]);
    }

    public function showPersonalForm(){
    	$id = Auth::id();
    	$user = DB::table('members')->where('id', $id)->first();
        $activity = DB::table('members_activity')->where('user_email', $user->email)->orderBy('id', 'desc')->get();
    	return view('member.personalDetails', ['user'=>$user,'activity'=>$activity]);
    }

    public function showWorkForm(){
    	$id = Auth::id();
    	$user = DB::table('members')->where('id', $id)->first();
        $user = DB::table('members')->where('id', $id)->first();
        $activity = DB::table('members_activity')->where('user_email', $user->email)->orderBy('id', 'desc')->get();
        return view('member.workDetails', ['user'=>$user,'activity'=>$activity]);
    }

    public function showGuarantorForm(){
    	$id = Auth::id();
        $user = DB::table('members')->where('id', $id)->first();
    	$guarantor = DB::table('guarantors')->orderBy('name', 'asc')->get();
        $activity = DB::table('members_activity')->where('user_email', $user->email)->orderBy('id', 'desc')->get();
        return view('member.guarantor', ['user'=>$user,'activity'=>$activity, 'guarantor'=>$guarantor]);
    }

    public function showFinancialForm(){
    	$id = Auth::id();
    	$user = DB::table('members')->where('id', $id)->first();
        $activity = DB::table('members_activity')->where('user_email', $user->email)->orderBy('id', 'desc')->get();
        return view('member.financialDetails', ['user'=>$user,'activity'=>$activity]);
    }

    public function showAttestationForm(){
    	$id = Auth::id();
    	$user = DB::table('members')->where('id', $id)->first();
        $activity = DB::table('members_activity')->where('user_email', $user->email)->orderBy('id', 'desc')->get();
        return view('member.officialAttestation', ['user'=>$user,'activity'=>$activity]);
    }

    public function showNextForm(){
    	$id = Auth::id();
        $user = DB::table('members')->where('id', $id)->first();
    	$next_of_kin = DB::table('next_of_kin')->where('email', $user->email)->first();
        $activity = DB::table('members_activity')->where('user_email', $user->email)->orderBy('id', 'desc')->get();
        return view('member.nextKin', ['user'=>$user,'activity'=>$activity,'next'=>$next_of_kin]);
    }

    /* =========================Form Processor==============================*/

    //loan form
    public function process_loan_form(Request $request){

        $guarantor = DB::table('members')->where('email', $request->guarantor)->first();

        $loan_security = $request->ileya."".$request->xmas."".$request->fixed."".$request->daily."".$request->weekly."".$request->coop."".$request->thrift;

        DB::table('loans')->insert([
            'email' => $request->email, 
            'loan_type' => $request->loan_type,
            'name' => $request->name,
            'membership_no' => $request->mem_no,
            'phone' => $request->phone,
            'address' => $request->address,
            'amount' => $request->amount,
            'purpose' => $request->purpose,
            'repayment_period' => $request->repay_period,
            'current_loan_balance' => $request->loan_balance,
            'savings_balance' => $request->saving_balance,
            'average_monthly_contribution' => $request->monthly_contribution,
            'repayment_date' => $request->repay_date,
            'thrift_contribution' => $request->thrift_contribution,
            'QLA_repayment' => $request->qla_repayment,
            'loan_security' => $loan_security,
            'loan_security_plus' => $request->loan_security_plus,
            'guarantor_name' => $guarantor->first_name." ".$guarantor->last_name." ".$guarantor->other_names,
            'guarantor_phone' => $guarantor->phone,
            'guarantor_membership_no' => $guarantor->recom_slot_no,
            'guarantor_email' => $guarantor->email,
            'status' => 'awaiting guarantor'
        ]);

        return redirect()->back()->with('message', 'Loan request sent successfully. \n We will get back to you within 48 working hours.\n Thank you');
    }

    //QLA form
    public function process_qla_form(Request $request){

        $guarantor = DB::table('members')->where('email', $request->guarantor)->first();

        $names =  explode(' ', $request->name);

        $qla_dets = $request->new_qla."".$request->fairly."".$request->qla_swapping."".$request->foodstuff."".$request->joint."".$request->business;

        DB::table('asset')->insert([
            'first_name' => $names[0], 
            'last_name' => $names[1],
            'other_names' => $names[2],
            'email' => $request->email,
            'membership_no' => $request->mem_no,
            'address' => $request->address,
            'phone' => $request->phone,
            'Qla_dets' => $qla_dets,
            'purpose' => $request->purpose,
            'asset_type' => $request->asset_type,
            'size' => $request->size,
            'brand' => $request->brand,
            'description' => $request->desc,
            'tenure_of_payment' => $request->repay_tenure,
            'salary_account_no' => $request->account,
            'bank' => $request->bank,
            'branch' => $request->branch,
            'signature' => $request->signature,
            'guarantor_name' => $guarantor->first_name." ".$guarantor->last_name." ".$guarantor->other_names,
            'guarantor_phone' => $guarantor->phone,
            'guarantor_memership_no' => $guarantor->recom_slot_no,
            'guarantor_email' => $guarantor->email,
            'status' => 'awaiting guarantor'
        ]);
        return redirect()->back()->with('message', 'QLA request sent successfully. We will get back to you within 48 working hours. Thank you');
    }

    //Personal Data form
    public function update_personal_data(Request $request){

        $file = $request->file('passport');

        $file_name = time() . str_replace(" ", "-", $file->getClientOriginalName());                      
        $file_path = 'uploads/passports';

        if($file->move($file_path, $file_name)){

            $thefileG = $file_path . "/" . $file_name;

            DB::table('members')->where('email', $request->email)->update([
                'other_names' => $request->oth, 
                'phone' => $request->phone, 
                'whatsapp_no'=>$request->whatsapp,
                'passport'=>$thefileG,
                'spouse_name'=>$request->spouse,
                'address'=>$request->address,
                'personal_status'=>'completed'
            ]);

            // $user = DB::table('members')->where('email', $request->email)->first();

            DB::table('members_activity')->insert([
                'user_email' => $request['email'], 
                'activity' => 'Personal Data Updated',
                'description' => 'Your personal data has been updated successfully.',
                'icon' => 'fa fa-user-o',
                'color' => 'bg3',
            ]);

            return redirect()->back()->with('message', 'Personal Data Updated Successfully!');
            
        }
    }

    //Work Data form
    public function update_work_data(Request $request){

        DB::table('members')->where('email', $request->email)->update([
            'name_of_company' => $request->work, 
            'company_address' => $request->address, 
            'company_reg_no'=>$request->reg_no,
            'position'=>$request->position,
            'nature'=>$request->nature,
            'industry'=>$request->industry,
            'work_status'=>'completed'
        ]);

        //$user = DB::table('members')->where('email', $request->email)->first();

        DB::table('members_activity')->insert([
            'user_email' => $request['email'], 
            'activity' => 'Personal Data Updated',
            'description' => 'Your Work data has been updated successfully.',
            'icon' => 'fa fa-building-o',
            'color' => 'bg1',
        ]);


        return redirect()->back()->with('message', 'Work Data Updated Successfully!');
        
    }

    //Guarantor Data form
    public function update_guarantor_data(Request $request){

        $guarantor = DB::table('guarantors')->where('email', $request->guarantor)->first();
        $user = DB::table('members')->where('email', $request->email)->first();

        DB::table('members')->where('email', $request->email)->update([
            'guarantor_name' => $guarantor->name, 
            'guarantor_service_no' => $guarantor->service_no, 
            'rank'=>$guarantor->rank,
            'station'=>$guarantor->station,
            'command'=>$guarantor->command,
            'unit'=>$guarantor->unit,
            'guarantor_phone'=>$guarantor->phone,
            'guarantor_email'=>$guarantor->email,
            'guarantor_address'=>$guarantor->address,
            'guarantor_status'=>'completed'
        ]);

        DB::table('notifications')->insert([
            'email' => $guarantor->email, 
            'title' => 'New Guarantee', 
            'desc'=>'Hi '.ucwords($guarantor->name).',<p> A new user with the details below just selected you to be his membership application form guarantor</p><ul><li>Name: '.ucwords($user->first_name.' '.$user->last_name.' '.$user->other_names).'</li><li>Email: '.strtolower($user->email).'</li><li>Phone: '.$user->phone.'</li></ul><center><form method="post" action="{{ route(\'approve_user\') }}"><input type="hidden" value="'.$user->email.'" name="user"><button class="btn btn-primary">Approve</button></form>',
            'icon'=>'fa fa-user-o',
            'color'=>'bg2',
            'status'=>'unread'
        ]);

        return redirect()->back()->with('message', 'Guarantor Data Updated Successfully!');
    }


    //Financial Data form
    public function update_financial_data(Request $request){

        DB::table('members')->where('email', $request->email)->update([
            'bank' => $request->bank, 
            'account_number' => $request->account_number, 
            'account_name'=>$request->account_name,
            'bank_branch'=>$request->bank_branch,
            'financial_status'=>'completed'
        ]);

        // $user = DB::table('members')->where('email', $request->email)->first();

        //$user = DB::table('members')->where('email', $request->email)->first();

        DB::table('members_activity')->insert([
            'user_email' => $request['email'], 
            'activity' => 'Financial Data Updated',
            'description' => 'Your Financial data has been updated successfully.',
            'icon' => 'fa fa-building-o',
            'color' => 'bg2',
        ]);

        
        return redirect()->back()->with('message', 'Finacial Data Updated Successfully!');
    }

    //Signature Data form
    public function update_signature(Request $request){

        // A real application should use them according to needs such as to check image type
        $filteredData=substr($request->image, strpos($request->image, ",")+1);
     
        // Need to decode before saving since the data we received is already base64 encoded
        $unencodedData=base64_decode($filteredData);

        // Save file. This example uses a hard coded filename for testing,
        // but a real application can specify filename in POST variable
        $folder = "uploads/signatures/";
        $tmp_name = str_replace("@", "", str_replace(".", "", $request['email'])).'test.png';
        $fp = fopen( $tmp_name, 'wb' );
        fwrite( $fp, $unencodedData);
        fclose( $fp );

        if(rename($tmp_name, $folder . pathinfo($tmp_name, PATHINFO_BASENAME))){

            //unlink($tmp_name);

            DB::table('members')->where('email', $request->email)->update([
                'user_signature' => $folder.$tmp_name, 
                'signature_status'=>'completed'
            ]);

            DB::table('members_activity')->insert([
                'user_email' => $request['email'], 
                'activity' => 'Attestation Data Updated',
                'description' => 'Your Signature has been updated successfully.',
                'icon' => 'fa fa-500px',
                'color' => 'bg2',
            ]);

        }

        return redirect()->back()->with('message', 'Attestation Data Updated Successfully!');
    }

}
