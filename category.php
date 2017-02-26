<?php
/*
 * The template for displaying Category pages.
 */
get_header('archive');

$cat = single_cat_title( '', false );
$catId = get_cat_id($cat);
$catPath = get_category_parents($catId,false,',');
$family = explode(',',$catPath);
$parent = $family[1];
if( count($family) > 3 ) {
	$title = $parent . ' <i class="icon-double-angle-right icon-fixed-width"></i> ' . $cat;
} else {
	$title = $cat;
}
if($title=='All') {
	$title = $title . ' Posts';
}

?>

<style>
	#header-bottom { height: 10px; }
</style>

<div class="container archive-container category-container main-container">
	<div class="container-inner">

		<h2 id="category-name"><?php echo $title ?></h2>
		<div class="clearfix visible-xs"></div>
		<?php svPagingNav(null,true) ?>
		<div class="clearfix"></div>
		<hr class="under-title"></hr>

		<div id="archive-posts">

			<div class="archive-info cat-picker archive-post hidden-xxs">
				<div class="archive-info-inner cat-picker-inner archive-post-inner">

					<div class="clearfix">
						<div id="music-tab-group" class="tab-group">
							<a href="<?php echo site_url('category/music'); ?>" class="tab<?php svCurrent($parent,'music') ?>">Music</a>
							<a href="<?php echo site_url('category/music'); ?>" class="tab-child all<?php svCurrent($cat,'music') ?>">All</a>
							<a href="<?php echo site_url('category/mixes'); ?>" class="tab-child<?php svCurrent($cat,'mixes') ?>">Mixes</a>
							<a href="<?php echo site_url('category/news'); ?>" class="tab-child<?php svCurrent($cat,'news') ?>">News</a>
							<a href="<?php echo site_url('category/albums'); ?>" class="tab-child<?php svCurrent($cat,'albums') ?>">Albums</a>
							<a href="<?php echo site_url('category/tracks'); ?>" class="tab-child<?php svCurrent($cat,'tracks') ?>">Tracks</a>
							<a href="<?php echo site_url('category/fmm'); ?>" class="tab-child<?php svCurrent($cat,'fmm') ?>">FMM</a>
						</div>

						<div id="features-tab-group" class="tab-group">
							<a href="<?php echo site_url('category/features'); ?>" class="tab<?php svCurrent($parent,'features') ?>">Features</a>
							<a href="<?php echo site_url('category/features'); ?>" class="tab-child all<?php svCurrent($cat,'features') ?>">All</a>
							<a href="<?php echo site_url('category/interviews'); ?>" class="tab-child<?php svCurrent($cat,'interviews') ?>">Interviews</a>
							<a href="<?php echo site_url('category/retrospective'); ?>" class="tab-child<?php svCurrent($cat,'retro:spective') ?>">Retro:spective</a>
							<a href="<?php echo site_url('category/columns'); ?>" class="tab-child<?php svCurrent($cat,'columns') ?>">Columns</a>
						</div>

						<div id="events-tab-group" class="tab-group">
							<a href="<?php echo site_url('category/events'); ?>" class="tab<?php svCurrent($parent,'events') ?>">Events</a>
							<a href="<?php echo site_url('category/events'); ?>" class="tab-child all<?php svCurrent($cat,'events') ?>">All</a>
							<a href="<?php echo site_url('category/previews'); ?>" class="tab-child<?php svCurrent($cat,'previews') ?>">Previews</a>
							<a href="<?php echo site_url('category/reviews'); ?>" class="tab-child<?php svCurrent($cat,'reviews') ?>">Reviews</a>
							<a href="<?php echo site_url('category/galleries'); ?>" class="tab-child<?php svCurrent($cat,'galleries') ?>">Galleries</a>
						</div>

						<div id="all-link-wrapper">
							<a id="all-link" href="<?php echo site_url('category/all'); ?>">see all posts</a>
						</div>
					</div>
					
				</div>
			</div>

			<?php if ( have_posts() ) : ?>

				<?php //svPagingNav(); ?>

				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'archive' ); ?>
				<?php endwhile; ?>

				<?php //svPagingNav(); ?>

			<?php else : 

					get_template_part( 'content', 'nothing' );

				endif;

			?>

		</div>
	</div>
