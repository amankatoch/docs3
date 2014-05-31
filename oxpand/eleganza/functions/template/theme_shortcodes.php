<?php
/* ------------------------------------- */
/* SHORTCODES */
/* ------------------------------------- */

/* COLUMN 1/2 */

function onehalf_colum( $atts, $content = null ) {
   return '<div class="onehalf_text">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_half', 'onehalf_colum');

function onehalf_colum_last( $atts, $content = null ) {
   return '<div class="onehalf_text_last">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_half_last', 'onehalf_colum_last');

/* COLUMN 1/3 */

function onethird_colum( $atts, $content = null ) {
   return '<div class="onethird_text">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_third', 'onethird_colum');

function onethird_colum_last( $atts, $content = null ) {
   return '<div class="onethird_text_last">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_third_last', 'onethird_colum_last');

/* COLUMN 1/4 */

function onefourth_colum( $atts, $content = null ) {
   return '<div class="onefourth_text">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fourth', 'onefourth_colum');

function onefourth_colum_last( $atts, $content = null ) {
   return '<div class="onefourth_text_last">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fourth_last', 'onefourth_colum_last');

/* COLUMN 1/5 */

function onefifth_colum( $atts, $content = null ) {
   return '<div class="onefifth_text">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fifth', 'onefifth_colum');

function onefifth_colum_last( $atts, $content = null ) {
   return '<div class="onefifth_text_last">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fifth_last', 'onefifth_colum_last');

/* COLUMN FULL */

function full_colum( $atts, $content = null ) {
   return '<div class="full_text">' . do_shortcode($content) . '</div>';
}
add_shortcode('full', 'full_colum');

/* COLUMN 2/3 */

function twothird_column( $atts, $content = null ) {
   return '<div class="twothird_text">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_third', 'twothird_column');

function twothird_column_last( $atts, $content = null ) {
   return '<div class="twothird_text_last">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_third_last', 'twothird_column_last');

/* QUOTE FULL */

function full_quote( $atts, $content = null ) {
   return '<div class="full_quote">' . do_shortcode($content) . '</div>';
}
add_shortcode('full_quote', 'full_quote');

/* QUOTE 2/3 */

function twothird_quote( $atts, $content = null ) {
   return '<div class="twothird_quote">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_third_quote', 'twothird_quote');

function twothird_quote_last( $atts, $content = null ) {
   return '<div class="twothird_quote_last">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_third_quote_last', 'twothird_quote_last');

/* QUOTE 1/3 */

function onethird_quote( $atts, $content = null ) {
   return '<div class="onethird_quote">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_third_quote', 'onethird_quote');

function onethird_quote_last( $atts, $content = null ) {
   return '<div class="onethird_quote_last">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_third_quote_last', 'onethird_quote_last');

/* QUOTE 1/2 */

function onehalf_quote( $atts, $content = null ) {
   return '<div class="onehalf_quote">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_half_quote', 'onehalf_quote');

function onehalf_quote_last( $atts, $content = null ) {
   return '<div class="onehalf_quote_last">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_half_quote_last', 'onehalf_quote_last');

/* BOX HEADLINE DARK */

function headline_dark( $atts, $content = null ) {
   return '<span class="boxheadline_dark">' . do_shortcode($content) . '</span>';
}
add_shortcode('dark_headline', 'headline_dark');

/* BUTTONS */

function button_dark( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'target' => '',
	), $atts));
   return '<a href="'.$target.'" class="buttondark rounded">' . do_shortcode($content) . '</a>';
}
add_shortcode('btn_dark', 'button_dark');

function button_light( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'target' => '',
	), $atts));
   return '<a href="'.$target.'" class="buttonlight rounded">' . do_shortcode($content) . '</a>';
}
add_shortcode('btn_light', 'button_light');

/* HEADLINES */

function headline1( $atts, $content = null ) {
   return '<h1>' . do_shortcode($content) . '</h1>';
}
add_shortcode('h1', 'headline1');

function headline2( $atts, $content = null ) {
   return '<h2>' . do_shortcode($content) . '</h2>';
}
add_shortcode('h2', 'headline2');

function headline3( $atts, $content = null ) {
   return '<h3>' . do_shortcode($content) . '</h3>';
}
add_shortcode('h3', 'headline3');

function headline4( $atts, $content = null ) {
   return '<h4>' . do_shortcode($content) . '</h4>';
}
add_shortcode('h4', 'headline4');

function headline5( $atts, $content = null ) {
   return '<h5>' . do_shortcode($content) . '</h5>';
}
add_shortcode('h5', 'headline5');

