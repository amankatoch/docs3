<?php
header("Content-Type: text/javascript; charset=utf-8");

$absolute_path = __FILE__;
$path_to_file = explode( 'wp-content', $absolute_path );
$path_to_wp = $path_to_file[0];
require_once( $path_to_wp.'/wp-load.php' );

$templateurl = get_bloginfo('template_url');

if ( function_exists( 'get_option_tree') ) {
	/* NIVO SLIDER */
	$nivoslidereffect = get_option_tree( 'nivoslider_home_effect');
	$nivosliderslices = get_option_tree( 'nivoslider_home_slices');
	$nivosliderboxcols = get_option_tree( 'nivoslider_home_boxcols');
	$nivosliderboxrows = get_option_tree( 'nivoslider_home_boxrows');
	$nivoslideranimspeed = get_option_tree( 'nivoslider_home_animspeed');
	$nivosliderpausetime = get_option_tree( 'nivoslider_home_pausetime');
	
	/* PARTNERS CAROUSEL */
	$partnersinterval = get_option_tree( 'partners_home_interval');
	
	/* GOOGLE MAPS */
	$gmapslat = get_option_tree( 'googlemaps_lat');
	$gmapslong = get_option_tree( 'googlemaps_long');
	$gmapszoomdefault = get_option_tree( 'googlemaps_defaultzoom');
	$gmapszoomclick = get_option_tree( 'googlemaps_clickzoom');
	$gmapstitle = get_option_tree( 'googlemaps_title');
	
	/* SOCIAL SHARING BUTTONS */
	$sharefacebook = get_option_tree( 'share_facebook'); 
	$sharetwitter = get_option_tree( 'share_twitter'); 
	$sharegoogle = get_option_tree( 'share_google'); 
}   
?>

var $ = jQuery.noConflict();

$(document).ready(function() {		
				      
	/* Hover image opacity */
	$("a[rel^='fadeimg'] img").hover(function() {
		$(this).stop().fadeTo("fast", 0.5); 
	},function(){
		$(this).stop().fadeTo("fast", 1.0); 
	});
	
	/* Menu */
	ddsmoothmenu.init({
		mainmenuid: "smoothmenu1", //menu DIV id
		orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
		classname: 'ddsmoothmenu', //class added to menu's outer DIV
		contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
	});
			
	/* Partners Carousel */
	if($('#partners').length != 0){
		$('#partners').tinycarousel({ display: 4, interval: true, intervaltime: <?php echo $partnersinterval ?>, duration: 1000});
	}
	
	/* Partners Tooltip */
	$('.overview img[title]').tooltip({opacity: 1, effect: 'toggle', delay: 0});
	
	/* Content Tabs */
	$("ul.tabs").tabs("div.panes > div");
	
	/* Pricing Table Alternate Row Color */
	$('.pricingtable td:odd').css({background: '#e5e5e5'});
	
	/* Contact Form */
	if($('#contactform').length != 0){
		addForm('#contactform');
	}
	
	/* Newsletter Subscription */
	if($('#newsletterform').length != 0){
		addForm('#newsletterform');
	}
	
	/* Blog Comments */
	if($('#replyform').length != 0){
		addForm('#replyform');
	}
	
	/* Blog & Portfolio Social Sharing */
    <?php if ($sharefacebook == 'Show'){ ?>
		addFacebook();
    <?php } ?>
    <?php if ($sharetwitter == 'Show'){ ?>
		addTwitter();
    <?php } ?>
    <?php if ($sharegoogle == 'Show'){ ?>
    	addGoogleplus();
    <?php } ?>
	
	/* PrettyPhoto */
	addPrettyPhoto();
	
	/* Portfolio Quicksand */
	addPortfolio('1');
	addPortfolio('3');
	
});

$(window).load(function() {

	/* Nivo Slider */
	if($('#nivoSlider').length != 0){
		$('#nivoSlider').nivoSlider({
			effect:'<?php echo $nivoslidereffect ?>', // Specify sets like: 'fold,fade,sliceDown'
			slices:<?php echo $nivosliderslices ?>, // For slice animations
			boxCols:<?php echo $nivosliderboxcols ?>, // For box animations
			boxRows:<?php echo $nivosliderboxrows ?>, // For box animations
			animSpeed:<?php echo $nivoslideranimspeed ?>, // Slide transition speed
			pauseTime:<?php echo $nivosliderpausetime ?>, // How long each slide will show
			startSlide:0, // Set starting Slide (0 index)
			directionNav:false, // Next & Prev navigation
			directionNavHide:true, // Only show on hover
			controlNav:true, // 1,2,3... navigation
			controlNavThumbs:false, // Use thumbnails for Control Nav
			controlNavThumbsFromRel:false, // Use image rel for thumbs
			controlNavThumbsSearch: '.jpg', // Replace this with...
			controlNavThumbsReplace: '_thumb.jpg', // ...this in thumb Image src
			keyboardNav:true, // Use left & right arrows
			pauseOnHover:true, // Stop animation while hovering
			manualAdvance:false, // Force manual transitions
			captionOpacity:1, // Universal caption opacity
			prevText: '&larr;', // Prev directionNav text
			nextText: '&rarr;', // Next directionNav text
			beforeChange: function(){}, // Triggers before a slide transition
			afterChange: function(){}, // Triggers after a slide transition
			slideshowEnd: function(){}, // Triggers after all slides have been shown
			lastSlide: function(){}, // Triggers when last slide is shown
			afterLoad: function(){} // Triggers when slider has loaded
		});
	}
	
	/* Google Maps */
	loadGoogleMaps();
});


