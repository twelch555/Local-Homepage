<?php
function check_mysql($hostname, $username, $password) {
	if(!@mysqli_connect($hostname, $username, $password)) {
		return false;
	} else {
		return true;
    }
}

function switch_mysql($action, $password) {
	if($action == 'start') $output = shell_exec("echo $password | sudo -S /usr/local/mysql/support-files/mysql.server start");
	if($action == 'stop') $output = shell_exec("echo $password | sudo -S /usr/local/mysql/support-files/mysql.server stop");
}
?>