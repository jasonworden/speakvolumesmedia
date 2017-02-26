<?php include 'base-header-includes/base-header-begin-include.php'; ?>

	<?php /* PLACE ANY CSS FILES SPECIFICALLY FOR THIS PAGE HERE */ ?>

	<?php include 'base-header-includes/base-header-middle-include.php'; ?>

	<?php /* PLACE ANY JS FILES SPECIFICALLY FOR THIS PAGE HERE */ ?>
	<script>
		head.js('<?php echo get_template_directory_uri(); ?>/js/dist/jquery.sharrre.min.js');
		//head.js('<?php echo get_template_directory_uri(); ?>/js/dist/jquery-ui-1.10.4.custom.js',);
		var thisUrl = '<?php the_permalink(); ?>';
	</script>

<?php include 'base-header-includes/base-header-body-include.php'; ?>

