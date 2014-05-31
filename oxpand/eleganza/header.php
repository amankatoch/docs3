<!DOCTYPE html>
<html <?php language_attributes(); ?>>

    <head>
        
        <title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
        
        <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
        <meta name="keywords" content="" />
        <meta name="description" content="<?php bloginfo('description'); ?>" />
        <meta name="robots" content="index, follow" />
        <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
        
        <!-- Style Sheets -->
		<?php
			print '<style type="text/css" media="all">';
			print '@import "'.get_bloginfo('template_url').'/css/reset.css";';
			print '@import "'.get_bloginfo('template_url').'/css/screen.php";';  
			print '@import "'.get_bloginfo('template_url').'/css/prettyPhoto.css";'; 
			print '</style>';
		?>

		<!--[if IE 7]>
            <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/ie7.css" type="text/css" media="screen" />
        <![endif]-->
        
        <!--/***********************************************
		* Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
		* This notice MUST stay intact for legal use
		* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
		***********************************************/-->
		
		<?php wp_head(); ?>
		
		<?php
			if ( function_exists( 'get_option_tree') ) {
				$telephonetextline = get_option_tree( 'txt_header_info'); 
				$headerfacebook = get_option_tree( 'icon_header_facebook'); 
				$headertwitter = get_option_tree( 'icon_header_twitter'); 
				$headerlinkedin = get_option_tree( 'icon_header_linkedin'); 
				$headerrss = get_option_tree( 'icon_header_rss'); 
				$headergoogle = get_option_tree( 'icon_header_google'); 
			}
        ?>

    </head>
   
    <body <?php body_class(); ?>> 
    
    	<!-- BODY WRAP START -->

        <div id="bodywrapper">
        
        	<!-- HEADER BG -->

        	<div id="headerbg">
            	<div id="topheaderline"></div>
            </div>
            
            <!-- HEADER BG END -->
        
        	<!-- HEADER START -->
        
            <div id="headercontainer">
            	
                <!-- HEADER TEXT LINE -->
            
            	<div id="headertextline"><?php echo $telephonetextline ?></div>
                
                <!-- HEADER TEXT LINE END -->
                
                <!-- HEADER SOCIAL ICONS -->
			
				<ul id="headersocial">
                	<?php if ($headerfacebook != "") { ?>
					<li><a href="<?php echo $headerfacebook ?>" rel="fadeimg" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/social/facebook.png"/></a></li>
                    <?php } ?>
                    <?php if ($headertwitter != "") { ?>
					<li><a href="<?php echo $headertwitter ?>" rel="fadeimg" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/social/twitter.png"/></a></li>
                    <?php } ?>
                    <?php if ($headerlinkedin != "") { ?>
					<li><a href="<?php echo $headerlinkedin ?>" rel="fadeimg" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/social/linkedin.png"/></a></li>
                    <?php } ?>
                    <?php if ($headerrss != "") { ?>
					<li><a href="<?php echo $headerrss ?>" rel="fadeimg" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/social/rss.png"/></a></li>
                    <?php } ?>
                    <?php if ($headergoogle != "") { ?>
					<li><a href="<?php echo $headergoogle ?>" rel="fadeimg" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/social/google.png"/></a></li>
                    <?php } ?>
				</ul>
                
                <!-- HEADER SOCIAL ICONS END -->
                
                <!-- LOGO -->
                
                <a href="<?php bloginfo('url'); ?>" title="Home"><div id="logo">Eleganza</div></a>
                
                <!-- LOGO END -->
                
                <!-- NAVIGATION START -->
                
                <div id="menuwrap">
               		<?php wp_nav_menu( array( 'menu' => 'navigation', 'container_class' => 'ddsmoothmenu', 'container_id' => 'smoothmenu1', 'theme_location' => 'navigation' ) ); ?>
				</div>
                
                <!-- NAVIGATION END -->	
            
            </div>
            
            <!-- HEADER END -->