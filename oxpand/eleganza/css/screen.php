<?php
header("Content-Type: text/css; charset=utf-8");

$absolute_path = __FILE__;
$path_to_file = explode( 'wp-content', $absolute_path );
$path_to_wp = $path_to_file[0];
require_once( $path_to_wp.'/wp-load.php' );

if ( function_exists( 'get_option_tree') ) {
	/* GENERAL */
	if(get_option_tree( 'img_header_logo' )!=""){
		$logourl = get_option_tree( 'img_header_logo' );
	}else{
		$logourl = get_bloginfo('template_url').'/images/logo.png';
	}
	if(get_option_tree( 'img_imagebgtile' )!=""){
		$bgurl = get_option_tree( 'img_imagebgtile' );
	}else{
		$bgurl = get_bloginfo('template_url').'/images/backgrounds/diag.png';
	}
	
	/* COLORS */
	$colorpreset = get_option_tree( 'color_preset' );
	if($colorpreset=="custom"){
		$primarycolor = get_option_tree( 'color_highlight1' );
		$secondarycolor = get_option_tree( 'color_highlight2' );
		$subheadercolor = get_option_tree( 'color_subheader_background' );
	}else if($colorpreset=="blue"){
		$primarycolor = "#4a7cbb";
		$secondarycolor = "#70a7ec";
		$subheadercolor = "#284468";
	}else if($colorpreset=="red"){
		$primarycolor = "#941515";
		$secondarycolor = "#b33434";
		$subheadercolor = "#631010";
	}else if($colorpreset=="green"){
		$primarycolor = "#17611d";
		$secondarycolor = "#3e873d";
		$subheadercolor = "#234727";
	}else if($colorpreset=="brown"){
		$primarycolor = "#6e3616";
		$secondarycolor = "#995f3d";
		$subheadercolor = "#452e21";
	}
	
	$menulinkcolor = get_option_tree( 'color_menulink' );
	$menulinkhovercolor = get_option_tree( 'color_menulinkhover' );
	$submenubghovercolor = get_option_tree( 'color_submenubghover' );
	$submenustructure = get_option_tree( 'submenu_bgtexture' );
	$submenuhoverflip = get_option_tree( 'submenu_hoverflip' );
	$submenustyle = get_option_tree( 'submenu_colorscheme' );
	
	if($submenustyle == "dark"){
		$submenubgcolor = "#252525";
		$menulinkhovercolor = "#eee";
		$menulinkshadowcolor = "#000";
		$submenuseparatorcolor = "#3e3e3e";
	}else{
		$submenubgcolor = "#eee";
		$menulinkhovercolor = "#777";
		$menulinkshadowcolor = "#fff";
		$submenuseparatorcolor = "#ccc";
	}

	/* FONTS */
	$googlefontfamily = get_option_tree( 'fonts_family' );
	$fontsizemenu = get_option_tree( 'fonts_menu_size', '', true, true, 0 ).get_option_tree( 'fonts_menu_size', '', true, true, 1 );
	$fontsizebody = get_option_tree( 'fonts_body_size', '', true, true, 0 ).get_option_tree( 'fonts_body_size', '', true, true, 1 );
	$h1size = get_option_tree( 'fonts_h1_size', '', true, true, 0 ).get_option_tree( 'fonts_h1_size', '', true, true, 1 ); 
	$h2size = get_option_tree( 'fonts_h2_size', '', true, true, 0 ).get_option_tree( 'fonts_h2_size', '', true, true, 1 ); 
	$h3size = get_option_tree( 'fonts_h3_size', '', true, true, 0 ).get_option_tree( 'fonts_h3_size', '', true, true, 1 ); 
	$h4size = get_option_tree( 'fonts_h4_size', '', true, true, 0 ).get_option_tree( 'fonts_h4_size', '', true, true, 1 ); 
	$h5size = get_option_tree( 'fonts_h5_size', '', true, true, 0 ).get_option_tree( 'fonts_h5_size', '', true, true, 1 ); 
	$h6size = get_option_tree( 'fonts_h6_size', '', true, true, 0 ).get_option_tree( 'fonts_h6_size', '', true, true, 1 ); 
	$menufontbold = get_option_tree( 'fonts_menu_bold' );
	
	/* CORNER RADIUS */
	$rounded = get_option_tree( 'value_cornerradius', '', true, true, 0 ).get_option_tree( 'value_cornerradius', '', true, true, 1 );
	$menurounded = get_option_tree( 'value_cornerradius', '', true, true, 0 ).get_option_tree( 'value_cornerradius', '', true, true, 1 );
}
?>

/*
Eleganza Corporate Buisiness WordPress Theme
*/


/* ------------------------------------------------------ */
/* BASE */
/* ------------------------------------------------------ */


* { 
	margin: 0; 
	padding: 0; 
	outline: 0;
}

html, body { 
	font-family: Arial, Helvetica, sans-serif; 
	font-size: <?php echo $fontsizebody ?>; 
	line-height: 20px;
	margin: 0;
	padding: 0;
	height: 100%;
	color: #555555; 
}

body {
	background: #e9e9e9 url('../images/backgrounds/grain.png') repeat scroll center top;
}

img {
	border: 0;
}

a:link, a:visited {
	text-decoration: none;
	color: <?php echo $primarycolor ?>; 
}

a:hover {
	text-decoration: underline;
	cursor: pointer;
	color: <?php echo $secondarycolor ?>;
}

a:focus { 
    outline: none; 
}

button:focus { 
    outline: none; 
}

#headercontainer, #contentcontainer, #footercontainer, #footerbartext, #bodywrapper { 
	width: 960px; 
	margin: 0 auto;
}

#bodywrapper {
	width: 100%;
	min-height: 100%; 
	list-style-type: none;
	position: relative;
}

#contentcontainer { 
	overflow:hidden;
	padding-bottom: 400px;
	padding-top: 5px;
	margin-bottom: 60px;
}

.rounded {
  -moz-border-radius: <?php echo $rounded ?>; 
  -webkit-border-radius: <?php echo $rounded ?>;
  border-radius: <?php echo $rounded ?>; 
}


/* ------------------------------------------------------ */
/* HEADER SOCIAL */
/* ------------------------------------------------------ */


#headersocial {
	position: absolute;
	list-style-type: none;
	width: 960px;
	margin-top: 5px;
}

#headersocial li {
	display: inline;
	float: right;
	padding-left: 5px;
}

#headertextline {
	position: absolute;
	list-style-type: none;
	width: 960px;
	margin-top: 5px;
	text-align: left;
	color: #bbb;
    text-shadow: 1px 1px 0px #fff;
}

#headertextline strong {
	font-weight: bold;
}	


/* ------------------------------------------------------ */
/* LOGO */
/* ------------------------------------------------------ */


#logo{
	float: left;
    position: relative;
    z-index: 89;
	background: url(<?php echo $logourl ?>) no-repeat 0% 50%;
	overflow: hidden;
	text-indent:-9999px;
	width:300px;
	height:100px;
    margin-top: 30px;
}

#logo:hover{
	cursor:pointer;
}


/* ------------------------------------------------------ */
/* NAVIGATION */
/* ------------------------------------------------------ */


#headercontainer {
	width: 960px;
	height: 130px;
}

#menuwrap {
	float: left;
	width: 660px;
	height: 130px;
}

.ddsmoothmenu{
	position: relative;
	float: right;
	/*font-family: <?php echo $googlefontfamily ?>;*/
    font-family: Arial, Helvetica, sans-serif; 
	font-size: 	<?php echo $fontsizemenu ?>;
	line-height: <?php echo $fontsizemenu ?>;
    <?php if($menufontbold=="Yes"){ ?>
    font-weight: bold;
    <?php }else{ ?>
    font-weight: normal;
    <?php } ?>
	margin-top: 62px;
	z-index:		99;
	margin-right: -20px;
}

.ddsmoothmenu ul{
	z-index:100;
	margin: 0;
	padding: 0;
	list-style-type: none;
    -webkit-border-top-right-radius:<?php echo $menurounded ?>;
    -webkit-border-bottom-left-radius:<?php echo $menurounded ?>;
    -webkit-border-bottom-right-radius:<?php echo $menurounded ?>;
    -moz-border-radius:0px <?php echo $menurounded ?> <?php echo $menurounded ?> <?php echo $menurounded ?>;
    border-top-right-radius:<?php echo $menurounded ?>;
    border-bottom-left-radius:<?php echo $menurounded ?>;
    border-bottom-right-radius:<?php echo $menurounded ?>;
    <?php if($submenustructure=="Yes"){ ?>
    background: <?php echo $submenubgcolor ?> url('../images/backgrounds/grain.png') repeat center top;
    <?php }else{ ?>
    background: <?php echo $submenubgcolor ?>;
    <?php } ?>
}

.ddsmoothmenu ul ul{
	padding-top: 10px;
	padding-bottom: 10px;
}

/*Top level list items*/
.ddsmoothmenu ul li{
	position: relative;
	display: inline;
	float: left;
    line-height: 13px;
}

.ddsmoothmenu ul li ul li{
	padding: 5px;
    padding-left: 10px;
    padding-right: 10px;
}

.ddsmoothmenu ul ul ul{
	border-bottom: 0;
    -webkit-border-radius:<?php echo $menurounded ?>;
    -moz-border-radius:<?php echo $menurounded ?>;
    border-radius:<?php echo $menurounded ?>;
}

/*Top level menu link items style*/
.ddsmoothmenu ul li a{
	display: block;
	background: #fff; /*background of menu items (default state)*/
	padding: 15px 20px;
	color: <?php echo $menulinkcolor ?>;
	text-decoration: none;
}

* html .ddsmoothmenu ul li a{ /*IE6 hack to get sub menu links to behave correctly*/
	display: inline-block;
}

.ddsmoothmenu ul li a:link, .ddsmoothmenu ul li a:visited{
    color: <?php echo $menulinkcolor ?>;
}

.ddsmoothmenu ul li a:hover{
    background: #fff; /*background of menu items during onmouseover (hover state)*/
    color: <?php echo $primarycolor ?>;
}

.ddsmoothmenu ul li a.selected{ /*CSS class that's dynamically added to the currently active menu items' LI A element*/
    <?php if($submenustructure=="Yes"){ ?>
    background: <?php echo $submenubgcolor ?> url('../images/backgrounds/grain.png') repeat center top;
    <?php }else{ ?>
    background: <?php echo $submenubgcolor ?>;
    <?php } ?>
    color: <?php echo $menulinkhovercolor ?>;
    -webkit-border-top-left-radius:<?php echo $menurounded ?>;
    -webkit-border-top-right-radius:<?php echo $menurounded ?>;
    -moz-border-radius:<?php echo $menurounded ?> <?php echo $menurounded ?> 0px 0px;
    border-top-left-radius:<?php echo $menurounded ?>;
    border-top-right-radius:<?php echo $menurounded ?>;
    text-shadow: 1px 1px 0px <?php echo $menulinkshadowcolor ?>;
}

.ddsmoothmenu ul li ul li a:link, .ddsmoothmenu ul li ul li a:visited{
	background: transparent;
	color: <?php echo $menulinkhovercolor ?>;
    text-shadow: 1px 1px 0px <?php echo $menulinkshadowcolor ?>;
    border-bottom: 1px dotted <?php echo $submenuseparatorcolor ?>;
    margin-top: -5px;
}

/*.ddsmoothmenu ul li ul > li:last-child a:link, .ddsmoothmenu ul li ul > li:last-child a:visited{ 
	border-bottom: 0;
}*/

