<?php
	global $post;
	//var_dump($post);
	$size = array( 'width' => 350, 'height' => 350 );
	$thumb_url =  wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	$preview_image = get_field('preview_image', $post->ID );
	if ( $preview_image ) {
		$image 			= '<img src="'. $preview_image .'"class="attachment-recetias-thumb size-recetias-thumb wp-post-image">';
	} else {
		$image 			= '<img src="'. bfi_thumb( $thumb_url, $size  ) .'"class="attachment-recetias-thumb size-recetias-thumb wp-post-image">';
	}
	// $image 			= '<img src="'. bfi_thumb( $thumb_url, $size  ) .'"class="attachment-recetias-thumb size-recetias-thumb wp-post-image">';
	$cur_terms = get_the_terms( $post->ID , 'ivan_vc_projects_cats' );
	$class = '';
	if( is_array( $cur_terms ) ){
		foreach( $cur_terms as $cur_term ) {
			$class .= 'cats-'. $cur_term->slug .' ';
		}
	}
	$cur_terms_t = get_the_terms( $post->ID , 'receitas_tags' );
	//var_dump($cur_terms_t);
	if( is_array( $cur_terms_t ) ){
		foreach( $cur_terms_t as $cur_term_t ) {
			$class .= 'tags-'. $cur_term_t->slug .' ';
		}
	}	
?>

	<div class="<?php echo $class; ?> vc_col-xs-12 vc_col-sm-4 vc_col-md-4 taphover ivan-project" >
		<div class="ivan-project-inner">
			<div class="ivan-project-thumb-wrapper">
				<a href="<?php echo get_permalink( $post->ID); ?>" class="thumbnail" style="">
					<?php echo $image; ?>
					<span class="ivan-hover-fx"></span>
				</a>
			</div>
			<div class="entry category_name_wrap">
				<div class="entry-inner">
					<div class="centered">
						<h3><a href="<?php echo get_permalink( $post->ID); ?>"><?php echo get_the_title($post->ID ); ?></a></h3>
						<!-- <div class="ivan-vc-separator small left"></div>  -->
					</div>
				</div>
			</div>
		</div>
	</div>