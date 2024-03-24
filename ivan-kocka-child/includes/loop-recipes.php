<?php
	global $post;
	//var_dump($post);
	$size = array( 'width' => 350, 'height' => 350 );
	$thumb_url =  wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	$image 			= '<img src="'. bfi_thumb( $thumb_url, $size  ) .'"class="attachment-recetias-thumb size-recetias-thumb wp-post-image">';
?>

	<div class=" term-wrap_<?php echo $term->term_id; ?> vc_col-xs-12 vc_col-sm-4 vc_col-md-4 taphover ivan-project   _zoom-hover _lateral-cover _appear-hover all em-oleo-vegetal produtos em-azeite ao-natural azeite-virgem-extra-e-oregaos 5-pimentas pimenta-da-terra-e-ervas-finas" style="">

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

		<div></div>
	</div>