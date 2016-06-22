<?php get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-sm-8">
			<h1 class="archive-headline">Press Releases</h1>
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<article class="blog-post" id="post-<?php the_ID(); ?>">
					<h2 class="h1 blog-article-title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
					<div class="byline">
						<p><?php _e('Written by '); the_author_posts_link(); _e(' on '); the_time('F j, Y'); _e(' at '); the_time(); _e(' '); edit_post_link('<small>Edit this entry</small>','',''); ?></p>
					</div><!--close byline-->
					<div class="post-content">
						<?php the_excerpt(); ?>
					</div><!--.post-content-->
					<p><?php the_category(', '); the_tags(' | ', ', ', ' '); ?></p>
				</article>
			<?php endwhile;?>
			<?php bootstrap_posts_nav_link(); ?>
		</div><!--col-sm-8-->
		<?php get_sidebar(); ?>
	</div><!--row-->
</div><!--container-->

<?php get_footer(); ?>