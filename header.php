<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <!-- ============= META ============= -->
    <meta <?php bloginfo('charset'); ?>>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- ============= INFORMATIONS  ============= -->
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="author" content="Enza Lombardo">

    <?php wp_head(); ?>

</head>
<body>


    <!-- ===================== DEBUT HEADER ===================== -->
    <header>
        <!-- debut => navbar -->
        <nav class="navbar fixed-top navbar-expand-md ">
            <div class="container">
                <!-- debut -> logo -->
                <a class="navbar-brand" href="#"><?php bloginfo('name'); ?></a>
                <!-- fin -> logo -->

                <!-- Brand and toggle get grouped for better mobile display -->
                <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#navbar-example" aria-controls="navbar-example" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button> <!-- ./ navbar-toggler -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse justify-content-end" id="navbar-example">
                    <ul class="nav navbar-nav">
                        <li class="menu-item current-menu-item">
                            <a class="nav-link" href="#">Accueil</a>
                        </li> <!-- ./ nav-link -->
                        <li class="menu-item">
                            <a class="nav-link" href="#">Buffet</a>
                        </li> <!-- ./ nav-link -->
                        <li class="menu-item">
                            <a class="nav-link" href="#">Carte</a>
                        </li> <!-- ./ nav-link -->
                        <li class="menu-item">
                            <a class="nav-link" href="#">Emporter</a>
                        </li> <!-- ./ nav-link -->
                        <li class="menu-item">
                            <a class="nav-link" href="#">Evènement</a>
                        </li> <!-- ./ nav-link -->
                        <li class="menu-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li> <!-- ./ nav-link -->
                    </ul> <!-- ./ navbar-nav -->
                </div> <!-- ./ navbar-collapse -->

            </div> <!-- ./ container -->
        </nav> <!-- ./ navbar -->
        <!-- fin => navbar -->
    </header> <!-- ./ header -->
    <!-- ===================== FIN HEADER ===================== -->