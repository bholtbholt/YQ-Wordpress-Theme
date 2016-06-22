<?php get_header();
			if ( have_posts() ) while ( have_posts() ) : the_post();
			$pid = $post->ID; ?>

<article class="page-article" id="<?php the_slug(); ?>">
	<div class="container">
		<div class="row">
			<?php the_content(); ?>
		</div>
	</div>
</article>

<?php endwhile;
			// Get ROI Calculator
			include(locate_template('snippets/roi-calculator.php'));
			// Get Testimonials
			include(locate_template('snippets/testimonials.php'));
			// Get the Middle Call to Action Banner
			include(locate_template('snippets/cta-banner.php'));
get_footer(); ?>