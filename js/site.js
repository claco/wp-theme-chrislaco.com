$(document).ready(function(){
    // wire up tags toggle and separators
    $('#content .entry').each(function() {
        var $entry = $(this);
        var $tags = $entry.find('ul.tags').hide();
 
        $tags.find('li:not(:last)').each(function() {
            $(this).after('<li class="separator">, </li>');
        });

        $entry.find('li.tags a:first').click(function() {
            $tags.toggle('fast');
            return false;
        });
    });

    // pipe separators
	$('#header .menu li:not(:last), #footer .menu li:not(:last)').after('<li class="separator">|</li>');

    // dot separators
    $('.entry .extras, #footer .copyright').each(function(){
        $(this).find('li:not(:last, ".tags, .tag, .separator")').after('<li class="separator">&middot;</li>');
    })

return;

    /*
    // header
    $('#header').prepend('<img class="photo" src="' + templateDirectory + '/images/spacer.gif" alt="" />');


	$('#footer').wrapInner('<div class="wrapper"></div>');
	$('#footer .links li:first-child').addClass('first');
	$('#footer .links:last').after('<div style="clear:both;"></div>');



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
