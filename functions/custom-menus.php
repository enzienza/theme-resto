<?php
/*
* ./ functions/custom-menu.php
*
*  Descrition : Création d'un CPT pour gerer les menus (resto & emporter)
*
*  Plan du fichier :
*       1 - CPT_menus
*
*/


/* ---------------------------------------------------------- */
/* --------   CPT menu (section menu)   ------- */
/* ---------------------------------------------------------- */

function CPT_menus() {
    register_post_type(
        'menus', array(
            'label' => 'Menus',
            'labels' => array(
                'name' => 'Menus',
                'singuar_name' => 'Menu',
                'menu_name' => 'Menu',
                'name_admin_bar' =>'Menu',
                'add_new' => 'Ajouter',
                'add_new_item' => 'Ajouter un menu',
                'new_item' => 'Nouveau menu',
                'edit_item' => 'Editer un menu',
                'view_item' => 'Voir le menu',
                'all_items' => 'Toutes les menus',
                'search_items' => 'Rechercher parmi les menus',
                'not_found' => 'Pas de menu trouvées',
                'not_fount_in_trash' => 'Pas de menu dans la corbeille'
            ),
            'public' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'menus'
            ),
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => 7,
            'menu_icon'=>'dashicons-list-view',
            'supports' => array(
                'title',
            )
        )
    );
}

add_action('init',  'CPT_menus');