<?php if($submenuhoverflip=="Yes"){ ?>
.ddsmoothmenu ul li ul li a:hover{
    background: <?php echo $submenubghovercolor ?>;
	color: <?php echo $primarycolor ?>;
	text-shadow: 1px 1px 0px #fff;
    -webkit-border-radius:<?php echo $menurounded ?>;
    -moz-border-radius:<?php echo $menurounded ?>;
    border-radius:<?php echo $menurounded ?>;
    border-bottom: 1px solid #fff;
}
<?php }else{ ?>
.ddsmoothmenu ul li ul li a:hover{
    color: #fff;
	text-shadow: 1px 1px 0px #000;
	background: <?php echo $primarycolor ?>;
    -webkit-border-radius:<?php echo $menurounded ?>;
    -moz-border-radius:<?php echo $menurounded ?>;
    border-radius:<?php echo $menurounded ?>;
    border-bottom: 1px solid <?php echo $submenubgcolor ?>;
}
<?php } ?>
	
/*1st sub level menu*/
.ddsmoothmenu ul li ul{
	position: absolute;
	left: 0;
	display: none; /*collapse all sub menus to begin with*/
	visibility: hidden;
	/*margin-left: 6px;*/
	/*text-shadow: 1px 1px 0px #fff;*/
}

/*Sub level menu list items (undo style from Top level List Items)*/
.ddsmoothmenu ul li ul li{
	display: list-item;
	float: none;
	padding-bottom: 0px;
	margin-left: 0px;
}

/*All subsequent sub menu levels vertical offset after 1st level sub menu */
.ddsmoothmenu ul li ul li ul{
	top: 0;
	margin-left: 0px;
    margin-top: -10px;
}

/* Sub level menu links style */
.ddsmoothmenu ul li ul li a{
	width: 190px; /*width of sub menus*/
	padding: 10px;
    padding-left: 10px;
	margin: 0;
	border-top-width: 0;
}

.ddsmoothmenu li li ul,
.ddsmoothmenu li li li ul { 
	margin: 0 0 0 0;
}

/* Holly Hack for IE \*/
* html .ddsmoothmenu{height: 1%;} /*Holly Hack for IE7 and below*/


/* CSS classes applied to down and right arrow images */
.downarrowclass{
	position: absolute;
	top: 8px;
	right: 10px;
    visibility: hidden;
}

.rightarrowclass{
	position: absolute;
	top: 11px;
	right: 10px;
    visibility: hidden;
}

/* CSS for shadow added to sub menus */
.ddshadow{ /*shadow for NON CSS3 capable browsers*/
	position: absolute;
	left: 0;
	top: 0;
	width: 0;
	height: 0;
	background: silver;
}

.toplevelshadow{ /*shadow opacity for NON CSS3 capable browsers. Doesn't work in IE*/
	opacity: 0.8;
}


/* ------------------------------------------------------ */
/* SUBHEADER
/* ------------------------------------------------------ */


.subheaderbanner {
	position: absolute;
	left: 0;
	top: 135px;
	width: 100%;
	background: <?php echo $subheadercolor ?> url('../images/backgrounds/grain.png') repeat center top;
	border-top: 1px solid #eee;
	overflow: hidden;
}

.headerfull {
	height: 390px;
}

.headerhalf {
	height: 240px;
}

.headersmall {
	height: 90px;
}

.banner {
	position: relative;
	float: left;
	width: 960px;
	height: 310px;
	margin-top: 40px;
	overflow: hidden;
    -webkit-border-radius:<?php echo $rounded ?>;
    -moz-border-radius:<?php echo $rounded ?>;
    border-radius:<?php echo $rounded ?>;
}

.bannersmall {
	position: relative;
	float: left;
	width: 960px;
	height: 160px;
	top: 40px;
	overflow: hidden;
	margin-bottom: 40px;
    -webkit-border-radius:<?php echo $rounded ?>;
    -moz-border-radius:<?php echo $rounded ?>;
    border-radius:<?php echo $rounded ?>;
}

.nobanner {
	position: relative;
	float: left;
	width: 960px;
	height: 40px;
	top: 51px;
	margin-bottom: 50px;
}

.shadow {
	float: left;
	position: relative;
	z-index: 1;
	width: 960px;
	height: 20px;
	margin-bottom: 20px;
	background: url('../images/backgrounds/shadow.png') transparent no-repeat 50% top;
}

.subheadercaption {
	position:absolute;
	bottom:20px;
	background: transparent url('../images/backgrounds/black90.png') repeat center top;
	color:#aaa;
	opacity:0.9;
	width:259px;
	height: 80px;
	z-index:8;
	padding: 20px;
	overflow: hidden;
	-moz-border-radius: <?php echo $rounded ?>; 
	-webkit-border-radius: <?php echo $rounded ?>;
	border-radius: <?php echo $rounded ?>; 
}
.subheadercaption.right {
	right:20px;
}
.subheadercaption.left {
	left:20px;
}
.subheadercaption p {
	padding:5px;
	margin:0;
}
.subheadercaption a {
	display:inline !important;
}

.subheadercaption a:link, .subheadercaption a:visited {
	text-decoration: none;
	color: <?php echo $secondarycolor ?>; 
}

.subheadercaption a:hover {
	text-decoration: none;
	cursor: pointer;
	color: <?php echo $primarycolor ?>;
}

.smallcap {
	width: auto;
	height: 25px;
	padding-left: 20px;
	padding-top: 15px;
	padding-bottom: 10px;
}

.smallcap.right {
	right:0px;
}
.smallcap.left {
	left:0px;
}


/* ------------------------------------------------------ */
/* HOME PAGE NIVO SLIDER
/* ------------------------------------------------------ */


/*
 * jQuery Nivo Slider v2.6
 * http://nivo.dev7studios.com
 *
 * Copyright 2011, Gilbert Pellegrom
 * Free to use and abuse under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * March 2010
 */
 
/* The Nivo Slider styles */

.nivoSlider {
	position:relative;
}

.nivoSlider img {
	position:absolute;
	top:0px;
	left:0px;
}

/* If an image is wrapped in a link */
.nivoSlider a.nivo-imageLink {
	position:absolute;
	top:0px;
	left:0px;
	width:100%;
	height:100%;
	border:0;
	padding:0;
	margin:0;
	z-index:6;
	display:none;
}

/* The slices and boxes in the Slider */
.nivo-slice {
	display:block;
	position:absolute;
	z-index:5;
	height:100%;
}

.nivo-box {
	display:block;
	position:absolute;
	z-index:5;
}

/* Caption styles */
.nivo-caption {
	position:absolute;
	right:20px;
	top:50px;
	background: transparent url('../images/backgrounds/black90.png') repeat center top;
	color:#aaa;
	opacity:0.85; /* Overridden by captionOpacity setting */
	width:300px;
	z-index:8;
	padding: 20px;
	overflow: hidden;
	-moz-border-radius: <?php echo $rounded ?>; 
	-webkit-border-radius: <?php echo $rounded ?>;
	border-radius: <?php echo $rounded ?>; 
}

.nivo-caption p {
	padding:5px;
	margin:0;
}

.nivo-caption a {
	display:inline !important;
}

/*
.nivo-caption a:link, .nivo-caption a:visited {
	text-decoration: none;
	color: <?php echo $secondarycolor ?>; 
}

.nivo-caption a:hover {
	text-decoration: underline;
	cursor: pointer;
	color: <?php echo $primarycolor ?>;
}
*/

.nivo-html-caption {
    display:none;
}

/* Direction nav styles (e.g. Next & Prev) */
.nivo-directionNav a {
	position:absolute;
	top:270px;
	z-index:9;
	cursor:pointer;
	background: #000;
	color: #fff;
	padding: 10px;
	font-size: 14px;
}

.nivo-prevNav {
	left:0px;
}

.nivo-nextNav {
	right:0px;
}

.nivo-controlNav {
    position:absolute;
    left:15px; 
    bottom:10px;
    z-index:20; 
}

.nivo-controlNav a {
	position:relative;
	z-index:9;
	cursor:pointer;
}

.nivo-controlNav a.active {
	font-weight:bold;
}

.nivo-controlNav a {
    display:block;
    width:20px;
    height:22px;
    background:url('../images/homepage_slider/bullets.png') no-repeat;
    text-indent:-9999px;
    border:0;
    margin-right:3px;
    float:left;
}

.nivo-controlNav a.active {
    background-position:0 -31px; /* Selected bullet */
}


/* ------------------------------------------------------ */
/* GRADIENTS
/* ------------------------------------------------------ */


.welcomebg {
	position: absolute;
	z-index: -1;
	left: 0;
	top: 526px;
	width: 100%;
	height: 60px;
	background: #222 url('../images/backgrounds/grain.png') repeat center top;
	border-bottom: 1px solid #111;
	border-top: 1px solid #333;
}

.welcomebghalf {
	top: 376px;
}

.welcomebgno {
	top: 226px;
}

#paginationbg {
	position: absolute;
	z-index: -1;
	left: 0;
	top: 376px;
	width: 100%;
	height: 40px;
	background: #222 url('../images/backgrounds/grain.png') repeat center top;
	border-bottom: 1px solid #111;
	border-top: 1px solid #333;
}

#paginationbgsmall {
	position: absolute;
	z-index: -1;
	left: 0;
	top: 226px;
	width: 100%;
	height: 40px;
	background: #222 url('../images/backgrounds/grain.png') repeat center top;
	border-bottom: 1px solid #111;
	border-top: 1px solid #333;
}

#shadowtiletop {
	position: absolute;
	left: 0;
	top: 0;
	height: 8px;
	width: 100%;
	background: url('../images/backgrounds/shadowtile_top.png') repeat center top;
}

#shadowtilebottom {
	position: absolute;
	left: 0;
	top: 100%;
	height: 8px;
	margin-top: -8px;
	width: 100%;
	background: url('../images/backgrounds/shadowtile_bottom.png') repeat center top;
}

#gradientleft {
	position: absolute;
	left: 0;
	top: 0;
	height: 525px;
	width: 600px;
	background: url('../images/backgrounds/gradientleft.png') repeat-y center top;
}

#gradientright {
	position: absolute;
	right: 0;
	top: 0;
	height: 525px;
	width: 600px;
	background: url('../images/backgrounds/gradientright.png') repeat-y center top;
}

#shadowtiletopfooter {
	position: absolute;
	left: 0;
	top: 0;
	height: 8px;
	width: 100%;
	background: url('../images/backgrounds/shadowtile_top.png') repeat center top;
}

#shadowtilebottomfooter {
	position: absolute;
	left: 0;
	top: 352px;
	height: 8px;
	width: 100%;
	background: url('../images/backgrounds/shadowtile_bottom.png') repeat center top;
}

#gradientleftfooter {
	position: absolute;
	z-index: -1;
	left: 0;
	top: 0;
	height: 390px;
	width: 600px;
	background: url('../images/backgrounds/gradientleft.png') no-repeat center top;
}

#gradientrightfooter {
	position: absolute;
	z-index: -1;
	right: 0;
	top: 0;
	height: 390px;
	width: 600px;
	background: url('../images/backgrounds/gradientright.png') no-repeat center top;
}

#headerbg {
	position: absolute;
	z-index: -1;
	left: 0;
	top: 0;
	height: 135px;
	width: 100%;
	background: #fff;
}

