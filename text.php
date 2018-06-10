<?php
	/*
	Theme Name: DAUk
	Template Name: DA_test
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

<form class="irc-form" id="irc_subscribe">
	<p>
		<label for="irc-name">Ім'я</label><br>
		<input required type="text" name="irc-name">
	</p>
	<p>
		<label for="irc-organization">Password:</label><br>
		<input required type="text" name="irc-pass">
	</p>
	<p>
		<input type="submit"  name="submit" data-method="serializeArray" value="Підписатися">
	</p>
</form>

<?php


/*$conn = new mysqli("localhost", "root", "", "dip_akadem");
	 
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$conn->query("SET NAMES utf8");
	$sql = "SELECT * FROM ta WHERE `name` = 'd'";
	print_r($conn->query($sql)->num_rows);
	if($conn->query($sql)->num_rows == TRUE) {
		echo "Record created";
	}
	else {
		echo 'none';
	}
	$conn->close();*/
?>

<?php get_footer(); ?>


<script>
	$(function() {
	  // при нажатию на кнопку с типом submit
	  $('#irc_subscribe').submit(function(e) {
	    e.preventDefault();
	    var $data;
	    data = $(".irc-form").serializeArray();
		console.log(data);

	    $.ajax({
	      url: '<?php echo get_template_directory_uri(); ?>/connect.php',
	      type: 'POST',
	      data: data,
	      success: function(result) {
	      	console.log(result);
	        	alert(result);
	        /*$('#form_result').html(result);*/
	      }
	    })
	  });
	});
</script>



<?php
	function is_user_logged_in() {
		$user = wp_get_current_user();
		return $user->exists();
	}
?>