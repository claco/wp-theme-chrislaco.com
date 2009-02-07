$(document).ready(function(){
    // wire up tags toggle
    $('.entry').each(function() {
        var $entry = $(this);
        $entry.find('li.tags a').click(function() {
            $entry.find('ul.tags').toggle('fast');
            return false;
        });
    });

    // tag separators
    $('.tags').each(function() {
        $(this).find('li:not(:last)').after('<li class="separator">, </li>');
    });

    // dot separators
    $('#header .menu, #footer .copyright, #content .extras').each(function(){
        $(this).find('li:not(:last)').after('<li class="separator">&middot;</li>');
    })

    // comments
    $('.comment').each(function(i) {
        i = i+1;
        $(this).prepend('<div class="number">'+i+'</div>');
        
        if (i % 2 == 0) {
            $(this).addClass('even');
        } else {
            $(this).addClass('odd');
        }
    })    
});