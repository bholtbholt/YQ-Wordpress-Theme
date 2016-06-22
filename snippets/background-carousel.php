<?php $images = get_attached_media('image', get_page_by_title('Home')->ID);
	if ($images) :
	// Throw the attached images into an automatic background carousel ?>
	<div id="background-carousel" class="carousel slide carousel-fade" data-interval="12000" data-pause="false" data-ride="carousel">
		<div class="carousel-inner">
			<?php if ($images) : $count=1;
						foreach ($images as $image) : ?>
					<?php echo($count==1? '<div class="item active">' : '<div class="item">'); ?>
						<?php $image_src = wp_get_attachment_image_src($image->ID, 'full'); ?>
						<div class="carousel-bg-image" style="background-image:url('<?php echo $image_src[0]; ?>')"></div>
					</div>
				<?php $count++; endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
<?php else :
	// Add background element so heroMessage doesn't overlap the_content
	echo '<div id="background-carousel"><div class="carousel-bg-image green-bg"></div></div>';
endif; ?>