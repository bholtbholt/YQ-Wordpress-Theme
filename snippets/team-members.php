<?php $team_members = array( 'post_type' => 'team_members', 'posts_per_page' => -1 );
      $team_members_loop = new WP_Query( $team_members );
      $member_count = 0;
      while ( $team_members_loop->have_posts() ) : $team_members_loop->the_post();
      $name = get_the_title();
      $pid = get_the_id();
      $position = esc_html( get_post_meta( $pid, 'team_member_name_title', true ) ); ?>

    <?php $member_count++; if ($member_count%2==1) {echo '<div class="row team-member-row">';}; ?>
    
      <div class="col-sm-2">
        <?php the_post_thumbnail('medium', array('class'=>"img-responsive img-circle")); ?>
      </div>
      <div class="col-sm-4">
        <div class= "team-member">
          <h3 class="team-member-name"><?php the_title(); ?>, <span class="team-member-title"><?php echo $position; ?></span></h3>
          <?php the_content(); ?>
        </div>
      </div>
    
    <?php if ($member_count%2==0) {echo '</div>';}; ?>


<?php endwhile; wp_reset_postdata(); //end loop ?>