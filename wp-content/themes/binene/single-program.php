<?php 
get_header();

while(have_posts()) {
    the_post(); 
    pageBanner();
    ?>
    <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p><a class="metabox__blog-home-link" href="
                <?php echo get_post_type_archive_link('program'); ?>">
            <i class="fa fa-home" aria-hidden="true"></i> Program home</a> 
            <span class="metabox__main">
                <?php the_title(); echo ' ( ' .get_field('course_code') .' )'; ?> 
            </span></p>
        </div>
        <?php
            $pre_espace = " ";
            //Assign array to string data from the field Prerequisite
            $co_requisite = get_field('co_requisite');
            //print_r($co_requisite);
            //print_r($lecturer_names);
            if(is_array(get_field('co_requisite'))){
                $co_rerequisite = implode(', ', get_field('co_requisite')); 
            }

            //Assign array to string data from the field Prerequisite
            $prerequisite = get_field('prerequisite');
            if(is_array(get_field('prerequisite'))){
                $prerequisite = implode(', ', get_field('prerequisite')); 
            }

            /* /Assign array to string data from the field lecturer_names
            $lecturer_names = get_field('lecturer_names');
            if(is_array(get_field('lecturer_names'))){
                // $lecturer_names = implode(', ', $lecturer_names); 
            }
            */
            $lecturer_names = get_field('lecturer_names');
            if(is_array($lecturer_names)){
                //<ul class="row-program--professor-list row-program--professor">Lecturer:<?php
                foreach($lecturer_names as $lecturer){
                    $List_professor_program .= '&nbsp;<a href="' . get_the_permalink($lecturer).'">' .get_the_title($lecturer) . '</a>';
                    /* 
                    <a href="<?php echo get_the_permalink($lecturer); ?>">
                        <?php echo wp_trim_words(get_the_title($lecturer)); ?></a>'
                    */
                } 
            } 

            // The test of how many assignment as filled to calculated the percentage on average the code can be modify 
            if(!empty((get_field('assignment1_mark')))){
                $assignment_mark = get_field('assignment1_mark');
                $assignment_mark = $assignment_mark + get_field('assignment2_mark');
                $count = 2;
                if(!empty((get_field('assignment3_mark')))){
                    $assignment_mark = $assignment_mark + get_field('assignment3_mark');
                    $count = 3;
                    if(!empty((get_field('assignment3_mark')))){
                        $assignment_mark = $assignment_mark + get_field('assignment4_mark');
                        $count = 4;
                    }
                }
                $assignment_mark = $assignment_mark / $count;
            }
        ?>
        <div class="container--narrow">
            <section class="container">
                <div class="row">
                    <div class="one-third program-item" style="background-color: pink">
                        <span>Duration Module:<?php echo get_field('course_duration'); ?></span>
                    </div>
                    <div class="one-third program-item" style="background-color: hotpink">
                        Credit:<?php echo get_field('course_creditation'); ?></span>
                    </div>
                    <div class="one-third program-item" style="background-color: deeppink">
                        <span><?php echo get_field('university_level'); ?></span>
                    </div>               
                </div>
                <div class="row">
                    <div class="one-half program-item" style="background-color: pink">
                        <span>Prerequisite:<?php echo $pre_espace .$prerequisite; ?></span>
                    </div>
                    <div class="one-half program-item" style="background-color: hotpink">
                        <span>Corequisite:<?php echo $pre_espace .$co_requisite; ?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="generic-content">
                        <span><b>Purpose:</b>&nbsp;<?php the_content(); ?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="two-thirds program-item" style="background-color: pink">
                        <span>Prescribed book/Doc.:<?php echo $pre_espace .get_field('prescri_book'); ?></span>
                    </div>
                    <div class="one-third program-item" style="background-color: hotpink">
                        <span>College/School:<?php echo $pre_espace .get_field('school'); ?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="one-half program-item" style="background-color: pink">
                        <span>lecturer by:<?php echo $List_professor_program; ?></span>
                    </div>  
                    <div class="one-quarter one-fourth program-item" style="background-color: hotpink">
                        <span>Assign Marks:<?php echo $assignment_mark; ?></span>
                    </div>
                    <div class="one-quarter one-fourth program-item" style="background-color: deeppink">
                        <span>Passed Mark:<?php echo get_field('obtained_mark'); ?></span>
                    </div>    
                </div>
            </section>
            <?php
            /*
                Assigning the filter for the coming related (portfolio) activities of 
                the particular program to be display below the program as 
                Query object: $myComingRelatedPortfolios
            */
            $today = date('Ymd');
            $myComingRelatedPortfolios = new WP_Query(
                array(
                'posts_per_page' => -1,
                'post_type' => 'portfolio',
                'meta_key' => 'portfolio_date',
                'orderby' => 'meta_value_num',
                'order' => 'ASC',
                'meta_query' => array(
                    array(
                        'key' => 'portfolio_date',
                        'compare' => '>=',
                        'value' => $today,
                        'type' => 'numeric'
                    ),
                    array(
                        'key' => 'related_program',
                        'compare' => 'LIKE',
                        'value' => '"' .get_the_ID() .'"'
                    )
                )
            ));
            if(($myComingRelatedPortfolios->have_posts())){
                ?>
                <hr class="section-break">
                <section>
                    <h4>Related up coming Portfolios of <?php echo get_the_title() ?> Program</h4>
                    <?php
                    While($myComingRelatedPortfolios->have_posts()){
                        $myComingRelatedPortfolios->the_post();
                        get_template_part('template-parts/content', 'portfolio'); 
                        /* ?>
                        <div class="event-summary">
                            <a class="event-summary__date event-summary__date--blue t-center" href="<?php the_permalink(); ?>">
                            <span class="event-summary__month"><?php $portfolio_date = new DateTime(get_field('portfolio_date'));
                            echo $portfolio_date->format('M'); ?></span>
                            <span class="event-summary__day"><?php echo $portfolio_date->format('d'); ?></span>  
                            </a>
                            <div class="event-summary__content">
                            <h5 class="event-summary__title headline headline--tiny">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h5>
                            <p><?php echo wp_trim_words(get_the_content(), 15); ?>
                                <a href="<?php the_permalink(); ?>" class="nu gray">Read more</a>
                            </p>
                            </div>
                        </div>
                     <?php */
                    }
                ?></section><?php 
            } 
            wp_reset_postdata();
            /*
                Assigning the filter for the coming related (portfolio) activities of 
                the particular program to be display below the program as
                Query object: $myPastRelatedPortfolios
            */  
            $myPastRelatedPortfolios = new WP_Query(
                array(
                'post_type' => 'portfolio',
                'meta_key' => 'portfolio_date',
                'orderby' =>  'meta_value_num',
                'order' => 'ASC',
                'meta_query' => array(
                    array(
                    'key' => 'portfolio_date',
                    'compare' => '<',
                    'value' => $today,
                    'type' => 'numeric'
                    ),
                    array(
                        'key' => 'related_program',
                        'compare' => 'LIKE',
                        'value' => '"' .get_the_ID() .'"'
                    ) 
                )
            ));
            if ($myPastRelatedPortfolios->have_posts()) {
                ?>
                <hr class="section-break">                   
                <h4>Related pass Portfolios of <?php echo get_the_title() ?>Program</h4>
                <section><?php
                    While($myPastRelatedPortfolios->have_posts()){
                        $myPastRelatedPortfolios->the_post(); 
                        get_template_part('template-parts/content', 'portfolio');
                    } ?>
                </section> <?php
            } 
            ?>
        </div>
    </div>           
    <?php 
    } 
get_footer();
?>