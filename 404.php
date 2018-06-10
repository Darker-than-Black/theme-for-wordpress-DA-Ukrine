<?php
/*
Theme Name: DA Uk
*/
?>
<?php get_header(); 
?>

<aside style="background-image: url(https://media.giphy.com/media/14uQ3cOFteDaU/giphy.gif);" class="header">
	<div class="wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-2 d-lg-block d-md-none d-sm-none d-none"></div>
				<div class="col-lg-4 col-md-6 col-sm-6 col-12 d-md-block d-sm-none d-none">
					<h3 class="title_404">The page cannot be found</h3>
					<div class="title_404 container">
						<p>The page you are looking for might have been removed, had its name changed, or is temporarily unavailable</p>
						<p>HTTP Error 404 - File or directory not found.</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-6 col-12">
					<h3 class="title_404">Веб-сторінку не знайдено</h3>
					<div class="title_404 container">
						<p>Сторінка, яку Ви шукаєте може бути тимчасово недоступною, видаленою, або в неї могла змінитись адреса.</p>
						<p>Помилка 404 - документ не знайдено</p>
					</div>
				</div>
				<div class="col-lg-2 d-lg-block d-md-none d-sm-none d-none"></div>
			</div>

			<div class="row">
				<input type="button" onclick="history.back();" value="go back" class="news_link" id="btn-404" />
			</div>
		</div>
	</div>
</aside>