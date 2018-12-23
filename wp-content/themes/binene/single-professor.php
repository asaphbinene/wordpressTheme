<?php 
get_header();

while(have_posts()) {
    the_post(); 
    pageBanner();
    ?>
    <div class="container container--narrow page-section">
        <div class="generic-content">
            <div class="row group">
                <div class="one-fourth professor-card_list-item">
                    <p class="professor-card">
                        <img class="professor-card__image" 
                            src="<?php the_post_thumbnail_url('professorPortrait1'); ?>"/>
                        <span class="professor-card__name">
                            <?php the_title(); ?>
                        </span>
                    </p>
                </div>
                <div class="two-thirds">
                    <?php the_content(); ?>
                </div>
            </div>
        </div><?php 
        $relatedPrograms = get_field('related_program');

        if($relatedPrograms){
            ?><hr class="section-break">
            <div class="headline">
                <h5 class="headline headline--medium">Course(s) or program(s) associates</h5>
                <ol class="link-list min-list"><?php
                foreach($relatedPrograms as $program){
                ?>
                    <li><a href="<?php echo get_the_permalink($program); ?>">
                        <?php echo get_the_title($program); ?></a>
                    </li>
                <?php
            } ?>
                </ol>
            </div><?php
        } ?>
    </div>
    <?php 
}   ?>
<?php
    get_footer();
?>