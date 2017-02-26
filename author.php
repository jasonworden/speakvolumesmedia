<?php
/**
 * The template for displaying Author archive pages.
 */

get_header('archive');
?>

<?php
	if ( have_posts() ) :
		the_post();
		$author = get_the_author();
		$title = 'Posts by ' . $author;
		svSectionTitle($title);
		svPagingNav(); 
?>

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

