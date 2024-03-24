<?php 

add_shortcode( 'projects_categories', 'projects_categories_func' );
function projects_categories_func( $atts ){ 
	$out = '';
	ob_start();

	?>

<div class="ivan-projects-main-wrapper  lateral-cover-wrapper  vc_1542117061205" style="">
<div class="ivan-projects ivan-projects-grid vc_row iso-initialized cat_flex_wrap" style="">
<!-- <div class="gutter-sizer"></div> -->

	<?php 

	$terms = get_terms( array(
		'taxonomy'      => array( 'ivan_vc_projects_portfolios' ), 
	) );
	//echo "<pre style='display:none'>", var_dump($terms), "</pre>";

	foreach( $terms as $term ){
		$thumbnail = get_field('category_image', $term->taxonomy . '_' . $term->term_id);
		//$thumb_url =  wp_get_attachment_url( $thumbnail->ID );
		$size = array( 'width' => 350, 'height' => 350 );
		$image 			= '<img src="'. bfi_thumb( $thumbnail['url'], $size  ) .'" class="attachment-recetias-thumb size-recetias-thumb wp-post-image">';

	?>				
	<div class="vc_col-xs-12 vc_col-sm-4 vc_col-md-4 taphover ivan-project   _zoom-hover _lateral-cover _appear-hover all em-oleo-vegetal produtos em-azeite ao-natural azeite-virgem-extra-e-oregaos 5-pimentas pimenta-da-terra-e-ervas-finas" style="">

		<div class="ivan-project-inner">

			
			<div class="ivan-project-thumb-wrapper">
				<a href="<?php echo get_term_link( $term ); ?>" class="thumbnail" style="">
					<?php echo $image; ?>
					<span class="ivan-hover-fx"></span>
				</a>
			</div>
			<div class="entry category_name_wrap">
				<div class="entry-inner">
					<div class="centered">
						<h3><a href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a></h3>
						<!-- <div class="ivan-vc-separator small left"></div>  -->
					</div>
				</div>
			</div>
								</div>

		<div></div>
	</div>

				
<?php } ?>

</div></div>

	<?php
	$out .= ob_get_contents();
	ob_end_clean();

	return $out;
} 

