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



/* -------------------------------------------------- */
/* --------   METABOX  Buffet SANS boissons   ------- */
/* -------------------------------------------------- */


add_action('add_meta_boxes', 'add_metabox_sans_boissons');

function add_metabox_sans_boissons(){
    add_meta_box('id_metabox_sans_boissons', 'Buffet sans boisson', 'MB_sans_boissons', 'tarifbuffets');
}

// 2 -  construction de la metabox

function MB_sans_boissons($POST){
    wp_nonce_field(basename(__FILE__), 'metabox_sans_boissons');
    $SB_prix     = get_post_meta($POST->ID, 'SB_prix', true);
    $SB_comporte = get_post_meta($POST->ID, 'SB_comporte', true);
    ?>
    <p>
        <label for="SB_prix">Prix</label>
        <input id="SB_prix" type="text" name="SB_prix" value="<?php echo $SB_prix; ?>"/>€
    </p>
    <p>
        <label for="SB_comporte">Ça comporte</label>
        <textarea id="SB_comporte" type="SB_comporte" name="SB_comporte"><?php echo $SB_comporte; ?></textarea>
    </p>
    <?php
}

// 3 - Sauvegarde des données de la métabox

add_action('save_post', 'save_metabox_sans_boissons');

function save_metabox_sans_boissons($POST_ID){

    if(isset($_POST['SB_prix'])){
        update_post_meta($POST_ID, 'SB_prix', esc_html($_POST['SB_prix']));
    }
    if(isset($_POST['SB_comporte'])){
        update_post_meta($POST_ID, 'SB_comporte', esc_textarea($_POST['SB_comporte']));
    }
}


/* ------------------------------------------------------- */
/* --------   METABOX  Buffet boissons COMPRISES   ------- */
/* ------------------------------------------------------- */


add_action('add_meta_boxes', 'add_metabox_boissons_comprises');

function add_metabox_boissons_comprises(){
    add_meta_box('id_metabox_boissons_comprises', 'Buffet boissons comprises', 'MB_boissons_comprises', 'tarifbuffets');
}

// 2 -  construction de la metabox

function MB_boissons_comprises($POST){
    wp_nonce_field(basename(__FILE__), 'metabox_boissons_comprises');
    $BC_prix     = get_post_meta($POST->ID, 'BC_prix', true);
    $BC_comporte = get_post_meta($POST->ID, 'BC_comporte', true);
    ?>
    <p>
        <label for="BC_prix">Prix</label>
        <input id="BC_prix" type="text" name="BC_prix" value="<?php echo $BC_prix; ?>"/>€
    </p>
    <p>
        <label for="BC_comporte">Ça comporte</label>
        <textarea id="BC_comporte" type="BC_comporte" name="BC_comporte"><?php echo $BC_comporte; ?></textarea>
    </p>
    <?php
}

// 3 - Sauvegarde des données de la métabox

add_action('save_post', 'save_metabox_boissons_comprises');

function save_metabox_boissons_comprises($POST_ID){

    if(isset($_POST['BC_prix'])){
        update_post_meta($POST_ID, 'BC_prix', esc_html($_POST['BC_prix']));
    }
    if(isset($_POST['BC_comporte'])){
        update_post_meta($POST_ID, 'BC_comporte', esc_textarea($_POST['BC_comporte']));
    }
}


/* --------------------------------------------------- */
/* --------   METABOX  Buffet FULL boissons    ------- */
/* --------------------------------------------------- */


add_action('add_meta_boxes', 'add_metabox_full_boissons');

function add_metabox_full_boissons(){
    add_meta_box('id_metabox_full_boissons', 'Buffet boissons Full', 'MB_full_boissons', 'tarifbuffets');
}

// 2 -  construction de la metabox

function MB_full_boissons($POST){
    wp_nonce_field(basename(__FILE__), 'metabox_full_boissons');
    $BF_prix     = get_post_meta($POST->ID, 'BF_prix', true);
    $BF_comporte = get_post_meta($POST->ID, 'BF_comporte', true);
    ?>
    <p>
        <label for="BF_prix">Prix</label>
        <input id="BF_prix" type="text" name="BF_prix" value="<?php echo $BF_prix; ?>"/>€
    </p>
    <p>
        <label for="BF_comporte">Ça comporte</label>
        <textarea id="BF_comporte" type="BF_comporte" name="BF_comporte"><?php echo $BF_comporte; ?></textarea>
    </p>
    <?php
}

// 3 - Sauvegarde des données de la métabox

add_action('save_post', 'save_metabox_full_boissons');

function save_metabox_full_boissons($POST_ID){

    if(isset($_POST['BF_prix'])){
        update_post_meta($POST_ID, 'BF_prix', esc_html($_POST['BF_prix']));
    }
    if(isset($_POST['BF_comporte'])){
        update_post_meta($POST_ID, 'BF_comporte', esc_textarea($_POST['BF_comporte']));
    }
}
