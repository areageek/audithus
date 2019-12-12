<?php
global $post;

$bool = true;
$bool = empty($post) ? false : $bool;

if (Themeton_Std::getmeta('page-title') == "disable" || Themeton_Std::getmeta('page_title') == "0") {
	$bool = false;
} else {
	if (Themeton_Std::getmeta('page_title') == "" || Themeton_Std::getmeta('page_title')=='default') {
		$optionname = 'page-title-show';
		if(is_single()) {
			$optionname = 'post_title_show';
		} elseif(is_page()) {
			$optionname = 'page_title_show';
		} elseif(get_post_type( get_the_ID() ) == 'portfolio') {
			$optionname = 'portfolio_title_show';
		}
		if (Themeton_Std::getopt($optionname) == '') {
			$bool = false;
		}
	}
}

if (Themeton_Std::getmeta('page-title') == "" || Themeton_Std::getmeta('page-title')=='default') $bool = true;
else $bool = false;

if ($bool == true): ?>

	<div class="page-title medio-article-rectangle uk-text-center uk-position-relative" data-uk-parallax="bgy: -120">

	    <div class="medio-blog-content uk-position-center uk-light">
	    	<div class="uk-container">
		        <h3 class="uk-article-title text-semibold">
		            <a class="uk-link-reset" href="<?php the_permalink(); ?>"><?php if( isset($post) && is_singular() ) {the_title();} else { echo Themeton_Tpl::get_page_title(); } ?></a>
		        </h3>
		        <?php if( isset($post) && is_singular() ) { ?>
		        <div class="dash"></div>
		        <div class='post-author post-meta'>
		            <?php
		            echo '<span class="blog-date"><a class="uk-button uk-button-text" href="'.get_the_permalink().'">'.get_the_date(get_option("date-format")).'</a></span> ';
		            if(isset($post)) {
		            	echo "&nbsp;&nbsp;<span class='author'><a class='uk-button uk-button-text' href='".Themeton_Tpl::get_author_link_address()."'>".get_the_author_meta( 'display_name', $post->post_author )."</a></span>";
		            }
		            ?>
		        </div>
		        <?php } ?>
	        </div>
	    </div>
	    
	</div><!-- end .page-title -->

<?php endif; // no more page titles ?>