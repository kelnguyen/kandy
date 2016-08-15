<?php
/*
    Template Name: Gallery Two - Hair Dye Portraits
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

<!-- Shows posts of one selected category based on ID NTS: Change back category numbers (Desserts is #17) when uploading to Phoenix // select a gallery post ID for this assignment -->
            
		<?php
		if ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>             

<!-- Test ^ -->
            
<?php 
    $paged = (get_query_var( 'paged' )) ? get_query_var( 'paged' ) : 1;        
    $args = array('showposts'=>5, 'cat'=>18, 'order'=>'ASC' ); 
            
    query_posts($args);
    $knquery = new WP_Query($args); 
?>

<?php 
    if ($knquery->have_posts()) : 
    while ( $knquery->have_posts()) : 
    $knquery->the_post(); 
?>    
            
    <article id="post-<?php the_ID(); ?>"

<?php post_class(); ?>>
    
    <h2 class="post-title">
<?php the_title(); ?>
    </h2>

    <div class="entry-content">

<!-- Show thumbnails for posts -->
        
<?php if ( has_post_thumbnail() ) 
    ?>
        <a href="<?php the_permalink(); ?>" title=" 
    <?php the_title_attribute(); ?>" >
    <?php 
        the_post_thumbnail(); 
    ?>
        </a>     
        
    </div><!-- .entry-content -->
        
    </article><!-- #post-## -->
            
<?php endwhile; endif; ?>  
            
		</main><!-- #main -->
        
<div class="nav-previous alignright">
    <?php next_posts_link(__( 'Next &rarr;', 'underscores' ) ); 		?> </div>  			 			 		
<div class="nav-next alignleft">
    <?php previous_posts_link( __( '&larr; Previous', 'underscores' )  );  		?> </div>
        
	</div><!-- #primary -->
          

			<?php /*
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop. */
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>