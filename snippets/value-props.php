<?php $postmeta = get_post_meta($pid);
      $vp_loop = new WP_Query( $value_props );
      $post_count=0; //start a post counter so we know if we're on even or odd
      $box_count=0; //start a counter for the props with no images ?>

<section id="value-props-<?php echo $value_prop_div_id ?>">
  <div class="container">

<?php while ( $vp_loop->have_posts() ) : $vp_loop->the_post(); ?>

<?php $featured = get_post_meta( $post->ID, 'value_prop_featured', true );
      $graphic = get_post_meta( $post->ID, 'value_prop_graphic', true );

      if ($featured) :
        $push_direction = $post_count % 2? '' : 'col-sm-push-6';
        $pull_direction = $post_count % 2? '' : 'col-sm-pull-6';
        $post_count++; ?>

        <div class="row value-prop-feature">
          <div id="value-prop-image-<? echo $post_count ?>"class="vert-expand value-prop-image vert-expand col-sm-6 <? echo $push_direction ?>">
            <?php echo ($graphic) ? $graphic : the_post_thumbnail('medium', array('class'=>"img-responsive")); ?>
          </div><!-- close value-prop-image -->         
          <div class="value-prop-text vert-expand col-sm-6 <? echo $pull_direction ?>">
            <h2 class="h1 value-prop-title"><?php the_title(); ?></h2>
            <p class="lead"><?php echo get_the_content(); ?></p>
          </div><!--close value-prop-text -->
        </div><!-- close value-prop-feature-row -->
<?php else : ?>
        <?php $box_count++; if ($box_count%3==1) {echo '<div class="row value-prop-box-row">';}; ?>
          <!--<a href="#">-->
            <div class="col-md-4">
              <div class= "value-prop-box">
                <?php echo ($graphic) ? $graphic : the_post_thumbnail('medium', array('class'=>"img-responsive")); ?>
                <h3 class="value-prop-title"><?php the_title(); ?></h3>
                <p><?php echo get_the_content(); ?></p>
              </div>
            </div>
          <!--</a>-->
        <?php if ($box_count%3==0) {echo '</div>';}; ?>
<?php endif; ?>

<?php endwhile; wp_reset_postdata(); ?>
  </div>
</section>