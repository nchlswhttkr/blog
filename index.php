<?php 
require("./constants.php");
require("./getPost.php");
$postNumber = 0;
if (isset($_GET['id'])) {
	$postNumber = update($_GET['id']);
}
?>
<html>
	<?php require("./header.php"); ?>
		<div id="content">
			<div id="blog-text">
				<div id="blog-text-offset">
					<?php 
					if (preg_match('/post\/(\d+)/', $_SERVER['REQUEST_URI'], $matches)) {
						getPost($matches[1]);
						$postNumber = $matches[1];
					} else {
						$postNumber = getNumberOfPosts();
						header('Location: ' . $base . '/post/' . $postNumber);
						exit();
					}
					?>
				</div>
				<?php getNavButtons($postNumber); ?>
				<center>
					<h3><a href="<?php echo $base; ?>/history.php">Post History</a></h3>
				</center>
			</div>
		</div>
	<?php require("./footer.php"); ?>
</html>
