<?php get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-sm-8">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<article class="blog-post" id="post-<?php the_ID(); ?>">
					<?php if ( has_post_thumbnail() ) : ?>
						<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
							<?php the_post_thumbnail('large', array('class'=>"img-responsive img-border post-thumbnail")); ?>
						</a>
					<?php endif ;?>
					<h2 class="h1 blog-article-title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
					<div class="byline">
						<p><?php _e('Written by '); the_author_posts_link(); _e(' on '); the_time('F j, Y'); _e(' at '); the_time(); _e(' '); edit_post_link('<small>Edit this entry</small>','',''); ?></p>
					</div><!--close byline-->
					<div class="post-content">
						<?php the_excerpt(); ?>
					</div><!--.post-content-->
					<p><?php the_category(', '); the_tags(' | ', ', ', ' '); ?></p>
				</article>
				<?php endwhile; else: ?>
					<div id="error-404" class="container text-center text-shadow">
						<h1 class="padded-headline">404, man. Sorry about that.</h1>
						<p class="lead half-width">
							It looks like something's missing here. Or maybe that something didn't exist at all. Honestly, It's tough to tell.</p>
						<p class="lead half-width">Why don't you try searching for it?</p>
						<?php get_search_form(); ?>
					</div>
				<?php endif; ?>
				<?php bootstrap_posts_nav_link(); ?>
		</div><!--col-sm-8-->
		<?php get_sidebar(); ?>
	</div><!--row-->
</div><!--container-->

<?php get_footer(); ?>