<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{

    public function index(){
    	$email = Session::get('email');
    	$logged = Session::get('logged');
    	if($logged != "" && $logged == 'admin'){
    		$user = DB::table('admins')->where('email', $email)->first();
            $activity = DB::table('admins_activity')->where('user_email', $user->email)->orderBy('id', 'desc')->get();
            $savings = DB::table('savings')->sum('amount');
            $deposits = DB::table('deposits')->sum('amount');
    		$loans = DB::table('loans')->sum('amount');
            $members = count(DB::table('members')->where('status', '!=', 'incomplete')->get());
            $recent_members = DB::table('members')->paginate(10);
            $blogs = DB::table('blog')->orderBy('id', 'desc')->paginate(10);
	    	return view('admin.index',['user'=>$user,'activity'=>$activity,'savings'=>$savings,'deposits'=>$deposits,'loans'=>$loans,'members'=>$members,'recent_members'=>$recent_members,'blogs'=>$blogs]);
	    }else {
	    	return redirect('/login/admin');
	    }
    }

    public function new_signatures(){
        $email = Session::get('email');
        $logged = Session::get('logged');
        if($logged != "" && $logged == 'admin'){
            $user = DB::table('admins')->where('email', $email)->first();
            $activity = DB::table('admins_activity')->where('user_email', $user->email)->orderBy('id', 'desc')->get();
            return view('admin.attestation',['user'=>$user,'activity'=>$activity]);
        }else {
            return redirect('/login/admin');
        }
    }

    public function all_signatures(){
        $email = Session::get('email');
        $logged = Session::get('logged');
        if($logged != "" && $logged == 'admin'){
            $user = DB::table('admins')->where('email', $email)->first();
            $activity = DB::table('admins_activity')->where('user_email', $user->email)->orderBy('id', 'desc')->get();
            $signatures = DB::table('signatures')->orderBy('id', 'desc')->paginate(15);
            return view('admin.signatures',['user'=>$user,'activity'=>$activity,'signatures'=>$signatures]);
        }else {
            return redirect('/login/admin');
        }
    }

    public function show_pending_users(){
    	$email = Session::get('email');
    	$logged = Session::get('logged');
    	if($logged != "" && $logged == 'admin'){
    		$user = DB::table('admins')->where('email', $email)->first();
    		$activity = DB::table('admins_activity')->where('user_email', $user->email)->orderBy('id', 'desc')->get();
    		$new_member = DB::table('members')->where(['guarantor_approval_status'=>'completed','attestation_status'=>''])->orderBy('id', 'desc')->paginate(15);
    		if(Input::get('view') !== ''){

            	$view = Input::get('view');

                $signatures = DB::table('signatures')->orderBy('id', 'desc')->get();

            	$viewing = DB::table('members')->where('id', $view)->first();
	    	
	    		return view('admin.pending_users',['user'=>$user,'activity'=>$activity,'new_member'=>$new_member,'viewing'=>$viewing,'signatures'=>$signatures]);
	    	}else {

	    		return view('admin.pending_users',['user'=>$user,'activity'=>$activity,'new_member'=>$new_member]);

	    	}
	    }else {
	    	return redirect('/login/admin');
	    }
    }

    public function show_active_users(){
        $email = Session::get('email');
        $logged = Session::get('logged');
        if($logged != "" && $logged == 'admin'){
            $user = DB::table('admins')->where('email', $email)->first();
            $activity = DB::table('admins_activity')->where('user_email', $user->email)->orderBy('id', 'desc')->get();
            $new_member = DB::table('members')->where(['guarantor_approval_status'=>'completed','attestation_status'=>'completed'])->orderBy('id', 'desc')->paginate(15);
            if(Input::get('view') !== ''){

                $view = Input::get('view');

                $signatures = DB::table('signatures')->orderBy('id', 'desc')->get();

                $viewing = DB::table('members')->where('id', $view)->first();
            
                return view('admin.active_users',['user'=>$user,'activity'=>$activity,'new_member'=>$new_member,'viewing'=>$viewing]);
            }else {

                return view('admin.active_users',['user'=>$user,'activity'=>$activity,'new_member'=>$new_member]);

            }
        }else {
            return redirect('/login/admin');
        }
    }

    public function new_loans(){
        $email = Session::get('email');
        $logged = Session::get('logged');
        if($logged != "" && $logged == 'admin'){
            $user = DB::table('admins')->where('email', $email)->first();
            $activity = DB::table('admins_activity')->where('user_email', $user->email)->orderBy('id', 'desc')->get();
            $loans = DB::table('loans')->where('status', 'pending')->orderBy('id', 'desc')->paginate(30);
            if(Input::get('view') !== ''){

                $v = Input::get('view');

                $view = DB::table('loans')->where('id', $v)->first();
            
                return view('admin.new_loans',['user'=>$user,'activity'=>$activity,'loans'=>$loans,'view'=>$view]);
            }else {

                return view('admin.new_loans',['user'=>$user,'activity'=>$activity]);

            }
        }else {
            return redirect('/login/admin');
        }
    }

    public function granted_loans(){
        $email = Session::get('email');
        $logged = Session::get('logged');
        if($logged != "" && $logged == 'admin'){
            $user = DB::table('admins')->where('email', $email)->first();
            $activity = DB::table('admins_activity')->where('user_email', $user->email)->orderBy('id', 'desc')->get();
            $loans = DB::table('loans')->where('status', 'approved')->orderBy('id', 'desc')->paginate(30);
            if(Input::get('view') !== ''){

                $v = Input::get('view');

                $view = DB::table('loans')->where('id', $v)->first();
            
                return view('admin.granted_loans',['user'=>$user,'activity'=>$activity,'loans'=>$loans,'view'=>$view]);
            }else {

                return view('admin.granted_loans',['user'=>$user,'activity'=>$activity]);

            }
        }else {
            return redirect('/login/admin');
        }
    }

    public function rejected_loans(){
        $email = Session::get('email');
        $logged = Session::get('logged');
        if($logged != "" && $logged == 'admin'){
            $user = DB::table('admins')->where('email', $email)->first();
            $activity = DB::table('admins_activity')->where('user_email', $user->email)->orderBy('id', 'desc')->get();
            $loans = DB::table('loans')->where('status', 'declined')->orderBy('id', 'desc')->paginate(30);
            if(Input::get('view') !== ''){

                $v = Input::get('view');

                $view = DB::table('loans')->where('id', $v)->first();
            
                return view('admin.rejected_loans',['user'=>$user,'activity'=>$activity,'loans'=>$loans,'view'=>$view]);
            }else {

                return view('admin.rejected_loans',['user'=>$user,'activity'=>$activity]);

            }
        }else {
            return redirect('/login/admin');
        }
    }

    public function repayments(){
        $email = Session::get('email');
        $logged = Session::get('logged');
        if($logged != "" && $logged == 'admin'){
            $user = DB::table('admins')->where('email', $email)->first();
            $activity = DB::table('admins_activity')->where('user_email', $user->email)->orderBy('id', 'desc')->get();
            $users = DB::table('members')->get();
            return view('admin.repayment',['user'=>$user,'activity'=>$activity,'users'=>$users]);
        }else {
            return redirect('/login/admin');
        }
    }

    public function new_deposits(){
        $email = Session::get('email');
        $logged = Session::get('logged');
        if($logged != "" && $logged == 'admin'){
            $user = DB::table('admins')->where('email', $email)->first();
            $activity = DB::table('admins_activity')->where('user_email', $user->email)->orderBy('id', 'desc')->get();
            $users = DB::table('members')->orderBy('id', 'desc')->get();
            return view('admin.new_deposits',['user'=>$user,'activity'=>$activity,'users'=>$users]);
        }else {
            return redirect('/login/admin');
        }
    }

    public function active_deposits(){
        $email = Session::get('email');
        $logged = Session::get('logged');
        if($logged != "" && $logged == 'admin'){
            $user = DB::table('admins')->where('email', $email)->first();
            $activity = DB::table('admins_activity')->where('user_email', $user->email)->orderBy('id', 'desc')->get();
            $deposits = DB::table('deposits')->orderBy('id', 'desc')->paginate(30);

            $users = DB::table('members')->orderBy('id', 'desc')->get();

            return view('admin.active_deposits',['user'=>$user,'activity'=>$activity,'deposits'=>$deposits,'users'=>$users]);

        }else {
            return redirect('/login/admin');
        }
    }

    public function new_savings(){
        $email = Session::get('email');
        $logged = Session::get('logged');
        if($logged != "" && $logged == 'admin'){
            $user = DB::table('admins')->where('email', $email)->first();
            $activity = DB::table('admins_activity')->where('user_email', $user->email)->orderBy('id', 'desc')->get();
            $users = DB::table('members')->orderBy('id', 'desc')->get();
            return view('admin.new_savings',['user'=>$user,'activity'=>$activity,'users'=>$users]);
        }else {
            return redirect('/login/admin');
        }
    }

    public function active_savings(){
        $email = Session::get('email');
        $logged = Session::get('logged');
        if($logged != "" && $logged == 'admin'){
            $user = DB::table('admins')->where('email', $email)->first();
            $activity = DB::table('admins_activity')->where('user_email', $user->email)->orderBy('id', 'desc')->get();
            $deposits = DB::table('deposits')->orderBy('id', 'desc')->paginate(30);

            $users = DB::table('members')->orderBy('id', 'desc')->get();

            return view('admin.active_savings',['user'=>$user,'activity'=>$activity,'deposits'=>$deposits,'users'=>$users]);

        }else {
            return redirect('/login/admin');
        }
    }

    public function new_defaulters(){
        $email = Session::get('email');
        $logged = Session::get('logged');
        if($logged != "" && $logged == 'admin'){
            $user = DB::table('admins')->where('email', $email)->first();
            $activity = DB::table('admins_activity')->where('user_email', $user->email)->orderBy('id', 'desc')->get();
            $users = DB::table('members')->orderBy('id', 'desc')->get();
            return view('admin.new_defaulters',['user'=>$user,'activity'=>$activity,'users'=>$users]);
        }else {
            return redirect('/login/admin');
        }
    }

    public function new_guarantors(){
        $email = Session::get('email');
        $logged = Session::get('logged');
        if($logged != "" && $logged == 'admin'){
            $user = DB::table('admins')->where('email', $email)->first();
            $activity = DB::table('admins_activity')->where('user_email', $user->email)->orderBy('id', 'desc')->get();
             $users = DB::table('members')->where('status', '!=', 'incomplete')->orderBy('id', 'desc')->get();
            return view('admin.new_guarantors',['user'=>$user,'activity'=>$activity,'users'=>$users]);
        }else {
            return redirect('/login/admin');
        }
    }

    public function new_news(){
        $email = Session::get('email');
        $logged = Session::get('logged');
        if($logged != "" && $logged == 'admin'){
            $user = DB::table('admins')->where('email', $email)->first();
            $activity = DB::table('admins_activity')->where('user_email', $user->email)->orderBy('id', 'desc')->get();
            return view('admin.new_news',['user'=>$user,'activity'=>$activity]);
        }else {
            return redirect('/login/admin');
        }
    }

    public function all_news(){
        $email = Session::get('email');
        $logged = Session::get('logged');
        if($logged != "" && $logged == 'admin'){
            $user = DB::table('admins')->where('email', $email)->first();
            $activity = DB::table('admins_activity')->where('user_email', $user->email)->orderBy('id', 'desc')->get();
            $blogs = DB::table('blog')->orderBy('id', 'desc')->paginate(30);

            if(Input::get('edit') !== ''){

                $view = Input::get('edit');

                $single = DB::table('blog')->where('id', $view)->orderBy('id', 'desc')->first();

                return view('admin.all_news',['user'=>$user,'activity'=>$activity,'blogs'=>$blogs,'single'=>$single]);

                
            }else {

                return view('admin.all_news',['user'=>$user,'activity'=>$activity,'blogs'=>$blogs]);

            }

        }else {
            return redirect('/login/admin');
        }
    }

    public function all_guarantors(){
        $email = Session::get('email');
        $logged = Session::get('logged');
        if($logged != "" && $logged == 'admin'){
            $user = DB::table('admins')->where('email', $email)->first();
            $activity = DB::table('admins_activity')->where('user_email', $user->email)->orderBy('id', 'desc')->get();
            $guarantors = DB::table('guarantors')->orderBy('id', 'desc')->paginate(30);
            return view('admin.all_guarantors',['user'=>$user,'activity'=>$activity,'guarantors'=>$guarantors]);
        }else {
            return redirect('/login/admin');
        }
    }

    public function logout(Request $request){

        $request->session()->flush();

        return redirect('/');
    }

    //Signature Data form
    public function update_signature(Request $request){

        // A real application should use them according to needs such as to check image type
        $filteredData=substr($request->image, strpos($request->image, ",")+1);
     
        // Need to decode before saving since the data we received is already base64 encoded
        $unencodedData=base64_decode($filteredData);

        // Save file. This example uses a hard coded filename for testing,
        // but a real application can specify filename in POST variable
        $folder = "uploads/signatures/admin/";
        $tmp_name = str_replace("@", "", str_replace(" ", "_", $request['name'])).'sign.png';
        $fp = fopen( $tmp_name, 'wb' );
        fwrite( $fp, $unencodedData);
        fclose( $fp );

        if(rename($tmp_name, $folder . pathinfo($tmp_name, PATHINFO_BASENAME))){

            //unlink($tmp_name);

            DB::table('signatures')->insert([
                'signature' => $folder.$tmp_name, 
                'name'=>$request['name']
            ]);

            DB::table('admins_activity')->insert([
                'user_email' => $request['email'], 
                'activity' => 'New Signature Added Data Updated',
                'description' => 'You just added '.ucwords($request['name']).' to the signature lists.',
                'icon' => 'fa fa-500px',
                'color' => 'bg2',
            ]);

        }

        return redirect()->back()->with('message', 'Attestation Data Updated Successfully!');
    }

    //Signature Data form
    public function delete_signatures(Request $request){

        DB::delete('delete from signatures where id = ?',[$request->ti]);

        return redirect()->back();

    }

    public function activate_user(Request $request){

        DB::table('members')->where('id', $request->id)->update([
            'irorun_m_no' => $request->m_no, 
            'recom_slot_no' => $request->rs_no, 
            'application_fee' => $request->fee, 
            'application_status' => 'completed', 
            'receipt_no' => $request->r_no, 
            'treasurer_sign' => $request->t_sign, 
            'form_checked_by' => $request->f_checked_by, 
            'checked_by_signature' => $request->f_checked_by_sign, 
            'date_checked' => NOW(), 
            'form_approved_by' => $request->f_approved_by, 
            'approved_signature' => $request->f_approved_by_sign, 
            'date_approved' => NOW(), 
            'attestation_status' => 'completed'
        ]);

        return redirect('/admin/users/pending');

    }

    public function loan_repay(Request $request){

        $loans = DB::table('loans')->where(['email'=>$request->email,'status'=>'approved'])->orderBy('id', 'desc')->get();
        if(count($loans) > 0){

            echo "<select name='dLoans' class='form-control'>";

            foreach($loans as $loan){

                echo "<option value='".$loan->id."'>".$loan->loan_type."   -  ₦".number_format($loan->amount)."    -   ".date("F d, Y",strtotime($loan->created_at))."</option>";

            }

            echo "</select>";

            echo '<br><button class="btn btn-primary" onclick="return confirm(\'Are you sure the data supplied are valid?\');">Repaid</button>';
        }else {

            echo "<div class='alert alert-warning'>No active loan found for this user</div>";

        }

    }

    public function repay_loan(Request $request){

        $user = DB::table('members')->where('email', $request['user'])->first();

        DB::table('repayments')->insert([
            'name' => $user->first_name." ".$user->last_name." ".$user->other_names, 
            'email' => $request->user, 
            'm_no' => $user->irorun_m_no, 
            'amount_repayed' => $request->amount, 
            'loan_repaying' => $request->dLoans, 
        ]);

        return redirect()->back()->with('message', 'Repayments made on database.');

    }

    public function new_depo(Request $request){

        $user = DB::table('members')->where('email', $request['user'])->first();

         DB::table('deposits')->insert([
            'email' => $request['user'], 
            'membership_no' => $user->irorun_m_no, 
            'amount' => $request['amount'] 
        ]);

         return redirect()->back()->with('message', 'Deposit made to user\'s account');

    }

    public function active_depo(Request $request){

        $number = 1;

        $deposits = DB::table('deposits')->where('email', $request['user'])->orderBy('id','desc')->get();

        foreach($deposits as $deposit){

            echo '
                                <h4 class="header-title">'.ucwords($deposits->email).'</h4>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-striped text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">S/N</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Membership Number</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td scope="row">'.$number++ .'</td>
                                                    <td>'.date("F d, Y",strtotime($deposit->created_at)) .'</td>
                                                    <td>'.$deposit->membership_no .'</td>
                                                    <td>'.$deposit->email .'</td>
                                                    <td>₦'.number_format($deposit->amount).'</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
            ';

        }

    }

    public function new_saving(Request $request){

        $user = DB::table('members')->where('email', $request['user'])->first();

         DB::table('savings')->insert([
            'email' => $request['user'], 
            'membership_no' => $user->irorun_m_no, 
            'amount' => $request['amount'] 
        ]);

         return redirect()->back()->with('message', 'Savings made to user\'s account');

    }

    public function new_blog(Request $request){

        $file = $request->file('thumb');

        $file_name = time() . str_replace(" ", "-", $file->getClientOriginalName());                      
        $file_path = 'uploads/thumbs';

        if($file->move($file_path, $file_name)){

            $thefileG = $file_path . "/" . $file_name;

            DB::table('blog')->insert([
                'title' => $request->title, 
                'thumb' => $thefileG, 
                'created_by'=>'Comms Unit',
                'posts'=>$request->content,
                'counts'=>'0'
            ]);

            return redirect()->back()->with('message', 'News posted successfully!');

        }

    }

    public function add_guarantor(Request $request){

        $user = DB::table('members')->where('email', $request['email'])->first();

         DB::table('guarantors')->insert([
            'name' => $user->first_name." ".$user->last_name." ".$user->other_names, 
            'service_no' => $request->serv_no, 
            'rank' => $request->rank ,
            'station' => $request->station,
            'command' => $request->command,
            'unit' => $request->unit,
            'phone' => $user->phone,
            'email' => $user->email,
            'address' => $user->address,
            'sign' => $user->user_signature
        ]);

        return redirect()->back()->with('message', 'New guarantor added.');

    }
}
