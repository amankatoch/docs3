<?php
/* ------------------------------------- */
/* BREADCRUMBS by Dimox: http://dimox.net/wordpress-breadcrumbs-without-a-plugin/ */
/* ------------------------------------- */

function dimox_breadcrumbs() {

  if ( function_exists( 'get_option_tree') ) {
	  $defaultnewspage = get_option_tree( 'page_newsoverview'); 
	  $defaultservicespage = get_option_tree( 'page_servicesoverview'); 
	  $defaultportfoliopage = get_option_tree( 'page_portfoliooverview'); 
  }

  $delimiter = '<span>&raquo;</span>';
  $home = 'Home'; // text for the 'Home' link
  $before = ''; // tag before the current crumb
  $after = ''; // tag after the current crumb
 
  if ( !is_front_page() || is_paged() ) {
 
    echo '<p>';
 
    global $post;
    $homeLink = get_bloginfo('url');
    echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
 
    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
 
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after;
 
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('F') . $after;
 
    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;
 
    } elseif ( is_single() && !is_attachment() && get_post_type() != 'newsentry' && get_post_type() != 'servicesentry' && get_post_type() != 'portfolioentry' ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        echo $before . get_the_title() . $after;
      }
 
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
      echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && !$post->post_parent ) {
      echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
      echo $before . get_the_title() . $after;
 
    } elseif ( is_search() ) {
      echo $before . 'Search results for "' . get_search_query() . '"' . $after;
 
    } elseif ( is_tag() ) {
      echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . 'Articles posted by ' . $userdata->display_name . $after;
 
    } elseif ( is_404() ) {
      echo $before . 'Error 404' . $after;
    } elseif ( is_home() ) {
      echo $before . wp_title("") . $after;
    } elseif ( get_post_type() == 'newsentry' ) {
	  $replstring = $defaultnewspage; 
 	  $repl = ucwords(preg_replace("/[^a-zA-Z0-9\s]/", " ", $replstring));
	  echo $before . '<a href="' . $homeLink . '/' . $defaultnewspage . '">' . $repl . '</a>' . $after . ' ' . $delimiter . ' ';
	  echo $before . get_the_title() . $after;
	} elseif ( get_post_type() == 'servicesentry' ) {
      $replstring = $defaultservicespage; 
 	  $repl = ucwords(preg_replace("/[^a-zA-Z0-9\s]/", " ", $replstring));
	  echo $before . '<a href="' . $homeLink . '/' . $defaultservicespage . '">' . $repl . '</a>' . $after . ' ' . $delimiter . ' ';
	  echo $before . get_the_title() . $after;
	} elseif ( get_post_type() == 'portfolioentry' ) {
	  $replstring = $defaultportfoliopage; 
 	  $repl = ucwords(preg_replace("/[^a-zA-Z0-9\s]/", " ", $replstring));
	  echo $before . '<a href="' . $homeLink . '/' . $defaultportfoliopage . '">' . $repl . '</a>' . $after . ' ' . $delimiter . ' ';
	  echo $before . get_the_title() . $after;
	}
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __(' Page') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
 
    echo '</p>';
 
  }
}
?>