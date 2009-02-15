<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title><?php bloginfo(’name’);?><?php wp_title(); ?></title>
		<link rel="alternate" type="application/atom+xml" href="<?php bloginfo('atom_url'); ?>" />
    	<link rel="stylesheet" type="text/css" media="screen" charset="utf-8" href="http://yui.yahooapis.com/2.6.0/build/reset/reset-min.css" />
    	<link rel="stylesheet" type="text/css" media="screen" charset="utf-8" href="http://yui.yahooapis.com/2.6.0/build/base/base-min.css" />
    	<link rel="stylesheet" type="text/css" media="screen" charset="utf-8" href="<?php bloginfo('template_directory'); ?>/external/syntax-highlighter/styles/shCore.css" />
    	<link rel="stylesheet" type="text/css" media="screen" charset="utf-8" href="<?php bloginfo('template_directory'); ?>/external/syntax-highlighter/styles/shThemeDefault.css" />
    	<link rel="stylesheet" type="text/css" media="screen" charset="utf-8" href="<?php bloginfo('template_directory'); ?>/css/style.css" />
    	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js"></script>
    	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.5.3/jquery-ui.min.js"></script>
    	<?php if (is_home()): ?>
    	    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jcarousellite.js"></script>
        <?php endif; ?>
        <?php if (is_single()): ?>
            <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.lightbox-0.5.min.js"></script>
            <link rel="stylesheet" type="text/css" media="screen" charset="utf-8" href="<?php bloginfo('template_directory'); ?>/css/jquery.lightbox-0.5.css" />
        <?php endif; ?>
    	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.corner.js"></script>
    	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/external/syntax-highlighter/scripts/shCore.js"></script>
    	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/external/syntax-highlighter/scripts/shBrushXml.js"></script>
    	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/external/syntax-highlighter/scripts/shBrushBash.js"></script>
    	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/external/syntax-highlighter/scripts/shBrushCSharp.js"></script>
    	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/external/syntax-highlighter/scripts/shBrushCss.js"></script>
    	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/external/syntax-highlighter/scripts/shBrushJScript.js"></script>
    	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/external/syntax-highlighter/scripts/shBrushPhp.js"></script>
    	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/external/syntax-highlighter/scripts/shBrushPython.js"></script>
    	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/external/syntax-highlighter/scripts/shBrushRuby.js"></script>
    	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/external/syntax-highlighter/scripts/shBrushSql.js"></script>
    	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/external/syntax-highlighter/scripts/shBrushVb.js"></script>
    	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/external/syntax-highlighter/scripts/shBrushPerl.js"></script>	 	 
    	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/site.js"></script>
    	<script type="text/javascript">
    		//<![CDATA[
    		
    		var reCaptchaPublicKey = '<?php global $recaptcha_opt;echo $recaptcha_opt['pubkey']; ?>';
    		var templateDirectory = '<?php bloginfo('template_directory'); ?>';

    		$(document).ready(function(){
    			SyntaxHighlighter.all();

                <?php if (is_single()): ?>
                $(function() {
                	$('.entry p a:has(img)').lightBox({
                	    fixedNavigation: true,
                	    imageBtnClose: '<?php bloginfo('template_directory'); ?>/images/lightbox-btn-close.gif',
                    	imageLoading: '<?php bloginfo('template_directory'); ?>/images/lightbox-ico-loading.gif',
                    	imageBtnPrev: '<?php bloginfo('template_directory'); ?>/images/lightbox-btn-prev.gif',
                    	imageBtnNext: '<?php bloginfo('template_directory'); ?>/images/lightbox-btn-next.gif',
                    	imageBlank: '<?php bloginfo('template_directory'); ?>/images/lightbox-blank.gif',
                	});
                });
                <?php endif; ?>

                /*
                <?php if (is_home()): ?>
        			$('#recent').after('<div id="wonderbar"><img id="previous" class="icon" src="' + templateDirectory + '/images/larrow.gif" alt="" /><img id="next" class="icon" src="' + templateDirectory + '/images/rarrow.gif" alt="" /></div>');
        			$('#wonderbar, #header').wrapInner('<div class="wrapper"></div>');
        			$('#recent').wrapInner('<div class="wrapper"></div>');
        			$('#recent .wrapper').wrapInner('<ul></ul>');
        			$('#recent .entry').wrap('<li></li>');
        			$('.entry:last').after('<div style="clear:both;"></div>');

        		    $("#recent .wrapper").jCarouselLite({
        		        btnNext: "#next",
        		        btnPrev: "#previous",
        				visible: 1
        		    });
                <?php endif; ?>
                */
    		});
    		//]]>
    	</script>
    	
    	<?php wp_head(); ?>
	</head>
	<?php if (is_category() ) : ?>
        <body class="category <?php $category = get_the_category(); echo $category[0]->category_nicename; ?>">
    <?php elseif (is_single() ) : ?>
        <body class="entry">
    <?php elseif (is_tag()) : ?>
    <?php echo the_tags(); ?>
        <body class="tag <?php echo $tag; ?>">
    <?php else: ?>
	    <body>
    <?php endif; ?>
		<div id="container">
			<div id="header">
				<h1 class="title"><a href="<?php bloginfo('url');?>/"><?php bloginfo('name');?></a></h1>
                <?php include('menu.php') ?>
			</div>
			<div id="content">