#topheaderline {
	position: absolute;
	z-index: 0;
	left: 0;
	top: 0;
	height: 30px;
	width: 100%;
	background: #fff url('../images/backgrounds/grain.png') repeat center top;
    border-bottom: 1px dotted #eee;
}


/* ------------------------------------------------------ */
/* HOME PAGE SERVICES
/* ------------------------------------------------------ */


#services {
	float: left;
	position: relative;
	width: 360px;
	height: 540px;
	margin-bottom: 30px;
}

#services ul {
	float: left;
	position: relative;
	width: 360px;
	height: 430px;
	overflow: hidden;
	margin-bottom: 20px;
}

#services ul li {
	float: left;
	width: 360px;
	height: 130px;
	overflow: hidden;
	margin-bottom: 20px;
}

.servicetext {
	float: right;
	width: 160px;
	margin-left: 20px;
    margin-right: 10px;
}

.servicetext span {
	float: left;
	width: 160px;
	margin-top: 0px;
	margin-bottom: 10px;
}

#services h5 {
	margin-bottom: 30px;
    font-weight: bold;
    color: #999;
    text-shadow: 1px 1px 0px #fff;
}

.serviceimage {
	float: left;
	position: relative;
	width: 168px;
	height: 128px;
	border: 1px solid #ddd;
	background: #fff url('<?php echo $bgurl ?>') repeat center top;
}

.serviceimage img {
	margin-left: 9px;
	margin-top: 9px;
}

.verticaldivider {
	float: left;
	width: 9px;
	height: 535px;
	border-left: 1px solid #eee;
	margin-left: 20px;
	padding-right: 30px;
	background: url('../images/backgrounds/sidebargradient_right.png') top left repeat-y;
}

.verticaldividersmall_left {
	float: left;
	width: 0px;
	height: 300px;
	border-right: 1px dotted #444;
	border-left: 1px dotted #050505;
	margin-left: 38px;
	margin-right: 30px;                                                                                                    
}

.verticaldividersmall_right {
	float: left;
	width: 0px;
	height: 300px;
	border-right: 1px dotted #444;
	border-left: 1px dotted #050505;
	margin-left: 8px;
	margin-right: 30px;
}


/* ------------------------------------------------------ */
/* HOME PAGE ABOUT
/* ------------------------------------------------------ */


.about {
	float: left;
	width: 510px;
	height: 180px;
	border-bottom: 1px solid #d3d3d3;
	overflow: hidden;
}

.about h5 {
	margin-bottom: 30px;
    font-weight: bold;
    color: #999;
    text-shadow: 1px 1px 0px #fff;
}

.abouttext {
	float: left;
	width: 510px;
}

.aboutheight {
	border: 0;
	height: 670px;
}

.aboutfull {
	border: 0;
	width: 960px;
	height: 1px;
}


/* ------------------------------------------------------ */
/* HOME PAGE FROM BLOG / FROM PORTFOLIO
/* ------------------------------------------------------ */


.fromblog {
	float: left;
	position: relative;
	width: 250px;
	height: 330px;
	margin-top: 29px;
}

.fromblog ul {
	float: left;
	position: relative;
	width: 250px;
	height: 240px;
}

.fromblog ul li {
	float: left;
	width: 250px;
	height: 60px;
	margin-bottom: 20px;
}

.fromblogtext {
	float: left;
	width: 160px;
    color: #999;
}

.fromblogtext span {
	float: left;
	width: 160px;
	margin-bottom: 0px;
}

.fromblog h5 {
	margin-bottom: 30px;
    font-weight: bold;
    color: #999;
    text-shadow: 1px 1px 0px #fff;
}

.fromblogimage {
	float: left;
	position: relative;
	width: 68px;
	height: 58px;
	border: 1px solid #ddd;
    margin-right: 20px;
	background: #fff url('<?php echo $bgurl ?>') repeat center top;
}

.fromblogimage img {
	margin-left: 9px;
	margin-top: 9px;
}


/* ------------------------------------------------------ */
/* HOME PAGE PARTNERS
/* ------------------------------------------------------ */


#partnerswrap {
	float: left;
	position: relative;
	width: 960px;
	height: 190px;
}

#partnerswrap h5 {
	margin-bottom: 30px;
    font-weight: bold;
    color: #999;
    text-shadow: 1px 1px 0px #fff;
}

.partnerstext {
	float: left;
	width: 250px;
}

#partners { 
	height: 145px; 
	width: 675px; 
	position: relative; 
	float: right;
}

#partners .viewport { 
	float: left; 
	width: 610px; 
	height: 110px; 
	overflow: hidden; 
	position: relative; 
}

#partners .disable { 
	visibility: hidden; 
}

#partners .overview { 
	list-style: none; 
	position: absolute; 
	width: 670px; 
	left: 0 top: 0; 
}

#partners .overview li{ 
	float: left; 
	position: relative; 
	height: 143px; 
	width: 143px;
	border: 1px solid #ddd;
	background: #fff url('<?php echo $bgurl ?>') repeat center top;
	margin-right: 10px;
}

#partners .overview li img{ 
	float: left;
	position: relative; 
	margin-left: 9px;
	margin-top: 9px;
}

#partners .prev {
	margin-right: 10px;
}

#partners .next {
	margin-left: 10px;
}

#partners .buttons {
	float: left;
	width: 18px;
}

