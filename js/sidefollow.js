/*
 *   name: SideFollow
 * author: Jonathan
 *   date: 2016-12-15
 *   site: caozhuo.net
 *
 */

(function($) {
    $.fn.sideFollow = function(dtime) {

        var floating = $(this);
        var originalTop = parseInt($(this).css('top'));

        dtime ? dtime = dtime : dtime = 1000;

        goFollow(); // Ã©Â¡ÂµÃ©ÂÂ¢Ã¥Å  Ã¨Â½Â½Ã¥ÂÅ½Ã¥â€¦Ë†Ã¦â€°Â§Ã¨Â¡Å’Ã¤Â¸â‚¬Ã¦Â¬Â¡

        // Ã¦Â»Å¡Ã¥Å Â¨Ã¦ÂÂ¡Ã§â€ºâ€˜Ã¦Å½Â§
        $(window).scroll(function() {
            goFollow();
        });

        function goFollow() {
            var scrollTop = $(this).scrollTop();
            floating.animate({
                top: originalTop + scrollTop
            }, {
                duration: dtime,
                queue: false // Ã¥Å Â¨Ã§â€Â»Ã¤Â¸ÂÃ¨Â¿â€ºÃ¥â€¦Â¥Ã¥Å Â¨Ã§â€Â»Ã©ËœÅ¸Ã¥Ë†â€”
            });
        }

    }
})(jQuery);