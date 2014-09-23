(function($, window) {

    var showMoreButtons = $('.show-more');

    showMoreButtons.on('click', function () {
        var $this = $(this),
            accordianContent = $this.next('.accordian-content');
        
        accordianContent.slideToggle( function () {
                var txt = $this.text().toLowerCase();
                if ($this.text() === 'more') {
                    $this.text('Hide');
                } else {
                    $this.text('more');
                }
        });



    });

}) (jQuery, window);