</div>

<!--div id="category-picker" class="container main">
	<header class='row'>
		<div id="archive-header" class="col-xs-12">
			<h2>View by category</h2>
			<div id="cat-tri" class="tri gray"></div>
		</div>
	</header>
	<div class="container-inner">
		<nav class="row">
			<div class="categories" class="col-xs-12">
				<div class="cat-inner">
					<div class="group">
						<a class="parent<?php if($cat=='All') echo ' active' ?>" href="<?php echo site_url('category/all'); ?>">All</a>
					</div>
					<div class="group">
						<a class="parent<?php if($cat=='Columns') echo ' active' ?>" href="<?php echo site_url('category/columns'); ?>">Columns</a>
						<a class="child<?php if($cat=='Throwback Thursday') echo ' active' ?>" href="<?php echo site_url('category/columns/throwback-thursday'); ?>">TBT</a>
						<a class="child<?php if($cat=="What's Out There") echo ' active' ?><?php if($cat=='All') echo ' active' ?>" href="<?php echo site_url('category/columns/what-s-out-there'); ?>">What's Out There</a>
						<a class="child<?php if($cat=='Speaking Volumes') echo ' active' ?>" href="<?php echo site_url('category/columns/speaking-volumes'); ?>">Speaking Volumes</a>
					</div>
					<div class="group">
						<a class="parent<?php if($cat=='Choice') echo ' active' ?>" href="<?php echo site_url('category/choice'); ?>">Choice</a>
						<a class="child<?php if($cat=='Tracks') echo ' active' ?>" href="<?php echo site_url('category/tracks'); ?>">Tracks</a>
						<a class="child<?php if($cat=='Albums') echo ' active' ?>" href="<?php echo site_url('category/albums'); ?>">Albums</a>
						<a class="child<?php if($cat=='Free Music Mondays') echo ' active' ?>" href="<?php echo site_url('category/fmm'); ?>">FMM</a>
					</div>
					<div class="group">
						<a class="parent<?php if($cat=='Spotlights') echo ' active' ?>" href="<?php echo site_url('category/spotlights'); ?>">Spotlights</a>
						<a class="child<?php if($cat=='Local Spotlight') echo ' active' ?>" href="<?php echo site_url('category/spotlights/local'); ?>">Local Spotlight</a>
						<a class="child<?php if($cat=='Interviews') echo ' active' ?>" href="<?php echo site_url('category/interviews'); ?>">Interviews</a>
						<a class="child<?php if($cat=='Album Reviews') echo ' active' ?>" href="<?php echo site_url('category/album-reviews'); ?>">Album Reviews</a>
					</div>
					<div class="group">
						<a class="parent<?php if($cat=='Events') echo ' active' ?>" href="<?php echo site_url('category/events'); ?>">Events</a>
						<a class="child<?php if($cat=='Previews') echo ' active' ?>" href="<?php echo site_url('category/events/previews'); ?>">Previews</a>
						<a class="child<?php if($cat=='Reviews') echo ' active' ?>" href="<?php echo site_url('category/events/reviews'); ?>">Reviews</a>
					</div>
					<div class="group">
						<a class="parent<?php if($cat=='Mixes') echo ' active' ?>" href="<?php echo site_url('category/mixes'); ?>">Mixes</a>
						<a class="parent<?php if($cat=='SB') echo ' active' ?>" href="<?php echo site_url('category/sb'); ?>">S.B.</a>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</nav>
	</div>
</div-->

<?php //svSectionTitle($title); ?>

<script type="text/javascript">
head.ready(function() {

	// var sections = document.querySelector('#archive-posts');
	// var mason = new Masonry( sections, {
	//   itemSelector: '> .archive-post'
	// });
	// console.log("masonry:",mason);

	var $sections = $('#archive-posts');
	// initialize
	$sections.masonry({
	  columnWidth: 'a.archive-post',
	  itemSelector: '.archive-post'
	});
	console.log( $sections.data('masonry') );


});
</script>

<?php get_footer(); ?>



