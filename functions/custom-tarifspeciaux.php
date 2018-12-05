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
