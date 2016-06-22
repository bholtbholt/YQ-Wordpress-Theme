<?php //Template Name: Tour Page w/ Top Feature
			get_header();
			include(locate_template('snippets/background-carousel.php'));
			if ( have_posts() ) while ( have_posts() ) : the_post();
			$pid = $post->ID; ?>

<article class="top-page-article" id="<?php the_slug(); ?>-hero-message">
	<div class="container">
		<div class="hero-message col-md-12">
			<?php the_content(); ?>
		</div>
	</div>
</article>

<?php endwhile; wp_reset_postdata(); 

// Include Page Meta Check-boxes //////////////////////////////

// Get Call to Action Banner
include(locate_template('snippets/cta-top-banner.php'));

// Get Top Featured Value Props
$value_props = array( 'post_type' => 'value_props', 'posts_per_page' => -1, 'meta_query' => array(
													array('key' => 'value_prop_position','value' => 'top'),
													array('key' => 'value_prop_featured','value' => 'featured')));
$value_prop_div_id = 'top-featured';
include(locate_template('snippets/value-props.php'));

// Get ROI Calculator
include(locate_template('snippets/roi-calculator.php'));

// Get Top un-featured Value Props
$value_props = array( 'post_type' => 'value_props', 'posts_per_page' => -1, 'meta_query' => array(
													array('key' => 'value_prop_position','value' => 'top'),
													array('key' => 'value_prop_featured','value' => 0)));
$value_prop_div_id = 'top';
include(locate_template('snippets/value-props.php'));

// Get the Middle Call to Action Banner
include(locate_template('snippets/cta-banner.php'));

// Get Testimonials
include(locate_template('snippets/testimonials.php'));

// Get Bottom Featured Value Props
$value_props = array( 'post_type' => 'value_props', 'posts_per_page' => -1, 'meta_query' => array(
													array('key' => 'value_prop_position','value' => 'bottom'),
													array('key' => 'value_prop_featured','value' => 'featured')));
$value_prop_div_id = 'bottom-featured';
include(locate_template('snippets/value-props.php'));

// Get Bottom un-featured Value Props
$value_props = array( 'post_type' => 'value_props', 'posts_per_page' => -1, 'meta_query' => array(
													array('key' => 'value_prop_position','value' => 'bottom'),
													array('key' => 'value_prop_featured','value' => 0)));
$value_prop_div_id = 'bottom';
include(locate_template('snippets/value-props.php'));

get_footer(); ?>