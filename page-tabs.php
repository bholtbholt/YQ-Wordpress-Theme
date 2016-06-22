<?php //Template Name: Page Tabs
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

<?php endwhile;
			include(locate_template('snippets/cta-top-banner.php'));
			$page_query = query_posts(array(
				'post_parent' => $pid,
				'orderby' => 'menu_order',
				'order' => 'ASC',
				'post_type' => 'page',
				'posts_per_page' => -1
			)); ?>

<div class="container">
	<ul class="nav nav-tabs" id="Tabs">
<?php $tabCount=0; if ( have_posts() ) while ( have_posts() ) : the_post();
			$tabCount++; echo($tabCount==1? '<li class="active">' : '<li>'); ?>
		<a href="#<?php the_slug(); ?>" data-toggle="tab"><?php the_title(); ?></a></li>
<?php endwhile; ?>
	</ul>

	<div class="tab-content">
<?php $tabCount=0; if ( have_posts() ) while ( have_posts() ) : the_post();
			$tabCount++; echo($tabCount==1? '<article class="tab-pane fade in active" id="'.the_slug(false).'">' : '<article class="tab-pane fade" id="'.the_slug(false).'">'); ?>
			<h2 class="h1 tab-title"><span><?php the_title(); ?></span></h2>
			<?php the_content(); ?>
		</article>
<?php endwhile; wp_reset_postdata(); ?>

	</div><!-- close tab-content -->
</div><!--close container-->

<?php // Get ROI Calculator
			include(locate_template('snippets/roi-calculator.php'));
			// Get Testimonials
			include(locate_template('snippets/testimonials.php'));
			// Get the Middle Call to Action Banner
			include(locate_template('snippets/cta-banner.php'));
get_footer(); ?>