<?php
/**
 * The Template for displaying all single posts.
 * Theme Name: DAUk
 */
 
get_header();
while ( have_posts() ) : the_post();  ?>  
	<div class="wrapper single_wrapper">
		<div class="container-fluid">
			<div class="row">
				<article class="header" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)" >
					<div class="container-fluid">
						<div class="row justify-content-center">
							<div class="single_title col-12"><?php echo get_the_title(); ?></div>
						</div>
					</div>
				</article>
			</div>
			<div class="row byPost">
				<div class="col-12"><p>Posted on <a href="#" class="disabled"><?php the_time('d.m.Y') ?></a> by <a href="#" class="disabled"><?php the_author(); ?></a></p>
					<p>
						<?php
						global $post;
							$t = wp_get_post_categories($post->ID, array( 'fields' => 'ids' ));
							//print_r($t);
							if($t != NULL) { 
						?>
							Category:
						<?php
							foreach ($t as $key => $value) {
							//print_r($value);
						?>
								<a href="<?php echo get_category_link($value); ?>"><?php $tag = get_category($value); echo $tag->name; ?></a> /
						<?php }; 
							}
						?>
					</p>
					<p>
						<?php
						global $post;
							$t = wp_get_post_tags($post->ID, array( 'fields' => 'ids' ));
							//print_r($t);
							if($t != NULL) { 
						?>
							Tags:
						<?php
							foreach ($t as $key => $value) {
							//print_r($value);
						?>
								<a href="<?php echo get_tag_link($value); ?>"><?php $tag = get_tag($value); echo $tag->name; ?></a> /
						<?php }; 
							}
						?>
					</p>
				</div>	
			</div>
			<div class="row">
				<div class="col-12">
					<?php echo the_content(); ?>
				</div>
			</div>
		</div>
		<div class="container-fluid bg-paging">
			<div class="row">
				<div class="col-md-3 col-12">
					<span class="paging"><?php previous_post_link('%link', '&#8592; Previous post'); ?></span>
				</div>
				<div class="col-xl-6 col-lg-5 col-md-4"></div>
				<div class="col-md-3 col-12">
					<span class="paging"><?php next_post_link('%link', 'Next post &#8594;'); ?> </span>
				</div>
			</div>
		</div>
	</div>
<?php
endwhile; // end of the loop. 
get_footer();
?>