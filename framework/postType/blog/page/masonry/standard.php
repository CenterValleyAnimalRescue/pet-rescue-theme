<?php
/**
 * @package 	WordPress
 * @subpackage 	Pet Rescue
 * @version 	1.0.0
 * 
 * Blog Page Masonry Standard Post Format Template
 * Created by CMSMasters
 * 
 */


global $cmsms_metadata;


$cmsms_post_metadata = explode(',', $cmsms_metadata);

$date = (in_array('date', $cmsms_post_metadata) || is_home()) ? true : false;
$categories = (get_the_category() && (in_array('categories', $cmsms_post_metadata) || is_home())) ? true : false;
$author = (in_array('author', $cmsms_post_metadata) || is_home()) ? true : false;
$comments = (comments_open() && (in_array('comments', $cmsms_post_metadata) || is_home())) ? true : false;
$likes = (in_array('likes', $cmsms_post_metadata) || is_home()) ? true : false;
$tags = (get_the_tags() && (in_array('tags', $cmsms_post_metadata) || is_home())) ? true : false;
$more = (in_array('more', $cmsms_post_metadata) || is_home()) ? true : false;


$post_sort_categs = get_the_terms(0, 'category');

if ($post_sort_categs != '') {
	$post_categs = '';
	
	foreach ($post_sort_categs as $post_sort_categ) {
		$post_categs .= ' ' . $post_sort_categ->slug;
	}
	
	$post_categs = ltrim($post_categs, ' ');
}

?>

<!--_________________________ Start Standard Article _________________________ -->

<article id="post-<?php the_ID(); ?>" <?php post_class('cmsms_masonry_type'); ?> data-category="<?php echo $post_categs; ?>">
<?php
	if (!post_password_required() && has_post_thumbnail()) {
		cmsms_thumb(get_the_ID(), 'blog-masonry-thumb', true, false, true, false, true, true, false);
	}
?>
	<div class="cmsms_post_cont">
		<div class="cmsms_post_info entry-meta">
			<span class="cmsms_post_format_img <?php 
				if (is_sticky()) {
					echo ' cmsms_theme_icon_attach';
				} else {
					echo ' cmsms_theme_icon_desktop';
				}
			?>"></span>
			
			<?php $date ? cmsms_post_date('page') : ''; ?>
		</div>
	<?php	
		cmsms_post_heading(get_the_ID(), 'h6');
		
		cmsms_post_exc_cont();
		
		if ($likes || $comments) {
			echo '<footer class="cmsms_post_footer entry-meta">' . 
				'<div class="cmsms_post_meta_info">';
					
						$likes ? cmsms_post_like('page') : '';
						
						$comments ? cmsms_post_comments('page') : '';
					
				echo '</div>' . 
			'</footer>';
		}
		
		if ($author || $categories || $tags) {
			echo '<div class="cmsms_post_cont_info entry-meta">';
			
				$author ? cmsms_post_author('page') : '';
				
				$categories ? cmsms_post_category('page') : '';
				
				$tags ? cmsms_post_tags('page') : '';
				
			echo '</div>';
		}
		
		$more ? cmsms_post_more(get_the_ID()) : '';
	?>
	</div>
</article>
<!--_________________________ Finish Standard Article _________________________ -->

