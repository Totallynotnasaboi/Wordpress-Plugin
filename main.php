<?php
/**
 * Plugin name: TEST-NASA-BOI
 * Description: My hands-on test to making a wordpress plugin.
 * Author: Francesco Silvani
 * Version: 0.1
*/

// Remove the admin bar from the front end
add_filter( 'show_admin_bar', '__return_false' );

// Page paginations
global $wp_query;
$total = $wp_query->max_num_pages;
// only bother with the rest if we have more than 1 page!
if ( $total > 1 )  {
     // get the current page
     if ( !$current_page = get_query_var('paged') )
          $current_page = 1;
     // structure of "format" depends on whether we're using pretty permalinks
     $format = empty( get_option('permalink_structure') ) ? '&page=%#%' : 'page/%#%/';
     echo paginate_links(array(
          'base' => get_pagenum_link(1) . '%_%',
          'format' => $format,
          'current' => $current_page,
          'total' => $total,
          'mid_size' => 4,
          'type' => 'list'
     ));
}

?>