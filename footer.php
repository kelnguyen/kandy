<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kandy
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
        
    <div id="socialmediabuttons"> 
        <div class="socialmedia-facebook">
            <a href="http://www.facebook.com"> Facebook</a>
        </div>
        <div class="socialmedia-twitter">
            <a href="http://www.twitter.com"> Twitter</a>
        </div>
        <div class="socialmedia-instagram">
            <a href="http://www.instagram.com"> Instagram</a>
        </div>
        <div class="socialmedia-linkedin">
            <a href="https://ca.linkedin.com/in/kellynguyen10"> Linked In</a>
        </div>
          <div class="socialmedia-vimeo">
            <a href="http://www.vimeo.com"> Vimeo</a>
        </div>
    </div> 
        
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'kandy' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'kandy' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'kandy' ), 'kandy', '<a href="http://underscores.me/" rel="designer">Kelly Nguyen</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
