<?php
/* Template Name: cartes */
?>
<?php get_header(); ?>

<!-- ===== DEBUT SECTION-CONTACT ===== -->
<!-- debut section specialite -->
<section id="page-carte" class="container-fluif">
    <div class="bg_dark"></div>

    <div class="container page-carte-content">
        <h1 class="titre-h1">Notre cartes</h1>
        <div class="description-carte">
            <p>
                Nous avons également, pour ceux qui le désirent, un service à la carte
                dans laquelle vous retrouverez une fine cuisine chinoise aux arômes subtiles
                qui sauront éveiller vos papilles et vous faire découvrir de nouvelles saveurs.
            </p>
        </div>
    </div>

    <!-- ****************** CODE PROVISOIR ****************** -->
    <div class="container">
        <div class="item_1">
            <div>
                <div data-toggle="modal" data-target="#imgModal_1">
                    <img src="<?php echo get_template_directory_uri().'/img/cartes/page_1.jpg' ?>" alt="">
                </div>
            </div>
            <!-- debut : imgModal_1 -->
            <div class="modal fade" id="imgModal_1" tabindex="-1" role="dialog" aria-labelledby="imgModal_1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button> <!-- close -->
                            <div class="">
                                <img src="<?php echo get_template_directory_uri().'/img/cartes/page_1.jpg' ?>" alt="" class="">
                            </div>

                        </div> <!-- ./ modal-body -->
                    </div> <!-- ./ modal-content -->
                </div> <!-- ./ modal-dialog -->
            </div> <!-- ./ imgModal_1 -->
        </div>

        <div class="item_2">
            <div>
                <div data-toggle="modal" data-target="#imgModal_2">
                    <img src="<?php echo get_template_directory_uri().'/img/cartes/page_2.jpg' ?>" alt="">
                </div>
            </div>
            <!-- debut : imgModal_2 -->
            <div class="modal fade" id="imgModal_2" tabindex="-1" role="dialog" aria-labelledby="imgModal_2" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button> <!-- close -->
                            <div class="">
                                <img src="<?php echo get_template_directory_uri().'/img/cartes/page_2.jpg' ?>" alt="" class="">
                            </div>

                        </div> <!-- ./ modal-body -->
                    </div> <!-- ./ modal-content -->
                </div> <!-- ./ modal-dialog -->
            </div> <!-- ./ imgModal_2 -->
        </div>

        <div class="item_3">
            <div>
                <div data-toggle="modal" data-target="#imgModal_3">
                    <img src="<?php echo get_template_directory_uri().'/img/cartes/page_3.jpg' ?>" alt="">
                </div>
            </div>
            <!-- debut : imgModal_3 -->
            <div class="modal fade" id="imgModal_3" tabindex="-1" role="dialog" aria-labelledby="imgModal_3" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button> <!-- close -->
                            <div class="">
                                <img src="<?php echo get_template_directory_uri().'/img/cartes/page_3.jpg' ?>" alt="" class="">
                            </div>

                        </div> <!-- ./ modal-body -->
                    </div> <!-- ./ modal-content -->
                </div> <!-- ./ modal-dialog -->
            </div> <!-- ./ imgModal_3 -->
        </div>

        <div class="item_4">
            <div>
                <div data-toggle="modal" data-target="#imgModal_4">
                    <img src="<?php echo get_template_directory_uri().'/img/cartes/page_4.jpg' ?>" alt="">
                </div>
            </div>
            <!-- debut : imgModal_4 -->
            <div class="modal fade" id="imgModal_4" tabindex="-1" role="dialog" aria-labelledby="imgModal_4" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button> <!-- close -->
                            <div class="">
                                <img src="<?php echo get_template_directory_uri().'/img/cartes/page_4.jpg' ?>" alt="" class="">
                            </div>

                        </div> <!-- ./ modal-body -->
                    </div> <!-- ./ modal-content -->
                </div> <!-- ./ modal-dialog -->
            </div> <!-- ./ imgModal_4 -->
        </div>

    </div>

    <!-- ****************** CODE PROVISOIR ****************** -->

    <?php
    wp_reset_postdata();

    $args = array(
        'post_type' => array('servicecates', 'servicemenus'),
        'posts_per_page' => 1,
        'orderby' => 'id',
        'order' => 'DESC'
    );
    $my_query = new WP_query($args);
    if($my_query->have_posts()) : while($my_query->have_posts()) : $my_query->the_post();
    ?>

    <!-- CODE ICI -->

    <?php endwhile; endif;  wp_reset_postdata(); ?>
</section>
<!-- fin section specialite -->
<!-- ===== FIN SECTION-CONTACT ===== -->
<?php get_footer(); ?>
