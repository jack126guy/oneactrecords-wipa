<?php
//Return to homepage if release was not specified
if(empty($_GET['r'])) {
	header('Location: http' . (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == 'off' ? '' : 's') . '://' . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']));
	exit;
}
//Identify project name
require_once('../db.php');
$releaseid = $sql->real_escape_string($_GET['r']);
$releasequery = $sql->query('SELECT releasename FROM ' . $sql->get_table_prefix() . 'releases WHERE releaseid = "' . $releaseid . '"');
if($sql->num_rows($releasequery) == 0) {
	$releasename = 'Nonexistent Release';
	header('HTTP/1.1 404 Not Found');
} else {
	$releaserow = $sql->fetch_assoc($releasequery);
	$releasename = $releaserow['releasename'];
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Works in Progress for "<?php echo $releasename;?>" by 126mix</title>
		<link rel="stylesheet" type="text/css" href="../styles.css"/>
		<link rel="stylesheet" type="text/css" href="tablestyles.css"/>
	</head>
	<body>
		<p>WIPs for <a href="../?r=<?php echo $_GET['r'];?>">"<?php echo $releasename;?>"</a></p>
		<p>All WIPs are released under the same license as that of the released song.</p>
		<table>
			<thead>
				<tr><th>Name (Click to Download)</th><th>Description</th></tr>
			</thead>
			<tbody>
			<?php include('wiplist.php'); generate_list($releaseid); ?>
			</tbody>
		</table>
	</body>
</html>