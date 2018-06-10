<aside style="background-image: url(<?php echo get_the_post_thumbnail_url(4); ?>);" class="header">
	<div class="wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<h1 class="name_site"><?php echo get_the_title(4); ?></h1>
				</div>
				<div class="col-12">
					<h3 class="slag"><?php 
						$postId = 4;
						$post = get_post($postId);
						echo $post->post_content;
					?></h3>
				</div>
			</div>
		</div>
	</div>
</aside>