<?php 
	$cats = '';
    $last_cat = '';
    $cat_titles = array();
    $terms = wp_get_post_terms(get_the_ID(), 'faq_category');
    foreach ($terms as $term){
        $cat_title = $term->name;
        $cat_slug = $term->slug;
        $cats .= "$cat_slug ";
    }
?>
    <div class="faq_container">
        <div class='masonry-item <?php echo esc_attr($cats);?>> 
            <i class='fa fa-book'></i>
            <div class='faq-item'>
                <div class='entry-meta'>
                    <a href='<?php the_permalink(); ?>'>
                    	 <h3><?php the_title(); ?></h3>
                    </a>
            		<?php the_excerpt(); ?>
                </div>
            </div>
    	</div>
    </div>