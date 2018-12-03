<?php
/*
* ./ functions/custom-contact.php
*
*  Descrition : Création d'un CPT pour gerer les contacts (resto & emporter)
*
*  Plan du fichier :
*       1 - CPT_contacts
*
*/


/* ---------------------------------------------------------- */
/* --------   CPT contact (section contact)   ------- */
/* ---------------------------------------------------------- */

function CPT_contacts() {
    register_post_type(
        'contacts', array(
            'label' => 'Contact',
            'labels' => array(
                'name' => 'Contact',
                'singuar_name' => 'contact',
                'contact_name' => 'contact',
                'name_admin_bar' =>'contact',
                'add_new' => 'Ajouter',
                'add_new_item' => 'Ajouter un contact',
                'new_item' => 'Nouveau contact',
                'edit_item' => 'Editer un contact',
                'view_item' => 'Voir le contact',
                'all_items' => 'Toutes les contacts',
                'search_items' => 'Rechercher parmi les contacts',
                'not_found' => 'Pas de contact trouvées',
                'not_fount_in_trash' => 'Pas de contact dans la corbeille'
            ),
            'public' => true,
            'show_in_contact' => true,
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'contacts'
            ),
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => 11,
            'menu_icon'=>'dashicons-location-alt',
            'supports' => array(
                'title',
            )
        )
    );
}

add_action('init',  'CPT_contacts');


/* ---------------------------------------------------------------- */
/* ------   METABOX  pour les coordonne du cabinet contacts   ----- */
/* ---------------------------------------------------------------- */


add_action('add_meta_boxes', 'add_metabox_coordonne');

function add_metabox_coordonne(){
    add_meta_box('id_metabox_coordonne', 'Coordonées', 'MB_coordonne', 'contacts', 'side');
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
