@extends('layouts.auth')

@section('title') Member Registration @stop

@section('content')
<form method="POST" action="{{ route('member_register') }}">
                    @csrf
                    @if($errors->any())
                        <div class="alert alert-warning"><center><h4>{{$errors->first()}}</h4></center></div>
                    @endif
                    <div class="login-form-head">
                        <h4>Sign up</h4>
                        <p>Hello there, Sign up and Join Us</p>
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="exampleInputName1">Title</label>
                            <input type="text" id="exampleInputName1" name="title" value="Mr" autofocus>
                            <i class="ti-user"></i>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputName1">First Name</label>
                            <input type="text" id="exampleInputName1" name="firstname">
                            <i class="ti-user"></i>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputName1">Last Name</label>
                            <input type="text" id="exampleInputName1" name="lastname">
                            <i class="ti-user"></i>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputName1">Other Names</label>
                            <input type="text" id="exampleInputName1" name="othername">
                            <i class="ti-user"></i>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputName1">Phone</label>
                            <input type="text" id="exampleInputName1" name="phone">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" id="exampleInputEmail1" name="email">
                            <i class="ti-email"></i>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" id="exampleInputPassword1" name="password">
                            <i class="ti-lock"></i>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword2">Confirm Password</label>
                            <input type="password" id="exampleInputPassword2" name="password_confirmation">
                            <i class="ti-lock"></i>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Submit <i class="ti-arrow-right"></i></button>
                            <!--<div class="login-other row mt-4">
                                <div class="col-6">
                                    <a class="fb-login" href="#">Sign up with <i class="fa fa-facebook"></i></a>
                                </div>
                                <div class="col-6">
                                    <a class="google-login" href="#">Sign up with <i class="fa fa-google"></i></a>
                                </div>
                            </div>-->
                        </div>
                        <div class="form-footer text-center mt-5">
                            <p class="text-muted">Don't have an account? <a href="/login">Sign in</a></p>
                        </div>
                    </div>
                </form>
@stop