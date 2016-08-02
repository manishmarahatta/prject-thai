
$(document).ready(function () {

 //responsive menu


    // Create mobile element
    var mobile = document.createElement('div');
    mobile.className = 'nav-mobile';
    document.querySelector('.nav').appendChild(mobile);

    // hasClass
    function hasClass(elem, className) {
      return new RegExp(' ' + className + ' ').test(' ' + elem.className + ' ');
  }

    // toggleClass
    function toggleClass(elem, className) {
      var newClass = ' ' + elem.className.replace(/[\t\r\n]/g, ' ') + ' ';
      if (hasClass(elem, className)) {
        while (newClass.indexOf(' ' + className + ' ') >= 0) {
          newClass = newClass.replace(' ' + className + ' ', ' ');
      }
      elem.className = newClass.replace(/^\s+|\s+$/g, '');
  } else {
    elem.className += ' ' + className;
}
}

    // Mobile nav function
    var mobileNav = document.querySelector('.nav-mobile');
    var toggle = document.querySelector('.nav-list');
    mobileNav.onclick = function () {
      toggleClass(this, 'nav-mobile-open');
      toggleClass(toggle, 'nav-active');
  };


    // end of responsive menu


    //start of sticky header
    $(function() {

        // grab the initial top offset of the navigation 
        var sticky_navigation_offset_top = $('#sticky_navigation').offset().top;

        // our function that decides weather the navigation bar should have "fixed" css position or not.
        var sticky_navigation = function(){
            var scroll_top = $(window).scrollTop(); // our current vertical position from the top

            // if we've scrolled more than the navigation, change its position to fixed to stick to top, otherwise change it back to relative
            if (scroll_top > sticky_navigation_offset_top) { 
                $('#sticky_navigation').css({
                    'position': 'fixed', 
                    'top':0, 
                    'left':0, 
                    'height':58,                     
                    'width':'100%',
                    'padding': '5px 0 0',
                });
                $('.nav-menu').css({
                    'width': 'auto',
                    'float':'none',                     
                });          
                $('.logo-small').css({
                    'display':'block'
                });
                $('.nav-mobile').css({
                    'right':12,
                    'top':5,
                });              
                $('.brand-identity').css({
                    'display':'none'
                });

                $('.nav-active').css({
                    'top':52,
                });

            } else {
                $('#sticky_navigation').css({                    
                    'width':'auto',
                    'position': 'relative',
                    'padding': '0 0',
                    'height':0,
                                   
                });
                $('.logo-small').css({
                    'display':'none'
                });      
                $('.nav-menu').css({
                    'float':'none'
                });       
                $('#mega-menu li').css({
                    'margin':'0 0 0'
                });

                $('.brand-identity').css({
                    'display':'block'
                });               
                $('.nav-mobile').css({
                    'right':6,
                    'top':-61,
                });
                $('.nav-active').css({
                    'top':0,
                });
            }   
        };

        // run our function on load
        sticky_navigation();

        // and run it again every time you scroll
        $(window).scroll(function() {
            sticky_navigation();
        });

        // NOT required:
        // for this demo disable all links that point to "#"
        $('a[href="#"]').click(function(event){ 
            event.preventDefault(); 
        });

    });

    //end of sticky header

    // start of scroll to top
    $(document).ready(function(){ 

        $(window).scroll(function(){
            if ($(this).scrollTop() > 100) {
                $('.scrollup').fadeIn();
            } else {
                $('.scrollup').fadeOut();
            }
        }); 

        $('.scrollup').click(function(){
            $("html, body").animate({
                scrollTop: 0
            }, 600);
            return false;
        });

    });
    //end of scroll to top
});







