<?php
require_once(dirname(__FILE__) . '/../include/db.php');
function oar_wipa_generate_list($releaseid = '') {
	global $sql;
	if(empty($releaseid)) {
		$wherecond = '';
	} else {
		$wherecond = 'WHERE `' . $sql->get_table_prefix() . 'wips`.releaseid = \'' . $releaseid . '\'';
	}
	$wipquery = $sql->query('SELECT `' . $sql->get_table_prefix() . 'wips`.*, `' . $sql->get_table_prefix() . 'releases`.releasename FROM `' . $sql->get_table_prefix() . 'wips` INNER JOIN `' . $sql->get_table_prefix() . 'releases` ON `' . $sql->get_table_prefix() . 'wips`.releaseid = `' . $sql->get_table_prefix() . 'releases`.releaseid ' . $wherecond . ' ORDER BY `' . $sql->get_table_prefix() . 'wips`.releasedate DESC');
	if($sql->num_rows($wipquery) == 0) {
		if(empty($releaseid)) {
			echo '<tr><td colspan="3">Sorry, no WIPs found.</td></tr>';
		} else {
			echo '<tr><td colspan="2">Sorry, no WIPs found.</td></tr>';
		}
	}
	while($wiprow = $sql->fetch_assoc($wipquery)) {
		echo '<tr>';
		echo '<td><a href="' . $wiprow['wipref'] . '">' . $wiprow['wipname'] . '</a><div class="small">[' . $wiprow['wipcode'] . ']</div></td>';
		if(empty($releaseid)) echo '<td><a href="../?r=' . $wiprow['releaseid'] . '">' . $wiprow['releasename'] . '</a><div class="small">(<a href="wips.php?r=' . $wiprow['releaseid'] . '">WIPs for this release</a>)</div></td>';
		echo '<td>' . $wiprow['wipdesc'] . '</td>';
	}
}
?>