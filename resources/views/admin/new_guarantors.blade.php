@extends('layouts.admin')

@section('title') New Guarantors @stop

@section('guarantors') active @stop
@section('dot')../../@stop

@section('breadcrumbs') 

                                <li><a href="/">Home</a></li>
                                <li><span>Add Guarantors</span></li>
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
                                <h4 class="header-title">New Guarantors</h4>
                                <form action="{{ route('add_guarantor') }}" method="post">
                                @csrf
                                    <div class="form-group">
                                        <select class="form-control" name="email">
                                            <option>---- MEMBERS' LIST ------ </option>
                                            @foreach($users as $user)
                                            <option value="{{ $user->email }}">{{ ucwords($user->first_name." ".$user->last_name." ".$user->other_names) }}     --     #{{ $user->irorun_m_no }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input class="form-control form-control-lg mb-4" type="text" name="serv_no" placeholder="Service Number">
                                    <input class="form-control form-control-lg mb-4" type="text" name="rank" placeholder="Rank">
                                    <input class="form-control form-control-lg mb-4" type="text" name="station" placeholder="Station">
                                    <input class="form-control form-control-lg mb-4" type="text" name="command" placeholder="Command">
                                    <input class="form-control form-control-lg mb-4" type="text" name="unit" placeholder="Unit">
                                    <br><button class="btn btn-primary">ADD</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>   
@stop

@section('myscript')
@stop