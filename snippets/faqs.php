<div class="row faq-row">
	<div id="faq-answer-box" class="col-sm-8 col-sm-push-4"></div>
	<div id= "faq-question-list" class="col-sm-4 col-sm-pull-8">

		<?php $faqs = array( 'post_type' => 'faqs', 'posts_per_page' => -1 );
					$faqs_loop = new WP_Query( $faqs );
					while ( $faqs_loop->have_posts() ) : $faqs_loop->the_post(); ?>

			<div class="faq-group">
				<h4 class="faq-question"><a><?php the_title(); ?></a></h4>
				<div class="faq-answer">
					<?php the_content(); ?>
				</div>
			</div>

		<?php endwhile; wp_reset_postdata(); //end loop ?>

	</div>
</div><!-- close faq-row-->