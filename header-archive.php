<?php include 'base-header-includes/base-header-begin-include.php'; ?>

	<?php /* PLACE ANY CSS FILES SPECIFICALLY FOR THIS PAGE HERE */ ?>
	<!-- <link href='<?php echo get_template_directory_uri(); ?>/css/post.css' rel='stylesheet' type='text/css'> -->
	<!-- <link href='<?php echo get_template_directory_uri(); ?>/css/archive.css' rel='stylesheet' type='text/css'> -->

	<?php include 'base-header-includes/base-header-middle-include.php'; ?>

	<?php /* PLACE ANY JS FILES SPECIFICALLY FOR THIS PAGE HERE */ ?>
	<script>
		//head.js('<?php echo get_template_directory_uri(); ?>/js/dist/jquery.sharrre-1.3.4.js');
		head.js('<?php echo get_template_directory_uri(); ?>/js/dist/masonry.pkgd.js');
		var thisUrl = '<?php the_permalink(); ?>';
	</script>

<?php include 'base-header-includes/base-header-body-include.php'; ?>