#partners .buttons:link, #partners .buttons:visited {
	color: #555;
	text-align: center;
	text-shadow: 1px 1px 0px #fff;
	background: #eee;
    background: -moz-linear-gradient(top, #fff, #eee);
    background: -webkit-gradient(linear, left top, left bottom, from(#ffffff), to(#eeeeee));
    filter: progid:DXImageTransform.Microsoft.Gradient( StartColorStr='#ffffff', EndColorStr='#eeeeee', GradientType=0);
	border: 1px solid #ddd;
	padding-top: 42px;
	padding-bottom: 61px;
	font-size: 10px;
	-moz-box-shadow: 0px 1px 0px #bbb;
	-webkit-box-shadow: 0px 1px 0px #bbb;
	box-shadow: 0px 1px 0px #bbb;
	text-decoration: none;
	height: 10px;
}

#partners .buttons:hover, #partners .buttons:hover {
	color: #fff;
	text-shadow: 1px 1px 0px #000;
	background: <?php echo $primarycolor ?>;
    background: -moz-linear-gradient(top, <?php echo $primarycolor ?>, <?php echo $primarycolor ?>);
    background: -webkit-gradient(linear, left top, left bottom, from(<?php echo $primarycolor ?>), to(<?php echo $primarycolor ?>));
    filter: progid:DXImageTransform.Microsoft.Gradient( StartColorStr='<?php echo $primarycolor ?>', EndColorStr='<?php echo $primarycolor ?>', GradientType=0);
	border: 1px solid #666;
}

.tooltip {
	display:none;
	background: #f5f5f5;
	border: 1px solid #ccc;
	width:200px;
	padding:15px;
	color:#555;	
	-moz-box-shadow: 5px 5px 10px #ddd;
	-webkit-box-shadow: 0px 0px 10px #ddd;
	box-shadow: 0px 5px 10px #ddd;
	-moz-border-radius: <?php echo $rounded ?>; 
	-webkit-border-radius: <?php echo $rounded ?>;
	border-radius: <?php echo $rounded ?>; 
}


/* ------------------------------------------------------ */
/* PAGE CONTENT ELEMENTS */
/* ------------------------------------------------------ */


.content {
	float: left; 
	width: 960px;
	margin-top: 40px;
}

.contentportfolio {
	float: left; 
	width: 990px;
	margin-top: 40px;
}

.twothird_content {
	float: left; 
	width: 610px;
}

.full_text {
	float: left; 
	width: 960px;
}

.twothird_content .full_text {
	float: left; 
	width: 610px;
}

.onehalf_text {
	float: left; 
	width: 460px;
	margin-right: 40px;
}

.onehalf_text_last {
	float: left; 
	width: 460px;
}

.twothird_content .onehalf_text {
	float: left; 
	width: 290px;
	margin-right: 30px;
}

.twothird_content .onehalf_text_last {
	float: left; 
	width: 290px;
}

.onethird_text {
	float: left; 
	width: 300px;
	margin-right: 30px;
}

.onethird_text_last {
	float: left; 
	width: 300px;
}

.onefourth_text {
	float: left; 
	width: 225px;
	margin-right: 20px;
}

.onefourth_text_last {
	float: left; 
	width: 225px;
}

.onefifth_text {
	float: left; 
	width: 176px;
	margin-right: 20px;
}

.onefifth_text_last {
	float: left; 
	width: 176px;
}

.twothird_text {
	float: left; 
	width: 630px;
	margin-right: 30px;
}

.twothird_text_last {
	float: left; 
	width: 630px;
}

.twothird_box_text {
	padding: 20px;
	width: 538px;
}

.onethird_box_text {
	padding: 20px;
	width: 238px;
}

.home_quote {
	float: left;
	width: 400px;
	min-height: 64px;
	color: #777;
	font-style: italic;
	padding-left: 110px;
	background: url("../images/quote.gif") top left no-repeat;
}

.twothird_quote {
	float: left;
	width: 520px;
	min-height: 64px;
	color: #777;
	font-style: italic;
	padding-left: 110px;
	background: url("../images/quote.gif") top left no-repeat;
	margin-right: 30px;
}

.twothird_quote_last {
	float: left;
	width: 520px;
	min-height: 64px;
	color: #777;
	font-style: italic;
	padding-left: 110px;
	background: url("../images/quote.gif") top left no-repeat;
}

.onehalf_quote {
	float: left;
	width: 350px;
	min-height: 64px;
	color: #777;
	font-style: italic;
	padding-left: 110px;
	background: url("../images/quote.gif") top left no-repeat;
	margin-right: 40px;
}

.onehalf_quote_last {
	float: left;
	width: 350px;
	min-height: 64px;
	color: #777;
	font-style: italic;
	padding-left: 110px;
	background: url("../images/quote.gif") top left no-repeat;
}

.twothird_content .onehalf_quote {
	float: left;
	width: 180px;
	min-height: 64px;
	color: #777;
	font-style: italic;
	padding-left: 110px;
	background: url("../images/quote.gif") top left no-repeat;
	margin-right: 30px;
}

.twothird_content .onehalf_quote_last {
	float: left;
	width: 180px;
	min-height: 64px;
	color: #777;
	font-style: italic;
	padding-left: 110px;
	background: url("../images/quote.gif") top left no-repeat;
}

.onethird_quote {
	float: left;
	width: 190px;
	min-height: 64px;
	color: #777;
	font-style: italic;
	padding-left: 110px;
	background: url("../images/quote.gif") top left no-repeat;
	margin-right: 30px;
}

.onethird_quote_last {
	float: left;
	width: 190px;
	min-height: 64px;
	color: #777;
	font-style: italic;
	padding-left: 110px;
	background: url("../images/quote.gif") top left no-repeat;
}

.full_quote {
	float: left;
	width: 850px;
	min-height: 64px;
	color: #777;
	font-style: italic;
	padding-left: 110px;
	background: url("../images/quote.gif") top left no-repeat;
}

.twothird_content .full_quote {
	float: left;
	width: 500px;
	min-height: 64px;
	color: #777;
	font-style: italic;
	padding-left: 110px;
	background: url("../images/quote.gif") top left no-repeat;
}

.boxheadline_light {
	font-size: 17px;
	font-weight: bold;
	text-shadow: 1px 1px 1px #222;
}

.boxheadline_dark {
	font-family: <?php echo $googlefontfamily ?>;
	font-size: 16px;
	font-weight: bold;
	text-shadow: 1px 1px 1px #fff;
	font-weight: normal;
	color: #333;
}

.blogdate {
	color: #777;
	font-weight: bold;
}

.full_box_text {
	float: left;
	background-color: #eee;
	border: 1px solid #ccc;
	padding: 20px;
	width: 878px;
}

.light {
	background-color: #eee;
	border: 1px solid #ccc;
}

.verylight {
	background-color: #f9f9f9;
	border: 1px solid #ccc;
}

.dark {
	color: #ddd;
	background-color: #444;
	border: 1px solid #333;
}

.small_button { 
    outline: 0; 
	line-height: 30px;
	background-color: #ccc;
    padding: 5px 20px 5px 20px;
    height: 30px;
    text-decoration: none !important; 
    cursor: pointer; 
    position: relative;
    text-align: center; 
	border: 1px solid #333;
}

.small_button:hover {  
	background-color: #333;
}

.right {
	float: right;
}

.left {
	float: left;
}

.bold {
	font-weight: bold;
}

p b {
	font-weight: bold;
}


/* ------------------------------------------------------ */
/* PRICING TABLE */
/* ------------------------------------------------------ */


table.pricingtable{
    border-collapse:separate;
	width: 100%;
}
.pricingtable thead th{
    padding:15px;
    color:#555;
	font-family: <?php echo $googlefontfamily ?>;
	font-weight: bold;
	font-size: 13px;
	line-height: 13px;
    text-shadow:1px 1px 1px #fff;	
    background: #eee;
    background: -moz-linear-gradient(top, #fff, #eee);
    background: -webkit-gradient(linear, left top, left bottom, from(#ffffff), to(#eeeeee));
    filter: progid:DXImageTransform.Microsoft.Gradient( StartColorStr='#ffffff', EndColorStr='#eeeeee', GradientType=0);
	border: 1px solid #ddd;
    -webkit-border-top-left-radius:<?php echo $rounded ?>;
    -webkit-border-top-right-radius:<?php echo $rounded ?>;
    -moz-border-radius:<?php echo $rounded ?> <?php echo $rounded ?> 0px 0px;
    border-top-left-radius:<?php echo $rounded ?>;
    border-top-right-radius:<?php echo $rounded ?>;
}
.pricingtable thead th:empty{
    background:transparent;
    border:none;
}
.pricingtable tbody th{
    color:#555;
	font-family: <?php echo $googlefontfamily ?>;
	font-weight: bold;
	font-size: 13px;
	line-height: 13px;
	padding: 15px;
    text-shadow:1px 1px 1px #fff;
    background: #eee;
    background: -moz-linear-gradient(top, #fff, #eee);
    background: -webkit-gradient(linear, left top, left bottom, from(#ffffff), to(#eeeeee));
    filter: progid:DXImageTransform.Microsoft.Gradient( StartColorStr='#ffffff', EndColorStr='#eeeeee', GradientType=0);
	border: 1px solid #ddd;
    -moz-border-radius:<?php echo $rounded ?> 0px 0px <?php echo $rounded ?>;
    -webkit-border-top-left-radius:<?php echo $rounded ?>;
    -webkit-border-bottom-left-radius:<?php echo $rounded ?>;
    border-top-left-radius:<?php echo $rounded ?>;
    border-bottom-left-radius:<?php echo $rounded ?>;
}
.pricingtable tfoot td{
    color: #000;
    font-family: <?php echo $googlefontfamily ?>;
	font-size: 18px;
	line-height: 18px;
    text-align:center;
    padding: 15px;
    text-shadow:1px 1px 1px #fff;
}
.pricingtable tfoot th{
    color:#555;
	font-family: <?php echo $googlefontfamily ?>;
	font-weight: normal;
	font-size: 13px;
	line-height: 13px;
	text-shadow:1px 1px 1px #fff;
}
.pricingtable tbody td{
    padding:10px;
    text-align:center;
    background-color:#eee;
    border: 1px solid #ddd;
    color:#777;
    text-shadow:1px 1px 1px #fff;
}
.pricingtable tbody span.check{
	position: relative;
	float: left;
	width: 16px;
	height: 16px;
	margin-left: -8px;
	margin-bottom: -3px;
	left: 50%;
    background: url('../images/check.png') no-repeat center center;
}
.pricingtable tbody span.no{
	position: relative;
	float: left;
	width: 16px;
	height: 16px;
	margin-left: -8px;
	margin-bottom: -3px;
	left: 50%;
    background: url('../images/remove.png') no-repeat center center;
}


/* ------------------------------------------------------ */
/* CHECKBOX LIST */
/* ------------------------------------------------------ */


ul.checklist {
	float: left;
	margin: 0;
	padding: 0;
}

ul.checklist li {
	list-style-type: none;
	background: url('../images/check.png') no-repeat left center;
	padding-left: 30px;
	margin-bottom: 10px;
	margin-left: -20px;
}


/* ------------------------------------------------------ */
/* BULLET LIST */
/* ------------------------------------------------------ */


ul.bulletlist {
	float: left;
	margin: 0;
	padding: 0;
}

ul.bulletlist li {
	list-style-type: none;
	background: url('../images/bullet.png') no-repeat left center;
	padding-left: 30px;
	margin-bottom: 10px;
	margin-left: -20px;
}


/* ------------------------------------------------------ */
/* CONTENT TABS */
/* ------------------------------------------------------ */


.contenttabs {
	float: left;
}

ul.tabs {  
	margin:0 !important; 
	padding:0;
	height:30px;
	border-bottom:1px solid #ddd;	 	
}

/* single tab */
ul.tabs li {  
	float:left;	 
	padding:0; 
	margin:0;  
	list-style-type:none;	
}

/* link inside the tab. uses a background image */
ul.tabs a { 
	float:left;
	display:block;
	padding:5px 30px;	
	text-decoration:none;
	border:1px solid #ddd;	
	border-bottom:0px;
	height:18px;
	background: #f5f5f5 url('<?php echo $bgurl ?>') repeat center top;
	color:#777;
	margin-right:2px;
	position:relative;
	top:1px;	
	outline:0;
	-moz-border-radius:<?php echo $rounded ?> <?php echo $rounded ?> 0 0;	
    -webkit-border-top-left-radius:<?php echo $rounded ?>;
    -webkit-border-top-right-radius:<?php echo $rounded ?>;
    border-top-left-radius:<?php echo $rounded ?>;
    border-top-right-radius:<?php echo $rounded ?>;
}

ul.tabs a:hover {
	background-color:#F7F7F7;
	color:#333;
}
	
/* selected tab */
ul.tabs a.current {
	background:#f5f5f5;
	border-bottom:1px solid #f5f5f5;	
	color:#000;	
	cursor:default;
}

	
/* tab pane */
.panes div {
	display:none;
	border:1px solid #ddd;
	border-width:0 1px 1px 1px;
	min-height:100px;
	padding:15px 20px;
	background-color:#f5f5f5;	
	-moz-border-radius:0 <?php echo $rounded ?> <?php echo $rounded ?> <?php echo $rounded ?>;	
    -webkit-border-bottom-left-radius:<?php echo $rounded ?>;
    -webkit-border-bottom-right-radius:<?php echo $rounded ?>;
	-webkit-border-top-right-radius:<?php echo $rounded ?>;
    border-bottom-left-radius:<?php echo $rounded ?>;
    border-bottom-right-radius:<?php echo $rounded ?>;
	border-top-right-radius:<?php echo $rounded ?>;
	-moz-box-shadow: 0px 1px 0px #bbb;
	-webkit-box-shadow: 0px 1px 0px #bbb;
	box-shadow: 0px 1px 0px #bbb;
}


/* ------------------------------------------------------ */
/* SUB HEADER BAR */
/* ------------------------------------------------------ */


#pagination {
	position: relative;
	float: left; 
	text-shadow: 1px 1px 0px #000;
	width: 960px;
	height: 42px;
	background: url('../images/backgrounds/footerbg.png') no-repeat center 1px;
	overflow: hidden;
}

#pagination p{
	float: left; 
	padding-top: 11px;
	padding-bottom: 12px;
	color: #fff;
}

#pagination p span {
	color: #ccc;
	font-weight: normal;
	font-size: 14px;
	padding-left: 2px;
	padding-right: 2px;
}

#pagination a:link, #pagination a:visited {
	text-decoration: none;
	color: #aaa; 
}

#pagination a:hover {
	text-decoration: underline;
	cursor: pointer;
	color: <?php echo $secondarycolor ?>;
}


/* ------------------------------------------------------ */
/* SUBHEADER SEARCH */
/* ------------------------------------------------------ */


.subsearch {
	float: right;
	height: 30px;
	margin-top: 9px;
}

.subsearch .searchform {
	height: 24px;
}

.subsearch .searchform input{
	float: left;
	color: #aaa;
	width: 180px;
	font-size: 12px;
	line-height: 16px;
	padding: 4px;
	padding-left: 10px; 
    border: 1px solid #111;
    border-right: 0;
	height: 16px;
	margin-right: 0px;
	background: #111 url('../images/backgrounds/grain.png') repeat center top;;
	text-shadow: 1px 1px 0px #000;
    -webkit-border-top-left-radius:<?php echo $rounded ?>;
    -webkit-border-bottom-left-radius:<?php echo $rounded ?>;
    -moz-border-radius:<?php echo $rounded ?> 0px 0px <?php echo $rounded ?>;
    border-top-left-radius:<?php echo $rounded ?>;
    border-bottom-left-radius:<?php echo $rounded ?>;
    -moz-box-shadow: inset 2px 2px 4px #111;
	-webkit-box-shadow: inset 2px 2px 4px #111;
	box-shadow: inset 2px 2px 4px #111;
}

.subsearch .searchbutton { 
	float: left;
	cursor: pointer;
	width: 30px;
	height: 26px;
	font-size: 12px;
	line-height: 12px;
	color: #fff;
	border:1px solid #111;
    border-left: 0;
	margin:0;
	padding:0;
	outline: none;
	background: url("../images/blog/search.png") #151515 5px 50% no-repeat;
	-webkit-border-top-right-radius:<?php echo $rounded ?>;
    -webkit-border-bottom-right-radius:<?php echo $rounded ?>;
    -moz-border-radius: 0px <?php echo $rounded ?> <?php echo $rounded ?> 0px ;
    border-top-right-radius:<?php echo $rounded ?>;
    border-bottom-right-radius:<?php echo $rounded ?>;
}

.subsearch .searchbutton:hover { 
	background: url("../images/blog/search2.png") #151515 5px 50% no-repeat;
}


/* ------------------------------------------------------ */
/* 3-COLUMN PORTFOLIO */
/* ------------------------------------------------------ */


#portfoliolist3column {
	float: left; 
	width: 100%;
}

.portfolio {
	float: left;
	position: relative;
	width: 300px;
	padding-bottom: 40px;
	padding-right: 30px;
}

.portfolio .noimage h5 {
	margin-left: 0px;
	width: 300px;
}

.portfolio .noimage div.postinfo {
	margin-left: 0px;
	width: 300px;
}

.portfolio .noimage div.editorarea {
	margin-left: 0px;
	width: 300px;
}

.portfolio h5 {
	float: left;
	width: 300px;
	margin-top: 10px;
	margin-bottom: 10px;
	font-weight: normal;
}

.portfolio h5 a {
	color: #333;
	text-decoration: none;
}

.portfolio .postinfo {
	float: left;
	width: 300px;
	color: #999;
	font-weight: normal;
	margin-bottom: 20px;
    line-height: 24px;
}

.portfolio .editorarea {
	float: left;
	width: 300px;
}

.portfolio .blogimage {
	float: left;
	position: relative;
	width: 298px;
	height: 198px;
	border: 1px solid #ddd;
	background: #fff url('<?php echo $bgurl ?>') repeat center top;
}

.portfolio .blogimage img {
	margin-left: 9px;
	margin-top: 9px;
}


/* ------------------------------------------------------ */
/* TEXT STYLES */
/* ------------------------------------------------------ */


.dividerbig {
	width: 960px;
	height: 60px;
	font-family: <?php echo $googlefontfamily ?>;
	font-weight: bold;
	font-size: 23px;
	line-height: 30px;
	background: url('../images/backgrounds/footerbg.png') no-repeat center top;
	overflow: hidden;
	padding-top: 15px;
	color: #eee;
	text-align: center;
	margin-bottom: 27px;
	text-shadow: 1px 1px 0px #000;
}

.dividersmall {
	float: left;
	width: 581px;
}

.dividerline {
	width: 960px;
	float: left;
	height: 1px;
	margin-bottom: 30px;
	border-top: 1px solid #d3d3d3;
}

.dashedline {
	float: left;
	width: 917px;
	height: 17px;	
	margin-top: 40px;
	margin-bottom: 40px;
	background: url('../images/backgrounds/pattern2.gif') repeat scroll -1px -1px;
	border: 1px solid #e5e5e5;
}

.twothird_content .dashedline {
	width: 575px;
	margin: 0;
	padding: 0;
}

.fullwidth {
	width: 960px;
}

.marginbottom0 {
	margin-bottom: 0px;
}

.marginbottom10 {
	margin-bottom: 10px;
}

.marginbottom20 {
	margin-bottom: 20px;
}

.marginbottom30 {
	margin-bottom: 30px;
}

.marginbottom40 {
	margin-bottom: 40px;
}

.marginbottom50 {
	margin-bottom: 50px;
}

.marginbottom60 {
	margin-bottom: 60px;
}

.margintop0 {
	margin-top: 0px;
}

.margintop10 {
	margin-top: 10px;
}

.margintop20 {
	margin-top: 20px;
}

.margintop30 {
	margin-top: 30px;
}

.margintop40 {
	margin-top: 40px;
}

.margintop50 {
	margin-top: 50px;
}

.margintop60 {
	margin-top: 60px;
}

.marginleft {
	margin-left: 20px;
}

.marginleft10 {
	margin-left: 10px;
}

.marginleft40 {
	margin-left: 40px;
}

.marginright {
	margin-right: 20px;
}

.marginright10 {
	margin-right: 10px;
}

.marginright30 {
	margin-right: 30px;
}

.marginright40 {
	margin-right: 40px;
}

.paddingright15 {
	padding-right: 15px;
}

.paddingright100 {
	padding-right: 100px;
}

.sideimage {
	width: 270px;
	padding: 4px;
	border: 1px solid #ccc;
}

.bordered {
	padding: 9px;
	border: 1px solid #ddd;
	background: #fff url('<?php echo $bgurl ?>') repeat center top;
	-moz-border-radius: <?php echo $rounded ?>; 
	-webkit-border-radius: <?php echo $rounded ?>;
	border-radius: <?php echo $rounded ?>; 
}

.comment-reply-link {
	-moz-border-radius: <?php echo $rounded ?>; 
	-webkit-border-radius: <?php echo $rounded ?>;
	border-radius: <?php echo $rounded ?>; 
}

.buttonlight, .buttondark, .comment-reply-link {
	float: left;
	height: 30px;
	line-height: 30px;
}

.buttondark:link, .buttondark:visited {
	color: #eee;
	padding: 0 20px 0 20px;
	text-align: center;
	text-shadow: 1px 1px 0px #000;
	background: url('../images/backgrounds/gradientdark.gif') repeat-x;
	border: 1px solid #111;
	-moz-box-shadow: 0px 1px 0px #222;
	-webkit-box-shadow: 0px 1px 0px #222;
	box-shadow: 0px 1px 0px #222;
	text-decoration: none;
}

.buttondark:hover {
	color: #fff;
	text-shadow: 1px 1px 0px #000;
	background: <?php echo $primarycolor ?>;
	border: 1px solid #000;
	text-decoration: none;
}

.buttonlight:link, .buttonlight:visited, .comment-reply-link:link, .comment-reply-link:visited {
	color: #555;
	padding: 0 20px 0 20px;
	text-align: center;
	text-shadow: 1px 1px 0px #fff;
	background: url('../images/backgrounds/gradientlight.gif') repeat-x;
	border: 1px solid #ddd;
	-moz-box-shadow: 0px 1px 0px #bbb;
	-webkit-box-shadow: 0px 1px 0px #bbb;
	box-shadow: 0px 1px 0px #bbb;
	text-decoration: none;
}

.buttonlight:hover, .comment-reply-link:hover {
	color: #fff;
	text-shadow: 1px 1px 0px #000;
	background: <?php echo $primarycolor ?>;
	border: 1px solid #666;
	text-decoration: none;
}

.readmore {
	float: left;
    width: 100%;
}

.caption_color, .caption_white, .caption_grey{
	float: left;
	font-size: 14px;
	font-weight: bold;
	line-height: 20px;
	margin-left: 15px;
	text-shadow: 1px 1px 1px #000;
}

.caption_white{
	color: #fff;
}

.caption_grey{
	color: #888;
}

.caption_color{
	margin-top: 15px;
	color: #68c3ff;
}

.navfont {
	font-size: 25px;
	line-height: 25px;
}

.footertitle_white, .footertitle_blue {
	float: left;
	font-family: Arial, Helvetica, sans-serif; 
	text-align: left;
	font-size: 30px;
	line-height: 30px;
	padding-top: 10px;
	margin-bottom: 11px;
	text-shadow: 1px 1px 1px #000;
}

.content p {
	/*padding-bottom: 40px;*/
}

h1, h2, h3, h4, h5, h6 {
	color: #333;
	font-family: <?php echo $googlefontfamily ?>;
	font-weight: normal;
}

#nivoSlider h1, #nivoSlider h2, #nivoSlider h3, #nivoSlider h4, #nivoSlider h5, #nivoSlider h6 {
	color: #ffffff;
	font-family: <?php echo $googlefontfamily ?>;
	font-weight: bold;
}

