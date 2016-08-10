<?php
/*
    Template Name: Gallery One
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

<!-- Shows posts of one selected category based on ID NTS: Change back category numbers (Desserts is #17) when uploading to Phoenix // select a gallery post ID for this assignment -->
<?php 
    $paged = (get_query_var( 'paged' )) ? get_query_var( 'paged' ) : 1;        
    $args = array('showposts'=>5, 'cat'=>207, 'order'=>'ASC' ); 
            
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
    <?php next_posts_link(__( 'Next Posts &rarr;', 'underscores' ) ); 		?> </div>  			 			 		
<div class="nav-next alignleft">
    <?php previous_posts_link( __( '&larr; Previous Posts', 'underscores' )  );  		?> </div>
        
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>