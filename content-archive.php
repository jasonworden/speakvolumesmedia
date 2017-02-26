

<a class="archive-post<?php svColorClass() ?>" href="<?php the_permalink(); ?>">
	<div class="archive-post-inner">
		<h3 class="archive-title archive-text"><?php the_title(); ?></h3>
		<hr class="archive-line"></hr>
		<div class="image square">
			<div class="hidden"><?php the_post_thumbnail(); ?></div>
		</div>
		<p class="archive-date archive-text">
			<?php echo get_the_date('M j, Y'); ?>
		</p>
		<?php
			//svForFansOf();
			//svGenres();
		?>
		<p class="archive-excerpt archive-text" href="<?php the_permalink(); ?>">
			<?php echo get_the_excerpt(); ?>
		</p>
	</div>
</a>