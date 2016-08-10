<?php
/*
    Template Name: Gallery Two
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

<!-- Adding Gallery Two Flexslider -->
<!--
<div class="flexslider">
  <ul class="slides">
    <li>
      <img src="<?php get_template_directory_uri() . '/wp-content/themes/kandy/img/imagetext/it1.jpg' ?>" />
    </li>
    <li>
      <img src="<?php get_template_directory_uri() . '/wp-content/themes/kandy/img/imagetext/it2.jpg' ?>" />
    </li>
    <li>
      <img src="<?php get_template_directory_uri() . '/wp-content/themes/kandy/img/imagetext/it3.jpg' ?>" />
    </li>  
  </ul>
</div>              
-->

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