<a class="article article-square" href="<?php the_permalink(); ?>" >
	<div class="square image">
	    <div class="hidden"><?php the_post_thumbnail(); ?></div>
	    <h3 class="title overlay"><?php the_frontpage_post_title(); ?></h3>
	    <?php
	    	if(get_field('featured')) {
	    		$feat = get_field('featured');
	    		$cat = $feat[0][feat_category];
		    	if($cat != '') {
		    		echo '<p class="overlay category">' . $cat . '</p>';
		    	}
	    	}
    	?>
    </div>
</a>
