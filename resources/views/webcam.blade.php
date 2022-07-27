<!DOCTYPE html>
<html>
<head>
    <title>laravel webcam capture image and save from camera - CodingsPoint.com</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="{{asset('custom.js')}}"></script>

    <style type="text/css">
        #results { padding:20px; border:1px solid; background:#ccc; }
    </style>
    
</head>
<body>
     
<div class="container">
    <h1 class="text-center">Laravel webcam capture image and save from camera - CodingsPoint.com</h1>
      
    <form method="POST" action="">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div id="my_camera"></div>
                <br/>
                <input type=button value="Take Snapshot" onClick="take_snapshot()">
                <input type="hidden" name="File" class="dropify" data-default-file="">
            </div>
            <div class="col-md-6">
                <div id="results">Your captured image will appear here...</div>
            </div>
            <div class="col-md-12 text-center">
                <br/>
                <button class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script language="JavaScript">
    Webcam.set({
        width: 490,
        height: 350,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
     
    Webcam.attach( '#my_camera' );
     
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $('.dropify').dropify();
            resetPreview('File', data_uri,'Image.jpg');
        });

        function resetPreview(name, src, fname = '') {
            let input = $('input[name="' + name + '"]');
            let wrapper = input.closest('.dropify-wrapper');
            let preview = wrapper.find('.dropify-preview');
            let filename = wrapper.find('.dropify-filename-inner');
            let render = wrapper.find('.dropify-render').html('');

            input.val('').attr('title', fname);
            wrapper.removeClass('has-error').addClass('has-preview');
            filename.html(fname);

            render.append($('<img />').attr('src', src).css('max-height', input.data('height') || ''));
            preview.fadeIn();
            }
    }

    /*-----------
    navigator.getUserMedia({video: true}, () => {
                console.log('has webcam')
                }, () => {
                console.log('no webcam')
                });
    -----------*/
    
</script>
    
</body>
</html>