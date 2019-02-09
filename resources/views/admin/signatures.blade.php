@extends('layouts.admin')

@section('title') Official Attestation @stop

@section('signatures') active @stop

@section('dot')../../@stop

@section('breadcrumbs') 

                                <li><a href="/">Home</a></li>
                                <li><span>Signatures</span></li>
@stop

@section('main_content')
                <div class="row">
                    <div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Signatures</h4>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-striped text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">S/N</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Signature</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $number = 1;?>
                                                @foreach($signatures as $signature)
                                                <tr>
                                                    <th scope="row">{{ $number++ }}</th>
                                                    <td>{{ ucwords($signature->name) }}</td>
                                                    <td><img src="../../{{ $signature->signature }}"></td>
                                                    <td>{{ date("F d, Y",strtotime($signature->created_at)) }}</td>
                                                    <td>
                                                        <form action="{{ route('delete_signatures') }}" method="post">
                                                        @csrf
                                                            <input type="hidden" value="{{ $signature->id }}" name="ti">
                                                            <button style="border:0;color:#ff0000" onclick="return confirm('Are you sure you want to remove this signature permanently?');"><i class="fa fa-close"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <br><center>{{ $signatures->onEachSide(5)->links() }}</center>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Striped table end -->
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