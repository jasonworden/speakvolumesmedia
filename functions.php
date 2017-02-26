<?php

//for admin.php
// // Quick Press Widget
// remove_meta_box('dashboard_quick_press', 'dashboard', 'core');
// // Comments Widget
// remove_meta_box('dashboard_recent_comments', 'dashboard', 'core');
// //events calendar maker modern tribe Widget
// remove_meta_box('tribe_dashboard_widget', 'dashboard', 'normal');


// add_action('init', 'svEnqueueMainStyle');
//
// function svEnqueueMainStyle() {
//     wp_enqueue_style('theme-main', get_template_directory_uri().'/styles/style.less');
//     //wp_enqueue_style('twitter-bootstrap', get_template_directory_uri().'/styles/dist/bootstrap/bootstrap.less');
// }

add_action('init', 'autoCompileLess');

function autoCompileLess() {

    // include lessc.inc
    require_once( get_template_directory().'/less/lessc.inc.php' );

    // input and output location
    // $inputFile = get_template_directory().'/less/testing.less';
    // $outputFile = get_template_directory().'/css/testing.css';
    $inputFile = get_template_directory().'/style.less';
    $outputFile = get_template_directory().'/style.css';

    // load the cache
    $cacheFile = $inputFile.".cache";

    if (file_exists($cacheFile)) {
        $cache = unserialize(file_get_contents($cacheFile));
    } else {
        $cache = $inputFile;
    }

    $less = new lessc;
    // $less->setFormatter("compressed");

    // create a new cache object, and compile
    // $newCache = $less->cachedCompile($cache);

    try {
	    $newCache = $less->cachedCompile($cache);
	} catch (Exception $ex) {
	    echo "lessphp fatal error: ",$ex->getMessage();
	}

    // output a LESS file, and cache file only if it has been modified since last compile
    if (!is_array($cache) || $newCache["updated"] > $cache["updated"]) {
        file_put_contents($cacheFile, serialize($newCache));
        file_put_contents($outputFile, $newCache['compiled']);
    }
}

// function allow_more_pubs( $limit ) {
//     return 20;
// }
// add_filter( 'wpa-pubs_per_page', 'allow_more_pubs' );


