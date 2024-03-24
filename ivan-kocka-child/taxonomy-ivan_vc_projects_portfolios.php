<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package ivan_framework
 */

get_header(); ?>

	<?php

	$_classes = '';

	// Title Logic
	if( ( false == ivan_get_option('archives-disable-title') && false == ivan_get_option('blog-boxed-page') )
		OR true == ivan_get_option('header-negative-height') ) :
		do_action( 'ivan_title_wrapper' );
	else :
		
		echo apply_filters('ivan_blog_divider', '<div class="title-wrapper-divider blog-version"></div>');

		$_classes .= ' no-title-wrapper';
	endif;

	/* @todo: adds who is being hooked */
	do_action( 'ivan_content_before' ); 
	?>

	<?php
	// Boxed Style Support
	if( true == ivan_get_option('blog-boxed-style') )
		$_classes .= ' boxed-style';

	// Get Layout Option
	$_layout = ivan_get_option('blog-layout');

	$_sub_layout = ivan_get_option('blog-sub-' . $_layout );
	
	?>

	<div class="<?php echo apply_filters( 'iv_content_wrapper_classes', 'iv-layout content-wrapper index archives', 'blog' ); ?> blog-<?php echo $_layout . ' style-' . $_sub_layout; ?><?php echo $_classes ?>">
		<div class="container">

			<?php
			// Boxed Page Logic
			if( true == ivan_get_option('blog-boxed-page') ) : ?>
			<div class="boxed-page-wrapper">
				
				<?php
				// Adds Title
				if( false == ivan_get_option('archives-disable-title') && true == ivan_get_option('blog-boxed-page')
					&& false == ivan_get_option('header-negative-height') ) :
					do_action( 'ivan_title_wrapper' );
				endif; ?>

				<div class="boxed-page-inner">
			<?php endif; ?>

				<div class="row">


<div class="ivan-projects-main-wrapper  lateral-cover-wrapper  vc_1542117061205" style="">
<div class="ivan-projects ivan-projects-grid vc_row iso-initialized cat_flex_wrap" style="">

					<?php

						//var_dump(get_queried_object()->term_id);

							$args = array(
								
					
								// Type & Status Parameters
								'post_type'   => 'ivan_vc_projects',
								'post_status' => 'publish',

						
								// Order & Orderby Parameters
								'order'               => 'DESC',
								'orderby'             => 'date',

						
								// Taxonomy Parameters
								'tax_query' => array(
									'relation' => 'AND',
									array(
										'taxonomy'         => 'ivan_vc_projects_portfolios',
										'field'            => 'id',
										'terms'            => array( get_queried_object()->term_id)
									)
								)
						
							);
						
						$the_query = new WP_Query( $args );

						while ( $the_query->have_posts() ) : $the_query->the_post();
						setup_postdata( $post );
							//var_dump( get_the_title($post->ID ));
							//var_dump( get_the_post_thumbnail( $post->ID ) );
						$size = array( 'width' => 350, 'height' => 350 );
						$thumb_url =  wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
						$image 			= '<img src="'. bfi_thumb( $thumb_url, $size  ) .'"class="attachment-recetias-thumb size-recetias-thumb wp-post-image">';
?>
	<div class="vc_col-xs-12 vc_col-sm-4 vc_col-md-4 taphover ivan-project   _zoom-hover _lateral-cover _appear-hover all em-oleo-vegetal produtos em-azeite ao-natural azeite-virgem-extra-e-oregaos 5-pimentas pimenta-da-terra-e-ervas-finas" style="">

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

<?php
						endwhile;
						wp_reset_postdata();
						wp_reset_query();						

					?>
</div></div>
				</div>

			<?php
			// Boxed Page Logic
			if( true == ivan_get_option('blog-boxed-page') ) : ?>
				</div><!-- .boxed-page-inner -->
			</div><!-- .boxed-page-wrapper -->
			<?php endif; ?>

		</div>
	</div>

	<?php
	/* @todo: adds who is being hooked */
	do_action( 'ivan_content_after' ); 
	?>

<?php get_footer(); ?>