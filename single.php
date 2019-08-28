<?php 
defined( 'ABSPATH' ) or die( 'Direct access is forbidden!' ); 
get_header();

$main_id = get_the_ID(); ?>

<?php  echo get_featured_img(get_the_ID(),  "full", "img", "",  ""); ?>

<div <?php  echo get_featured_img(get_the_ID(),  "full", "bg", "",  ""); ?>></div>

<div class="page-content article-page">
	<div class="page-banner" style="background-image: url(<?php $img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'banner');
				if($img[0]){ echo $img[0]; } ?>);">
		<div class="inner-content">
			<h1><?php echo get_the_title(); ?></h1>
		</div>
	</div>
	<div class="inner-content">
		<article>
			<div class="article-content">
				<div class="general-content">
					<?php  echo share_network('facebook', $main_id);
							echo share_network('twitter', $main_id);
							echo share_network('linkedin', $main_id);
							echo share_network('pinterest', $main_id);  ?>
					<?php if (have_posts()) : while (have_posts()) : the_post();?>
						<?php the_content(); ?>
					<?php endwhile; endif; ?>
				</div>
			</div>
		</article>
	</div>
</div>

<?php get_footer(); ?>