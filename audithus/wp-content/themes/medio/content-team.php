<?php
$img_html = '';
 if( has_post_thumbnail() ) {
    $thumb = wp_get_attachment_image( get_post_thumbnail_id( get_the_ID() ), "large");
    $img = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
    $img = !empty($img) ? $img[0] : '';
}
?>

<div class="medio-element">
    <div class="uk-flex uk-flex-center medio-team">
        <div class="uk-inline medio-item">
         <a href='<?php the_permalink(); ?>'>
            <div class="medio-team-img" data-bg-image="<?php echo esc_attr($img); ?>">
            </div>
            <div class="medio-seo-message ">
                <h4><?php echo Themeton_Std::getmeta('first_name'); ?></h4>
                <span><?php echo Themeton_Std::getmeta('position');?></span>
            </div>
         </a>   
        </div>
    </div>
</div>