.subheadercaption h1, .subheadercaption h2, .subheadercaption h3, .subheadercaption h4, .subheadercaption h5, .subheadercaption h6 {
	color: #ffffff;
	font-family: <?php echo $googlefontfamily ?>;
	font-weight: bold;
}

h1 {
	text-align: left;
	font-size: <?php echo $h1size ?>;
	line-height: <?php echo $h1size ?>;
	margin-bottom:10px;
}

h2 {
	text-align: left;
	font-size: <?php echo $h2size ?>;
	line-height: <?php echo $h2size ?>;
	margin-bottom:10px;
}

h3 {
	text-align: left;
	font-size: <?php echo $h3size ?>;
	line-height: <?php echo $h3size ?>;
	margin-bottom:10px;
}

h4 {
	text-align: left;
	font-size: <?php echo $h4size ?>;
	line-height: <?php echo $h4size ?>;
	margin-bottom:10px;
}

h5 {
	text-align: left;
	font-size: <?php echo $h5size ?>;
	line-height: 22px;
	margin-bottom:10px;
}

h6 {
	text-align: left;
	font-size: <?php echo $h6size ?>;
	line-height: <?php echo $h6size ?>;
	margin-bottom:10px;
}

.blue {
	color: <?php echo $primarycolor ?>;
}

.grey {
	color: #ccc;
}

.black {
	color: #000;
}

.lightgrey {
	color: #ccc;
}

.lightblue {
	color: #68c3ff;
}

.footertitle_white {
	color: #fff;
}

.footertitle_blue {
	color: #68c3ff;
}

.navfont {
	color: #333;
}

.clear {
	clear:both;
}

.clearfix:after {  /* f�r Firefox, IE8, Opera, Safari, etc. */
    content: ".";  
    display: block;
    height: 0;
    clear: both;
    visibility: hidden;
}
 
* + html .clearfix { /* f�r IE7 */
    display: inline-block;
}
 
* html .clearfix { /* f�r IE6 */
	height: 1%;
}


/* ------------------------------------------------------ */
/* FOOTER */
/* ------------------------------------------------------ */


#footerwrap {
	position: relative;
	z-index: 2;
	margin-top: -400px;
	height: 400px;
	left: 0;
	width: 100%;
	clear:both;
	border-top: 1px solid #fff;
	background: #181818 url('../images/backgrounds/grain.png') repeat center top;
	text-shadow: 1px 1px 0px #000;
	color: #bbb;
}

#footercontainer a:link, #footerwrap a:visited {
	color: <?php echo $secondarycolor ?>; 
}

#footercontainer a:hover {
	color: <?php echo $primarycolor ?>;
}

#footercontainer {
	postion: relative;
	z-index: 3;
	padding-top: 30px;
	background: url('../images/backgrounds/footerbg.png') no-repeat center top;
	height: 300px;
}

#footerbar {
	float: left;
	margin-top: 30px;
	width: 100%;
	height: 39px;
	background-color: #000000;
	text-shadow: 1px 1px 0px #000;
	border-top: 1px solid #1c1c1c;
}

#footerbartext { 
	margin-top: 9px;
	font-size:12px;
	color: #ffffff;
}

#footerbartext a:link, #footerbartext a:visited { 
	color: #ffffff;
}

.textleft { 
	float:left;
	color: #ffffff;
}

.textright { 
	float:right;
	color: #ffffff;
}

.textright a { 
	margin-left: 30px;
	text-decoration: none;
	color: #ffffff;
}

.textright a:visited, .textright a:link {
	color: #ffffff;
}
.textright a:hover {
	color: #ffffff;
}

.tweets {
	float: left;
	width: 280px;
}

.socialcontact {
	float: left;
	width: 280px;
}

.socialcontact h5 {
	float: left;
	width: 260px;
	color: #fff;
	font-family: <?php echo $googlefontfamily ?>;
    font-weight: bold;
	font-size: <?php echo $h5size ?>;
	line-height: 20px;
	margin-top: 20px;
    text-shadow: 1px 1px 0px #000;
}

.socialcontact table {
	float: left;
	margin-top: -7px;
}

.sociallist {
	float: left;
	width: 280px;
	margin-top: 20px;
}

.sociallist li {
	display: inline;
	margin-right: 5px;
}

#contacttags, #contactinfo {
	float: left;
	margin-right: 15px;
}

#contacttags li {
	list-style: none;
}

#contactinfo li {
	list-style: none;
	color: #ccc;
}

#popularposts {
	float: left;
	width: 280px;
	height: 240px;
	padding-left: 30px;
}

.popularbloglist {
	float: left;
}

.popularbloglist li {
	vertical-align:top;
	list-style: none;
	float: left;
	padding-bottom: 10px;
}

.popularbloglist li p {
	float: left;
	padding: 4px;
	border: 1px solid #ccc;
	background-color: #fff;
	margin-right: 20px;
}

.popularbloglist li img{
	cursor: pointer;
	height: 41px;
	float: left;
}

#newsletter h5 {
	margin-top: 0;
	margin-bottom: 30px;
	color: #fff;
	font-weight: normal;
}

