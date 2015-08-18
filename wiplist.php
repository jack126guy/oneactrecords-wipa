<?php
require_once(dirname(__FILE__) . '/../include/db.php');
function oar_wipa_generate_list($releaseid = '') {
	global $oar_sql;
	if(empty($releaseid)) {
		$wherecond = '';
	} else {
		$wherecond = 'WHERE `' . $oar_sql->get_table_prefix() . 'wips`.releaseid = \'' . $releaseid . '\'';
	}
	$wipquery = $oar_sql->query('SELECT `' . $oar_sql->get_table_prefix() . 'wips`.*, `' . $oar_sql->get_table_prefix() . 'releases`.releasename FROM `' . $oar_sql->get_table_prefix() . 'wips` INNER JOIN `' . $oar_sql->get_table_prefix() . 'releases` ON `' . $oar_sql->get_table_prefix() . 'wips`.releaseid = `' . $oar_sql->get_table_prefix() . 'releases`.releaseid ' . $wherecond . ' ORDER BY `' . $oar_sql->get_table_prefix() . 'wips`.releasedate DESC');
	if($oar_sql->num_rows($wipquery) == 0) {
		if(empty($releaseid)) {
			echo '<tr><td colspan="3">Sorry, no WIPs found.</td></tr>';
		} else {
			echo '<tr><td colspan="2">Sorry, no WIPs found.</td></tr>';
		}
	}
	while($wiprow = $oar_sql->fetch_assoc($wipquery)) {
		echo '<tr>';
		echo '<td><a href="' . $wiprow['wipref'] . '">' . $wiprow['wipname'] . '</a><div class="small">[' . $wiprow['wipcode'] . ']</div></td>';
		if(empty($releaseid)) echo '<td><a href="../?r=' . $wiprow['releaseid'] . '">' . $wiprow['releasename'] . '</a><div class="small">(<a href="wips.php?r=' . $wiprow['releaseid'] . '">WIPs for this release</a>)</div></td>';
		echo '<td>' . $wiprow['wipdesc'] . '</td>';
	}
}
?>