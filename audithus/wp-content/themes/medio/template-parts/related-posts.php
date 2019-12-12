<?php
$tags = wp_get_post_categories($post->ID);
if ($tags) {
	$tag_ids = array();
	foreach($tags as $individual_tag) $tag_ids[] = $individual_tag;
	 
	$args=array(
		'cat' => $tag_ids,
		'post__not_in' => array($post->ID),
		'showposts'=> Themeton_Std::getopt('post_relatedpostsnumber'),  // Number of related posts that will be shown.
		'ignore_sticky_posts'=> 1
	);
	$column = Themeton_Std::getopt('post_relatedpostsnumber');

	$class = "uk-width-1-".$column."@s uk-width-1-".$column."@m uk-width-1-".$column."@l";
	 
	$my_query = new WP_Query($args);
	if( $my_query->have_posts() ) {
	?>
		<div class="uk-clearfix clearfix"></div>
		<div class="uk-container related-post" >
			<h3 class="medio-brand-title"><?php esc_html_e('Você também pode gostar de','medio'); ?></h3>
			<div class="uk-grid">
			<?php
				while ($my_query->have_posts()) {
					$my_query->the_post();
					?>
					<div class="<?php echo esc_attr($class); ?>">
						<article>
							<?php
							$content = '';
							if ( has_post_thumbnail() ) {
								if ($column == 2) { 
									echo Themeton_Tpl::get_post_image('large', '5x3', 'plus', true);
									if (strlen(get_the_title())<31) {
										$content = get_the_excerpt(); 
										$content = substr( $content , 0, 60);
									}
									else $content = '';
								}
								else echo Themeton_Tpl::get_post_image('medium', '5x3', 'plus', true);
							} else {
								$content = get_the_excerpt(); 
								$content = substr( $content , 0, 70);
							} ?>
							<div>
								<a class="uk-button-text" href="<?php the_permalink();?>"><?php echo get_the_date(get_option("date-format")); ?></a>
								<h5>
									<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
								</h5>
								<p><?php echo esc_html($content); ?></p>
								<a class="uk-button-text color-brand" href="<?php the_permalink();?>"><?php esc_html_e('Leia mais', 'medio'); ?></a>
							</div><!-- /.blog-content -->
						</article>
					</div>
				<?php } ?>
			</div>
		</div>
		<?php
	}
	wp_reset_postdata();
}
?>