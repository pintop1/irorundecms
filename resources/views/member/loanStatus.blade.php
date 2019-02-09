@extends('layouts.member')

@section('title') Member Loan Status @stop

@section('dot')../../@stop

@section('loans') active @stop

@section('dotPassport')../../@stop

@section('breadcrumbs') 
								<li><a href="/">Home</a></li>
                                <li><span>Loan Status</span></li>
@stop

@section('main_content')
                <div class="row">
                    <div class="col-xl-3 col-ml-12 col-mdl-4 col-sm-12 mt-5">
                        <div class="card">
                            <div class="pricing-list">
                                <div class="prc-head">
                                    <h4>Current Loan Status</h4>
                                </div>
                                <div class="prc-list">
                                    <ul>
                                        <li><a href="#">Total owed: ₦{{ number_format($loaned + ($loaned * (5/100))) }}</a></li>
                                        <li><a href="#">Total Repaid:  ₦{{ number_format($repaid) }}</a></li>
                                        <li><a href="#">Remaining Debt:  ₦{{ number_format($loaned-$repaid) }}</a></li>
                                        <li><a href="#">
                                            @if($loaned - $repaid < 1)
                                                <span class="badge badge-success">Cleared</span>
                                            @else
                                                <span class="badge badge-warning">Not Cleared</span>
                                            @endif
                                        </a></li>
                                        <!--<li class="bold"><a href="#">1 SALT/year</a></li>
                                    </ul>
                                    <h4 class="header-title">Progress With Labels</h4>
                                    <div class="progress_area">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                        </div>
                                    </div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@stop

@section('myscript')
@stop