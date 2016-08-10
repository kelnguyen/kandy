<?php
/*
    Template Name: Gallery One
*/

get_header(); ?>

<link rel="stylesheet" href="flexslider.css" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script src="jquery.flexslider.js"></script>

<script type="text/javascript" charset="utf-8">
  $(window).load(function() {
    $('.flexslider').flexslider();
  });
</script>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            
            
            

<!-- Adding Gallery One Flexslider -->
<!-- 
<div class="flexslider">
  <ul class="slides">
    <li>
      <img src="<?php get_template_directory_uri() . '/wp-content/themes/kandy/img/campuslandscape/cl1.jpg' ?>" />
    </li>
    <li>
      <img src="<?php get_template_directory_uri() . '/wp-content/themes/kandy/img/campuslandscape/cl2.jpg' ?>" />
    </li>
    <li>
      <img src="<?php get_template_directory_uri() . '/wp-content/themes/kandy/img/campuslandscape/cl3.jpg' ?>" />
    </li>
    <li>
      <img src="<?php get_template_directory_uri() . '/wp-content/themes/kandy/img/campuslandscape/cl14.jpg' ?>" />
    </li>
    <li>
      <img src="<?php get_template_directory_uri() . '/wp-content/themes/kandy/img/campuslandscape/cl5.jpg' ?>" />
    </li>  
  </ul>
</div>              
-->
            
<div class="flex-container">
  <div class="flexslider">
	<ul class="slides">
	<?php
	$flex = new WP_Query(array('campus landscape' => 'featured', 'posts_per_page' => 5));
	if($flex->have_posts()) :
	    while($flex->have_posts()) : $flex->the_post();
	?>
	  <li>
		<?php the_post_thumbnail(); ?>
		<p class="flex-caption"><?php the_excerpt(); ?></p>
	  </li>
	<?php
	    endwhile;
	endif;
	?>
	</ul>
  </div>
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