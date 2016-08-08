<?php
/**
 * Template Name: New Page Template
 */
 
 
/**
 * Author: Kelly Nguyen
 * Assignment One
 *
 * Add custom query / a specific category of posts
 * Custom div class arrangement for grid layout
 *Running a custom navigation function for the specific query type. 
 */
 
 
get_header(); ?>


<div id="primary" class="content-area">
<main id="main" class="site-main" role="main">
	<?php
	/**
	 * Loop to show post title and content
	 */
	?>
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<header class="entry-header">
				<h1 class="page-title"><?php the_title(); ?></h1>
			</header>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		<?php endwhile; ?>

		<div class="entry-content columns">

		<?php
		/**
		 * Create a new WP_Query
		 * Initiate $paged variable so pagination works
		 */
		?>

		<?php
			global $wp_query; $post; $post_id = $post-> ID;
			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			rewind_posts();
			$temp = $wp_query;
			$wp_query = NULL;
			$options = get_option( 'kn_options_settings');

			$show_posts = '5'; // change this to show a specific number of posts per page
			$cat = $options['kn_text_field'];
			//post-formats'; // change this to specify category to show
			$image_size = array(330,330); // change to specify featured image size

		?>
		<?php $wp_query = new WP_Query( 'posts_per_page=' . $show_posts . '&paged=' . $paged . '&category_name=' . $cat ); ?>
			<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
			<div class="column">
				<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__('Link to %s'),the_title_attribute('echo=0')); ?>">
				<?php the_post_thumbnail($image_size); ?></a>
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__('Link to %s'),the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h2>
			</div><!-- .column -->
			<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
			</div><!-- .columns -->

		<?php  //running the custom post navigation function using the custom query made
		 if (function_exists("pagination")) {
  			  pagination($wp_query->max_num_pages);
				} 
		  ?>

		<?php $wp_query = NULL; $wp_query = $temp; ?>

	<?php else : ?>

		<article id="post-0" class="post no-results not-found">
			<header class="entry-header">
				<h1 class="entry-title">Nothing Found</h1>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<p>We can&rsquo;t find what you&rsquo;re looking for. Please try again.</p>
				<?php get_search_form(); ?>
			</div><!-- .entry-content -->
		</article><!-- #post-0 -->

	<?php endif; ?>
</main><!-- #main -->
</div><!-- .content-area -->
<?php
get_sidebar();
get_footer();
?>