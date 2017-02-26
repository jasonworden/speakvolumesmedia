<header id="post-header" class="image text-center">
	<div class="hidden"><?php the_post_thumbnail(); ?></div>
	<div id="mask-lace" class="mask"></div>
	<div id="mask-noise" class="mask"></div>
	<div id="billboard">
		<h3 class="billboard-title"><?php the_title(); ?></h3>
		<?php the_excerpt(); ?>
		<?php svPostSharing(); ?>
		<p id="authors">
			<?php svAuthors(); ?>
		</p>
	</div>
	<a id="scroll-down-arrow-link" href="#article">
		<i id="scroll-down-arrow" class="icon-angle-down"></i>
	</a>
</header>
<script>
	var header = document.getElementById('page-header'),
		bg = document.getElementById('post-header'),
		billboard = document.getElementById('billboard'),
		mask = document.getElementById('mask'),
		scrollDownArrow = document.getElementById('scroll-down-arrow');

	resizeHeader();
	document.addEventListener('DOMContentLoaded', resizeHeader, false);
	window.onresize = resizeHeader;
	window.onscroll = resizeHeader;

	function resizeHeader(event) {

		var windowHeight = window.innerHeight,
			headerHeight = header.clientHeight,
			bgHeight = bg.clientHeight,
			billboardHeight = billboard.clientHeight,
			scrollPos = window.scrollY;

		bg.style.minHeight = windowHeight+'px';
		bg.style.paddingTop = headerHeight+"px";

		// var scrollPos = window.scrollY,
	 //  	scrollRatio = scrollPos / window.innerHeight;
		// console.log(scrollPos, window.innerHeight, scrollRatio);
		// if(scrollRatio>1) {
		//   	scrollRatio = 1;
		// }
		// var maskOpacity = 0.9 + scrollRatio*0.1;
		// console.log('opacity:',maskOpacity);
		// //gridMaskElement.style.opacity = maskOpacity;

		var pageHeaderHeight = header.clientHeight,
			breakingPt = bg.clientHeight - pageHeaderHeight;
		if(scrollPos < breakingPt) {
			header.style.top = '0px';
		} else {
			var top = scrollPos - breakingPt;
			header.style.top = '-' + top + 'px';
		}

		//show or hide scroll down arrow
		if(windowHeight <= bgHeight) {
			if(bgHeight-headerHeight-billboardHeight>40) {
				scrollDownArrow.style.display = 'block';
			} else {
				console.log('hididng 1');
				scrollDownArrow.style.display = 'none';
			}
		} else {
			console.log('hididng 2');
			scrollDownArrow.style.display = 'none';
		}
	}


</script>

<div id="article">

	<div class="container body">
		<div class="container-inner">
			<main class="row">
				<div class="col-xs-12 col-md-8 col-lg-7">

					<div class="main-section left-side visible-xs visible-sm">
						<div id="post-meta-mobile" class="post-meta">
							<?php svPrintPostMeta(); ?>
						</div>
					</div>

					<article class="main-section post-body left-side">

						<?php the_content(); ?>

						<p class="text-center">
							<div class="post-social">
								<div class="sharrre facebook-like" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>" data-title="Likes"></div>
								<div class="sharrre twitter-tweet" data-url="<?php the_permalink(); ?>" data-text="<?php the_permalink(); ?>" data-title="Tweets"></div>
								<a class="hidden" id="jump-to-comments-link" href="#comments">
									<div id="jump-to-comments">
										<i class="icon-comments-alt"></i>
									</div>
								</a>
							</div>
						</p>

					</article>

					<?php svPostNav(); ?>

				</div>
				<aside class="col-xs-12 col-md-4 col-lg-5">

					<div id="side-featured-image" class="main-section article-rectangle hidden-xs hidden-sm">
						<div class="image square article-rectangle">
							<div class="hidden"><?php the_post_thumbnail(); ?></div>
						</div>
					</div>
					<div class="main-section hidden-xs hidden-sm">
						<div class="post-meta">
							<?php svPrintPostMeta(); ?>
							<?php svPostSharing(); ?>
						</div>
					</div>

					<div id="ad-pics" class="main-section sidebar-outer">
						<div id="ad-cycle" class="text-center">
							<a target="_blank" href="http://www.sbguitarbar.com/">
								<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/ad/guitarbar.jpg">
							</a>
							<a target="_blank" href="http://www.playbackrecording.com/">
								<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/ad/playback.jpg">
							</a>
						</div>
					</div>

					<div class="main-section sidebar-outer">
						<div id="comments" class="sidebar text-center"></div>
					</div>
					<div class="main-section sidebar-outer">
						<div id="likes" class="sidebar text-center"></div>
					</div>

					<!-- <div class="main-section sidebar-outer">
						<div id="blog-roll" class="sidebar">
							<h1 class="box-header">Friends</h1>
							<a href="http://aspb.as.ucsb.edu/" target="_blank">AS Program Board</a>
							<a href="http://dotheastralplane.com/" target="_blank">The Astral Plane</a>
							<a href="http://www.easyloverecords.com/" target="_blank">EasyLove Records</a>
							<a href="http://freebikevalet.com/" target="_blank">Free Bike Valet</a>
							<a href="http://www.kcsb.org/" target="_blank">KCSB 91.9FM</a>
							<a href="http://wethebeat.com/" target="_blank">We The Beat</a>
						</div>
					</div> -->

					<div class="main-section sidebar-outer">
						<div class="sidebar">
							<h1>Recent Tracks</h1>
							<div id="recent-tracks" class="accordion">
								<?php
									$recentTracks = new WP_Query( 'category_name=tracks' );
									for($j=0; $j<5; $j++) {
									$recentTracks->the_post(); ?>
									<p class="recent-track-title"><?php svShortTitle(); ?></p>
									<div>
										<a class="" href="<?php the_permalink(); ?>">
											<div class="square image">
											    <div class="hidden"><?php the_post_thumbnail(); ?></div>
										    </div>
										</a>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>

				</aside>
				
			</main>
			<div class="clearfix"></div>
		</div>
	</div>
</div>