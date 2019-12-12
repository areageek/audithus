<div class='uk-grid-margin'>
    <a href='<?php the_permalink(); ?>'>
        <div class='service-item-section'>
            <?php if(Themeton_Std::getmeta('icon_image')) {?>
                <div class='service-item featured_icon'><img src='<?php echo Themeton_Std::getmeta('icon_image'); ?>' alt='<?php esc_attr_e('Icon','medio'); ?>'></div>
                <?php
            } else if( has_post_thumbnail() ) {
                $img = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
                $img = !empty($img) ? $img[0] : '';
                ?><div class='service-item' data-bg-image='<?php echo esc_url($img); ?>'><div class='entry-hover'></div></div><?php
            } ?>
            <div class='entry-meta'>
                <h3><?php the_title(); ?></h3>
                <?php the_excerpt(); ?>
            </div>
        </div>
    </a>
</div> 