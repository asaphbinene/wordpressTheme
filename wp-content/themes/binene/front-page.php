<?php
/**
 * Welcome to www.binene.com main template file
 *
 */
  get_header(); ?>
  
  <div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('images/introBanner.jpg'); ?>);"></div>
      <div class="page-banner__content container t-center c-white">
        <h1 class="headline headline--large">Welcome to our space!</h1>
        <h2 class="headline headline--medium">We grateful for attention given to us!</h2>
        <h3 class="headline headline--small">Feel Free To Post or Comment</h3>
        <a href="<?php echo get_post_type_archive_link('program'); ?>" class="btn btn--large btn--blue">Quick Background check</a>
    </div>
  </div>
  <div class="full-width-split group">
    <div class="full-width-split__one">
      <div class="full-width-split__inner">
        <h2 class="headline headline--small-plus t-center">Our Comming Portfolios</h2>
        <?php
          $today = date('Ymd');
          $myHomeQuery = new WP_Query(
            array(
            'posts_per_page' => 2,
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
              )
            )
          )); 
          While($myHomeQuery->have_posts()){
            $myHomeQuery->the_post(); 
            get_template_part('template-parts/content', 'portfolio');
          } 
          wp_reset_postdata();
        ?>
        <p class="t-center no-margin"><a href="<?php echo get_post_type_archive_link('portfolio'); ?>" class="btn btn--blue">View All Portfolios</a></p>
      </div>
    </div>
    <div class="full-width-split__two">
      <div class="full-width-split__inner">
        <h2 class="headline headline--small-plus t-center"><a href="<?php echo get_post_type_archive_link('post'); ?>">From Our Blogs</a></h2>
        <?php
          $myHomeQuery = new WP_Query(array(
            'posts_per_page' => 2
          )); 
          While($myHomeQuery->have_posts()){
            $myHomeQuery->the_post(); 
            get_template_part('template-parts/content', 'portfolio');
            ?>
            <!--
             <div class="event-summary">
                <a class="event-summary__date event-summary__date--beige t-center" href="<?php the_permalink(); ?>">
                  <span class="event-summary__month"><?php the_time('M'); ?></span>
                  <span class="event-summary__day"><?php the_time('d'); ?></span>  
                </a>
                <div class="event-summary__content">
                  <h5 class="event-summary__title headline headline--tiny">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                  </h5>
                  <p><?php echo wp_trim_words(get_the_content(), 20); ?>
                    <a href="<?php the_permalink(); ?>" class="nu gray">Read more</a>
                  </p>
                </div>
              </div> -->
           <?php
          } 
          wp_reset_postdata();
        ?>
        <p class="t-center no-margin">
        <a href="<?php echo get_post_type_archive_link('post'); ?>" class="btn btn--yellow"
        >View All Blog Posts</a></p>
      </div>
    </div>
  </div>

  <div class="hero-slider">
  <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('images/affectionTime.jpg'); ?>);">
    <div class="hero-slider__interior container">
      <div class="hero-slider__overlay">
        <h2 class="headline headline--medium t-center">Love and Dreams in Action create Future!</h2>
        <p class="t-center">Using every tools in our disposal to Serve and Sacrify our time to express equity for the better World.</p>
        <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
      </div>
    </div>
  </div>
  <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('images/gabrielAndbrothers.jpg'); ?>);">
    <div class="hero-slider__interior container">
      <div class="hero-slider__overlay">
        <h2 class="headline headline--medium t-center">Partnership and sharing are the tools for change!</h2>
        <p class="t-center">The future depend on our everyday delivery motivation, it takes time and commitment to see the future.</p>
        <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
      </div>
    </div>
  </div>
  <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('images/foodTime.jpg'); ?>);">
    <div class="hero-slider__interior container">
      <div class="hero-slider__overlay">
        <h2 class="headline headline--medium t-center">Smile & food are need for better production!</h2>
        <p class="t-center">Adding value to create better World needs positive contribution of every hands around us.</p>
        <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); 
?>