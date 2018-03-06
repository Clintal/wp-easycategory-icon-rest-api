<?php
/**
 * Plugin Name: Easy Category Icons - WP REST API Addon
 * Description: This plugin adds the easy category icons parameter to API categories.
 * Author: Clintal
 * Author URI: https://www.clintal.com
 * Version: 0.1
 * License: GPL
 **/

add_action( 'rest_api_init', 'slug_register_easycategory' );
function slug_register_easycategory() {
    register_rest_field( 'category',
        'easy_category_icon',
        array(
            'get_callback'    => 'slug_get_easycategory_icon_name',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}

// returns fontawesome icon name
function slug_get_easycategory_icon_name( $object, $field_name, $request ) {
    $cat = get_category_by_slug($object['slug']);
    preg_match('/fa-([a-z]*)[.\S]/', $cat->term_font_icon, $matches);
    return $matches[1];
}
