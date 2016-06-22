<?php get_header();
			include(locate_template('snippets/background-carousel.php')); ?>

<article class="top-page-article" id="error-404">
	<div class="container">
		<div class="hero-message col-md-9 col-lg-8">
			<h1>This isn't the page you're looking for. Move along.</h1>
			<h2>404 errors are a pain.</h2>
			<p class="lead">We're not sure what you were looking for, but why don't you try searching for it?</p>
			<?php get_search_form(); ?>
		</div>
	</div>
</article>

<?php get_footer(); ?>