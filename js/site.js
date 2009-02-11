$(document).ready(function(){
    /*
    // header
    $('#header').prepend('<img class="photo" src="' + templateDirectory + '/images/spacer.gif" alt="" />');

    // footer
	$('#footer .menu li:not(:last)').after('<li class="separator">|</li>');
	$('#footer').wrapInner('<div class="wrapper"></div>');
	$('#footer .links li:first-child').addClass('first');
	$('#footer .links:last').after('<div style="clear:both;"></div>');

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
        if ($(this).hasClass('author') || $(this).hasClass('odd')) {
            $(this).corner('10px');
        }
    })

    // comment form
    $('#comment-form').dialog({
        resizable: false,
        width: 455,
        height: 470,
        buttons: {
            'Submit': function()  {
                $('#commentform').submit();
            },
            'Cancel': function() {
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
        $('#author').focus();

        Recaptcha.create(reCaptchaPublicKey, 'recaptcha_div', {
           theme: 'clean',
           tabindex: 4
        });

        return false;
    });

    $('#commentform').submit(function() {
        $.ajax({
          type: 'POST',
          data: {
              comment_post_ID: $('#comment_post_ID').val(),
              author: $('#author').val(),
              email: $('#email').val(),
              url: $('#url').val(),
              comment: $('#comment').val(),
              recaptcha_response_field: $('#recaptcha_response_field').val(),
              recaptcha_challenge_field: $('#recaptcha_challenge_field').val()
          },
          url: templateDirectory + '/comments-ajax.php',
          dataType: 'html',
          error: function(XMLHttpRequest, textStatus, errorThrown) {
               $('#comment-form .status').html(XMLHttpRequest.responseText);
               Recaptcha.reload();
          },
          success: function() {
              $('#comment-form').dialog('close');
              window.location.reload();
          }
        });

        return false;
    });
    */
});
