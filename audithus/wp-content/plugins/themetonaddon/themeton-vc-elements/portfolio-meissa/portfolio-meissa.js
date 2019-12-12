$(document).ready(function(){
    var	doc = $(window);
    $(window).bind('resize', function() {
        $(".portfolio-meissa-right").css('top', (calculateScrollSpeed()));
    });
    
    $(window).bind('scroll', function() {
        $(".portfolio-meissa-right").css('top', (calculateScrollSpeed('.portfolio-meissa-right')));
    });
    
    function calculateScrollSpeed(id) {
        var leftPaneHeight = $('.portfolio-meissa-left').height();
        var rightPaneHeight = $(id).height();
        var	browserHeight = $(window).height();
        var leftPaneScrollTop = $(window).scrollTop();
        return -$(window).scrollTop() * ((browserHeight - rightPaneHeight) / (browserHeight - leftPaneHeight));
    }
}); 