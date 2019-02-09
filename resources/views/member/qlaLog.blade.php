@extends('layouts.member')

@section('title') Member QLA Logs @stop

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
                                <li><span>QLA Logs</span></li>
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
                                <h4 class="header-title">Striped Rows</h4>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-striped text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">S/N</th>
                                                    <th scope="col">Purpose</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">status</th>
                                                    <th scope="col">action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $number = 1;?>
                                                @foreach($qlas as $qla)
                                                <tr>
                                                    <th scope="row">{{ $number++ }}</th>
                                                    <td>{{ $qla->purpose }}</td>
                                                    <td>{{ date("F d, Y",strtotime($qla->created_at)) }}</td>
                                                    <td>
                                                        @if($qla->status == 'awaiting guarantor')
                                                        <span class="badge badge-warning">Awaiting Gurantor</span>
                                                        @elseif($qla->status == 'guarantor declined')
                                                        <span class="badge badge-danger">Guarantor declined</span>
                                                        @elseif($qla->status == 'pending')
                                                        <span class="badge badge-warning">Pending Approval</span>
                                                        @elseif($qla->status == 'approved')
                                                        <span class="badge badge-success">Approved</span>
                                                        @elseif($qla->status == 'declined')
                                                        <span class="badge badge-danger">Declined</span>
                                                        @elseif($qla->status == 'closed')
                                                        <span class="badge badge-info">Closed</span>
                                                        @endif
                                                    </td>
                                                    <td><a href="?view={{ $qla->id }}"><i class="ti-eye"></i></a></td>
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
                                                <span>LOAN QUOTATION</span>
                                            </div>
                                            <div class="iv-right col-6 text-md-right">
                                                <span>#{{ $view->id }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            <div class="invoice-address">
                                                <h3>Quote to</h3>
                                                <h5>{{ $view->first_name }} {{ $view->last_name }} {{ $view->other_names }}</h5>
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
                                            <p>{{ $view->guarantor_memership_no }}</p>
                                            <p>Guarantor's Status: 
                                                        @if($view->status == 'awaiting guarantor')
                                                        <span class="badge badge-warning">Pending Confirmation</span>@elseif($view->status == 'guarantor declined')
                                                        <span class="badge badge-danger">Declined</span>
                                                        @else
                                                        <span class="badge badge-primary">Approved</span>
                                                        @endif
                                        </div>
                                    </div>
                                    <div class="table-responsive mt-5">
                                        <table class="table table-hover text-left">
                                            <thead>
                                                <tr class="text-capitalize">
                                                    <th>Query</th>
                                                    <th>Data</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Purpose</td>
                                                    <td>{{ $view->purpose }}</td>
                                                </tr>
                                                <tr>
                                                    <td>QLA Details</td>
                                                    <td>{{ $view->Qla_dets }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Asset Type</td>
                                                    <td>{{ $view->asset_type }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Size</td>
                                                    <td>{{ $view->size }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Brand</td>
                                                    <td>{{ $view->brand }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Description</td>
                                                    <td>{{ $view->description }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Tenure of Payment</td>
                                                    <td>{{ $view->tenure_of_payment }}</td>
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
@stop