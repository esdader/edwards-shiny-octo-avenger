(function($, window) {

    var showMoreButtons = $('.show-more'),
        caseResltsOpenBtn = $('.result-entry-btn'),
        caseResltsCloseBtn = $('.result-entry-close-btn'),
        heroCarousel       = $('.l-hero'),
        $mainNav           = $('.main-menu'),
        $subNav            = $mainNav.find('.menu-item-has-children'),
        $lightBoxLinks     = $('.test-popup');


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

    // $('.l-embed-con').fitVids();

    $subNav.on('mouseenter', function () {
        $(this).addClass('opened-by-hover');
    });

    $subNav.on('mouseleave', function () {
        $(this).removeClass('opened-by-hover');
    });


    // $subNav.on('click', function (e) {
    //     var $this = $(this);
    //     e.preventDefault();

    //     if (!$this.hasClass('is-open')) {
    //         $('.is-open').removeClass('is-open');
    //     }
    //     $this.toggleClass('is-open');
    // });

    // $(document).on('click', function (event) {
    //   if (!$(event.target).closest('.menu-item-has-children').length) {
    //     $('.is-open').removeClass('is-open');
    //   }
    // });

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
        console.log('holla')
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
