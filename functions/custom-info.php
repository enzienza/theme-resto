<?php
/*
* ./ functions/custom-info.php
*
*  Descrition : Création d'un CPT pour gerer les infos (resto & emporter)
*
*  Plan du fichier :
*       1 - CPT_infos
*
*/


/* ---------------------------------------------------------- */
/* --------   CPT info (section info)   ------- */
/* ---------------------------------------------------------- */

function CPT_infos() {
    register_post_type(
        'infos', array(
            'label' => 'Info',
            'labels' => array(
                'name' => 'Info',
                'singuar_name' => 'info',
                'info_name' => 'info',
                'name_admin_bar' =>'info',
                'add_new' => 'Ajouter',
                'add_new_item' => 'Ajouter un info',
                'new_item' => 'Nouveau info',
                'edit_item' => 'Editer un info',
                'view_item' => 'Voir le info',
                'all_items' => 'Toutes les infos',
                'search_items' => 'Rechercher parmi les infos',
                'not_found' => 'Pas de info trouvées',
                'not_fount_in_trash' => 'Pas de info dans la corbeille'
            ),
            'public' => true,
            'show_in_info' => true,
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'infos'
            ),
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => 11,
            'menu_icon'=>'dashicons-info',
            'supports' => array(
                'title',
            )
        )
    );
}

add_action('init',  'CPT_infos');


/* ---------------------------------------------------------------- */
/* ------  METABOX  Pour sticky infos (mise en avant)  ----- */
/* ---------------------------------------------------------------- */


// 1 - initialisation de la metabox

add_action('add_meta_boxes', 'add_metabox_sticky_infos');

function add_metabox_sticky_infos(){
    add_meta_box('id_metabox_sticky_infos', 'Mise en avant' , 'MB_sticky_infos', 'infos', 'side', 'high');
}

// 2 -  construction de la metabox

function MB_sticky_infos($POST){
    wp_nonce_field(basename(__FILE__), 'metabox_sticky_infos_nonce');
    $sticky = get_post_meta($POST->ID, 'sticky', true);
    ?>
        <p>
            <label for="sticky">Mettre en avant </label><br />
            <input type="radio" <?php checked($sticky, 'oui'); ?> name="sticky" value="oui"/>Oui<br />
            <input type="radio" <?php checked($sticky, 'non'); ?> name="sticky" value=""/>Non<br />
        </p>
    <?php

}

// 3 - Sauvegarde des données de la métabox

add_action('save_post', 'save_metabox_sticky_infos');

function save_metabox_sticky_infos($POST_ID){
    if(isset($_POST['sticky'])){
        update_post_meta($POST_ID, 'sticky', $_POST['sticky']);
    }
}


/* ---------------------------------------------------------------- */
/* ------   METABOX  pour les coordonne du cabinet infos   ----- */
/* ---------------------------------------------------------------- */


add_action('add_meta_boxes', 'add_metabox_coordonne');

function add_metabox_coordonne(){
    add_meta_box('id_metabox_coordonne', 'Coordonées', 'MB_coordonne', 'infos', 'side');
}

// 2 -  construction de la metabox

function MB_coordonne($POST){
    wp_nonce_field(basename(__FILE__), 'metabox_coordonne_nonce');
    $adresse = get_post_meta($POST->ID, 'adresse', true);
    $phone   = get_post_meta($POST->ID, 'phone', true);
    $map     = get_post_meta($POST->ID, 'map', true);
    ?>
        <div class="">
            <label for="adresse">Adresse</label><br />
            <textarea id="adresse" name="adresse"><?php echo $adresse; ?></textarea>
        </div>
        <br />
        <div class="">
            <label for="phone">Téléphone</label><br />
            <input id="phone" type="text" name="phone" value="<?php echo $phone; ?>"/>
        </div>
        <br />
        <div class="">
            <label for="map">Coller l'intégration d'une carte dupuis Google Maps</label><br />
            <textarea id="map" type="map" name="map"><?php echo $map; ?></textarea>
        </div>
    <?php
}

// 3 - Sauvegarde des données de la métabox

add_action('save_post', 'save_metabox_coordonne');

function save_metabox_coordonne($POST_ID){
    if(isset($_POST['adresse'])){
        update_post_meta($POST_ID, 'adresse', esc_html($_POST['adresse']));
    }
    if(isset($_POST['phone'])){
        update_post_meta($POST_ID, 'phone', esc_textarea($_POST['phone']));
    }
    if(isset($_POST['map'])){
        update_post_meta($POST_ID, 'map', esc_textarea($_POST['map']));
    }
}
