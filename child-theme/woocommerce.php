<?php
/**
 * The template for displaying all pages
 */

get_header(); ?>

<div class="wrap">
	<div class="content-area">
		<main id="main" class="site-main" role="main">
			
			<?php woocommerce_content(); ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
