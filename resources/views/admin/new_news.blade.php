@extends('layouts.admin')

@section('title') Communication Centre @stop

@section('news') active @stop

@section('dot')../../@stop

@section('extra')
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=tkv6tmyvodxd144berizqe8auppm1kabzw1yl4ct2bdmcxah"></script> 
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
                                <li><span>Comms.</span></li>
@stop

@section('main_content')
                <div class="row">
                    <div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                                @endif
                                <h4 class="header-title">Comms</h4>
                                <form action="{{ route('new_blog') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                    <input class="form-control form-control-lg input-rounded mb-4" type="text" placeholder="Title" name="title" required>
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="inputGroupFile02" name="thumb" required>
                                            <label class="custom-file-label input-rounded" for="inputGroupFile02">Choose Thumbnail</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text input-rounded">Upload</span>
                                        </div>
                                    </div>
                                    <label>Content</label>
                                    <textarea class="form-control form-control-lg mb-4" rols="10" cols="10" placeholder="Content" name="content"></textarea>
                                    <br><button class="btn btn-primary">Submit</button>
                                </form>
                                <br><br>
                                <div class="results">
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@stop

@section('myscript')

@stop