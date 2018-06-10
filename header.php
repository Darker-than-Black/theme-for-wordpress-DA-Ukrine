<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php bloginfo('name');?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Domine" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Yrsa" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Alice&amp;subset=cyrillic,cyrillic-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:300" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<!-- 	<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="fonts.css">
<link rel="stylesheet" href="scrollbar.css">
<link rel="stylesheet" href="menu.css">
<link rel="stylesheet" href="news.css">
<link rel="stylesheet" href="style.css"> -->
<?php 
	  	wp_head();?>
</head>
<body>
	
	<?php
		if(true) {
			echo'';
		}
	?>


	<header>
		<input type="checkbox" id="hmt" class="hidden-menu-ticker">
		<label for="hmt" class="btn-menu name-menu">MENU</label>
		<label class="btn-menu" for="hmt">
		  <span class="first"></span>
		  <span class="second"></span>
		  <span class="third"></span>
		</label>
		<nav class="hidden-menu">
			
			<ul id="login">
				<<!-- ?php wp_loginout(); ?>
				
				
				<form class="form" id="sub">
					<p>
						<label for="irc-name">Ім'я</label><br>
						<input required type="text" name="name">
					</p>
					<p>
						<label for="irc-organization">Password:</label><br>
						<input required type="text" name="pass">
					</p>
					<p>
						<input type="submit"  name="submit" data-method="serializeArray" value="Підписатися">
					</p>
				</form> -->
			</ul>

			<ul class="headMenu">
			  <li><a href="<?php echo get_home_url(); ?>">Home</a></li>
			  <hr />
			  <li><a href="#">Diplomatic Academy Of Ukraine at the Ministry of Foreign Affairs of Ukraine</a></li>
			</ul>

			<ul>
				<li><!-- <?php get_search_form(); ?> -->
					<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>" >
						<!-- <label class="screen-reader-text" for="s"></label> -->
						<input type="text" value="" placeholder="Search" name="s" id="s" />
						<button type="submit" id="searchsubmit" >&#128269;</button>
						
						<!-- <input type="submit" id="searchsubmit" value="найти" /> -->
						
					</form>
				</li>
			</ul>

			<ul class="mLastPost">
				<li><a href="#" class="disabled">RECENT POSTS</a></li>
				<?php
					$args = array( 'numberposts' => '7', 'post_status' => 'publish' );
					$recent_posts = wp_get_recent_posts( $args );
					foreach( $recent_posts as $recent ){
						echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
					}
				?>
			</ul>

			<ul class="mCat">
				<li><a href="#" class="disabled">TAG's</a></li>
				<?php
				if ( function_exists('wp_tag_cloud') ){
					wp_tag_cloud( array(
						'smallest'                  => 1.3,
						'largest'                   => 1.3,
						'unit'                      => 'em',
						'number'                    => 0,
						'format'                    => 'list',
						'separator'                 => "\n",
						'topic_count_text_callback' => 'default_topic_count_text',
						'link'                      => 'view',
						'taxonomy'                  => 'post_tag',
						'echo'                      => true,
					));
				}
				?>
			</ul>
		</nav>

		
	</header>
	

<!-- <script src="<?php echo  get_template_directory_uri();?>/js/jquery-3.3.1.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- <script src="<?php echo  get_template_directory_uri();?>/js/bootstrap.min.js"></script> -->

<script>
	var a;

	$(function() {
	  // при нажатию на кнопку с типом submit
	  $('#sub').submit(function(e) {
	    e.preventDefault();
	    var $data;
	    data = $("#sub").serializeArray();
		//console.log(data);

	    $.ajax({
	      url: '<?php echo get_template_directory_uri(); ?>/audit.php',
	      type: 'POST',
	      data: data,
	      success: function(result) {
	      	/*console.log(result);*/
	        	/*alert(result);*/
	        /*this.a = result;*/
	        /*$('#form_result').html(result);*/
	      }
	    })
	  });
	});

	console.log(a);
</script>