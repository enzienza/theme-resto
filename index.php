<?php get_header(); ?>

<!-- ===================== DEBUT MAIN ===================== -->
<main>

    <!-- DEBUT : section #slide -->

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
    <section id="slide" class="container-fuid bg-cover">
        <div class="img-cover">
            <?php the_post_thumbnail(); ?>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-12 slide-left">
                    <div class="big-logo">
                        <!-- <img src="img/logo_bl.png" alt="La Cigogne d'Or de Waremme - Restaurant chinois - buffet wok à volonter"> -->
                        <img src="<?php echo get_template_directory_uri().'/img/logo_bl.png' ?>" alt="La Cigogne d'Or de Waremme - Restaurant chinois - buffet wok à volonter">
                    </div><!-- ./ big-logo-->
                </div><!-- ./ slide-left -->
                <div class="col-md-7 col-12 slide-right">
                    <div class="titre"><?php the_title(); ?></div><!-- ./ titre -->
                    <div class="accroche"><?php the_content(); ?></div><!-- ./ accroche -->
                    <div class="bouton">

                        <?php $btn_actif = get_post_meta($post->ID, 'btn_actif', 'oui', true); ?>
                        <a href="<?php echo get_post_meta($post->ID, 'lien', true); ?>" class="btn btn-md">
                            <?php echo get_post_meta($post->ID, 'text', true); ?>
                        </a>

                        <script type="text/javascript">
                            // Ajouté la class "btn-outline"
                            // Si btn_actif == oui
                            <?php if (!empty ($btn_actif == 'oui' )){?>
                                jQuery(document).ready(function($){
                                    $('.btn').addClass('btn-outline');
                                });
                            <?php } ?>
                        </script>

                    </div><!-- ./ bouton -->
                </div><!-- slide-right -->
            </div><!-- ./ row -->
        </div><!-- ./ container -->
    </section><!-- ./ section #slide -->
    <?php endwhile; endif;  wp_reset_postdata(); ?>

    <!-- DEBUT : section #intro -->
    <section id="intro" class="container-fluid bg-color-gradient">
        <div class="row content-intro">
            <div class="col-lg-3 col-md-2 col-12 fly-left"></div>
            <?php
                wp_reset_postdata();

                $args = array(
                    'post_type' => 'catchphrases',    // nom du CPT
                    'posts_per_page' => 1,      // limite
                    'orderby' => 'id',
                    'meta_key' => 'sticky',     // uniquement ceux qui on la mise en avant en 'oui'
                    'meta_value' => 'oui'
                );
                $my_query = new WP_query($args);
                if($my_query->have_posts()) : while($my_query->have_posts()) : $my_query->the_post();
             ?>
            <div class="col-md-6 col-12 align-self-center">

                <?php the_content(); ?>


            </div><!-- ./ col .align-self-center -->
            <?php endwhile; endif;  wp_reset_postdata(); ?>
            <div class="col-lg-3 col-md-2 col-12 fly-right"></div>
        </div><!-- ./ row -->
    </section><!-- ./ section #intro -->

    <!-- DEBUT : section #buffet -->
    <section id="buffet" class="container">
        <h1 class="titre-h1">Buffet</h1>
        <div class="row">
            <?php
                wp_reset_postdata();

                $args = array(
                    'post_type' => 'buffets',    // nom du CPT
                    'posts_per_page' => 1,      // limite
                    'orderby' => 'id',
                    'meta_key' => 'sticky',     // uniquement ceux qui on la mise en avant en 'oui'
                    'meta_value' => 'oui'
                );
                $my_query = new WP_query($args);
                if($my_query->have_posts()) : while($my_query->have_posts()) : $my_query->the_post();
             ?>
            <div class="col-lg-6 col-12 box-left hidden">
                <div class="description-buffet">
                    <?php the_content(); ?>
                </div><!-- ./ description-buffet -->
            </div><!-- ./ box-left -->
            <div class="col-lg-6 col-12 box-right hidden">
                <div class="row">
                    <div class="col-6 img-buffet">
                        <img src="<?php echo get_template_directory_uri().'/img/buffet-1.jpg' ?>" alt="">
                    </div><!-- ./ img-buffet -->
                    <div class="col-6 img-buffet">
                        <img src="<?php echo get_template_directory_uri().'/img/buffet-2.jpg' ?>" alt="">
                    </div><!-- ./ img-buffet -->
                    <div class="col-6 img-buffet">
                        <img src="<?php echo get_template_directory_uri().'/img/buffet-3.jpg' ?>" alt="">
                    </div><!-- ./ img-buffet -->
                    <div class="col-6 img-buffet">
                        <img src="<?php echo get_template_directory_uri().'/img/buffet-1.jpg' ?>" alt="">
                    </div><!-- ./ img-buffet -->
                </div><!-- ./ row -->
            </div><!-- ./ box-right -->
            <?php endwhile; endif;  wp_reset_postdata(); ?>
        </div><!-- ./ row -->
    </section><!-- ./ section #buffet -->

    <!-- DEBUT : section #tarif -->
    <section id="tarif" class="container">
        <h1 class="sous-titre">Découvrez nos tarifs</h1>
        <div class="row">
            <div class="col-lg-8 col-12 tarif-left">
                <div class="card">
                    <?php
                        wp_reset_postdata();

                        $args = array(
                            'post_type' => 'tarifbuffets',
                            'posts_per_page' => -1,
                            'orderby' => 'id',
                            'order' => 'ASC'
                        );
                        $my_query = new WP_query($args);
                        if($my_query->have_posts()) : while($my_query->have_posts()) : $my_query->the_post();
                     ?>

                    <!-- debut -> item-card -->
                    <div class="item-card">
                        <h3 data-accordion-element-trigger><?php the_title(); ?></h3>
                        <div data-accordion-element-content class="content">
                            <div class="formule row">
                                <div class="col-md-4 col-12 item-formule">
                                    <div class="icon">
                                        <img src="<?php echo get_template_directory_uri().'/img/icon_repas.png' ?>" alt="">
                                    </div>
                                    <div class="titre">Sans boissons</div>
                                    <div class="prix"><?php echo get_post_meta($post->ID, 'SB_prix', true); ?></div>
                                    <sub class="more"><?php echo get_post_meta($post->ID, 'SB_comporte', true); ?></sub>
                                </div><!-- ./ item-formule -->
                                <div class="col-md-4 col-12 item-formule">
                                    <div class="icon">
                                        <img src="<?php echo get_template_directory_uri().'/img/icon_repas.png' ?>" alt="">
                                    </div>
                                    <div class="titre">Boissons comprises *</div>
                                    <div class="prix"><?php echo get_post_meta($post->ID, 'BC_prix', true); ?></div>
                                    <sub class="more">* <?php echo get_post_meta($post->ID, 'BC_comporte', true); ?></sub>
                                </div><!-- ./ item-formule -->
                                <div class="col-md-4 col-12 item-formule">
                                    <div class="icon">
                                        <img src="<?php echo get_template_directory_uri().'/img/icon_repas.png' ?>" alt="">
                                    </div>
                                    <div class="titre">Full boissons **</div>
                                    <div class="prix"><?php echo get_post_meta($post->ID, 'BF_prix', true); ?></div>
                                    <sub class="more">
                                        ** <?php echo get_post_meta($post->ID, 'BF_comporte', true); ?><br />
                                        <strong>! suppl. de 3€ pour autres apéritifs</strong>
                                    </sub>
                                </div><!-- ./ item-formule -->
                            </div><!-- ./ formule -->
                        </div><!-- ./ content -->
                    </div><!-- ./ item-card -->

                    <?php endwhile; endif;  wp_reset_postdata(); ?>
                </div><!-- ./ card -->
            </div><!-- ./ tarif-left -->
            <div class="col-lg-4 col-12 tarif-right">
                <div class="sticky">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Prix spéciaux</h3>
                        </div><!-- ./ card-header -->
                        <div class="card-body">
                            <?php
                                wp_reset_postdata();

                                $args = array(
                                    'post_type' => 'tarifspeciaus',
                                    'posts_per_page' => -1,
                                    'orderby' => 'id',
                                    'order' => 'ASC'
                                );
                                $my_query = new WP_query($args);
                                if($my_query->have_posts()) : while($my_query->have_posts()) : $my_query->the_post();
                             ?>

                             <div class="row no-gutters table-tarif">
                                 <div class="col-6 table-item"><?php the_title(); ?></div>
                                 <div class="col-6 table-item"><?php echo get_post_meta($post->ID, 'prix_special', true); ?></div>
                             </div>
                            <sub><?php echo get_post_meta($post->ID, 'remarque', true); ?></sub>

                            <?php endwhile; endif;  wp_reset_postdata(); ?>
                        </div><!-- ./ card-body -->

                    </div><!-- ./ card -->
                    <div class="avis">
                        Chère client, pour des raisons de facilité, la même
                        formule sera appliquée à toute la table
                    </div><!-- ./ avis -->
                </div><!-- ./ sticky -->
            </div><!-- ./ tarif-right -->
        </div><!-- ./ row -->
    </section><!-- ./ section #tarif -->

    <!-- DEBUT : section #event -->
    <section id="event" class="bg-event">
        <div class="container event-content">
            <div class="text-event">
                Vener passer les fêtes de fin d'année à la cigogne d'or
            </div>
            <div class="row">
                <div class="col-md-6 col-12 btn-left">
                    <a href="#" class="btn btn-full-color">Noël</a>
                </div>
                <div class="col-md-6 col-12 btn-right">
                    <a href="#" class="btn btn-full-color">Nouvelle An</a>
                </div>
            </div>
        </div>
    </section><!-- ./ section #event -->

    <!-- DEBUT : section #karaoke -->
    <section id="karaoke"></section><!-- ./ section #karaoke -->

    <!-- DEBUT : section #contact -->
    <section id="contact" class=" bg-map">
        <?php
            wp_reset_postdata();

            $args = array(
                'post_type' => 'infos',    // nom du CPT
                'posts_per_page' => 1,      // limite
                'orderby' => 'id',
                'meta_key' => 'sticky',     // uniquement ceux qui on la mise en avant en 'oui'
                'meta_value' => 'oui'
            );
            $my_query = new WP_query($args);
            if($my_query->have_posts()) : while($my_query->have_posts()) : $my_query->the_post();
         ?>
        <div class="container">
            <div class="row info-contact">
                <div class="col-md-6 col-12 info-left">
                    <div class="icons flaticon-placeholder"></div>
                    <div class="text">
                        <?php echo get_post_meta($post->ID, 'adresse', true); ?>

                    </div>
                </div><!-- ./ col-md-6 col-12 -->
                <div class="col-md-6 col-12 info-right">
                    <div class="icons flaticon-phone-call"></div>
                    <div class="text">
                        <?php echo get_post_meta($post->ID, 'phone', true); ?>
                    </div>
                </div><!-- ./ col-md-6 col-12 -->
            </div><!-- ./ info-contact -->
        </div><!-- ./ container -->
        <?php endwhile; endif;  wp_reset_postdata(); ?>
    </section><!-- ./ section #contact -->

    <!-- DEBUT : section #social -->
    <section id="social" class="bg-color">
        <div class="container">
            <h1 class="sous-titre">Rejoins-nous sur</h1>
            <div class="row">
                <div class="col align-self-center social-icon">
                    <ul>
                        <li>
                            <a href="#" target="_blank">
                                <span class="icons flaticon-facebook"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="_blank">
                                <span class="icons flaticon-instagram"></span>
                            </a>
                        </li>
                    </ul>
                </div><!-- ./ social-icon -->
            </div><!-- ./ row -->
        </div><!-- ./ container -->
    </section><!-- ./ section #social -->
</main>
<!-- ===================== FIN MAIN ===================== -->

<?php get_footer(); ?>
