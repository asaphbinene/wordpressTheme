<?php
    function binene_post_types(){
        //Declaring custom post named campus
        register_post_type('campus', array(
            'supports' => array(
                'title', 'editor', 'excerpt'
            ),
            'rewrite' => array(
                'slug' => 'campuses'
            ),
            'has_archive' => true,
            'public' => true,
            'labels' => array(
                'name' => 'Campuses',
                'add_new_item' => 'Add New Campus',
                'edit_item' => 'Edit Existing Campus',
                'all_items' => 'All existing Campuses',
                'singular_name' => 'Campus'
            ),
            'menu_icon' => 'dashicons-location-alt'
        ));

        //Declaring custom post named portfolio
        register_post_type('portfolio', array(
            'supports' => array(
                'title', 'editor', 'excerpt'
            ),
            'rewrite' => array(
                'slug' => 'portfolios'
            ),
            'has_archive' => true,
            'public' => true,
            'labels' => array(
                'name' => 'Portfolios',
                'add_new_item' => 'Add New Portfolio',
                'edit_item' => 'Edit Existing Portfolio',
                'all_items' => 'All existing portfolios',
                'singular_name' => 'Portfolio'
            ),
            'menu_icon' => 'dashicons-calendar'
        ));

        //Declaring custom post named program
        register_post_type('program', array(
            'supports' => array(
                'title', 'editor'
            ),
            'rewrite' => array(
                'slug' => 'programs'
            ),
            'has_archive' => true,
            'public' => true,
            'labels' => array(
                'name' => 'Programs',
                'add_new_item' => 'Add New Program',
                'edit_item' => 'Edit Existing Program',
                'all_items' => 'All existing programs',
                'singular_name' => 'Program'
            ),
            'menu_icon' => 'dashicons-awards'
        ));

        //Declaring custom post named professor
        register_post_type('professor', array(
            'supports' => array(
                'title', 'editor', 'thumbnail'
            ),
            'public' => true,
            'labels' => array(
                'name' => 'Professors',
                'add_new_item' => 'Add New Professor',
                'edit_item' => 'Edit Existing professor',
                'all_items' => 'All existing professors',
                'singular_name' => 'Professor'
            ),
            'menu_icon' => 'dashicons-welcome-learn-more'
        ));
    }

    add_action('init', 'binene_post_types');
?>