function headline6( $atts, $content = null ) {
   return '<h6>' . do_shortcode($content) . '</h6>';
}
add_shortcode('h6', 'headline6');




/* ------------------------------------- */
/* SHORTCODE EDITOR DROPDOWN LIST */
/* ------------------------------------- */

function add_sc_select(){
	echo '&nbsp;<select id="sc_select"><option value="0">Select Shortcode from List</option>';
	/* SIDEBAR LAYOUTS */
	$shortcodes_list .= "<option value='0' style='font-weight:bold;'>Pages with Sidebar</option>";
	/* Sidebar Full Text */
	$shortcodes_list .= "<option value='[full]<br />...Your text here...<br />[/full]<br/>'>Full Column Layout</option>";
	/* Sidebar Full Quote */
	$shortcodes_list .= "<option value='[full_quote]<br />...Your text here...<br />[/full_quote]<br/>'>Quote Full Column Layout</option>";
	/* Sidebar 1/2 Text + 1/2 Quote */
	$shortcodes_list .= "<option value='[one_half]<br />...Your text here...<br />[/one_half]<br /><br />[one_half_quote_last]<br />...Your text here...<br />[/one_half_quote_last]<br/>'>1/2 Text + 1/2 Quote Layout</option>";
	/* Sidebar 1/2 Quote + 1/2 Text */
	$shortcodes_list .= "<option value='[one_half_quote_last]<br />...Your text here...<br />[/one_half_quote_last]<br /><br />[one_half_last]<br />...Your text here...<br />[/one_half_last]<br/>'>1/2 Quote + 1/2 Text Layout</option>";
	/* Sidebar 1/2 Text + 1/2 Text */
	$shortcodes_list .= "<option value='[one_half]<br />...Your text here...<br />[/one_half]<br /><br />[one_half_last]<br />...Your text here...<br />[/one_half_last]<br/>'>1/2 Text + 1/2 Text Layout</option>";
	/* Sidebar 1/2 Quote + 1/2 Quote */
	$shortcodes_list .= "<option value='[one_half_quote]<br />...Your text here...<br />[/one_half_quote]<br /><br />[one_half_quote_last]<br />...Your text here...<br />[/one_half_quote_last]<br/>'>1/2 Quote + 1/2 Quote Layout</option>";

	/* FULL WIDTH LAYOUTS */
	$shortcodes_list .= "<option value='0' style='font-weight:bold;'>Full-Width Pages</option>";
	/* Full Text */
	$shortcodes_list .= "<option value='[full]<br />...Your text here...<br />[/full]<br/>'>Full Column Layout</option>";
	/* Full Quote */
	$shortcodes_list .= "<option value='[full_quote]<br />...Your text here...<br />[/full_quote]<br/>'>Quote Full Column Layout</option>";
	/* 2/2 */
	$shortcodes_list .= "<option value='[one_half]<br />...Your text here...<br />[/one_half]<br /><br />[one_half_last]<br />...Your text here...<br />[/one_half_last]<br/>'>2/2 Column Layout</option>";
	/* 3/3 */
	$shortcodes_list .= "<option value='[one_third]<br />...Your text here...<br />[/one_third]<br /><br />[one_third]<br />...Your text here...<br />[/one_third]<br /><br />[one_third_last]<br />...Your text here...<br />[/one_third_last]<br/>'>3/3 Column Layout</option>";
	/* 4/4 */
	$shortcodes_list .= "<option value='[one_fourth]<br />...Your text here...<br />[/one_fourth]<br /><br />[one_fourth]<br />...Your text here...<br />[/one_fourth]<br /><br />[one_fourth]<br />...Your text here...<br />[/one_fourth]<br /><br />[one_fourth_last]<br />...Your text here...<br />[/one_fourth_last]<br />'>4/4 Column Layout</option>";
	/* 5/5 */
	$shortcodes_list .= "<option value='[one_fifth]<br />...Your text here...<br />[/one_fifth]<br /><br />[one_fifth]<br />...Your text here...<br />[/one_fifth]<br /><br />[one_fifth]<br />...Your text here...<br />[/one_fifth]<br /><br />[one_fifth]<br />...Your text here...<br />[/one_fifth]<br /><br />[one_fifth_last]<br />...Your text here...<br />[/one_fifth_last]<br />'>5/5 Column Layout</option>";
	/* 1/3 + 2/3 */
	$shortcodes_list .= "<option value='[one_third]<br />...Your text here...<br />[/one_third]<br /><br />[two_third_last]<br />...Your text here...<br />[/two_third_last]<br/>'>1/3 + 2/3 Column Layout</option>";	
	/* 2/3 + 1/3 */
	$shortcodes_list .= "<option value='[two_third]<br />...Your text here...<br />[/two_third]<br /><br />[one_third_last]<br />...Your text here...<br />[/one_third_last]<br/>'>2/3 + 1/3 Column Layout</option>";
	/* 1/3 Quote + 2/3 */
	$shortcodes_list .= "<option value='[one_third_quote]<br />...Your text here...<br />[/one_third_quote]<br /><br />[two_third_last]<br />...Your text here...<br />[/two_third_last]<br />'>1/3 Quote + 2/3 Column Layout</option>";
	/* 2/3 + 1/3 Quote */
	$shortcodes_list .= "<option value='[two_third]<br />...Your text here...<br />[/two_third]<br /><br />[one_third_quote_last]<br />...Your text here...<br />[/one_third_quote_last]<br />'>2/3 + 1/3 Quote Column Layout</option>";
	/* 1/3 + 2/3 Quote */
	$shortcodes_list .= "<option value='[one_third]<br />...Your text here...<br />[/one_third]<br /><br />[two_third_quote_last]<br />...Your text here...<br />[/two_third_quote_last]<br />'>1/3 + 2/3 Quote Column Layout</option>";
	/* 2/3 Quote + 1/3 */
	$shortcodes_list .= "<option value='[two_third_quote]<br />...Your text here...<br />[/two_third_quote]<br /><br />[one_third_last]<br />...Your text here...<br />[/one_third_last]<br />'>2/3 Quote + 1/3 Column Layout</option>";
	
	/* HEADLINES */
	$shortcodes_list .= "<option value='0' style='font-weight:bold;'>Headlines</option>";
	/* H1 */
	$shortcodes_list .= "<option value='[h1]...Your text here...[/h1]'>Headline H1</option>";
	/* H2 */
	$shortcodes_list .= "<option value='[h2]...Your text here...[/h2]'>Headline H2</option>";
	/* H3 */
	$shortcodes_list .= "<option value='[h3]...Your text here...[/h3]'>Headline H3</option>";
	/* H4 */
	$shortcodes_list .= "<option value='[h4]...Your text here...[/h4]'>Headline H4</option>";
	/* H5 */
	$shortcodes_list .= "<option value='[h5]...Your text here...[/h5]'>Headline H5</option>";
	/* H6 */
	$shortcodes_list .= "<option value='[h6]...Your text here...[/h6]'>Headline H6</option>";
	/* Headline Dark */
	$shortcodes_list .= "<option value='[dark_headline]...Your text here...[/dark_headline]'>Dark Text Headline</option>";
	
	/* BUTTONS */
	$shortcodes_list .= "<option value='0' style='font-weight:bold;'>Buttons</option>";
	/* Button Dark */
	$shortcodes_list .= "<option value='[btn_dark target=\"target url here\"]...Your text here...[/btn_dark]'>Dark Button</option>";
	/* Button Light */
	$shortcodes_list .= "<option value='[btn_light target=\"target url here\"]...Your text here...[/btn_light]'>Light Button</option>";
	
	/* MISC */
	$shortcodes_list .= "<option value='0' style='font-weight:bold;'>Miscellaneous (Add column around this to determine width)</option>";
	/* Table */
	$shortcodes_list .= "<option value='<table class=\"pricingtable\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
<thead>
<tr>
<th></th>
<th scope=\"col\" abbr=\"Starter\">Basic Package</th>
<th scope=\"col\" abbr=\"Medium\">Advanced Package</th>
<th scope=\"col\" abbr=\"Business\">Smart Package</th>
<th scope=\"col\" abbr=\"Deluxe\">Unlimited Package</th>
</tr>
</thead>
<tfoot>
<tr>
<th scope=\"row\">Price per month</th>
<td>$ 3.90</td>
<td>$ 7.90</td>
<td>$ 10.90</td>
<td>$ 14.90</td>
</tr>
</tfoot>
<tbody>
<tr>
<th scope=\"row\">Webspace</th>
<td>2 GB</td>
<td>4 GB</td>
<td>8 GB</td>
<td>Unlimited</td>
</tr>
<tr>
<th scope=\"row\">Bandwidth</th>
<td>50 GB</td>
<td>150 GB</td>
<td>200 GB</td>
<td>Unlimited</td>
</tr>
<tr>
<th scope=\"row\">Domains</th>
<td>2</td>
<td>4</td>
<td>8</td>
<td>15</td>
</tr>
<tr>
<th scope=\"row\">MySQL db&#8217;s</th>
<td>5</td>
<td>10</td>
<td>20</td>
<td>Unlimited</td>
</tr>
<tr>
<th scope=\"row\">24h-Support</th>
<td><span class=\"check\"></span></td>
<td><span class=\"check\"></span></td>
<td><span class=\"check\"></span></td>
<td><span class=\"check\"></span></td>
</tr>
<tr>
<th scope=\"row\">PHP 5 enabled</th>
<td><span class=\"no\"></span></td>
<td><span class=\"no\"></span></td>
<td><span class=\"check\"></span></td>
<td><span class=\"check\"></span></td>
</tr>
</tbody>
</table>'>Pricing Table Example</option>";
	/* Tabs */
	$shortcodes_list .= "<option value='<div class=\"contenttabs full_text\">
<ul class=\"tabs\">
<li><a href=\"#first\">Tab 1</a></li>
<li><a href=\"#second\">Tab 2</a></li>
<li><a href=\"#third\">Tab 3</a></li>
</ul>
<div class=\"panes\">
<div><h5>First Tab Content</h5>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. <br/><br/><a href=\"#second\" class=\"buttonlight rounded\">Open Second Tab</a><br/></div>
<div><h5>Second Tab Content</h5>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. <br/><br/><a href=\"#third\" class=\"buttonlight rounded\">Open Third Tab</a><br/></div>
<div><h5>Third Tab Content</h5>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. <br/><br/><a href=\"#first\" class=\"buttonlight rounded\">Open First Tab</a><br/></div>
</div>
</div>'>Tabs Example</option>";
	/* Check List */
	$shortcodes_list .= "<option value='<ul class=\"checklist\">
                            <li>Lorem ipsum dolor sit amet, consetetur sadipscing.</li>
                            <li>Lorem ipsum dolor sit amet, consetetur sadipscing.</li>
                            <li>Lorem ipsum dolor sit amet, consetetur sadipscing.</li>
                            <li>Lorem ipsum dolor sit amet, consetetur sadipscing.</li>
                        </ul>'>Checklist Example</option>";
	/* Bullet List */
	$shortcodes_list .= "<option value='<ul class=\"bulletlist\">
                            <li>Lorem ipsum dolor sit amet, consetetur sadipscing.</li>
                            <li>Lorem ipsum dolor sit amet, consetetur sadipscing.</li>
                            <li>Lorem ipsum dolor sit amet, consetetur sadipscing.</li>
                            <li>Lorem ipsum dolor sit amet, consetetur sadipscing.</li>
                        </ul>'>Bulletlist Example</option>";
	
	/* GALLERY LINKS */
	$shortcodes_list .= "<option value='0' style='font-weight:bold;'>Gallery Links</option>";
	/* prettyPhoto Image */
	$shortcodes_list .= "<option value='<a href=\"LINK TO LARGE IMAGE GOES HERE\" rel=\"prettyPhoto[mainteasers]\" title=\"ENTRY DESCRIPTION TEXT GOES HERE\"><img class=\"size-full wp-image-60 alignleft bordered\" title=\"\" src=\"LINK TO THUMB IMAGE GOES HERE\" alt=\"\" /></a>'>Image with Gallery Style</option>";
	/* prettyPhoto Youtube */
	$shortcodes_list .= "<option value='<a href=\"http://www.youtube.com/watch?v=YOUTUBE VIDEO ID GOES HERE&width=720&height=435\" rel=\"prettyPhoto[mainteasers]\" title=\"ENTRY DESCRIPTION TEXT GOES HERE\"><img class=\"size-full wp-image-60 alignleft bordered\" title=\"\" src=\"LINK TO THUMB IMAGE GOES HERE\" alt=\"\" /></a>'>Youtube with Gallery Style</option>";
	/* prettyPhoto Vimeo */
	$shortcodes_list .= "<option value='<a href=\"http://vimeo.com/VIMEO VIDEO ID GOES HERE&width=720&height=405\" rel=\"prettyPhoto[mainteasers]\" title=\"ENTRY DESCRIPTION TEXT GOES HERE\"><img class=\"size-full wp-image-60 alignleft bordered\" title=\"\" src=\"LINK TO THUMB IMAGE GOES HERE\" alt=\"\" /></a>'>Vimeo with Gallery Style</option>";
	
	echo $shortcodes_list;
	echo '</select>';
}

add_action('admin_head', 'shortcodeselector');

function shortcodeselector() {
	echo '<script type="text/javascript">
	jQuery(document).ready(function(){
	   jQuery("#sc_select").change(function() {
	   		var selectedval = jQuery("#sc_select :selected").val();
	   		if(selectedval != 0){
				send_to_editor(selectedval);
			}
			return false;
		});
	});
	</script>';
}

add_action('media_buttons','add_sc_select',11);
?>