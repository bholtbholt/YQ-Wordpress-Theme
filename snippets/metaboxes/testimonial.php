<?php $name_title = esc_html( get_post_meta( $post->ID, 'testimonial_name_title', true ) ); ?>
<p class="meta-box-title">Testimonial:</p>
<textarea class="meta-box-textarea" name="content" id="content"><?php echo $post->post_content; ?></textarea>
<p class="meta-box-title">Person's Position:</p>
<input type="text" class="meta-box-input full-width" name="testimonial_name_title" value="<?php echo $name_title; ?>" />