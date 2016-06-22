<?php $position = get_post_meta( $post->ID, 'value_prop_position', true );
      $featured = get_post_meta( $post->ID, 'value_prop_featured', true );
      $graphic = get_post_meta( $post->ID, 'value_prop_graphic', true ); ?>

<p class="meta-box-title">Value Prop Text:</p>
<textarea class="meta-box-textarea" name="content" id="content"><?php echo $post->post_content; ?></textarea>

<p class="meta-box-title radio-group">Position on Page:
  <label><input type="radio" <?php if ($position=="top" || $position=="") {echo "checked ";}?>name="value_prop_position" value="top">Top</label>
  <label><input type="radio"  <?php if ($position=="bottom") {echo "checked ";}?>name="value_prop_position" value="bottom">Bottom</label>
  <label class="featured-checkbox"><input type="checkbox" <?php if ($featured){echo "checked ";}?> name="value_prop_featured" value="featured">Featured Size</label>
</p>

<p class="meta-box-title">Graphic Section: <em>Accepts HTML and overides the Featured Image.</em></p>
<textarea class="meta-box-textarea" name="value_prop_graphic" ><?php echo $graphic ?></textarea>