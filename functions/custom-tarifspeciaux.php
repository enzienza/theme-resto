<?php
/*
* ./ functions/custom-tarifspeciau.php
*
*  Descrition : Création d'un CPT pour gerer les tarid spéciaux du buffet de la section #tarif
*
*  Plan du fichier :
*       1 - CPT_tarifspeciaus
*       2 - metabox_special
*
*/


/* ---------------------------------------------------------- */
/* --------   CPT tarifspeciau (section tarifspeciau)   ------- */
/* ---------------------------------------------------------- */

function CPT_tarifspeciaus() {
    register_post_type(
        'tarifspeciaus', array(
            'label' => 'Tarif spéciaux',
            'labels' => array(
                'name' => 'Tarif spéciaux',
                'singuar_name' => 'Tarif spécial',
                'menu_name' => 'Tarif spécial',
                'name_admin_bar' =>'Tarif spécialt',
                'add_new' => 'Ajouter',
                'add_new_item' => 'Ajouter un tarif spécial',
                'new_item' => 'Nouveau tarif spécial',
                'edit_item' => 'Editer un tarif spécial',
                'view_item' => 'Voir le tarif spécial',
                'all_items' => 'Toutes les tarif spéciaux',
                'search_items' => 'Rechercher parmi les tarif spéciaux',
                'not_found' => 'Pas de tarif spécial trouvées',
                'not_fount_in_trash' => 'Pas de tarif spécial dans la corbeille'
            ),
            'public' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'tarifspeciaus'
            ),
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => 7,
            'menu_icon'=>'dashicons-feedback',
            'supports' => array(
                'title',
            )
        )
    );
}

add_action('init',  'CPT_tarifspeciaus');



/* -------------------------------------------------- */
/* --------   METABOX  Buffet Spécial   ------- */
/* -------------------------------------------------- */


add_action('add_meta_boxes', 'add_metabox_special');

function add_metabox_special(){
    add_meta_box('id_metabox_special', 'Buffet Spécial', 'MB_special', 'tarifspeciaus');
}

// 2 -  construction de la metabox

function MB_special($POST){
    wp_nonce_field(basename(__FILE__), 'metabox_special');
    $prix_special     = get_post_meta($POST->ID, 'prix_special', true);
    $remarque = get_post_meta($POST->ID, 'remarque', true);
    ?>
    <p>
        <label for="prix_special">Prix</label>
        <input id="prix_special" type="text" name="prix_special" value="<?php echo $prix_special; ?>"/>
    </p>
    <p>
        <label for="remarque">Remarque</label>
        <textarea id="remarque" type="remarque" name="remarque"><?php echo $remarque; ?></textarea>
    </p>
    <?php
}

// 3 - Sauvegarde des données de la métabox

add_action('save_post', 'save_metabox_special');

function save_metabox_special($POST_ID){

    if(isset($_POST['prix_special'])){
        update_post_meta($POST_ID, 'prix_special', esc_html($_POST['prix_special']));
    }
    if(isset($_POST['remarque'])){
        update_post_meta($POST_ID, 'remarque', esc_textarea($_POST['remarque']));
    }
}
