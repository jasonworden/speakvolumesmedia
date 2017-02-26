</head>
<body>

	<script>
		function makeSquare() {
			var squares = document.getElementsByClassName('square');
			for(i=0,l=squares.length;i<l;i++) {
				squares[i].style.height = squares[i].offsetWidth+'px';
			}
		}
	</script>

	<div id="top"></div>

	<header id="page-header" class="page">
		<div class="container">
			<div class="container-inner">
				<div class="row">

					<div class="social-icons-wrapper col-xs-12 col-sm-8 col-md-8 text-left">
						<div class="social-icons">
							<a class="social" target="_blank" title="FB.com/SpeakVolumesMedia" data-icon="facebook" href="https://www.facebook.com/SpeakVolumesMedia"></a>
							<a class="social" target="_blank" title="@SpkVolumesMedia" data-icon="twitter" href="https://twitter.com/spkvolumesmedia"></a>
							<a class="social" target="_blank" title="soundcloud.com/Speak-Volumes" data-icon="soundcloud" href="https://soundcloud.com/speak-volumes"></a>
							<a class="social" target="_blank" title="instagram: @SpeakVolumesMedia" data-icon="instagram" href="http://instagram.com/speakvolumesmedia"></a>
							<a class="social" target="_blank" title="RSS/atom feed of all posts" data-icon="rss" href="<?php bloginfo('atom_url'); ?>"></a>
						</div>
					</div>

					<div class="col-xs-12 col-sm-4 col-md-4 text-right hidden-xs">
						<?php if ( !is_home() ) : ?>
						<a href='<?php echo site_url(); ?>'>
						<?php endif; ?>
							<!-- <div id="main-logo"></div> -->
							<h1 class="brand"><span class="speak">Speak</span><span class="volumes">Volumes</span></h1>
						<?php if ( !is_home() ) echo '</a>'; ?>
					</div>
					
					<div class="clearfix"></div>
					<div class="col-xs-12 visible-xs text-center">
						<div id="header-search">
				    		<form role="search" method="get" id="results-form" action="<?php echo home_url( '/' ); ?>">
							    <div>
							        <input type="text" name="s" placeholder="Search SV..." /><!--
							        --><button type="submit" id="searchsubmit"><i class="icon-search"></i></button>
							    </div>
							</form>
				    	</div>
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
			<a class="navLink visible-xs" href="#top">
				<button id="button-top" type="button"><i class="icon-arrow-up"></i></button>
			</a>
		</nav>

		<nav class="navbar-collapse collapse container">
			<div class="container-inner">

				<ul class="nav navbar-nav">
				<?php if( is_home() ) : ?>

					<li id="nav-recent"><a class="navLink" href="<?php echo site_url('category/all'); ?>"><?php if($pageLocation=='home') echo 'New+';?>Recent</a></li>
					<!-- <li><a class="navLink" href="#sb">S.B.</a></li> -->
					<li id="nav-music" class="nav-cat"><a class="navLink" href="<?php echo site_url('category/music'); ?>">Music</a></li>
					<li id="nav-features" class="nav-cat"><a class="navLink" href="<?php echo site_url('category/features'); ?>">Features</a></li>
					<li id="nav-interviews" class="nav-cat"><a class="navLink" href="<?php echo site_url('category/interviews'); ?>">Interviews</a></li>
					<li id="nav-mixes" class="nav-cat"><a class="navLink" href="<?php echo site_url('category/mixes'); ?>">Mixes</a></li>
					<li id="nav-events" class="nav-cat"><a class="navLink" href="<?php echo site_url('category/events'); ?>">Events</a></li>
					<li id="nav-news" class="nav-cat"><a class="navLink" href="<?php echo site_url('category/news'); ?>">News</a></li>
					<?php svNavSearch(); ?>
					<li id="nav-link-top" class="no-active navbar-right"><a class="navLink" href="#top"><i class="icon-chevron-sign-up"></i></a></li>
				
				<?php else : ?>
					<li id="nav-link-home" class="non-active navbar-left"><a class="navLink" href="<?php echo site_url(); ?>"><i class="icon-home"></i></a></li>
					<li class="dropdown">
						<a class="dropdown-toggle disabled" data-toggle="dropdown" href="<?php echo site_url('#latest-posts'); ?>">Latest</a>
					    <ul class="dropdown-menu">
					    	<?php 
					    		$navPosts = new WP_Query( array( 'offset'=>0) );
					    		for($i=0;$i<5;$i++) {
					    			$navPosts->the_post(); ?>
					    			<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
					    	<?php } ?>
					    </ul>
					</li>
					<li class="dropdown">
						<a class="dropdown-toggle disabled" data-toggle="dropdown" href="<?php echo site_url('#sb-info'); ?>">S.B.</a>
					    <ul class="dropdown-menu">
					    	<?php 
					    		$navPosts = new WP_Query( 'category_name=local,sb' );
					    		for($i=0;$i<4;$i++) {
					    			$navPosts->the_post(); ?>
					    			<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
					    	<?php } ?>
					    	<li><a href="<?php echo site_url('#sb-info'); ?>"><i class="icon-calendar"></i> View Upcoming Events</a></li>
					    </ul>
					</li>
					<li class="dropdown">
						<a class="dropdown-toggle disabled" data-toggle="dropdown" href="<?php echo site_url('#columns-top'); ?>">Columns</a></a>
					    <ul class="dropdown-menu">
					    	<?php 
					    		$navPosts = new WP_Query( 'category_name=columns' );
					    		for($i=0;$i<4;$i++) {
					    			$navPosts->the_post(); ?>
					    			<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
					    	<?php } ?>
					    </ul>
					</li>
					<li class="dropdown">
						<a class="dropdown-toggle disabled" data-toggle="dropdown" href="<?php echo site_url('#choice-music'); ?>">Choice</a>
					    <ul class="dropdown-menu">
					    	<?php 
					    		$navPosts = new WP_Query( 'category_name=choice' );
					    		for($i=0;$i<5;$i++) {
					    			$navPosts->the_post(); ?>
					    			<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
					    	<?php } ?>
					    </ul>
					</li>
					<li class="dropdown">
						<a class="dropdown-toggle disabled" data-toggle="dropdown" href="<?php echo site_url('#spotlights-top'); ?>">Spotlights</a></a>
					    <ul class="dropdown-menu">
					    	<?php 
					    		$navPosts = new WP_Query( 'category_name=spotlights' );
					    		for($i=0;$i<4;$i++) {
					    			$navPosts->the_post(); ?>
					    			<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
					    	<?php } ?>
					    </ul>
					</li>
					<li class="dropdown">
						<a class="dropdown-toggle disabled" data-toggle="dropdown" href="<?php echo site_url('#events-posts'); ?>">Events</a></a>
					    <ul class="dropdown-menu">
					    	<?php 
					    		$navPosts = new WP_Query( 'category_name=events' );
					    		for($i=0;$i<4;$i++) {
					    			$navPosts->the_post(); ?>
					    			<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
					    	<?php } ?>
					    </ul>
					</li>
					<?php svNavSearch(); ?>
					<li id="nav-link-top" class="no-active navbar-right"><a class="navLink" href="#top"><i class="icon-chevron-sign-up"></i></a></li>
				<?php endif; ?>
				</ul>
			
				<div class="clearfix"></div>
				<div id="header-bottom-border"></div>
			</div>
		</nav>

	</nav>

	<div id="header-bottom">
	</div>

	



