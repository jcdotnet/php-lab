import jQuery from 'jquery';

jQuery(function($){
    $('body').on('click', 'a.jc-share-link', function(e){
        e.preventDefault();
        window.open($(this).attr('href'), 'Share', 'height=640, width=580, top=' + (screen.availHeight - 580) / 2 + ', left=' + (screen.availWidth - 640) / 2);
    });
});
