<?php
// This is just a simple config file to store your web root and a few other items
// Change "/www/sites/*" to the directory where you keep your sites. 
// Add multiple directories like this: $dir = array("/www/sites1/*","/www/sites2/*");

// directory name(s)
$dir = array("/www/Sites/*");
					
// Your local top level domain
$tld = 'dev';

// Icon file names you would like to display next to the link to each site. 
// In order of the priority they should be used.
$icons = array('favicon.ico', 'apple-touch-icon.png');

// Development tools you want displayed in the top navigation bar.
$devtools = array(
	array('name' => 'phpInfo', 'url' => 'phpinfo.php'),
	array('name' => 'phpmyadmin', 'url' => 'phpmyadmin/'),
	array('name' => 'gitHub', 'url' => 'https://github.com/twelch555'),
	array('name' => 'bitbucket', 'url' => 'https://bitbucket.org/'),
);

// Options for sites being displayed. These are completely optional.
$siteoptions = array(
	'moodbox286' => array('displayname' => 'Moodle 2.8.6 Local Development', 'adminurl' => ''),
	'moodbox286' => array('displayname' => 'Moodle 2.8.6 Local Development', 'adminurl' => ''),
	'smallcitiesimprint' => array('displayname' => 'Small Cities Imprint', 'adminurl' => 'http://smallcitiesimprint.dev/wp-admin/'),
	// 'directory name' => array('displayname' => 'DisplayName', 'adminurl' => 'http://something/admin'),
);

// Directory names of sites you want to hide from the page.
$hiddensites = array('home');


?>