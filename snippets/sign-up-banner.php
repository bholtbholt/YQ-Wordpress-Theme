<?php $postmeta = get_post_meta($pid);
      if ($postmeta['email_banner'][0]) : ?>
<section id="sign-up-banner">
  <div class="container">
  <h2>Add Youneeq to your site. <span class="light-green">Request a consultation.</span></h2>
  	<form id="sign-up" name="sign-up-banner" class="row">
  		<div class="form-group col-sm-4">
		    <label class="sr-only" for="email-address">Your Email Address</label>
		    <input type="email" class="form-control full-width" id="email-address" placeholder="Your Email Address" required>
		  </div>
  		<div class="form-group col-sm-4">
		    <label class="sr-only" for="page-views">Average Page Views Per Month</label>
		    <input type="text" class="form-control full-width" id="page-views" placeholder="Average Page Views Per Month">
		  </div>
		  <div class="form-group col-sm-4">
			  <button type="submit" class="btn btn-primary full-width">Request a Consultation</button>
			</div>
  	</form>
  </div><!--close container -->
</section><!--close #sign-up-banner -->
<?php endif; ?>