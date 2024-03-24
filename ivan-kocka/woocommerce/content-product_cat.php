<?php
/**
 * The template for displaying product category thumbnails within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product_cat.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.5.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ) {
	$woocommerce_loop['loop'] = 0;
}

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) ) {
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
}

// Increase loop count
$woocommerce_loop['loop']++;

// Bootstrap Column
$bootstrapColumn = round( 12 / $woocommerce_loop['columns'] );
//$classes[] = 'col-xs-12 col-sm-'. $bootstrapColumn .' col-md-' . $bootstrapColumn;
?>
<li <?php wc_product_cat_class('col-xs-12 col-sm-'. $bootstrapColumn .' col-md-' . $bootstrapColumn); ?>>

	<?php do_action( 'woocommerce_before_subcategory', $category ); ?>

	<?php
	// Apply custom background to categories blocks...

	$_style = '';

	$thumbnail_id = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true );
	$_image = wp_get_attachment_url( $thumbnail_id );

	if( $_image )
		$_style = 'background-image: url('.$_image.');';
	?>

	<a href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>" class="main-link" style="<?php echo $_style; ?>">

		<?php
			/**
			 * woocommerce_before_subcategory_title hook
			 *
			 * @hooked woocommerce_subcategory_thumbnail - 10
			 */
			do_action( 'woocommerce_before_subcategory_title', $category );
		?>

		<div class="gradient-overlay"></div>

		<h3>
			<?php
				echo '<span class="cat-title-inner">' . $category->name . '</span><span class="cat-count-inner">' . $category->count . ' ' . __('Products', 'ivan_domain') . '</span>';
			?>
		</h3>

		<?php
			/**
			 * woocommerce_after_subcategory_title hook
			 */
			do_action( 'woocommerce_after_subcategory_title', $category );
		?>

	</a>

	<?php do_action( 'woocommerce_after_subcategory', $category ); ?>

</li>