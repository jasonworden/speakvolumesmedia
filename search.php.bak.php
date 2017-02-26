<?php
/*
 * The template for displaying Search Results pages.
 */

get_header('home'); ?>
<link href='<?php echo get_template_directory_uri(); ?>/css/post.css' rel='stylesheet' type='text/css'>
<link href='<?php echo get_template_directory_uri(); ?>/css/archive.css' rel='stylesheet' type='text/css'>
<script> head.js('<?php echo get_template_directory_uri(); ?>/js/archive.js'); </script>

<div id="category-picker" class="container main">
	<header class='row'>
		<div id="archive-header" class="col-xs-12">
			<h2>Search results for: <?php the_search_query(); ?></h2>
			<div id="cat-tri" class="tri gray"></div>
		</div>
	</header>
	<div class="col-xs-12 text-center">
		<form role="search" method="get" id="results-form" action="<?php echo home_url( '/' ); ?>">
		    <div>
		        <input type="text" name="s" value="<?php the_search_query(); ?>" placeholder="Search SV..." /><!--
		        --><button type="submit" id="searchsubmit"><i class="icon-search"></i></button>
		    </div>
		</form>
	</div>
</div>

<?php svSectionTitle($title); ?>

<?php if ( have_posts() ) : ?>

	<?php svPagingNav(); ?>

	<main class="container main archive">
		<div class="container-inner">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'archive' ); ?>
			<?php endwhile; ?>

		</div>
	</main>

	<?php svPagingNav(); ?>

<?php else : 
		get_template_part( 'content', 'nothing' );
	endif;

	get_footer();
?>