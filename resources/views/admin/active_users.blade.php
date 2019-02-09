@extends('layouts.admin')

@section('title') Active Users @stop

@section('users') active @stop

@section('dot')../../@stop

@section('breadcrumbs') 

                                <li><a href="/">Home</a></li>
                                <li><span>Active Users</span></li>
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
                                <h4 class="header-title">Users</h4>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-striped text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">S/N</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $number = 1;?>
                                                @foreach($new_member as $member)
                                                <tr>
                                                    <th scope="row">{{ $number++ }}</th>
                                                    <td>{{ ucwords($member->first_name . " " . $member->last_name . " " . $member->other_names) }}</td>
                                                    <td>{{ $member->email }}</td>
                                                    <td>{{ date("F d, Y",strtotime($member->created_at)) }}</td>
                                                    <td><a href="?view={{ $member->id }}"><i class="ti-eye"></i></a></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <br><center>{{ $new_member->onEachSide(5)->links() }}</center>
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
                                                <span>User Profile</span>
                                            </div>
                                            <div class="iv-right col-6 text-md-right">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            <div class="invoice-address">
                                            	<h3> {{ $viewing->title }} </h3>
                                                <h5>{{ ucwords($viewing->first_name ." ".$viewing->last_name." ".$viewing->other_names) }}</h5>
                                                <p>{{ $viewing->address }}</p>
                                                <p>{{ $viewing->phone }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-md-right">
                                            <p><img class="dp" src="../../{{ $viewing->passport }}"></p>
                                        </div>
                                    </div>

                                    <div class="table-responsive mt-5">
                                    	<center><h3>Personal Data</h3></center>
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr class="text-uppercase">
                                                	<th>Query</th>
                                                    <th class="text-right">Data</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                	<td>Email</td>
                                                	<td class="text-right">{{ $viewing->email }}</td>
                                                </tr>
                                                <tr>
                                                	<td>WhatsApp Number</td>
                                                	<td class="text-right">{{ $viewing->whatsapp_no }}</td>
                                                </tr>
                                                <tr>
                                                	<td>Spouse Name</td>
                                                	<td class="text-right">{{ $viewing->spouse_name }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <center><h3>Work Data</h3></center>
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr class="text-uppercase">
                                                	<th>Query</th>
                                                    <th class="text-right">Data</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            	<tr>
                                                	<td>Company Name</td>
                                                	<td class="text-right">{{ $viewing->name_of_company }}</td>
                                                </tr>
                                                <tr>
                                                	<td>Company Address</td>
                                                	<td class="text-right">{{ $viewing->company_address }}</td>
                                                </tr>
                                                <tr>
                                                	<td>Registration Number</td>
                                                	<td class="text-right">{{ $viewing->company_reg_no }}</td>
                                                </tr>
                                                <tr>
                                                	<td>Position</td>
                                                	<td class="text-right">{{ $viewing->position }}</td>
                                                </tr>
                                                <tr>
                                                	<td>Nature</td>
                                                	<td class="text-right">{{ $viewing->nature }}</td>
                                                </tr>
                                                <tr>
                                                	<td>Industry</td>
                                                	<td class="text-right">{{ $viewing->industry }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <center><h3>Guarantor Data</h3></center>
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr class="text-uppercase">
                                                	<th>Query</th>
                                                    <th class="text-right">Data</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            	<tr>
                                                	<td>Guarantor Name</td>
                                                	<td class="text-right">{{ $viewing->guarantor_name }}</td>
                                                </tr>
                                                <tr>
                                                	<td>Guarantor's Service Number</td>
                                                	<td class="text-right">{{ $viewing->guarantor_service_no }}</td>
                                                </tr>
                                                <tr>
                                                	<td>Rank</td>
                                                	<td class="text-right">{{ $viewing->rank }}</td>
                                                </tr>
                                                <tr>
                                                	<td>Station</td>
                                                	<td class="text-right">{{ $viewing->station }}</td>
                                                </tr>
                                                <tr>
                                                	<td>Command</td>
                                                	<td class="text-right">{{ $viewing->command }}</td>
                                                </tr>
                                                <tr>
                                                	<td>Unit</td>
                                                	<td class="text-right">{{ $viewing->unit }}</td>
                                                </tr>
                                                <tr>
                                                	<td>Guarantor Phone</td>
                                                	<td class="text-right">{{ $viewing->guarantor_phone }}</td>
                                                </tr>
                                                <tr>
                                                	<td>Guarantor Email</td>
                                                	<td class="text-right">{{ $viewing->guarantor_email }}</td>
                                                </tr>
                                                <tr>
                                                	<td>Guarantor Address</td>
                                                	<td class="text-right">{{ $viewing->guarantor_address }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <center><h3>Financial Data</h3></center>
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr class="text-uppercase">
                                                	<th>Query</th>
                                                    <th class="text-right">Data</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            	<tr>
                                                	<td>Bank Name</td>
                                                	<td class="text-right">{{ $viewing->bank }}</td>
                                                </tr>
                                                <tr>
                                                	<td>Account Name</td>
                                                	<td class="text-right">{{ $viewing->account_name }}</td>
                                                </tr>
                                                <tr>
                                                	<td>Account Number</td>
                                                	<td class="text-right">{{ $viewing->account_number }}</td>
                                                </tr>
                                                <tr>
                                                	<td>Bank Branch</td>
                                                	<td class="text-right">{{ $viewing->bank_branch }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <center><h3>Signature</h3></center>
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr class="text-uppercase">
                                                	<th>Query</th>
                                                    <th class="text-right">Data</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            	<tr>
                                                	<td>Signature</td>
                                                	<td class="text-right"><img src="../../{{ $viewing->user_signature }}"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <center><h3>Official Attestation</h3></center>
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr class="text-uppercase">
                                                	<th>Query</th>
                                                    <th class="text-right">Data</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            	<tr>
                                                	<td>Membership Number</td>
                                                	<td class="text-right">{{ $viewing->irorun_m_no }}</td>
                                                </tr>
                                                <tr>
                                                	<td>Recommended Slot Number</td>
                                                	<td class="text-right">{{ $viewing->recom_slot_no }}</td>
                                                </tr>
                                                <tr>
                                                	<td>Application Fee</td>
                                                	<td class="text-right">N{{ number_format($viewing->application_fee) }}</td>
                                                </tr>
                                                <tr>
                                                	<td>Fee Status</td>
                                                	<td class="text-right"><span class="badge badge-success">Paid</span></td>
                                                </tr>
                                                <tr>
                                                	<td>Receipt No</td>
                                                	<td class="text-right">{{ $viewing->receipt_no }}</td>
                                                </tr>
                                                <tr>
                                                	<td>Treasurer's Signature</td>
                                                	<td class="text-right"><img src="../../{{ $viewing->treasurer_sign }}"></td>
                                                </tr>
                                                <tr>
                                                	<td>Form checked by</td>
                                                	<td class="text-right">{{ ucwords($viewing->form_checked_by) }}</td>
                                                </tr>
                                                <tr>
                                                	<td>Signature</td>
                                                	<td class="text-right"><img src="../../{{ $viewing->checked_by_signature }}"></td>
                                                </tr>
                                                <tr>
                                                	<td>Date Checked</td>
                                                	<td class="text-right">{{ date("F d, Y",strtotime($viewing->date_checked)) }} at {{ date("h:i a",strtotime($viewing->date_checked)) }}</td>
                                                </tr>
                                                <tr>
                                                	<td>Form Approved By</td>
                                                	<td class="text-right">{{ $viewing->form_approved_by }}</td>
                                                </tr>
                                                <tr>
                                                	<td>Signature</td>
                                                	<td class="text-right"><img src="../../{{ $viewing->approved_signature }}"></td>
                                                </tr>
                                                <tr>
                                                    <td>Date Approved</td>
                                                    <td class="text-right">{{ date("F d, Y",strtotime($viewing->date_approved)) }} at {{ date("h:i a",strtotime($viewing->date_approved)) }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
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
    <style>
    .dpi {
        text-align: center;
        align-content: center;
    }
    img.dp {
        width: 180px;
        margin-bottom: 2em;
        border-radius: 240px;
        height: 180px;
    }
</style>        
@stop