@section('content')
<div class="inner-page">
    <div class="page-title">
        <div class="container">
            <h1>CONTACT US
            <div class="social-share pull-right">
                <span class='st_facebook_hcount' displayText='Facebook'></span>
                <span class='st_twitter_hcount' displayText='Tweet'></span>
                <span class='st_googleplus_hcount' displayText='Google +'></span>
            </div>
            </h1>
        </div>
    </div>
    <div class="inner-content">
        <div class="container">
            <div class="row contact-box">
                <div class="col-sm-5">
                    <h4 class="text-warning">Cozy Dreams Travel & Tours</h4>
                    
                    <address>
                        <p>
                            <b>{{ $contactDtl->location }}</b> <br>
                        </p>
                        <p>
                            <i class="fa fa-phone"></i> {{ $contactDtl->phone }}<br>
                            <i class="fa fa-envelope"></i> <a href="mailto:cozydtt@gmail.com">cozydtt@gmail.com</a>, <a href="mailto:info@cozydream.com.np">info@cozydream.com.np</a>
                        </p>
                    </address>
                </div>
                <div class="col-sm-7 contact-field">
                    <h4>Get in touch with us</h4>
                    <form role="form" method="post">
                        <div class="form-group">
                            <label>Name <i class="fa fa-aw fa-asterisk"></i></label>
                            <input type="text" name="lastname" class="form-control">
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email Address <i class="fa fa-aw fa-asterisk"></i></label>
                                    <input type="text" class="form-control" name="username">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" name="phone">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Your Message <i class="fa fa-asterisk"></i></label>
                            <textarea name="" rows="3" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-warning">Submit</button>
                    </form>
                </div>
                <div class="col-sm-12">
                    <div class="map-google">
                        <h4>Our Location</h4>
                        <iframe src="{{ $contactDtl->gmap }}" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.inner-page -->
@stop