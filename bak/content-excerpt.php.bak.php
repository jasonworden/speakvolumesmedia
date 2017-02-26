<article id="post-<?php the_ID(); ?>" class="excerpt row shaded">
	<a href="<?php the_permalink(); ?>">
		<div class="col-xs-12 col-sm-4 col-md-5 image square">
			<div class="hidden"><?php the_post_thumbnail(); ?></div>
		</div>
	</a>
	<script> makeSquare(); </script>
	<div class="col-xs-12 col-sm-8 col-md-7 post-meta">
		<a href="<?php the_permalink(); ?>">
			<h3 class="title single-title"><?php the_title(); ?></h3>
		</a>
		<p>
			by 
			<?php 
				printf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
						esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
						esc_attr( sprintf( __( 'View all posts by %s', 'twentythirteen' ), get_the_author() ) ),
						get_the_author()
				);
			?>
		</p>
		<p>
			<span class="info"><i class="icon-calendar"></i> <?php echo get_the_date('M j, Y'); ?></span>
			<span class="info"><i class="icon-time"></i> <?php the_time('g:i a'); ?></span>
		</p>
		<p>
			<i class="icon-folder-close-alt "></i> 
			<?php
				// Translators: used between list items, there is a space after the comma.
				$categories_list = get_the_category_list( __( ', ', 'twentythirteen' ) );
				if ( $categories_list ) {
					echo '<span class="categories-links">' . $categories_list . '</span>';
				}
			?>
		</p>
		<p>
			<?php
				// Translators: used between list items, there is a space after the comma.
				$tag_list = get_the_tag_list( '', __( ', ', 'twentythirteen' ) );
				if ( $tag_list ) {
					echo '<i class="icon-tags"></i> <span class="tags-links">' . $tag_list . '</span>';
				}
			?>
		</p>
		<?php
			svForFansOf();
			svGenres();
		?>
		<a class="excerpt" href="<?php the_permalink(); ?>"><?php echo get_the_excerpt(); ?></a>
	</div>
</article>