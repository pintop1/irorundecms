@extends('layouts.member')

@section('title') Member QLA Form @stop

@section('dot')../../@stop

@section('dash') @stop
@section('loans') @stop
@section('savings') @stop
@section('deposits') @stop
@section('thrifts') @stop
@section('qla') active @stop
@section('profile') @stop
@section('maps') @stop

@section('dotPassport')../../@stop

@section('breadcrumbs') 
                                <li><a href="/">Home</a></li>
                                <li><span>QLA Form</span></li>
@stop

@section('main_content')
                <div class="row">
                    @if($user->status != 'incomplete')
                    <form action="{{ route('process_qla_form') }}" method="post">
                        @csrf
                        <div class="col-md-14 mt-5">
                            <div class="card">
                                <div class="card-body">
                                    @if(session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('message') }}
                                    </div>
                                    @endif
                                    <h4 class="header-title">QLA Form</h4>
                                    <!-- user data -->
                                    <input class="form-control form-control-lg mb-4" type="hidden" name="email" value="{{ $user->email }}">
                                    <input class="form-control form-control-lg mb-4" type="hidden" name="name" value="{{ $user->first_name }} {{ $user->last_name }} {{ $user->other_names }}">
                                    <input class="form-control form-control-lg mb-4" type="hidden" name="mem_no" value="{{ $user->recom_slot_no }}">
                                    <input class="form-control form-control-lg mb-4" type="hidden" name="phone" value="{{ $user->phone }}">
                                    <input class="form-control form-control-lg mb-4" type="hidden" name="address" value="{{ $user->address }}">
                                    <!-- user data ends -->
                                    <div class="">
                                        <b class="text-muted mb-3 mt-4 d-block"><h4>QLA Details: </h4></b>
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1" name="new_qla" value="New Qla,">
                                            <label class="custom-control-label" for="customCheck1">New QLA</label>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2" name="fairly" value="fairly used/tokunbo,">
                                            <label class="custom-control-label" for="customCheck2">Fairly Used/Tokunbo</label>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" class="custom-control-input" id="customCheck3" name="qla_swapping" value="QLA Swapping,">
                                            <label class="custom-control-label" for="customCheck3">QLA Swapping</label>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" class="custom-control-input" id="customCheck4" name="foodstuff" value="Foodstuff,">
                                            <label class="custom-control-label" for="customCheck4">Foodstuff</label>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" class="custom-control-input" id="customCheck5" name="joint" value="Joint-Financing,">
                                            <label class="custom-control-label" for="customCheck5">Joint-Financing</label>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" class="custom-control-input" id="customCheck6" name="business" value="Business Financing,">
                                            <label class="custom-control-label" for="customCheck6">Business Financing</label>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label class="col-form-label">Purpose</label>
                                        <select class="form-control" name="purpose">
                                            <option>Home Use</option>
                                            <option>Business</option>
                                        </select>
                                    </div>
                                    <input class="form-control form-control-lg mb-4" type="text" placeholder="Asset Type" name="asset_type">
                                    <input class="form-control form-control-lg mb-4" type="text" placeholder="Size" name="size">
                                    <input class="form-control form-control-lg mb-4" type="text" placeholder="Brand" name="brand">
                                    <textarea class="form-control form-control-lg mb-4" rols="10" cols="10" placeholder="Brief Description" name="desc"></textarea>
                                    <div class="form-group">
                                        <label class="col-form-label">Tenure of Repayment</label>
                                        <select class="form-control" name="repay_tenure">
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

                                    <!-- user datat two -->
                                    <input class="form-control form-control-lg mb-4" type="hidden" placeholder="salary account number" name="account" value="{{ $user->account_number }}">
                                    <input class="form-control form-control-lg mb-4" type="hidden" name="bank" value="{{ $user->bank }}">
                                    <input class="form-control form-control-lg mb-4" type="hidden" name="branch" value="{{ $user->bank_branch }}">
                                    <input class="form-control form-control-lg mb-4" type="hidden" name="signature" value="{{ $user->user_signature }}">
                                    <!-- user data two ends -->

                                    <div class="form-group">
                                        <label class="col-form-label">Guarantor</label>
                                        <select class="form-control" name="guarantor">
                                            @foreach($guarantor as $guarantors)
                                            <option value="<?php echo $guarantors->email;?>"><?php echo ucwords($guarantors->first_name." ".$guarantors->last_name." ".$guarantors->other_names)." - ".$guarantors->recom_slot_no;?></option>
                                            @endforeach
                                        </select>
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
                                    <div class="alert alert-danger" role="alert"><strong>Restricted!</strong> Please complete your registration to access our Qla form.</div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>      
@stop

@section('myscript')
@stop