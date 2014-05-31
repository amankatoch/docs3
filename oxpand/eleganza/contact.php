<?php
/* 
Template Name: Contact
*/ 
?>
    
<?php get_header(); ?>

<?php
	if ( function_exists( 'get_option_tree') ) {
		$contactformheadline = get_option_tree( 'title_contactform'); 
		$contactnamelabel = get_option_tree( 'label_contactname'); 
		$contactaddresslabel = get_option_tree( 'label_contactaddress'); 
		$contactemaillabel = get_option_tree( 'label_contactemail'); 
		$contactphonelabel = get_option_tree( 'label_contactphone'); 
		$contactmessagelabel = get_option_tree( 'label_contactmessage'); 
		$contactsubmitlabel = get_option_tree( 'label_contactsubmit'); 
		$contacterrormessage = get_option_tree( 'message_contacterror'); 
		$contactsuccessmessage = get_option_tree( 'message_contactsuccess'); 
		$contactsendingmessage = get_option_tree( 'message_contactsending'); 
	}
	
	$pagecustoms = getOptions();
	
	if (isset($pagecustoms["headerimage_link"])){$hlink = $pagecustoms['headerimage_link'];}else{$hlink = "";}
	if (isset($pagecustoms["headercaption_text"])){$htext = $pagecustoms['headercaption_text'];}else{$htext = "";}
	if (isset($pagecustoms["headercaption_right"])){$hcap = $pagecustoms['headercaption_right'];}else{$hcap = "";}
	if (isset($pagecustoms["sidebar_right"])){$sideb = $pagecustoms['sidebar_right'];}else{$sideb = 0;}
?>
        
<!-- MAIN CONTENT START-->
        
    <div id="contentcontainer"> 
    
        <!-- SUBHEADER BACKGROUND -->
    
    	<?php if ($hlink!=""){ ?>
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
        
        <?php if ($hlink!=""){ ?>
        <div class="bannersmall"> 
        <img src="<?php echo $hlink ?>" alt="" />
        <?php }else{ ?>
        <div class="nobanner">
        <?php } ?>
        
        <?php if ($htext!=""){ ?>
        
			<?php if ($hlink!=""){ ?>
				<?php if ($hcap!=1){ ?>
                <div class="subheadercaption left">
                <?php }else{ ?>
                <div class="subheadercaption right">
                <?php } ?>
            <?php }else{ ?>
            	<?php if ($hcap!=1){ ?>
                <div class="subheadercaption left smallcap">
                <?php }else{ ?>
                <div class="subheadercaption right smallcap">
                <?php } ?>
            <?php } ?>
                <?php echo $htext ?>
            </div>
            
        <?php } ?>
         
        </div> 
        
        <?php if ($hlink!=""){ ?>
        <div class="shadow"></div>
		<?php } ?>
        
        <!-- SUBHEADER BANNER END -->
        
        <div id="pagination">
            <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
            <?php get_search_form(); ?> 
        </div>
        
        <?php if ($hlink!=""){ ?>
        <div id="paginationbg"></div>
        <?php }else{ ?>
        <div id="paginationbgsmall"></div>
        <?php } ?>
        
        <!-- PAGE CONTENT -->
        
        <div class="content">
    
        <!-- SIDEBAR -->
    
    	<?php if ($sideb!=1){ ?>
        <div class="sidebar left">
        <?php }else{ ?>
        <div class="sidebar right">
        <?php } ?>
        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("Contact Sidebar") ) : ?>
        <div class="widget">
        <div class="headline">Contact Sidebar</div>
        Please configure this Sidebar in the Admin Panel under Appearance -> Widgets -> Contact Sidebar
        </div>
        <?php endif; ?>
        </div>
        
        <!-- SIDEBAR END -->
        
        <!-- CONTENT COLUMN -->
        
        <?php if ($sideb!=1){ ?>
        <div class="twothird_content right"> 
        <?php }else{ ?>
        <div class="twothird_content left">
        <?php } ?>
			
			<div class="editorarea"><?php if(have_posts()) : while(have_posts()) : the_post(); the_content(); endwhile; endif; ?><br style="clear: left" /></div>
            
            <div class="contactdividerline"></div>
            
            <div id="contactus" class="marginbottom60">
                <h5 class="marginbottom20"><?php echo $contactformheadline ?></h5>
                <form id="contactform" action="#" method="post">
                    <div class="formpart">
                        <label for="contact_name"><?php echo $contactnamelabel ?></label>
                        <p><input type="text" name="name" id="contact_name" value="" class="requiredfield rounded"/></p>
                    </div>	
                    <div class="formpart end">
                        <label for="contact_adress"><?php echo $contactaddresslabel ?></label>
                        <p><input type="text" name="adress" id="contact_adress" value="" class="rounded"/></p>
                    </div>	
                    <div class="formpart">
                        <label for="contact_email"><?php echo $contactemaillabel ?></label>
                        <p><input type="text" name="email" id="contact_email" value="" class="requiredfield rounded"/></p>
                    </div>	
                    <div class="formpart end">
                        <label for="contact_phone"><?php echo $contactphonelabel ?></label>
                        <p><input type="text" name="phone" id="contact_phone" value="" class="rounded"/></p>
                    </div>
                    <div class="formpart">
                        <label for="contact_message"><?php echo $contactmessagelabel ?></label>
                        <p><textarea name="message" id="contact_message" class="requiredfield rounded"></textarea></p>
                    </div>			
                    <div class="formpart">
                        <button type="submit" name="send" class="sendmessage rounded"><?php echo $contactsubmitlabel ?></button>
                    </div>
                    <div class="formpart">
                        <span class="errormessage"><?php echo $contacterrormessage ?></span>
                        <span class="successmessage"><?php echo $contactsuccessmessage ?></span>
                        <span class="sendingmessage"><?php echo $contactsendingmessage ?></span>
                    </div>
                    <br style="clear: left" />
                </form>
                <br style="clear: left" />
            </div>
			<br style="clear: left" />
		</div>
		
		<!-- CONTENT COLUMN END -->
	
	</div>
	
	<!-- PAGE CONTENT END -->
	 
</div>

<!-- MAIN CONTENT END -->

<?php get_footer(); ?>