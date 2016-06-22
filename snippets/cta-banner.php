<?php $postmeta = get_post_meta($pid);
      if ($postmeta['call_to_action'][0]) : ?>
<section id="call-to-action-banner">
  <div class="container">
	  <div class="row">
		  <div class="col-sm-12 text-center">
			  <h2 class="h1">Try us free for 30 days.</h2>
			  <p class="call-to-action-banner-buttons">
				  <?php echo do_shortcode('[phone_button]') ?>
				  <?php echo do_shortcode('[email_button]') ?>
		  	</p>
		  </div><!-- close col-sm-12 -->
	  </div><!-- close row -->
  </div><!--close container -->
</section><!--close #call-to-action-banner -->
<?php endif; ?>