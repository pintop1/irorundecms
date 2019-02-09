@extends('layouts.member')

@section('title') Work Data @stop

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
                                <li><span>Work Details</span></li>
@stop

@section('main_content')
                <div class="row">
                    <div class="col-md-6 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Work Data</h4>
                                <form method="post" action="{{ route('update_work_data') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input class="form-control input-rounded mb-2" type="text" value="{{ $user->email }}" name="email" readonly>
                                    <input class="form-control input-rounded mb-2" type="text" value="{{ $user->name_of_company }}" name="work" placeholder="Company Name" required>
                                    <input class="form-control input-rounded mb-2" type="text" value="{{ $user->company_address }}" name="address" placeholder="Office Address" required>
                                    <input class="form-control input-rounded mb-2" type="text" value="{{ $user->company_reg_no }}" name="reg_no" placeholder="Company Registration Number" required>
                                    <input class="form-control input-rounded mb-2" type="text" value="{{ $user->position }}" name="position" placeholder="Post Held" required>
                                    <input class="form-control input-rounded mb-2" type="text" value="{{ $user->nature }}" name="nature" placeholder="Nature" required>
                                    <input class="form-control input-rounded mb-2" type="text" value="{{ $user->industry }}" name="industry" placeholder="Industry" required>
                                    
                                    <br><center><button class="btn btn-primary" type="submit">UPDATE</button></center>
                                </form>
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