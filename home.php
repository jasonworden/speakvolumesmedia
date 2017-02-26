<?php
	get_header('home');
	$featuredPosts = new WP_Query( array('meta_key' => 'featured_0_if_featured', 'meta_value' => 1), 'posts_per_page=4' );
	$usedIds = array();
?>

<div class="main-body">

	<div id="billboard" class="billbaord-carousel billboard-container container">
		<div class="container-inner">
			<section id="bb-cycle" class="bb cycle">

				<?php
					for($i=0;$i<4;$i++) {
						$featuredPosts->the_post();
						array_push( $usedIds, get_the_id() );
						svBillboardPost($featuredPosts,$i,true);
					}
				?>

			</section>

			<div id="thumb-nav">
                <a href="#" class="feat-nav-arrow cycle-arrow prev">
                    <i class="icon-caret-left"></i>
                </a>
                <a href="#" class="feat-nav-arrow cycle-arrow next">
                    <i class="icon-caret-right"></i>
                </a>
                <!-- thumbnail links will be appended to this part of dom from templates via jQuery -->
		    </div>

		</div>
	</div>

	<div class="container home-container main-container">
		<div class="container-inner">
			<div id="sections">

				<?php

					svHomeSection("Tracks",
						"tracks", // slug
						"section-music", //class name
						"Individual track reviews",
						$usedIds
					);
					svHomeSection("Mixes",
						"mixes", // slug
						"section-music", //class name
						"These are original mixes that artists you won't find anywhere else besides Speak Volumes.",
						$usedIds
					);
					svHomeSection("Events",
						"events", // slug
						"section-events", //class name
						"We preview and review all sorts of events and take pretty pictures at them.",
						$usedIds
					);
					svHomeSection("Albums",
						"albums", // slug
						"section-music", //class name
						"Reviews and announcements of new albums",
						$usedIds
					);
					svHomeSection("Columns",
						"columns", // slug
						"section-feat", //class name
						"We dig deep into the dark crevices of electronic music across the globe.",
						$usedIds
					);
					svHomeSection("Interviews",
						"interviews", // slug
						"section-feat", //class name
						"We... interview artists.",
						$usedIds
					);
					svHomeSection("Free Music Mondays",
						"fmm", // slug
						"section-music", //class name
						"We do the grunt work of gathering free tunes from the past week in one convenient spot every Monday.",
						$usedIds
					);
					svHomeSection("Retro:spective",
						"retrospective", // slug
						"section-feat", //class name
						"A bunch of cool stuff sorted back-to-back for you.",
						$usedIds
					);
					svHomeSection("News",
						"news", // slug
						"section-music", //class name
						"We sift through the junk and round up the most notable news items from the past week.",
						$usedIds
					);
					// svHomeSection("Lists",
					// 	"lists", // slug
					// 	"section-feat", //class name
					// 	"A bunch of cool stuff sorted back-to-back for you.",
					// 	$usedIds
					// );

				?>


				<!--section class="home-section text-center">
					<div class="section-inner main">
						<?php
							$my_query = new WP_Query('posts_per_page=1&orderby=rand');
							while ($my_query->have_posts()) : $my_query->the_post(); 
						?>
						<a id="home-shuffle-link" class="" href="<?php the_permalink(); ?>" nontitle="<?php the_title(); ?>">
							<i id="shuffle" class="icon-random"></i>
						</a>
						<?php endwhile; wp_reset_postdata(); ?>
					</div>
				</section-->

			</div>
		</div>
	</div>


</div>





<script type="text/javascript">

head.ready(function() {

	$sections = $('section.home-section'),
	$inners = $sections.find('.section-inner'),
	$linkAreas = $inners.find('.section-post-links')

	$thumbNav = $('#thumb-nav');
	$('#bb-cycle script[type="thumb-link/template"]').each(function() {
		$thumbNav.append( $(this).html() );
	});

	var sections = document.querySelector('#sections');
	var mason = new Masonry( sections, {
	  itemSelector: 'section.home-section',
	});
	console.log("masonry:",mason);

	$('#bb-cycle').cycle({
		slides: '> a',
		speed: 400,
		pauseOnHover: true,
		delay: 18000,
		timeout: 5000,
		fx: 'scrollHorz',
		swipe: true,
		easing: 'easeInOutQuad',
    	swipeFx: "scrollHorz",
    	prev: '#thumb-nav .prev',
    	next: '#thumb-nav .next'
	});
	$('#bb-cycle').cycle('pause');

	//activate thumbnail navigation:
	var $bbCycle = $('#bb-cycle');
    var $thumbs = $('.thumb-link');
    var currentSlide = 0;

    // $thumbs.removeClass('current');
    $($thumbs[0]).addClass('current');

    $thumbs.click(function(e) {
        e.preventDefault();
        var slide = $(this).data('slide');
        if(slide != currentSlide) {
        	$('#bb-cycle').cycle('goto',slide);
        } else {
        	window.location = $(this).data('link');
        }
    });
    //keep current slide's thumbnail in "current" state
    $bbCycle.on('cycle-before', function(event, optionHash, outgoingSlideEl, incomingSlideEl, forwardFlag) {
        console.log(incomingSlideEl);
        var currSlide = $(incomingSlideEl).data('slide');
        $thumbs.removeClass('current');
        $($thumbs[currSlide]).addClass('current');

        if( $(incomingSlideEl).hasClass('bb-music') ) {
        	$bbCycle.css({
        		background: 'rgba(0, 227, 195,1)' //turquoise
        	});
        } else if( $(incomingSlideEl).hasClass('bb-feat') ) {
        	$bbCycle.css({
        		background: 'rgba(73,170,255,1)' //blue
        	});
        } else if( $(incomingSlideEl).hasClass('bb-event') ) {
        	$bbCycle.css({
        		background: 'rgba(220, 11, 110,1)' //pink
        	});
        }
    });

    $('#bb-cycle').on('cycle-after', function(event, optionHash, outgoingSlideEl, incomingSlideEl, forwardFlag) {
        currentSlide = $(incomingSlideEl).data('slide');
    });

	//$('h2.section-header').tooltip({ placement: 'bottom' });

	// sizeHomeSections()
	// $(window).resize(sizeHomeSections);

	// function sizeHomeSections() {
	// 	console.log('sizinggggg');
	// 	if( $(window).width()>767 ) {
	// 		var maxHeight=0;
	// 		$linkAreas.each(function() {
	// 			var h = $(this).height();
	// 			if( h > maxHeight ) {
	// 				console.log('found new max h');
	// 				maxHeight = h;
	// 			}
	// 		});
	// 		$inners.each(function() {
	// 			$(this).css({
	// 				'min-height': (maxHeight+36)+'px'
	// 			});
	// 		});
	// 	} else {
	// 		$inners.each(function() {
	// 			$(this).css({
	// 				'min-height': 'auto'
	// 			});
	// 		});
	// 	}
	// }

});

</script>

<?php get_footer(); ?>