<?php get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-sm-8">	
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>">
					<?php if ( has_post_thumbnail() ) : ?>
						<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
							<?php the_post_thumbnail('large', array('class'=>"img-responsive img-border post-thumbnail")); ?>
						</a>
					<?php endif ;?>
					<h1><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
					<?php if ( 'faqs' != get_post_type() ) :?>
						<div class="byline">
							<p><?php _e('Written by '); the_author_posts_link(); _e(' on '); the_time('F j, Y'); _e(' at '); the_time(); _e(' '); edit_post_link('<small>Edit this entry</small>','',''); ?></p>
						</div><!--close byline-->
					<?php endif ;?>
					<div class="post-content">
						<?php the_content(); ?>
						<?php wp_link_pages('before=<div class="pagination">&after=</div>'); ?>
					</div><!--.post-content-->
					<p><?php the_category(', '); the_tags(' | ', ', ', ' '); ?></p>
				</article>

				<ul class="pager blog-pager">
				  <li class="previous"><?php previous_post_link('%link', '&larr; Older') ?></li>
				  <li class="next"><?php next_post_link('%link', 'Newer &rarr;') ?></li>
				</ul>
				<?php comments_template( '', true ); ?>
			<?php endwhile; // end loop ?>
		</div><!--col-sm-8-->
		<?php get_sidebar(); ?>
	</div><!--row-->
</div><!--container-->

<?php get_footer(); ?>