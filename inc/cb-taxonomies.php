<?php

function cb_register_taxes() {

    $args = [
        "label" => __( "Sector", "cb-kcandf2023" ),
        "labels" => [
            "name" => __( "Sectors", "cb-kcandf2023" ),
            "singular_name" => __( "Sectors", "cb-kcandf2023" ),
        ],
        "public" => true,
        "publicly_queryable" => false,
        "hierarchical" => true,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => false,
        "show_admin_column" => true,
        "show_in_rest" => true,
        "show_tagcloud" => false,
        "show_in_quick_edit" => true,
        "show_in_graphql" => false,
    ];
    register_taxonomy( "sectors", [ "case-studies" ], $args );

    $args = [
        "label" => __( "Process", "cb-kcandf2023" ),
        "labels" => [
            "name" => __( "Process", "cb-kcandf2023" ),
            "singular_name" => __( "Processes", "cb-kcandf2023" ),
        ],
        "public" => true,
        "publicly_queryable" => false,
        "hierarchical" => true,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => false,
        "show_admin_column" => true,
        "show_in_rest" => true,
        "show_tagcloud" => false,
        "show_in_quick_edit" => true,
        "show_in_graphql" => false,
    ];
    register_taxonomy( "process", [ "case-studies" ], $args );

}
add_action( 'init', 'cb_register_taxes' );

