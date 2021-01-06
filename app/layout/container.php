<?php
$style = $link === 'purchase-request' || $link === 'purchase-request-ready' ? "main.css" : "style.css";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $n['page_name'] ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo $n['site_url'] ?>/app/resources/css/all.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $n['site_url'] ?>/app/resources/css/<?php echo $style."?v=".time(); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo $n['site_url'] ?>/app/resources/css/alert.css?v=<?php echo time(); ?>">
	<script type="text/javascript" src="<?php echo $n['site_url'] ?>/app/resources/js/functions.js?v=<?php echo time(); ?>"></script>
	<script type="text/javascript" src="<?php echo $n['site_url'] ?>/app/resources/js/alert.js?v=<?php echo time(); ?>"></script>
	<script type="text/javascript">
		function site_url() {
			return "<?php echo $n['site_url'] ?>/app/requests.php";
		}
		function siteurl() {
			return "<?php echo $n['site_url'] ?>";
		}
	</script>
</head>
<body>
	<div id="content">
		<?php if ($loggedIn && $link != 'purchase-request-ready') include 'app/layout/navigation/content.php' ?>
		<?php include 'app/layout/'.$n['page_content']; ?>
	</div>
	<script type="text/javascript" src="<?php echo $n['site_url'] ?>/app/resources/js/main.js?v=<?php echo time(); ?>"></script>
</body>
</html>