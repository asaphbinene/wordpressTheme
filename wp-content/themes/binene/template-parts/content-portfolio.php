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