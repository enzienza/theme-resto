<?php get_header(); ?>


<section id="error">
    <?php
        wp_reset_postdata();

        $args = array(
            'post_type' => 'covers',    // nom du CPT
            'posts_per_page' => 1,      // limite
            'orderby' => 'id',
            'meta_key' => 'sticky',     // uniquement ceux qui on la mise en avant en 'oui'
            'meta_value' => 'oui'
        );
        $my_query = new WP_query($args);
        if($my_query->have_posts()) : while($my_query->have_posts()) : $my_query->the_post();
     ?>
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-12 error-box-left">
                    <div class="big-logo">
                        <img src="<?php echo get_post_meta($post->ID, 'logo', true); ?>" alt="">
                        <p><?php bloginfo('name'); ?></p>
                    </div><!-- ./ big-logo-->
                </div>
                <div class="col-md-7 col-12 error-box-right">
                    <h1><?php esc_html_e( '404 Error', 'fullbase' ); ?></h1>
                    <h2 class="titre-h1">Oops! Cette page est introuvable.</h2>

                </div>
            </div>
        </div>
        <?php endwhile; endif;  wp_reset_postdata(); ?>

</section>


<?php get_footer(); ?>
