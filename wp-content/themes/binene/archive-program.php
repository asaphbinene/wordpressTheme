<?php
    get_header(); 
    pageBanner(
        array(
        'title' => 'All Programs completed so far',
        'subtitle' => 'learning is the same as eating as long we live we should learn'
        )
    );
    ?>
    <div class="container container--narrow page-section">
        <?php 
            while (have_posts() ){ 
                the_post();  ?>
                <div class="program-summary">
                    <a class="program-summary__date program-summary__date--blue t-center" href="<?php the_permalink(); ?>">
                        <span class="program-summary__day"><?php $program_date = new DateTime(get_field('program_date'));
                        echo $program_date->format('Y'); ?></span>
                        <span class="program-summary__day"><?php echo get_field('school'); ?></span>
                        <span class="program-summary__month"><?php echo get_field('university_level'); ?></span>
                    </a>
                    <div class="program-summary__content">
                        <h5 class="program-summary__title headline headline--tiny">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h5>
                        <p><?php echo wp_trim_words(get_the_content(), 20); ?>
                            <a href="<?php the_permalink(); ?>" class="nu gray">Read more</a>
                        </p>
                    </div>
                </div>    
                <?php 
            } 
            echo paginate_links();
        ?>
        <!--
        <p class="t-center no-margin">
            <a href="<?php echo site_url('archive-program'); ?>" class="btn btn--blue">
            You Can roll back in the past Portfolios view here</a>
        </p> -->
    </div>
  <?php
    get_footer();
?>