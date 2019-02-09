@extends('layouts.member')

@section('title') Financial Details @stop

@section('dot')../../@stop

@section('dash') @stop
@section('loans') @stop
@section('savings') @stop
@section('deposits') @stop
@section('thrifts') @stop
@section('qla') @stop
@section('profile') active @stop
@section('maps') @stop

@section('dotPassport')../../@stop

@section('breadcrumbs') 
                                <li><a href="/">Home</a></li>
                                <li><span>Financial Details</span></li>
@stop

@section('main_content')
                <div class="row">
                    <div class="col-md-6 mt-5">
                        <div class="card">
                            <div class="card-body">
                                @if($user->guarantor_status == '')
                                <div class="alert alert-warning">Please fill the guarantor form to proceed</div>
                                @else
                                <h4 class="header-title">Financial Data</h4>
                                <form method="post" action="{{ route('update_financial_data') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input class="form-control input-rounded mb-2" type="hidden" value="{{ $user->email }}" name="email" readonly="">
                                    <input class="form-control input-rounded mb-2" type="text" value="{{ $user->bank }}" name="bank" placeholder="Bank Name" required>
                                    <input class="form-control input-rounded mb-2" type="text" value="{{ $user->account_number }}" name="account_number" placeholder="Account Number" required>
                                    <input class="form-control input-rounded mb-2" type="text" value="{{ $user->account_name }}" name="account_name" placeholder="Account Name" required>
                                    <input class="form-control input-rounded mb-2" type="text" value="{{ $user->bank_branch }}" name="bank_branch" placeholder="Bank Branch" required>

                                    <br><center><button class="btn btn-primary" type="submit">UPDATE</button></center>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                     <div class="col-md-6 mt-5">
                        <div class="card card-bordered">
                            <div class="dpi card-body">
                                <img class="dp" src="../../{{ $user->passport }}" alt="image">
                                <p class="card-text">
                                    {{ $user->first_name }} {{ $user->last_name }} {{ $user->other_names }}
                                    <br>
                                    {{ $user->email }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
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