<a href='<?php the_permalink(); ?>' class='uk-grid-margin' >
    <div class='medio-item'>
        <h2> <?php the_title(); ?></h2>
        <?php the_excerpt(); ?>
        <div class ='profile_image'>
           <?php if( has_post_thumbnail() ) { echo wp_get_attachment_image( get_post_thumbnail_id( get_the_ID() ), "large"); } ?>
        </div>
        <div class='testi-meta'>
            <h4><?php echo Themeton_Std::getmeta('input_name'); ?></h4>
            <div class='rate uk-scrollspy'>
            <?php for( $i=0; $i < 5; $i++) {
              $color_class = '';
              if( $i < (int)Themeton_Std::getmeta('star') ) { $color_class = 'color-yellow'; }
              ?>
              <span class='fa fa-star <?php echo esc_attr($color_class); ?>'></span>
            <?php } ?>
          </div>
        </div>
    </div>
</a>