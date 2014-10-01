(function($, window) {

    var showMoreButtons = $('.show-more'),
        caseResltsOpenBtn = $('.result-entry-btn'),
        caseResltsCloseBtn = $('.result-entry-close-btn');


    $('.l-embed-con').fitVids();

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

}) (jQuery, window);
