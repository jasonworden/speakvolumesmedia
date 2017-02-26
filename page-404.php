<?php
/*
Template Name: 404 (sv)
*/

get_header(); ?>
<link href='<?php echo get_template_directory_uri(); ?>/css/archive.css' rel='stylesheet' type='text/css'>

	<main class="container main none">
		<div class="container-inner">
			<div class="row">
				<div class="col-xs-12 text-center">
					<h2>
						404 Error. Nothing found.
					</h2>
					<a href="<?php echo site_url(); ?>">
						<h2>Visit our home page</h2>
					</a>
				</div>
			</div>
		</div>
	</main>

<?php get_footer(); ?>