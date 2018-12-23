<?php

    get_header();

    while(have_posts()) {
        the_post(); 
        pageBanner(
            array(
                'title' => 'default page',
                'subtitle' => 'Practice, practice make perfect'
            )
        );     
        ?>
        <div class="container container--narrow page-section">
            <?php 
            $pageStatus = get_pages(array('child_of' => get_the_ID()));
            $theparentID = wp_get_post_parent_id(get_the_ID());
            if($theparentID){ ?>
                <div class="metabox metabox--position-up metabox--with-home-link">
                    <p><a class="metabox__blog-home-link" href="<?php echo get_the_permalink($theparentID); ?>">
                    <i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title($theparentID); ?></a> 
                    <span class="metabox__main"><?php the_title(); ?></span></p>
                </div> 
            <?php };
            if ($pageStatus or $theparentID) { ?>
                <div class="page-links">
                    <h2 class="page-links__title"><a href="<?php echo get_the_permalink($theparentID); ?>"><?php echo get_the_title($theparentID); ?></a></h2>
                    <ul class="min-list">
                        <?php
                        if ($theparentID) {
                            $listChildOf = $theparentID;     
                        } else {
                            $listChildOf = get_the_ID();
                        }
                        wp_list_pages(array(
                            'title_li' => NULL,
                            'child_of' =>  $listChildOf,
                        )); 
                        ?>
                    </ul>
                </div>    
            <?php }; ?>
        <div class="generic-content">
            <?php the_content(); ?>
        </div>
    <?php
    }
    get_footer();
?>