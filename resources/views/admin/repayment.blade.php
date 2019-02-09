@extends('layouts.admin')

@section('title') Loan Repayments @stop

@section('loans') active @stop

@section('dot')../../@stop

@section('breadcrumbs') 

                                <li><a href="/">Home</a></li>
                                <li><span>Loan Repayment</span></li>
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
                                <form action="{{ route('repay_loans') }}" method="post">
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
                                    <div id="loader"><div class="alert alert-info">Loading.....</div></div>
                                    <div class="loans"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>  
@stop

@section('myscript')
    <script>
    $(document).ready(function(){
        $("#loader").css('display', 'none');
        $("#user").on('input',function(){
            var email = $("#user").val();
            var form_data = new FormData();
            form_data.append('_token', '{{csrf_token()}}');
            form_data.append('email', email);
            $("#loader").css('display', 'block'); 

            $.ajax({
                url: "{{ url('loan_repay') }}",
                data: form_data,
                type: 'POST',
                contentType: false,
                processData: false,
                success: function (data) {
                    $("#loader").css('display', 'none');
                    $(".loans").html(data);
                },
                error: function (xhr, status, error) {
                    $("#loader").html('<div class="alert alert-danger">An unknown error occurred, Please try again!</div>');
                }
            });
            
        });
        
    });
    </script>
@stop