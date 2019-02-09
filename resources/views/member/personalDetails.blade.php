@extends('layouts.member')

@section('title') Personal Data @stop

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
                                <li><span>Personal Details</span></li>
@stop

@section('main_content')
                <div class="row">
                    <div class="col-md-6 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Personal Data</h4>
                                <form method="post" action="{{ route('update_personal_data') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input class="form-control input-rounded mb-2" type="text" value="{{ $user->title }}" name="title" readonly>
                                    <input class="form-control input-rounded mb-2" type="text" value="{{ $user->first_name }}" readonly>
                                    <input class="form-control input-rounded mb-2" type="text" value="{{ $user->last_name }}" readonly>
                                    <input class="form-control input-rounded mb-2" type="text" value="{{ $user->other_names }}" placeholder="Other Names" name="oth" required>
                                    <input class="form-control input-rounded mb-2" type="text" value="{{ $user->email }}" name="email" readonly="">
                                    <input class="form-control input-rounded mb-2" type="text" value="{{ $user->phone }}" name="phone" placeholder="Phone Number" required>
                                    <input class="form-control input-rounded mb-2" type="text" value="{{ $user->whatsapp_no }}" name="whatsapp" placeholder="WhatsApp Number" required>
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="inputGroupFile02" name="passport" required>
                                            <label class="custom-file-label input-rounded" for="inputGroupFile02">Choose Passport</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text input-rounded">Upload</span>
                                        </div>
                                    </div>
                                    <input class="form-control input-rounded mb-2" type="text" value="{{ $user->spouse_name }}" name="spouse" placeholder="Spouse Name" required>
                                    <input class="form-control input-rounded mb-2" type="text" value="{{ $user->address }}" name="address" placeholder="Home Address" required>
                                    

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