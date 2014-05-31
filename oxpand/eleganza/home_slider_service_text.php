<?php
/* 
Template Name: Homepage - Slider, Service, Text
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
    
    
    
    <!-- SERVICES END -->
    
    
    
    <!-- ABOUT -->
    
    
    
    <!-- ABOUT END -->
    


<!-- MAIN CONTENT END-->

<?php get_footer(); ?>