@extends('layouts.member')

@section('title') Member Dashboard @stop

@section('dot')../../@stop

@section('dash') @stop
@section('loans') @stop
@section('savings') @stop
@section('deposits') active @stop
@section('thrifts') @stop
@section('qla') @stop
@section('profile') @stop
@section('maps') @stop

@section('breadcrumbs') 
								<li><a href="/">Home</a></li>
                                <li><span>Loan Application</span></li>
@stop

@section('main_content')
                <div class="row">
                    <div class="col-xl-3 col-ml-6 col-mdl-4 col-sm-6 mt-5">
                        <div class="card">
                            <div class="pricing-list">
                                <div class="prc-head">
                                    <h4>Membership</h4>
                                </div>
                                <div class="prc-list">
                                    <ul>
                                        <li><a href="#">Term financing</a></li>
                                        <li><a href="#">Access up to $10,000</a></li>
                                        <li><a href="#">Get: USD</a></li>
                                        <li><a href="#">3-24 Month Terms</a></li>
                                        <li class="bold"><a href="#">1 SALT/year</a></li>
                                    </ul>
                                    <a href="#">Buy Package</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Progress With Labels</h4>
                                <div class="progress_area">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@stop

@section('myscript')
@stop