<!-- Slide1 -->
	<section class="slide1">
		<div class="wrap-slick1">
			<div class="slick1">
				<?php foreach($slider as $slider) { ?>
				<div class="item-slick1 item1-slick1" style="background-image: url(<?php echo base_url('assets/upload/image/'. $slider->gambar) ?>">

					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
							<?php echo $site->tagline ?>
						</span>

						<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
							<?php echo $site->namaweb ?>
						</h2>

						
					</div>
				</div>
			<?php } ?>
	
			</div>
		</div>
	</section>