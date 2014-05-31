<?php
/* 
Template Name: Homepage - Image, Text, Partners
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
        <img id="Image-Maps-Com-image-maps-2014-05-22-083217" src="<?php echo $homeheaderimage ?>" border="0" width="960" height="160" orgWidth="960" orgHeight="160" usemap="#image-maps-2014-05-22-083217" alt="" />
<map name="image-maps-2014-05-22-083217" id="ImageMapsCom-image-maps-2014-05-22-083217">
<area  alt="" title="Köpa Bil Uppsala" href="http://trepebil.se/bilar-till-salu" shape="rect" coords="0,0,239,160" style="outline:none;" target="_self"     />
<area  alt="" title="Bilverkstad Knivsta Uppsala" href="http://trepebil.se/bilverkstad-knivsta" shape="rect" coords="240,0,480,160" style="outline:none;" target="_self"     />
<area shape="rect" coords="958,158,960,160" alt="Image Map" style="outline:none;" title="Image Map" href="http://www.image-maps.com/index.php?aff=mapped_users_0" />
</map>
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
    
    <!-- ABOUT -->
    
    <div class="about aboutfull">
    
        <h5><?php echo $aboutheadline ?></h5>
        
        <div class="abouttext fullwidth">
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