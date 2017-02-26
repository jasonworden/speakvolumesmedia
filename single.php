<?php get_header('post'); ?>
<?php while ( have_posts() ) : the_post(); ?>

<div id="fb-root"></div>

<!-- templates -->
<script id="comments-template" type="comments/template">
	<h1>Talk about this post</h1>
	<div class="fb-wrapper">
		<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="{{width}}"></div>
	</div>
</script>
<script id="sv-likes-template" type="like/template">
<h1>Like us on Facebook</h1>
<div class="fb-wrapper">
	<div
		class="fb-like-box" data-href="https://www.facebook.com/SpeakVolumesMedia"
		data-width="{{width}}" data-height="185" data-show-faces="true" data-stream="false"
		data-show-border="false" data-header="false" data-colorscheme="">
	</div>
</div>
</script>
<div id="post-likes-template" class="hidden">
	<div class="fb-like" data-href="<?php the_permalink(); ?>" data-width="100" data-layout="box_count" data-show-faces="true"></div>
</div>
<div id="twitter-share-template" class="hidden">
	<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-via="SpkVolumesMedia" data-count="vertical">Tweet</a>
</div>
<!-- end/templates -->


	<?php get_template_part( 'content', 'single' ); ?>

<?php endwhile; ?>

	<!-- <section>
		<h2 class="section-header main">Latest</h2>
		<div class="container main">
			<div class="container-inner">
				<div class="row">
					<?php $latestPosts = new WP_Query( array( 'offset'=>0) ); ?>
					<?php for($i=0; $i<4; $i=$i+1) : ?>
						<div class="col-xs-6 col-md-3 col-box">
				        <?php
					    	$latestPosts->the_post(); 
							get_template_part('content','square'); 
						?>
						</div>
					<?php endfor; ?>
				</div>
			</div>
		</div>
	</section> -->

<script type="text/javascript"> /* code for all single posts */

head.ready(function() {

	$('.post-body iframe').width('100%');
	//get rid of unwanted blank paragraphs

	$('.post-body p').each(function() {
		var $p = $(this);
		if( (!$p.hasClass('blank')) && ($p.html() == '') && (!$p.children().length)) {
			$p.hide();
		}
	});

	//load facebook api once for all fb utilities
	(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=360823340689373";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));

	//for social sharing of individual post
	$('.facebook-like').sharrre({
	  share: {
	    facebook: true
	  },
	  action: 'like',
	  template: '<a class="share" href="#"><div class="box"><span data-icon="facebook"></span><span class="text"> Likes </span><span class="count">{total}</span></div></a>',
	  enableHover: false,
	  enableTracking: false,
	  click: function(api, options){
	    api.simulateClick();
	    api.openPopup('facebook');
	  }
	});

	$('.twitter-tweet').sharrre({
	  share: {
	    twitter: true
	  },
	  template: '<a class="share" href="#"><div class="box"><span data-icon="twitter"></span><span class="text"> Tweets </span><span class="count">{total}</span></div></a>',
	  enableHover: false,
	  enableTracking: false,
	  buttons: { twitter: {via: 'SpkVolumesMedia'}},
	  click: function(api, options){
	    api.simulateClick();
	    api.openPopup('twitter');
	  }
	});

	// $('.twitter-tweet').tooltip({ title: 'Click to Tweet this post!' });
	// $('#jump-to-comments-link').tooltip();
	$('.twitter-tweet').popover({
		content: 'Click to Tweet this post!',
		placement: 'top',
		animation: false,
		trigger: 'hover',
	});
	$('#jump-to-comments').popover({
		content: 'Leave a comment on this post!',
		placement: 'top',
		animation: false,
		trigger: 'hover',
	});

	//prepare facebook comments and like-box with desired width
	var commentsTemplate = $.trim( $('#comments-template').html() ),
		sidebarWidth = $('#comments').width(),
		likeBoxTemplate = $.trim( $('#sv-likes-template').html() );

	$('#comments').html( commentsTemplate.replace( /{{width}}/ig, sidebarWidth-32) );
	$('#likes').html( likeBoxTemplate.replace( /{{width}}/ig, sidebarWidth-12) );

	//like button for post appear on hover
	$('.facebook-like').popover({
		content: function() {
			return $('#post-likes-template').html();
		},
		placement: 'top',
		animation: false,
		title: 'Share',
		trigger: 'hover',
		delay: { show: 0, hide: 2100 },
		html: true,
	});

	$(window).scroll(function(e) {
		$('.facebook-like').popover('hide');
	});

	$('#ad-cycle').cycle({
		slides: '> a',
		speed: 2000,
		pauseOnHover: true,
		delay: 8000,
		timeout: 8000,
		random: true,
		cycleCenterHorz: true
	});

	$('#tracks-cycle').cycle({
		slides: '> a',
		speed: 2000,
		pauseOnHover: true,
		// delay: 8000,
		timeout: 8000,
		cycleCenterHorz: true,
		// fx: 'scrollHorz',
		fx: 'flipHorz',
		swipe: true,
    	// swipeFx: "scrollHorz",
    	prev: '#tracks .prev',
    	next: '#tracks .next'
	});

	$('#tracks-cycle').on('cycle-pre-initialize', function() {
		squareTracksArtwork();
	});
	$('#tracks-cycle').on('cycle-before', function() {
		squareTracksArtwork();
	});

	$('a#jump-to-comments-link').smoothScroll({
		easing: 'swing',
  		speed: 700,
  		offset: -52,
  		afterScroll: function() {
  			$('#comments-wrapper').css({
  				'border-color': 'rgb(0, 227, 195)' //turquoise main color
  			});
  			$('#comments h1').css({
  				'background': 'rgb(0, 227, 195)' //turquoise main color
  			});
  			setTimeout(function() {
  				$('#comments-wrapper').css({
	  				'border-color': 'rgba(24,24,36,1)' //back to @dark
	  			});
	  			$('#comments h1').css({
	  				'background': 'rgba(24,24,36,1)' 
	  			});
  			}, 3000);
  		}
	});

	$('a#scroll-down-arrow-link').smoothScroll({
		easing: 'swing',
  		speed: 700,
  		offset: -52
	});

	resizeAdPics();

	$(window).resize(function(e) {
		resizeAdPics();
		squareTracksArtwork();
		//makeFeatMobileMusicPicSquare();
	});

	// function makeFeatMobileMusicPicSquare() {
	// 	var $img = $('.post-meta .feat-image-right');
	// 	$img.width( $img.height() );
	// }

	function resizeAdPics(e) {
		var adPicwidth = $('#ad-cycle').width();
		$('#ad-cycle img').each(function(e) {
			$(this).width(adPicwidth);
		});
	}

	function squareTracksArtwork(e) {
		var size = ($('#tracks-cycle').width() - 12)*0.7;
		$('#tracks-cycle .square.image').each(function(e) {
			$(this).height(size);
		});
	}

});

</script>

<?php get_footer(); ?>
