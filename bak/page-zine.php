<?php
/*
Template Name: SVQuarterly Zine
*/
$url = 'http://speakvolumesmedia.com/svm-wtb-present-giraffage-1-16-14/';
get_header(); ?>
<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/img/finalposter-web-orange-04.jpg"/>


<script>
	head.js('<?php echo get_template_directory_uri(); ?>/js/dist/jquery.sharrre-1.3.4.js');
</script>
<link href='http://fonts.googleapis.com/css?family=Nixie+One' rel='stylesheet' type='text/css'>
<link href='<?php echo get_template_directory_uri(); ?>/css/post.css' rel='stylesheet' type='text/css'>
<link href='<?php echo get_template_directory_uri(); ?>/css/giraffage.css' rel='stylesheet' type='text/css'>

<div id="twitter-share-template" class="hidden">
	<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo $url; ?>" data-via="SpkVolumesMedia" data-count="vertical">Tweet</a>
</div>
<script id="comments-template" type="comments/template">
	<div class="fb-comments" data-href="<?php echo $url; ?>" data-width="{{width}}"></div>
</script>
<script id="sv-likes-template" type="like/template">
<div
	class="fb-like-box" data-href="https://www.facebook.com/SpeakVolumesMedia"
	data-width="{{width}}" data-height="234" data-show-faces="true" data-stream="false"
	data-show-border="false" data-header="false">
</div>
<div id="post-likes-template" class="hidden">
	<div class="fb-like" data-href="<?php the_permalink(); ?>" data-width="100" data-layout="box_count" data-show-faces="true"></div>
</div>
</script>
<script id="wtb-likes-template" type="like/template">
<div
	class="fb-like-box" data-href="https://www.facebook.com/wethebeatofficial"
	data-width="{{width}}" data-height="234" data-show-faces="true" data-stream="false"
	data-show-border="false" data-header="false">
</div>
</script>
<div id="fb-root"></div>


	<div class="container main">
		<div class="container-inner">
			<div class="row">
				<div id="intro" class="col-xs-12 text-center">
					<p><span>
						speak volumes<br>
						+<br>
						<a target="_blank" href="http://wethebeat.com/">we the beat</a><br>
						present</span>
					</p>
					<img id="poster" class="" src="<?php echo get_template_directory_uri(); ?>/img/giraffage-orange-noise.png">
					
					<h2>GIRAFFAGE</h2>
					<p>
						w/ support from<br><span>Underbelly & Cub'b</span>
					</p>
					<div id="circle">
						thurs
						<p class="alt">1.16.14</p>
					</div>
					<p class="alt">
						SOHO MUSIC CLUB<br>
						SANTA BARBARA, CA
					</p>
					<p class="alt">
						18+<br>
						9 PM
					</p>
					<p class="alt">
						$10 PRESALE / $15 AT THE DOOR
					</p>
					<a class="tix-link" target="_blank" href="http://nightout.com/events/giraffage">
						<div class="text-center tix">BUY TICKETS NOW</div>
					</a>

					<div class="post-social">
						<div class="sharrre facebook-like" data-url="<?php echo $url; ?>" data-text="<?php the_title(); ?>" data-title="Likes"></div>
						<div class="sharrre twitter-tweet" data-url="<?php echo $url; ?>" data-text="" data-title="Tweets"></div>
					</div>

					<a class="tix-link" target="_blank" href="https://www.facebook.com/events/697729230259803/?fref=ts">
						<div class="text-center tix">RSVP ON FACEBOOK</div>
					</a>

				</div>
			</div>
			<div id="outro" class="row">
				<div id="outro-inner">

					<div id="content" class="col-xs-12 col-md-6 col-md-offset-2">
						<p>The Giraffage (<i>Giraffage camelopardalis</i>) is a San Francisco-based beatmaking <a title="Mammal" href="http://en.wikipedia.org/wiki/Mammal" target="_blank">mam<wbr />mal</a>, one of the tallest living terrestrial producers to emerge in 2013.  Its species name refers to its ability to peer over the rest of the electronic music game with extremely adept artistic vision, patching together disparate strands of hip-hop, disco, minimal trap, and R&amp;B into one effusive whole (as seen on 2013's <a href="http://giraffage.bandcamp.com/" target="_blank">Needs</a> mixtape). Its remixes of artists like <a href="http://www.youtube.com/watch?v=fUFYm9q62jc" target="_blank">Janet Jackson</a> and<a href="http://www.youtube.com/watch?v=oqdqCivdrEo" target="_blank"> Stardust</a> have amassed about 1300 kgs (2,800 lbs) of praise in the past calendar year.</p>

						<p>Indeed, the Giraffage has intrigued various cultures, both ancient and modern, for its peculiar sound, and has often been featured in paintings, books, and <a href="http://www.youtube.com/watch?v=6PVWP1Zrh4Q" target="_blank">The Boiler Room</a>. When the Speak Volumes tribe first heard that they could capture the Giraffage for a local show, they pretty much leapt at the opportunity, proclaiming things like "Gadzooks!" and "This should be a doozy". In alliance with We The Beat, they traveled north by llama to bag him, and returned as heroes to their native Santa Barbara, displaying him proudly at the <a href="http://www.sohosb.com/" target="_blank">SoHo Music Club. </a>Such a spectacle required a great deal of coinage, however, so Speak Volumes called forth on their townsfolk to drop the <a href="http://nightout.com/events/giraffage" target="_blank">totally reasonable price of ten bucks to come party with him</a>. They even invited the under 21 crowd, and brought along the <a href="http://underbelly.bandcamp.com/" target="_blank">Underbelly </a>and the <a href="https://soundcloud.com/chriscubbison" target="_blank">Cub'b</a> to further thicken the live electronic vibe.</p>

						<p>Most of all,  though, the tribe rejoiced at being able to bring such a quality musical mammal to their community.</p>

						<p>2014, everybody. Should be a good year.</p>
					</div>

					<div class="col-xs-12 col-md-4">
						<div id="comments" class="sidebar text-center"></div>
						<div id="likes" class="sidebar text-center"></div>
						<div id="wtb-likes" class="sidebar text-center"></div>
						<a target="_blank" href="http://wethebeat.com/" class="text-center">
							<img class="sidebar" src="<?php echo get_template_directory_uri(); ?>/img/wethebeat.png">
						</a>
					</div>
					
				</div>
				
			</div>
		</div>
	</div>

<script type="text/javascript">
head.ready(function() {
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

	//prepare facebook comments and like-box with desired width
	var commentsTemplate = $.trim( $('#comments-template').html() ),
		sidebarWidth = $('#comments').width(),
		likeBoxTemplate = $.trim( $('#sv-likes-template').html() ),
		wtbLikeBoxTemplate = $.trim( $('#wtb-likes-template').html() );

	$('#comments').html( commentsTemplate.replace( /{{width}}/ig, sidebarWidth) );
	$('#likes').html( likeBoxTemplate.replace( /{{width}}/ig, sidebarWidth) );
	$('#wtb-likes').html( wtbLikeBoxTemplate.replace( /{{width}}/ig, sidebarWidth) );

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
});
</script>

<?php get_footer(); ?>