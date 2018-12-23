<?php
    get_header(); 
    pageBanner(
        array(
        'title' => 'All current Portfolios',
        'subtitle' => 'The only way to enforce the learning is to practice and review'
        )
    );
    ?>
    <div class="container container--narrow page-section">
        <?php 
        while (have_posts() ){ 
            the_post();
            get_template_part('template-parts/content', 'portfolio');
            //get_template_part('template-parts/archive', 'portfolio');  
            ?>
            <?php 
        } 
        echo paginate_links();
        ?>
        <hr>
        <p class="t-center no-margin">
            <a href="<?php echo site_url('past-portfolio'); ?>" class="btn btn--blue">
            You Can roll back in the past Portfolios view here</a>
        </p>
    </div>
<?php
    get_footer();
?>