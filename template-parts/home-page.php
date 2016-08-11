<?php
/**
 * Template Name: Home Page
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kandy
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

    <div id="options">        
    <?php $options = get_option( 'kn_options_settings' ); 
    echo $options['kn_text_field'] .'<br />';
    
    if (isset($options['kn_radio_field']) == 'true'){
        echo $options['kn_radio_field'] .'<br />';    
    } 
    
    ?>
    </div>
              
            
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



<?php get_footer(); ?>