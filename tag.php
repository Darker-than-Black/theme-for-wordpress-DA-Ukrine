<?php
/**
 * The template for displaying Tag pages
 *
 * Used to display archive-type pages for posts in a tag.
 *
 */

get_header(); ?>

<aside style="background-image: url(https://media.giphy.com/media/BHNfhgU63qrks/giphy.gif);" class="header headSearch">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1 class="name_site searchName"><?php echo single_cat_title(); ?></h1>
                </div>
            </div>
        </div>
    </div>
</aside>

<aside>
    <div class="wrapper">
        <div class="container-fluid">

            <?php 
                $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    if ( have_posts() ) : // если имеются записи в блоге.
                    while (have_posts()) : the_post();  // запускаем цикл обхода материалов блога 
                        get_template_part( 'post', get_post_format() );
                    endwhile;  // завершаем цикл.
                    else :
                    // If no content, include the "No posts found" template.
                    get_template_part( 'content', 'none' );
                    endif;
            ?>
            <div class="row bg-paging">
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
        </div>
    </div>
</aside>


<?php
get_footer();