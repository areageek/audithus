<?php 
global $post;
$author = get_the_author();
if($author == '' ) { return; }
if(get_the_author_meta('description')=='') { return; }
?>
<div class="uk-grid author-container">
	<div class="uk-width-auto uk-flex uk-flex-center author-col-1">
		<?php
		echo get_avatar( $post->post_author, 110 );
		?>
	</div>
	<div class="uk-width-expand uk-flex uk-flex-middle">
		<div>
			<h3><a href="<?php echo get_author_posts_url($post->post_author); ?>"><?php the_author(); ?></a></h3>
			<div class="uk-text-middle"><?php the_author_meta('description'); ?></div>
		</div>
	</div>
</div>