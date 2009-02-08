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
    $('ul.tags').each(function() {
        $(this).find('li:not(:last)').after('<li class="separator">, </li>');
        $(this).corner('6px');
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
            $(this).corner('10px');
        }
    })

    // comment form
    $('#comment-fsorm').dialog({
        title: 'Add Comment',
        resizable: false,
        width: 550,
        height: 500,
        buttons: {
            'Submit': function()  {
                $('#commentform').submit();
            },
            'Cancel': function() {
                $('#comment-form .status').hide();
                $(this).dialog('close');
            }
        },
        autoOpen: false,
        modal: true,
        stack: true,
        overlay: {
            opacity: 0.6,
            background: "black"
        }
    }).find('#submit').hide();

    $('#comment-add').click(function() {
        $('#comment-form').dialog('open');
    });

    $('#commentform').submit(function() {
        $.ajax({
          type: 'POST',
          data: {
              comment_post_ID: $('#comment_post_ID').val(),
              author: $('#author').val(),
              email: $('#email').val(),
              url: $('#url').val(),
              comment: $('#comment').val()
          },
          url: '../../wp-content/themes/chrislaco.com/comments-ajax.php',
          dataType: 'text',
          error: function(XMLHttpRequest, textStatus, errorThrown) {
               $('#comment-form .status').text(XMLHttpRequest.responseText).show();
          },
          success: function() {
              $('#comment-form .status').hide();
              $('#comment-form').dialog('close');
              window.location.reload();
          }
        });

        return false;
    });
});
