<?php
/**
 * Template Name: Gallery Page
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kandy
 */

// Enqueue a Google Font //

function load_google_fonts() {
    wp_register_style('googlefonts', 'https://fonts.googleapis.com/css?family=Raleway');
    wp_enqueue_style('googlefonts');
}

add_action ('wp_print_styles', 'load_google_fonts'); 

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

    <div id="gallery">
            <!--    <img src="wp-content/themes/kandy/img/hairdyeportraits/hdp1.jpg" alt="" id="main-img" />
                <ul class="simg"> -->
                  <img src="wp-content/themes/kandy/img/hairdyeportraits/hdp1.jpg" alt="" width="50" />   
                  <img src="wp-content/themes/kandy/img/hairdyeportraits/hdp2.jpg" alt="" width="50" />
        
                  <img src="wp-content/themes/kandy/img/hairdyeportraits/hdp3.jpg" alt="" width="50" />
        
                  <img src="wp-content/themes/kandy/img/hairdyeportraits/hdp4.jpg" alt="" width="50" />
        
                  <img src="wp-content/themes/kandy/img/hairdyeportraits/hdp5.jpg" alt="" width="50" />
        </div>        
            
          
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_sidebar(); ?>
<?php get_footer(); ?>
