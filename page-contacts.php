<?php
/* Template Name: contacts */
?>
<?php get_header(); ?>

<!-- ===== DEBUT SECTION-CONTACT ===== -->
<!-- debut section specialite -->
<section id="page-contact" class="container-fuild">
    <div class="bg_dark"></div>

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


    <!-- debut : map-header (google-map-slide) -->
    <div class="map-header">
        <?php $map = get_post_meta($post->ID, 'map', true); if($map != ''){echo htmlspecialchars_decode($map);} ?>
    </div><!-- ./ map-deader -->


    <div class="container">

        <!-- debut : coordonne -->
        <div class="coordonne">
            <h3 class="sous-titre">Nos coordonnées</h3>
            <div class="row">
                <div class="col-md-6 col-12 coordonne-left">
                    <span class="icons flaticon-placeholder"></span>
                    <?php echo get_post_meta($post->ID, 'adresse', true); ?>
                </div><!-- ./ coordonne-left -->

                <div class="col-md-5 col-12 coordonne-right">
                    <span class="icons flaticon-phone-call"></span>
                    <?php echo get_post_meta($post->ID, 'phone', true); ?>
                </div><!-- ./ coordonne-right -->
            </div>
        </div><!-- ./ coordonne -->



        <!-- debut : information -->
        <div class="information">
            <h3 class="sous-titre">Nos informations complémentaire</h3>
            <div class="row">
                <div class="col-md-6 col-16 card card-left">
                    <div class="card-body">
                        <h4>Mode de paiement</h4>
                        <div>Cash, Visa, Marstercard</div>
                    </div>
                </div><!-- ./ card-left -->
                <div class="col-md-6 col-16 card card-right">
                    <div class="card-icon"></div>
                    <div class="card-body">
                        <h4>Type de cuisine</h4>
                        <div>Chinoise</div>
                    </div>
                </div><!-- ./ card-right -->
            </div>
        </div><!-- ./ information -->


        <!-- debut : open-hour -->
        <div class="open-hour">
            <h3 class="sous-titre">Nos heures d'ouvertures</h3>

            <table class="table">
                <tbody>
                    <!-- item-day : LUNDI -->
                    <tr class="item-day">
                        <td class="day">Lundi</td>
                        <td class="heure">Fermé</td>
                    </tr>

                    <!-- item-day : MARDI -->
                    <tr class="item-day">
                        <tr>
                            <td class="day" rowspan="2">Mardi</td>
                            <td class="midi">
                                <?php echo get_post_meta($post->ID, 'mardi_midi_de', true); ?>
                                -
                                <?php echo get_post_meta($post->ID, 'mardi_midi_a', true); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="soir">
                                <?php echo get_post_meta($post->ID, 'mardi_soir_de', true); ?>
                                -
                                <?php echo get_post_meta($post->ID, 'mardi_soir_a', true); ?>
                            </td>
                        </tr>
                    </tr>

                    <!-- item-day : MERCREDI -->
                    <tr class="item-day">
                        <tr>
                            <td class="day" rowspan="2">Mercredi</td>
                            <td class="midi">
                                <?php echo get_post_meta($post->ID, 'mercredi_midi_de', true); ?>
                                -
                                <?php echo get_post_meta($post->ID, 'mercredi_midi_a', true); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="soir">
                                <?php echo get_post_meta($post->ID, 'mercredi_soir_de', true); ?>
                                -
                                <?php echo get_post_meta($post->ID, 'mercredi_soir_a', true); ?>
                            </td>
                        </tr>
                    </tr>

                    <!-- item-day : JEUDI -->
                    <tr class="item-day">
                        <tr>
                            <td class="day" rowspan="2">Jeudi</td>
                            <td class="midi">
                                <?php echo get_post_meta($post->ID, 'jeudi_midi_de', true); ?>
                                -
                                <?php echo get_post_meta($post->ID, 'jeudi_midi_a', true); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="soir">
                                <?php echo get_post_meta($post->ID, 'jeudi_soir_de', true); ?>
                                -
                                <?php echo get_post_meta($post->ID, 'jeudi_soir_a', true); ?>
                            </td>
                        </tr>
                    </tr>

                    <!-- item-day : VENDREDI -->
                    <tr class="item-day">
                        <tr>
                            <td class="day" rowspan="2">Vendredi</td>
                            <td class="midi">
                                <?php echo get_post_meta($post->ID, 'vendredi_midi_de', true); ?>
                                -
                                <?php echo get_post_meta($post->ID, 'vendredi_midi_a', true); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="soir">
                                <?php echo get_post_meta($post->ID, 'vendredi_soir_de', true); ?>
                                -
                                <?php echo get_post_meta($post->ID, 'vendredi_soir_a', true); ?>
                            </td>
                        </tr>
                    </tr>

                    <!-- item-day : SAMEDI -->
                    <tr class="item-day">
                        <tr>
                            <td class="day" rowspan="2">Samedi</td>
                            <td class="midi">
                                <?php echo get_post_meta($post->ID, 'samedi_midi_de', true); ?>
                                -
                                <?php echo get_post_meta($post->ID, 'samedi_midi_a', true); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="soir">
                                <?php echo get_post_meta($post->ID, 'samedi_soir_de', true); ?>
                                -
                                <?php echo get_post_meta($post->ID, 'samedi_soir_a', true); ?>
                            </td>
                        </tr>
                    </tr>

                    <!-- item-day : DIMANCHE -->
                    <tr class="item-day">
                        <tr>
                            <td class="day" rowspan="2">Dimanche</td>
                            <td class="midi">
                                <?php echo get_post_meta($post->ID, 'dimanche_midi_de', true); ?>
                                -
                                <?php echo get_post_meta($post->ID, 'dimanche_midi_a', true); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="soir">
                                <?php echo get_post_meta($post->ID, 'dimanche_soir_de', true); ?>
                                -
                                <?php echo get_post_meta($post->ID, 'dimanche_soir_a', true); ?>
                            </td>
                        </tr>
                    </tr>
                </tbody>
            </table>
        </div>


    <?php endwhile; endif;  wp_reset_postdata(); ?>
</section>
<!-- fin section specialite -->
<!-- ===== FIN SECTION-CONTACT ===== -->
<?php get_footer(); ?>
