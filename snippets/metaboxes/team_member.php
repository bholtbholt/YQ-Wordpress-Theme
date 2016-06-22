<?php $name_title = esc_html( get_post_meta( $post->ID, 'team_member_name_title', true ) ); ?>
<p class="meta-box-title">Biography:</p>
<textarea class="meta-box-textarea tall" name="content" id="content"><?php echo $post->post_content; ?></textarea>
<p class="meta-box-title">Team Member's Position:</p>
<input type="text" class="meta-box-input full-width" name="team_member_name_title" value="<?php echo $name_title; ?>" />