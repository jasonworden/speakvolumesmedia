<?php
	get_header('home');
?>


<?php
	// $featuredPosts = new WP_Query( array('meta_key' => 'featured_0_if_featured', 'meta_value' => 1) );
	$featuredPosts = new WP_Query( 'posts_per_page=-1' );
?>









<div class="container home-container">
	<div class="row">

		<!-- <section id="feat-section" class="front-page-column col-xs-12">
			<?php $featuredPosts->the_post(); ?>
			<a class="carousel-slide-link feat-mix" href="<?php the_permalink(); ?>">
				<div class="section-inner main feat-section-inner">
					<div class="image feat-image">
						<div class="hidden"><?php the_post_thumbnail(); ?></div>
						<div class="color-squares-wrapper">
							<div class="color-square top-right"></div>
							<div class="color-square bottom-right"></div>
							<div class="color-square top-left"></div>
							<div class="color-square bottom-left"></div>
							<div class="color-square mid-left"></div>

							<div class="color-square left-one"></div>
							<div class="color-square left-two"></div>
						</div>
					</div>

					<div class="text-block">
						<div class="text-block-inner">
							<h2 class="category-header">SVMIX#05</h2>
							<h3 class="post-title">Machinedrum</h3>
						</div>
					</div>

					<div class="clearfix"></div>
				</div>
			</a>

		</section> -->

		<section id="feat-section" class="front-page-column col-xs-12">
			<?php $featuredPosts->the_post(); ?>
			<a class="carousel-slide-link feat-rs" href="<?php the_permalink(); ?>">
				<div class="section-inner main feat-section-inner">
					<div class="image feat-image">
						<div class="hidden"><?php the_post_thumbnail(); ?></div>
						<div class="color-triangle"></div>
					</div>
					<div class="color-block"></div>

					<div class="text-block">
						<h2 class="category-header">Retro:spective</h2>
						<h3 class="post-title"><?php svShortTitle(); ?></h3>
					</div>
					<h4 class="feat-excerpt"><?php echo get_the_excerpt(); ?></h4>

					<div class="clearfix"></div>
				</div>
			</a>
		</section>

	<!-- 	<section id="feat-section" class="front-page-column col-xs-12">
			<?php $featuredPosts->the_post(); ?>
			<a class="carousel-slide-link feat-twtw" href="<?php the_permalink(); ?>">
				<div class="section-inner main feat-section-inner">
					<div class="image feat-image">
						<div class="hidden"><?php the_post_thumbnail(); ?></div>
						<div class="color-triangle"></div>
					</div>

					<div class="text-block">
						<div class="text-block-inner">
							<h2 class="category-header">The Week That Was</h2>
							<h3 class="post-title"><?php svShortTitle(); ?></h3>
						</div>
					</div>

					<div class="clearfix"></div>
				</div>
			</a>

		</section>
 -->
		<div id="carousel-controls" class="text-center">
			<div id="carousel-controls-inner" class="main">
				<div id="left-border-triangle" class="border-triangle"></div>
				<div class="carousel-control-button">
					<i class="icon-caret-left icon-fixed-width"></i>
				</div>
				<div class="buttons-wrapper">
					<?php for($k=0; $k<4; $k++) { ?>
					<div class="carousel-control-button">
						<i class="icon-circle icon-fixed-width"></i>
					</div>
					<?php } ?>
				</div>
				<div class="carousel-control-button">
					<i class="icon-caret-right icon-fixed-width"></i>
				</div>

				<div id="right-border-triangle" class="border-triangle"></div>
			</div>
		</div>

	</div>
</div>




<!-- 
		<section id="feat-section" class="front-page-column col-xs-12">
			<?php $featuredPosts->the_post(); ?>
			<a class="carousel-slide-link feat-rs" href="<?php the_permalink(); ?>">
				<div class="section-inner main feat-section-inner">
					<div class="image feat-image">
						<div class="hidden"><?php the_post_thumbnail(); ?></div>
						<div class="color-triangle"></div>
					</div>
					<div class="color-block"></div>

					<div class="text-block">
						<h2 class="category-header">Retro:spective</h2>
						<h3 class="post-title"><?php svShortTitle(); ?></h3>
					</div>
					<h4 class="feat-excerpt"><?php echo get_the_excerpt(); ?></h4>

					<div class="clearfix"></div>
				</div>
			</a>
		</section>

		<section id="feat-section" class="front-page-column col-xs-12">
			<?php $featuredPosts->the_post(); ?>
			<a class="carousel-slide-link feat-twtw" href="<?php the_permalink(); ?>">
				<div class="section-inner main feat-section-inner">
					<div class="image feat-image">
						<div class="hidden"><?php the_post_thumbnail(); ?></div>
						<div class="color-triangle"></div>
					</div>

					<div class="text-block">
						<div class="text-block-inner">
							<h2 class="category-header">The Week That Was</h2>
							<h3 class="post-title"><?php svShortTitle(); ?></h3>
						</div>
					</div>

					<div class="clearfix"></div>
				</div>
			</a>

		</section> -->




<div class="container home-container">
	<div class="row">
		<?php for($k=0; $k<3; $k++) { ?>
		<div class="front-page-column col-xs-12 col-sm-6 col-md-4">
			<?php for($i=0; $i<2; $i++) { ?>
			<section class="front-page-section text-center">
				<?php
					svSectionTitle("Retro:spective",
						"We examine the career trajectory of a particular artist–usually on the same day when they’ve dropped their newest album."
					);
				?>
				<div class="clearfix"></div>
				<div class="section-inner main">

					<?php $featuredPosts->the_post(); ?>
					<a class="prominent-post-link article-square" href="<?php the_permalink(); ?>">
						<div class="square image">
						    <div class="hidden"><?php the_post_thumbnail(); ?></div>
					    </div>
						<h3 class="prominent-post-title"><?php svShortTitle(); ?></h3>
						<h4 class="description prominent-post"><?php echo get_the_excerpt(); ?></h4>
					</a>
					

					<div class="ellipsis-separator">
						<i class="icon-ellipsis-horizontal"></i>
					</div>
					<div class="recent-posts">
					<?php for($j=0; $j<3; $j++) { ?>
						<?php $featuredPosts->the_post(); ?>
						<a href="<?php the_permalink(); ?>" class="small-post-link">
							<h5 class="small-post-title"><?php svShortTitle(); ?></h5>
						</a>
					<?php } ?>
					</div>
					<a href="#">
						<h6 class="more-recent-posts">More Recent Posts</h6>
					</a>
				</div>
			</section>
			<?php } ?>
		</div>
		<?php } ?>
	</div>
</div>








<script type="text/javascript">

head.ready(function() {

	//immediate action:
	featuredCycle();

	//action on resize:
	$(window).on('resize', function() {
		$('#featCarousel').cycle('stop');
		featuredCycle();
	});

	$('body').scrollspy({
		target: 'nav.navbar-collapse',
		offset: -200
	});

	$('h2.section-header').tooltip({ placement: 'bottom' });

	function featuredCycle() {
		$('#featCarousel').cycle({
			slides: 'div.carousel-inner',
			delay: 1700,
			timeout: 9000,
			speed: 1200,
			fx: 'scrollVert',
			pauseOnHover: true
		});
	}

});

</script>

<?php get_footer(); ?>