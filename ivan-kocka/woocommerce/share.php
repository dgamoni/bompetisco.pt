<?php
/**
 * Share template
 *
 * @author Your Inspiration Themes
 * @package YITH WooCommerce Wishlist
 * @version 1.1.5
 */
?>

 <div class="share-icons">
    <?php if( $share_facebook_enabled ): ?>
        <a target="_blank" class="facebook" href="https://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $share_link_title ?>&amp;p[url]=<?php echo $share_link_url ?>&amp;p[summary]=<?php echo $share_summary ?>&amp;p[images][0]=<?php echo $share_image_url ?>" title="<?php _e( 'Facebook', 'yit' ) ?>"><i class="fa fa-facebook"></i></a>
    <?php endif; ?>

    <?php if( $share_twitter_enabled ): ?>
        <a target="_blank" class="twitter" href="https://twitter.com/share?url=<?php echo $share_link_url ?>&amp;text=<?php echo $share_twitter_summary ?>" title="<?php _e( 'Twitter', 'yit' ) ?>"><i class="fa fa-twitter"></i></a>
    <?php endif; ?>

    <?php if( $share_pinterest_enabled ): ?>
        <a target="_blank" class="pinterest" href="http://pinterest.com/pin/create/button/?url=<?php echo $share_link_url ?>&amp;description=<?php echo $share_summary ?>&media=<?php echo $share_image_url ?>" title="<?php _e( 'Pinterest', 'yit' ) ?>" onclick="window.open(this.href); return false;"><i class="fa fa-pinterest"></i></a>
    <?php endif; ?>

    <?php if( $share_googleplus_enabled ): ?>
        <a target="_blank" class="googleplus" href="https://plus.google.com/share?url=<?php echo $share_link_url ?>&amp;title=<?php echo $share_link_title ?>" title="<?php _e( 'Google Plus', 'yit' ) ?>" onclick='javascript:window.open(this.href, "", "menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600");return false;'><i class="fa fa-google-plus"></i></a>
    <?php endif; ?>

    <?php if( $share_email_enabled ): ?>
        <a class="email" href="mailto:?subject=I wanted you to see this site&amp;body=<?php echo $share_link_url ?>&amp;title=<?php echo $share_link_title ?>" title="<?php _e( 'Email', 'yit' ) ?>"><i class="fa fa-envelope"></i></a>
    <?php endif; ?>
</div>