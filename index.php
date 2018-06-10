<?php
	/*
	Theme Name: DAUk
	Template Name: DA_index
	*/
	get_header();

	global $page;
	if(get_the_ID($page->ID) != '4') { ?>
		<style type="text/css">
			.btn-menu {
    			background-color: transparent;
    			box-shadow: none;
    			border: 1px solid black;
    		}

    		.btn-menu span {
    			background-color: #000;
    		}

    		.name-menu {
			    color: #000;
			    border: none;
    		}
		</style>
	<?php }
?>

<?php include 'head.php' ?>


<aside>
	<div class="wrapper">
		<div class="container-fluid">
			<?php
			    $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
					if ( have_posts() ) : // если имеются записи в блоге.
					query_posts('&order=DSC'."&paged=$page");
						while (have_posts()) { the_post();   
							get_template_part( 'post', get_post_format() );
					};
				if (  $wp_query->max_num_pages > 1 ) : ?>
				<script id="true_loadmore">
				var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
				var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
				var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
				</script>
			<?php endif;
				endif;
				wp_reset_query();
			?> 
		</div>
	</div>
</aside>

<?php get_footer(); ?>