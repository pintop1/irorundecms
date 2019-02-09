@extends('layouts.admin')

@section('title') All News @stop

@section('news') active @stop

@section('dot')../../@stop

@section('extra')
        <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=n6hy4v06pbo47qp6tyl8e1vc1pgeto04kh756luzgknu7aa4"></script> 
        <script type="text/javascript">
            tinymce.init({
              selector: 'textarea',
              height: 500,
              menubar: false,
              plugins: [
                'advlist autolink lists link image charmap print preview anchor textcolor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste code help wordcount'
              ],
              toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat',
              content_css: [
                '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                '//www.tinymce.com/css/codepen.min.css']
            });
        </script>
@stop

@section('breadcrumbs') 

                                <li><a href="/">Home</a></li>
                                <li><span>News</span></li>
@stop

@section('main_content')
                @if(!isset($_GET['edit']))
				<div class="row">
                    <div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">News</h4>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-striped text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">S/N</th>
                                                    <th scope="col">Title</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $number = 1;?>
                                                @foreach($blogs as $blog)
                                                <tr>
                                                    <th scope="row">{{ $number++ }}</th>
                                                    <td>{{ ucwords($blog->title) }}</td>
                                                    <td>{{ date("F d, Y",strtotime($blog->created_at)) }}</td>
                                                    <td><form action="" method="post"><a href="?view={{ $blog->id }}"><i class="ti-eye"></i></a> | <input type="hidden" value="{{ $blog->id }}" name="id"><button onclick="return confirm('Are you sure you want to delete this post');" style="color:red;border:0;"><i class="fa fa-trash-o"></i></button> | <a href="?edit={{ $blog->id }}"><i class="fa fa-pencil-square-o"></i></form></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <br><center>{{ $blogs->onEachSide(5)->links() }}</center>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Striped table end -->
                </div>
                @else
                    <div class="row">
                    <div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                                @endif
                                <h4 class="header-title">Repayment</h4>
                                <form action="{{ route('new_blog') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                    <img src="../../{{ $single->thumb }}" class="text-right" width="200px"><br><br>
                                    <input class="form-control form-control-lg input-rounded mb-4" type="text" placeholder="Title" name="title" required value="{{ $single->title }}">
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="inputGroupFile02" name="thumb">
                                            <label class="custom-file-label input-rounded" for="inputGroupFile02">Choose Thumbnail</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text input-rounded">Upload</span>
                                        </div>
                                    </div>
                                    <label>Content</label>
                                    <textarea class="form-control form-control-lg mb-4" rols="10" cols="10" placeholder="Content" name="content">{{ $single->posts }}</textarea>
                                    <br><button class="btn btn-primary">Submit</button>
                                </form>
                                <br><br>
                                <div class="results">
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
@stop

@section('myscript')
           
@stop