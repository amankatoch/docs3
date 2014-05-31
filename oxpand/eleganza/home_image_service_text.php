<?php
/* 
Template Name: Homepage - Image, Service, Text
*/ 
?>
    
<?php get_header(); ?>

<?php
	if ( function_exists( 'get_option_tree') ) {
		$bigdividerheadline = get_option_tree( 'headline_home_big'); 
		$servicesheadline = get_option_tree( 'headline_home_services'); 
		$aboutheadline = get_option_tree( 'headline_home_about'); 
		$fromblogheadline = get_option_tree( 'headline_home_fromblog'); 
		$fromportfolioheadline = get_option_tree( 'headline_home_fromportfolio');
		$partnersheadline = get_option_tree( 'headline_home_partners');
		
		$homeheaderimage = get_option_tree( 'img_home_header');
		$homeheaderimagecaption = get_option_tree( 'txt_home_header');
		$homeheaderimagecaptionright = get_option_tree( 'value_home_header');
		
		$servicesbuttontext = get_option_tree( 'button_home_services'); 
		$blogbuttontext = get_option_tree( 'button_home_fromblog'); 
		$portfoliobuttontext = get_option_tree( 'button_home_fromportfolio');
		$servicesbuttonlink = get_option_tree( 'link_home_services');
		$blogbuttonlink = get_option_tree( 'link_home_blog');
		$portfoliobuttonlink = get_option_tree( 'link_home_portfolio');
		 
		$serviceimage1 = get_option_tree( 'img_home_service1'); 
		$servicetext1 = get_option_tree( 'txt_home_service1'); 
		$servicetitle1 = get_option_tree( 'title_home_service1'); 
		$servicelink1 = get_option_tree( 'link_home_service1'); 
		$serviceimage2 = get_option_tree( 'img_home_service2'); 
		$servicetext2 = get_option_tree( 'txt_home_service2'); 
		$servicetitle2 = get_option_tree( 'title_home_service2'); 
		$servicelink2 = get_option_tree( 'link_home_service2'); 
		$serviceimage3 = get_option_tree( 'img_home_service3'); 
		$servicetext3 = get_option_tree( 'txt_home_service3'); 
		$servicetitle3 = get_option_tree( 'title_home_service3'); 
		$servicelink3 = get_option_tree( 'link_home_service3'); 
		
		$partnerstext = get_option_tree( 'txt_home_partners');
		
		if($serviceimage1==""){
			$serviceimage1 = get_bloginfo('template_url').'/images/demo/150x110.jpg';
		}
		if($serviceimage2==""){
			$serviceimage2 = get_bloginfo('template_url').'/images/demo/150x110.jpg';
		}
		if($serviceimage3==""){
			$serviceimage3 = get_bloginfo('template_url').'/images/demo/150x110.jpg';
		}
	}
?>
        
<!-- MAIN CONTENT START-->

<div id="contentcontainer"> 

    <!-- SUBHEADER BACKGROUND -->

    <?php if ($homeheaderimage!=""){ ?>
    <div class="subheaderbanner headerhalf">
    <?php }else{ ?>
    <div class="subheaderbanner headersmall">
    <?php } ?>
        <div id="shadowtiletop"></div>
        <div id="shadowtilebottom"></div>
        <div id="gradientleft"></div>
        <div id="gradientright"></div>
    </div>
    
    <!-- SUBHEADER BACKGROUND END -->
   
    <!-- SUBHEADER BANNER START -->
        
        <?php if ($homeheaderimage!=""){ ?>
        <div class="bannersmall"> 
        <img src="<?php echo $homeheaderimage ?>" alt="" />
        <?php }else{ ?>
        <div class="nobanner">
        <?php } ?>
        
        <?php if ($homeheaderimagecaption!=""){ ?>
        
			<?php if ($homeheaderimage!=""){ ?>
				<?php if ($homeheaderimagecaptionright!="Yes"){ ?>
                <div class="subheadercaption left">
                <?php }else{ ?>
                <div class="subheadercaption right">
                <?php } ?>
            <?php }else{ ?>
            	<?php if ($homeheaderimagecaptionright!="Yes"){ ?>
                <div class="subheadercaption left smallcap">
                <?php }else{ ?>
                <div class="subheadercaption right smallcap">
                <?php } ?>
            <?php } ?>
                <?php echo $homeheaderimagecaption ?>
            </div>
            
        <?php } ?>
         
        </div> 
        
        <?php if ($homeheaderimage!=""){ ?>
        <div class="shadow"></div>
		<?php } ?>
        
        <!-- SUBHEADER BANNER END -->
    
    <!-- DIVIDER START -->
    
    <div class="dividerbig"> 
        <?php echo $bigdividerheadline ?>
    </div>

	<?php if ($homeheaderimage!=""){ ?>
    <div class="welcomebg welcomebghalf"></div>
    <?php }else{ ?>
    <div class="welcomebg welcomebgno"></div>
    <?php } ?>
    
    <!-- DIVIDER END -->  
    
    <!-- SERVICES START -->
    
    <div id="services">
    
        <h5><?php echo $servicesheadline ?></h5>
        
        <ul>
            <li>
                <div class="serviceimage rounded">
                    <a href="<?php echo $servicelink1 ?>" rel="fadeimg" target="_top"><img src="<?php echo $serviceimage1 ?>"/></a>
                </div>
                <div class="servicetext">
                    <span><a href="<?php echo $servicelink1 ?>" rel="fadeimg" target="_top"><?php echo $servicetitle1 ?></a></span>
					<?php echo $servicetext1 ?>
                </div>
            </li> 
            
            <li>
                <div class="serviceimage rounded">
                    <a href="<?php echo $servicelink2 ?>" rel="fadeimg" target="_top"><img src="<?php echo $serviceimage2 ?>"/></a>
                </div>
                <div class="servicetext">
                    <span><a href="<?php echo $servicelink2 ?>" rel="fadeimg" target="_top"><?php echo $servicetitle2 ?></a></span>
					<?php echo $servicetext2 ?>	
                </div>
            </li> 
            
            <li>
                <div class="serviceimage rounded">
                    <a href="<?php echo $servicelink3 ?>" rel="fadeimg" target="_top"><img src="<?php echo $serviceimage3 ?>"/></a>
                </div>
                <div class="servicetext">
                    <span><a href="<?php echo $servicelink3 ?>" rel="fadeimg" target="_top"><?php echo $servicetitle3 ?></a></span>
					<?php echo $servicetext3 ?>
                </div>
            </li> 
        </ul>
        
        <a href="<?php echo $servicesbuttonlink ?>" class="buttonlight rounded" target="_top">&raquo; <?php echo $servicesbuttontext ?></a>

    </div>
    
    <!-- SERVICES END -->
    
    <div class="verticaldivider"></div>
    
    <!-- ABOUT -->
    
    <div class="about aboutheight">
    
        <h5><?php echo $aboutheadline ?></h5>
        
        <div class="abouttext">
            <div class="editorarea">
            <?php if(have_posts()) : while(have_posts()) : the_post(); the_content(); endwhile; endif; ?>
            <br style="clear: left" />
            </div>
        </div>
    
    </div>
    
    <!-- ABOUT END -->

</div>

<!-- MAIN CONTENT END-->

<?php get_footer(); ?>