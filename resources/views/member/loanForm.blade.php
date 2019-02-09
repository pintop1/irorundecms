@extends('layouts.member')

@section('title') Member Loan Application @stop

@section('dot')../../@stop

@section('dash') @stop
@section('loans') active @stop
@section('savings') @stop
@section('deposits') @stop
@section('thrifts') @stop
@section('qla') @stop
@section('profile') @stop
@section('maps') @stop

@section('dotPassport')../../@stop

@section('breadcrumbs') 
								<li><a href="/">Home</a></li>
                                <li><span>Loan Application</span></li>
@stop

@section('main_content')
                <div class="row">
                    @if($user->status != 'incomplete')
                    <form action="{{ route('process_loan_form') }}" method="post">
                        @csrf
                    	<div class="col-md-14 mt-5">
                            <div class="card">
                                <div class="card-body">
                                    @if(session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('message') }}
                                    </div>
                                    @endif
                                	<h4 class="header-title">Loan Application Form</h4>
                                    <!-- user data -->
                                    <input class="form-control form-control-lg mb-4" type="hidden" name="email" value="{{ $user->email }}">
                                    <input class="form-control form-control-lg mb-4" type="hidden" name="name" value="{{ $user->first_name }} {{ $user->last_name }} {{ $user->other_names }}">
                                    <input class="form-control form-control-lg mb-4" type="hidden" name="mem_no" value="{{ $user->recom_slot_no }}">
                                    <input class="form-control form-control-lg mb-4" type="hidden" name="phone" value="{{ $user->phone }}">
                                    <input class="form-control form-control-lg mb-4" type="hidden" name="address" value="{{ $user->address }}">
                                    <!-- user data ends -->
                                    <div class="form-group">
                                        <label class="col-form-label">Loan Type</label>
                                        <select class="form-control" name="loan_type">
                                            <option>Sharp-Sharp</option>
                                            <option>Booster</option>
                                            <option>Omolere</option>
                                            <option>SME</option>
                                        </select>
                                    </div>
                                    <input class="form-control form-control-lg mb-4" type="number" placeholder="Amount" name="amount">
                                    <textarea class="form-control form-control-lg mb-4" rols="10" cols="10" placeholder="Purpose" name="purpose"></textarea>
                                    <div class="form-group">
                                        <label class="col-form-label">Repayment Period</label>
                                        <select class="form-control" name="repay_period">
                                            <option>1 month</option>
                                            @for($i = 2;$i <= 11;$i++)
                                            <option>{{ $i }} months</option>
                                            @endfor
                                            <option>1 year</option>
                                            @for($i = 2;$i <= 5;$i++)
                                            <option>{{ $i }} years </option>
                                            @endfor
                                        </select>
                                    </div>
                                    <input class="form-control form-control-lg mb-4" type="number" placeholder="Current Loan Balance" name="loan_balance">
                                    <input class="form-control form-control-lg mb-4" type="number" placeholder="Savings Balance" name="saving_balance">
                                    <input class="form-control form-control-lg mb-4" type="number" placeholder="Average Monthly Contribution" name="monthly_contribution">
                                    <div class="form-group">
                                        <label>Repayment Date</label>
                                        <input class="form-control form-control-lg mb-4" type="date" placeholder="Repayment Date" name="repay_date">              
                                    </div>
                                    <input class="form-control form-control-lg mb-4" type="number" placeholder="Thrift Contribution" name="thrift_contribution">
                                    <input class="form-control form-control-lg mb-4" type="number" placeholder="QLA Repayment" name="qla_repayment">
                                    <div class="">
                                    	<b class="text-muted mb-3 mt-4 d-block"><h4>Loan Security: </h4>Please tick all saving package you are currently subscribed to.</b>
                                    	<div class="custom-control custom-checkbox custom-control-inline">
    	                                    <input type="checkbox" checked class="custom-control-input" id="customCheck1" name="ileya" value="ileya_savings,">
    	                                    <label class="custom-control-label" for="customCheck1">Ileya Savings</label>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2" name="xmas" value="xmas_savings,">
                                            <label class="custom-control-label" for="customCheck2">Xmas Savings</label>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" class="custom-control-input" id="customCheck3" name="fixed" value="fixed_deposit,">
                                            <label class="custom-control-label" for="customCheck3">Fixed Deposit</label>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" class="custom-control-input" id="customCheck4" name="daily" value="daily_savings,">
                                            <label class="custom-control-label" for="customCheck4">Daily Savings</label>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" class="custom-control-input" id="customCheck5" name="weekly" name="weekly_savings,">
                                            <label class="custom-control-label" for="customCheck5">Weekly Savings</label>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" class="custom-control-input" id="customCheck6" name="coop" value="coop_savings,">
                                            <label class="custom-control-label" for="customCheck6">Coop. Savings</label>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" class="custom-control-input" id="customCheck7" name="thrift" value="thrift,">
                                            <label class="custom-control-label" for="customCheck7">Thrift (Yet to collect)</label>
                                        </div>
                                    </div>
                                    <div class="">
                                    	<b class="text-muted mb-3 mt-4 d-block"><h4>Loan Security Plus: </h4>Insurance Fee.</b>
                                    	<div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" class="custom-control-input" id="customCheck8" name="loan_security_plus" value="yes">
                                            <label class="custom-control-label" for="customCheck8">Applicable</label>
                                        </div><br>
                                        <div class="form-group">
                                            <label class="col-form-label">Guarantor</label>
                                            <select class="form-control" name="guarantor">
                                                @foreach($guarantor as $guarantors)
                                                <option value="<?php echo $guarantors->email;?>"><?php echo ucwords($guarantors->first_name." ".$guarantors->last_name." ".$guarantors->other_names)." - ".$guarantors->recom_slot_no;?></option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <br><button class="btn btn-primary" type="submit">Apply Now</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    @else
                        <div class="col-md-12 mt-5">
                            <div class="card">
                                <div class="card-body">
                                    <div class="alert alert-danger" role="alert"><strong>Restricted!</strong> Please complete your registration to access our loan form.</div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>		
@stop

@section('myscript')
@stop