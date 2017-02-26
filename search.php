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

		<h2 id="category-name">Search results</h2>
		<div class="clearfix visible-xs"></div>
		<?php svPagingNav(null,true) ?>
		<div class="clearfix"></div>
		<hr class="under-title"></hr>

		<div id="archive-posts">

			<div class="search-info archive-info archive-post">
				<div class="search-info-inner archive-info-inner archive-post-inner">
					<div class="clearfix">
						<h2 class="search-heading">results for: <?php the_search_query(); ?></h2>

						<form role="search" method="get" id="results-search-form" class="seach-form" action="<?php echo home_url( '/' ); ?>">
							<i class="icon-search"></i></a>
							<input id="search-bar" type="text" name="s" placeholder="Type to search..." value="<?php the_search_query(); ?>" autocomplete="off" />
						</form>
					</div>
				</div>
				.clearfix
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


<script type="text/javascript">
head.ready(function() {

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



