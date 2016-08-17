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


<div class="flex-container">
  <div class="flexslider">
	<ul class="slides">
	<?php
	$flex = new WP_Query(array('photography' => 'featured', 'posts_per_page' => 5));
	if($flex->have_posts()) :
	    while($flex->have_posts()) : $flex->the_post();
	?>
	  <li>
		<?php the_post_thumbnail(); ?>
		
	  </li>
	<?php
	    endwhile;
	endif;
	?>
	</ul>
  </div>
</div>

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