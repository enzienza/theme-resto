<?php
/*
* ./ functions/custom-servicecate.php
*
*  Descrition : Création d'un CPT pour gerer les servicecates (resto & emporter)
*
*  Plan du fichier :
*       1 - CPT_servicecates
*
*/


/* ---------------------------------------------------------- */
/* --------   CPT servicecate (section servicecate)   ------- */
/* ---------------------------------------------------------- */

function CPT_servicecates() {
    register_post_type(
        'servicecates', array(
            'label' => 'Service cartes',
            'labels' => array(
                'name' => 'Service cartes',
                'singuar_name' => 'service carte',
                'servicecate_name' => 'service carte',
                'name_admin_bar' =>'service carte',
                'add_new' => 'Ajouter',
                'add_new_item' => 'Ajouter un service carte',
                'new_item' => 'Nouveau service carte',
                'edit_item' => 'Editer un service carte',
                'view_item' => 'Voir le service carte',
                'all_items' => 'Toutes les service cartes',
                'search_items' => 'Rechercher parmi les service cartes',
                'not_found' => 'Pas de service carte trouvées',
                'not_fount_in_trash' => 'Pas de service carte dans la corbeille'
            ),
            'public' => true,
            'show_in_servicecate' => true,
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'servicecates'
            ),
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => 9,
            'menu_icon'=>'dashicons-editor-ul',
            'supports' => array(
                'title',
            )
        )
    );
}

add_action('init',  'CPT_servicecates');
