<?php //Template Name: Page w/ empty top feature
			get_header();
			include(locate_template('snippets/background-carousel.php'));
			if ( have_posts() ) while ( have_posts() ) : the_post();
			$pid = $post->ID; ?>
<div class="top-page-article"> </div>
<?php include(locate_template('snippets/cta-top-banner.php')); ?>
<article class="article margin-top" id="<?php the_slug(); ?>">
	<div class="container">
		<?php the_content(); ?>
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