.tweetlist {
	float: left;
}

.tweetlist li {
	vertical-align:top;
	list-style: none;
	padding-bottom: 10px;
	padding-left: 40px;
	background: url('../images/tweet.png') top left no-repeat;
}

.tweetlist li p {
	font-weight: bold;
	color: #777;
}


/* ------------------------------------------------------ */
/* PAGE SIDEBAR  */
/* ------------------------------------------------------ */


.sidebar {
	width: 280px;
}

.sidebar.left {
	float: left;
	padding-right: 39px;
	border-right: 1px solid #eee;
	background: url('../images/backgrounds/sidebargradient_left.png') 39px 0 repeat-y;
}

.sidebar.right {
	float: right;
	padding-left: 39px;
	border-left: 1px solid #eee;
	background: url('../images/backgrounds/sidebargradient_right.png') 0 0 repeat-y;
}

.widget {
	float: left;
	margin-bottom: 40px;
}

#footercontainer .widget {
	margin-bottom: 0px;
	width: 280px;
	height: 300px;
	overflow: hidden;
}

.widget .headline {
	float: left;
	width: 260px;
	color: #999;
	font-family: <?php echo $googlefontfamily ?>;
    font-weight: bold;
	font-size: <?php echo $h5size ?>;
	line-height: 20px;
	margin-bottom: 20px;
    text-shadow: 1px 1px 0px #fff;
}

#footercontainer .widget .headline {
	color: #fff;
	width: 280px;
	margin-bottom: 30px;
    text-shadow: 1px 1px 0px #000;
}

.sidebar_box_text {
	float: left;
	padding: 20px;
	width: 218px;
	-moz-box-shadow: 0px 3px 5px #ddd;
	-webkit-box-shadow: 0px 3px 5px #ddd;
	box-shadow: 0px 3px 5px #ddd;
}


/* ------------------------------------------------------ */
/* SIDEBAR MENU */
/* ------------------------------------------------------ */


.sidebarmenu, .sidebarportfoliomenu {
	float: left;
	width: 280px;
}

.sidebarmenu li, .sidebarportfoliomenu li{
	border-top: 1px solid #d3d3d3;
}

.sidebarmenu ul, .sidebarportfoliomenu ul{
	border-bottom: 1px solid #d3d3d3;
}

.sidebarmenu ul ul, .sidebarportfoliomenu ul ul{
	margin-left: 20px;
	border-bottom: 0;
}

.sidebarmenu ul ul ul, .sidebarportfoliomenu ul ul ul{
	margin-left: 40px;
	border-bottom: 0;
}

.sidebarmenu li span{
	float: left;
	width: 16px;
	height: 16px;
	margin-left: 5px;
	margin-right: 5px;
	margin-top: 7px;
	background: url('../images/arrow.png') no-repeat left center;
}

.sidebarportfoliomenu li span{
	float: left;
	width: 16px;
	height: 16px;
	margin-left: 0px;
	margin-right: 5px;
	margin-top: 2px;
	background: url('../images/arrow.png') no-repeat left center;
}

.sidebarmenu li:hover span{
	float: left;
	width: 16px;
	height: 16px;
	margin-left: 5px;
	margin-right: 5px;
	margin-top: 7px;
	background: url('../images/arrow.png') no-repeat left center;
}

.sidebarmenu li a{
	display: block;
	text-decoration: none;
	padding: 5px;
}

.sidebarmenu li a:hover{
	color: #555;
	text-shadow: 1px 1px 0px #fff;
	background: url('../images/backgrounds/gradientlight.gif') repeat-x;
	border: 1px solid #eee;
	padding: 4px;
	text-decoration: none;
	-moz-border-radius: <?php echo $rounded ?>; 
	-webkit-border-radius: <?php echo $rounded ?>;
	border-radius: <?php echo $rounded ?>; 
}

.sidebarmenu li.current-menu-item a{
	color: #fff;
	text-shadow: 1px 1px 0px #000;
	background: <?php echo $primarycolor ?>;
	border: 1px solid #666;
	padding: 4px;
	text-decoration: none;
	-moz-border-radius: <?php echo $rounded ?>; 
	-webkit-border-radius: <?php echo $rounded ?>;
	border-radius: <?php echo $rounded ?>; 
}

.sidebarmenu li.current-menu-item span{
	float: left;
	width: 16px;
	height: 16px;
	margin-left: 5px;
	margin-right: 5px;
	margin-top: 7px;
	background: url('../images/arrow2.png') no-repeat left center;
}

.sidebarmenuselect {
	display: block;
	text-decoration: none;
	padding: 5px;
}

.sidebarmenuselect:link span, .sidebarmenuselect:visited span{
	float: left;
	width: 16px;
	height: 16px;
	margin-left: 0px;
	margin-right: 5px;
	margin-top: 2px;
	background: url('../images/arrow2.png') no-repeat left center;
}

.sidebarmenuselect:hover span{
	float: left;
	width: 16px;
	height: 16px;
	margin-left: 0px;
	margin-right: 5px;
	margin-top: 2px;
	background: url('../images/arrow2.png') no-repeat left center;
}

.sidebarmenuselect:link, .sidebarmenuselect:visited {
	color: #fff;
	text-shadow: 1px 1px 0px #000;
	background: <?php echo $primarycolor ?>;
	border: 1px solid #666;
	padding: 4px;
	text-decoration: none;
	-moz-border-radius: <?php echo $rounded ?>; 
	-webkit-border-radius: <?php echo $rounded ?>;
	border-radius: <?php echo $rounded ?>; 
}

.sidebarmenuselect:hover {
	color: #fff;
	text-shadow: 1px 1px 0px #000;
	background: <?php echo $primarycolor ?>;
	border: 1px solid #666;
}

.sidebarmenuselect_noselect {
	display: block;
	text-decoration: none;
	padding: 5px;
}

.sidebarmenuselect_noselect:link, .sidebarmenuselect_noselect:visited {
	display: block;
	text-decoration: none;
	padding: 5px;
}

.sidebarmenuselect_noselect:hover {
	color: #555;
	text-shadow: 1px 1px 0px #fff;
	background: url('../images/backgrounds/gradientlight.gif') repeat-x;
	border: 1px solid #eee;
	padding: 4px;
	text-decoration: none;
	-moz-border-radius: <?php echo $rounded ?>; 
	-webkit-border-radius: <?php echo $rounded ?>;
	border-radius: <?php echo $rounded ?>; 
}

.sidebarmenuselect_noselect:hover span{
	float: left;
	width: 16px;
	height: 16px;
	margin-left: 0px;
	margin-right: 5px;
	margin-top: 2px;
	background: url('../images/arrow.png') no-repeat left center;
}


/* ------------------------------------------------------ */
/* SIDEBAR BROCHURE */
/* ------------------------------------------------------ */


#brochure {
	float: left;
	width: 280px;
}

#brochure img {
	float: left;
	width: 64px;
}

#brochure p {
	float: left;
	margin-left: 10px;
	width: 200px;
}


/* ------------------------------------------------------ */
/* SIDEBAR SEARCH */
/* ------------------------------------------------------ */


#search {
	float: left;
	height: 30px;
}

#search .searchform {
	height: 28px;
	border: 1px solid #ddd;
}

#search .searchform input{
	float: left;
	color: #777;
	width: 212px;
	font-size: 13px;
	line-height: 16px;
	padding: 6px;
	padding-left: 10px; 
	border:0;
	border-right: 0;
	height: 16px;
	margin-right: 0px;
	-moz-box-shadow: 0px 1px 0px #bbb;
	-webkit-box-shadow: 0px 1px 0px #bbb;
	box-shadow: 0px 1px 0px #bbb;
}

#search .searchbutton { 
	float: left;
	cursor: pointer;
	width: 30px;
	height: 28px;
	font-size: 13px;
	line-height: 13px;
	color: #fff;
	border:0;
	margin:0;
	padding:0;
	outline: none;
	background: url("../images/blog/search.png") #fff 5px 50% no-repeat;
		-moz-box-shadow: 0px 1px 0px #bbb;
	-webkit-box-shadow: 0px 1px 0px #bbb;
	box-shadow: 0px 1px 0px #bbb;
}

#search .searchbutton:hover { 
	background: url("../images/blog/search2.png") <?php echo $primarycolor ?> 5px 50% no-repeat;
}


/* ------------------------------------------------------ */
/* SIDEBAR TINY CAROUSEL */
/* ------------------------------------------------------ */


#sidebarslider { 
	width: 250px;
	height: 184px; 
	overflow:hidden; 
	float: left;
	padding: 4px;
	border: 1px solid #ccc;
	background-color: #fff;
	-moz-box-shadow: 0px 3px 5px #ddd;
	-webkit-box-shadow: 0px 3px 5px #ddd;
	box-shadow: 0px 3px 5px #ddd;
}

#sidebarslider .viewport { 
	float: left; 
	width: 250px; 
	height: 154px; 
	overflow: hidden; 
	position: relative; 
}
#sidebarslider .disable { 
	visibility: hidden; 
}
#sidebarslider .overview { 
	list-style: none; 
	padding: 0; 
	margin: 0;  
	position: absolute; 
	left: 0; 
	top: 0; 
}
#sidebarslider .overview li{ 
	float: left; 
	margin: 0 5px 0 0; 
	height: 150px; 
	width: 250px;
}

#sidebarslider .pager { 
	overflow:hidden; 
	list-style: none; 
	clear: both; 
}
#sidebarslider .pager li { 
	float: left; 
}
#sidebarslider .pagenum { 
	background-color: #fff; 
	text-decoration: none; 
	text-align: center; 
	padding: 5px 10px 5px 10px;
	color: #555; 
	display: block; 
}
#sidebarslider .pagenum:hover { 
	color: #fff; 
	background-color: <?php echo $primarycolor ?>;  
}
#sidebarslider .active { 
	color: #fff; 
	background-color:  #ccc; 
}


/* ------------------------------------------------------ */
/* SIDEBAR SMOOTH TABS */
/* ------------------------------------------------------ */


#sidebartabs{
    width: 250px;
    height: 200px;
    margin: 0 auto;
    overflow: hidden;
	float: left;
	padding: 4px;
	border: 1px solid #ccc;
	background-color: #fff;
	-moz-box-shadow: 0px 3px 5px #ddd;
	-webkit-box-shadow: 0px 3px 5px #ddd;
	box-shadow: 0px 3px 5px #ddd;
}

.smoothTabs ul{
    width: 250px;
    height: 30px;
    list-style: none;
    padding: 0;
	border-bottom: 1px solid #ccc; 
}
.smoothTabs li{
    float: left;
    display: inline;
    padding: 5px 10px 5px 10px;
    color: #444;
    cursor: pointer;
    text-align: center;
}
.smoothTabs li:hover{
    background-color: <?php echo $primarycolor ?>;
    color: #ffffff;
	border-bottom: 1px solid <?php echo $primarycolor ?>; 
}
.smoothTabs div{
    width: 230px;
    padding: 10px;
}
li.smoothTabsLiCurrent{
    background-color:  #ccc; 
    color: #ffffff;
}
.smoothTabsDivHidden {
    display: none;
}
.smoothTabsDivVisible{
    
}


/* ------------------------------------------------------ */
/* SIDEBAR BLOG CATEGORIES */
/* ------------------------------------------------------ */


.blogcategories {
	float: left;
	width: 280px;
}

.blogcategories li{
	padding-bottom: 5px;
	padding-top: 5px;
	border-top: 1px solid #d3d3d3;
}

