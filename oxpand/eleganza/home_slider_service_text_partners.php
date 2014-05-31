<?php
/* 
Template Name: Homepage - Slider, Service, Text, Partners
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

    <div class="subheaderbanner headerfull">
        <div id="shadowtiletop"></div>
        <div id="shadowtilebottom"></div>
        <div id="gradientleft"></div>
        <div id="gradientright"></div>
    </div>
    
    <!-- SUBHEADER BACKGROUND END -->
   
    <!-- NIVO SLIDER BANNER START -->
    
    <div class="banner"> 
        
        <?php 
			if ( function_exists( 'get_option_tree' ) ) {
				$slides = get_option_tree( 'nivoslider_home', '', false, true, -1 );
				$index1 = 0;
				$index2 = 0;
				echo '<div id="nivoSlider">';
				foreach( $slides as $slide ) {
					if($slide['description']!=null){
						if($slide['image']==""){
							$slide['image'] = get_bloginfo('template_url').'/images/demo/960x310.jpg';
						}
						if($slide['link']==""){
							echo '
								<img src="'.$slide['image'].'" alt="'.$slide['title'].'" title="#caption'.$index1.'"/>
							';
						}else{
							echo '
								<a href="'.$slide['link'].'"><img src="'.$slide['image'].'" alt="'.$slide['title'].'" title="#caption'.$index1.'"/></a>
							';
						}
					}else{
						if($slide['link']==""){
							echo '
								<img src="'.$slide['image'].'" alt="'.$slide['title'].'"/>
							';
						}else{
							echo '
								<a href="'.$slide['link'].'"><img src="'.$slide['image'].'" alt="'.$slide['title'].'"/></a>
							';
						}
					}
					$index1++;
				}
				echo '</div>';
				foreach( $slides as $slide ) {
					if($slide['description']!=null){
						echo '
							<div id="caption'.$index2.'" class="nivo-html-caption">'.$slide['description'].'</div>
						';
					}
					$index2++;
				}
			}
        ?>
        
    </div> 
    
    <!-- SLIDER SHADOW -->
    
    <div class="shadow"></div>
    
    <!-- SLIDER SHADOW END -->
    
    <!-- NIVO SLIDER BANNER END -->
    
    <!-- DIVIDER START -->
    
    <div class="dividerbig"> 
        <?php echo $bigdividerheadline ?>
    </div>

    <div class="welcomebg"></div>
    
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
    
    <div class="dividerline"></div>
    
    <!-- PARTNERS -->
    
    <div id="partnerswrap">
    
        <h5><?php echo $partnersheadline ?></h5>
        
        <div class="partnerstext">
            <?php echo $partnerstext ?>
        </div>
        
        <div id="partners">
            <a class="buttons prev rounded" href="#"><</a>
            <div class="viewport">
                <ul class="overview">

                <?php 
					if ( function_exists( 'get_option_tree' ) ) {
						$partners = get_option_tree( 'partners_home', '', false, true, -1 );
						foreach( $partners as $partner ) {
							if($partner['description']!=null){
								if($partner['image']==""){
									$partner['image'] = get_bloginfo('template_url').'/images/demo/125x125.jpg';
								}
								if($partner['link']==""){
									echo '
										<li class="rounded"><img src="'.$partner['image'].'" alt="'.$partner['title'].'" title="'.$partner['description'].'"/></li>
									';
								}else{
									echo '
										<li class="rounded"><a href="'.$partner['link'].'"><img src="'.$partner['image'].'" alt="'.$partner['title'].'" title="'.$partner['description'].'"/></a></li>
									';
								}
							}else{
								if($partner['link']==""){
									echo '
										<li class="rounded"><img src="'.$partner['image'].'" alt="'.$partner['title'].'"/></li>
									';
								}else{
									echo '
										<li class="rounded"><a href="'.$partner['link'].'"><img src="'.$partner['image'].'" alt="'.$partner['title'].'"/></a></li>
									';
								}
							}
						}
					}
				?>
                
                </ul>
            </div>
            <a class="buttons next rounded" href="#">></a>
        </div>

    </div>
    
    <!-- PARTNERS END -->
    
</div>

<!-- MAIN CONTENT END-->

<?php get_footer(); ?>