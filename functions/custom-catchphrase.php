<?php
/*
* ./ functions/custom-catchphrase.php
*
*  Descrition : Création d'un CPT pour gerer la phrase d'accroche de la section #intro
*
*  Plan du fichier :
*       1 - CPT_catchphrases
*       2 - metabox_sticky_catchphrases (mise en avant)
*
*/


/* ---------------------------------------------------------- */
/* --------   CPT catchphrase (section catchphrase)   ------- */
/* ---------------------------------------------------------- */

function CPT_catchphrases() {
    register_post_type(
        'catchphrases', array(
            'label' => 'Catchphrases',
            'labels' => array(
                'name' => 'Catchphrases',
                'singuar_name' => 'Catchphrase',
                'menu_name' => 'Catchphrase',
                'name_admin_bar' =>'Catchphrase',
                'add_new' => 'Ajouter',
                'add_new_item' => 'Ajouter un catchphrase',
                'new_item' => 'Nouvelle catchphrase',
                'edit_item' => 'Editer un catchphrase',
                'view_item' => 'Voir le catchphrase',
                'all_items' => 'Toutes les catchphrases',
                'search_items' => 'Rechercher parmi les catchphrases',
                'not_found' => 'Pas de catchphrase trouvées',
                'not_fount_in_trash' => 'Pas de catchphrase dans la corbeille'
            ),
            'public' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'catchphrases'
            ),
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => 3,
            'menu_icon'=>'dashicons-format-quote',
            'supports' => array(
                'title',
                'editor',
            )
        )
    );
}

add_action('init',  'CPT_catchphrases');


/* ---------------------------------------------------------------- */
/* ------  METABOX  Pour sticky catchphrases (mise en avant)  ----- */
/* ---------------------------------------------------------------- */


// 1 - initialisation de la metabox

add_action('add_meta_boxes', 'add_metabox_sticky_catchphrases');

function add_metabox_sticky_catchphrases(){
    add_meta_box('id_metabox_sticky_catchphrases', 'Mise en avant' , 'MB_sticky_catchphrases', 'catchphrases', 'side', 'high');
}

// 2 -  construction de la metabox

function MB_sticky_catchphrases($POST){
    wp_nonce_field(basename(__FILE__), 'metabox_sticky_catchphrases');
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

add_action('save_post', 'save_metabox_sticky_catchphrases');

function save_metabox_sticky_catchphrases($POST_ID){
    if(isset($_POST['sticky'])){
        update_post_meta($POST_ID, 'sticky', $_POST['sticky']);
    }
}
