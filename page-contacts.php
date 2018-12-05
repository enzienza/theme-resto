<?php
/* Template Name: contacts */
?>
<?php get_header(); ?>

<!-- ===== DEBUT SECTION-CONTACT ===== -->
<!-- debut section specialite -->
<section id="page-contact" class="container-fuild">
    <div class="container">
        <div class="row">


            <?php
            wp_reset_postdata();

            $args = array(
                'post_type' => 'contacts',    // nom du CPT
                'posts_per_page' => 1,      // limite
                'orderby' => 'id',
                'meta_key' => 'sticky',     // uniquement ceux qui on la mise en avant en 'oui'
                'meta_value' => 'oui'
            );
            $my_query = new WP_query($args);
            if($my_query->have_posts()) : while($my_query->have_posts()) : $my_query->the_post();
            ?>

            <div class="col-12">
                <!-- debut => Google Maps -->
                <?php $map = get_post_meta($post->ID, 'map', true); if($map != ''){echo htmlspecialchars_decode($map);} ?>
                <!-- fin => Google Maps -->
            </div>


            <!-- debut => table-coordonne -->
            <div class="col-lg-6 col-12 coordonne">
                <h3>Information</h3>
                <table class="table">
                    <tbody>
                        <tr>
                            <th><span class="icons flaticon-placeholder"></span></th>
                            <td><?php echo get_post_meta($post->ID, 'adresse', true); ?></td>
                        </tr>
                        <tr>
                            <th><span class="icons flaticon-phone-call"></span></th>
                            <td><?php echo get_post_meta($post->ID, 'phone', true); ?></td>
                        </tr>
                    </tbody>
                </table>

            </div>
            <!-- fin => table-coordonne -->

            <!-- debut => table-disponible -->
            <div class="col-lg-6 col-12 disponible">
                <h3>Heures d'ouverture</h3>
                <table class="table">
                    <tbody>
                        <!-- =====   LUNDI   ===== -->
                        <tr>
                            <th>Lundi</th>
                            <td>Fermé</td>
                        </tr>

                        <!-- =====   MARDI   ===== -->
                        <tr>
                            <th rowspan="2">Mardi</th>
                            <td>
                                <?php echo get_post_meta($post->ID, 'mardi_midi_de', true); ?>
                                -
                                <?php echo get_post_meta($post->ID, 'mardi_midi_a', true); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php echo get_post_meta($post->ID, 'mardi_soir_de', true); ?>
                                -
                                <?php echo get_post_meta($post->ID, 'mardi_soir_a', true); ?>
                            </td>
                        </tr>

                        <!-- =====   MERCREDI   ===== -->
                        <tr>
                            <th rowspan="2">Mercredi</th>
                            <td>
                                <?php echo get_post_meta($post->ID, 'mercredi_midi_de', true); ?>
                                -
                                <?php echo get_post_meta($post->ID, 'mercredi_midi_a', true); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php echo get_post_meta($post->ID, 'mercredi_soir_de', true); ?>
                                -
                                <?php echo get_post_meta($post->ID, 'mercredi_soir_a', true); ?>
                            </td>
                        </tr>

                        <!-- =====   JEUDI   ===== -->
                        <tr>
                            <th rowspan="2">Jeudi</th>
                            <td>
                                <?php echo get_post_meta($post->ID, 'jeudi_midi_de', true); ?>
                                -
                                <?php echo get_post_meta($post->ID, 'jeudi_midi_a', true); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php echo get_post_meta($post->ID, 'jeudi_soir_de', true); ?>
                                -
                                <?php echo get_post_meta($post->ID, 'jeudi_soir_a', true); ?>
                            </td>
                        </tr>

                        <!-- =====   VENDREDI   ===== -->
                        <tr>
                            <th rowspan="2">Vendredi</th>
                            <td>
                                <?php echo get_post_meta($post->ID, 'vendredi_midi_de', true); ?>
                                -
                                <?php echo get_post_meta($post->ID, 'vendredi_midi_a', true); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php echo get_post_meta($post->ID, 'vendredi_soir_de', true); ?>
                                -
                                <?php echo get_post_meta($post->ID, 'vendredi_soir_a', true); ?>
                            </td>
                        </tr>

                        <!-- =====   SAMEDI   ===== -->
                        <tr>
                            <th rowspan="2">Samedi</th>
                            <td>
                                <?php echo get_post_meta($post->ID, 'samedi_midi_de', true); ?>
                                -
                                <?php echo get_post_meta($post->ID, 'samedi_midi_a', true); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php echo get_post_meta($post->ID, 'samedi_soir_de', true); ?>
                                -
                                <?php echo get_post_meta($post->ID, 'samedi_soir_a', true); ?>
                            </td>
                        </tr>

                        <!-- =====   DIMANCHE   ===== -->
                        <tr>
                            <th rowspan="2">Dimanche</th>
                            <td>
                                <?php echo get_post_meta($post->ID, 'dimanche_midi_de', true); ?>
                                -
                                <?php echo get_post_meta($post->ID, 'dimanche_midi_a', true); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php echo get_post_meta($post->ID, 'dimanche_soir_de', true); ?>
                                -
                                <?php echo get_post_meta($post->ID, 'dimanche_soir_a', true); ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- fin => table-disponible -->

        <?php endwhile; endif;  wp_reset_postdata(); ?>
        <!-- fin => item card conseils -->

    </div>
</div>
</section>
<!-- fin section specialite -->
<!-- ===== FIN SECTION-CONTACT ===== -->
<?php get_footer(); ?>
