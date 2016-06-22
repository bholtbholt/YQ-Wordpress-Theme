<footer id="main-footer">
	<section id="footer-contact">
	  <div class="container">
		  <div class="row">
		  	<div class="col-sm-8 col-md-6">
					<ul class="col-sm-4">
					<li><a href="<?php echo home_url( '/' ) ?>">Home</a></li>
					<li><a href="<?php echo home_url( '/' ) ?>category/news/">News</a></li>
					<li><a href="<?php echo home_url( '/' ) ?>category/press-release/">Press Releases</a></li>
					<li><a href="<?php echo home_url( '/' ) ?>Contact">Contact</a></li>
					</ul>

					<ul class="col-sm-4">
					<li><a href="<?php echo home_url( '/' ) ?>About/#company-story">Company Story</a></li>
					<li><a href="<?php echo home_url( '/' ) ?>About/#the-team">The Team</a></li>
					<li><a href="<?php echo home_url( '/' ) ?>About/#careers">Careers</a></li>
					<li><a href="<?php echo home_url( '/' ) ?>About/#investment-opportunities">Investment Opportunities</a></li>
					</ul>

					<ul class="col-sm-4">
					<li><a href="<?php echo home_url( '/' ) ?>resources/#tab_marketing-collateral">Marketing Collateral</a></li>
					<li><a href="<?php echo home_url( '/' ) ?>resources/#tab_FAQ">FAQ</a></li>
					<li><a href="<?php echo home_url( '/' ) ?>resources/#tab_media-assets">Media Assets</a></li>
					</ul>
				</div>
			  <div class="col-sm-4 col-md-6">
			  	<p>Over <span id="recommendation-counter">1,000,000,000</span> recommendations made to date.</p>
					<p><?php echo get_post_meta( get_page_by_title('Contact')->ID, 'contact_address', true ) ?></p>
					<p><?php echo get_post_meta( get_page_by_title('Contact')->ID, 'contact_phone_number', true ) ?> &emsp; <a class="mailto" data-domain="youneeq.ca" data-prefix="info" ></a></p>
					<?php //echo do_shortcode('[phone_button]') ?>
				  <?php //echo do_shortcode('[email_button]') ?>
			  </div>
		  </div>
	  </div>
	</section>
	<div class="container small">
		<div class="row partner-logos-row">
			<div class="col-sm-12">
				<img src="<?php bloginfo('template_url'); ?>/images/logos/AWS-logo.png" class="partner-logos AWS">
				<img src="<?php bloginfo('template_url'); ?>/images/logos/MS-bizpark-logo.png" class="partner-logos MS-bizpark">
				<img src="<?php bloginfo('template_url'); ?>/images/logos/MS-partner-network-logo.png" class="partner-logos MS-partner">
				<img src="<?php bloginfo('template_url'); ?>/images/logos/MSDN-logo.png" class="partner-logos MSDN">
				<img src="<?php bloginfo('template_url'); ?>/images/logos/Windows-Azure-logo.png" class="partner-logos Windows-Azure">
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 text-center">
				<p class="footer-copyright">&copy; <?php echo date("Y") ?> <a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a>. All Rights Reserved.</p>
				<ul class="footer-links">
					<li><a class="modal-link" data-toggle="modal" data-target="#privacy-modal" data-remote="<?php bloginfo('template_url'); ?>/snippets/modals/privacy-policy.html">Privacy</a></li>
					<li><a class="modal-link" data-toggle="modal" data-target="#terms-modal" data-remote="<?php bloginfo('template_url'); ?>/snippets/modals/terms-and-conditions.html">Terms & Conditions</a></li>
					<li><a href="http://www.brianholt.ca" target="_blank">Site design by Brian Holt</a></li>
				</ul>
			</div>
		</div>
	</div><!--close .container-->
</footer>
<?php wp_footer(); ?>
<div class="modal fade" id="privacy-modal" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    </div>
  </div>
</div>
<div class="modal fade" id="terms-modal" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    </div>
  </div>
</div>
<div class="modal fade" id="sign-in-modal" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    </div>
  </div>
</div>
</body>
</html>