/*<![CDATA[*/
$(document).ready(function() {
    $(".theblogwidgets").hover(function() {
        $(this).stop().animate({
            right: "0"
        }, "medium");
    }, function() {
        $(this).stop().animate({
            right: "-250"
        }, "medium");
    }, 500);
});
/*]]>*/