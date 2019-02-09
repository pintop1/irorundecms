@extends('layouts.member')

@section('title') My Guarantor @stop

@section('dot')../../@stop

@section('profile') active @stop

@section('dotPassport')../../@stop

@section('breadcrumbs') 
                                <li><a href="/">Home</a></li>
                                <li><span>My Guarantor</span></li>
@stop

@section('main_content')
                <div class="row">
                    <div class="col-md-6 mt-5">
                        <div class="card">
                            <div class="card-body">
                                @if($user->work_status == '')
                                <div class="alert alert-warning">Please fill the work data form to proceed</div>
                                @else
                                <h4 class="header-title">Guarantor</h4>
                                @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                                @endif
                                @if($user->guarantor_status == '')
                                <form method="post" action="{{ route('update_guarantor_data') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input class="form-control input-rounded mb-2" type="hidden" value="{{ $user->email }}" name="email" readonly>
                                    <div class="form-group">
                                        <label class="col-form-label">Gurantors</label>
                                        <select class="form-control" name="guarantor">
                                            @foreach($guarantor as $guarantors)
                                            <option value="{{ $guarantors->email }}">{{ $guarantors->name }} - #{{ $guarantors->service_no }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <br><center><button class="btn btn-primary" type="submit">UPDATE</button></center>
                                </form>
                                @else
                                    <ul>
                                        <li><h5>Name:</h5> {{ $user->guarantor_name }}</li>
                                        <li><h5>Service Number:</h5> {{ $user->guarantor_service_no }}</li>
                                        <li><h5>Rank:</h5> {{ $user->rank }}</li>
                                        <li><h5>Station:</h5> {{ $user->station }}</li>
                                        <li><h5>Command:</h5> {{ $user->command }}</li>
                                        <li><h5>Unit:</h5> {{ $user->unit }}</li>
                                        <li><h5>Phone:</h5> {{ $user->guarantor_phone }}</li>
                                        <li><h5>Email:</h5> {{ $user->guarantor_email }}</li>
                                    </ul>
                                @endif
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