<?php 
    get_header(); 
    pageBanner(
        array(
        'title' => 'All Location of Campuses and colleges',
        'subtitle' => 'Have look where we feed our braind and eempower skills'
        )
    );
    ?>
    <div class="container container--narrow page-section">
        <div class="acf-map">
            <?php 
            while (have_posts() ){ 
                the_post();
                $campusesMapLocation = get_field('map_location');  
                ?>
                <div class="marker" data-lat="<?php echo $campusesMapLocation['lat']; ?>"
                    data-lng="<?php echo $campusesMapLocation['lng']; ?>">
                </div>
                <?php 
            } 
            ?>
        </div>
    </div>
    <?php
    get_footer();
?>