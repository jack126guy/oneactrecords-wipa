<?php
//redirect to release WIPs URL if r parameter is set
if(!empty($_GET['r'])) {
	header('HTTP/1.1 301 Moved Permanently');
	header('Location: http' . (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == 'off' ? '' : 's') . '://' . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']) . '/wips.php?r=' . $_GET['r']);
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Work in Progress Archive</title>
		<link rel="stylesheet" type="text/css" href="../styles.css"/>
		<link rel="stylesheet" type="text/css" href="tablestyles.css"/>
	</head>
	<body>
		<table>
			<thead>
				<tr><th>Name (Click to Download)</th><th>For Release</th><th>Description</th></tr>
			</thead>
			<tbody>
			<?php include('wiplist.php'); generate_list(); ?>
			</tbody>
		</table>
	</body>
</html>