<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

    <div class="wrap">
        <div class="content-area">
            <main id="main" class="site-main" role="main">

                <?php
                /* Start the Loop */
                while ( have_posts() ) : the_post(); ?>

                    <div class="single_title">
                        <h2><?php the_title(); ?></h2>
                    </div>

                    <div class="single_content">
                        <?php the_content(); ?>
                    </div>

                    <?php
                    $posts = get_field('products_event_single');
                    if( $posts ): ?>
                        <div class="products_in_single">
                            <?php echo '<h3>Product:</h3>'; ?>
                            <ul class="products_events">
                                <?php foreach( $posts as $p): ?>

                                    <li class="product_ev">
                                        <a href="<?php echo get_permalink( $p->ID ); ?>">
                                            <?php echo get_the_post_thumbnail( $p->ID, '175x100' ) ?>
                                        </a>
                                        <div style="overflow:hidden">
                                            <h4 class="products_ev_title"><?php echo $p->post_title; ?></h4>
                                            <p class="products_ev_price">
                                                <?php
                                                //												global $post;
                                                $product = new WC_Product($p->ID);
                                                echo     wc_price($product->get_price_including_tax(1,$product->get_price()));
                                                ?>
                                            </p>
                                            <a href="<?php echo get_permalink( $p->ID ); ?>">
                                                <p class="products_ev_link">View now</p>
                                            </a>
                                        </div>

                                    </li>

                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>



                    <?php the_post_navigation( array(
                        'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'twentyseventeen' ) . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '</span>%title</span>',
                        'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'twentyseventeen' ) . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ) . '</span></span>',
                    ) );

                endwhile; // End of the loop.
                ?>

            </main><!-- #main -->
        </div><!-- #primary -->
    </div><!-- .wrap -->

<?php get_footer();
