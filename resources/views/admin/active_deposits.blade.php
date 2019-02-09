@extends('layouts.admin')

@section('title') Active Deposits @stop

@section('deposits') active @stop

@section('dot')../../@stop

@section('breadcrumbs') 

                                <li><a href="/">Home</a></li>
                                <li><span>Active Deposits</span></li>
@stop

@section('main_content')
                <div class="row">
                    <!-- Striped table start -->
                    <div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                                @endif
                                <h4 class="header-title">Deposits</h4>
                                <form action="{{ route('new_depo') }}" method="post">
                                @csrf
                                    <input class="form-control input-rounded form-control-lg mb-4" type="text" placeholder="Search by MemberShip Number or email" name="user" id="user">
                                </form>
                                <br><br>
                                <div class="results">
                                
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Striped table end -->
                </div>
@stop

@section('myscript')
    <script>
    $(document).ready(function(){
        $("#user").on('input', function(){
            var user = $("#user").val();
            var form_data = new FormData();
            form_data.append('_token', '{{csrf_token()}}');
            form_data.append('user', user);
            $(".results").html('<div class="alert alert-info">Loading.....</div>'); 

            $.ajax({
                url: "{{ url('active_depo') }}",
                data: form_data,
                type: 'POST',
                contentType: false,
                processData: false,
                success: function (data) {
                    $(".results").html(data);
                },
                error: function (xhr, status, error) {
                    $("#loader").html('<div class="alert alert-danger">An unknown error occurred, Please try again!</div>');
                }
            });
        });
    });
    </script>
@stop