.blogcategories ul{
	border-bottom: 1px solid #d3d3d3;
}

.blogcategories li span{
	float: left;
	width: 16px;
	height: 16px;
	margin-right: 5px;
	margin-top: 3px;
	background: url('../images/arrow.png') no-repeat left center;
}


/* ------------------------------------------------------ */
/* SIDEBAR BLOG ARCHIVES */
/* ------------------------------------------------------ */


.blogarchives {
	float: left;
	width: 280px;
}

.blogarchives li{
	padding-bottom: 5px;
	padding-top: 5px;
	border-top: 1px solid #d3d3d3;
}

.blogarchives ul{
	border-bottom: 1px solid #d3d3d3;
}

.blogarchives li span{
	float: left;
	width: 16px;
	height: 16px;
	margin-right: 5px;
	margin-top: 3px;
	background: url('../images/arrow.png') no-repeat left center;
}


/* ------------------------------------------------------ */
/* SIDEBAR SOCIAL LINKS */
/* ------------------------------------------------------ */


.sidebarsocial {
	float: left;
	height: 30px;
	padding: 4px;
	border: 1px solid #ccc;
	background-color: #fff;
	-moz-box-shadow: 0px 3px 5px #ddd;
	-webkit-box-shadow: 0px 3px 5px #ddd;
	box-shadow: 0px 3px 5px #ddd;
}

.sidebarsocial li {
	display:inline;
	list-style: none;
}


/* ------------------------------------------------------ */
/* SIDEBAR MINIGALLERY */
/* ------------------------------------------------------ */


#minigal {
	float: left;
	margin-right: -12px;
	margin-bottom: -10px;
}

#minigal li {
	float: left;
	position: relative;
	width: 80px;
	height: 80px;
	border: 1px solid #ddd;
	background: #fff url('<?php echo $bgurl ?>') repeat center top;
	margin-right: 10px;
	margin-bottom: 10px;
}

#minigal img {
	margin-left: 9px;
	margin-top: 9px;
}


/* ------------------------------------------------------ */
/* SIDEBAR ADS 125 x 125 */
/* ------------------------------------------------------ */


.sidebar125 {
	float: left;
	margin-right: -10px;
	margin-bottom: -10px;
}

.sidebar125 li {
	float: left;
	width: 125px;
	height: 125px;
	margin-right: 10px;
	margin-bottom: 10px;
}


/* ------------------------------------------------------ */
/* BLOG */
/* ------------------------------------------------------ */


.blogpost {
	float: left;
	width: 610px;
	margin-bottom: 30px;
	padding-bottom: 40px;
	border-bottom: 1px solid #d3d3d3;
}

.blogpost h5 {
	float: left;
	width: 380px;
	margin-left: 20px;
	margin-top: 0px;
	margin-bottom: 10px;
	font-weight: normal;
}

.blogpostdetail h5 {
	float: left;
	width: 610px;
	margin-bottom: 10px;
	font-weight: normal;
}

.blogpost h5 a {
	color: #333;
	text-decoration: none;
}

.blogpost .postinfo {
	float: left;
	width: 380px;
	color: #999;
	font-weight: normal;
	margin-bottom: 20px;
	margin-left: 20px;
    line-height: 24px;
}

.blogpostdetail .postinfo {
	float: left;
	width: 610px;
	color: #999;
	font-weight: normal;
	margin-bottom: 20px;
    line-height: 24px;
}

.framed a:link, .framed a:visited {
	color: #777;
    line-height: 20px;
	padding-top: 3px;
    padding-bottom: 2px;
    padding-left: 8px;
    padding-right: 8px;
	text-align: center;
	background: #e5e5e5 url('../images/backgrounds/grain.png') repeat center top;;
	text-shadow: 1px 1px 0px #f5f5f5;
    -moz-box-shadow: inset 1px 1px 2px #ccc;
	-webkit-box-shadow: inset 1px 1px 2px #ccc;
	box-shadow: inset 1px 1px 2px #ccc;
	text-decoration: none;
    border: 1px solid #eee;
    -moz-border-radius: <?php echo $rounded ?>; 
	-webkit-border-radius: <?php echo $rounded ?>;
	border-radius: <?php echo $rounded ?>; 
}

.framed a:hover {
	color: #fff;
	text-shadow: 1px 1px 0px #000;
	background: <?php echo $primarycolor ?>;
	border: 1px solid #666;
	text-decoration: none;
    -moz-box-shadow: none;
	-webkit-box-shadow: none;
	box-shadow: none;
}

.blogpost .editorarea {
	float: left;
	width: 380px;
	margin-left: 20px;
}

.blogpostdetail .editorarea {
	float: left;
	width: 610px;
}

.blogpost.noimage h5 {
	margin-left: 0px;
	width: 610px;
}

.blogpost.noimage div.postinfo {
	margin-left: 0px;
	width: 610px;
}

.blogpost.noimage div.editorarea {
	margin-left: 0px;
	width: 610px;
}

.blogpost .buttondark, .blogpost .buttonlight {
	margin-top: 0px;
}

.blogimage {
	float: left;
	position: relative;
	width: 198px;
	height: 198px;
	border: 1px solid #ddd;
	background: #fff url('<?php echo $bgurl ?>') repeat center top;
}

.blogimage img {
	margin-left: 9px;
	margin-top: 9px;
}

.blogpostrelated {
	float: left;
	width: 270px;
	margin-top: 40px;
	margin-bottom: 10px;
}

.blogpostrelated h4, .aboutauthor h4{
	margin:0;
	padding-bottom: 10px;
}

.aboutauthor {
	float: right;
	width: 270px;
	margin-top: 40px;
	margin-bottom: 20px;
}

.aboutauthor img {
	float: left;
	padding: 4px;
	border: 1px solid #ccc;
	background-color: #fff;
	margin-right: 20px;
}


.blogpost p{
	float:left;
	margin: 0;
	padding: 0;
}

.blogpages {
	float:left;
}

.blogpages p{
	float:left;
	padding: 6px 10px 5px 0px;
}

.blogpages ul{
    float: left;
}

.blogpages li {
	display: inline;
	float: left;
	padding-right: 5px;
}

.blogpages li a{
	cursor: pointer;
    float: left;
    display: inline;
	padding: 5px 10px 5px 10px;
	color: #555;
	text-align: center;
	text-shadow: 1px 1px 0px #fff;
	background: #eee;
    background: -moz-linear-gradient(top, #fff, #eee);
    background: -webkit-gradient(linear, left top, left bottom, from(#ffffff), to(#eeeeee));
    filter: progid:DXImageTransform.Microsoft.Gradient( StartColorStr='#ffffff', EndColorStr='#eeeeee', GradientType=0);
	border: 1px solid #ddd;
	-moz-box-shadow: 0px 1px 0px #bbb;
	-webkit-box-shadow: 0px 1px 0px #bbb;
	box-shadow: 0px 1px 0px #bbb;
	text-decoration: none;
}

.blogpages li a:hover{
    color: #fff;
	text-shadow: 1px 1px 0px #000;
	background: <?php echo $primarycolor ?>;
    background: -moz-linear-gradient(top, <?php echo $primarycolor ?>, <?php echo $primarycolor ?>);
    background: -webkit-gradient(linear, left top, left bottom, from(<?php echo $primarycolor ?>), to(<?php echo $primarycolor ?>));
    filter: progid:DXImageTransform.Microsoft.Gradient( StartColorStr='<?php echo $primarycolor ?>', EndColorStr='<?php echo $primarycolor ?>', GradientType=0);
	border: 1px solid #666;
}

.blogpages li .selected {
    color: #fff;
	text-shadow: 1px 1px 0px #000;
	background: <?php echo $primarycolor ?>;
    background: -moz-linear-gradient(top, <?php echo $primarycolor ?>, <?php echo $primarycolor ?>);
    background: -webkit-gradient(linear, left top, left bottom, from(<?php echo $primarycolor ?>), to(<?php echo $primarycolor ?>));
    filter: progid:DXImageTransform.Microsoft.Gradient( StartColorStr='<?php echo $primarycolor ?>', EndColorStr='<?php echo $primarycolor ?>', GradientType=0);
	border: 1px solid #666;
}


/* ------------------------------------------------------ */
/* POST SHARING */
/* ------------------------------------------------------ */


#postsharing {
	float: right;
	height: 78px;
	border: 1px solid #ddd;
	background: #fff;
	-moz-box-shadow: 0px 1px 0px #bbb;
	-webkit-box-shadow: 0px 1px 0px #bbb;
	box-shadow: 0px 1px 0px #bbb;
	margin-bottom: -17px;
}

#facebooklike {
	float: left; 
	margin-top: 9px;
	margin-left: 10px;
}

#twittertweet { 
	float: left; 
	margin-top: 8px;
}

#googleplusone {
	float: left; 
	margin-top: 9px;
	margin-left: 10px;
	margin-right: 10px;
}


/* ------------------------------------------------------ */
/* COMMENTS */
/* ------------------------------------------------------ */


.timestamp {
	color: #999;
	font-style:italic;
}

#comments {
	width: 610px;
	float: left;
	padding-bottom: 0px;
}

#comments ol, #comments ul {
	position: relative;
    list-style: none;
    margin:0;
    padding:0;
	zoom: 1.0;
}

#comments h5{
	margin:0;
	padding-bottom: 30px;
	font-weight: normal;
}

#comments .bypostauthor .commentwrap {
	background: #f5f5f5 url('../images/backgrounds/grain.png') repeat center top;
    border: 1px solid #ccc;
}

#comments .bypostauthor .commentwrap .posterpic{
	border: 1px solid #ddd;
}

#comments .commentwrap {
	float: left;
	padding: 20px;
	width: 568px;
	border: 1px solid #d5d5d5;
	margin-bottom: 20px;
    margin-left: 0;
	text-shadow: 1px 1px 0px #fff;
	background: #fff;
}

#comments .commentwrap .posterpic{
	float: left;
	width: 100px;
	height: 100px;
	border: 1px solid #e5e5e5;
	background: #fff url('<?php echo $bgurl ?>') repeat center top;
	margin-right: 20px;
}

#comments .commentwrap .posterpic img {
	margin-left: 9px;
	margin-top: 9px;
}

#comments .commentwrap .postertext{
	min-height: 70px;
    display: inline-block;
}

#comments .depth-1 .commentwrap{
	width: 568px;
}

#comments .depth-2 .commentwrap{
	width: 518px;
	margin-left: 50px;
}

#comments .depth-3 .commentwrap{
	width: 468px;
	margin-left: 100px;
}

#comments .depth-4 .commentwrap{
	width: 418px;
	margin-left: 150px;
}

#comments .depth-5 .commentwrap{
	width: 368px;
	margin-left: 200px;
}

#comments .depth-1 .commentwrap .postertext{
	width: 438px;
}

#comments .depth-2 .commentwrap .postertext{
	width: 388px;
}

#comments .depth-3 .commentwrap .postertext{
	width: 338px;
}

#comments .depth-4 .commentwrap .postertext{
	width: 288px;
}

#comments .depth-5 .commentwrap .postertext{
	width: 238px;
}

#comments .replylink{
	float: right;
}


/* ------------------------------------------------------ */
/* CONTACT, NEWSLETTER, BLOG REPLY FORMS */
/* ------------------------------------------------------ */


.contactdividerline {
	width: 610px;
	float: left;
	height: 1px;
	margin-bottom: 20px;
	border-top: 1px solid #d3d3d3;
}

