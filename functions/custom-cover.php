<?php
/*
* ./ functions/custom-accueil.php
*
*  Descrition : Création d'un CPT pour gerer le Slide (cover) de la page d'acceil
*
*  Plan du fichier :
*       1 - CPT_covers
*       2 - metabox_sticky_covers (mise en avant)
*       3 - metabox_boutons
*
*/


/* ----------------------------------------------- */
/* --------   CPT cover (section cover)   ------- */
/* ----------------------------------------------- */

function CPT_covers() {
    register_post_type(
        'covers', array(
            'label' => 'Covers',
            'labels' => array(
                'name' => 'Covers',
                'singuar_name' => 'Cover',
                'menu_name' => 'Cover',
                'name_admin_bar' =>'Cover',
                'add_new' => 'Ajouter',
                'add_new_item' => 'Ajouter un cover',
                'new_item' => 'Nouvelle cover',
                'edit_item' => 'Editer un cover',
                'view_item' => 'Voir le cover',
                'all_items' => 'Toutes les covers',
                'search_items' => 'Rechercher parmi les covers',
                'not_found' => 'Pas de cover trouvées',
                'not_fount_in_trash' => 'Pas de cover dans la corbeille'
            ),
            'public' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'covers'
            ),
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => 3,
            'menu_icon'=>'dashicons-megaphone',
            'supports' => array(
                'title',
                'editor',
                'thumbnail',
            )
        )
    );
}

add_action('init',  'CPT_covers');


/* ---------------------------------------------------------- */
/* ------  METABOX  Pour sticky covers (mise en avant)  ----- */
/* ---------------------------------------------------------- */


// 1 - initialisation de la metabox

add_action('add_meta_boxes', 'add_metabox_sticky_covers');

function add_metabox_sticky_covers(){
    add_meta_box('id_metabox_sticky_covers', 'Mise en avant' , 'MB_sticky_covers', 'covers', 'side', 'high');
}

// 2 -  construction de la metabox

function MB_sticky_covers($POST){
    wp_nonce_field(basename(__FILE__), 'metabox_sticky_covers_nonce');
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

add_action('save_post', 'save_metabox_sticky_covers');

function save_metabox_sticky_covers($POST_ID){
    if(isset($_POST['sticky'])){
        update_post_meta($POST_ID, 'sticky', $_POST['sticky']);
    }
}


/* --------------------------------------------- */
/* ------    METABOX  pour nos boutons    ------  */
/* --------------------------------------------- */

// 1 - initialisation de la metabox

add_action('add_meta_boxes', 'add_metabox_boutons');

function add_metabox_boutons(){
    add_meta_box('id_metabox_boutons', 'Bouton', 'MB_boutons', 'covers', 'side');
}

// 2 -  construction de la metabox

function MB_boutons($POST){
    wp_nonce_field(basename(__FILE__), 'metabox_boutons_nonce');
    $btn_actif = get_post_meta($POST->ID, 'btn_actif', true);
    $text = get_post_meta($POST->ID, 'text', true);
    $lien = get_post_meta($POST->ID, 'lien', true);
    ?>
    <p>
        <label for="btn_actif">Ajouter un bouton ?</label><br />
        <input type="radio" <?php checked($btn_actif, 'oui'); ?> name="btn_actif" value="oui"/>Oui
        <input type="radio" <?php checked($btn_actif, 'non'); ?> name="btn_actif" value="non"/>Non
    </p>

    <p>
        <label for="text">Texte<br />
        <input id="text" type="text" name="text" value="<?php echo $text; ?>"/>
    </p>
    <p>
        <label for="lien">Lien</label><br />
        <input id="lien" type="text" name="lien" value="<?php echo $lien; ?>"/>
    </p>
    <?php
}

// 3 - Sauvegarde des données de la métabox

add_action('save_post', 'save_metabox_boutons');

function save_metabox_boutons($POST_ID){

    if(isset($_POST['btn_actif'])){
        update_post_meta($POST_ID, 'btn_actif', esc_html($_POST['btn_actif']));
    }

    if(isset($_POST['text'])){
        update_post_meta($POST_ID, 'text', esc_html($_POST['text']));
    }
    if(isset($_POST['lien'])){
        update_post_meta($POST_ID, 'lien', esc_html($_POST['lien']));
    }
}
