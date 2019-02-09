@extends('layouts.member')

@section('title') Next of Kin @stop

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
                                <li><span>Next of Kin</span></li>
@stop

@section('main_content')
                <div class="row">
                    <div class="col-md-6 mt-5">
                        <div class="card">
                            <div class="card-body">
                                @if($user->signature_status == '')
                                <div class="alert alert-warning">Please fill attestation data form to proceed!</div>
                                @elseif($user->attestation_status == '')
                                <div class="alert alert-warning">Please wait for administrator's action to continue!</div>
                                @else
                                <div id="accordion2" class="according accordion-s2">
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="card-link" data-toggle="collapse" href="#accordion21">NEXT OF KIN #1</a>
                                        </div>
                                        <div id="accordion21" class="collapse show" data-parent="#accordion2">
                                            <div class="card-body">
                                                <form method="post" action="{{ route('update_personal_data') }}" enctype="multipart/form-data">
                                                @csrf
                                                    <input class="form-control input-rounded mb-2" type="hidden" value="{{ $user->email }}" name="email">
                                                    <input class="form-control input-rounded mb-2" type="text" value="{{ $user->first_name }}" name="firstname" readonly>
                                                    <input class="form-control input-rounded mb-2" type="text" value="{{ $user->last_name }}" name="lastname" readonly>
                                                    <input class="form-control input-rounded mb-2" type="text" value="{{ $user->other_names }}" name="oth" readonly>
                                                    <input class="form-control input-rounded mb-2" type="text" value="{{ $user->irorun_m_no }}" name="m_no" readonly>
                                                    <input class="form-control input-rounded mb-2" type="text" value="{{ date('Y',strtotime($user->created_at)) }}" name="adm" readonly>
                                                    <input class="form-control input-rounded mb-2" type="text" value="{{ $user->address }}" name="address" readonly>
                                                    <input class="form-control input-rounded mb-2" type="hidden" value="{{ $user->user_signature }}" name="sign" readonly>



                                                    <input class="form-control input-rounded mb-2" type="text" value="{{ $next->next_first_name }}" name="fname" placeholder="First Name">
                                                    <input class="form-control input-rounded mb-2" type="text" value="{{ $next->next_last_name }}" name="lname" placeholder="Last Name">
                                                    <input class="form-control input-rounded mb-2" type="text" value="{{ $next->next_other_names }}" name="oname" placeholder="Other Name">
                                                    <input class="form-control input-rounded mb-2" type="text" value="{{ $next->next_phone }}" name="phone" placeholder="Telephone">
                                                    <input class="form-control input-rounded mb-2" type="text" value="{{ $next->next_relationship }}" name="relationship" placeholder="Relationship">
                                                    <input class="form-control input-rounded mb-2" type="text" value="{{ $next->next_sex }}" name="sex" placeholder="Sex">
                                                    <input class="form-control input-rounded mb-2" type="text" value="{{ $next->next_percentage_of_benefit }}" name="percentage" placeholder="Percentage Of Benefit">
                                                    <input class="form-control input-rounded mb-2" type="text" value="{{ $next->next_address }}" name="address" placeholder="Address">
                                                    <div class="input-group mb-3">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="inputGroupFile02" name="passport" required>
                                                            <label class="custom-file-label input-rounded" for="inputGroupFile02">Choose Passport</label>
                                                        </div>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text input-rounded">Upload</span>
                                                        </div>
                                                    </div>
                                                    <br><center><button class="btn btn-primary" type="submit">UPDATE</button></center>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="collapsed card-link" data-toggle="collapse" href="#accordion22">NEXT OF KIN #2</a>
                                        </div>
                                        <div id="accordion22" class="collapse" data-parent="#accordion2">
                                            <div class="card-body">
                                                <form method="post" action="{{ route('update_personal_data') }}" enctype="multipart/form-data">
                                                @csrf
                                                    <input class="form-control input-rounded mb-2" type="hidden" value="{{ $user->email }}" name="email">
                                                    <input class="form-control input-rounded mb-2" type="text" value="{{ $user->first_name }}" name="firstname" readonly>
                                                    <input class="form-control input-rounded mb-2" type="text" value="{{ $user->last_name }}" name="lastname" readonly>
                                                    <input class="form-control input-rounded mb-2" type="text" value="{{ $user->other_names }}" name="oth" readonly>
                                                    <input class="form-control input-rounded mb-2" type="text" value="{{ $user->irorun_m_no }}" name="m_no" readonly>
                                                    <input class="form-control input-rounded mb-2" type="text" value="{{ date('Y',strtotime($user->created_at)) }}" name="adm" readonly>
                                                    <input class="form-control input-rounded mb-2" type="text" value="{{ $user->address }}" name="address" readonly>
                                                    <input class="form-control input-rounded mb-2" type="hidden" value="{{ $user->user_signature }}" name="sign" readonly>



                                                    <input class="form-control input-rounded mb-2" type="text" value="{{ $next->next_first_name }}" name="fname" placeholder="First Name">
                                                    <input class="form-control input-rounded mb-2" type="text" value="{{ $next->next_last_name }}" name="lname" placeholder="Last Name">
                                                    <input class="form-control input-rounded mb-2" type="text" value="{{ $next->next_other_names }}" name="oname" placeholder="Other Name">
                                                    <input class="form-control input-rounded mb-2" type="text" value="{{ $next->next_phone }}" name="phone" placeholder="Telephone">
                                                    <input class="form-control input-rounded mb-2" type="text" value="{{ $next->next_relationship }}" name="relationship" placeholder="Relationship">
                                                    <input class="form-control input-rounded mb-2" type="text" value="{{ $next->next_sex }}" name="sex" placeholder="Sex">
                                                    <input class="form-control input-rounded mb-2" type="text" value="{{ $next->next_percentage_of_benefit }}" name="percentage" placeholder="Percentage Of Benefit">
                                                    <input class="form-control input-rounded mb-2" type="text" value="{{ $next->next_address }}" name="address" placeholder="Address">
                                                    <div class="input-group mb-3">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="inputGroupFile02" name="passport" required>
                                                            <label class="custom-file-label input-rounded" for="inputGroupFile02">Choose Passport</label>
                                                        </div>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text input-rounded">Upload</span>
                                                        </div>
                                                    </div>
                                                    <br><center><button class="btn btn-primary" type="submit">UPDATE</button></center>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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