/* Linkify and Relative Time functions by Ralph Whitbeck http://ralphwhitbeck.com/2007/11/20/PullingTwitterUpdatesWithJSONAnd$.aspx */
String.prototype.linkify = function() {
        return this.replace(/[A-Za-z]+:\/\/[A-Za-z0-9-_]+\.[A-Za-z0-9-_:%&\?\/.=]+/, function(m) {
                return m.link(m);
        });
};

function relative_time(time_value) {
  var values = time_value.split(" ");
  time_value = values[1] + " " + values[2] + ", " + values[5] + " " + values[3];
  var parsed_date = Date.parse(time_value);
  var relative_to = (arguments.length > 1) ? arguments[1] : new Date();
  var delta = parseInt((relative_to.getTime() - parsed_date) / 1000);
  delta = delta + (relative_to.getTimezoneOffset() * 60);

  var r = '';
  if (delta < 60) {
        r = 'a minute ago';
  } else if(delta < 120) {
        r = 'couple of minutes ago';
  } else if(delta < (45*60)) {
        r = (parseInt(delta / 60)).toString() + ' minutes ago';
  } else if(delta < (90*60)) {
        r = 'an hour ago';
  } else if(delta < (24*60*60)) {
        r = '' + (parseInt(delta / 3600)).toString() + ' hours ago';
  } else if(delta < (48*60*60)) {
        r = '1 day ago';
  } else {
        r = (parseInt(delta / 86400)).toString() + ' days ago';
  }
  
  return r;
}

function addPrettyPhoto() {
	/* PrettyPhoto init */
	$("a[rel^='prettyPhoto']").prettyPhoto({
		overlay_gallery: false,
		show_title: false,
		hideflash: true
	});
	
	/* PrettyPhoto hover image opacity */
	$("a[rel^='prettyPhoto'] img").hover(function() {
		$(this).stop().fadeTo("fast", 0.5); 
	},function(){
		$(this).stop().fadeTo("fast", 1.0); 
	});	
}

function addGoogleplus() {
	/* Google Plus One */
	if($('#googleplusone').length != 0){
        $("#googleplusone").append('<g:plusone size="tall"></g:plusone>'); 
		var gpscript = document.createElement('script'); 
		gpscript.type = 'text/javascript'; 
		gpscript.src = 'https://apis.google.com/js/plusone.js'; 
		document.getElementsByTagName('head')[0].appendChild(gpscript);
	}
}

function addFacebook() {
	/* Facebook */
	if($('#facebooklike').length != 0){
		window.fbAsyncInit = function() { 
			$("#facebooklike").append('<fb:like href="" layout="box_count" show_faces="false" width="55"></fb:like>'); 
		};
		var fbscript = document.createElement('script'); 
		fbscript.type = 'text/javascript'; 
		fbscript.src = 'http://connect.facebook.net/en_US/all.js#xfbml=1'; 
		document.getElementsByTagName('head')[0].appendChild(fbscript);
	}
}

function addTwitter() {
	/* Twitter */
	if($('#twittertweet').length != 0){
		$("#twittertweet").append('<a href="http://twitter.com/share" class="twitter-share-button" data-url="#" data-text="Notorious Creative Portfolio Template" data-count="vertical">Tweet</a>'); 
		var twscript = document.createElement('script'); 
		twscript.type = 'text/javascript'; 
		twscript.src = 'http://platform.twitter.com/widgets.js'; 
		document.getElementsByTagName('head')[0].appendChild(twscript);
	}
}

