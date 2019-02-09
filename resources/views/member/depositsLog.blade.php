@extends('layouts.member')

@section('title') Deposits Log @stop

@section('dot')../../@stop

@section('deposits') active @stop

@section('dotPassport')../../@stop

@section('breadcrumbs') 
                                <li><a href="/">Home</a></li>
                                <li><span>Deposits Log</span></li>
@stop

@section('main_content')
                <div class="row">
                    <!-- Striped table start -->
                    <div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Deposits</h4>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-striped text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">S/N</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $number = 1;?>
                                                @foreach($deposits as $deposit)
                                                <tr>
                                                    <th scope="row">{{ $number++ }}</th>
                                                    <td>{{ date("F d, Y",strtotime($deposit->created_at)) }}</td>
                                                    <td>₦{{ number_format($deposit->amount) }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <br><center>{{ $deposits->onEachSide(5)->links() }}</center>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Striped table end -->
                </div>
@stop

@section('myscript')
@stop