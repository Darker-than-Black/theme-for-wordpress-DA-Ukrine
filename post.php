<div class="row">
	<article class="newsB" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);">
		<div class="container-fluid">
			<div class="row justify-content-center">
				<div class="news_title col-12"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></div>
				<div class="news_text col-12"><?php the_excerpt(); ?></div>
				<div class="col-12"><a href="<?php the_permalink(); ?>" class="news_link">Read More &#8594;</a></div>
			</div>
		</div>
	</article>
</div>