<?php
define('ELEGANZA_FUNCTIONS', TEMPLATEPATH . '/functions/template');
define('ELEGANZA_JAVASCRIPT', get_template_directory_uri() . '/js');

/* Core Theme Functionality */
require_once(ELEGANZA_FUNCTIONS . '/theme_fonts.php');
require_once(ELEGANZA_FUNCTIONS . '/theme_support.php');
require_once(ELEGANZA_FUNCTIONS . '/theme_functions.php');
require_once(ELEGANZA_FUNCTIONS . '/theme_pagination.php');
require_once(ELEGANZA_FUNCTIONS . '/theme_breadcrumbs.php');
require_once(ELEGANZA_FUNCTIONS . '/theme_pluginsnotice.php');

/* JavaScripts, Widgets, Sidebars, Shortcodes */
require_once(ELEGANZA_FUNCTIONS . '/theme_javascript.php');
require_once(ELEGANZA_FUNCTIONS . '/theme_widgets.php');
require_once(ELEGANZA_FUNCTIONS . '/theme_sidebars.php');
require_once(ELEGANZA_FUNCTIONS . '/theme_shortcodes.php');

/* Post Comments, Custom Post Types */
require_once(ELEGANZA_FUNCTIONS . '/theme_post_comments.php');
require_once(ELEGANZA_FUNCTIONS . '/theme_post_customtypes.php');

/* Page Options */
require_once(ELEGANZA_FUNCTIONS . '/theme_page_options.php');
?>