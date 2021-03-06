<div class="footer">
    <div class="footer-art"></div>
    <div class="footer-main">
        <div class="container">
            <div class="footer-box-wrapper clearfix">
                <div class="footer-box">
                    <h4>News & Updates</h4>
                    <ul>
                        <li>
                            <strong><a href="#">Cambridge Babies</a></strong>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                        </li>
                        <li>
                            <strong><a href="#">There is always a way</a></strong>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                        </li>
                    </ul>
                </div>
                <!-- END OF NEWS UPDATES -->
                <div class="footer-box quick-link">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="#">Company Profile</a></li>
                        <li><a href="#">Message from chairman</a></li>
                        <li><a href="#">Available Services</a></li>
                        <li><a href="#">International Relations</a></li>
                        <li><a href="#">Help & Supports</a></li>
                        <li><a href="#">FAQs</a></li>
                    </ul>
                </div>
                <!-- END OF QUICK LINKS -->
                <div class="footer-box travel-guide">
                    <h4>Lorem Ipsum</h4>
                    <ul>
                        <li><a href="#">Lorem Ipsum</a></li>
                        <li><a href="#">Lorem Ipsum</a></li>
                        <li><a href="#">Lorem Ipsum</a></li>
                        <li><a href="#">Lorem Ipsum</a></li>
                        <li><a href="#">Lorem Ipsum</a></li>
                    </ul>
                </div>
                
        <div class="footer-info clearfix">
            <div class="container">
                <div class="pull-left footer-nav">
                    <ul>
                        <li><a href="#">Home</a><span>/</span></li>
                        <li><a href="#">Terms & Conditions</a><span>/</span></li>
                        <li><a href="#">Privacy Policy</a><span>/</span></li>
                        <li><a href="#">Contact us</a><span>/</span></li>
                    </ul>
                </div>
                <div class="pull-right copy-info">
                    <p>&copy; 2015 <a href="#">Cozy Dream</a> All right reserved.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END OF FOOTER -->

<script type="text/javascript">
    $(function () {
        $('.big-slider').bxSlider({
            auto: true,
            moveSlides: 0,
            mode: 'fade',
        });
        $('.testimonial-slider').bxSlider({
            auto: true,
            'pager': true,
            minSlides: 1,
            maxSlides: 2,
            slideWidth: 545,
            slideMargin: 5,
            speed: 1000,
            moveSlides: 1,
            infiniteLoop: false,
        });

        $('.btn').tooltip();
        $('.datepicker').datepicker();
    });

    function handle(delta) {
        var time = 400;
        var distance = 300;

        $('html, body').stop().animate({
            scrollTop: $(window).scrollTop() - (distance * delta)
        }, time);
    }

    $(function ($) {
        var i = 0;
        $(".featured-packages ul li").each(function () {
            i++;
            if (i % 2 == 0) {
                $(this).addClass('last-row-item');
            }
        });

        $('.fancybox-thumbs').fancybox({

            helpers : {
                thumbs : {
                    width  : 50,
                    height : 50
                }
            }
        });


        setTimeout(function () {

            $('#grid-posts').pinto({
                itemSelector: '.panel-pinto',
                itemWidth: 230,
                gapX: 20,
                gapY: 20,

                onItemLayout: function ($item, column, position) {
                }
            });
            $('#grid-photos').pinto({
                itemSelector: '.panel-pinto',
                itemWidth: 130,
                gapX: 10,
                gapY: 10,

                onItemLayout: function ($item, column, position) {
                }
            });
        }, 1000);



    })
</script>
