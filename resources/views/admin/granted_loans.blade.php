@extends('layouts.admin')

@section('title') Granted Loans @stop

@section('loans') active @stop

@section('dot')../../@stop

@section('breadcrumbs') 

                                <li><a href="/">Home</a></li>
                                <li><span>Granted Loans</span></li>
@stop

@section('main_content')
                <?php
                if(!isset($_GET['view'])){
                ?>
                <div class="row">
                    <!-- Striped table start -->
                    <div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Loans</h4>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-striped text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">S/N</th>
                                                    <th scope="col">Type</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">status</th>
                                                    <th scope="col">Amount</th>
                                                    <th scope="col">action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $number = 1;?>
                                                @foreach($loans as $loan)
                                                <tr>
                                                    <th scope="row">{{ $number++ }}</th>
                                                    <td>{{ $loan->loan_type }}</td>
                                                    <td>{{ date("F d, Y",strtotime($loan->created_at)) }}</td>
                                                    <td>
                                                        @if($loan->status == 'awaiting guarantor')
                                                        <span class="badge badge-warning">Awaiting Gurantor</span>
                                                        @elseif($loan->status == 'guarantor declined')
                                                        <span class="badge badge-danger">Guarantor declined</span>
                                                        @elseif($loan->status == 'pending')
                                                        <span class="badge badge-warning">Pending Approval</span>
                                                        @elseif($loan->status == 'approved')
                                                        <span class="badge badge-success">Approved</span>
                                                        @elseif($loan->status == 'declined')
                                                        <span class="badge badge-danger">Declined</span>
                                                        @elseif($loan->status == 'closed')
                                                        <span class="badge badge-info">Closed</span>
                                                        @endif
                                                    </td>
                                                    <td>₦{{ number_format($loan->amount) }}</td>
                                                    <td><a href="?view={{ $loan->id }}"><i class="ti-eye"></i></a></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Striped table end -->
                </div>
                <?php
                }
                ?>
                <?php
                if(isset($_GET['view'])){
                ?>
                <!-- display starts -->
                <div class="row">
                    <div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="invoice-area">
                                    <div class="invoice-head">
                                        <div class="row">
                                            <div class="iv-left col-6">
                                                <span>LOAN APPLICATION</span>
                                            </div>
                                            <!--<div class="iv-right col-6 text-md-right">
                                                <span>#{{ $view->id }}</span>
                                            </div>-->
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            <div class="invoice-address">
                                                <h3>Quote to</h3>
                                                <h5>{{ $view->name }}</h5>
                                                <p>{{ $view->address }}</p>
                                                <p>{{ $view->phone }}</p>
                                                <p>Loan Status: 
                                                    @if($view->status == 'awaiting guarantor')
                                                        <span class="badge badge-warning">Pending guarantor's action</span>
                                                        @elseif($view->status == 'guarantor declined')
                                                        <span class="badge badge-danger">Declined</span>
                                                        @elseif($view->status == 'pending')
                                                        <span class="badge badge-warning">Pending Approval</span>
                                                        @elseif($view->status == 'approved')
                                                        <span class="badge badge-success">Approved</span>
                                                        @elseif($view->status == 'declined')
                                                        <span class="badge badge-danger">Declined</span>
                                                        @elseif($view->status == 'closed')
                                                        <span class="badge badge-info">Closed</span>
                                                        @endif
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-md-right">
                                            <h3><strong>Guarantor</strong></h3>
                                            <h5>{{ $view->guarantor_name }}</h5>
                                            <p>{{ $view->guarantor_phone }}</p>
                                            <p>#{{ $view->guarantor_membership_no }}</p>
                                            <p>Guarantor's Status: 
                                                @if($view->status == 'awaiting guarantor')
                                                <span class="badge badge-warning">Pending Confirmation</span>@elseif($view->status == 'guarantor declined')
                                                <span class="badge badge-danger">Declined</span>
                                                @else
                                                <span class="badge badge-primary">Approved</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <div class="table-responsive mt-5">
                                        <table class="table table-hover text-left">
                                            <thead>
                                                <tr class="text-capitalize">
                                                    <th>Query</th>
                                                    <th class="text-right">Data</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Amount</td>
                                                    <td class="text-right">₦{{ number_format($view->amount) }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Purpose</td>
                                                    <td class="text-right">{{ $view->purpose }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Repayment Period</td>
                                                    <td class="text-right">{{ $view->repayment_period }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Current Loan Balance</td>
                                                    <td class="text-right">₦{{ number_format($view->current_loan_balance) }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Average Montly Contribution</td>
                                                    <td class="text-right">₦{{ number_format($view->average_monthly_contribution) }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Repayment Date</td>
                                                    <td class="text-right">{{ $view->repayment_date }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Thrift Contribution</td>
                                                    <td class="text-right">₦{{ number_format($view->thrift_contribution) }}</td>
                                                </tr>
                                                <tr>
                                                    <td>QLA Repayment</td>
                                                    <td class="text-right">₦{{ number_format($view->QLA_repayment) }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Loan Security</td>
                                                    <td class="text-right">
                                                        <span class="badge badge-info">
                                                        <?php
                                                        echo str_replace(",", "</span>    <span class='badge badge-info'>", ucwords(str_replace("_", " ", $view->loan_security)));
                                                        ?></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Loan Security Plus</td>
                                                    <td class="text-right">
                                                        <span class="badge badge-info">
                                                            @if($view->loan_security_plus == 'yes')
                                                            {{ 'applicable' }}
                                                            @else
                                                            {{ 'not applicable' }}
                                                            @endif
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    @if($view->status == 'pending')
                                    <form action="" method="post" class="form-control">
                                        @csrf
                                        <input type="hidden" value="{{ $view->id }}" name="di">
                                        <button onclick="return confirm('Are you sure you accept this loan request');">Approve</button>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- display ends -->
                <?php
                }
                ?>
@stop

@section('myscript')
@stop