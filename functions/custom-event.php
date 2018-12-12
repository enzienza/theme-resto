<?php
/*
* ./ functions/custom-event.php
*
*  Descrition : Création d'un CPT pour gerer la phrase d'accroche de la section #intro
*
*  Plan du fichier :
*       1 - CPT_events
*       2 - metabox_sticky_events
*
*/


/* ---------------------------------------------------------- */
/* --------   CPT event (section event)   ------- */
/* ---------------------------------------------------------- */

function CPT_events() {
    register_post_type(
        'events', array(
            'label' => 'Événements',
            'labels' => array(
                'name' => 'Événements',
                'singuar_name' => 'Événement',
                'menu_name' => 'Événement',
                'name_admin_bar' =>'Événementt',
                'add_new' => 'Ajouter',
                'add_new_item' => 'Ajouter un événement',
                'new_item' => 'Nouveau événement',
                'edit_item' => 'Editer un événement',
                'view_item' => 'Voir le événement',
                'all_items' => 'Toutes les événements',
                'search_items' => 'Rechercher parmi les événements',
                'not_found' => 'Pas de événement trouvées',
                'not_fount_in_trash' => 'Pas de événement dans la corbeille'
            ),
            'public' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'events'
            ),
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => 9,
            'menu_icon'=>'dashicons-awards',
            'supports' => array(
                'title',
                'editor',
                'thumbnail'
            )
        )
    );
}

add_action('init',  'CPT_events');



/* ---------------------------------------------------------- */
/* ------  METABOX  Pour sticky events (mise en avant)  ----- */
/* ---------------------------------------------------------- */


// 1 - initialisation de la metabox

add_action('add_meta_boxes', 'add_metabox_sticky_events');

function add_metabox_sticky_events(){
    add_meta_box('id_metabox_sticky_events', 'Mise en avant' , 'MB_sticky_events', 'events', 'side', 'high');
}

// 2 -  construction de la metabox

function MB_sticky_events($POST){
    wp_nonce_field(basename(__FILE__), 'metabox_sticky_events_nonce');
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

add_action('save_post', 'save_metabox_sticky_events');

function save_metabox_sticky_events($POST_ID){
    if(isset($_POST['sticky'])){
        update_post_meta($POST_ID, 'sticky', $_POST['sticky']);
    }
}
