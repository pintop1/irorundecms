@extends('layouts.admin')

@section('title') All Guarantors @stop

@section('guarantors') active @stop

@section('dot')../../@stop

@section('breadcrumbs') 

                                <li><a href="/">Home</a></li>
                                <li><span>All Guarantors</span></li>
@stop

@section('main_content')
                <div class="row">
                    <div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Guarantors</h4>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-striped text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">S/N</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Phone</th>
                                                    <th scope="col">Rank</th>
                                                    <th scopr="col">Date Added</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $number = 1;?>
                                                @foreach($guarantors as $guarantor)
                                                <tr>
                                                    <th scope="row">{{ $number++ }}</th>
                                                    <td>{{ ucwords($guarantor->name) }}</td>
                                                    <td>{{ $guarantor->email }}</td>
                                                    <td>{{ $guarantor->phone }}</td>
                                                    <td>{{ $guarantor->rank }}</td>
                                                    <td>{{ date("F d, Y",strtotime($guarantor->created_at)) }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <br><center>{{ $guarantors->onEachSide(5)->links() }}</center>
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