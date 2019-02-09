<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'LandingController@index');
Route::get('/about', 'LandingController@about');
Route::get('/services', 'LandingController@services');
Route::get('/works', 'LandingController@works');
Route::get('/work-details', 'LandingController@work_details');
Route::get('/contact', 'LandingController@contact');
Route::get('/faqs', 'LandingController@faqs');
Route::get('/blog', 'LandingController@blog');
Route::get('/blog-details', 'LandingController@read');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('login', 'Auth\LoginController@showMemberLoginForm');
Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/register', 'Auth\RegisterController@showMemberRegisterForm');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');

/* 
===============================================================================
								form processing
===============================================================================
*/
Route::post('/admin_login', ['as'=>'admin_login','uses'=>'Auth\LoginController@adminLogin']);
Route::post('/member_login', ['as'=>'member_login','uses'=>'Auth\LoginController@memberLogin']);
Route::post('/admin_register', ['as'=>'admin_register','uses'=>'Auth\RegisterController@createAdmin']);
Route::post('/member_register', ['as'=>'member_register','uses'=>'Auth\RegisterController@createMember']);
Route::post('/process_loan_form', ['as'=>'process_loan_form','uses'=>'MemberController@process_loan_form']);
Route::post('/process_qla_form', ['as'=>'process_qla_form','uses'=>'MemberController@process_qla_form']);
Route::post('/update_personal_data', ['as'=>'update_personal_data','uses'=>'MemberController@update_personal_data']);
Route::post('/update_work_data', ['as'=>'update_work_data','uses'=>'MemberController@update_work_data']);
Route::post('/update_guarantor_data', ['as'=>'update_guarantor_data','uses'=>'MemberController@update_guarantor_data']);
Route::post('/update_financial_data', ['as'=>'update_financial_data','uses'=>'MemberController@update_financial_data']);
Route::post('/update_signature', ['as'=>'update_signature','uses'=>'AdminController@update_signature']);
Route::post('/add_signature', ['as'=>'update_signature','uses'=>'MemberController@add_signature']);
Route::post('/delete_signatures', ['as'=>'delete_signatures','uses'=>'AdminController@delete_signatures']);
Route::post('/activate_user', ['as'=>'activate_user','uses'=>'AdminController@activate_user']);
Route::post('/loan_repay', ['as'=>'loan_repay','uses'=>'AdminController@loan_repay']);
Route::post('/repay_loans', ['as'=>'repay_loans','uses'=>'AdminController@repay_loans']);
Route::post('/new_depo', ['as'=>'new_depo','uses'=>'AdminController@new_depo']);
Route::post('/active_depo', ['as'=>'active_depo','uses'=>'AdminController@active_depo']);
Route::post('/new_saving', ['as'=>'new_saving','uses'=>'AdminController@new_saving']);
Route::post('/new_default', ['as'=>'new_default','uses'=>'AdminController@new_default']);
Route::post('/new_blog', ['as'=>'new_blog','uses'=>'AdminController@new_blog']);
Route::post('/add_guarantor', ['as'=>'add_guarantor','uses'=>'AdminController@add_guarantor']);
/* 
===============================================================================
							form processing ends
===============================================================================
*/
Route::get('/member', 'MemberController@index');
Route::get('/member/loan/apply', 'MemberController@showLoanForm');
Route::get('/member/loan/active', 'MemberController@showActiveLoans');
Route::get('/member/loan/logs', 'MemberController@showLoanLogs');
Route::get('/member/loan/status', 'MemberController@showLoanStatus');
Route::get('/member/savings', 'MemberController@showSavingsLog');
Route::get('/member/deposits', 'MemberController@showDepositsLog');
Route::get('/member/thrifts', 'MemberController@showThriftLog');
Route::get('/member/qla/apply', 'MemberController@showQlaForm');
Route::get('/member/qla/active', 'MemberController@showActiveQla');
Route::get('/member/qla/log', 'MemberController@showQlaLogs');
Route::get('/member/qla/status', 'MemberController@showQlaStatus');
Route::get('/member/profile/personal-details', 'MemberController@showPersonalForm');
Route::get('/member/profile/work-details', 'MemberController@showWorkForm');
Route::get('/member/profile/guarantor', 'MemberController@showGuarantorForm');
Route::get('/member/profile/financial-details', 'MemberController@showFinancialForm');
Route::get('/member/profile/attestation', 'MemberController@showAttestationForm');
Route::get('/member/profile/next-of-kin', 'MemberController@showNextForm');
Route::get('/member/logout', 'MemberController@logout');


/* 
===============================================================================
									administrator
===============================================================================
*/
Route::get('/admin', 'AdminController@index');
Route::get('/admin/signatures/new', 'AdminController@new_signatures');
Route::get('/admin/signatures/all', 'AdminController@all_signatures');
Route::get('/admin/users/pending', 'AdminController@show_pending_users');
Route::get('/admin/users/active', 'AdminController@show_active_users');
/*
Route::get('/admin/users/blocked', 'AdminController@index');
Route::get('/admin/users/rejected', 'AdminController@index');
*/
//Route::get('/admin/users/docs', 'AdminController@index');
Route::get('/admin/loans/new', 'AdminController@new_loans');
Route::get('/admin/loans/granted', 'AdminController@granted_loans');
Route::get('/admin/loans/rejected', 'AdminController@rejected_loans');
Route::get('/admin/loans/repay', 'AdminController@repayments');
//Route::get('/admin/loans/docs', 'AdminController@');
Route::get('/admin/deposits/new', 'AdminController@new_deposits');
Route::get('/admin/deposits/active', 'AdminController@active_deposits');
//Route::get('/admin/deposits/log', 'AdminController@index');
//Route::get('/admin/deposits/docs', 'AdminController@index');
Route::get('/admin/savings/new', 'AdminController@new_savings');
Route::get('/admin/savings/active', 'AdminController@active_savings');
//Route::get('/admin/savings/log', 'AdminController@index');
//Route::get('/admin/savings/docs', 'AdminController@index');
//Route::get('/admin/thrifts/turns', 'AdminController@index');
//Route::get('/admin/thrifts/log', 'AdminController@index');
//Route::get('/admin/thrifts/docs', 'AdminController@index');
/*
Route::get('/admin/defaulters/new', 'AdminController@new_defaulters');
Route::get('/admin/defaulters/all', 'AdminController@index');
Route::get('/admin/defaulters/log', 'AdminController@index');
*/
//Route::get('/admin/defaulters/docs', 'AdminController@index');
Route::get('/admin/news/new', 'AdminController@new_news');
Route::get('/admin/news/all', 'AdminController@all_news');
/*
Route::get('/admin/testimonials/new', 'AdminController@index');
Route::get('/admin/testimonials/all', 'AdminController@index');
Route::get('/admin/supports/new', 'AdminController@index');
Route::get('/admin/supports/answered', 'AdminController@index');
*/
Route::get('/admin/guarantors/new', 'AdminController@new_guarantors');
Route::get('/admin/guarantors/all', 'AdminController@all_guarantors');
Route::get('/admin/logout', 'AdminController@logout');