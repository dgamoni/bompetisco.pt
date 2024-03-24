<?php

/*
Template Name: Receitas
*/

get_header(); ?>


	<div class="receitas-layout iv-layout content-wrapper index archives blog-large style-simple _boxed-style">
		<div class="container">

			<div class="row">

					<div class="receitas-title">
						<?php echo get_the_title(); ?>
					</div>
					
					<div class="ivan_vc_projects_cats_wrap ivan_vc_projects_cats_filter">
						<?php
							$arg = array(
								'taxonomy' => array( 'ivan_vc_projects_cats' ), 
								'hide_empty' => false,
							);
							$terms = get_terms( $arg );	
							//var_dump($terms);

							foreach( $terms as $key => $term ) {
								$thumbnail = get_field('product_categories_icon', $term->taxonomy . '_' . $term->term_id);
								$size = array( 'width' => 350, 'height' => 350 );
								$image 			= '<img src="'. bfi_thumb( $thumbnail['url'], $size  ) .'" class="attachment-recetias-thumb size-recetias-thumb wp-post-image">';
								?>
									<div class="product_category-el product_categories-<?php echo $term->term_id; ?>" data-termid="<?php echo $term->term_id; ?>" data-termname="<?php echo $term->name; ?>" data-tax="ivan_vc_projects_cats">
										<?php echo $image; ?>
										<div class="product_categories-title">
											<?php echo $term->name; ?>
										</div>
									</div>
								<?php
							}
						?>					
					</div>

					<div class="ivan_vc_projects_tags_wrap ivan_vc_projects_cats_filter-search ">
						<form id="cats_filter-search" role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
							<input type="search" class="search-field search-autocomplete" placeholder="<?php _e( 'Quero uma receita …', 'bompetisco' ); ?>" value="" name="s">
							<input type="submit" class="search-submit" value="Ok">
							<div class="reset_filters"><?php _e( 'Limpar filtros', 'bompetisco' ); ?></div>
						</form>
						<div class="ajax_search_wrap">
							<?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
							<!-- <div class="reset_filters"><?php _e( 'Limpar filtros', 'bompetisco' ); ?></div> -->
						</div>
						
						<div class="ivan_vc_projects_receitas_tags_wrap ivan_vc_projects_cats_filter">
							<div class="product_tags-el product_tags-el_sugest">
								<?php _e( 'Sugestões:', 'bompetisco' ); ?>
							</div>
							<?php
								$arg = array(
									'taxonomy' => array( 'receitas_tags' ), 
									'hide_empty' => false,
									//'orderby' => 'rand',
    								//'number' => 3	
								);
								$terms = get_terms( $arg );
								shuffle( $terms );
								$random_terms = array_slice( $terms, 0, 3 );	
								foreach( $random_terms as $key => $term ) { ?>
										<div class="product_tags-el product_tags-ell product_tags-<?php echo $term->term_id; ?>" data-termid="<?php echo $term->term_id; ?>" data-termname="<?php echo $term->name; ?>" data-tax="receitas_tags">
											<div class="product_tags-title">
												<?php echo $term->name; ?>
											</div>
										</div>
									<?php
								}
							?>					
						</div>						
					</div>

			</div>
		</div>
	</div>
				
	<div class="receitas-layout-content receitas-layout iv-layout content-wrapper index archives blog-large style-simple boxed-style">
		<div class="container">
			<div class="row">

				<div class="ivan-projects-main-wrapper  lateral-cover-wrapper" >
						
						<div class="projects_cats_filter-result-title">
							<span class="resultado-title"><?php _e( 'Resultado:', 'bompetisco' ); ?></span>
							<span id="resultado" class="resultado" data-cat="" data-tag=""></span>
						</div>					

					<div class="ivan-projects ivan-projects-grid vc_row iso-initialized cat_flex_wrap" >

						<div class="projects_cats_filter-result">
							<?php
								echo do_shortcode('[projects_categories]');
							?>
						</div>

					</div> <!-- /ivan-projects-grid -->
				</div> <!-- /ivan-projects-main-wrapper -->

			</div> <!-- /row -->
		</div> <!-- /container -->
	</div> <!-- /receitas-layout -->



<?php get_footer(); ?>