<?php
/* Template Name: emporters */
?>
<?php get_header(); ?>

<!-- ===== DEBUT SECTION-CONTACT ===== -->
<!-- debut section specialite -->
<section id="page-emporter" class="container-fluif">
    <div class="bg_dark"></div>

    <div class="container page-emporter-content">
        <h1 class="titre-h1">Nos plats à emporter</h1>
        <div class="description-emporter">
            <p>
                Découvrez nos plats à emporter
            </p>
        </div>
    </div>


    <!-- ****************** CODE PROVISOIR ****************** -->
    <div class="container">
        <div class="item_1">
            <div>
                <div data-toggle="modal" data-target="#imgModal_1">
                    <img src="<?php echo get_template_directory_uri().'/img/emporter/page_1.jpg' ?>" alt="">
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
                                <img src="<?php echo get_template_directory_uri().'/img/emporter/page_1.jpg' ?>" alt="" class="">
                            </div>

                        </div> <!-- ./ modal-body -->
                    </div> <!-- ./ modal-content -->
                </div> <!-- ./ modal-dialog -->
            </div> <!-- ./ imgModal_1 -->
        </div>

        <div class="item_2">
            <div>
                <div data-toggle="modal" data-target="#imgModal_2">
                    <img src="<?php echo get_template_directory_uri().'/img/emporter/page_2.jpg' ?>" alt="">
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
                                <img src="<?php echo get_template_directory_uri().'/img/emporter/page_2.jpg' ?>" alt="" class="">
                            </div>

                        </div> <!-- ./ modal-body -->
                    </div> <!-- ./ modal-content -->
                </div> <!-- ./ modal-dialog -->
            </div> <!-- ./ imgModal_2 -->
        </div>

        <div class="item_3">
            <div>
                <div data-toggle="modal" data-target="#imgModal_3">
                    <img src="<?php echo get_template_directory_uri().'/img/emporter/page_3.jpg' ?>" alt="">
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
                                <img src="<?php echo get_template_directory_uri().'/img/emporter/page_3.jpg' ?>" alt="" class="">
                            </div>

                        </div> <!-- ./ modal-body -->
                    </div> <!-- ./ modal-content -->
                </div> <!-- ./ modal-dialog -->
            </div> <!-- ./ imgModal_3 -->
        </div>
    </div>

    <!-- ****************** CODE PROVISOIR ****************** -->


    <div class="container">
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
</div>

</section>
<!-- fin section specialite -->
<!-- ===== FIN SECTION-CONTACT ===== -->
<?php get_footer(); ?>
