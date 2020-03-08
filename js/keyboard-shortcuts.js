$(document).ready(function(){
    var keyShortcut = true;

    $(document).keyup(function(e) {
        if (keyShortcut) {
            switch(e.keyCode) {
                case 81 : $(window).trigger('cite', ['']); break; // Q - Quick-Reply
                case 27 : $('.close-btn').trigger('click'); break;// ESC - Close QR
            }
        }
    });

    $('textarea').bind('focus', function (event) {
        keyShortcut = false;
    }).bind('blur', function (event) {
        keyShortcut = true;
    });
});