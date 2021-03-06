<?php
/**
 * Template Name: Contact Page
 *
 * @package kandy
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
    
            
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
			/*	if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
            */
			endwhile; // End of the loop. 
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

  <div id="options">        
    <?php $options = get_option( 'kn_options_settings' ); 
    
    if (isset($options['kn_radio_field']) == 'true'){
        echo $options['kn_radio_field'] .'<br />';    
    } 
        
    echo $options['kn_text_field'] .'<br />';    
    
    ?>
    </div>

<?php get_footer(); ?>