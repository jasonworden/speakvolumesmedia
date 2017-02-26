<?php if( needsBillboardHeader() ): ?>

<div id="billboard" class="billboard-container billboard-header container">
	<div class="container-inner">
		<section id="bb-post-header" class="bb">
			<?php svBillboardPost(null,null,false) ?>
		</section>
	</div>
</div>

<?php endif; ?>


<div id="article">

	<div class="container article-container main-container<?php svColorClass() ?>">
		<div class="container-inner">
			<main class="">
				<div class="body-left-column col-xs-12 col-md-8 col-lg-7">

					<div id="post-meta-mobile-wrapper" class="main-section left-side visible-xs visible-sm<?php if(!needsBillboardHeader()) echo ' border' ?>">
						<div id="post-meta-mobile" class="post-meta">

							<?php if( !needsBillboardHeader() ): ?>
								<div class="feat-image-right image square">
									<div class="hidden"><?php the_post_thumbnail(); ?></div>
								</div>
							<?php endif; ?>

							<?php if ( svGetCategoryColor() == 'post-cat-features' ): ?>
								<p class="mobile-short hidden-sm"><em><?php echo get_the_excerpt() ?></em></p>
							<?php else: ?>
								<p class="mobile-short"><em><?php echo get_the_excerpt() ?></em></p>
							<?php endif; ?>

							<?php if( !needsBillboardHeader() ): ?>
								<h1 class="header">
									<?php svTrackOrAlbumTitle($the_post); ?>
								</h1>
								<hr class="zig-zag thin">
								<div class="feat-image-xxs image square">
									<div class="hidden"><?php the_post_thumbnail(); ?></div>
								</div>
							<?php endif; ?>

							<?php svPrintPostMeta(); ?>
						</div>
					</div>

					<article class="main-section post-body left-side<?php svColorClass() ?>">

						<?php if( !needsBillboardHeader() ): ?>
						<h1 class="kool track-album-header hidden-xs hidden-sm">
							<?php svTrackOrAlbumTitle($the_post); ?>
						</h1>
						<?php endif; ?>

						<?php if ( svGetCategoryColor() != 'post-cat-features' ): ?>
							<p class="excerpt short hidden-xs hidden-sm"><em><?php echo get_the_excerpt() ?></em></p>
							<!-- <hr class="zig-zag hidden-xs hidden-sm"> -->
						<?php endif; ?>

						<?php
							//svEventPreviewInfo();
							svFacebookRSVPLink(true);
							the_content();
							svFmmTracks(); //only prints fmm tracks if it is an fmm
							svFacebookRSVPLink();
						?>

						<p>
							<?php svPostSharing(true); ?>
						</p>

					</article>

					<?php svPostNav(); ?>

				</div>
				<aside class="col-xs-12 col-md-4 col-lg-5">

					<?php if( !needsBillboardHeader() ): ?>
					<div id="side-featured-image" class="main-section side-box hidden-xs hidden-sm">
						<div class="image square">
							<div class="hidden"><?php the_post_thumbnail(); ?></div>
						</div>
					</div>
					<?php endif; ?>

					<div class="main-section side-box hidden-xs hidden-sm">
						<div id="post-meta-desktop" class="post-meta">
							<?php svPrintPostMeta(); ?>
							<?php svPostSharing(); ?>
						</div>
					</div>

					<div class="side-box-wrapper left">
						<div id="ad-pics" class="main-section side-box hidden">
							<div id="ad-cycle" class="cycle text-center">
								<a target="_blank" href="http://www.sbguitarbar.com/">
									<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/ad/guitarbar.jpg">
								</a>
								<a target="_blank" href="http://www.playbackrecording.com/">
									<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/ad/playback.jpg">
								</a>
							</div>
						</div>
					</div>

					<div class="side-box-wrapper right hidden">
						<div id="tracks" class="main-section side-box">
							<div class="side-box-inner clearfix">
								<h1>Recent Tracks</h1>

								<div id="tracks-cycle" class="cycle">
									<?php
										$recentTracks = new WP_Query( 'category_name=tracks' );
										for($j=0; $j<4; $j++) {
										$recentTracks->the_post(); ?>
											<a class="track-slide" href="<?php the_permalink(); ?>">

												<div class="track-artwork square image">
												    <div class="hidden"><?php the_post_thumbnail(); ?></div>
											    </div>
											    <h5 class="track-info track-artist">
													<?php echo get_field('artistName') ?>
												</h5>
												<h6 class="track-info track-title">
													"<?php echo get_field('workName') ?>"
												</h6>
											
											</a>
									<?php } ?>
								</div>
							</div>

							<a href="#" class="cycle-arrow tracks-arrow prev">
			                    <i class="icon-caret-left"></i>
			                </a>
			                <a href="#" class="cycle-arrow tracks-arrow next">
			                    <i class="icon-caret-right"></i>
			                </a>

						</div>
					</div>

					<div class="side-box-wrapper left">
						<div id="comments-wrapper" class="main-section side-box">
							<div id="comments" class="side-box-inner text-center"></div>
						</div>
					</div>

					
					<div class="side-box-wrapper right">
						<div id="likes-wrapper" class="main-section side-box">
							<div id="likes" class="side-box-inner text-center"></div>
						</div>
					</div>

				</aside>
				
			</main>
			<div class="clearfix"></div>
		</div>
	</div>
</div>