function twentythirteen_scripts_styles() {
	// Add Genericons font, used in the main stylesheet.
	//wp_enqueue_style( 'genericons', get_template_directory_uri() . '/fonts/genericons.css', array(), '2.09' );

	// Loads our main stylesheet.
	wp_enqueue_style( 'twentythirteen-style', get_stylesheet_uri(), array(), '2013-07-18' );

	// Loads the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'twentythirteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentythirteen-style' ), '2013-07-18' );
	wp_style_add_data( 'twentythirteen-ie', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'twentythirteen_scripts_styles' );

/**
 * Creates a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since Twenty Thirteen 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function twentythirteen_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'twentythirteen' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'twentythirteen_wp_title', 10, 2 );


/* custom SV functions below */

function blank_excerpt_more( $more ) {
	return '';
}
add_filter('excerpt_more', 'blank_excerpt_more');
function custom_excerpt_length( $length ) {
	return 35;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
function mySearchFilter($query) {
	if ($query->is_search) {
		$query->set('post_type', 'post');
	}
	return $query;
}
add_filter('pre_get_posts','mySearchFilter');
add_editor_style('css/editor-style.css');

function genres_init() {
	// create a new taxonomy
	register_taxonomy(
		'genres',
		'post',
		array(
			'labels' => array(
				'name' => _x( 'Genres', 'taxonomy general name' ),
				'singular_name' => _x( 'Genre', 'taxonomy singular name' ),
				'all_items' => __( 'All Genres' ),
				'search_items' =>  __( 'Search Genres' ),
				'add_new_item' => __( 'Add New Genre' ),
				'new_item_name' => __( 'New Genre' ),
				'edit_item' => __( 'Edit Genre' ),
				'capabilities' => array(
					'assign_terms' => 'edit_guides',
					'edit_terms' => 'publish_guides'
			),
			'rewrite' => array(
				'slug' => 'genre',
				'with_front' => true
			),
			'show_ui' => false
			)
		)
	);
}
function artists_init() {
	// create a new taxonomy
	register_taxonomy(
		'Artists',
		'post',
		array(
			'labels' => array(
				'name' => _x( 'Artists', 'taxonomy general name' ),
				'singular_name' => _x( 'Artist', 'taxonomy singular name' ),
				'all_items' => __( 'All Artists' ),
				'search_items' =>  __( 'Search Artists' ),
				'add_new_item' => __( 'Add New Artist' ),
				'new_item_name' => __( 'New Artist' ),
				'edit_item' => __( 'Edit Artist' ),
				'capabilities' => array(
					'assign_terms' => 'edit_guides',
					'edit_terms' => 'publish_guides'
			),
			'rewrite' => array(
				'slug' => 'artist',
				'with_front' => true
			),
			'show_ui' => false
			)
		)
	);
}
add_action( 'init', 'genres_init' );
add_action( 'init', 'artists_init' );

add_theme_support( 'post-thumbnails' );

add_shortcode('', function () {
    return ' <blockquote class="question"><p> ';
});

function svCatLink($catName) {
	echo get_category_link( get_cat_ID($catName) );
}

function svHomePost(&$currentQuery, &$usedIds) {
	$foundNewPost = false;
	while($foundNewPost===false) {
		$currentQuery->the_post();
		$foundMatch = array_search(get_the_id(), $usedIds);
		if($foundMatch===false) {
			$foundNewPost = true;
		}
	}
	array_push( $usedIds, get_the_id() );
}

function svSectionTitle($title, $description) {
	if($title != '') : ?>

	<h2 class="section-header main" title="<?php //echo $description; ?>">
		<?php echo $title; ?>
		<!-- <i class="icon-ellipsis-horizontal icon-fixed-width text-center"></i> -->
	</h2>

	<?php endif;
}

function svShortTitle() {
	if(get_field('shortTitle')) {
		echo get_field('shortTitle');
	} else {
		echo get_the_title();
	}
}

function svSectionMore($text,$path) {
	if($text != '') : ?>

		<div class="row">
			<div class="view-more-wrapper">
				<a class="view-more" href="<?php echo site_url($path); ?>"><?php echo $text; ?></a>
			</div>
		</div>

	<?php endif;
}

function svHomeSection($title, $slug, $class, $description, &$usedIds) {

	//prints out a homepage section and tracks IDs of posts outputted

	$categoryPosts = new WP_Query( 'category_name=' . $slug ); ?>

	<section class="home-section text-center <?php echo $class; ?>">
		<?php svSectionTitle($title, $description); ?>
		<div class="clearfix"></div>
		<div class="section-inner">

			<div class="section-post-links">
				<?php svHomePost($categoryPosts, $usedIds); ?>
				<a class="prominent-post-link article-square" href="<?php the_permalink(); ?>">
					<div class="square image">
					    <div class="hidden"><?php the_post_thumbnail(); ?></div>
				    </div>
					<h3 class="prominent-post-title"><?php svShortTitle(); ?></h3>
					<h4 class="post-excerpt"><em><?php echo get_the_excerpt(); ?></em></h4>
				</a>

				<div class="recent-posts">
				<?php for($j=0; $j<3; $j++) {
					svHomePost($categoryPosts, $usedIds); ?>
					<hr class="section-divider">
					<a href="<?php the_permalink(); ?>" class="small-post-link">
						<h5 class="small-post-title"><?php svShortTitle(); ?></h5>
					</a>
				<?php } ?>
				</div>
			</div>

			<a class="more-link" href="<?php svCatLink($slug) ?>">
				<h6 class="more-recent-posts">See More <i class="icon-double-angle-right icon-fixed-width"></i></h6>
			</a>
		</div>
	</section>

	<?php
}

function svForFansOf() {
	if(get_field('forFansOf')) {
		$artistTags = get_field('forFansOf')[0]['artistTags'];
		if( !empty($artistTags) ) {
			echo '<p><em>For fans of </em>: ';
			svTags($artistTags);
			echo '</p>';
		}
	}
}

function svGenres() {
	if(get_field('genres')) {
		$genres = get_field('genres')[0]['genreTags'];
		if( !empty($genres) ) {
			echo '<p><em>Genres </em>: ';
			svTags($genres);
			echo '</p>';
		}
	}
}

function svTags($tags) {
	while( !empty($tags) ) {
		$tag = array_shift($tags);
		//echo '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>';
		echo $tag->name;
		if( count($tags) > 0 ) {
			echo ', ';
		}
	}
}

function svAuthors() {
	echo '<i class="fixed-width icon-align-left authors-icon"></i> ';
	// printf( '<a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a>',
	// 		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
	// 		esc_attr( sprintf( __( 'View all posts by %s', 'twentythirteen' ), get_the_author() ) ),
	// 		get_the_author()
	// );
	echo get_the_author();

	if(get_field('contributors')) {
		$authors = get_field('contributors');
		//print_r($authors);
		if( !empty($authors) ) {
			echo ' w/ ';
			while( !empty($authors) ) {
				$author = array_shift($authors);
				//print_r($author[name]);
				echo $author[name][display_name];
				if( count($authors) == 1 ) {
					echo ', & ';
				} else if( count($authors) > 0 ) {
					echo ', ';
				}
			}
		}
	}

}

function svIncludeCode() {
	//check if extra code files are included via custom field
	if(get_field('code_files')) {
		$files = get_field('code_files');
		while( !empty($files) ) {
			$file = array_shift($files);
			//echo $file[file_name];
			switch ($file[file_type]) {
				case "php":
					//echo 'including php file';
					$name = 'code/' . $file[file_name] . '.php';
					include($name);
					break;
				case "js":
					//echo 'js file';
					break;
				case "css":
					$name = get_template_directory_uri() .'/code/' . $file[file_name] . '.css'; ?>
					<link rel="stylesheet" type="text/css" href="<?php echo $name; ?>">
				<?php
					break;
				default:
					break;
			}
		}
	}
}

function svEventTitle($id) {
	$text = '';
	$m = get_post_meta($id);
	if( $m[specialTitle][0] ) {
		$title = $m[specialTitle][0];
		$text .= $title . ': ';
	}
	$artists = get_field('artistList');
	while( !empty($artists) ) {
		$artist = array_shift($artists);
		$text .= $artist['artists'];
		if( count($artists) ) {
			$text .= ' + ';
		}
	}
	return $text;
}

function svEventDateIntro($id, $ifFirst) {
	if( $ifFirst ) {
		echo '</td></tr>';
	}
    echo '
    <tr>
		<td class="date text-center">
			<div class="date-info">
				<span class="day">'. tribe_get_start_date($id,false,"D") . '</span>
	    		<span class="num">' . tribe_get_start_date($id,false,"j") . '</span>
	    		<span class="month">' . tribe_get_start_date($id,false,"M") . '</span>
			</div>
		</td>
		<td class="events text-left">';
}

function svPagingNav($postType,$top) {
	global $wp_query;
	if($postType != 'search') {
		$prevText = 'older';
		$nextText = 'newer';
	} else {
		$prevText = 'next';
		$nextText = 'previous';
	}

	// $prevText = '';
	// $nextText = '';

	$linkOlder = '
		<nav class="archive-nav prev">

				<i class="icon-double-angle-left"></i>
				<span class="nav-text">'. $prevText . '</span>

		</nav>';
	$linkNewer = '
		<nav class="archive-nav next">
			<span class="nav-text">' . $nextText . '</span>
			<i class="icon-double-angle-right"></i>

		</nav>';

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 )
		return;
	?>
	<nav class="archive-nav-wrapper" role="navigation">

		<?php if ( get_next_posts_link() ) : ?>
			<?php next_posts_link($linkOlder); ?>
		<?php endif; ?>

		<?php if ( get_previous_posts_link() ) : ?>
			<?php previous_posts_link($linkNewer); ?>
		<?php endif; ?>

	</nav>
	<?php
}

function svNavSearch() { ?>
	<li id="search-nav-button" class="dropdown">
		<a class="dropdown-toggle disabled" data-toggle="dropdown" href="<?php echo site_url('#events-posts'); ?>"><i class="icon-search"></i></a></a>
	    <ul id="searchblock" class="dropdown-menu">
	    	<li id="nav-search">
	    		<form role="search" method="get" id="search-form" action="<?php echo home_url( '/' ); ?>">
				    <div>
				        <input type="text" name="s" id="s" placeholder="Search..." />
				        <button type="submit" id="searchsubmit"><i class="icon-search"></i></button>
				        <div class="clearfix"></div>
				    </div>
				</form>
	    	</li>
	    </ul>
	</li>
	<?php
}

function svPostNav() { ?>
	<nav id="other-posts" class="" role="navigation">
		<?php
			$prev =get_previous_post();
			$next =get_next_post();
		?>

		<?php
			$curr = $prev;
			if( $curr!="" ):
		?>
		<a href="<?php echo get_the_permalink($curr->ID); ?>" class="other-post prev left<?php svColorClass($curr) ?>">
			<div class="square details">
				<div class="details-inner">
					<span class="direction">older</span>
					<span class="title"><?php echo $curr->post_title ?></span>
				</div>
			</div>
			<div class="square image">
				<div class="hidden"><?php echo get_the_post_thumbnail($curr->ID); ?></div>
			</div>
		</a>
		<?php endif; ?>

		<?php
			$curr = $next;
			if( $curr!="" ):
		?>
		<a href="<?php echo get_the_permalink($curr->ID); ?>" class="other-post next right<?php svColorClass($curr) ?>">
			<div class="square details">
				<div class="details-inner">
					<span class="direction">newer</span>
					<span class="title"><?php echo $curr->post_title ?></span>
				</div>
			</div>
			<div class="square image">
				<div class="hidden"><?php echo get_the_post_thumbnail($curr->ID); ?></div>
			</div>
		</a>
		<?php endif; ?>

	</nav>
<?php
}

function svPostNav1() { ?>
	<nav class="post-nav-wrapper single" role="navigation">
	<?php

	$link_prev = '
		<nav class="prev post-nav main main-section left-side" role="navigation">
			<span class="direction">older</span>
			<span class="title">%title</span>
		</nav>';
	$link_next = '
		<nav class="next post-nav main text-right main-section left-side" role="navigation">
			<span class="direction">newer</span>
			<span class="title">%title</span>
		</nav>';
	previous_post_link( '%link', $link_prev );
	next_post_link( '%link', $link_next );
	?>
	</nav>
<?php
}

function svCurrent($pageCategory, $paramCategory) {
	if( lcfirst($paramCategory) == lcfirst($pageCategory) ) {
		echo ' current';
	}
}

function svEmailEncode($content){
	echo '<a href="'.antispambot("mailto:".$content).'">'.antispambot($content).'</a>';
}

function svPrintPostMeta() { ?>
	<p class="post-category-list">
		<i class="fixed-width icon-folder-close-alt "></i>
		<?php
			// Translators: used between list items, there is a space after the comma.
			$categories_list = get_the_category_list( __( ', ', 'twentythirteen' ) );
			if ( $categories_list ) {
				echo '<span class="categories-links">' . $categories_list . '</span>';
			}
		?>
	</p>
	<p><?php svAuthors(); ?></p>
	<p>
		<span class="info"><i class="fixed-width icon-calendar-empty"></i> <?php echo get_the_date('M j, Y'); ?></span>
		<span class="info"><i class="fixed-width icon-time"></i> <?php the_time('g:i a'); ?></span>
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
	svIncludeCode();
}

function svPostSharing($includeCommentLink) { ?>
	<div class="post-social">
		<div class="post-social-inner">
			<?php if($includeCommentLink): ?>
				<div class="sharrre facebook-comment">
					<a class="share" id="jump-to-comments-link" href="#comments" title="Leave a comment on this post!">
						<div class="box" id="jump-to-comments">
							<i class="icon-comments-alt"></i>
						</div>
					</a>
				</div>
				<div class="sharrre twitter-tweet" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>" data-title="Tweets"></div>
			<?php endif; ?>

			<div class="sharrre facebook-like" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>" data-title="Likes"></div>

			<?php if(!$includeCommentLink): ?>
				<div class="sharrre twitter-tweet" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>" data-title="Tweets"></div>
			<?php endif; ?>
		</div>
	</div>
<?php
}

function svFmmTracks() {

	if (has_category( 'fmm', $the_post )):

		if( have_rows('tracksWrapper') ):
		    while ( have_rows('tracksWrapper') ) : the_row();

		        if( have_rows('tracks') ):
				    while ( have_rows('tracks') ) : the_row();

				        ?>
						<h1 class="kool track">
							<span class="artist"><?php the_sub_field('artist'); ?></span>
							"<?php the_sub_field('track_name'); ?>"
						</h1>
						<? echo the_sub_field('description');

						if( have_rows('download_link') ):
							the_row();
							svDownloadLink( get_sub_field() );
						endif;
				    endwhile;
				endif;

		    endwhile;
		endif;

	endif;
}

function needsBillboardHeader() {
	if ( has_category( 'albums', $the_post ) || has_category( 'tracks', $the_post ) ){
		return false;
	}
	return true;
}

function svGetCategoryColor($post) {
	if(!$post) {
		$post = $the_post;
	}
	$categoryColor = '';
	if ( has_category( 'music', $post ) || has_category( 'tracks', $post ) || has_category( 'albums', $post ) ||
		has_category( 'fmm', $post ) || has_category( 'news', $post ) || has_category( 'mixes', $post ) ){
		$categoryColor = 'post-cat-music';
	} else if ( has_category( 'features', $post ) || has_category( 'columns', $post ) ||
		has_category( 'interviews', $post ) || has_category( 'retrospective', $post ) || has_category( 'lists', $post ) || has_category( 'whats-out-there', $post ) ) {
		$categoryColor = 'post-cat-features';
	} else if ( has_category( 'events', $post ) || has_category( 'previews', $post ) ||
		has_category( 'reviews', $post ) || has_category( 'sb', $post ) ) {
		$categoryColor = 'post-cat-events';
	}
	return $categoryColor;
}

function svColorClass($post) {
	echo ' '.svGetCategoryColor($post);
}

//zig zag divider
add_shortcode('divider', function () {
    return '<hr class="zig-zag">';
});

//give style to interview questions asked
add_shortcode('q-', function () {
    return '<p class="blank"></p><blockquote class="question"><p>';
});
add_shortcode('-q', function () {
    return '</p></blockquote>';
});

//give style to cool quotes
add_shortcode('quote-', function () {
    return ' <blockquote class="quote"><p> ';
});
add_shortcode('-quote', function () {
    return ' </p></blockquote> ';
});


add_shortcode('a-', function () {
    return ' <blockquote><p> '; //give style to interview questions asked
});

add_shortcode('h-', function () {
    return '<section>
				<header><h4>';
});
add_shortcode('-h', function () {
    return '</h4></header>';
});

add_shortcode('info-', function () {
    return '<p>';
});
add_shortcode('-info', function () {
    return '</p></section>';
});

//new interview shortcodes
add_shortcode('q', function () {
    return '</p></blockquote>
    		<p class="blank"></p>
    		<blockquote class="question"><p>';
});
add_shortcode('a', function () {
    return '</p></blockquote>
    		<blockquote><p>'; //give style to interview questions asked
});
add_shortcode('firstq', function () {
    return '<blockquote class="question"><p>'; //give style to interview questions asked
});
add_shortcode('quote', function () {
    return '</p></blockquote>
    		<blockquote class="quote"><p>';
});
add_shortcode('endquotestartq', function () {
    return '</p></blockquote>
    		<blockquote class="question"><p>';
});
add_shortcode('endqa', function () {
    return '</p></blockquote>';
});

//new section shortcodes
add_shortcode( 'section', function( $atts )
{
	extract( shortcode_atts( array(
		'title' => '---'
	), $atts ) );

	return "<section>
				<header><h4>{$title}</h4></header>
				";
});
add_shortcode('endsection', function () {
    return '</section>';
});

add_shortcode('alpha phunk pokemon', function ()
{
    return '
<div class="fav food">
	<p class="fav-header type">Pierce / Keys</p><p class="item">ATTACKS:<br>Pierce: 80<br>Supersonic: 40</p><img src="http://www.speakvolumesmedia.com/wp-content/uploads/2013/05/pierce.jpg"></img>
</div>

<div class="fav food">
	<p class="fav-header type">Sofia / Vocals</p><p class="item">ATTACKS:<br>Lullaby: 120<br>Roar: 15</p><img src="http://www.speakvolumesmedia.com/wp-content/uploads/2013/05/sofia.jpg"></img>
</div>

<div class="fav food">
	<p class="fav-header type">Laurence / MC</p><p class="item">ATTACKS:<br>Cypher: 15<br>Spit: 60</p><img src="http://www.speakvolumesmedia.com/wp-content/uploads/2013/05/laurence.jpg"></img>
</div>

<div class="fav food">
	<p class="fav-header type">Miller / Bass</p><p class="item">ATTACKS:<br>Slap: 100<br>Double-Slap: 200</p><img src="http://www.speakvolumesmedia.com/wp-content/uploads/2013/05/miller.jpg"></img>
</div>

<div class="fav food">
	<p class="fav-header type">Vince / Drums</p><p class="item">ATTACKS:<br>Belly Drum: 5<br>Metronome: 80</p><img src="http://www.speakvolumesmedia.com/wp-content/uploads/2013/05/vince.jpg"></img>
</div>

<div class="fav food">
	<p class="fav-header type">Blake / Guitar</p><p class="item">ATTACKS:<br>Slash: 20<br>Lick: 140</p><img src="http://www.speakvolumesmedia.com/wp-content/uploads/2013/05/blake.jpg"></img>
</div>

<div class="fav food">
	<p class="fav-header type">Bobby / Trumpet</p><p class="item">ATTACKS:<br>Whirlwind: 30<br>Horn Attack: Instant KO</p><img src="http://www.speakvolumesmedia.com/wp-content/uploads/2013/05/bobby.jpg"></img>
</div>';
});



function svBillboardEndTag($featured) {
	if($featured): ?>
	</a>
	<?php else: ?>
	</div>
	<?php endif;
}

function svFeatureType() {
	if( has_category('interviews') ): ?>
		Interview
	<?php elseif( has_category('lists') ): ?>
		Lists <i class="icon-double-angle-right"></i>
	<?php elseif( has_category('speaking-volumes') ): ?>
		Speaking volumes
	<?php elseif( has_category('retrospective') ): ?>
		Retro:spective
	<?php elseif( has_category('whats-out-there') ): ?>
		What's Out There
	<?php elseif( has_category('local-spotlight') ): ?>
		Local Spotlight
	<?php elseif( has_category('Throwback Thursday') ): ?>
		Throwback Thursday
	<?php elseif( has_category('and-i-was-there') ): ?>
		&amp; I Was There
	<?php elseif( has_category('columns') ): ?>
		Columns <i class="icon-double-angle-right"></i>
	<?php else: ?>
		Features <i class="icon-double-angle-right"></i>
	<?php endif;
}

function svBillboardPost($featuredPosts,$index,$featured) {
	// $featuredPosts->the_post();
	$catColor = svGetCategoryColor();

	switch($catColor) {
		case "post-cat-music":
			svBillboardMusicPost($index,$featured);
			break;
		case "post-cat-features":
			svBillboardFeaturePost($index,$featured);
			break;
		case "post-cat-events":
			$type = '';
			if ( has_category('previews') ) {
				$type = 'preview';
			} else if ( has_category('reviews') ) {
				$type = 'review';
			}
			svBillboardEventPost($index,$featured,$type);
			break;
	}
	svBillboardThumbnail($featured,$catColor,$index);
}

function svBillboardFeaturePost($index,$featured) { ?>
	<?php if($featured): ?>
	<a class="carousel-slide-link bb-section bb-feat" data-slide="<?php echo $index; ?>" href="<?php the_permalink(); ?>">
	<?php else: ?>
	<div class="single-header bb-section bb-feat">
	<?php endif; ?>
		<div class="bb-section-inner">
			<div class="image feat-image">
				<div class="mask"></div>
				<div class="hidden"><?php the_post_thumbnail(); ?></div>
				<div class="color-triangle"></div>
				<i class="hover-arrow icon-double-angle-right"></i>
			</div>
			<div class="color-block hidden-xs"></div>

			<div class="text-block">
				<h2 class="category-header">
					<?php svFeatureType() ?>
				</h2>
				<h3 class="post-title"><?php svShortTitle(); ?></h3>
			</div>
			<h4 class="feat-excerpt hidden-xs"><?php echo get_the_excerpt(); ?></h4>
		</div>
	<?php
		svBillboardEndTag($featured);
}

function svMusicType() {
	if( has_category('fmm') ): ?>
		Free Music Monday
	<?php elseif( has_category('albums') ): ?>
		Album Review
	<?php elseif( has_category('mixes') ): ?>
		Exclusive Mix
	<?php elseif( has_category('tracks') ): ?>
		Track Review
	<?php elseif( has_category('the-week-that-was') ): ?>
		The Week That Was
	<?php elseif( has_category('news') ): ?>
		News
	<?php else: ?>
		Music <i class="icon-double-angle-right"></i>
	<?php endif;
}

function svMusicBillboardTitle() {
	// if( has_category('news') ):
	// 	svShortTitle();
	// elseif
	if( has_category('albums') and get_field('artistName') and get_field('workName') ): ?>
		<span class="music-title-part artist-name">
			<?php echo get_field('artistName') ?>
		</span>
		<em class="music-title-part work-name album-name">
			<?php echo get_field('workName') ?>
		</em>
	<?php elseif( has_category('tracks') and get_field('artistName') and get_field('workName') ): ?>
		<span class="music-title-part artist-name">
			<?php echo get_field('artistName') ?>
		</span>
		<span class="music-title-part work-name track-name">
			<?php echo get_field('workName') ?>
		</span>
	<?php else : ?>
		<span class="music-title-part work-name"><?php svShortTitle(); ?></span>
	<?php endif;
}

function svBillboardMusicPost($index,$featured) { ?>
	<?php if($featured): ?>
	<a class="carousel-slide-link bb-music bb-section" data-slide="<?php echo $index; ?>" href="<?php the_permalink(); ?>">
	<?php else: ?>
	<div class="single-header bb-section bb-music">
	<?php endif; ?>
		<div class="bb-section-inner">
			<div class="image feat-image">
				<div class="mask"></div>
				<div class="hidden"><?php the_post_thumbnail(); ?></div>
				<div class="color-triangle"></div>
				<i class="hover-arrow icon-double-angle-right"></i>
			</div>

			<div class="text-block">
				<div class="text-block-inner">
					<h2 class="category-header"><em><?php svMusicType() ?></em></h2>
					<h3 class="post-title"><?php svMusicBillboardTitle() ?></h3>
				</div>
			</div>
		</div>
	<?php
		svBillboardEndTag($featured);
}

function svBillboardEventPost($index,$featured,$type) { ?>
	<?php if($featured): ?>
	<a class="carousel-slide-link bb-event bb-section" data-slide="<?php echo $index; ?>" href="<?php the_permalink(); ?>">
	<?php else: ?>
	<div class="single-header bb-event bb-section">
	<?php endif; ?>
		<div class="bb-section-inner">
			<div class="image-wrapper">
				<div class="feat-event-image image-1 feat-image">
					<div class="hidden"><?php the_post_thumbnail(); ?></div>
				</div>
				<div class="feat-event-image image-2 feat-image">
					<div class="hidden"><?php the_post_thumbnail(); ?></div>
				</div>
				<div class="feat-event-image image-3 feat-image">
					<div class="hidden"><?php the_post_thumbnail(); ?></div>
				</div>
				<i class="hover-arrow icon-double-angle-right"></i>
			</div>

			<div class="mask"></div>

			<div class="text-block">
				<div class="text-block-inner">
					<?php
						if( have_rows('event_preview_info') ):
						    while ( have_rows('event_preview_info') ) : the_row();
								?>
								<h2>
									<?php if($type=='review'): ?>
										<span class="review">Event Review</span>
										<hr class="under-review">
										<div class="clearfix"></div>
									<?php endif; ?>
									<?php if( get_sub_field('organizer') ): ?>
										<span class="organizer"><?php the_sub_field('organizer') ?></span>
										<span class="presents">presents</span>
									<?php endif; ?>
									<?php svEventPreviewArtists('<span class="event-info event-location">', '</span>') ?>
									<span class="at-sign">@</span>
									<span class="venue">
										<?php if( get_sub_field('is_undisclosed_location') ): ?>
											Undisclosed Location
										<?php else: ?>
											<?php the_sub_field('venue') ?>
										<?php endif; ?>
									</span>
									<?php if($type=='preview'): ?>
										<!-- <span class="preposition">on</span>
										<span class="event-date">thursday june 7th, 2014</span> -->

										<?php
										if( !$featured && get_sub_field('fb_event_page') ): ?>
											<div class="text-center hidden-xs hidden-sm">
												<a class="fb-rsvp box-link" target="_blank" href="<?php the_sub_field('fb_event_page') ?>">
													RSVP on <i class="icon-facebook icon-large"></i>acebook
												</a>
											</div>
											<?
										endif;
										?>
									<?php endif; ?>

								</h2>
								<?php
						    endwhile;
						endif;
					?>
				</div>
			</div>
		</div>
	<?php
		svBillboardEndTag($featured);
}

function svEventPreviewArtists($startTag, $endTag) {
	$artists = get_sub_field('artists');
	if( !empty($artists) ) {
		echo $startTag;
		while( !empty($artists) ) {
			$artistInfo = array_shift($artists);
			$artist = $artistInfo[artist];
			$classes = 'event-artist';
			if( $artistInfo[is_big_name]==true ) {
				$classes = $classes.' lg';
			} else {
				$classes = $classes.' sm-artist';
			}
			if( count($artists) > 0 ) {
				echo '<span class="event-artist-wrapper">';
			}
			echo '<span class="'.$classes.'">' . $artist . '</span>';
			if( count($artists) > 0 ) {
				echo '<span class="plus-sign"> + </span></span>';
			}
		}
		echo $endTag;
	}
}

function svBillboardThumbnail($featured,$catColor,$index) {
	if($featured) { ?>
		<script id="thumb-link-template-<?php echo $index; ?>" type="thumb-link/template">
			<a href="#" class="thumb-link<?php svColorClass() ?>" data-slide="<?php echo $index; ?>" data-link="<?php the_permalink(); ?>">
	            <div class="thumb-link-inner">
	            	<div class="image feat-image">
						<div class="hidden"><?php the_post_thumbnail(); ?></div>
					</div>
	            </div>
	        </a>
		</script>
        <?php
	}
}

function svTrackOrAlbumTitle($the_post) {
	$artist = get_field('artistName');
	if($artist) {

		echo '<span class="artist">'. $artist .'</span>';

		$start;
		$end;

		if( has_category( 'tracks', $the_post) ) {
			$start = '&ldquo;';
			$end = '&rdquo;';
		}
		elseif( has_category( 'albums', $the_post) ) {
			$start = '<em>';
			$end = '</em>';
		}

		echo $start . get_field('workName') . $end;

	}
	else {
		svShortTitle();
	}
}

function svDownloadLink() {
	$is_direct = get_sub_field('is_direct_file');
	?>

	<div class="text-center">
		<a <?php if($is_direct) echo 'download' ?> class="dl-link box-link" target="_blank" href="<?php the_sub_field('url') ?>">
			<i class="icon-double-angle-down icon-large left-icon"></i>
			Download
			<?php if($is_direct): ?>
				<!--span class="direct">(direct file)</span-->
			<?php endif; ?>
		</a>
	</div>

	<?php
}

function svFacebookRSVPLink($atTopOfPost) {
	if (has_category( 'previews', $the_post )):

		if( have_rows('event_preview_info') ):
		    while ( have_rows('event_preview_info') ) : the_row();

		        if( get_sub_field('fb_event_page') ):
		        	$classes = 'text-right';
		        	if($atTopOfPost) {
		        		$classes = $classes.' hidden-md hidden-lg';
		        	}
		        	?>
					<div class="<?php echo $classes ?>">
						<a class="fb-rsvp box-link" target="_blank" href="<?php the_sub_field('fb_event_page') ?>">
							RSVP on <i class="icon-facebook icon-large"></i>acebook
						</a>
					</div>
					<?
				endif;

		    endwhile;
		endif;

	endif;
}

function svDropdownLinks($cat) {
	$navPosts = new WP_Query( array( 'category_name'=>$cat ) );
		for($i=0;$i<4;$i++):
			$navPosts->the_post(); ?>
			<a class="dropdown-post-link" href="<?php the_permalink(); ?>">
				<i class="icon-double-angle-right"></i>
				<?php the_title(); ?>
			</a>
	<?php endfor; ?>
		<a class="dropdown-post-link" href="<?php echo site_url('category/'.$cat); ?>">
			<i class="icon-double-angle-right"></i>
			VIEW MORE POSTS
		</a>
	<?php
}

function svStaffPic($filename) {
	?>
	<div class="square image">
	    <div class="hidden"><img class="attachment-post-thumbnail" src="<?php echo get_template_directory_uri(); ?>/img/staff/<?php echo $filename ?>.jpg"></div>
    </div>
<?php

function svEventPreviewInfo() {
	if (has_category( 'previews', $the_post )):

		if( have_rows('event_preview_info') ):
		    while ( have_rows('event_preview_info') ) : the_row();
				?>

				<div class="event-preview-info">
					<?php if( get_sub_field('organizer') ): ?>
						<span class="event-info event-location"><?php the_sub_field('organizer') ?></span>
						<span class="event-label">presents</span>
					<?php endif; ?>
					<?php svEventPreviewArtists('<span class="event-info event-location">', '</span>') ?>
					<span class="event-label">@</span>
					<span class="event-info location">
						<?php if( get_sub_field('is_undisclosed_location') ): ?>
							Undisclosed Location
						<?php else: ?>
						<?php endif; ?>
					</span>
					<span class="event-label">on</span>
					<span class="event-info event-date">thursday june 7th, 2014</span>

					<?php if( get_sub_field('fb_event_page') ): ?>
						<div class="text-center hidden-xs hidden-sm">
							<a class="fb-rsvp box-link" target="_blank" href="<?php the_sub_field('fb_event_page') ?>">
								RSVP on <i class="icon-facebook icon-large"></i>acebook
							</a>
						</div>
						<?
					endif; ?>

				</div>

				<?php
		    endwhile;
		endif;

	endif;
}


// end of file; need ending curly:
}
