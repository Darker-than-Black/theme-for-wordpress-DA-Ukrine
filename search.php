<?php
/*
Template Name: Search Page
*/
 
	get_header(); 
?>

<aside style="background-image: url(https://media.giphy.com/media/MgcCwh5dTh6AE/giphy.gif);" class="header headSearch">
	<div class="wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<h1 class="name_site searchName">Search on site</h1>
				</div>
			</div>
		</div>
	</div>
</aside>

<div class="wrapper single_wrapper">
	<div class="container-fluid">
		<div class="row"></div>
		<div class="row"></div>
		<div class="row">
			<div class="sea_text">
				<div class="container-fluid">
						<div class="row justify-content-center">
							<div class="col-12">
								<div class="row">
									<div class="col-12 mBt">
										Результати пошуку:
										<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>" >
											<input type="text" value="<?php echo get_search_query() ?>" name="s" id="s" onfocus="if(this.value == '<?php echo get_search_query() ?>') { this.value = ''; }"/>
										</form>
									</div>
								</div>
								<ol>
								<?php
									global $query_string;
									wp_parse_str( $query_string, $search_query );
									global $query;
									$query = new WP_Query( $search_query);
									//print_r($search);
									if ( $query->have_posts() ) { 
										while ( $query->have_posts() ) {
											$query->the_post();
								?>
									<li>
										<a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
										<div class="col-12 mTop"><p>
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
										</p></div>
										<div class="col-12"><p>
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
										</p></div>
										<div class="col-12">
											<div class="row">
												<div class="col-md-6 col-12"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt=""></div>
												<div class="col-md-6 col-12 sea_descript-text"><?php the_excerpt(); ?></div>
											</div>
										</div>
									</li>	
								<?php
								} ?>
								<li class="searchPaging">
									<div class="bg-paging ">
						                <div class="col-12">
						                    <?php 
						                    add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
						                        function my_navigation_template( $template, $class ){
						                            return '
						                            <nav class="navigation %1$s" role="navigation">
						                                <div class="nav-links">%3$s</div>
						                            </nav>    
						                            ';
						                        }

						                        the_posts_pagination( array(
						                            'show_all'     => false, // показаны все страницы участвующие в пагинации
						                            'end_size'     => 3,     // количество страниц на концах
						                            'mid_size'     => 1,     // количество страниц вокруг текущей
						                            'prev_next'    => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
						                            'prev_text'    => __('« Previous page'),
						                            'next_text'    => __('Next page »'),
						                            'add_args'     => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
						                            'add_fragment' => '',     // Текст который добавиться ко всем ссылкам.
						                            'screen_reader_text' => __( 'Posts navigation' )
						                        ));

						                    ?>
						                </div>
						            </div>
						        </li>
							<?php } else { ?>
								<p>Вибачте, але на сайті нічого підходящого, за Вашим запитом, не знайшлося.</p>
								<p>Спробуйте перевірити правильність набору.</p>
							<?php }
							wp_reset_postdata();
							?>
							</ol>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
	get_footer();
?>