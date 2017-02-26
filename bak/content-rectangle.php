<div class="article article-rectangle shaded">
	<a href="<?php the_permalink(); ?>">
		<div class="square image">
		    <div class="hidden"><?php the_post_thumbnail(); ?></div>
		    <p class="overlay date"><?php echo get_the_date('n.j'); ?></p>
	    </div>
	</a>
	<div class="details">
		<a href="<?php the_permalink(); ?>" >
			<h3 class="outside"><?php the_frontpage_post_title(); ?></h3>
		</a>
		<p class="author-wrapper">
			by 
			<?php 
				printf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author" target="_blank">%3$s</a></span>',
						esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
						esc_attr( sprintf( __( 'View all posts by %s', 'twentythirteen' ), get_the_author() ) ),
						get_the_author() );
				if(get_field('contributors')) {
					echo ' + more';
				}
			?>
		</p>
		<!--p>
			<?php
				// Translators: used between list items, there is a space after the comma.
				$tag_list = get_the_tag_list( '', __( ', ', 'twentythirteen' ) );
				if ( $tag_list ) {
					echo '<i class="icon-tags"></i> <span class="tags-links">' . $tag_list . '</span>';
				}
			?>
		</p-->
		<a class="excerpt" href="<?php the_permalink(); ?>"><?php echo get_the_excerpt(); ?></a>
		<!-- <p><a href="<?php the_permalink(); ?>">Read article <i class="icon-chevron-sign-right"></i></a></p> -->
	</div>
	<div class="clearfix"></div>
</div>

