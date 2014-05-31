<?php
/**
 * Footer widget areas.
 *
 * lambda framework v 2.1
 * by www.unitedthemes.com
 * since lambda framework v 1.0
 * based on skeleton
 */

// count the active widgets to determine column sizes
$footerwidgets =  is_active_sidebar('top-header-bar') ;
// default
$footergrid = "one_fourth";
// if only one
if ($footerwidgets == "1") {
$footergrid = "sixteen columns alpha omega";
// if two, split in half
}
?>

<?php if ($footerwidgets) : ?>

<?php if (is_active_sidebar('top-header-bar')) : ?>
<div class="<?php echo $footergrid;?>">
	<?php dynamic_sidebar('top-header-bar'); ?>
</div>
<?php endif;?>



<div class="clear"></div>

<?php endif;?>