#newsletter {
	float: left;
	width: 310px;
	overflow: hidden;
}

#respond, #contactus {
	float: left;
	width: 610px;
	overflow: hidden;
}

#respond {
	padding-top: 20px;
	margin-top: 40px;
	border-top: 1px solid #d3d3d3;
}

#respond h5, #contactus h5{
	margin:0;
	padding-bottom: 30px;
	font-weight: normal;
}

#respond .formpart {
	float: left;
	margin-bottom: 20px;
	margin-right: 29px;
}

#respond .formpart.end {
	float: left;
	margin-bottom: 20px;
	margin-right: 0px;
}

#contactus .formpart {
	float: left;
	margin-bottom: 20px;
	margin-right: 30px;
}

#contactus .formpart.end {
	float: left;
	margin-bottom: 20px;
	margin-right: 0px;
}

#newsletter .formpart {
	float: left;
	margin-bottom: 20px;
	margin-right: 30px;
}

#respond .formpart input {
	color: #000;
	width: 171px;
	font-size: 12px;
	line-height: 16px;
	padding: 6px;
	padding-left: 5px; 
	border: 1px solid #ccc;
}

#contactus .formpart input {
	color: #000;
	width: 278px;
	font-size: 12px;
	line-height: 16px;
	padding: 6px;
	padding-left: 5px; 
	padding-right: 5px; 
	border: 1px solid #ccc;
}

#newsletter .formpart input {
	color: #aaa;
	width: 130px;
	font-size: 12px;
	line-height: 16px;
	padding: 6px;
	padding-left: 5px; 
	padding-right: 5px; 
    border: 1px solid #111;
	height: 16px;
	margin-right: 0px;
	background: #111 url('../images/backgrounds/grain.png') repeat center top;;
	text-shadow: 1px 1px 0px #000;
    -moz-box-shadow: inset 2px 2px 4px #111;
	-webkit-box-shadow: inset 2px 2px 4px #111;
	box-shadow: inset 2px 2px 4px #111;
}
	
#respond .formpart textarea, #contactus .formpart textarea{
	font-family: Arial, Helvetica, sans-serif; 
	font-size: 12px; 
	color: #000;
	overflow: auto;
	width: 608px;
	max-width:598px;
	height: 200px;
	padding: 5px;
	border: 1px solid #ccc;
}

.formpart .errormessage {
	float: left;
	color: #ff0000;
	font-size: 12px;
	line-height: 28px;
	text-decoration: none;
	display: none;
}

.formpart .sendingmessage {
	float: left;
	color: #555;
	font-size: 12px;
	line-height: 28px;
	text-decoration: none;
	display: none;
}

.formpart .successmessage {
	float: left;
	color: <?php echo $primarycolor ?>;
	font-size: 12px;
	line-height: 28px;
	text-decoration: none;
	display: none;
}

#contactus input.formerror, #respond input.formerror{ 
	border: 1px solid #ff0000;
	background-color: #ff8383;
}

#newsletter input.formerror{ 
	border: 1px solid #ff0000;
	background-color: #ff8383;
}

#contactus .formpart textarea.formerror, #respond .formpart textarea.formerror{ 
	border: 1px solid #ff0000;
	background-color: #ff8383;
}

#respond .formpart label span, #contactus .formpart label span, #newsletter .formpart label span {
	font-weight: normal;
	font-style: italic;
	color: #999;
}

#respond p, #contactus p { 
	margin-top: 3px;
	padding-bottom: 0;
}

#newsletter p {
	float: left;
}

#respond label, #contactus label { 
	color: #555;
	font-weight: bold;
	font-size: 12px;
}

#newsletter label {
	padding-left: 20px;
	padding-right: 10px;
	padding-top: 4px;
	float: right;
}

.addreply, .sendmessage{ 
	display: inline-block;
	color: #555;
	width: 200px;
	height: 30px;
	font-size: 12px;
	line-height: 28px;
	padding: 0px 0px 2px;
	text-decoration: none;
	position: relative;
	cursor: pointer;
	border:0;
	text-shadow: 1px 1px 0px #fff;
	background: url('../images/backgrounds/gradientlight.gif') repeat-x;
	-moz-box-shadow: 0px 1px 0px #bbb;
	-webkit-box-shadow: 0px 1px 0px #bbb;
	box-shadow: 0px 1px 0px #bbb;
	text-decoration: none;
	border: 1px solid #ddd;
}
	
.addreply:hover, .sendmessage:hover, .sendnews:hover { 
	color: #fff;
	text-shadow: 1px 1px 0px #000;
	background: <?php echo $primarycolor ?>;
	border: 1px solid #666;
}

.sendnews:hover {
	border: 1px solid #111;
    -moz-box-shadow: none;
	-webkit-box-shadow: none;
	box-shadow: none;
}

.addreply:focus, .sendmessage:focus, .sendnews:focus { 
	outline: none;   
}

.sendnews { 
	display: inline-block;
	color: #fff;
	width: 142px;
	height: 30px;
	font-size: 12px;
	line-height: 28px;
	padding: 0px 0px 3px;
	text-decoration: none;
	position: relative;
	cursor: pointer;
	border: 1px solid #151515;
	/*-moz-box-shadow: 0px 1px 0px #252525;
	-webkit-box-shadow: 0px 1px 0px #252525;
	box-shadow: 0px 1px 0px #252525;*/
	margin-top: 0px;
	text-shadow: 1px 1px 0px #000;
	background: #333 url('../images/backgrounds/grain.png') repeat center top;
    -moz-box-shadow: inset 1px 1px 1px #444;
	-webkit-box-shadow: inset 1px 1px 1px #444;
	box-shadow: inset 1px 1px 1px #444;
}


/* ------------------------------------------------------ */
/* PORTFOLIO FILTER */
/* ------------------------------------------------------ */


.portfoliofilter {
	float: left;  
	width: 960px;
	list-style-type: none; 
	margin-bottom: 40px;
}

.portfoliofilter li { 
	float: left; 
	margin-right: 10px; 
}

.portfoliobutton {
	float: left;
	height: 30px;
	line-height: 30px;
	padding: 0 20px 0 20px;
	-moz-box-shadow: 0px 1px 0px #bbb;
	-webkit-box-shadow: 0px 1px 0px #bbb;
	box-shadow: 0px 1px 0px #bbb;
}

.portfoliobutton:link, .portfoliobutton:visited {
	color: #fff;
	text-shadow: 1px 1px 0px #000;
	background: <?php echo $primarycolor ?>;
	border: 1px solid #666;
	text-decoration: none;
}

.portfoliobutton:hover {
	color: #fff;
	text-shadow: 1px 1px 0px #000;
	background: <?php echo $primarycolor ?>;
	border: 1px solid #666;
	text-decoration: none;
}

.portfoliobutton_noselect {
	float: left;
	height: 30px;
	line-height: 30px;
}

.portfoliobutton_noselect:link, .portfoliobutton_noselect:visited {
	color: #555;
	padding: 0 20px 0 20px;
	text-align: center;
	text-shadow: 1px 1px 0px #fff;
	background: url('../images/backgrounds/gradientlight.gif') repeat-x;
	border: 1px solid #ddd;
	-moz-box-shadow: 0px 1px 0px #bbb;
	-webkit-box-shadow: 0px 1px 0px #bbb;
	box-shadow: 0px 1px 0px #bbb;
	text-decoration: none;
}

.portfoliobutton_noselect:hover {
	color: #fff;
	text-shadow: 1px 1px 0px #000;
	background: <?php echo $primarycolor ?>;
	border: 1px solid #666;
	text-decoration: none;
}


/* ------------------------------------------------------ */
/* CONTACT PAGE */
/* ------------------------------------------------------ */


#contactpage {
	float: left; 
	width: 580px;
}

#contactpage .dashedline {
	width: 575px;
	margin-top: 20px;
	margin-bottom: 40px;
	padding: 0;
}

#googlemaps {
	float: left;
	position: relative;
	border: 1px solid #ddd;
	background: #fff url('<?php echo $bgurl ?>') repeat center top;
	width: 280px;
	height: 420px;
}

#googlemap {
margin-left: 9px;
	margin-top: 9px;
	width: 260px;
	height: 400px;
}

.quickcontact {
	float: left;
	width: 258px;
	border: 1px solid #ccc;
	background-color: #fff;
	-moz-box-shadow: 0px 3px 5px #ddd;
	-webkit-box-shadow: 0px 3px 5px #ddd;
	box-shadow: 0px 3px 5px #ddd;
}

.quickcontact img {
	padding: 4px;
}

.quickcontact div {
	padding: 20px;
	padding-top: 5px;
	padding-bottom: 15px;
}

.quickcontact th, .socialcontact th { 
	text-align: left;
	padding-right: 20px;
	font-weight: bold;
	color: #999;
}



/* EDITOR STYLES */

.editorarea img {
	margin: 0;
}
.editorarea img.size-auto,
.editorarea img.size-large,
.editorarea img.size-full,
.editorarea img.size-medium {
	max-width: 100%;
	height: auto;
}
.editorarea .alignleft,
.editorarea img.alignleft {
	display: inline;
	float: left;
	margin-right: 24px;
	margin-top: 4px;
}
.editorarea .alignright,
.editorarea img.alignright {
	display: inline;
	float: right;
	margin-left: 24px;
	margin-top: 4px;
}
.editorarea .aligncenter,
.editorarea img.aligncenter {
	clear: both;
	display: block;
	margin-left: auto;
	margin-right: auto;
}
.editorarea img.alignleft,
.editorarea img.alignright,
.editorarea img.aligncenter {
	margin-bottom: 12px;
}
.editorarea cite,
.editorarea em,
.editorarea i {
	border: none;
	font-style: italic;
}

.editorarea ul {
	list-style: square;
	margin: 0 0 18px 1.5em;
}
.editorarea ol {
	list-style: decimal;
	margin: 0 0 18px 1.5em;
}
.editorarea ol ol {
	list-style: upper-alpha;
}
.editorarea ol ol ol {
	list-style: lower-roman;
}
.editorarea ol ol ol ol {
	list-style: lower-alpha;
}
.editorarea ul ul,
.editorarea ol ol,
.editorarea ul ol,
.editorarea ol ul {
	margin-bottom: 0;
}
.editorarea p {
	margin-bottom: 20px;
	margin-top: 0;
}
.editorarea div {
	margin-bottom: 40px;
}
.editorarea div div {
	margin-bottom: 0px;
}
.editorarea div div div {
	margin-bottom: 0px;
}
.editorarea div .checklist {
	margin-bottom: 0px;
}
.editorarea div .bulletlist {
	margin-bottom: 0px;
}
.editorarea .contenttabs div {
	margin-bottom: 0px;
}
.editorarea h1, .editorarea h2, .editorarea h3, .editorarea h4, .editorarea h5, .editorarea h6 {
	margin-bottom: 20px;
}
.editorarea strong {
	font-weight: bold;
}
/*.editorarea br {display:none;}


/* EDITOR STYLES END */

#wp-calendar{
float: left;
width: 200px;
}

#wp-calendar caption{
font-size:14px;
padding-bottom: 5px;
}

#wp-calendar th, #wp-calendar td{
text-align:center;
}

#wp-calendar td a{
}
#wp-calendar td{
background:transparent;
}
#wp-calendar td, table#wp-calendar th{
} 
#wp-calendar #prev {
	text-align: left;
}
#wp-calendar #next {
	text-align: right;
}

