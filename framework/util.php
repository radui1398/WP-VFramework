<?php
function phonenr($args)
{
    $str = $args;
    $str = preg_replace('/[^+0-9a-zA-Z]/', '', $str);
    return $str;
}

/* Search Filters */
// function searchfilter($query) {
// 	if ($query->is_search && !is_admin() ) {
// 		$query->set('post_type',array('post'));
// 	}
// 	return $query;
// }
// add_filter('pre_get_posts','searchfilter');

function slugify($text)
{
    // replace non letter or digits by -
    $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
    // trim
    $text = trim($text, '-');
    // transliterate
    if (function_exists('iconv')) {
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    }
    // lowercase
    $text = strtolower($text);
    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);
    if (empty($text)) {
        return 'n-a';
    }
    return $text;
}

/**
 * Auto Copyright
 */
function auto_copyright($year = 'auto')
{
    if (intval($year) == 'auto') {
        $year = date('Y');
    }
    if (intval($year) == date('Y')) {
        return intval($year);
    }
    if (intval($year) < date('Y')) {
        return intval($year) . ' - ' . date('Y');
    }
    if (intval($year) > date('Y')) {
        return date('Y');
    }
}

function remove_http($url)
{
    $disallowed = array('http://', 'https://');
    foreach ($disallowed as $d) {
        if (strpos($url, $d) === 0) {
            return str_replace($d, '', $url);
        }
    }
    return $url;
}

function get_image($img)
{
    return get_template_directory_uri() . "/assets/images/" . $img;
}

function create_link($object, $class = null)
{
    $link = '<a href="';
    $link .= esc_url($object['url']);
    $link .= '" target="';
    $link .= $object['target'] ? $object['target'] : '_self';
    $link .= '" class="';
    if ($class) {
        if (!is_array($class)) {
            $link .= $class;
        } else {
            foreach ($class as $cls) {
                $link .= $cls . ' ';
            }
        }
    }

    $link .= '">';
    $link .= $object['title'];
    $link .= '</a>';
    return $link;
}


/**
 * Get Featured image of a page/post type
 *
 * @param id        => is the main ID
 * @param size        => the size of the image / default value = full
 * @param type        => img or bg
 * @param class    => extra classes added for img tag
 * @param $no_img => default img
 * @return img tag or style background image
 */
function get_featured_img($id = "", $size = "full", $type = "", $class = "", $no_img)
{
    if (!$id) {
        $id = get_the_ID();
    }

    if (has_post_thumbnail($id)) {
        $img = wp_get_attachment_image_src(get_post_thumbnail_id($id), $size);
        if (!$img)
            $img[0] = $no_img;
        switch ($type) {
            case 'img':
                return '<img src="' . $img[0] . '" alt="' . esc_html(get_the_post_thumbnail_caption($id)) . '"' . ($class ? ' class="' . $class . '"' : '') . '>';
                break;
            case 'bg':
                return 'style="background-image:url(' . $img[0] . ')"';
                break;
            default:
                break;
        }
    } else {
        if (!empty($no_img)) {
            switch ($type) {
                case 'img':
                    return '<img src="' . $no_img . '" alt="">';
                    break;
                case 'bg':
                    return 'style="background-image:url(' . $no_img . ')"';
                    break;
                default:
                    break;
            }
        }
    }
}

// Function Share Buttons
// @param type of network and page id
// @return url for share_network
function share_network($network, $id)
{
    switch ($network) {
        case 'facebook':
            echo "https://www.facebook.com/sharer/sharer.php?u=" . get_permalink($id);
            break;
        case 'twitter':
            echo "http://twitter.com/home?status=" . get_the_title($id) . "+" . get_permalink($id);
            break;
        case 'linkedin':
            echo "http://www.linkedin.com/shareArticle?mini=true&url=" . get_permalink($id) . "&title=" . get_the_title($id) . "&source=" . site_url();
            break;
        case 'pinterest':
            $img = wp_get_attachment_image_src(get_post_thumbnail_id($id), 'full');
            if ($img[0]) {
                echo "http://pinterest.com/pin/create/button/?url=" . get_permalink($id) . "&media={" . $img[0] . "}&description=" . get_the_title($id);
            }
            break;
        default:
            break;
    }
}

//get public directory
function public_dir()
{
    return get_template_directory_uri() . '/public';
}

// CF7 Span Removal
/*add_filter('wpcf7_form_elements', function($content) {
		$content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);
		return $content;
});*/

// Ajax Function
/*function functionHere() {

}
add_action( 'wp_ajax_functionHere', 'functionHere' );
add_action( 'wp_ajax_nopriv_functionHere', 'functionHere' );*/

// ob clear functions
/*function show_projects_from_cat(){ // $cat_id
	ob_start();

	$content = ob_get_clean();
	return $content;
} */


// Simple Loop
/*
		$args =  array(
            'ignore_sticky_posts' 	=> true,
            'post_type'           	=> 'portafolio-item',
            'order'              	=> 'DESC',
            'posts_per_page'		=> -1,

		);

    	$args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
	 	$loop = new WP_Query( $args );
			$count = 1 ;
			if ($loop->have_posts()) {  ?>
				<?php  while ($loop->have_posts())	{  $loop->the_post(); ?>


				<?php }	?>
	 	 <?php //  wp_pagenavi(array( 'query' => $loop )); ?>


	 	 <?php /*

			<?php
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
				?>

	 	 */ /*?>

<?php }	?>
<?php wp_reset_query(); ?>