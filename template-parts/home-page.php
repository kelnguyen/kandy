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

<!-- Attempt to add Flexslider again here -->

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
    ?>
    </div>

<style>
    #main {
        background-color: <?php echo $options['kn_select_field']; ?>
    }
    
    #main {
        font-family: <?php echo $options['kn_select_field2']; ?>
    }
    
    #main {
        font-size: <?php echo $options['kn_select_field3']; ?>
    }
</style>


<?php get_footer(); ?>