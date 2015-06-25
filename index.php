<?php
//redirect to release WIPs URL if r parameter is set
if(!empty($_GET['r'])) {
	header('Location: http' . (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == 'off' ? '' : 's') . '://' . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']) . '/wips.php?r=' . $_GET['r']);
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>126mix's Work in Progress Archive</title>
		<link rel="stylesheet" type="text/css" href="../styles.css"/>
		<link rel="stylesheet" type="text/css" href="tablestyles.css"/>
	</head>
	<body>
		<p><b>Attention</b>: All WIPs are still on SoundCloud, but I am in the process of posting them here.</p>
		<p>I normally post works in progress (WIPs) on <a href="http://soundcloud.com/someguy126">SoundCloud</a>, but that has limitations on the amount of content. Therefore, WIPs of completed or abandoned projects go here.</p>
		<p>All WIPs are released under the same license as that of the released song, or a <a href="http://creativecommons.org/licenses/by/3.0/">Creative Commons Attribution 3.0 Unported License</a> if the song was not released.</p>
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