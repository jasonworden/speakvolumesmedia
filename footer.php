
	<script type="text/javascript">
	/* global script code */

	makeSquare();

	var header = document.getElementById('page-header'),
		navbar = document.getElementById('main-navbar'),
		body =   document.getElementsByTagName("body")[0];

	window.onresize = positionNavbar;
	window.onscroll = positionNavbar;

	function positionNavbar(event) {

		if( window.innerWidth < 768 ) {
			navbar.className = 'navbar navbar-fixed-top';
			header.className = 'page extra-top-margin';
			body.className = 'extra-top-margin';
		} else {
			var scrollPos = window.scrollY,
				breakingPt = header.offsetHeight+24;

			if(scrollPos < breakingPt) {
				navbar.className = 'navbar navbar-below-header';
				header.className = 'page';
				body.className = '';
			} else {
				navbar.className = 'navbar navbar-fixed-top';
				header.className = 'page extra-top-margin';
				body.className = 'extra-top-margin';
			}
		}

	}

	positionNavbar();

	head.ready(function() {

		toggleNavLinkTop();

		$('.image').each(function(){
			var src = $(this).find('img.attachment-post-thumbnail').attr('src');
			$(this).css({
				'background':'rgba(0,0,0,.07) url('+src+') 50% 50% no-repeat',
				'background-size':'cover'
			})
		});
		$('.feat-event-image').each(function(){
			var src = $(this).find('img.attachment-post-thumbnail').attr('src');
			$(this).css({
				'background':'url('+src+') 0 0 repeat',
				'background-size':'contain'
			})
		});

		// $('footer a.social').tooltip();
		// $('header a.social').tooltip({ placement: 'bottom' });
		$('a.social').tooltip({ placement: 'bottom' });

		var $navLinkTop = $('.nav li#nav-link-top');

		function toggleNavLinkTop(){
			if( $(window).width() < 769 ) {
				$('.nav li#nav-link-top').remove();
			} else {
				if( ! $('.nav li#nav-link-top').length ) {
					$('.navbar .nav').append($navLinkTop);
				}
			}
		}

		$(window).on('resize',function() {
			makeSquare();
			toggleNavLinkTop();
		});

		$searchForm = $('#nav-search form');
		$searchInput = $searchForm.find('input');
		$searchForm.hover(function() {
			$searchInput.focus();
			$(this).addClass('active-state');
		});
		$searchInput.blur(function() {
			$searchForm.removeClass('active-state');
		});

		$('#top-scroll-link').smoothScroll();
		// $('#button-top-link').smoothScroll();

	});

	</script>

	<?php wp_footer(); ?>

	<footer class="page">
		<div id="footer-top-container" class="container">
			<div class="container-inner">

				<nav class="categories col-xs-12 col-md-8">
					<div class="cat-inner">
						<div class="group">
							<a class="parent cat-music" href="<?php svCatLink('music') ?>">Music</a>
							<a class="child cat-music" href="<?php svCatLink('mixes') ?>">Mixes</a>
							<a class="child cat-music" href="<?php svCatLink('news') ?>">News</a>
							<a class="child cat-music" href="<?php svCatLink('albums') ?>">Albums</a>
							<a class="child cat-music" href="<?php svCatLink('tracks') ?>">Tracks</a>
							<a class="child cat-music" href="<?php svCatLink('fmm') ?>">FMM</a>
						</div>
						<div class="group">
							<a class="parent cat-features" href="<?php svCatLink('features') ?>">Features</a>
							<a class="child cat-features" href="<?php svCatLink('interviews') ?>">Interviews</a>
							<a class="child cat-features" href="<?php svCatLink('retrospective') ?>">Retro:spective</a>
							<a class="child cat-features" href="<?php svCatLink('columns') ?>">Columns</a>
						</div>
						<div class="group">
							<a class="parent cat-events" href="<?php svCatLink('events') ?>">Events</a>
							<a class="child cat-events" href="<?php svCatLink('previews') ?>">Previews</a>
							<a class="child cat-events" href="<?php svCatLink('reviews') ?>">Reviews</a>
							<a class="child cat-events" href="<?php svCatLink('galleries') ?>">Galleries</a>
						</div>
						<div class="group">
							<a class="parent" href="<?php echo site_url('about-us'); ?>">About Us</a>
							<a class="child" href="<?php echo site_url('about-us#meet-us'); ?>">Meet Us</a>
							<a class="child" href="<?php echo site_url('about-us#contact-us'); ?>">Contact Us</a>
							<!-- <a class="child" href="<?php echo site_url('about-us#join-us'); ?>">Join Us</a> -->
						</div>
					</div>
				</nav>

				<div id="footer-fluff-top" class="footer-fluff col-xs-12 col-md-4 hidden-xs hidden-sm">
					<div class="social-icons-wrapper">
						<div class="social-icons">
							<a class="social" target="_blank" title="FB.com/SpeakVolumesMedia" data-icon="facebook" href="https://www.facebook.com/SpeakVolumesMedia"></a>
							<a class="social" target="_blank" title="@SpkVolumesMedia" data-icon="twitter" href="https://twitter.com/spkvolumesmedia"></a>
							<a class="social" target="_blank" title="soundcloud.com/Speak-Volumes" data-icon="soundcloud" href="https://soundcloud.com/speak-volumes"></a>
							<a class="social" target="_blank" title="instagram: @SpeakVolumesMedia" data-icon="instagram" href="http://instagram.com/speakvolumesmedia"></a>
							<a class="social" target="_blank" title="Subscribe to our posts" data-icon="rss" href="<?php bloginfo('atom_url'); ?>"></a>
						</div>

						<div class="copyright">
							<!-- <a href="#likes-wrapper">
								<span class="likes-link">Like us on Facebook!</span>
							</a> -->
							<span class="copyright-text">&copy; <?php echo date("Y"); ?> Speak Volumes Media.</span>
						</div>
					</div>
				</div>

			</div>
		</div>

		<div id="footer-bottom-container" class="container visible-xs visible-sm">
			<div class="container-inner">

					<div id="footer-fluff-bottom" class="footer-fluff col-md-8">
						<div class="social-icons-wrapper">
							<div class="social-icons">
								<a class="social" target="_blank" title="FB.com/SpeakVolumesMedia" data-icon="facebook" href="https://www.facebook.com/SpeakVolumesMedia"></a>
								<a class="social" target="_blank" title="@SpkVolumesMedia" data-icon="twitter" href="https://twitter.com/spkvolumesmedia"></a>
								<a class="social" target="_blank" title="soundcloud.com/Speak-Volumes" data-icon="soundcloud" href="https://soundcloud.com/speak-volumes"></a>
								<a class="social" target="_blank" title="instagram: @SpeakVolumesMedia" data-icon="instagram" href="http://instagram.com/speakvolumesmedia"></a>
								<a class="social" target="_blank" title="RSS/atom feed of all posts" data-icon="rss" href="<?php bloginfo('atom_url'); ?>"></a>
							</div>

							<div class="copyright">
								<span class="copyright-text visible-xs visible-sm">&copy; 2013-2014 Speak Volumes Media.</span>
							</div>
						</div>
					</div>

			</div>
		</div>

		<div id="bookmark" class="visible-xs shaded">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 text-center">
						<p class="footer-header">
							Add to your Home screen
							<i id="bookmark-arrow" class="icon-double-angle-down footer-block"></i>
						</p>

					</div>
				</div>
			</div>
		</div>

	</footer>

<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-44268315-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
</body>
</html>
