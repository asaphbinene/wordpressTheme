<?php 

    //Creating a function to manipilate ours style and content on the banner section.
    function pageBanner($args = NULL) {

        //Assigning a default argument in case there is not special assignment
        if(!$args['title']){
            $args['title'] = get_the_title();
        }

        if(!$args['subtitle']){
            $args['subtitle'] = get_field('page_banner_subtitle');
        }

        if(!$args['photo']){
            if(get_field('page_banner_background_image')){
                $args['photo'] = get_field('page_banner_background_image')['sizes']['pageBanner'];
            }else{
                $args['photo'] = get_theme_file_uri('images/litleSmile.jpg');
            }
        }

        ?>
        <div class="page-banner">
            <div class="page-banner__bg-image" style="background-image: url(
                <?php echo $args['photo']       
                ?>);">
            </div>
            <div class="page-banner__content container container--narrow">
                <h1 class="page-banner__title"><?php echo $args['title']; ?></h1>
                <div class="page-banner__intro">
                    <p><?php echo $args['subtitle']; ?></p>
                </div>
            </div>  
        </div>
        <?php 
    }

    //Creating a function to manipilate ours style and page interractivities
    function binene_files(){
        wp_enqueue_script('googleMap', '//maps.googleapis.com/maps/api/js?key=AIzaSyCPBu6beR-PgDIY8y4QZxJIG34m2etRwa0', NULL, '1.0', true);
        wp_enqueue_style('fontawesome-all', get_template_directory_uri().'/fontawesome-free-5.0.11/web-fonts-with-css/css/fontawesome-all.min.css');
        wp_enqueue_script('myMainJs', get_template_directory_uri().'/js/scripts-bundled.js', NULL, microtime(), true);
        wp_enqueue_style('especial-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
        wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
        wp_enqueue_style('myfonts', get_template_directory_uri().'/custom-fonts/css/fonts');
        wp_enqueue_style('myCSS', get_template_directory_uri().'/bootstrap-4.1.1/css', NULL, microtime());
        wp_enqueue_style('fontawesome-all', get_template_directory_uri().'/fontawesome-free-5.0.11/web-fonts-with-css/css/fontawesome-all.min.css');
        wp_enqueue_style('fontawesom', get_stylesheet_uri(), NULL, microtime());
        wp_enqueue_style('binene_theme_main_styles', get_stylesheet_uri(), NULL, microtime());
    }

    //Calling the functions scripts above for action by wordpress on it own time

    add_action('wp_enqueue_scripts', 'binene_files');

    function binene_theme_features(){
        register_nav_menu('myFooterFirstMenu', 'Footer First Menu Location');
        register_nav_menu('myFooterSecondMenu', 'Footer Second Menu Location');
        register_nav_menu('myHeaderMainMenu', 'Header Menu Location');
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_image_size('professorPortrait', 180, 250, true);
        add_image_size('professorPortrait1', 250, 300, array('letf', 'top'));
        add_image_size('pageBanner', 1500, 350, array('letf', 'top'));
    }
    add_action('after_setup_theme', 'binene_theme_features');

    function binene_adjust_queries($query){
        if(!is_admin() AND is_post_type_archive('program') AND $query->is_main_query()) {
            $query->set('orderby', 'title');
            $query->set('order', 'ASC'); 
        }
        
        if(!is_admin() AND is_post_type_archive('portfolio') AND $query->is_main_query()) {
            $today = date('Ymd');
            $query->set('meta_query', 'portfolio_date');
            $query->set('orderby', 'meta_value_num');
            $query->set('order', 'ASC'); 
            $query->set('meta_query', array(
                array(
                'key' => 'portfolio_date',
                'compare' => '>=',
                'value' => $today,
                'type' => 'numeric'
              ) 
            )); 
        }
    }
    
    add_action('pre_get_posts', 'binene_adjust_queries'); 

    function bineneMapkey($api){
        $api['key'] = 'AIzaSyCPBu6beR-PgDIY8y4QZxJIG34m2etRwa0';
        return $api;
    }

    add_filter('acf/fields/google_map/api', 'bineneMapkey');
?>