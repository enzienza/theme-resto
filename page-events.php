<?php
/* Template Name: evenement */
?>
<?php get_header(); ?>

<!-- ===== DEBUT SECTION-CONTACT ===== -->
<!-- debut section specialite -->
<section id="page-event" class="container-fluif">
    <div class="bg_dark">

    </div>
    <div class="container page-event-content">
        <h1 class="titre-h1">Nos événements</h1>
        <div class="row">
            <?php
            wp_reset_postdata();

            $args = array(
                'post_type' => 'events',    // nom du CPT
                'posts_per_page' => -1,      // limite
                'orderby' => 'id',
                'meta_key' => 'sticky',     // uniquement ceux qui on la mise en avant en 'oui'
                'meta_value' => 'oui'
            );
            $my_query = new WP_query($args);
            if($my_query->have_posts()) : while($my_query->have_posts()) : $my_query->the_post();
            ?>


            <div class="col-lg-4 col-md-6 col-12">
                <a href="<?php permalink_link(); ?>">
                    <div class="card">
                        <div class="card-img-top">
                            <?php the_post_thumbnail(); ?>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title"><?php the_title(); ?></h3>
                        </div>
                    </div>
                </a>
            </div>



        <?php endwhile; endif;  wp_reset_postdata(); ?>
    </div>
</div>
</section>
<!-- fin section specialite -->
<!-- ===== FIN SECTION-CONTACT ===== -->
<?php get_footer(); ?>
