<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since The Moms Embroidery 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the single post content template.
			get_template_part( 'template-parts/content', 'single' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
			// End of the loop.
		endwhile;
		?>

			</main><!-- .site-main -->
	</div><!-- .content-area -->
 </div>
<div id="sidebar" class="col-md-4">
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