function initGoogleMaps() {
	/* Google Maps Init */
	var myLatlng = new google.maps.LatLng(<?php echo $gmapslat ?>, <?php echo $gmapslong ?>);
	var myOptions = {
		zoom: <?php echo $gmapszoomdefault ?>,
		center: myLatlng,
		popup: true,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	}
	var map = new google.maps.Map(document.getElementById("googlemap"), myOptions);
	
	var marker = new google.maps.Marker({
		position: myLatlng, 
		map: map,
		title: "<?php echo $gmapstitle ?>"
	});
	google.maps.event.addListener(marker, 'click', function() {
		map.setZoom(<?php echo $gmapszoomclick ?>);
	});
}
  
function loadGoogleMaps() {
	/* Google Maps Load */
	if($('#googlemap').length != 0){
		var script = document.createElement("script");
		script.type = "text/javascript";
		script.src = "http://maps.google.com/maps/api/js?sensor=false&callback=initGoogleMaps";
		document.body.appendChild(script);
	}
}

function addPortfolio(portfolioid) {
	/* Portfolio Quicksand */
	var $list = $('#portfoliolist'+portfolioid+'column');
	
	if($($list).length != 0){
		
		var $data = $list.clone();
		
		if(portfolioid==1){
			
			$('.portfoliofilter_sidebar li').click(function(e) {
		
				$(".portfoliofilter_sidebar li a").addClass("sidebarmenuselect_noselect");
				$(".portfoliofilter_sidebar li a").removeClass("sidebarmenuselect");	
				$(this).children('a').removeClass("sidebarmenuselect_noselect");
				$(this).children('a').addClass("sidebarmenuselect");
		
                var filterVal = $(this).children('a').text().toLowerCase().split(' ').join('-'); 
		
				if (filterVal == 'all') {
					var $filteredData = $data.find('.blogpost');
				} else {
					var $filteredData = $data.find('.blogpost[data-type~=' + filterVal + ']');
				}
				
				$($list).quicksand($filteredData, {
					duration: 500,
					easing: 'swing',
					adjustHeight: 'dynamic',
					enhancement: function() {
						
					}
				}, function(){
					addPrettyPhoto();
				});
				
				return false;
			});
			
		}else{
	
			$('.portfoliofilter li').click(function(e) {
		
				$(".portfoliofilter li a").addClass("portfoliobutton_noselect");
				$(".portfoliofilter li a").removeClass("portfoliobutton");	
				$(this).children('a').removeClass("portfoliobutton_noselect");
				$(this).children('a').addClass("portfoliobutton");
		
                var filterVal = $(this).children('a').text().toLowerCase().split(' ').join('-'); 
		
				if (filterVal == 'all') {
					var $filteredData = $data.find('.portfolio');
				} else {
					var $filteredData = $data.find('.portfolio[data-type~=' + filterVal + ']');
				}
				
				$($list).quicksand($filteredData, {
					duration: 500,
					easing: 'swing',
					adjustHeight: 'dynamic',
					enhancement: function() {
						
					}
				}, function(){
					addPrettyPhoto();
				});
				
				return false;
			});
		
		}
	}
}

/* Contact Form */
function addForm(formtype) {

	var formid = $(formtype);
	var emailsend = false;
	
	formid.find("button[name=send]").click(sendemail);
	
	function validator() {
		
		var emailcheck = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
		var othercheck = /.{4}/;
		var noerror = true;
		
		formid.find(".requiredfield").each(function () {
													 
			var fieldname = $(this).attr('name');
			var value = $(this).val();

			if(fieldname == "email"){
				if (!emailcheck.test(value)) {
					$(this).addClass("formerror");
					noerror = false;
				} else {
					$(this).removeClass("formerror");
				}	
			}else{
				if (!othercheck.test(value)) {
					$(this).addClass("formerror");
					noerror = false;
				} else {
					$(this).removeClass("formerror");
				}	
			}
		})
		
		if(!noerror){
			formid.find(".errormessage").fadeIn();
		}
		
		return noerror;
	}
	
	function resetform() {
		formid.find("input").each(function () {
			$(this).val("");	
		})
		formid.find("textarea").val("");
		emailsend = false;
	}
	
	function sendemail() {
		formid.find(".successmessage").hide();
		var phpfile = "";
		if(formtype=="#contactform"){
			phpfile = "<?php bloginfo('template_url'); ?>/forms/contactsend.php";
		}else if(formtype=="#newsletterform"){
			phpfile = "<?php bloginfo('template_url'); ?>/forms/newslettersend.php";
		}else{
			phpfile = "";
		}

		if (validator()) {
			if(!emailsend){
				emailsend = true;
				formid.find(".errormessage").hide();
				formid.find(".sendingmessage").show();
				$.post(phpfile, formid.serialize(), function() {
					formid.find(".sendingmessage").hide();
					formid.find(".successmessage").fadeIn();
					resetform();
				});
			}
		} 
		return false
	}
}