<?php
/*
* ./ functions/custom-buffet.php
*
*  Descrition : Création d'un CPT pour gerer la phrase d'accroche de la section #intro
*
*  Plan du fichier :
*       1 - CPT_buffets
*       2 - metabox_sticky_buffets
*
*/


/* ---------------------------------------------------------- */
/* --------   CPT buffet (section buffet)   ------- */
/* ---------------------------------------------------------- */

function CPT_buffets() {
    register_post_type(
        'buffets', array(
            'label' => 'Buffets',
            'labels' => array(
                'name' => 'Buffets',
                'singuar_name' => 'Buffet',
                'menu_name' => 'Buffet',
                'name_admin_bar' =>'Buffet',
                'add_new' => 'Ajouter',
                'add_new_item' => 'Ajouter un buffet',
                'new_item' => 'Nouveau buffet',
                'edit_item' => 'Editer un buffet',
                'view_item' => 'Voir le buffet',
                'all_items' => 'Toutes les buffets',
                'search_items' => 'Rechercher parmi les buffets',
                'not_found' => 'Pas de buffet trouvées',
                'not_fount_in_trash' => 'Pas de buffet dans la corbeille'
            ),
            'public' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'buffets'
            ),
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => 4,
            'menu_icon'=>'dashicons-pressthis',
            'supports' => array(
                'title',
                'editor',
            )
        )
    );
}

add_action('init',  'CPT_buffets');



/* ---------------------------------------------------------- */
/* ------  METABOX  Pour sticky buffets (mise en avant)  ----- */
/* ---------------------------------------------------------- */


// 1 - initialisation de la metabox

add_action('add_meta_boxes', 'add_metabox_sticky_buffets');

function add_metabox_sticky_buffets(){
    add_meta_box('id_metabox_sticky_buffets', 'Mise en avant' , 'MB_sticky_buffets', 'buffets', 'side', 'high');
}

// 2 -  construction de la metabox

function MB_sticky_buffets($POST){
    wp_nonce_field(basename(__FILE__), 'metabox_sticky_buffets');
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

add_action('save_post', 'save_metabox_sticky_buffets');

function save_metabox_sticky_buffets($POST_ID){
    if(isset($_POST['sticky'])){
        update_post_meta($POST_ID, 'sticky', $_POST['sticky']);
    }
}
