$(document).ready(function(){
    // header
    $('#header').prepend('<img class="photo" src="' + templateDirectory + '/images/spacer.gif" alt="" />');
    $('#header').wrapInner('<div class="wrapper"></div>');
    $('#header .menu').css('width', '700px').css('margin', '-17px auto auto 50px').css('vertical-align', 'top');

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

    if ($('#projects')) {
        $.getJSON('http://github.com/api/v1/json/claco/?callback=?', {}, function(data) {
            $.each(data.user.repositories, function(i,item){
                $('#projects').after('<div class="entry"><h2 class="title"><a href="' + item.url + '">' + item.name + '</a></h2><ul class="extras"><li><a href="'+item.url+'/forkqueue/">Forks ('+item.forks+')</a></li></ul><div class="content"><p>' + item.description + '</p></div></div>');
            });

        });
    };

    $('.comment').each(function(i) {
        if ($(this).hasClass('author') || $(this).hasClass('odd')) {
            $(this).corner('10px');
        }
    });

    $('#comment-form').hide();
    $('#comment-add').click(function() {
        $('#comment-form').toggle();
        $('#author').focus();
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
              recaptcha_challenge_field: $('#recaptcha_challenge_field').val(),
              _wp_unfiltered_html_comment: $('#_wp_unfiltered_html_comment').val()
          },
          url: templateDirectory + '/comments-ajax.php',
          dataType: 'html',
          error: function(XMLHttpRequest, textStatus, errorThrown) {
               $('#formpoststatus').show().html(XMLHttpRequest.responseText);
               Recaptcha.reload();
          },
          success: function() {
              $('#comment-form').hide();
              window.location.reload();
          }
        });

        return false;
    });

return;

    /*


	$('#footer').wrapInner('<div class="wrapper"></div>');
	$('#footer .links li:first-child').addClass('first');
	$('#footer .links:last').after('<div style="clear:both;"></div>');




    */
});
