</div>
    
    <!-- BODY WRAP END -->
    
    <?php
		if ( function_exists( 'get_option_tree') ) {
			$subfooterlinks = get_option_tree( 'subfooter_linklist'); 
		}
	?>
    
    <!-- FOOTER WRAP START -->
        
    <div id="footerwrap">
    
    	<!-- FOOTER GRADIENTS -->
    	
        <div id="shadowtiletopfooter"></div>
        <div id="shadowtilebottomfooter"></div>
        
        <!-- FOOTER GRADIENTS END -->
    
    	<!-- FOOTER CONTAINER START -->
    
        <div id="footercontainer">
        
        <!-- FOOTER WIDGET AREA -->
        
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer Widget 1") ) : ?>

        <div class="widget">
        <div class="headline">Footer Widget 1</div>
        Please configure this Widget in the Admin Panel under Appearance -> Widgets -> Footer Widget 1
        </div>
        
		<?php endif; ?>
        
        <div class="verticaldividersmall_left"></div>
        
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer Widget 2") ) : ?>
		
		<div class="widget">
        <div class="headline">Footer Widget 2</div>
        Please configure this Widget in the Admin Panel under Appearance -> Widgets -> Footer Widget 2
        </div>
		
		<?php endif; ?>
        
        <div class="verticaldividersmall_right"></div>
        
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer Widget 3") ) : ?>
		
		<div class="widget">
        <div class="headline">Footer Widget 3</div>
        Please configure this Widget in the Admin Panel under Appearance -> Widgets -> Footer Widget 3
        </div>
		
		<?php endif; ?>
        
        <!-- FOOTER WIDGET AREA END -->
        
        </div>
        
        <!-- FOOTER CONTAINER END -->
        
        <div id="gradientleftfooter"></div>
        <div id="gradientrightfooter"></div>
        
        <!-- FOOTER BOTTOM BAR START -->
        
        <div id="footerbar">
            <div id="footerbartext">
                <span class="textleft">&copy; <?php echo date("Y"); ?>&nbsp;<?php bloginfo('name'); ?></span>
                <span class="textright">
                    <?php echo $subfooterlinks ?>
                </span>
            </div>
        </div>
        
        <!-- FOOTER BOTTOM BAR END -->
    
    </div>
    
    <!-- FOOTER WRAP END -->
    
    <?php wp_footer(); ?>
  
	</body>  
    
</html>