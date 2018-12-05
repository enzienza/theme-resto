<?php
/*
* ./ functions/custom-tarifbuffet.php
*
*  Descrition : Création d'un CPT pour gerer les tarifs du buffet de la section #tarif
*
*  Plan du fichier :
*       1 - CPT_tarifbuffets
*       2 - metabox_sans_boissons
*       3 - metabox_boissons_comprises
*       4 - metabox_full_boissons
*
*/


/* ---------------------------------------------------------- */
/* --------   CPT tarifbuffet (section tarifbuffet)   ------- */
/* ---------------------------------------------------------- */

function CPT_tarifbuffets() {
    register_post_type(
        'tarifbuffets', array(
            'label' => 'Tarif buffets',
            'labels' => array(
                'name' => 'Tarif buffets',
                'singuar_name' => 'Tarif buffet',
                'menu_name' => 'Tarif buffet',
                'name_admin_bar' =>'Tarif buffet',
                'add_new' => 'Ajouter',
                'add_new_item' => 'Ajouter un tarif buffet',
                'new_item' => 'Nouveau tarif buffet',
                'edit_item' => 'Editer un tarif buffet',
                'view_item' => 'Voir le tarif buffet',
                'all_items' => 'Toutes les tarif buffets',
                'search_items' => 'Rechercher parmi les tarif buffets',
                'not_found' => 'Pas de tarif buffet trouvées',
                'not_fount_in_trash' => 'Pas de tarif buffet dans la corbeille'
            ),
            'public' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'tarifbuffets'
            ),
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => 6,
            'menu_icon'=>'dashicons-excerpt-view',
            'supports' => array(
                'title',
            )
        )
    );
}

add_action('init',  'CPT_tarifbuffets');
