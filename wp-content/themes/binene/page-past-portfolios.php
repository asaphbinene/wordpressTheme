<?php
    get_header(); 
    pageBanner(
        array(
        'title' => 'Past Portfolios',
        'subtitle' => 'Our reviewing'
        )
    );
    ?>
    <div class="container container--narrow page-section">
        <?php $today = date('Ymd');
        $myPastPortfolios = new WP_Query(array(
        'paged' => get_query_var('paged', 1),
        'post_type' => 'portfolio',
        'meta_key' => 'portfolio_date',
        'orderby' =>  'meta_value_num',
        'order' => 'ASC',
        'meta_query' => array(array(
            'key' => 'portfolio_date',
            'compare' => '<',
            'value' => $today,
            'type' => 'numeric'
            ) 
        )
        )); 
        While($myPastPortfolios->have_posts()){
            $myPastPortfolios->the_post();
            get_template_part('template-parts/content', 'portfolio');
            //get_template_part('template-parts/past', 'portfolio'); 
        } 
        echo paginate_links(
            array(
                'total' => $myPastPortfolios -> max_num_pages
            )
        );
        ?>
        <hr>
        <p class="t-center no-margin">
            <a href="<?php echo get_post_type_archive_link('portfolio'); ?>" class="btn btn--blue">
            You can roll to the all comming Portfolios view here</a>
        </p>
    </div>
<?php
    get_footer();
?>