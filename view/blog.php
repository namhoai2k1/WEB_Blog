<?php
    include './shared/header.php';
?>
<!-- End of header.php -->
<!-- Start of content -->
<div id="content">
	<div id="blog">
		<?php 
			$blogs = $get_data->getAllBlogs();
			foreach ($blogs as $key => $blog) {
				if($blog['status'] == 1) {
		?>
		<h1><a href="index.html"><?php echo $blog['title']; ?></a></h1>
		<p><?php echo $blog['description']; ?></p>
		<?php
				}
			}
		?>
	</div>
</div>
<!-- End of content -->
<!-- Start of footer.php -->
<?php 
    include './shared/fooder.php';
?>