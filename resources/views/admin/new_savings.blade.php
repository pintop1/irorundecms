@extends('layouts.admin')

@section('title') New Saving @stop

@section('savings') active @stop

@section('dot')../../@stop

@section('breadcrumbs') 

                                <li><a href="/">Home</a></li>
                                <li><span>New Savings</span></li>
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
                                <h4 class="header-title">Savings</h4>
                                <form action="{{ route('new_saving') }}" method="post">
                                @csrf
                                    <div class="form-group">
                                        <select class="form-control" name="user" id="user">
                                            <option selected>---- Members list ---- </option>
                                            @foreach($users as $user)
                                            <option value="{{ $user->email }}">{{ ucwords($user->first_name." ".$user->last_name." ".$user->other_names) }} - #{{ $user->irorun_m_no }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input class="form-control form-control-lg mb-4" type="number" placeholder="Amount" name="amount">
                                    <button class="btn btn-primary" onclick="return confirm('Are you sure the data supplied are valid');">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>  
@stop

@section('myscript')
    
@stop