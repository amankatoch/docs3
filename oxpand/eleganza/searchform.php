<?php
/**
 * @package WordPress
 * @subpackage Eleganza_Theme
 */
?>

<div class="subsearch">   
    <form class="searchform rounded" method="get" action="<?php bloginfo('url'); ?>/">
    <input name="s" id="s" type="text" onFocus="if(this.value == 'Search...') { this.value = ''; }" onBlur="if(this.value == '') { this.value = 'Search...'; }" value="Search..." tabindex="1" />
    <button class="searchbutton" type="submit" tabindex="2"></button>
    </form>
</div>
