(function($, window) {

    var showMoreButtons = $('.show-more'),
        caseResltsOpenBtn = $('.result-entry-btn'),
        caseResltsCloseBtn = $('.result-entry-close-btn'),
        heroCarousel       = $('.l-hero'),
        $mainNav           = $('.main-menu'),
        $subNav            = $mainNav.find('.menu-item-has-children').not('a'),
        $lightBoxLinks     = $('.test-popup'),
        $menuToggleBtn     = $('.menu-toggle-btn'),
        $navCon            = $('.l-nav-search-con'),
        $mainHeader        = $('.l-main-header');


    // calling placeholder polyfill
    $('input').placeholder();

    $('.search-form').on('submit', function(e) {
        var hasValue = true,
            formValue = $('.search-field').val();

        if ($.trim(formValue).length === 0) {
            hasValue = false;
            alert("Please add a search term");
        }

        return hasValue;
    });

    // mobile view menu
    $subNav.on('click', function(e) {
        var $this = $(this),
            subMenu = $this.find('.sub-menu');

        if ($this.hasClass('menu-is-open')) {
                $this.removeClass('menu-is-open');
                subMenu.slideUp();
                return;
        }
        
        $('.menu-is-open').find('.sub-menu').slideUp();
        $('.menu-is-open').removeClass('menu-is-open')
        $this.addClass('menu-is-open');
        subMenu.slideDown();
    }); 

   $(window).resize(function(){
        var winWidth = $(window).width();

        if (winWidth > 900) {
            $('.menu-is-open')
                .removeClass('menu-is-open')
                .find('.sub-menu')
                    .removeAttr('style');
        }
   });

    // menu toggle
    $menuToggleBtn.on('click', function () {
        var winHeight  = $(window).height(),
            menuHeight = $mainHeader.outerHeight(),
            navHeight  = winHeight - menuHeight;
        $navCon.css({
            'height': navHeight + 'px'
        });

        $navCon.slideToggle();
    });


    showMoreButtons.on('click', function () {
        var $this = $(this),
            accordianContent = $this.next('.accordian-content');

        accordianContent.slideToggle(function () {
            var txt = $this.text().toLowerCase();
            if ($this.text() === 'more') {
                $this.text('Hide');
            } else {
                $this.text('more');
            }
        });
    });

    caseResltsOpenBtn.on('click', function () {
        var $this = $(this),
            slideContent = $this.parent().parent().parent().find('.l-case-result-listing-cases');

        slideContent.slideToggle(function () {
            $this.fadeOut();
        });
    });

    caseResltsCloseBtn.on('click', function () {
        var $this = $(this),
            slideContent = $this.parent().parent(),
            openBtn = $this.closest('.result-entry-btn');

        slideContent.slideToggle(function () {
            var btn  = $(this).parent().find('.result-entry-btn');
            btn.fadeIn();
        });
    });

    if (heroCarousel.length > 0) {
        

        $(document).ready(function(){
            heroCarousel.slick({
              dots: true,
              infinite: true,
              speed: 500,
              fade: true,
              slide: 'div',
              cssEase: 'linear',
              autoplay: true,
              arrows: false
            });
        });
    }


    function initLightBox() {
        $(document).ready(function(){
            // $('.lightbox').magnificPopup({
            //     type: 'image',
            //     mainClass: 'mfp-img-mobile',
            //     closeOnContentClick: true,
            //     image: {
            //         verticalFit: true
            //     }
            // });
            $('.test-popup').magnificPopup({ 
              type: 'image'
                // other options
            });
        });
    }

    if ($lightBoxLinks.length > 0) {
        initLightBox();
    }

}) (jQuery, window);
