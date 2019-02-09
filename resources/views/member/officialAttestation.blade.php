@extends('layouts.member')

@section('title') Official Attestation @stop

@section('dot')../../@stop

@section('profile') active @stop

@section('body') onselectstart="return false"@stop

@section('dotPassport')../../@stop

@section('breadcrumbs') 
                                <li><a href="/">Home</a></li>
                                <li><span>Official Attestation</span></li>
@stop

@section('main_content')
                <div class="row">
                    <div class="col-md-6 mt-5">
                        <div class="card">
                            <div class="card-body">
                                @if($user->financial_status == '')
                                <div class="alert alert-warning">Please fill financial data form to proceed</div>
                                @else
                                <h4 class="header-title">Official Attestation</h4>
                                @if($user->signature_status == '')
                                <div id="loader"><div class="alert alert-info">Saving......</div></div>
                                @endif
                                <form method="post" enctype="multipart/form-data">
                                    @csrf
                                    @if($user->signature_status == '')
                                    <input class="form-control input-rounded mb-2" type="hidden" value="{{ $user->email }}" id="email" placeholder="WhatsApp Number" required>
                                    <div id="signature-pad" class="signature-pad">
                                        <div class="signature-pad--body">
                                            <canvas id="mycanvas"></canvas>
                                        </div>
                                        <div class="signature-pad--footer">
                                            <div class="description">Sign above</div>

                                                <div class="signature-pad--actions">
                                                    <div>
                                                        <button type="button" class="button clear" data-action="clear">Clear</button>
                                                        <button type="button" class="button" data-action="change-color">Change color</button>
                                                        <button type="button" class="button" data-action="undo">Undo</button>

                                                    </div>
                                                    <div>
                                                        <button type="button" class="button saveNow" data-action="save-png">Save</button>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    @else
                                    <img src="../../{{ $user->user_signature }}">
                                    @endif

                                    <script src="../../dashboard/assets/js/signature_pad.umd.js"></script>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                     <div class="col-md-6 mt-5">
                        <div class="card card-bordered">
                            <div class="dpi card-body">
                                <img class="dp" src="../../{{ $user->passport }}" alt="image">
                                <p class="card-text">
                                    {{ $user->first_name }} {{ $user->last_name }} {{ $user->other_names }}
                                    <br>
                                    {{ $user->email }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
@stop

@section('myscript')
<script type="text/javascript">
    $(document).ready(function(){
        var wrapper = document.getElementById("signature-pad");
var clearButton = wrapper.querySelector("[data-action=clear]");
var changeColorButton = wrapper.querySelector("[data-action=change-color]");
var undoButton = wrapper.querySelector("[data-action=undo]");
var savePNGButton = wrapper.querySelector("[data-action=save-png]");
var saveJPGButton = wrapper.querySelector("[data-action=save-jpg]");
var saveSVGButton = wrapper.querySelector("[data-action=save-svg]");
var canvas = wrapper.querySelector("canvas");
var signaturePad = new SignaturePad(canvas, {
  // It's Necessary to use an opaque color when saving image as JPEG;
  // this option can be omitted if only saving as PNG or SVG
  backgroundColor: 'rgb(255, 255, 255)'
});
var email = $("#email").val();
$("#loader").css('display','none');


// Adjust canvas coordinate space taking into account pixel ratio,
// to make it look crisp on mobile devices.
// This also causes canvas to be cleared.
function resizeCanvas() {
  // When zoomed out to less than 100%, for some very strange reason,
  // some browsers report devicePixelRatio as less than 1
  // and only part of the canvas is cleared then.
  var ratio =  Math.max(window.devicePixelRatio || 1, 1);

  // This part causes the canvas to be cleared
  canvas.width = canvas.offsetWidth * ratio;
  canvas.height = canvas.offsetHeight * ratio;
  canvas.getContext("2d").scale(ratio, ratio);

  // This library does not listen for canvas changes, so after the canvas is automatically
  // cleared by the browser, SignaturePad#isEmpty might still return false, even though the
  // canvas looks empty, because the internal data of this library wasn't cleared. To make sure
  // that the state of this library is consistent with visual state of the canvas, you
  // have to clear it manually.
  signaturePad.clear();
}

// On mobile devices it might make more sense to listen to orientation change,
// rather than window resize events.
window.onresize = resizeCanvas;
resizeCanvas();

function download(dataURL, filename) {
  if (navigator.userAgent.indexOf("Safari") > -1 && navigator.userAgent.indexOf("Chrome") === -1) {
    window.open(dataURL);
  } else {
    var blob = dataURLToBlob(dataURL);
    var url = window.URL.createObjectURL(blob);

    var a = document.createElement("a");
    a.style = "display: none";
    a.href = url;
    a.download = filename;

    document.body.appendChild(a);
    a.click();

    window.URL.revokeObjectURL(url);
  }
}

// One could simply use Canvas#toBlob method instead, but it's just to show
// that it can be done using result of SignaturePad#toDataURL.
function dataURLToBlob(dataURL) {
  // Code taken from https://github.com/ebidel/filer.js
  var parts = dataURL.split(';base64,');
  var contentType = parts[0].split(":")[1];
  var raw = window.atob(parts[1]);
  var rawLength = raw.length;
  var uInt8Array = new Uint8Array(rawLength);

  for (var i = 0; i < rawLength; ++i) {
    uInt8Array[i] = raw.charCodeAt(i);
  }

  return new Blob([uInt8Array], { type: contentType });
}

clearButton.addEventListener("click", function (event) {
  signaturePad.clear();
});

undoButton.addEventListener("click", function (event) {
  var data = signaturePad.toData();

  if (data) {
    data.pop(); // remove the last dot or line
    signaturePad.fromData(data);
  }
});

changeColorButton.addEventListener("click", function (event) {
  var r = Math.round(Math.random() * 255);
  var g = Math.round(Math.random() * 255);
  var b = Math.round(Math.random() * 255);
  var color = "rgb(" + r + "," + g + "," + b +")";

  signaturePad.penColor = color;
});

savePNGButton.addEventListener("click", function (event) {
  if (signaturePad.isEmpty()) {
    //alert("Please provide a signature first.");
    $("#loader").html('<div class="alert alert-danger">Please provide a signature first.</div>');
    $("#loader").css('display','block');
  } else {
    var dataURL = signaturePad.toDataURL();
    //download(dataURL, "signature.png");
    function saveNow(){
            var canvasData = signaturePad.toDataURL("image/png");

            var form_data = new FormData();
            form_data.append('_token', '{{csrf_token()}}');
            form_data.append('email', email);
            form_data.append('image', canvasData);
            $("#loader").css('display', 'block');
            $.ajax({
                url: "{{ url('update_signature') }}",
                data: form_data,
                type: 'POST',
                contentType: false,
                processData: false,
                success: function (data) {
                    location.reload();  
                },
                error: function (xhr, status, error) {
                    //alert(xhr.responseText);
                    //$('#preview_image').attr('src', '{{asset('images/noimage.jpg')}}');
                    $("#loader").html('<div class="alert alert-danger">An unknown error occurred, Please try again!</div>');
                }
            });
            
        }
        saveNow();
  }
});
    });
</script>
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