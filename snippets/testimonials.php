<?php $postmeta = get_post_meta($pid);
      if ($postmeta['testimonials'][0]) :
        $testimonials = array( 'post_type' => 'testimonials', 'posts_per_page' => -1 );
        $tl_loop = new WP_Query( $testimonials ); ?>

<div id="testimonials-carousel" class="carousel slide" data-interval="8000" data-ride="carousel">
  <div class="container">
    <ol class="carousel-indicators">
  <?php $slideCount=0; while ( $tl_loop->have_posts() ) : $tl_loop->the_post();
        echo($slideCount==0? "<li data-target='#testimonials-carousel' data-slide-to='${slideCount}' class='active'></li>" : "<li data-target='#testimonials-carousel' data-slide-to='${slideCount}'></li>");
        $slideCount++; endwhile; ?>
    </ol>
    <div class="carousel-inner">
  <?php $slideCount=0; while ( $tl_loop->have_posts() ) : $tl_loop->the_post();
        $name = get_the_title();
        $title = esc_html( get_post_meta( get_the_ID(), 'testimonial_name_title', true ) );
        echo($slideCount==0? '<div class="item active">' : '<div class="item">'); ?>
          <div class="col-sm-4 vert-align">
            <?php the_post_thumbnail('medium', array('class'=>"img-responsive img-circle")); ?>
          </div>
          <div class="col-sm-8 vert-align">
            <div class="hidden-xs big-quote"></div>
            <p class="testimonial-quote"><?php echo get_the_content(); ?></p>
            <p class="testimonial-name">
              <?php echo "${name} &mdash; <span class='testimonial-title'>${title}</span>"; ?>
            </p>
          </div>
        </div>
  <?php $slideCount++; endwhile; wp_reset_postdata(); ?>
    </div>
  </div><!--close container-->
</div><!--close testimonials-carousel-->

<?php endif; ?>