<?php
/*
* ./ functions/custom-servicemenu.php
*
*  Descrition : Création d'un CPT pour gerer les servicemenus (resto & emporter)
*
*  Plan du fichier :
*       1 - CPT_servicemenus
*
*/


/* ---------------------------------------------------------- */
/* --------   CPT servicemenu (section servicemenu)   ------- */
/* ---------------------------------------------------------- */

function CPT_servicemenus() {
    register_post_type(
        'servicemenus', array(
            'label' => 'Service menus',
            'labels' => array(
                'name' => 'Service menus',
                'singuar_name' => 'Service menu',
                'servicemenu_name' => 'Service menu',
                'name_admin_bar' =>'Service menu',
                'add_new' => 'Ajouter',
                'add_new_item' => 'Ajouter un service menu',
                'new_item' => 'Nouveau service menu',
                'edit_item' => 'Editer un service menu',
                'view_item' => 'Voir le service menu',
                'all_items' => 'Toutes les service menus',
                'search_items' => 'Rechercher parmi les service menus',
                'not_found' => 'Pas de service menu trouvées',
                'not_fount_in_trash' => 'Pas de service menu dans la corbeille'
            ),
            'public' => true,
            'show_in_servicemenu' => true,
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'servicemenus'
            ),
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => 8,
            'menu_icon'=>'dashicons-list-view',
            'supports' => array(
                'title',
            )
        )
    );
}

add_action('init',  'CPT_servicemenus');
