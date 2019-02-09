@extends('layouts.admin')

@section('title') Member Dashboard @stop

@section('dash') @stop
@section('signatures') @stop
@section('users') @stop
@section('loans') @stop
@section('savings') @stop
@section('deposits') @stop
@section('thrifts') @stop
@section('defaulters') active @stop
@section('news') @stop
@section('testimonials') @stop
@section('supports') @stop

@section('dot')../../@stop

@section('breadcrumbs') 

                                <li><a href="/">Home</a></li>
                                <li><span>Dashboard</span></li>
@stop

@section('main_content')
                <div class="row">
                    <div class="col-md-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                                @endif
                                <h4 class="header-title">Repayment</h4>
                                <form action="{{ route('new_default') }}" method="post">
                                @csrf
                                    <div class="form-group">
                                        <label class="col-form-label">Members</label>
                                        <select class="form-control" name="user" id="user">
                                            <option selected>---- Members list ---- </option>
                                            @foreach($users as $user)
                                            <option value="{{ $user->email }}">{{ ucwords($user->first_name." ".$user->last_name." ".$user->other_names) }} - #{{ $user->irorun_m_no }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input class="form-control form-control-lg mb-4" type="number" placeholder="Amount" name="amount">
                                    <button class="btn btn-primary">Add</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>  
@stop

@section('myscript')
    
@stop