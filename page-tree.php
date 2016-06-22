<?php //Template Name: Page Tree Loader
			get_header();
			include(locate_template('snippets/background-carousel.php'));
			if ( have_posts() ) while ( have_posts() ) : the_post();
			$pid = $post->ID;
			$treePID = $pid; //to load the bottom snippets ?>

<article class="top-page-article" id="<?php the_slug(); ?>-hero-message">
	<div class="container">
		<div class="hero-message col-md-12">
			<?php the_content(); ?>
		</div>
	</div>
</article>

	<?php endwhile;
				include(locate_template('snippets/cta-top-banner.php')); ?>


<?php $page_query = query_posts(array(
				'post_parent' => $pid,
				'orderby' => 'menu_order',
				'order' => 'ASC',
				'post_type' => 'page',
				'posts_per_page' => -1
			));
			if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<?php	$pid = $post->ID;	$postmeta = get_post_meta($pid); ?>
      	
		<article class="page-article" id="<?php the_slug(); ?>">
			<div class="container">
				<h2 class="h1 article-title <?php the_slug(); ?>"><?php the_title(); ?></h2>
				<section>
				<?php the_content(); ?>
				</section>
			</div>
				<?php //endif; ?>
		</article>

<?php endwhile;
			$pid = $treePID;
			// Get ROI Calculator
			include(locate_template('snippets/roi-calculator.php'));
			// Get Testimonials
			include(locate_template('snippets/testimonials.php'));
			// Get the Middle Call to Action Banner
			include(locate_template('snippets/cta-banner.php'));
get_footer(); ?>