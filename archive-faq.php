<?php
 
/**
* Template Name: FAQ Archives
* Description: Used as a page template to show page contents, followed by a loop through a CPT archive
*/
 
remove_action ('genesis_loop', 'genesis_do_loop'); // Remove the standard loop
add_action( 'genesis_loop', 'custom_do_grid_loop' ); // Add custom loop


function custom_do_grid_loop() {
// Intro Text (from page content)
echo '<div class="page hentry entry">';
echo '<h1 class="entry-title">Frequently Asked Questions</h1>';
echo '<div class="entry-content">' ;
 
$args = array(
'post_type' => 'FAQ', // enter your custom post type
'orderby' => 'menu_order',
'order' => 'ASC',
'posts_per_page'=> '12', // overrides posts per page in theme settings
);
$loop = new WP_Query( $args );
if( $loop->have_posts() ):
while( $loop->have_posts() ): $loop->the_post(); global $post;
 
echo '<div id="FAQ">';
echo '<div class="one-fourth first">';
echo '<div class="quote-obtuse"><div class="pic">'. get_the_post_thumbnail( $id, array(150,150) ).'</div></div>';
echo '</div>';	
echo '<div class="three-fourths" style="border-bottom:1px solid #DDD;">';
echo '<h3><a href="'. get_permalink(). '">' . get_the_title() .'</a></h3>';
echo '<p>' . get_the_excerpt() . '</p>';	
echo '<a href="'. get_permalink(). '" title="'. get_the_title(). '">Read More</a>';
echo '</div>';
echo '</div>';
endwhile;
endif;
// Outro Text (hard coded)
echo '</div><!-- end .entry-content -->';
echo '</div><!-- end .page .hentry .entry -->';
}
/** Remove Post Info */
remove_action('genesis_entry_header','genesis_post_info');
remove_action('genesis_entry_footer','genesis_post_meta');


/** add my own sidebar 
function moving_tips_sidebar() {
    get_sidebar( 'FAQ_sidebar' );
}
*/
remove_action( 'genesis_after_content', 'genesis_get_sidebar' );
add_action('genesis_after_content', 'FAQ_sidebar');

genesis();