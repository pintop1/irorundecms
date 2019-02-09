@extends('layouts.admin')

@section('title') Admin Dashboard @stop

@section('dash') active @stop

@section('dot')@stop

@section('breadcrumbs') 

                                <li><a href="/">Home</a></li>
                                <li><span>Dashboard</span></li>
@stop

@section('main_content')
            <!-- sales report area start -->
                <div class="sales-report-area mt-5 mb-5">
                    <div class="row">
                        <div class="col-lg-8">
                        <div class="row">
                            <div class="col-md-6 mt-5 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg1">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="fa fa-group"></i> Members</div>
                                            <h2>{{ number_format($members) }}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-md-5 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg2">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="fa fa-hand-grab-o"></i> Loans</div>
                                            <h2>₦{{ number_format($loans) }}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3 mb-lg-0">
                                <div class="card">
                                    <div class="seo-fact sbg3">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="fa fa-credit-card-alt"></i> Deposits</div>
                                            <h2>₦{{ number_format($deposits) }}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="seo-fact sbg4">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="fa fa-database"></i> Savings</div>
                                            <h2>₦{{ number_format($savings) }}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- seo fact area end -->
                    <!-- Social Campain area start -->
                    <div class="col-lg-4 mt-5">
                        <div class="card">
                            <div class="card-body pb-0">
                                <h4 class="header-title">Social ads Campain</h4>
                                <div id="socialads" style="height: 155px;"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Social Campain area end -->
                </div>
                <!-- sales report area end -->
                <!-- market value area start -->
                <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
                                    <h4 class="header-title mb-0">Recent Users</h4>
                                </div>
                                <div class="market-status-table mt-4">
                                    <div class="table-responsive">
                                        <table class="dbkit-table">
                                            <tr class="heading-td text-uppercase">
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Status</th>
                                                <th>Date joined</th>
                                            </tr>
                                            <tr>
                                                @foreach($recent_members as $recent)
                                                <td>{{ ucwords($recent->first_name." ".$recent->last_name." ".$recent->other_names) }}</td>
                                                <td>{{ strtolower($recent->email) }}</td>
                                                <td>{{ $recent->phone }}</td>
                                                <td>
                                                    @if($recent->status == 'incomplete')
                                                    <span class="badge badge-warning">Incomplete Registration</span>
                                                    @else
                                                    <span class="badge badge-success">Verified</span>
                                                    @endif
                                                </td>
                                                <td>{{ date("F d, Y",strtotime($recent->created_at)) }}</td>
                                                @endforeach
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- market value area end -->
                <div class="row mt-5">
                    <!-- latest news area start -->
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Latest News</h4>
                                <div class="letest-news mt-5">
                                    @foreach($blogs as $blog)
                                    <div class="single-post mb-xs-40 mb-sm-40">
                                        <div class="lts-thumb">
                                            <img src="{{ $blog->thumb }}">
                                        </div>
                                        <div class="lts-content">
                                            <span>{{ $blog->created_by }}</span>
                                            <h2><a href="blog.html">{{ $blog->title }}</a></h2>
                                            <p>{!! substr($blog->posts,0,100) !!}.....</p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- latest news area end -->
                </div>
                <!-- row area start-->
            </div>    
@stop

@section('myscript')
            
@stop