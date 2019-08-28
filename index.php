<?php 
defined( 'ABSPATH' ) or die( 'Direct access is forbidden!' );
get_header(); ?>


<h1><?php if ( is_404() || is_category() || is_tag() || is_day() || is_month() || is_year() || is_search() ) { ?>
	<?php /* If this is a category archive */ if (is_category()) { ?>
		<?php single_cat_title(); ?>
	<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<?php  _e('Tag: ', THEME_TEXT_DOMAIN); single_tag_title(); ?>
	<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<?php the_time('F jS, Y'); _e(' Archives ', THEME_TEXT_DOMAIN); ?> 
	<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<?php the_time('F, Y'); _e(' Archives ', THEME_TEXT_DOMAIN); ?>  
	<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<?php the_time('Y'); _e(' Archives ', THEME_TEXT_DOMAIN); ?> 
	<?php /* If this is an author archive */ } elseif (is_author()) { 
		_e('Author Archive ', THEME_TEXT_DOMAIN);	?>
	<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { 
		_e('Blog Archives ', THEME_TEXT_DOMAIN);	?>
	<?php } elseif( is_search() )	{ ?>
		<?php _e('Results for: ', THEME_TEXT_DOMAIN); the_search_query() ?>
	<?php } ?>
<?php } else { ?>
	 <?php _e('Blog ', THEME_TEXT_DOMAIN); if ( $paged ) {echo  _e(' - Page ', THEME_TEXT_DOMAIN). $paged; } ?>
<?php } ?></h1>



<?php global $wp_query;
	$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
	query_posts( array_merge( $wp_query->query_vars, array( 'ignore_sticky_posts' => true, 'paged' => $paged) ) );?>
	<?php if (have_posts())	: $x = 0; ?>
	
		<?php while (have_posts())	: the_post(); $x++; $pg_id = get_the_ID(); ?>

			<article class="article-item">
				<a href="<?php echo get_permalink($id); ?>" title="" class="image" style="background-image: url(<?php $img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'post_image');
					if($img[0]){ echo $img[0]; } else { echo get_template_directory_uri().'/images/no-post.jpg'; } ?>);"></a>
				<div class="text-content">
					<h3><a href="<?php echo get_permalink($id); ?>" title=""><?php echo get_the_title($id); ?></a></h3>
					<span><?php echo get_the_date('F j, Y'); ?></span>
					<p><?php echo get_the_excerpt(); ?></p>
					<a href="<?php echo get_permalink($id); ?>" title="" class="read-more"><?php _e('Read More', THEME_TEXT_DOMAIN); ?></a>
				</div>
			</article>

		<?php endwhile; ?>
		
	<?php endif; ?>		



	<div class="wp-pagenavi"><?php
		global $wp_query;
		$big = 999999999; 
		echo paginate_links( array(
			'base' 			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' 		=> '?paged=%#%',
			'current' 		=> max( 1, get_query_var('paged') ),
			'total' 		=> $wp_query->max_num_pages,
			'type' 			=> 'list',
			'prev_next'    	=> True,
			'prev_text'    	=> "«" ,
			'next_text'    	=> "»" 
				
		) );
	?></div>

<?php get_footer(); ?>