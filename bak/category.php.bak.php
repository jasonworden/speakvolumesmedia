<?php
/*
 * The template for displaying Category pages.
 */
get_header('archive');

$cat = single_cat_title( '', false );
$catId = get_cat_id($cat);
$catPath = get_category_parents($catId,false,',');
$parents = explode(',',$catPath);
if( count($parents) > 3 ) {
	$title = $parents[1] . ' <i class="icon-angle-right"></i> ' . $cat;
} else {
	$title = $cat;
}
?>

<div id="category-picker" class="container main">
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
</div>

<?php svSectionTitle($title); ?>

<?php if ( have_posts() ) : ?>

	<?php svPagingNav(); ?>

	<main class="container main archive">
		<div class="container-inner">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'excerpt' ); ?>
			<?php endwhile; ?>

		</div>
	</main>

	<?php svPagingNav(); ?>

<?php else : 
		get_template_part( 'content', 'nothing' );
	endif;

	get_footer();
?>