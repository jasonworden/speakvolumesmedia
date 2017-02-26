</head>
<body>

	<script>
		function makeSquare() {
			var squares = document.getElementsByClassName('square');
			for(i=0,l=squares.length;i<l;i++) {
				squares[i].style.height = squares[i].offsetWidth+'px';
			}
		}
		
		// if( window.innerWidth >= 768 ) {
		// 	WebFontConfig = {
		// 		google: {
		// 			// families: [ 'Anonymous+Pro:400,400italic,700,700italic:latin' ]
		// 			families: [ 'Cousine:400,700,400italic,700italic:latin' ]
		// 		}
		// 	};
		// 	(function() {
		// 		var wf = document.createElement('script');
		// 		wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
		// 			'://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
		// 		wf.type = 'text/javascript';
		// 		wf.async = 'true';
		// 		var s = document.getElementsByTagName('script')[0];
		// 		s.parentNode.insertBefore(wf, s);
		// 	})();
		// }
	</script>

	<div id="top"></div>

	<header id="page-header" class="page">
		<div class="container">
			<div class="container-inner">
				<div class="row">

					<div class="social-icons-wrapper col-xs-12 col-sm-6 text-left">
						<div class="social-icons">
							<a class="social" target="_blank" title="FB.com/SpeakVolumesMedia" data-icon="facebook" href="https://www.facebook.com/SpeakVolumesMedia"></a>
							<a class="social" target="_blank" title="@SpkVolumesMedia" data-icon="twitter" href="https://twitter.com/spkvolumesmedia"></a>
							<a class="social" target="_blank" title="soundcloud.com/Speak-Volumes" data-icon="soundcloud" href="https://soundcloud.com/speak-volumes"></a>
							<a class="social" target="_blank" title="instagram: @SpeakVolumesMedia" data-icon="instagram" href="http://instagram.com/speakvolumesmedia"></a>
							<a class="social" target="_blank" title="Subscribe to our posts" data-icon="rss" href="<?php bloginfo('atom_url'); ?>"></a>
						</div>
					</div>

					<div class="col-xs-12 col-sm-6 text-right hidden-xs">
						<?php if ( !is_home() ) : ?>
						<a id="brand-home-link" href='<?php echo site_url(); ?>'>
						<?php endif; ?>
							<h1 class="brand">
								<span class="speak">Speak</span><span class="volumes">Volumes</span>
								<?php if ( !is_home() ) : ?><i class="icon-home"></i><?php endif; ?>
							</h1>
						<?php if ( !is_home() ) echo '</a>'; ?>
					</div>
				
				</div>
			</div>
		</div>
	</header>

	<nav id="main-navbar" class="navbar navbar-below-header" role="navigation">

		<nav class="navbar-header">
			<button id="menu" type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<i class="icon-reorder"></i>
			</button>
			<div class="visible-xs text-center">
				<h1 class="brand"><img src="<?php echo get_template_directory_uri(); ?>/img/logo-invert.png"><span class="speak">Speak</span><span class="volumes">Volumes</span></h1>
			</div>
			<a class="button-top-link navLink visible-xs" href="#top">
				<button id="button-top" type="button"><i class="icon-double-angle-up"></i></button>
			</a>
		</nav>

		<nav class="navbar-collapse collapse container">
			<div class="container-inner">

				<ul class="nav navbar-nav">

					<li id="nav-link-home-xs" class="light nav-dropdown-wrapper hidden-sm hidden-md hidden-lg">
						<a class="navLink light-navLink" href="<?php echo site_url(); ?>">
							<i class="icon-home"></i>
						</a>
					</li>
					<li id="nav-recent" class="light nav-dropdown-wrapper">
						<a id="nav-recent-link" class="light-navLink navLink" href="<?php echo site_url('category/all'); ?>">Recent</a>
						<div id="recent-dropdown" class="nav-dropdown">
							<?php svDropdownLinks('all') ?>
						</div>
					</li>
					<li id="nav-music" class="nav-cat nav-dropdown-wrapper">
						<a class="navLink" href="<?php echo site_url('category/music'); ?>">Music</a>
						<div id="music-dropdown" class="nav-dropdown">
							<?php svDropdownLinks('music') ?>
						</div>
					</li>
					<li id="nav-features" class="nav-cat nav-dropdown-wrapper">
						<a class="navLink" href="<?php echo site_url('category/features'); ?>">Features</a>
						<div id="features-dropdown" class="nav-dropdown">
							<?php svDropdownLinks('features') ?>
						</div>
					</li>
					<li id="nav-events" class="nav-cat nav-dropdown-wrapper">
						<a class="navLink" href="<?php echo site_url('category/events'); ?>">Events</a>
						<div id="events-dropdown" class="nav-dropdown">
							<?php svDropdownLinks('events') ?>
						</div>
					</li>

					<li id="nav-search" class="sv-search">
						<form role="search" method="get" id="nav-search-form" class="seach-form" action="<?php echo home_url( '/' ); ?>">
							<i class="icon-search"></i></a>
							<input id="search-bar" type="text" name="s" placeholder="Type to search..." autocomplete="off" />
						</form>
					</li>

					<?php if ( !is_home() ) : ?>
					<li id="nav-link-home" class="navbar-right hidden-xs"><a class="navLink" href="<?php echo site_url(); ?>"><i class="icon-home"></i></a></li>
					<?php endif; ?>
					<li id="nav-link-top" class="navbar-right"><a id="top-scroll-link" class="navLink" href="#top"><i class="icon-double-angle-up"></i></a></li>

				</ul>
			
				<div class="clearfix"></div>
				<div id="header-bottom-border"></div>
			</div>
		</nav>

	</nav>

	<div id="header-bottom" class="hidden-xs"></div>

	



