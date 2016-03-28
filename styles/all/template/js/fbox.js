$(document).ready(function($) {
    if ($.cookie('popup_facebook_box') != 'yes') {
        $('.fbox-background').delay(5000).fadeIn('medium');
        $('.fbox-button, .fbox-close, .theblogwidgets').click(function() {
            $('.fbox-background').stop().fadeOut('medium');
        });
    }
    $.cookie('popup_facebook_box', 'yes', {
        path: '/',
        expires: 7
    });
});